<div class="row">
    <div class="col-12 col-lg-9">
        <article id="edital">
            <div class="row">
                <div class="col-12">
                    <h2 class="title"><?php the_title(); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="row">
            <?php
                $edital_files = array();
                $edital_files = array_merge(
                    $edital_files,
                    array_map(function($arr){
                        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
                    }, rwmb_meta('edital_file' ))
                );
                $edital_files = array_merge(
                    $edital_files,
                    array_map(function($arr){
                        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Retificações'];
                    }, rwmb_meta('edital_retifica_files' ))
                );
                $edital_files = array_merge(
                    $edital_files,
                    array_map(function($arr){
                        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Anexos'];
                    }, rwmb_meta('edital_anexos_files' ))
                );
                $edital_files = array_merge(
                    $edital_files,
                    array_map(function($arr){
                        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Publicações'];
                    }, rwmb_meta('edital_publica_files' ))
                );
            ?>
            <?php if ( !empty( $edital_files ) ) : ?>
                <div class="col-12 edital-arquivos">
                    <div class="table-responsive">
                        <table class="table table-striped table-arquivos">
                            <thead>
                                <tr>
                                    <th><?php _e('Publicado em'); ?></th>
                                    <th><?php _e('Arquivo'); ?></th>
                                    <th><?php _e('Grupo'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($edital_files as $key => $file) : ?>
                                <tr>
                                    <td><?php echo date_i18n( 'd/m/Y H:i', $file['date'] ); ?></td>
                                    <td><a href="<?php echo $file['url']; ?>"><strong><?php echo $file['title']; ?></strong></a></td>
                                    <td><?php echo $file['group']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </article>
        <div class="row">
            <div class="col-12">
                <?php get_template_part('partials/share-buttons'); ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <aside>
            <h3 class="title-box"><?php _e('Dados do Edital'); ?></h3>
            <p><strong><?php _e('Data de Publica&ccedil;&atilde;o:'); ?></strong>&nbsp;<?php echo date_i18n( get_option( 'date_format' ), rwmb_meta( 'edital_date' ) ); ?></p>
            <p><strong><?php _e('&Uacute;ltima Modifica&ccedil;&atilde;o:'); ?></strong>&nbsp;<?php the_modified_date(); ?></p>
            <p><strong><?php _e('Categorias:'); ?></strong>&nbsp;<?php echo get_the_term_list( get_the_ID(), 'edital_category', '', ', ', '' ); ?></p>
            <p><strong><?php _e('Status:'); ?></strong>&nbsp;<?php echo get_the_term_list( get_the_ID(), 'edital_status', '', ', ', '' ); ?></p>
        </aside>
    </div>
</div>
