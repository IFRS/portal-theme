<div class="row">
    <div class="col-xs-12 col-md-9" id="editais">
        <h2 class="title"><?php get_template_part('partials/editais/title'); ?></h2>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/editais/loop'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php printf(__('N&atilde;o foram encontrados Editais na categoria %s com os termos buscados.'), single_term_title('', false)); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php printf(__('Ainda n&atilde;o h&aacute; Editais publicados na categoria %s.'), single_term_title('', false)); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-3">
        <aside>
            <?php get_template_part('partials/editais/edital-category'); ?>
            <?php get_template_part('partials/search-local'); ?>
            <?php if (is_tax('edital_category')) : ?>
                <br>
                <a href="<?php echo get_post_type_archive_link( 'edital' ); ?>" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<?php _e('Todos os Editais'); ?></a>
            <?php endif; ?>
        </aside>
    </div>
</div>
