<?php
function portal_load_styles() {
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */
    /* wp_enqueue_style( $handle[, $src, $deps, $ver, $media] ); */

    wp_enqueue_style('css-portal', get_template_directory_uri().(WP_DEBUG ? '/css/portal.css' : '/css/portal.min.css'), array(), WP_DEBUG ? null : filemtime(get_stylesheet_directory() . '/css/portal.min.css'), 'all');
}

function portal_load_scripts() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */
    /* wp_enqueue_script( $handle[, $src, $deps, $ver, $in_footer] ); */

    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    wp_enqueue_script( 'js-ie', get_template_directory_uri().(WP_DEBUG ? '/js/ie.js' : '/js/ie.min.js'), array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/ie.min.js'), false );
    wp_script_add_data( 'js-ie', 'conditional', 'lt IE 9' );

    wp_enqueue_script('js-portal', get_template_directory_uri().(WP_DEBUG ? '/js/portal.js' : '/js/portal.min.js'), array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/portal.min.js'), true);

    if (!WP_DEBUG) {
        wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), null, true );
    }
}

function add_defer_attribute($tag, $handle) {
    $scripts_to_defer = array('js-barra-brasil');

    foreach ($scripts_to_defer as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer="defer" src', $tag);
        }
    }

    return $tag;
}

function add_async_attribute($tag, $handle) {
    $scripts_to_async = array();

    foreach ($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' async="async" src', $tag);
        }
    }

    return $tag;
}

add_action('wp_enqueue_scripts', 'portal_load_styles', 1);
add_action('wp_enqueue_scripts', 'portal_load_scripts', 1);
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
