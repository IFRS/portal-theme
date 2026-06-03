<?php
if (!function_exists('portal_is_plugin_active')) {
  function portal_is_plugin_active($plugin) {
    if (!function_exists('is_plugin_active')) {
      $plugin_file = ABSPATH . 'wp-admin/includes/plugin.php';
      if (file_exists($plugin_file)) {
        require_once $plugin_file;
      }
    }

    return function_exists('is_plugin_active') && is_plugin_active($plugin);
  }
}

/* Vite Manifest */
$manifestFile = get_theme_file_path('.vite/manifest.json');

if (file_exists($manifestFile)) {
  $manifest_content = file_get_contents($manifestFile);
  $manifest = $manifest_content ? json_decode($manifest_content, true) : null;

  if (!is_array($manifest)) {
    return;
  }

  /**
   * Gutenberg Editor
   */
  add_action('enqueue_block_editor_assets', function() use ($manifest) {
    wp_enqueue_style($manifest['sass/editor-styles.scss']['name'], get_parent_theme_file_uri( $manifest['sass/editor-styles.scss']['file'] ));
    wp_enqueue_script_module($manifest['src/blocks.js']['name'], get_parent_theme_file_uri( $manifest['src/blocks.js']['file'] ));
  });

  /**
   * Gutenberg Content
   */
  add_action('enqueue_block_assets', function() use ($manifest) {
    wp_enqueue_script_module($manifest['src/bootstrap-blocks.js']['name'], get_parent_theme_file_uri( $manifest['src/bootstrap-blocks.js']['file'] ));
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

    wp_enqueue_style($manifest['sass/fonts.scss']['name'], get_parent_theme_file_uri($manifest['sass/fonts.scss']['file']), array(), null, 'all');
    wp_enqueue_style($manifest['sass/portal.scss']['name'], get_parent_theme_file_uri($manifest['sass/portal.scss']['file']), array(), null, 'all');

    /* Pages */
    wp_register_style($manifest['sass/page_front-page.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_front-page.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_home.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_home.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_single.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_single.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_page.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_page.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_concursos.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_concursos.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_documentos.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_documentos.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_editais.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_editais.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/page_cursos.scss']['name'], get_parent_theme_file_uri($manifest['sass/page_cursos.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');
    wp_register_style($manifest['sass/plugin_cursos-estude.scss']['name'], get_parent_theme_file_uri($manifest['sass/plugin_cursos-estude.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');

    /* DataTables */
    wp_register_style($manifest['sass/datatables.scss']['name'], get_parent_theme_file_uri($manifest['sass/datatables.scss']['file']), array($manifest['sass/portal.scss']['name']), null, 'all');

    /**
     * Scripts
     *
     * wp_register_script( string $handle, string|false $src, string[] $deps = array(), string|bool|null $ver = false, array|bool $args = array() ): bool
     * wp_enqueue_script( string $handle, string $src, string[] $deps = array(), string|bool|null $ver = false, array|bool $args = array() )
     *
     * wp_register_script_module( string $id, string $src, array $deps = array(), string|false|null $version = false, array $args = array() )
     * wp_enqueue_script_module( string $id, string $src, array $deps = array(), string|false|null $version = false, array $args = array() )
     */

    wp_enqueue_script_module($manifest['src/portal.js']['name'], get_parent_theme_file_uri($manifest['src/portal.js']['file']), array(), null, array('in_footer' => true));

    /* Search Highlight */
    wp_register_script_module($manifest['src/search-highlight.js']['name'], get_parent_theme_file_uri($manifest['src/search-highlight.js']['file']), array(), null, array('in_footer' => true, 'strategy' => 'defer', 'fetchpriority' => 'low'));

    /* DataTables */
    wp_register_script_module($manifest['src/datatables.js']['name'], get_parent_theme_file_uri($manifest['src/datatables.js']['file']), array(), null, array('in_footer' => true, 'strategy' => 'async', 'fetchpriority' => 'low'));

    /* Polyfill: DOM4, ES2020, ES2021, ES2022, ES2023 */
    wp_enqueue_script('polyfill', 'https://cdnjs.cloudflare.com/polyfill/v3/polyfill.min.js?version=4.8.0&features=dom4%2Ces2023%2Ces2022%2Ces2021%2Ces2020', array(), null, array('in_footer' => false, 'strategy' => 'defer', 'fetchpriority' => 'high'));
    wp_script_add_data('polyfill', 'nomodule', true);

    /**
     * Conditionals
     */

    if (is_front_page()) {
      wp_enqueue_style($manifest['sass/page_front-page.scss']['name']);
    }

    if (is_home() || is_category() || is_tag() || is_tax('escopo')) {
      wp_enqueue_style($manifest['sass/page_home.scss']['name']);
    }

    if (is_single()) {
      wp_enqueue_style($manifest['sass/page_single.scss']['name']);
    }

    if (is_page()) {
      wp_enqueue_style($manifest['sass/page_page.scss']['name']);
    }

    if (is_search()) {
      wp_enqueue_script_module($manifest['src/search-highlight.js']['name']);
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
      wp_enqueue_style($manifest['sass/datatables.scss']['name']);
      wp_enqueue_script_module($manifest['src/datatables.js']['name']);
    }

    if (portal_is_plugin_active('ifrs-portal-plugin-cursos-estude/portal-plugin-cursos-estude.php')) {
      wp_enqueue_style( $manifest['sass/plugin_cursos-estude.scss']['name'] );
    }

    /* VLibras */
    if (!WP_DEBUG) {
      wp_enqueue_script('vlibras', 'https://vlibras.gov.br/app/vlibras-plugin.js', array(), null, array('in_footer' => true, 'strategy' => 'defer', 'fetchpriority' => 'low'));
    }
  }, 1);
}
