<?php
/**
 * Integração de saída do breadcrumb no tema.
 * Prioridade: Yoast SEO ativo -> bloco server-side do portal.
 */

if (!function_exists('portal_should_prefer_yoast_breadcrumb')) {
  function portal_should_prefer_yoast_breadcrumb() {
    return (bool) apply_filters('portal_breadcrumb_prefer_yoast', true);
  }
}

if (!function_exists('portal_is_yoast_breadcrumb_enabled')) {
  function portal_is_yoast_breadcrumb_enabled() {
    if (!function_exists('yoast_breadcrumb')) {
      return false;
    }

    // Yoast mantém a chave de configuração em wpseo_internallinks[breadcrumbs-enable].
    if (class_exists('WPSEO_Options') && is_callable(array('WPSEO_Options', 'get'))) {
      return (bool) WPSEO_Options::get('breadcrumbs-enable', false);
    }

    $internal_links = get_option('wpseo_internallinks');
    if (is_array($internal_links) && isset($internal_links['breadcrumbs-enable'])) {
      return (bool) $internal_links['breadcrumbs-enable'];
    }

    return false;
  }
}

if (!function_exists('portal_render_header_breadcrumb')) {
  function portal_render_header_breadcrumb() {
    if (is_front_page()) {
      return '';
    }

    $yoast_breadcrumb_callable = 'yoast_breadcrumb';

    if (
      portal_should_prefer_yoast_breadcrumb() &&
      portal_is_yoast_breadcrumb_enabled() &&
      is_callable($yoast_breadcrumb_callable)
    ) {
      $yoast_start = sprintf(
        '<section class="container"><nav class="breadcrumb-yoast" aria-label="%s">',
        esc_attr__('Caminhos de navegação', 'ifrs-portal-theme')
      );

      return call_user_func($yoast_breadcrumb_callable, $yoast_start, '</nav></section>', false);
    }

    return do_blocks('<!-- wp:portal/breadcrumb /-->');
  }
}
