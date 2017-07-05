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

    wp_enqueue_script( 'html5shiv', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/html5shiv/dist/html5shiv.js' : '/vendor/html5shiv/dist/html5shiv.min.js'), array(), false, false );
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'html5shiv-print', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/html5shiv/dist/html5shiv-printshiv.js' : '/vendor/html5shiv/dist/html5shiv-printshiv.min.js'), array(), false, false );
    wp_script_add_data( 'html5shiv-print', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'respond', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/respond-minmax/dest/respond.src.js' : '/vendor/respond-minmax/dest/respond.min.js'), array(), false, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'respond-matchmedia', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/respond-minmax/dest/respond.matchmedia.addListener.src.js' : '/vendor/respond-minmax/dest/respond.matchmedia.addListener.min.js'), array(), false, false );
    wp_script_add_data( 'respond-matchmedia', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/jquery/dist/jquery.js' : '/vendor/jquery/dist/jquery.min.js'), array(), false, false );
    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/bootstrap-sass/assets/javascripts/bootstrap.js' : '/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js'), array('jquery'), false, false );

    wp_enqueue_script( 'moment', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/moment/min/moment-with-locales.js' : '/vendor/moment/min/moment-with-locales.min.js'), array('jquery'), false, false );
    wp_enqueue_script( 'jquery-datatables', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/js/jquery.dataTables.js' : '/vendor/datatables/media/js/jquery.dataTables.min.js'), array('jquery'), false, false );
    wp_enqueue_script( 'jquery-datatables-bootstrap', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/js/dataTables.bootstrap.js' : '/vendor/datatables/media/js/dataTables.bootstrap.min.js'), array('jquery','jquery-datatables'), false, false );
    wp_enqueue_script( 'jquery-datatables-datetime-moment', get_stylesheet_directory_uri().'/vendor/datatables-plugins/sorting/datetime-moment.js', array('jquery','jquery-datatables'), false, false );

    wp_enqueue_script( 'slicknav', get_template_directory_uri().(WP_DEBUG ? '/vendor/slicknav/dist/jquery.slicknav.js' : '/vendor/slicknav/dist/jquery.slicknav.min.js'), array(), false, false );
    wp_enqueue_script( 'masonry-custom', get_template_directory_uri().(WP_DEBUG ? '/vendor/masonry/dist/masonry.pkgd.js' : '/vendor/masonry/dist/masonry.pkgd.min.js'), array(), false, false );
    wp_enqueue_script( 'picturefill', get_template_directory_uri().(WP_DEBUG ? '/vendor/picturefill/dist/picturefill.js' : '/vendor/picturefill/dist/picturefill.min.js'), array(), false, false );
    wp_enqueue_script( 'lazysizes', get_template_directory_uri().(WP_DEBUG ? '/vendor/lazysizes/lazysizes.js' : '/vendor/lazysizes/lazysizes.min.js'), array(), false, false );
    wp_enqueue_script( 'jquery-fancybox', get_stylesheet_directory_uri().'/vendor/fancybox/source/jquery.fancybox.pack.js', array('jquery'), false, false );
    wp_enqueue_script('jquery-flex-vertical', get_stylesheet_directory_uri().'/vendor/jQuery-Flex-Vertical-Center/jquery.flexverticalcenter.js', array('jquery'), false, false);

    wp_enqueue_script('app', get_stylesheet_directory_uri().(WP_DEBUG ? '/js/app.js' : '/js/app.min.js'), array(), false, true);

    if (!WP_DEBUG) wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), false, true );

    if (WP_DEBUG) wp_enqueue_script( 'livereload-config', get_template_directory_uri().'/src/livereload-config.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'portal_load_styles', 1 );
add_action( 'wp_enqueue_scripts', 'portal_load_scripts', 1 );
