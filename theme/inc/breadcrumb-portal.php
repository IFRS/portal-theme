<?php
/**
 * Breadcrumb nativo do tema com suporte a Bootstrap 5 e fallback opcional para Yoast.
 */

if (!function_exists('portal_breadcrumb_get_home_item')) {
  function portal_breadcrumb_get_home_item() {
    return array(
      'label' => get_bloginfo('name'),
      'url' => home_url('/'),
      'active' => false,
    );
  }
}

if (!function_exists('portal_breadcrumb_build_term_chain')) {
  function portal_breadcrumb_build_term_chain($term) {
    $items = array();

    if (!($term instanceof WP_Term)) {
      return $items;
    }

    $ancestors = get_ancestors($term->term_id, $term->taxonomy, 'taxonomy');
    $ancestors = array_reverse(array_map('absint', $ancestors));

    foreach ($ancestors as $ancestor_id) {
      $ancestor = get_term($ancestor_id, $term->taxonomy);
      if (!($ancestor instanceof WP_Term) || is_wp_error($ancestor)) {
        continue;
      }

      $ancestor_link = get_term_link($ancestor);
      $items[] = array(
        'label' => $ancestor->name,
        'url' => is_wp_error($ancestor_link) ? '' : $ancestor_link,
        'active' => false,
      );
    }

    return $items;
  }
}

if (!function_exists('portal_breadcrumb_get_post_type_archive_item')) {
  function portal_breadcrumb_get_post_type_archive_item($post_type) {
    $post_type_obj = get_post_type_object($post_type);

    if (!$post_type_obj || empty($post_type_obj->has_archive)) {
      return null;
    }

    $archive_link = get_post_type_archive_link($post_type);
    if (!$archive_link) {
      return null;
    }

    return array(
      'label' => $post_type_obj->labels->name,
      'url' => $archive_link,
      'active' => false,
    );
  }
}

if (!function_exists('portal_breadcrumb_add_parent_pages')) {
  function portal_breadcrumb_add_parent_pages(&$items, $post_id) {
    $ancestor_ids = get_post_ancestors($post_id);
    if (empty($ancestor_ids)) {
      return;
    }

    $ancestor_ids = array_reverse(array_map('absint', $ancestor_ids));

    foreach ($ancestor_ids as $ancestor_id) {
      $items[] = array(
        'label' => get_the_title($ancestor_id),
        'url' => get_permalink($ancestor_id),
        'active' => false,
      );
    }
  }
}

if (!function_exists('portal_breadcrumb_get_primary_term')) {
  function portal_breadcrumb_get_primary_term($post_id, $taxonomy) {
    $terms = get_the_terms($post_id, $taxonomy);

    if (empty($terms) || is_wp_error($terms)) {
      return null;
    }

    usort($terms, function($a, $b) {
      return (int) $a->term_id <=> (int) $b->term_id;
    });

    return $terms[0] instanceof WP_Term ? $terms[0] : null;
  }
}

if (!function_exists('portal_breadcrumb_add_tax_context_for_singular')) {
  function portal_breadcrumb_add_tax_context_for_singular(&$items, $post_id, $post_type) {
    $taxonomies = get_object_taxonomies($post_type, 'objects');

    if (empty($taxonomies) || !is_array($taxonomies)) {
      return;
    }

    foreach ($taxonomies as $taxonomy) {
      if (empty($taxonomy->public) || empty($taxonomy->show_ui) || empty($taxonomy->hierarchical)) {
        continue;
      }

      $primary_term = portal_breadcrumb_get_primary_term($post_id, $taxonomy->name);
      if (!($primary_term instanceof WP_Term)) {
        continue;
      }

      $items = array_merge($items, portal_breadcrumb_build_term_chain($primary_term));

      $term_link = get_term_link($primary_term);
      $items[] = array(
        'label' => $primary_term->name,
        'url' => is_wp_error($term_link) ? '' : $term_link,
        'active' => false,
      );

      return;
    }

    // Para taxonomias não hierárquicas, usa o primeiro termo disponível.
    foreach ($taxonomies as $taxonomy) {
      if (empty($taxonomy->public) || empty($taxonomy->show_ui)) {
        continue;
      }

      $primary_term = portal_breadcrumb_get_primary_term($post_id, $taxonomy->name);
      if (!($primary_term instanceof WP_Term)) {
        continue;
      }

      $term_link = get_term_link($primary_term);
      $items[] = array(
        'label' => $primary_term->name,
        'url' => is_wp_error($term_link) ? '' : $term_link,
        'active' => false,
      );

      return;
    }
  }
}

