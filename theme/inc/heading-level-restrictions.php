<?php

/**
 * Remove H1 from heading-level selectors in core heading-like blocks.
 *
 * This runs on the server so editor settings inherit the restriction with
 * priority over client-side defaults.
 */
add_filter('register_block_type_args', function($args, $block_type) {
  $heading_blocks = array(
    'core/heading',
    'core/comments-title',
    'core/post-title',
    'core/query-title',
    'core/site-tagline',
    'core/site-title',
    'core/term-name',
  );

  if (!in_array($block_type, $heading_blocks, true)) {
    return $args;
  }

  if (!isset($args['attributes']) || !is_array($args['attributes'])) {
    $args['attributes'] = array();
  }

  if (!isset($args['attributes']['levelOptions']) || !is_array($args['attributes']['levelOptions'])) {
    $args['attributes']['levelOptions'] = array();
  }

  $args['attributes']['levelOptions'] = array_merge(
    $args['attributes']['levelOptions'],
    array(
      'type' => 'array',
      'default' => array(2, 3, 4, 5, 6),
      'items' => array(
        'type' => 'number',
      ),
    )
  );

  return $args;
}, 10, 2);
