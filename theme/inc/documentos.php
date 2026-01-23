<?php
add_action('ifrs_documentos_before_single', function() {
  echo '<main class="container-lg">';
});

add_action('ifrs_documentos_after_single', function() {
  echo '</main>';
});
