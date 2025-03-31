<?php
add_action('wp_head', function() {
  if (!has_custom_logo()) :
?>
    <link rel="icon" href="<?php echo esc_url( get_parent_theme_file_uri() ); ?>/favicons/favicon.ico">
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_parent_theme_file_uri() ); ?>/favicons/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_parent_theme_file_uri() ); ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_parent_theme_file_uri() ); ?>/favicons/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_parent_theme_file_uri() ); ?>/favicons/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo esc_url( get_parent_theme_file_uri() ); ?>/favicons/ifrs.webmanifest">
<?php
  endif;
});
