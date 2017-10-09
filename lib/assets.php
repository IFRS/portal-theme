<?php
function portal_load_styles() {
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */
    /* wp_enqueue_style( $handle[, $src, $deps, $ver, $media] ); */

    wp_enqueue_style('css-portal', get_template_directory_uri().(WP_DEBUG ? '/css/portal.css' : '/css/portal.min.css'), array(), null, 'all');
}

function portal_load_scripts() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */
    /* wp_enqueue_script( $handle[, $src, $deps, $ver, $in_footer] ); */

    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    wp_enqueue_script( 'js-ie', get_template_directory_uri().(WP_DEBUG ? '/js/ie.js' : '/js/ie.min.js'), array(), null, false );
    wp_script_add_data( 'js-ie', 'conditional', 'lt IE 9' );

    wp_enqueue_script('js-portal', get_template_directory_uri().(WP_DEBUG ? '/js/portal.js' : '/js/portal.min.js'), array(), null, true);

    if (!WP_DEBUG) {
        wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), null, true );
    }

    if (WP_DEBUG) {
        wp_enqueue_script( 'livereload', get_template_directory_uri().'/src/livereload.js', array(), null, true );
    }
}

add_action( 'wp_enqueue_scripts', 'portal_load_styles', 1 );
add_action( 'wp_enqueue_scripts', 'portal_load_scripts', 1 );
