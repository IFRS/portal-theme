<?php
function portal_widgets_init() {
	register_sidebar(array(
		'name'          => 'Widget Navegação',
		'id'            => 'widget-nav',
		'description'   => 'Área acima do Menu de Relevância.',
		'before_widget' => '<div id="%1$s" class="widget widget-nav visible-md visible-lg %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Home',
		'id'            => 'widget-home',
		'description'   => 'Área ao lado da notícia destaque na página inicial.',
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-home %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Galeria',
		'id'            => 'widget-gallery',
		'description'   => 'Área abaixo das notícias na página inicial.',
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-gallery %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Widget Home Lateral',
		'id'            => 'widget-home-side',
		'description'   => 'Área ao lado da Galeria, acima do Facebook/Twitter na página inicial.',
		'before_widget' => '<div class="row"><div class="col-xs-12"><div id="%1$s" class="widget widget-home-side %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Widget Home Banners',
		'id'            => 'widget-home-banners',
		'description'   => 'Área mais abaixo na página inicial, antes do rodapé.',
		'before_widget' => '<div id="%1$s" class="widget widget-home-banner %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
}
add_action( 'widgets_init', 'portal_widgets_init' );
