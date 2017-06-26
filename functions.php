<?php
// Utilidades
require_once('lib/utils.php');

// Suporte para page title
require_once('lib/theme-support.php');

// Títulos personalizados.
require_once('lib/custom-title.php');

// Widget de texto executa shortcodes.
require_once('lib/widget-text-shortcode.php');

// Limita o número de níveis na construção dos menus e de aninhamento das páginas
require_once('lib/depth-limit.php');

// Registra os menus
require_once('lib/menus.php');

// Breadcrumb
require_once('lib/breadcrumb.php');

// Script Condicional
require_once('lib/script-conditional.php');

// Scripts & Styles
require_once('lib/assets.php');

// Paginação personalizada
require_once('lib/pagination.php');

// Filtro para buscas vazias
require_once('lib/empty-search-filter.php');

// Widgets
require_once('lib/widgets.php');

// Queries personalizadas em determinados templates
require_once('lib/custom-queries.php');

// Custom TinyMCE
require_once('lib/custom-tinymce.php');

// Remove "generator" meta tag
remove_action('wp_head', 'wp_generator');
