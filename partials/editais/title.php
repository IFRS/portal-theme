<?php

_e('Editais');

if (is_tax('edital_category')) {
    printf(__(' na categoria %s'), single_term_title('', false));
} else if (is_tax('edital_status')) {
    printf(__(' com o status %s'), single_term_title('', false));
}

if (is_search() && get_search_query()) : ?>
    <small>(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small>
<?php endif;
