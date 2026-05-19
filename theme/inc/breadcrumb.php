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
  if ( strpos( $link, 'breadcrumb_last' ) !== false ) {
    $link = str_replace( 'breadcrumb_last', 'breadcrumb-item active', $link );
  } else {
    $link = str_replace( '<li>', '<li class="breadcrumb-item">', $link );
  }

	return $link;
} );
