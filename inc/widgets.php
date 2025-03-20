<?php
add_action( 'widgets_init', function() {
  register_sidebar( array(
    'name'          => 'Área Banners',
    'id'            => 'area-banners',
    'description'   => __('Área ao final das páginas, antes do rodapé, para items mais permanentes.', 'ifrs-portal-theme'),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<span class="visually-hidden">',
    'after_title'   => '</span>',
    'before_sidebar' => '<div id="%1$s" class="area-banners %2$s">',
    'after_sidebar' => '</div>',
  ) );
  register_sidebar( array(
    'name'          => 'Área Social',
    'id'            => 'area-social',
    'description'   => __('Área no rodapé para as Redes Sociais.', 'ifrs-portal-theme'),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<span class="visually-hidden">',
    'after_title'   => '</span>',
    'before_sidebar' => '<nav id="%1$s" class="area-social %2$s">',
    'after_sidebar' => '</nav>',
  ) );
  register_sidebar( array(
    'name'          => 'Área Rodapé',
    'id'            => 'area-rodape',
    'description'   => __('Área no rodapé.', 'ifrs-portal-theme'),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<span class="visually-hidden">',
    'after_title'   => '</span>',
    'before_sidebar' => '<div id="%1$s" class="area-rodape %2$s">',
    'after_sidebar' => '</div>',
  ) );
} );
