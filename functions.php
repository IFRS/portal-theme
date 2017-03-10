<?php
// Suporte para page title
require_once('lib/theme-support.php');

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

// Adicionar PrettyPhoto automaticamente nas imagens do conteúdo
require_once('lib/prettyphoto-rel.php');

// Paginação personalizada
require_once('lib/pagination.php');

// Filtro para buscas vazias
require_once('lib/empty-search-filter.php');

// Widgets
require_once('lib/widgets.php');

// Tamanho personalizado do resumo automático
require_once('lib/excerpt.php');

// Queries personalizadas em determinados templates
require_once('lib/custom-queries.php');
