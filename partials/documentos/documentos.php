<div class="row">
    <div class="col-xs-12 col-md-9" id="documentos">
        <h2 class="title-box"><?php get_template_part('partials/documentos/title'); ?></h2>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/documentos/loop'); ?>
        <?php else : ?>
            <?php if (is_search()) : ?>
                <div class="alert alert-danger" role="alert">
                    <p><?php _e('N&atilde;o foram encontrados Documentos com os termos buscados.'); ?></p>
                </div>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php if (is_tax('documento_type')) : _e('Ainda n&atilde;o h&aacute; Documentos deste tipo publicados.'); else : _e('Ainda n&atilde;o h&aacute; Documentos publicados.'); endif; ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-3">
        <aside>
            <?php get_template_part('partials/documentos/documento_type'); ?>
            <?php
                if (is_post_type_archive('documento')) {
                    get_template_part('partials/documentos/filter');
                }
            ?>
            <?php
                if (!is_year() && !is_month()) {
                    get_template_part('partials/search-local');
                }
            ?>
            <?php if (is_year() || is_month() || is_tax('documento_type')) : ?>
                <br>
                <a href="<?php echo get_post_type_archive_link( 'documento' ); ?>" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<?php _e('Todos os Documentos'); ?></a>
            <?php endif; ?>
        </aside>
    </div>
</div>
