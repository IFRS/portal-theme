<?php
/**
 * Featured Image Fallback
 * Adiciona uma imagem padrão quando o post não tem imagem destacada
 * Funciona apenas em query loops (listagens), não em single posts
 */

add_filter('render_block_core/post-featured-image', function($output, $block) {
  global $post;

  // Verifica se está dentro de um query loop (listagem) e não na página single
  $is_query_loop = !is_singular() || is_front_page();

  // Verifica se o post existe e não tem imagem destacada
  if ($is_query_loop && empty($output) && $post) {
    // Define a URL da imagem padrão
    $fallback_image_url = get_theme_file_uri('/img/noticia-placeholder2.jpg');

    // Extrai os atributos do bloco para manter as dimensões e alinhamento
    $attributes = isset($block['attrs']) ? $block['attrs'] : array();
    $width = isset($attributes['width']) ? $attributes['width'] : 'auto';
    $align = isset($attributes['align']) ? 'align' . $attributes['align'] : '';

    // Monta a tag img com a imagem fallback
    $output = sprintf(
      '<figure class="wp-block-post-featured-image %s"><img src="%s" alt="" style="width: %s;" loading="lazy" /></figure>',
      esc_attr($align),
      esc_url($fallback_image_url),
      esc_attr($width)
    );
  }

  return $output;
}, 10, 2);
