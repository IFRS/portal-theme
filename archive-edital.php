<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-md-9">
        <h2 class="title-box">Editais<?php if (is_search() && get_search_query()) : ?><small>&nbsp;(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small><?php endif; ?></h2>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/edital-list'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php _e('N&atilde;o foram encontrados Editais com os termos buscados.'); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php _e('Ainda n&atilde;o h&aacute; Editais publicados.'); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-3">
        <aside>
            <?php get_template_part('partials/edital-category-list'); ?>
            <?php get_template_part('partials/search-local'); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
