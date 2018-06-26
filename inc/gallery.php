<?php
/**
 * Gallery Default Settings
 * @param Array $settings
 * @return Array $settings
*/
function theme_gallery_defaults( $settings ) {
    $settings['galleryDefaults']['columns'] = 4;
    return $settings;
}
add_filter( 'media_view_settings', 'theme_gallery_defaults' );

// Desabilita os estilos padrão para galerias.
add_filter( 'use_default_gallery_style', '__return_false' );
