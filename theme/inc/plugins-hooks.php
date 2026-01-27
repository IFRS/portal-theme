<?php
function portal_open_main() {
  echo '<main class="container-lg">';
}

function portal_close_main() {
  echo '</main>';
}

/**
 * Documentos
 */

// Archive
add_action('ifrs_documentos_before_archive', 'portal_open_main');

add_action('ifrs_documentos_after_archive', 'portal_close_main');

// Single
add_action('ifrs_documentos_before_single', 'portal_open_main');

add_action('ifrs_documentos_after_single', 'portal_close_main');

/**
 * Editais
 */

// Archive
add_action('ifrs_editais_before_archive', 'portal_open_main');

add_action('ifrs_editais_after_archive', 'portal_close_main');

// Single
add_action('ifrs_editais_before_single', 'portal_open_main');

add_action('ifrs_editais_after_single', 'portal_close_main');
