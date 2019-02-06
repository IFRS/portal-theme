<?php the_post(); ?>

<div class="row">
    <div class="col-12 col-lg-9">
        <h2 class="curso__title"><?php the_title(); ?></h2>
        <div class="curso__content">
            <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', array('class' => 'curso__thumb'));
                }
            ?>
            <?php the_content(); ?>
        </div>
        <div class="curso__estrutura">
            <h3 class="curso__estrutura-title"><?php _e('Estrutura F&iacute;sica', 'ifrs-portal-theme'); ?></h3>
            <?php echo get_post_meta( get_the_ID(), '_curso_estrutura', true ); ?>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="row">
            <div class="col">
                <div class="curso-aside">
                    <h3 class="curso-aside__title"><?php _e('Informa&ccedil;&otilde;es B&aacute;sicas', 'ifrs-portal-theme'); ?></h3>
                    <div class="curso-aside__content">
                        <div class="curso-info">
                            <span class="curso-info__icon" aria-hidden="true"><i class="fas fa-user-graduate"></i></span>
                            <h4 class="curso-info__title"><?php _e('Modalidade', 'ifrs-portal-theme'); ?></h4>
                            <p class="curso-info__text"><?php the_terms( get_the_ID(), 'curso_modalidade', '', ', ' ); ?></p>
                        </div>
                        <div class="curso-info">
                            <span class="curso-info__icon" aria-hidden="true"><i class="fas fa-graduation-cap"></i></span>
                            <h4 class="curso-info__title"><?php _e('Nível', 'ifrs-portal-theme'); ?></h4>
                            <p class="curso-info__text">
                                <?php $niveis = get_the_terms(get_the_ID(), 'curso_nivel'); ?>
                                <?php foreach ($niveis as $nivel) : ?>
                                    <?php echo get_term_parents_list($nivel->term_id, 'curso_nivel', array('separator' => ' / ', 'inclusive' => false)); ?>
                                    <a href="<?php echo get_term_link($nivel); ?>"><?php echo $nivel->name; ?></a>
                                <?php endforeach; ?>
                            </p>
                        </div>
                        <div class="curso-info">
                            <span class="curso-info__icon" aria-hidden="true"><i class="fas fa-cloud-sun"></i></span>
                            <h4 class="curso-info__title"><?php _e('Turnos', 'ifrs-portal-theme'); ?></h4>
                            <p class="curso-info__text"><?php the_terms( get_the_ID(), 'curso_turno', '', ', ' ); ?></p>
                        </div>
                        <div class="curso-info">
                            <span class="curso-info__icon" aria-hidden="true"><i class="fas fa-clock"></i></span>
                            <h4 class="curso-info__title"><?php _e('Dura&ccedil;&atilde;o', 'ifrs-portal-theme'); ?></h4>
                            <p class="curso-info__text"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_duracao', true )); ?> <span class="curso-info__text--lower">(<?php echo esc_html(get_post_meta( get_the_ID(), '_curso_carga_horaria', true )); ?>h)</span></p>
                        </div>
                    </div>
                </div>
                <div class="curso-aside">
                    <h3 class="curso-aside__title"><?php _e('Informa&ccedil;&otilde;es Legais', 'ifrs-portal-theme'); ?></h3>
                    <div class="curso-aside__content">
                        <div class="curso-info">
                            <span class="curso-info__icon" aria-hidden="true"><i class="fas fa-file-signature"></i></span>
                            <h4 class="curso-info__title"><?php _e('Autorização', 'ifrs-portal-theme'); ?></h4>
                            <p class="curso-info__text"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_autorizacao', true )); ?></p>
                        </div>
                        <div class="curso-info">
                            <span class="curso-info__icon" aria-hidden="true"><i class="fas fa-star"></i></span>
                            <h4 class="curso-info__title"><?php _e('Nota do MEC', 'ifrs-portal-theme'); ?></h4>
                            <p class="curso-info__text"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_nota', true )); ?></p>
                        </div>
                    </div>
                </div>
                <div class="curso-aside">
                    <h3 class="curso-aside__title"><?php _e('Coordena&ccedil;&atilde;o', 'ifrs-portal-theme'); ?></h3>
                    <div class="curso-aside__content">
                        <div class="curso-coordenador">
                            <p class="curso-coordenador__nome"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_nome', true )); ?></p>
                            <span class="curso-coordenador__email"><a href="mailto:<?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_email', true )); ?>"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_email', true )); ?></a></span>
                            <p class="curso-coordenador__titulacao"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_titulacao', true )); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
