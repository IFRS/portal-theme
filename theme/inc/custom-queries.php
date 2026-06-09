<?php
if (!function_exists('portal_query_targets_posts')) {
  function portal_query_targets_posts($query) {
    $post_type = $query->get('post_type');

    if (empty($post_type) || $post_type === 'any') {
      return true;
    }

    if (is_array($post_type)) {
      return in_array('post', $post_type, true);
    }

    return $post_type === 'post';
  }
}

if (!function_exists('portal_get_excluded_home_categories')) {
  function portal_get_excluded_home_categories() {
    $excluded_category_ids = get_terms(array(
      'taxonomy' => 'category',
      'hide_empty' => false,
      'fields' => 'ids',
      'meta_query' => array(
        array(
          'key' => 'portal_hide_from_home',
          'value' => '1',
        ),
      ),
    ));

    if (is_wp_error($excluded_category_ids) || empty($excluded_category_ids)) {
      return array();
    }

    return array_values(array_unique(array_map('intval', $excluded_category_ids)));
  }
}

add_action('pre_get_posts', function($query) {
  if (is_admin() || !$query instanceof WP_Query || !portal_query_targets_posts($query)) {
    return;
  }

  if (is_front_page()) {
    $excluded_category_ids = portal_get_excluded_home_categories();
    if (!empty($excluded_category_ids)) {
      $current_excluded = (array) $query->get('category__not_in');
      $query->set(
        'category__not_in',
        array_values(array_unique(array_map('intval', array_merge($current_excluded, $excluded_category_ids))))
      );
    }
  }

  if (is_home()) {
    $query->set('ignore_sticky_posts', true);
  }

  if (is_category() || is_tag() || is_home()) {
    $query->set('posts_per_page', 9);
  }

  if (is_search()) {
    $query->set('posts_per_page', 10);
  }
}, 20);

add_filter('query_loop_block_query_vars', function($query_vars) {
  $post_type = isset($query_vars['post_type']) ? $query_vars['post_type'] : null;
  if (!(empty($post_type) || $post_type === 'any' || $post_type === 'post' || (is_array($post_type) && in_array('post', $post_type, true)))) {
    return $query_vars;
  }

  if (is_front_page()) {
    $excluded_category_ids = portal_get_excluded_home_categories();
    if (!empty($excluded_category_ids)) {
      $current_excluded = isset($query_vars['category__not_in']) ? (array) $query_vars['category__not_in'] : array();
      $query_vars['category__not_in'] = array_values(array_unique(array_map('intval', array_merge($current_excluded, $excluded_category_ids))));
    }
  }

  if (is_home()) {
    $query_vars['ignore_sticky_posts'] = true;
  }

  if (is_category() || is_tag() || is_home()) {
    $query_vars['posts_per_page'] = 9;
  }

  if (is_search()) {
    $query_vars['posts_per_page'] = 10;
  }

  return $query_vars;
}, 20, 1);
