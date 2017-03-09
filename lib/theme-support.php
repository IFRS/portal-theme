<?php
function portal_theme_features()  {
    // Habilita títulos automáticos
    add_theme_support('title-tag');

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
        'width'                  => 350,
        'height'                 => 120,
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

    // Habilita imagens de destaque em posts
    add_theme_support('post-thumbnails');

    // Habilita o suporte para links automáticos de Feed
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'portal_theme_features');
