<?php
add_action('wp_enqueue_scripts', function() {
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */
    /* wp_enqueue_style( $handle[, $src, $deps, $ver, $media] ); */

    if (!is_admin()) {
        wp_dequeue_style( 'wp-block-library' );
        wp_deregister_style( 'wp-block-library' );
    }

    wp_enqueue_style('css-vendor', get_template_directory_uri(). '/css/vendor.css', array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/vendor.css'), 'all');

    wp_enqueue_style('css-portal', get_template_directory_uri(). '/css/portal.css', array('css-vendor'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/portal.css'), 'all');
}, 1);

add_action('wp_enqueue_scripts', function() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */
    /* wp_enqueue_script( $handle[, $src, $deps, $ver, $in_footer] ); */

    if (!is_admin()) {
        wp_deregister_script('jquery');
    }

    wp_enqueue_script('js-commons', get_template_directory_uri(). '/js/commons.js', array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/commons.js'), true);

    wp_enqueue_script('js-ie', get_template_directory_uri(). '/js/ie.js', array('js-commons'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/ie.js'), false);
    wp_script_add_data('js-ie', 'conditional', 'lt IE 9');

    wp_enqueue_script('js-portal', get_template_directory_uri(). '/js/portal.js', array('js-commons'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/portal.js'), true);

    if (
        is_post_type_archive('concurso') ||
        is_post_type_archive('documento') ||
        is_post_type_archive('edital') ||
        is_singular('concurso') ||
        is_singular('documento') ||
        is_singular('edital')
    ) {
        wp_enqueue_script('js-datatables', get_template_directory_uri(). '/js/datatables.js', array('js-commons', 'js-portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/datatables.js'), true);
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
