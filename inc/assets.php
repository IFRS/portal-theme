<?php
add_action('wp_enqueue_scripts', function() {
    /* Styles */
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */
    /* wp_enqueue_style( $handle[, $src, $deps, $ver, $media] ); */

    if (!is_admin()) {
        wp_dequeue_style( 'wp-block-library' );
        wp_deregister_style( 'wp-block-library' );
    }

    wp_enqueue_style('vendor', get_template_directory_uri(). '/css/vendor.css', array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/vendor.css'), 'all');

    wp_enqueue_style('portal', get_template_directory_uri(). '/css/portal.css', array('vendor'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/portal.css'), 'all');

    /* Pages */
    wp_register_style('front-page', get_template_directory_uri(). '/css/page_front-page.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_front-page.css'), 'all');
    wp_register_style('home', get_template_directory_uri(). '/css/page_home.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_home.css'), 'all');
    wp_register_style('search', get_template_directory_uri(). '/css/page_search.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_search.css'), 'all');
    wp_register_style('single', get_template_directory_uri(). '/css/page_single.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_single.css'), 'all');
    wp_register_style('page', get_template_directory_uri(). '/css/page_page.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_page.css'), 'all');
    wp_register_style('concursos', get_template_directory_uri(). '/css/page_concursos.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_concursos.css'), 'all');
    wp_register_style('documentos', get_template_directory_uri(). '/css/page_documentos.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_documentos.css'), 'all');
    wp_register_style('editais', get_template_directory_uri(). '/css/page_editais.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_editais.css'), 'all');
    wp_register_style('cursos', get_template_directory_uri(). '/css/page_cursos.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/page_cursos.css'), 'all');

    /* Partials */
    wp_register_style('share', get_template_directory_uri(). '/css/partial_share.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/partial_share.css'), 'all');
    wp_register_style('posts-by-category', get_template_directory_uri(). '/css/partial_posts-by-category.css', array('portal'), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/partial_posts-by-category.css'), 'all');

    /* Scripts */
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */
    /* wp_enqueue_script( $handle[, $src, $deps, $ver, $in_footer] ); */

    wp_enqueue_script('ie-lt9', get_template_directory_uri(). '/js/ie-lt9.js', array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/ie-lt9.js'), false);
    wp_script_add_data('ie-lt9', 'conditional', 'lt IE 9');

    wp_enqueue_script('commons', get_template_directory_uri(). '/js/commons.js', array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/commons.js'), true);

    wp_enqueue_script('portal', get_template_directory_uri(). '/js/portal.js', array('commons'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/portal.js'), true);

    if (!WP_DEBUG) {
        wp_enqueue_script('vlibras', 'https://vlibras.gov.br/app/vlibras-plugin.js', array(), null, true);
    }

    /* Conditionals */
    if (is_front_page()) {
        wp_enqueue_style('front-page');
    }

    if (is_home() || is_category() || is_tag() || is_tax('escopo')) {
        wp_enqueue_style('home');
    }

    if (is_search()) {
        wp_enqueue_style('search');
    }

    if (is_single()) {
        wp_enqueue_style('single');
    }

    if (is_page()) {
        wp_enqueue_style('page');
    }

    if (
        is_post_type_archive('concurso') ||
        is_singular('concurso') ||
        is_tax('concurso_status')
    ) {
        wp_enqueue_style('concursos');
    }

    if (
        is_post_type_archive('documento') ||
        is_singular('documento') ||
        is_tax('documento_origin') ||
        is_tax('documento_type')
    ) {
        wp_enqueue_style('documentos');
    }

    if (
        is_post_type_archive('edital') ||
        is_singular('edital') ||
        is_tax('edital_category') ||
        is_tax('edital_status')
    ) {
        wp_enqueue_style('editais');
    }

    if (
        is_post_type_archive('curso') ||
        is_singular('curso') ||
        is_tax('curso_modalidade') ||
        is_tax('curso_nivel') ||
        is_tax('curso_turno') ||
        is_tax('curso_unidade') ||
        is_page( 'cursos' )
    ) {
        wp_enqueue_style('cursos');
    }

    if (
        is_post_type_archive('concurso') ||
        is_post_type_archive('documento') ||
        is_tax('documento_origin') ||
        is_tax('documento_type') ||
        is_post_type_archive('edital') ||
        is_tax('edital_category') ||
        is_tax('edital_status') ||
        is_singular('concurso') ||
        is_singular('documento') ||
        is_singular('edital')
    ) {
        wp_enqueue_style('datatables', get_template_directory_uri(). '/css/datatables.css', array(), WP_DEBUG ? null : filemtime(get_template_directory() . '/css/datatables.css'), 'all');
        wp_enqueue_script('datatables', get_template_directory_uri(). '/js/datatables.js', array('commons'), WP_DEBUG ? null : filemtime(get_template_directory() . '/js/datatables.js'), true);
    }
}, 1);

add_filter('script_loader_tag', function($tag, $handle) {
    $scripts_to_defer = array('vlibras');
    $scripts_to_async = array('datatables');

    foreach ($scripts_to_defer as $defer_script) {
        if ($defer_script === $handle) {
            return str_replace(' src', ' defer="defer" src', $tag);
        }
    }

    foreach ($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' async="async" src', $tag);
        }
    }

    return $tag;
}, 2, 2);
