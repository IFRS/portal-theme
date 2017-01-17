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

        wp_enqueue_script( 'js-barra-brasil', '//barra.brasil.gov.br/barra.js', array(), false, true );
    }
}

add_action( 'wp_enqueue_scripts', 'load_styles_portal', 1 );
add_action( 'wp_enqueue_scripts', 'load_scripts_portal', 1 );
