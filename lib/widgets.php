<?php
function portal_widgets_init() {
	register_sidebar(array(
		'name' => 'Widget Navegação',
		'id' => 'widget-nav',
		'description' => 'widget acima do Menu de Relevância.',
		'before_widget' => '<div id="%1$s" class="widget widget-nav %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="sr-only">',
		'after_title'   => '</span>',
	));
}
add_action( 'widgets_init', 'portal_widgets_init' );
