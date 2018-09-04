<div class="row">
    <div class="col-12 col-lg-9" id="documentos">
        <h2 class="title"><?php get_template_part('partials/documentos/title'); ?></h2>
        <p><?php _e('Esta página disponibiliza documentos oficiais emitidos pela Reitoria do IFRS: atas, boletins de pessoal, boletins de serviço, contratos, documentos norteadores da instituição, instruções normativas, planos de ação, políticas, portarias, relatórios e resoluções.', 'ifrs-portal-theme'); ?></p>
        <p><?php _e('A relação abaixo está organizada por ordem de publicação ou atualização, os mais atuais aparecem primeiro. Mas é possível, também, consultar por categorias. Basta clicar, no menu à direita, no tipo de documento procurado.', 'ifrs-portal-theme'); ?></p>
        <p><?php _e('Documentos antigos podem ser buscados no site anterior do IFRS, na página do setor ao qual o documento está vinculado.', 'ifrs-portal-theme'); ?></p>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/documentos/loop'); ?>
        <?php else : ?>
            <?php if (is_search()) : ?>
                <div class="alert alert-danger" role="alert">
                    <p><?php _e('N&atilde;o foram encontrados Documentos com os termos buscados.'); ?></p>
                </div>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <p><strong><?php _e('Aguarde!', 'ifrs-portal-theme'); ?></strong>&nbsp;<?php if (is_tax('documento_type')) : _e('Ainda n&atilde;o h&aacute; Documentos deste tipo publicados.', 'ifrs-portal-theme'); else : _e('Ainda n&atilde;o h&aacute; Documentos publicados.', 'ifrs-portal-theme'); endif; ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-12 col-lg-3">
        <aside>
            <?php get_template_part('partials/documentos/documento_type'); ?>
            <?php get_template_part('partials/documentos/documento_origin'); ?>
            <?php
                if (is_post_type_archive('documento')) {
                    get_template_part('partials/documentos/filter');
                }
            ?>
            <?php if (is_year() || is_month() || is_tax('documento_type')) : ?>
                <br>
                <a href="<?php echo get_post_type_archive_link( 'documento' ); ?>" class="btn btn-default btn-block"><i class="fas fa-angle-left"></i>&nbsp;<?php _e('Todos os Documentos', 'ifrs-portal-theme'); ?></a>
            <?php endif; ?>
        </aside>
    </div>
</div>
