<?php
add_filter('embed_oembed_html', function($html, $url, $attr, $post_ID) {
  if (stripos($html, '<iframe ') !== false) {
    if (stripos($html, ' loading=') === false) {
      $html = preg_replace('/<iframe\s/i', '<iframe loading="lazy" ', $html, 1);
    }
  }

  return $html;
}, 10, 4);
