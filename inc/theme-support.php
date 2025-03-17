<?php
if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

add_action('after_setup_theme', function()  {
    // Add theme support for Automatic Feed Links
    add_theme_support('automatic-feed-links');

    // Habilita título automático
    add_theme_support('title-tag');

    // Habilita imagens de destaque em posts
    add_theme_support('post-thumbnails');

    // Add theme support for Responsive Embeds
    add_theme_support('responsive-embeds');

    // Adiciona a possibilidade de logo personalizado
    add_theme_support('custom-logo', array(
        'height'               => 110,
        'width'                => 760,
        'flex-height'          => false,
        'flex-width'           => true,
        'header-text'          => array('title-link', 'title-img', 'title-campus'),
        'unlink-homepage-logo' => false,
    ));
});
