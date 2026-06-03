<?php
add_action('wp_head', function() {
?>
  <link rel="preconnect" href="https://vlibras.gov.br">
<?php
  if (has_custom_logo()) {
    $custom_logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
    if (is_array($custom_logo) && !empty($custom_logo[0])) {
      echo '<link rel="preload" href="' . esc_url($custom_logo[0]) . '" as="image"/>';
    }
  }
}, 0);
