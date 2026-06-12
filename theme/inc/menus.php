<?php
add_action( 'after_setup_theme', function() {
  register_nav_menus(
    array(
      'acessibilidade' => __('Barra de Acessibilidade', 'ifrs-portal-theme'),
      'servicos'       => __('Barra de Serviços', 'ifrs-portal-theme'),
      'campi'          => __('Lista de Campi', 'ifrs-portal-theme'),
      // 'relevancia'     => __('Menu de Relevância', 'ifrs-portal-theme'),
      'principal'      => __('Menu Principal', 'ifrs-portal-theme'),
    )
  ) ;
} );

function ifrs_is_principal_horizontal_bootstrap_menu_args( $args ) {
  return is_object($args) && !empty($args->principal_horizontal_bootstrap);
}

add_filter('nav_menu_css_class', function( $classes, $item, $args, $depth ) {
  if (!isset($args->theme_location) || $args->theme_location !== 'campi') return $classes;

  if ($item->menu_item_parent == 0) {
    $classes[] = 'nav-item';
  }

  return $classes;
}, 10, 4);

add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  if (!isset($args->theme_location) || $args->theme_location !== 'campi') return $atts;

  $atts['class'] = 'nav-link';

  if ($item->current || $item->current_item_ancestor) {
    $atts['class'] .= ' active';
  }

  return $atts;
}, 10, 4);

add_filter('nav_menu_css_class', function( $classes, $item, $args, $depth ) {
  if (!ifrs_is_principal_horizontal_bootstrap_menu_args($args)) return $classes;

  $has_children = in_array('menu-item-has-children', $classes, true);

  if ($has_children) {
    $classes[] = ($depth === 0) ? 'dropdown' : 'dropend';
  }

  return array_unique($classes);
}, 10, 4);

add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  if (!ifrs_is_principal_horizontal_bootstrap_menu_args($args)) return $atts;

  $classes = array();
  $has_children = is_array($item->classes) && in_array('menu-item-has-children', $item->classes, true);

  if ($depth > 0) {
    $classes[] = 'dropdown-item';
  }

  if ($has_children) {
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
