<?php
function portal_load_styles() {
    /* wp_register_style( $handle, $src, $deps, $ver, $media ); */

    wp_enqueue_style('css-ifrs-portal-theme', get_stylesheet_directory_uri().(WP_DEBUG ? '/css/ifrs-portal-theme.css' : '/css/ifrs-portal-theme.min.css'), array(), false, 'all');

    wp_enqueue_style( 'css-fancybox', get_stylesheet_directory_uri().'/vendor/fancybox/source/jquery.fancybox.css', array(), false, 'screen' );

    wp_enqueue_style( 'css-slicknav', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/slicknav/dist/slicknav.css' : '/vendor/slicknav/dist/slicknav.min.css'), array(), false, 'screen' );

    wp_register_style( 'css-datatables', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/css/jquery.dataTables.css' : '/vendor/datatables/media/css/jquery.dataTables.min.css'), array(), false, 'screen' );
    wp_register_style( 'css-datatables-bootstrap', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/css/dataTables.bootstrap.css' : '/vendor/datatables/media/css/dataTables.bootstrap.min.css'), array(), false, 'screen' );

    if (is_post_type_archive( 'edital' ) || is_tax('edital_category') || is_post_type_archive( 'concurso' )) {
        wp_enqueue_style('css-datatables-bootstrap');
    }
}

function portal_load_scripts() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */

    if ( ! is_admin() ) {
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

    wp_enqueue_script('jquery-flex-vertical', get_stylesheet_directory_uri().'/vendor/jQuery-Flex-Vertical-Center/jquery.flexverticalcenter.js', array('jquery'), false, true);
    wp_enqueue_script('vertical-align', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/vertical-align.js' : '/js/vertical-align.min.js'), array('jquery-flex-vertical'), false, true);

    wp_enqueue_script( 'slicknav', get_template_directory_uri().(WP_DEBUG ? '/vendor/slicknav/dist/jquery.slicknav.js' : '/vendor/slicknav/dist/jquery.slicknav.min.js'), array(), false, true );
    wp_enqueue_script( 'slicknav-config', get_template_directory_uri().(WP_DEBUG ? '/src/slicknav-config.js' : '/js/slicknav-config.min.js'), array('slicknav'), false, true );

    wp_enqueue_script('menu', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/menu.js' : '/js/menu.min.js'), array('bootstrap'), false, true);

    wp_enqueue_script( 'masonry-custom', get_template_directory_uri().(WP_DEBUG ? '/vendor/masonry/dist/masonry.pkgd.js' : '/vendor/masonry/dist/masonry.pkgd.min.js'), array(), false, true );
    wp_enqueue_script( 'masonry-config', get_template_directory_uri().(WP_DEBUG ? '/src/masonry-config.js' : '/js/masonry-config.min.js'), array('masonry-custom'), false, true );

    wp_enqueue_script( 'picturefill', get_template_directory_uri().(WP_DEBUG ? '/vendor/picturefill/dist/picturefill.js' : '/vendor/picturefill/dist/picturefill.min.js'), array(), false, true );
    wp_enqueue_script( 'picturefill-config', get_template_directory_uri().(WP_DEBUG ? '/src/picturefill-config.js' : '/js/picturefill-config.min.js'), array('picturefill'), false, true );

    wp_enqueue_script( 'lazysizes', get_template_directory_uri().(WP_DEBUG ? '/vendor/lazysizes/lazysizes.js' : '/vendor/lazysizes/lazysizes.min.js'), array(), false, true );
    wp_enqueue_script( 'lazysizes-config', get_template_directory_uri().(WP_DEBUG ? '/src/lazysizes-config.js' : '/js/lazysizes-config.min.js'), array('lazysizes'), false, true );

    wp_enqueue_script( 'jquery-fancybox', get_stylesheet_directory_uri().'/vendor/fancybox/source/jquery.fancybox.pack.js', array('jquery'), false, true );
    wp_register_script('fancybox-config', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/fancybox-config.js' : '/js/fancybox-config.min.js'), array('jquery-fancybox'), false, true);

    wp_register_script( 'moment', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/moment/min/moment-with-locales.js' : '/vendor/moment/min/moment-with-locales.min.js'), array('jquery'), false, true );

    wp_register_script( 'jquery-datatables', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/js/jquery.dataTables.js' : '/vendor/datatables/media/js/jquery.dataTables.min.js'), array('jquery'), false, true );
    wp_register_script( 'jquery-datatables-bootstrap', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/js/dataTables.bootstrap.js' : '/vendor/datatables/media/js/dataTables.bootstrap.min.js'), array('jquery','jquery-dataTables'), false, true );
    wp_register_script( 'datatables-datetime-moment', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/datatables-datetime-moment.js' : '/js/datatables-datetime-moment.min.js'), array('jquery', 'jquery-datatables'), false, true );
    wp_register_script( 'datatables-config', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/datatables-config.js' : '/js/datatables-config.min.js'), array('jquery', 'jquery-datatables'), false, true );

    wp_register_script( 'add-rel-to-img-link', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/add-rel-to-img-link.js' : '/js/add-rel-to-img-link.min.js'), array('jquery'), false, true );

    wp_register_script( 'documentos', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/documentos.js' : '/js/documentos.min.js'), array('jquery'), false, true );

    if (WP_DEBUG) wp_enqueue_script( 'browser-sync-config', get_template_directory_uri().'/src/browser-sync-config.js', array(), false, true );

    if (!WP_DEBUG) wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), false, true );

    if (is_post_type_archive( 'edital' ) || is_tax('edital_category') || is_post_type_archive( 'concurso' )) {
        wp_enqueue_script('moment');
        wp_enqueue_script('jquery-datatables');
        wp_enqueue_script('jquery-datatables-bootstrap');
        wp_enqueue_script('datatables-datetime-moment');
        wp_enqueue_script('datatables-config');
    }
    if (is_post_type_archive( 'documento' )) {
        wp_enqueue_script('documentos');
    }
    if (is_single()) {
        wp_enqueue_script('add-rel-to-img-link');
        wp_enqueue_script('fancybox-config');
    }
}

add_action( 'wp_enqueue_scripts', 'portal_load_styles', 1 );
add_action( 'wp_enqueue_scripts', 'portal_load_scripts', 1 );
