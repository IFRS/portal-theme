<?php
if ( ! isset( $content_width ) ) {
	$content_width = 1296;
}

add_action('after_setup_theme', function()  {
  // Add theme support for HTML5 markup.
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'meta',
    'style',
    'script',
  ));

  // Add theme support for Editor Styles
  add_theme_support('editor-styles');

  // Add theme support for Block Styles
  add_theme_support('wp-block-styles');

  // Add theme support for Automatic Feed Links
  add_theme_support('automatic-feed-links');

  // Habilita título automático
  add_theme_support('title-tag');

  // Habilita imagens de destaque em posts
  add_theme_support('post-thumbnails');

  // Add theme support for Responsive Embeds
  add_theme_support('responsive-embeds');

  // Add theme support for Wide Alignment
  add_theme_support('align-wide');

  // Adiciona a possibilidade de logo personalizado
  add_theme_support('custom-logo', array(
    'height'               => 110,
    'width'                => 760,
    'flex-height'          => false,
    'flex-width'           => true,
    'header-text'          => array('header__title'),
    'unlink-homepage-logo' => false,
  ));
  // Remove core block patterns
  remove_theme_support( 'core-block-patterns' );
});
