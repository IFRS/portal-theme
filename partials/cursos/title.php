<?php

_e('Cursos', 'ifrs-portal-theme');

if (is_tax('curso_modalidade')) {
    printf(__(' na modalidade %s', 'ifrs-portal-theme'), single_term_title('', false));
}

if (is_tax('curso_nivel')) {
    printf(__(' do nível %s', 'ifrs-portal-theme'), single_term_title('', false));
}

if (is_tax('curso_turno')) {
    printf(__(' ofertados no turno da %s', 'ifrs-portal-theme'), single_term_title('', false));
}

if (is_tax('curso_unidade')) {
    printf(__(' ofertados no Campus %s', 'ifrs-portal-theme'), single_term_title('', false));
}

if (is_search() && get_search_query()) : ?>
    <small><?php printf(__('(Resultados com o termo &ldquo;%s&rdquo;)', 'ifrs-portal-theme'), get_search_query()) ?></small>
<?php endif; ?>
