<?php
add_action('wp_head', function() {
?>
    <link rel="preconnect" href="https://vlibras.gov.br">
    <link rel="preconnect" href="https://barra.brasil.gov.br">
<?php
    if (has_custom_logo()) {
        echo '<link rel="preload" href="' . esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]) . '" as="image" crossorigin="anonymous"/>';
    } else {
        echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/img/ifrs.png" as="image" crossorigin="anonymous"/>';
    }
}, 0);
