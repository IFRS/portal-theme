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
        <div class="row">
            <div class="col">
                <div class="curso-arquivos">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="curso-arquivos__title"><?php _e('Grade e Corpo Docente', 'ifrs-portal-theme'); ?></h3>
                        </div>
                        <div class="list-group list-group-flush" role="list">
                            <?php $ppc = get_post_meta( get_the_ID(), '_curso_ppc', true ); ?>
                            <?php if (!empty($ppc)) : ?>
                                <a href="<?php echo esc_url($ppc); ?>" class="list-group-item list-group-item-action" role="listitem"><?php _e('Projeto Pedagógico do Curso (PPC)', 'ifrs-portal-theme'); ?></a>
                            <?php endif; ?>

                            <?php $matriz_curricular = get_post_meta( get_the_ID(), '_curso_matriz_curricular', true ); ?>
                            <?php if (!empty($matriz_curricular)) : ?>
                                <a href="<?php echo esc_url($matriz_curricular); ?>" class="list-group-item list-group-item-action" role="listitem"><?php _e('Matriz Curricular', 'ifrs-portal-theme'); ?></a>
                            <?php endif; ?>

                            <?php $representacao_grafica = get_post_meta( get_the_ID(), '_curso_representacao_grafica', true ); ?>
                            <?php if (!empty($representacao_grafica)) : ?>
                                <a href="<?php echo esc_url($representacao_grafica); ?>" class="list-group-item list-group-item-action" role="listitem"><?php _e('Representação Gráfica', 'ifrs-portal-theme'); ?></a>
                            <?php endif; ?>

                            <?php $corpo_docente = get_post_meta( get_the_ID(), '_curso_corpo_docente', true ); ?>
                            <?php if (!empty($corpo_docente)) : ?>
                                <a href="<?php echo esc_url($corpo_docente); ?>" class="list-group-item list-group-item-action" role="listitem"><?php _e('Corpo Docente', 'ifrs-portal-theme'); ?></a>
                            <?php endif; ?>

                            <?php $corpo_docente_componentes_curriculares = get_post_meta( get_the_ID(), '_curso_corpo_docente_componentes_curriculares', true ); ?>
                            <?php if (!empty($corpo_docente_componentes_curriculares)) : ?>
                                <a href="<?php echo esc_url($corpo_docente_componentes_curriculares); ?>" class="list-group-item list-group-item-action" role="listitem"><?php _e('Corpo Docente X Componentes Curriculares', 'ifrs-portal-theme'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $arquivos = get_post_meta( get_the_ID(), '_curso_arquivos', true ); ?>
            <?php if (!empty($arquivos)) : ?>
            <div class="col-12 col-md-6">
                <div class="curso-arquivos">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="curso-arquivos__title"><?php _e('Demais Arquivos', 'ifrs-portal-theme'); ?></h3>
                        </div>
                        <div class="list-group list-group-flush" role="list">
                            <?php foreach ($arquivos as $id => $arquivo) : ?>
                                <a href="<?php echo esc_url($arquivo); ?>" class="list-group-item list-group-item-action" role="listitem"><?php echo get_the_title($id); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

    </div>
    <div class="col-12 col-lg-3">
        <div class="row">
            <div class="col">
                <div class="curso-aside">
                    <h3 class="curso-aside__title"><?php _e('Informa&ccedil;&otilde;es', 'ifrs-portal-theme'); ?></h3>
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
                            <p class="curso-coordenador__nome">
                                <?php $lattes = get_post_meta( get_the_ID(), '_curso_coordenador_lattes', true ); ?>
                                <?php if (!empty($lattes)) : ?>
                                    <a href="<?php echo esc_url($lattes); ?>"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_nome', true )); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_nome', true )); ?>
                                <?php endif; ?>
                            </p>
                            <span class="curso-coordenador__email"><a href="mailto:<?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_email', true )); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_email', true )); ?></a></span>
                            <p class="curso-coordenador__titulacao"><?php echo esc_html(get_post_meta( get_the_ID(), '_curso_coordenador_titulacao', true )); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
