<?php
// Restrições para usuários
require_once get_parent_theme_file_path('inc/restrictions.php');

// Cookie Fix
require_once get_parent_theme_file_path('inc/cookie-fix.php');

// Suporte para diversas funções
require_once get_parent_theme_file_path('inc/theme-support.php');

// Thumbnails no feed RSS
require_once get_parent_theme_file_path('inc/feed-thumbnail.php');

// Títulos personalizados
require_once get_parent_theme_file_path('inc/custom-title.php');

// Limita o número de níveis na construção dos menus e de aninhamento das páginas
require_once get_parent_theme_file_path('inc/depth-limit.php');

// Desabilita a geração de links para páginas de anexo
require_once get_parent_theme_file_path('inc/disable-attachment-link.php');

// Preconnect, Prefetch, Preload, etc...
require_once get_parent_theme_file_path('inc/resource-hints.php');

// Fonts
require_once get_parent_theme_file_path('inc/fonts.php');

// Scripts & Styles
require_once get_parent_theme_file_path('inc/assets.php');

// Registra os menus
require_once get_parent_theme_file_path('inc/menus.php');

// Breadcrumb
require_once get_parent_theme_file_path('inc/breadcrumb.php');

// Paginação personalizada
require_once get_parent_theme_file_path('inc/pagination.php');

// Custom Queries
require_once get_parent_theme_file_path('inc/custom-queries.php');

// Share Buttons
require_once get_parent_theme_file_path('inc/share.php');

// Filtro para buscas vazias
require_once get_parent_theme_file_path('inc/empty-search-filter.php');

// Widgets
require_once get_parent_theme_file_path('inc/widgets.php');

// Vídeos do YouTube responsivos
require_once get_parent_theme_file_path('inc/responsive-youtube-embed.php');

// Customização do resumo dos posts
require_once get_parent_theme_file_path('inc/excerpt.php');

// Configurações da Galeria
require_once get_parent_theme_file_path('inc/gallery.php');

// LazyLoad
require_once get_parent_theme_file_path('inc/lazyload.php');

// Tables
require_once get_parent_theme_file_path('inc/tables.php');

// Disable emoji
require_once get_parent_theme_file_path('inc/disable-emoji.php');

// Remove all "version" text from output
require_once get_parent_theme_file_path('inc/remove-version.php');

// Configurações Personalizadas
require_once get_parent_theme_file_path('inc/options.php');

// Metaboxes
require_once get_parent_theme_file_path('inc/pages-metaboxes.php');

// Taxonomias
require_once get_parent_theme_file_path('inc/taxonomies/escopo.php');

// Padrões de Bloco
require_once get_parent_theme_file_path('inc/block-patterns/noticias.php');

// Shortcodes
require_once get_parent_theme_file_path('inc/shortcodes/bootstrap4.php');
require_once get_parent_theme_file_path('inc/shortcodes/noticias-escopo.php');
require_once get_parent_theme_file_path('inc/shortcodes/posts-by-category.php');
