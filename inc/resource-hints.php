<?php
if (!WP_DEBUG) {
    add_action('wp_head', function() {
?>
    <link rel="preconnect" href="https://vlibras.gov.br">
    <link rel="preconnect" href="https://barra.brasil.gov.br">
<?php
    }, 0);
}
