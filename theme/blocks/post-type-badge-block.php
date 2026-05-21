<?php
/**
 * Bloco dinâmico para exibir badge do post type no contexto do Query Loop.
 */

function portal_render_post_type_badge_block($attributes = array(), $content = '', $block = null) {
  $post_id = 0;

  if (is_object($block) && !empty($block->context['postId'])) {
    $post_id = (int) $block->context['postId'];
  }

  if (!$post_id) {
    $post_id = get_the_ID();
  }

  if (!$post_id) {
    return '';
  }

  $post_type = get_post_type($post_id);
  $post_type_obj = $post_type ? get_post_type_object($post_type) : null;

  if (!$post_type_obj || empty($post_type_obj->labels->singular_name)) {
    return '';
  }

  return '<span class="badge text-bg-secondary">' . esc_html($post_type_obj->labels->singular_name) . '</span>';
}

function portal_register_post_type_badge_block() {
  register_block_type('portal/post-type-badge', array(
    'api_version' => 2,
    'render_callback' => 'portal_render_post_type_badge_block',
  ));
}
add_action('init', 'portal_register_post_type_badge_block');
