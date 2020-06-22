<?php
/**
 * Gallery Default Settings
 * @param Array $settings
 * @return Array $settings
*/
add_filter( 'media_view_settings', function( $settings ) {
    $settings['galleryDefaults']['columns'] = 4;
    return $settings;
} );

// Desabilita os estilos padrão para galerias.
add_filter( 'use_default_gallery_style', '__return_false' );
