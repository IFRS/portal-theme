<?php
/* Vite Manifest */
$manifestFile = get_theme_file_path('.vite/manifest.json');

if (file_exists($manifestFile)) {
  $manifest = json_decode(file_get_contents($manifestFile), true);

  /**
   * Gutenberg Editor
   */
  add_action('enqueue_block_editor_assets', function() use ($manifest) {
    $block_asset_dependencies = ['wp-i18n', 'wp-blocks', 'wp-dom-ready', 'wp-data', 'wp-edit-post'];

    wp_enqueue_script($manifest['src/blocks.js']['name'], get_parent_theme_file_uri( $manifest['src/blocks.js']['file'] ), $block_asset_dependencies);
  });

  /**
   * Gutenberg Content
   */
  add_action('enqueue_block_assets', function() use ($manifest) {
    wp_enqueue_script($manifest['src/bootstrap-blocks.js']['name'], get_parent_theme_file_uri( $manifest['src/bootstrap-blocks.js']['file'] ), array());
    wp_enqueue_style($manifest['sass/editor-styles.scss']['name'], get_parent_theme_file_uri( $manifest['sass/editor-styles.scss']['file'] ), array());
  });

  /**
   * Fonts Preload
   */
  add_action('wp_head', function() use ($manifest) {
    echo '<link rel="preload" href="' . esc_url( get_parent_theme_file_uri( $manifest['node_modules/@fontsource-variable/raleway/files/raleway-latin-wght-normal.woff2']['file'] ) ) . '" as="font" type="font/woff2" crossorigin="anonymous"/>';
  }, 1);

  /* Frontend Styles and Scripts */
  add_action('wp_enqueue_scripts', function() use ($manifest) {
    /**
     * Styles
     *
     * wp_register_style( string $handle, string|false $src, string[] $deps = array(), string|bool|null $ver = false, string $media ): bool
     * wp_enqueue_style( string $handle, string $src, string[] $deps = array(), string|bool|null $ver = false, string $media )
     */

    wp_enqueue_style($manifest['sass/portal.scss']['name'], get_parent_theme_file_uri($manifest['sass/portal.scss']['file']), array(), false, 'all');

    /* Pages */
    wp_register_style($manifest['sass/page_front-page.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_front-page.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_home.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_home.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_search.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_search.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_single.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_single.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_page.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_page.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_concursos.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_concursos.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_documentos.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_documentos.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_editais.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_editais.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/page_cursos.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_cursos.scss']['file']), array('portal'), false, 'all');
    wp_register_style($manifest['sass/plugin_cursos-estude.scss']['name'], get_parent_theme_file_uri($manifest['sass/plugin_cursos-estude.scss']['file']), array('portal'), false, 'all');

    /* DataTables */
    wp_register_style($manifest['sass/page_datatables.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_datatables.scss']['file']), array('portal'), false, 'all');

    /**
     * Scripts
     *
     * wp_register_script( string $handle, string|false $src, string[] $deps = array(), string|bool|null $ver = false, array|bool $args = array() ): bool
     * wp_enqueue_script( string $handle, string $src, string[] $deps = array(), string|bool|null $ver = false, array|bool $args = array() )
     * wp_enqueue_script_module( string $id, string $src, array $deps = array(), string|false|null $version = false, array $args = array() )
     */

    wp_enqueue_script($manifest['src/portal.js']['name'], get_parent_theme_file_uri($manifest['src/portal.js']['file']), array(), false, true);
    wp_register_script($manifest['src/datatables.js']['name'], get_parent_theme_file_uri($manifest['src/datatables.js']['file']), array('jquery'), false, true);

    if (!WP_DEBUG) {
      wp_enqueue_script('vlibras', 'https://vlibras.gov.br/app/vlibras-plugin.js', array(), null, true);
    }

    /**
     * Conditionals
     */

    if (is_front_page()) {
      wp_enqueue_style($manifest['sass/page_front-page.scss']['name']);
    }

    if (is_home() || is_category() || is_tag() || is_tax('escopo')) {
      wp_enqueue_style($manifest['sass/page_home.scss']['name']);
    }

    if (is_search()) {
      wp_enqueue_style($manifest['sass/page_search.scss']['name']);
    }

    if (is_single()) {
      wp_enqueue_style($manifest['sass/page_single.scss']['name']);
    }

    if (is_page()) {
      wp_enqueue_style($manifest['sass/page_page.scss']['name']);
    }

    if (
      is_post_type_archive('concurso') ||
      is_singular('concurso') ||
      is_tax('concurso_status')
    ) {
      wp_enqueue_style($manifest['sass/page_concursos.scss']['name']);
    }

    if (
      is_post_type_archive('documento') ||
      is_singular('documento') ||
      is_tax('documento_origin') ||
      is_tax('documento_type')
    ) {
      wp_enqueue_style($manifest['sass/page_documentos.scss']['name']);
    }

    if (
      is_post_type_archive('edital') ||
      is_singular('edital') ||
      is_tax('edital_category') ||
      is_tax('edital_status')
    ) {
      wp_enqueue_style($manifest['sass/page_editais.scss']['name']);
    }

    if (
      is_post_type_archive('curso') ||
      is_singular('curso') ||
      is_tax('curso_modalidade') ||
      is_tax('curso_nivel') ||
      is_tax('curso_turno') ||
      is_tax('curso_unidade') ||
      is_page( 'cursos' )
    ) {
      wp_enqueue_style($manifest['sass/page_cursos.scss']['name']);
    }

    if (
      is_post_type_archive('concurso') ||
      is_post_type_archive('documento') ||
      is_tax('documento_origin') ||
      is_tax('documento_type') ||
      is_post_type_archive('edital') ||
      is_tax('edital_category') ||
      is_tax('edital_status') ||
      is_singular('concurso') ||
      is_singular('documento') ||
      is_singular('edital')
    ) {
      wp_enqueue_style($manifest['sass/page_datatables.scss']['name']);
      wp_enqueue_script($manifest['src/datatables.js']['name']);
    }

    if (is_plugin_active( 'ifrs-portal-plugin-cursos-estude/portal-plugin-cursos-estude.php' )) {
      wp_enqueue_style( $manifest['sass/page_cursos-estude.scss']['name'] );
    }
  }, 1);

  /**
   * Defer e Async Scripts
   */
  add_filter('script_loader_tag', function($tag, $handle) use ($manifest) {
    $scripts_to_defer = array('vlibras');
    $scripts_to_async = array($manifest['src/datatables.js']['name']);

    foreach ($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
        return str_replace(' src', ' defer="defer" src', $tag);
      }
    }

    foreach ($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
        return str_replace(' src', ' async="async" src', $tag);
      }
    }

    return $tag;
  }, 2, 2);
}
