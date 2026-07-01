<?php
add_action( 'after_setup_theme', function() {
  $menus = array(
    'acessibilidade' => __('Barra de Acessibilidade', 'ifrs-portal-theme'),
    'principal'      => __('Menu Principal', 'ifrs-portal-theme'),
  );

  if (!is_multisite() || is_main_site()) {
    $menus['campi'] = __('Lista de Campi', 'ifrs-portal-theme');
  }

  register_nav_menus($menus);
} );

function ifrs_get_network_main_site_id() {
  if (function_exists('get_main_site_id')) {
    return (int) get_main_site_id();
  }

  if (defined('BLOG_ID_CURRENT_SITE')) {
    return (int) BLOG_ID_CURRENT_SITE;
  }

  return 1;
}

function ifrs_get_network_campi_menu_id() {
  if (!is_multisite()) {
    return has_nav_menu('campi') ? (int) get_nav_menu_locations()['campi'] : 0;
  }

  $main_site_id = ifrs_get_network_main_site_id();
  $current_site_id = (int) get_current_blog_id();
  $is_switched = false;

  if ($current_site_id !== $main_site_id) {
    switch_to_blog($main_site_id);
    $is_switched = true;
  }

  $locations = get_nav_menu_locations();
  $menu_id = !empty($locations['campi']) ? (int) $locations['campi'] : 0;

  if ($is_switched) {
    restore_current_blog();
  }

  return $menu_id;
}

function ifrs_has_campi_menu() {
  if (!is_multisite() || is_main_site()) {
    return has_nav_menu('campi');
  }

  return ifrs_get_network_campi_menu_id() > 0;
}

function ifrs_get_campi_nav_menu_args( $collapse_id ) {
  $args = array(
    'container'            => 'div',
    'container_class'      => 'collapse navbar-collapse',
    'container_id'         => esc_attr($collapse_id),
    'container_aria_label' => __('Lista de campi', 'ifrs-portal-theme'),
    'menu_class'           => 'navbar-nav flex-wrap',
    'menu_id'              => false,
    'depth'                => 1,
    'item_spacing'         => 'discard',
  );

  if (!is_multisite() || is_main_site()) {
    $args['theme_location'] = 'campi';
    return $args;
  }

  $network_menu_id = ifrs_get_network_campi_menu_id();

  if ($network_menu_id > 0) {
    $args['menu'] = $network_menu_id;
    $args['ifrs_network_campi'] = true;
  }

  return $args;
}

function ifrs_is_campi_menu_args( $args ) {
  if (!is_object($args)) {
    return false;
  }

  if (!empty($args->theme_location) && $args->theme_location === 'campi') {
    return true;
  }

  return !empty($args->ifrs_network_campi);
}

function ifrs_is_principal_horizontal_bootstrap_menu_args( $args ) {
  return is_object($args) && !empty($args->principal_horizontal_bootstrap);
}

function ifrs_is_principal_mobile_collapse_menu_args( $args ) {
  return is_object($args) && !empty($args->principal_mobile_collapse);
}

function ifrs_principal_menu_allows_dropdown( $depth, $args ) {
  if (!is_object($args) || empty($args->depth)) {
    return true;
  }

  return $depth < ((int) $args->depth - 1);
}

class IFRS_Walker_Nav_Menu_Mobile_Collapse extends Walker_Nav_Menu {
  private $submenu_parent_ids = array();

  public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
    if (ifrs_is_principal_mobile_collapse_menu_args($args)) {
      $classes = is_array($data_object->classes) ? $data_object->classes : array();
      $has_children = in_array('menu-item-has-children', $classes, true);

      if ($has_children) {
        $this->submenu_parent_ids[$depth] = (int) $data_object->ID;
      } else {
        unset($this->submenu_parent_ids[$depth]);
      }
    }

