<?php
register_nav_menus(
    array(
        'acessibilidade' => __('Barra de Acessibilidade', 'ifrs-portal-theme'),
        'servicos'       => __('Barra de Serviços', 'ifrs-portal-theme'),
        'campi'          => __('Lista de Campi', 'ifrs-portal-theme'),
        // 'relevancia'     => __('Menu de Relevância', 'ifrs-portal-theme'),
        'principal'      => __('Menu Principal', 'ifrs-portal-theme')
    )
);

// add_filter('nav_menu_submenu_css_class', function( $classes, $args, $depth ) {
//   if ($depth > 0) {
//     $classes[] = 'd-none';
//   }

//   return $classes;
// }, 10, 3);

add_filter('nav_menu_css_class', function( $classes, $item, $args, $depth ) {
  if ($args->menu->slug !== 'campi') return $classes;

  if ($item->menu_item_parent == 0) {
    $classes[] = 'nav-item';
  }

  return $classes;
}, 10, 4);

add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  if ($args->menu->slug !== 'campi') return $atts;

  $atts['class'] = 'nav-link';

  // if (array_search('menu-item-has-children', $item->classes ) && $item->menu_item_parent == 0) {
  //   $atts['class'] .= ' dropdown-toggle';
  //   $atts['role'] = 'button';
  //   $atts['data-bs-toggle'] = 'dropdown';
  //   $atts['aria-expanded'] = 'false';
  // } else if ($item->menu_item_parent != 0) {
  //   $atts['class'] = 'dropdown-item';
  // }

  if ($item->current || $item->current_item_ancestor) {
    $atts['class'] .= ' active';
  }

  return $atts;
}, 10, 4);
