<?php
// Registra os menus
require_once('lib/menus.php');

// Fix SSL
require_once('lib/ssl-fix.php');

// Custom Header
require_once('lib/custom-header.php');

// Post Thumbnail
require_once('lib/post-thumbnails.php');

// Breadcrumb
require_once('lib/breadcrumb.php');

// Script Condicional
require_once('lib/script-conditional.php');

// Scripts & Styles
require_once('lib/assets.php');

// Adicionar PrettyPhoto automaticamente.
require_once('lib/prettyphoto-rel.php');

// Paginação personalizada
require_once('lib/pagination.php');

// Filtro para buscas vazias
require_once('lib/empty-search-filter.php');

// Menu do IFRS
require_once('lib/ifrs-navwalker.php');

// Widgets
require_once('lib/widgets.php');

// Custom Excerpt
require_once('lib/excerpt.php');

// Queries personalizadas em determinados templates.
require_once('lib/custom-queries.php');
