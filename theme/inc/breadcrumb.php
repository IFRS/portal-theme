<?php
/* Yoast SEO Breadcrumb */
add_filter( 'wpseo_breadcrumb_output_wrapper', function( string $output ) {
  $output = 'ol';

  return $output;
} );

add_filter( 'wpseo_breadcrumb_output_class', function( $class ) {
  return 'breadcrumb';
} );

add_filter( 'wpseo_breadcrumb_single_link_wrapper', function( string $output ) {
  $output = 'li';

  return $output;
} );

add_filter( 'wpseo_breadcrumb_separator', function( string $output ) {
  $output = '';

  return $output;
} );

add_filter( 'wpseo_breadcrumb_single_link', function( $link ) {
  if (strpos($link, 'breadcrumb_last') !== false) {
    if (preg_match('/class="([^"]*)"/', $link)) {
      $link = preg_replace('/class="([^"]*)"/', 'class="breadcrumb-item active"', $link, 1);
    } else {
      $link = preg_replace('/<li(\s|>)/', '<li class="breadcrumb-item active"$1', $link, 1);
    }
  } else {
    if (preg_match('/<li\s+class="([^"]*)"/', $link)) {
      $link = preg_replace('/<li\s+class="([^"]*)"/', '<li class="$1 breadcrumb-item"', $link, 1);
    } else {
      $link = preg_replace('/<li(\s|>)/', '<li class="breadcrumb-item"$1', $link, 1);
    }
  }

	return $link;
} );
