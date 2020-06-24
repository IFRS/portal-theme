<?php
add_action('wp_enqueue_scripts', function() {
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */
    /* wp_enqueue_style( $handle[, $src, $deps, $ver, $media] ); */

    if (!is_admin()) {
        wp_dequeue_style( 'wp-block-library' );
        wp_deregister_style( 'wp-block-library' );
    }

    wp_enqueue_style('css-vendor', get_template_directory_uri().(WP_DEBUG ? '/css/vendor.css' : '/css/vendor.min.css'), array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/vendor.min.css'), 'all');

    wp_enqueue_style('css-portal', get_template_directory_uri().(WP_DEBUG ? '/css/portal.css' : '/css/portal.min.css'), array('css-vendor'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/portal.min.css'), 'all');
}, 1);

add_action('wp_enqueue_scripts', function() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */
    /* wp_enqueue_script( $handle[, $src, $deps, $ver, $in_footer] ); */

    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    wp_enqueue_script('js-ie', get_template_directory_uri().(WP_DEBUG ? '/js/ie.js' : '/js/ie.min.js'), array('js-commons'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/ie.min.js'), false);
    wp_script_add_data('js-ie', 'conditional', 'lt IE 9');

    wp_enqueue_script('js-commons', get_template_directory_uri().(WP_DEBUG ? '/js/commons.js' : '/js/commons.min.js'), array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/commons.min.js'), true);
    wp_enqueue_script('js-portal', get_template_directory_uri().(WP_DEBUG ? '/js/portal.js' : '/js/portal.min.js'), array('js-commons'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/portal.min.js'), true);

    if (
        is_post_type_archive('concurso') ||
        is_post_type_archive('documento') ||
        is_post_type_archive('edital') ||
        is_singular('concurso') ||
        is_singular('documento') ||
        is_singular('edital')
    ) {
        wp_enqueue_script('js-datatables', get_template_directory_uri().(WP_DEBUG ? '/js/datatables.js' : '/js/datatables.min.js'), array('js-commons', 'js-portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/datatables.min.js'), true);
    }

    if (!WP_DEBUG) {
        wp_enqueue_script('js-barra-brasil', 'https://barra.brasil.gov.br/barra.js', array(), null, true);
    }
}, 1);

add_filter('script_loader_tag', function($tag, $handle) {
    $scripts_to_defer = array('js-barra-brasil');

    foreach ($scripts_to_defer as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer="defer" src', $tag);
        }
    }

    return $tag;
}, 2, 2);

add_filter('script_loader_tag', function($tag, $handle) {
    $scripts_to_async = array();

    foreach ($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' async="async" src', $tag);
        }
    }

    return $tag;
}, 2, 2);
