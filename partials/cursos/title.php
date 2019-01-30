<?php

_e('Cursos', 'ifrs-portal-theme');

if (is_tax('curso_modalidade')) {
    printf(__(' da modalidade %s', 'ifrs-portal-theme'), single_term_title('', false));
} else if (is_tax('curso_nivel')) {
    printf(__(' no nível %s', 'ifrs-portal-theme'), single_term_title('', false));
}

if (is_search() && get_search_query()) : ?>
    <small><?php printf(__('(Resultados da busca por &ldquo;%s&rdquo;)', 'ifrs-portal-theme'), get_search_query()) ?></small>
<?php endif;
