<?php
    if (is_post_type_archive('documento')) {
        _e('Documentos');
    } elseif (is_tax('documento_type')) {
        single_term_title();
    }

    if (is_year()) {
        echo get_the_date(' \d\e Y');
    }

    if (is_month()) {
        echo get_the_date(' \d\e F \d\e Y');
    }

    if (is_search() && get_search_query()) : ?>
        <small>(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small>
    <?php endif;
