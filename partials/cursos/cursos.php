<div class="row">
    <div class="col-12 col-lg-9" class="cursos">
        <h2 class="cursos__title"><?php get_template_part('partials/cursos/title'); ?></h2>
        <?php get_template_part('partials/cursos/curso-unidade'); ?>
        <?php if (have_posts()) : ?>
            <div class="cursos__content">
                <?php get_template_part('partials/cursos/loop'); ?>
            </div>
        <?php else : ?>
            <?php if (is_search()) : ?>
                <div class="alert alert-danger" role="alert">
                    <p><?php _e('N&atilde;o foram encontrados Cursos com os termos buscados.', 'ifrs-portal-theme'); ?></p>
                </div>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?php _e('Ops!'); ?></strong>&nbsp;<?php _e('N&atilde;o foram encontrados Cursos publicados.', 'ifrs-portal-theme'); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-12 col-lg-3">
        <?php get_template_part('partials/cursos/filter'); ?>
    </div>
</div>
