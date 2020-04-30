<?php
// Restrições para usuários
require_once('inc/restrictions.php');

// Utilidades
require_once('inc/utils.php');

// Cookie Fix
require_once('inc/cookie-fix.php');

// Preconnect, Prefetch, Preload, etc...
require_once('inc/resource-hints.php');

// Suporte para diversas funções
require_once('inc/theme-support.php');

// Remoção de thumbnails medium_large
require_once('inc/disable-medium_large.php');

// Títulos personalizados
require_once('inc/custom-title.php');

// Limita o número de níveis na construção dos menus e de aninhamento das páginas
require_once('inc/depth-limit.php');

// Desabilita a geração de links para páginas de anexo
require_once('inc/disable-attachment-link.php');

// Registra os menus
require_once('inc/menus.php');

// Breadcrumb
require_once('inc/breadcrumb.php');

// Scripts & Styles
require_once('inc/assets.php');

// Paginação personalizada
require_once('inc/pagination.php');

// Custom Queries
require_once('inc/custom-queries.php');

// Share Buttons
require_once('inc/share.php');

// Filtro para buscas vazias
require_once('inc/empty-search-filter.php');

// Widgets
require_once('inc/widgets.php');
require_once('inc/carousel-first-child-class.php');

// Custom TinyMCE
require_once('inc/custom-tinymce.php');

// Permitir tag iframe
require_once('inc/allow-iframe.php');

// Vídeos do YouTube responsivos
require_once('inc/responsive-youtube-embed.php');

// Customização do resumo dos posts
require_once('inc/excerpt.php');

// Configurações da Galeria
require_once('inc/gallery.php');

// LazyLoad
require_once('inc/lazyload.php');

// Tables
require_once('inc/tables.php');

// Disable emoji
require_once('inc/disable-emoji.php');

// Remove all "version" text from output
require_once('inc/remove-version.php');

// Taxonomias
require_once('inc/taxonomies/escopo.php');

// Shortcodes
require_once('inc/shortcodes/bootstrap4.php');
require_once('inc/shortcodes/noticias-escopo.php');
require_once('inc/shortcodes/posts-by-category.php');
