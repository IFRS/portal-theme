<?php
// Remove os atributos de página para não-administradores
add_action('admin_menu', function() {
  if ( is_admin() && !current_user_can('administrator') ) {
    remove_meta_box('pageparentdiv', 'page', 'normal');
  }
});

// Esconde o metabox do Yoast SEO para não-administradores
add_action('admin_enqueue_scripts', function() {
  if (current_user_can('administrator')) {
    return;
  }

  wp_register_style('portal-admin-restrictions', false);
  wp_enqueue_style('portal-admin-restrictions');
  wp_add_inline_style('portal-admin-restrictions', '#wpseo_meta { display: none !important; }');
});
