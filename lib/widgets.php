<?php
function portal_widgets_init() {
	register_sidebar(array(
		'name'          => 'Widget Social',
		'id'            => 'widget-social',
		'description'   => __('Área no cabeçalho para as Redes Sociais.', 'ifrs-portal-theme'),
		'before_widget' => '<li id="%1$s" class="widget widget-social %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Navegação',
		'id'            => 'widget-nav',
		'description'   => __('Área acima do Menu de Relevância.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="widget widget-nav %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Home',
		'id'            => 'widget-home',
		'description'   => __('Área ao lado da notícia destaque na página inicial.', 'ifrs-portal-theme'),
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-home %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Galeria',
		'id'            => 'widget-gallery',
		'description'   => __('Área abaixo dos Eventos e Editais na página inicial.', 'ifrs-portal-theme'),
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-gallery %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Widget Home Lateral',
		'id'            => 'widget-home-side',
		'description'   => __('Área ao lado da Galeria, acima do Facebook/Twitter na página inicial.', 'ifrs-portal-theme'),
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-home-side %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Atalhos',
		'id'            => 'widget-atalhos',
		'description'   => __('Área de atalhos para acesso rápido na página inicial.', 'ifrs-portal-theme'),
		'before_widget' => '<li id="%1$s" class="widget widget-atalhos %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Banners',
		'id'            => 'widget-banners',
		'description'   => __('Área mais abaixo na página inicial, antes do rodapé.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="widget widget-home-banner %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Rodapé',
		'id'            => 'widget-footer',
		'description'   => __('Área no rodapé, após o mapa do site.', 'ifrs-portal-theme'),
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
}
add_action( 'widgets_init', 'portal_widgets_init' );
