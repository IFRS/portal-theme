<div class="row">
    <div class="col-12 col-lg-9" id="editais">
        <h2 class="title"><?php get_template_part('partials/editais/title'); ?></h2>
        <p><?php _e('Neste espaço, é possível acessar editais publicados pelos diferentes setores da Reitoria do IFRS. A lista de documentos está organizada por ordem de publicação ou atualização. Os mais atuais aparecem primeiro. É possível, também, consultar por categorias. Basta clicar, no menu à direita, no setor responsável pelo edital procurado. Em alguns casos, há ainda categorias relacionadas ao setor, para facilitar as buscas.', 'ifrs-portal-theme'); ?></p>
        <p><?php _e('Editais antigos podem ser buscados no site anterior do IFRS, na página do setor ao qual o edital está vinculado.', 'ifrs-portal-theme'); ?></p>
        <p>
            <em><?php _e('Saiba mais:', 'ifrs-portal-theme'); ?></em><br/>
            <?php _e('Edital é um documento oficial escrito que contém informações, determinações e orientações sobre: bolsas de ensino, pesquisa e extensão; concursos para processo seletivo de estudantes; concorrências administrativas; concursos para provimento de cargos públicos (para esses, acesse o menu Concursos);  e outros temas que, por sua natureza, devam ter ampla divulgação.', 'ifrs-portal-theme'); ?>
        </p>
        <p><?php _e(''); ?></p>
        <?php if (have_posts()) : ?>
            <?php get_template_part('partials/editais/loop'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php printf(__('N&atilde;o foram encontrados Editais na categoria %s com os termos buscados.', 'ifrs-portal-theme'), single_term_title('', false)); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php printf(__('Ainda n&atilde;o h&aacute; Editais publicados na categoria %s.', 'ifrs-portal-theme'), single_term_title('', false)); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-12 col-lg-3">
        <aside>
            <?php get_template_part('partials/editais/edital-category'); ?>
            <?php get_template_part('partials/editais/edital-status'); ?>
            <?php if (is_tax('edital_category')) : ?>
                <br>
                <a href="<?php echo get_post_type_archive_link( 'edital' ); ?>" class="btn btn-outline-secondary btn-block"><i class="fas fa-angle-left"></i>&nbsp;<?php _e('Todos os Editais', 'ifrs-portal-theme'); ?></a>
            <?php endif; ?>
        </aside>
    </div>
</div>
