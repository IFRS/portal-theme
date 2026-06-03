<?php
add_filter( 'wpseo_meta_author', '__return_false' );

add_filter( 'wpseo_metadesc', function( $description ) {
  if ( !$description || $description == '' ) {
    $description = __('O IFRS é uma instituição federal de ensino público e gratuito. Atua com uma estrutura multicampi para promover a educação profissional e tecnológica de excelência e impulsionar o desenvolvimento sustentável das regiões.', 'ifrs-portal-theme');
  }
  return $description;
} );
