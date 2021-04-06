<?php
add_action('after_setup_theme', function()  {
    // Remove Gutenberg custom options
    add_theme_support('editor-color-palette');
    add_theme_support('editor-gradient-presets');
    add_theme_support('disable-custom-colors');
    add_theme_support('disable-custom-gradients');
    add_theme_support('disable-custom-font-sizes');
    add_theme_support('custom-units', array());

    // Add theme support for Automatic Feed Links
    add_theme_support('automatic-feed-links');

    // Habilita título automático
    add_theme_support('title-tag');

    // Habilita imagens de destaque em posts
    add_theme_support('post-thumbnails');

    // Add theme support for Responsive Embeds
    add_theme_support('responsive-embeds');

    // Registra a imagem padrão para o cabeçalho
    register_default_headers(array(
        'default-image' => array(
            'url'           => '%s/img/header-default.png',
            'thumbnail_url' => '%s/img/header-default-thumb.png',
            'description'   => __('Imagem de Cabeçalho Padrão', 'ifrs-portal-theme')
        ),
    ));

    // Habilita a personalização da imagem de cabeçalho
    add_theme_support('custom-header', array(
        'default-image'          => get_template_directory_uri() . '/img/header-default.png',
        'width'                  => 585,
        'height'                 => 110,
        'flex-width'             => true,
        'flex-height'            => false,
        'uploads'                => true,
        'random-default'         => false,
        'header-text'            => false,
        'default-text-color'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        'video'                  => true,
        'video-active-callback'  => '',
    ));
});
