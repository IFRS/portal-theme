<?php
function load_styles_portal() {
    /* wp_enqueue_style( $handle, $src, $deps, $ver, $media ); */

    if (WP_DEBUG) {
        wp_enqueue_style('css-ifrs-portal-theme', get_stylesheet_directory_uri().'/css/ifrs-portal-theme.css', array(), false, 'all');
        wp_enqueue_style( 'css-prettyPhoto', get_stylesheet_directory_uri().'/vendor/prettyPhoto/css/prettyPhoto.css', array(), false, 'screen' );
        wp_enqueue_style( 'css-slicknav', get_stylesheet_directory_uri().'/vendor/slicknav/dist/slicknav.css', array(), false, 'screen' );
    } else {
        wp_enqueue_style('css-ifrs-portal-theme', get_stylesheet_directory_uri().'/css/ifrs-portal-theme.min.css', array(), false, 'all');
        wp_enqueue_style( 'css-prettyPhoto', get_stylesheet_directory_uri().'/vendor/prettyPhoto/css/prettyPhoto.css', array(), false, 'screen' );
        wp_enqueue_style( 'css-slicknav', get_stylesheet_directory_uri().'/vendor/slicknav/dist/slicknav.min.css', array(), false, 'screen' );
    }

    wp_register_style( 'css-datatables', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/css/jquery.dataTables.css' : '/vendor/datatables/media/css/jquery.dataTables.min.css'), array(), false, 'screen' );

    wp_register_style( 'css-datatables-bootstrap', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/css/dataTables.bootstrap.css' : '/vendor/datatables/media/css/dataTables.bootstrap.min.css'), array(), false, 'screen' );

    if (is_post_type_archive( 'edital' )) {
        wp_enqueue_style('css-datatables-bootstrap');
    }
}

function load_scripts_portal() {
    /* wp_register_script( $handle, $src, $deps, $ver, $in_footer ); */

    if ( ! is_admin() ) {
        wp_deregister_script('jquery');
    }

    if (WP_DEBUG) {
        wp_enqueue_script( 'html5shiv', get_stylesheet_directory_uri().'/vendor/html5shiv/dist/html5shiv.js', array(), false, false );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
        wp_enqueue_script( 'html5shiv-print', get_stylesheet_directory_uri().'/vendor/html5shiv/dist/html5shiv-printshiv.js', array(), false, false );
        wp_script_add_data( 'html5shiv-print', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'respond', get_stylesheet_directory_uri().'/vendor/respond-minmax/dest/respond.src.js', array(), false, false );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
        wp_enqueue_script( 'respond-matchmedia', get_stylesheet_directory_uri().'/vendor/respond-minmax/dest/respond.matchmedia.addListener.src.js', array(), false, false );
        wp_script_add_data( 'respond-matchmedia', 'conditional', 'lt IE 9' );

        // wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri().'/js/modernizr.min.js', array(), false, false );

        wp_enqueue_script( 'jquery', get_stylesheet_directory_uri().'/vendor/jquery/dist/jquery.js', array(), false, false );
        wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri().'/vendor/bootstrap-sass/assets/javascripts/bootstrap.js', array('jquery'), false, false );

        wp_enqueue_script('jquery-flex-vertical', get_stylesheet_directory_uri().'/vendor/jQuery-Flex-Vertical-Center/jquery.flexverticalcenter.js', array('jquery'), false, true);
        wp_enqueue_script('vertical-align', get_stylesheet_directory_uri().'/src/vertical-align.js', array('jquery-flex-vertical'), false, true);

        wp_enqueue_script('menu', get_stylesheet_directory_uri().'/src/menu.js', array('bootstrap'), false, true);

        wp_enqueue_script( 'jquery-prettyPhoto', get_stylesheet_directory_uri().'/vendor/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), false, true );
        wp_enqueue_script('prettyPhoto-config', get_stylesheet_directory_uri().'/src/prettyPhoto-config.js', array(), false, true);

        wp_enqueue_script( 'masonry-custom', get_template_directory_uri().'/vendor/masonry/dist/masonry.pkgd.js', array(), false, true );
        wp_enqueue_script( 'masonry-config', get_template_directory_uri().'/src/masonry-config.js', array('masonry-custom'), false, true );

        wp_enqueue_script( 'slicknav', get_template_directory_uri().'/vendor/slicknav/dist/jquery.slicknav.js', array(), false, true );
        wp_enqueue_script( 'slicknav-config', get_template_directory_uri().'/src/slicknav-config.js', array('slicknav'), false, true );

        wp_enqueue_script( 'picturefill', get_template_directory_uri().'/vendor/picturefill/dist/picturefill.js', array(), false, true );
        wp_enqueue_script( 'picturefill-config', get_template_directory_uri().'/src/picturefill-config.js', array('picturefill'), false, true );

        wp_enqueue_script( 'lazysizes', get_template_directory_uri().'/vendor/lazysizes/lazysizes.js', array(), false, true );
        wp_enqueue_script( 'lazysizes-config', get_template_directory_uri().'/src/lazysizes-config.js', array('lazysizes'), false, true );
    } else {
        wp_enqueue_script( 'html5shiv', get_stylesheet_directory_uri().'/vendor/html5shiv/dist/html5shiv.min.js', array(), false, false );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
        wp_enqueue_script( 'html5shiv-print', get_stylesheet_directory_uri().'/vendor/html5shiv/dist/html5shiv-printshiv.min.js', array(), false, false );
        wp_script_add_data( 'html5shiv-print', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'respond', get_stylesheet_directory_uri().'/vendor/respond-minmax/dest/respond.min.js', array(), false, false );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
        wp_enqueue_script( 'respond-matchmedia', get_stylesheet_directory_uri().'/vendor/respond-minmax/dest/respond.matchmedia.addListener.min.js', array(), false, false );
        wp_script_add_data( 'respond-matchmedia', 'conditional', 'lt IE 9' );

        // wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri().'/js/modernizr.min.js', array(), false, false );

        wp_enqueue_script( 'jquery', get_stylesheet_directory_uri().'/vendor/jquery/dist/jquery.min.js', array(), false, false );
        wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri().'/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js', array('jquery'), false, false );

        wp_enqueue_script('jquery-flex-vertical', get_stylesheet_directory_uri().'/vendor/jQuery-Flex-Vertical-Center/jquery.flexverticalcenter.js', array('jquery'), false, true);
        wp_enqueue_script('vertical-align', get_stylesheet_directory_uri().'/js/vertical-align.min.js', array('jquery-flex-vertical'), false, true);

        wp_enqueue_script('menu', get_stylesheet_directory_uri().'/js/menu.min.js', array('bootstrap'), false, true);

        wp_enqueue_script( 'jquery-prettyPhoto', get_stylesheet_directory_uri().'/vendor/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), false, true );
        wp_enqueue_script('prettyPhoto-config', get_stylesheet_directory_uri().'/js/prettyPhoto-config.min.js', array(), false, true);

        wp_enqueue_script( 'masonry-custom', get_template_directory_uri().'/vendor/masonry/dist/masonry.pkgd.min.js', array(), false, true );
        wp_enqueue_script( 'masonry-config', get_template_directory_uri().'/js/masonry-config.min.js', array('masonry-custom'), false, true );

        wp_enqueue_script( 'slicknav', get_template_directory_uri().'/vendor/slicknav/dist/jquery.slicknav.min.js', array(), false, true );
        wp_enqueue_script( 'slicknav-config', get_template_directory_uri().'/js/slicknav-config.min.js', array('slicknav'), false, true );

        wp_enqueue_script( 'picturefill', get_template_directory_uri().'/vendor/picturefill/dist/picturefill.min.js', array(), false, true );
        wp_enqueue_script( 'picturefill-config', get_template_directory_uri().'/js/picturefill-config.min.js', array('picturefill'), false, true );

        wp_enqueue_script( 'lazysizes', get_template_directory_uri().'/vendor/lazysizes/lazysizes.min.js', array(), false, true );
        wp_enqueue_script( 'lazysizes-config', get_template_directory_uri().'/js/lazysizes-config.min.js', array('lazysizes'), false, true );

        wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), false, true );
    }

    wp_register_script( 'jquery-datatables', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/js/jquery.dataTables.js' : '/vendor/datatables/media/js/jquery.dataTables.min.js'), array('jquery'), false, true );
    wp_register_script( 'jquery-datatables-bootstrap', get_stylesheet_directory_uri().(WP_DEBUG ? '/vendor/datatables/media/js/dataTables.bootstrap.js' : '/vendor/datatables/media/js/dataTables.bootstrap.min.js'), array('jquery','jquery-dataTables'), false, true );
    wp_register_script( 'datatables-config', get_stylesheet_directory_uri().(WP_DEBUG ? '/src/datatables-config.js' : '/js/datatables-config.min.js'), array('jquery', 'jquery-datatables'), false, true );

    if (is_post_type_archive( 'edital' )) {
        wp_enqueue_script('jquery-datatables');
        wp_enqueue_script('jquery-datatables-bootstrap');
        wp_enqueue_script('datatables-config');
    }
}

add_action( 'wp_enqueue_scripts', 'load_styles_portal', 1 );
add_action( 'wp_enqueue_scripts', 'load_scripts_portal', 1 );