    parent::start_el($output, $data_object, $depth, $args, $current_object_id);
  }

  public function start_lvl( &$output, $depth = 0, $args = null ) {
    if (!ifrs_is_principal_mobile_collapse_menu_args($args)) {
      parent::start_lvl($output, $depth, $args);
      return;
    }

    $indent = str_repeat("\t", $depth);
    $parent_id = !empty($this->submenu_parent_ids[$depth]) ? (int) $this->submenu_parent_ids[$depth] : 0;

    $classes = array('sub-menu', 'collapse');
    $class_names = implode(' ', $classes);
    $id_attr = $parent_id ? ' id="' . esc_attr('menu-principal-mobile-collapse-' . $parent_id) . '"' : '';

    $output .= "\n{$indent}<ul{$id_attr} class=\"" . esc_attr($class_names) . "\">\n";
  }
}

add_filter('nav_menu_css_class', function( $classes, $item, $args, $depth ) {
  if (!ifrs_is_campi_menu_args($args)) return $classes;

  if ($item->menu_item_parent == 0) {
    $classes[] = 'nav-item';
  }

  return $classes;
}, 10, 4);

add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  if (!ifrs_is_campi_menu_args($args)) return $atts;

  $atts['class'] = 'nav-link';

  if ($item->current || $item->current_item_ancestor) {
    $atts['class'] .= ' active';
  }

  return $atts;
}, 10, 4);

add_filter('nav_menu_css_class', function( $classes, $item, $args, $depth ) {
  if (!ifrs_is_principal_horizontal_bootstrap_menu_args($args)) return $classes;

  $has_children = in_array('menu-item-has-children', $classes, true);

  if ($has_children && ifrs_principal_menu_allows_dropdown($depth, $args)) {
    $classes[] = ($depth === 0) ? 'dropdown' : 'dropend';
  }

  return array_unique($classes);
}, 10, 4);

add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  if (ifrs_is_principal_mobile_collapse_menu_args($args)) {
    $classes = array();
    $has_children = is_array($item->classes) && in_array('menu-item-has-children', $item->classes, true);

    if ($has_children) {
      $submenu_id = 'menu-principal-mobile-collapse-' . (int) $item->ID;

      $classes[] = 'collapsed';
      $atts['data-bs-toggle'] = 'collapse';
      $atts['data-bs-target'] = '#' . $submenu_id;
      $atts['aria-expanded'] = 'false';
      $atts['aria-controls'] = $submenu_id;
    }

    $existing_classes = array();
    if (!empty($atts['class'])) {
      $existing_classes = preg_split('/\s+/', trim($atts['class'])) ?: array();
    }

    $link_classes = array_unique(array_filter(array_merge($existing_classes, $classes)));

    if (!empty($link_classes)) {
      $atts['class'] = implode(' ', $link_classes);
    }

    return $atts;
  }

  if (!ifrs_is_principal_horizontal_bootstrap_menu_args($args)) return $atts;

  $classes = array();
  $has_children = is_array($item->classes) && in_array('menu-item-has-children', $item->classes, true);

  if ($depth > 0) {
    $classes[] = 'dropdown-item';
  }

  if ($has_children && ifrs_principal_menu_allows_dropdown($depth, $args)) {
    $classes[] = 'dropdown-toggle';

    $atts['data-bs-toggle'] = 'dropdown';
    $atts['data-bs-auto-close'] = 'outside';
    $atts['aria-expanded'] = 'false';
    $atts['role'] = 'button';
  }

  if ($item->current || $item->current_item_ancestor) {
    $classes[] = 'active';
  }

  $existing_classes = array();
  if (!empty($atts['class'])) {
    $existing_classes = preg_split('/\s+/', trim($atts['class'])) ?: array();
  }

  $link_classes = array_unique(array_filter(array_merge($existing_classes, $classes)));

  if (!empty($link_classes)) {
    $atts['class'] = implode(' ', $link_classes);
  }

  return $atts;
}, 20, 4);

add_filter('nav_menu_submenu_css_class', function( $classes, $args, $depth ) {
  if (!ifrs_is_principal_horizontal_bootstrap_menu_args($args)) return $classes;

  $submenu_classes = array_merge($classes, array('dropdown-menu'));

  if ($depth > 0) {
    $submenu_classes[] = 'dropdown-submenu-menu';
  }

  return array_unique($submenu_classes);
}, 10, 3);
