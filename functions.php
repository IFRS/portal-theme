<?php
// Restrições para usuários
require_once('inc/restrictions.php');

// Utilidades
require_once('inc/utils.php');

// Cookie Fix
require_once('inc/cookie-fix.php');

// Suporte para diversas funções
require_once('inc/theme-support.php');

// Títulos personalizados
require_once('inc/custom-title.php');

// Limita o número de níveis na construção dos menus e de aninhamento das páginas
require_once('inc/depth-limit.php');

// Registra os menus
require_once('inc/menus.php');

// Breadcrumb
require_once('inc/breadcrumb.php');

// Script Condicional
require_once('inc/script-conditional.php');

// Scripts & Styles
require_once('inc/assets.php');

// Paginação personalizada
require_once('inc/pagination.php');

// Filtro para buscas vazias
require_once('inc/empty-search-filter.php');

// Widgets
require_once('inc/widgets.php');

// Queries personalizadas em determinados templates
require_once('inc/custom-queries.php');

// Custom TinyMCE
require_once('inc/custom-tinymce.php');

// Permitir tag iframe
require_once('inc/allow-iframe.php');

// Tamanho do excerpt
require_once('inc/excerpt-length.php');

// Configurações da Galeria
require_once('inc/gallery.php');

// Remove all "version" text from output
require_once('inc/remove-version.php');

// Taxonomias
require_once('inc/taxonomies/escopo.php');

// Shortcodes
require_once('inc/shortcodes/bootstrap4.php');
require_once('inc/shortcodes/noticias-escopo.php');

// Cartola
require_once('inc/cartola.php');

// Instagram Widget
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
is_plugin_active('wp-instagram-widget/wp-instagram-widget.php') ? require_once('inc/instagram.php') : null;
