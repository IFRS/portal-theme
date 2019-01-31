<div class="row">
    <div class="col-12 col-lg-9" class="cursos">
        <h2 class="cursos__title"><?php get_template_part('partials/cursos/title'); ?></h2>
        <div class="cursos__content">
            <?php if (have_posts()) : ?>
                <?php get_template_part('partials/cursos/loop'); ?>
            <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php __('N&atilde;o foram encontrados Cursos com os termos buscados.', 'ifrs-portal-theme'); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php _e('Ainda n&atilde;o h&aacute; Cursos publicados.', 'ifrs-portal-theme'); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <aside>
            <?php get_template_part('partials/cursos/curso-modalidade'); ?>
            <?php get_template_part('partials/cursos/curso-nivel'); ?>
            <?php get_template_part('partials/cursos/curso-turno'); ?>
            <?php if (is_tax('curso_modalidade') || is_tax('curso_nivel') || is_tax('curso_turno')) : ?>
                <br>
                <a href="<?php echo get_post_type_archive_link( 'curso' ); ?>" class="btn btn-outline-secondary btn-block"><i class="fas fa-angle-left"></i>&nbsp;<?php _e('Todos os Cursos', 'ifrs-portal-theme'); ?></a>
            <?php endif; ?>
        </aside>
    </div>
</div>
