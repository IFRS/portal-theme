<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-md-9" id="concursos">
        <h2 class="title-box">Concursos <?php echo strtolower(single_term_title('', false)); ?><?php if (is_search() && get_search_query()) : ?><small>&nbsp;(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small><?php endif; ?></h2>
        <p><!-- TODO: Texto explicativo sobre os concursos. --></p>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/concurso-list'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php printf(__('N&atilde;o foram encontrados Concursos %s com os termos buscados.'), single_term_title('', false)); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php printf(__('Ainda n&atilde;o h&aacute; Concursos %s cadastrados.'), strtolower(single_term_title('', false))); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-3">
        <aside>
            <?php get_template_part('partials/concurso-status-list'); ?>
            <?php get_template_part('partials/search-local'); ?>
            <br>
            <a href="<?php echo get_post_type_archive_link( 'concurso' ); ?>" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<?php _e('Todos os Concursos'); ?></a>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
