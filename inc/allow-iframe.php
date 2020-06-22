<?php
add_filter( 'wp_kses_allowed_html', function( $allowedposttags ) {
    if ( !current_user_can( 'administrator' ) ) {
        return $allowedposttags;
    }

    $allowedposttags['iframe'] = array(
        'align'        => true,
        'width'        => true,
        'height'       => true,
        'frameborder'  => true,
        'name'         => true,
        'src'          => true,
        'id'           => true,
        'class'        => true,
        'style'        => true,
        'scrolling'    => true,
        'marginwidth'  => true,
        'marginheight' => true,
    );

    return $allowedposttags;
}, 1, 1 );
