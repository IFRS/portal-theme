<?php
add_filter( 'wpseo_meta_author', '__return_false' );

add_filter( 'wpseo_metadesc', function( $description ) {
  if ( !$description || $description == '' ) {
    $description = __('O IFRS é uma instituição federal de ensino público e gratuito. Atua com uma estrutura multicampi para promover a educação profissional e tecnológica de excelência e impulsionar o desenvolvimento sustentável das regiões.', 'ifrs-portal-theme');
  }
  return $description;
} );

add_action('wp_head', function() {
?>
  <meta name="author" content="<?php _e('Departamento de Comunicação do Instituto Federal do Rio Grande do Sul', 'ifrs-portal-theme'); ?>">
  <meta name="keywords" content="<?php _e('ifrs, portal, site, institucional, faculdade, universidade, ensino, pesquisa, extensão, cursos', 'ifrs-portal-theme'); ?>">
<?php
});
