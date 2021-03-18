<?php
function portal_widgets_init() {
	register_sidebar(array(
		'name'          => 'Carousel',
		'id'            => 'widget-carousel',
		'description'   => __('Área para conteúdo em forma de slider, geralmente imagens.', 'ifrs-portal-theme'),
		'before_widget' => '<div class="col-12 col-md-4"><div id="%1$s" class="carousel-item %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Área Social',
		'id'            => 'widget-social',
		'description'   => __('Área no cabeçalho para as Redes Sociais.', 'ifrs-portal-theme'),
		'before_widget' => '<li id="%1$s" class="area-social__widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Área Navegação',
		'id'            => 'widget-nav',
		'description'   => __('Área acima do Menu de Relevância.', 'ifrs-portal-theme'),
		'before_widget' => '<li id="%1$s" class="area-nav__widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Área Home',
		'id'            => 'widget-home',
		'description'   => __('Área principal para banners em destaque.', 'ifrs-portal-theme'),
		'before_widget' => '<div class="col-12 col-md-6 col-lg-4"><div id="%1$s" class="area-home__widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Área Home Lateral',
		'id'            => 'widget-home-side',
		'description'   => __('Área lateral abaixo das notícias, para banners ou outros conteúdos.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="area-home-side__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Área Documentos',
		'id'            => 'widget-docs',
		'description'   => __('Área abaixo das notícias, para os documentos.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="area-docs__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Área Galeria',
		'id'            => 'widget-gallery',
		'description'   => __('Área central na página inicial, para imagens ou fotos.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="area-gallery__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="area-gallery__widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name'          => 'Área Atalhos',
		'id'            => 'widget-atalhos',
		'description'   => __('Área de atalhos para acesso rápido na página inicial.', 'ifrs-portal-theme'),
		'before_widget' => '<li id="%1$s" class="area-atalhos__widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="area-atalhos__widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => 'Área Banners',
		'id'            => 'widget-banners',
		'description'   => __('Área mais abaixo na página inicial, antes do rodapé.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="widget area-banners__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
	register_sidebar(array(
		'name'          => 'Área Rodapé',
		'id'            => 'widget-footer',
		'description'   => __('Área no rodapé, após o mapa do site.', 'ifrs-portal-theme'),
		'before_widget' => '<div id="%1$s" class="area-rodape__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
}
add_action( 'widgets_init', 'portal_widgets_init' );
