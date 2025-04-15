<?php
// Remove os atributos de página para não-administradores
add_action('admin_menu', function() {
    if ( is_admin() && !current_user_can('administrator') ) {
        remove_meta_box('pageparentdiv', 'page', 'normal');
    }
});

// Esconde o metabox do Yoast SEO para não-administradores
add_action('admin_head', function() {
    if (!current_user_can('administrator')) {
        echo '<style type="text/css">';
        echo '#wpseo_meta { display: none !important; }';
        echo '</style>';
    }
});
