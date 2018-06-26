<?php
function esw_author_cap_filter( $allowedposttags ) {
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
}
add_filter( 'wp_kses_allowed_html', 'esw_author_cap_filter', 1, 1 );