if (!function_exists('portal_get_breadcrumb_items')) {
  function portal_get_breadcrumb_items() {
    if (is_front_page()) {
      return array();
    }

    $items = array();
    $items[] = portal_breadcrumb_get_home_item();

    if (is_home()) {
      $posts_page_id = (int) get_option('page_for_posts');
      $items[] = array(
        'label' => $posts_page_id ? get_the_title($posts_page_id) : __('Blog', 'ifrs-portal-theme'),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_page()) {
      $page_id = get_queried_object_id();
      portal_breadcrumb_add_parent_pages($items, $page_id);

      $items[] = array(
        'label' => get_the_title($page_id),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_singular()) {
      $post_id = get_queried_object_id();
      $post_type = get_post_type($post_id);

      if (!$post_type) {
        return apply_filters('portal_breadcrumb_items', $items);
      }

      if ('post' === $post_type) {
        $posts_page_id = (int) get_option('page_for_posts');
        if ($posts_page_id) {
          $items[] = array(
            'label' => get_the_title($posts_page_id),
            'url' => get_permalink($posts_page_id),
            'active' => false,
          );
        }
      } else {
        $archive_item = portal_breadcrumb_get_post_type_archive_item($post_type);
        if (is_array($archive_item)) {
          $items[] = $archive_item;
        }
      }

      if (is_post_type_hierarchical($post_type)) {
        portal_breadcrumb_add_parent_pages($items, $post_id);
      }

      if (is_attachment()) {
        $parent_id = wp_get_post_parent_id($post_id);
        if ($parent_id) {
          $items[] = array(
            'label' => get_the_title($parent_id),
            'url' => get_permalink($parent_id),
            'active' => false,
          );
        }
      } else {
        portal_breadcrumb_add_tax_context_for_singular($items, $post_id, $post_type);
      }

      $items[] = array(
        'label' => get_the_title($post_id),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_post_type_archive()) {
      $post_type = get_query_var('post_type');
      if (is_array($post_type)) {
        $post_type = reset($post_type);
      }

      $obj = $post_type ? get_post_type_object($post_type) : null;
      $items[] = array(
        'label' => $obj && !empty($obj->labels->name) ? $obj->labels->name : post_type_archive_title('', false),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_category() || is_tag() || is_tax()) {
      $term = get_queried_object();

      if ($term instanceof WP_Term) {
        $taxonomy_obj = get_taxonomy($term->taxonomy);

        if ($taxonomy_obj && !empty($taxonomy_obj->object_type) && is_array($taxonomy_obj->object_type)) {
          foreach ($taxonomy_obj->object_type as $linked_post_type) {
            $archive_item = portal_breadcrumb_get_post_type_archive_item($linked_post_type);
            if (is_array($archive_item)) {
              $items[] = $archive_item;
              break;
            }
          }
        }

        $items = array_merge($items, portal_breadcrumb_build_term_chain($term));
        $items[] = array(
          'label' => single_term_title('', false),
          'url' => '',
          'active' => true,
        );
      }

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_author()) {
      $author = get_queried_object();
      $items[] = array(
        'label' => $author instanceof WP_User ? $author->display_name : __('Autor', 'ifrs-portal-theme'),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_search()) {
      $items[] = array(
        'label' => sprintf(__('Busca por "%s"', 'ifrs-portal-theme'), get_search_query()),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_day() || is_month() || is_year()) {
      if (is_year()) {
        $items[] = array(
          'label' => get_the_date('Y'),
          'url' => '',
          'active' => true,
        );

        return apply_filters('portal_breadcrumb_items', $items);
      }

      $year = get_query_var('year');
      if ($year) {
        $items[] = array(
          'label' => (string) $year,
          'url' => get_year_link($year),
          'active' => false,
        );
      }

      if (is_month()) {
        $month_num = (int) get_query_var('monthnum');
        $items[] = array(
          'label' => single_month_title(' ', false),
          'url' => '',
          'active' => true,
        );

        return apply_filters('portal_breadcrumb_items', $items);
      }

      $month_num = (int) get_query_var('monthnum');
      if ($month_num && $year) {
        $items[] = array(
          'label' => single_month_title(' ', false),
          'url' => get_month_link($year, $month_num),
          'active' => false,
        );
      }

      $items[] = array(
        'label' => get_the_date(),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    if (is_404()) {
      $items[] = array(
        'label' => __('Página não encontrada', 'ifrs-portal-theme'),
        'url' => '',
        'active' => true,
      );

      return apply_filters('portal_breadcrumb_items', $items);
    }

    $items[] = array(
      'label' => wp_get_document_title(),
      'url' => '',
      'active' => true,
    );

    /**
     * Permite ajustes de trilha para plugins (CPT/taxonomias customizadas, labels e links).
     *
     * Cada item segue o formato:
     * - label (string)
     * - url (string opcional)
     * - active (bool opcional)
     */
    return apply_filters('portal_breadcrumb_items', $items);
  }
}

if (!function_exists('portal_breadcrumb_normalize_items')) {
  function portal_breadcrumb_normalize_items($items) {
    if (empty($items) || !is_array($items)) {
      return array();
    }

    $normalized = array();

    foreach ($items as $item) {
      if (!is_array($item) || empty($item['label'])) {
        continue;
      }

      $normalized[] = array(
        'label' => wp_strip_all_tags((string) $item['label']),
        'url' => empty($item['url']) ? '' : (string) $item['url'],
        'active' => !empty($item['active']),
      );
    }

    if (empty($normalized)) {
      return array();
    }

    foreach ($normalized as $index => $item) {
      $normalized[$index]['active'] = false;
      $normalized[$index]['url'] = $index === array_key_last($normalized) ? '' : $item['url'];
    }

    $normalized[array_key_last($normalized)]['active'] = true;

    return $normalized;
  }
}

if (!function_exists('portal_render_breadcrumb_html')) {
  function portal_render_breadcrumb_html($args = array()) {
    if (is_front_page()) {
      return '';
    }

    $defaults = array(
      'container_class' => 'container',
      'nav_class' => 'breadcrumb-portal',
      'label' => __('Caminhos de navegação', 'ifrs-portal-theme'),
    );

    $args = wp_parse_args($args, $defaults);

    $items = portal_breadcrumb_normalize_items(portal_get_breadcrumb_items());
    if (empty($items)) {
      return '';
    }

    $html = '<section class="' . esc_attr($args['container_class']) . '">';
    $html .= '<nav class="' . esc_attr($args['nav_class']) . '" aria-label="' . esc_attr($args['label']) . '">';
    $html .= '<ol class="breadcrumb">';

    $home_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" aria-hidden="true" focusable="false"><!--!Font Awesome Free v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z"/></svg>';

    foreach ($items as $index => $item) {
      $label = esc_html($item['label']);
      $is_home_item = 0 === $index;
      $item_content = $is_home_item
        ? $home_icon . '<span class="visually-hidden">' . $label . '</span>'
        : $label;
      $home_aria_label = $is_home_item ? ' aria-label="' . esc_attr($item['label']) . '"' : '';

      if (!empty($item['active']) || empty($item['url'])) {
        $html .= '<li class="breadcrumb-item active" aria-current="page"' . $home_aria_label . '>' . $item_content . '</li>';
      } else {
        $html .= '<li class="breadcrumb-item"><a href="' . esc_url($item['url']) . '"' . $home_aria_label . '>' . $item_content . '</a></li>';
      }
    }

    $html .= '</ol>';
    $html .= '</nav>';
    $html .= '</section>';

    return $html;
  }
}

if (!function_exists('portal_render_breadcrumb_block')) {
  function portal_render_breadcrumb_block($attributes = array(), $content = '', $block = null) {
    $args = array();

    if (!empty($attributes['containerClass']) && is_string($attributes['containerClass'])) {
      $args['container_class'] = $attributes['containerClass'];
    }

    if (!empty($attributes['navClass']) && is_string($attributes['navClass'])) {
      $args['nav_class'] = $attributes['navClass'];
    }

    return portal_render_breadcrumb_html($args);
  }
}

if (!function_exists('portal_register_breadcrumb_block')) {
  function portal_register_breadcrumb_block() {
    register_block_type('portal/breadcrumb', array(
      'api_version' => 2,
      'title' => __('Breadcrumb', 'ifrs-portal-theme'),
      'description' => __('Exibe o caminho de navegação da página atual.', 'ifrs-portal-theme'),
      'category' => 'theme',
      'icon' => 'editor-ol',
      'keywords' => array('breadcrumb', 'navegacao', 'trilha'),
      'render_callback' => 'portal_render_breadcrumb_block',
      'attributes' => array(
        'containerClass' => array(
          'type' => 'string',
          'default' => 'container',
        ),
        'navClass' => array(
          'type' => 'string',
          'default' => 'breadcrumb-portal',
        ),
      ),
      'supports' => array(
        'align' => false,
        'html' => false,
        'multiple' => true,
        'reusable' => true,
      ),
    ));
  }
}
add_action('init', 'portal_register_breadcrumb_block');
