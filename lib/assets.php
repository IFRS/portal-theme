<?php
function portal_load_styles() {
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */
    /* wp_enqueue_style( $handle[, $src, $deps, $ver, $media] ); */

    wp_enqueue_style('css-vendor', get_stylesheet_directory_uri().(WP_DEBUG ? '/css/vendor.css' : '/css/vendor.min.css'), array(), null, 'all');

    wp_enqueue_style('css-app', get_stylesheet_directory_uri().(WP_DEBUG ? '/css/app.css' : '/css/app.min.css'), array(), null, 'all');
}

function portal_load_scripts() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */
    /* wp_enqueue_script( $handle[, $src, $deps, $ver, $in_footer] ); */

    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    wp_enqueue_script( 'ie', get_stylesheet_directory_uri().(WP_DEBUG ? '/js/ie.js' : '/js/ie.min.js'), array(), null, false );
    wp_script_add_data( 'ie', 'conditional', 'lt IE 9' );

    wp_enqueue_script('app', get_stylesheet_directory_uri().(WP_DEBUG ? '/js/app.js' : '/js/app.min.js'), array(), null, false);

    if (!WP_DEBUG) wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), null, true );

    if (WP_DEBUG) wp_enqueue_script( 'livereload-config', get_template_directory_uri().'/src/livereload-config.js', array(), null, true );
}

add_action( 'wp_enqueue_scripts', 'portal_load_styles', 1 );
add_action( 'wp_enqueue_scripts', 'portal_load_scripts', 1 );
