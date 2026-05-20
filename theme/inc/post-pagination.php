<?php
add_filter('wp_link_pages_args', function ($args) {
  $args['before']      = '<nav aria-label="Paginação do conteúdo" class="page-links mt-5"><ul class="pagination justify-content-center">';
  $args['after']       = '</ul></nav>';
  $args['link_before'] = '';
  $args['link_after']  = '';
  $args['pagelink']    = '%';   // texto/número de cada link (% = número da página)
  return $args;
});

add_filter('wp_link_pages_link', function ($link, $i) {
  global $page;

  if ($i === $page) {
    // Página atual — sem link
    return '<li class="page-item disabled" aria-current="page"><a class="page-link">' . $i . '</a></li>';
  }

  // Envolve o link em <li> e adiciona classe Bootstrap à âncora
  return '<li class="page-item">' . preg_replace('/<a\s/i', '<a class="page-link" ', $link) . '</li>';
}, 10, 2);
