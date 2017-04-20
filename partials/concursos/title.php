<?php

_e('Concursos');

if (is_tax('concurso_status')) {
    echo '&nbsp;', strtolower(single_term_title('', false));
}

if (is_search() && get_search_query()) : ?>
    <small>(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small>
<?php endif;
