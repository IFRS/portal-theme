<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-md-9" id="concursos">
        <h2 class="title-box">Concursos<?php if (is_search() && get_search_query()) : ?><small>&nbsp;(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small><?php endif; ?></h2>
        <p><!-- TODO: Texto explicativo sobre os concursos. --></p>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/concurso-list'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php _e('N&atilde;o foram encontrados Concursos com os termos buscados.'); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php _e('Ainda n&atilde;o h&aacute; Concursos publicados.'); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-3">
        <aside>
            <?php get_template_part('partials/concurso-status-list'); ?>
            <?php get_template_part('partials/search-local'); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
