<div class="row">
    <div class="col-xs-12 col-md-9">
        <article id="documento">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title"><?php the_title(); ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="row">
            <?php
                $documento_files = array();
                $documento_files = array_merge(
                    $documento_files,
                    array_map(function($arr){
                        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Documento'];
                    }, rwmb_meta('documento_file' ))
                );
                $documento_files = array_merge(
                    $documento_files,
                    array_map(function($arr){
                        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Anexos'];
                    }, rwmb_meta('documento_anexos' ))
                );
            ?>
                <div class="col-xs-12">
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
                            <?php foreach ($documento_files as $key => $file) : ?>
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
            </div>
        </article>
        <div class="row">
            <div class="col-xs-12">
                <?php get_template_part('partials/share-buttons'); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">
        <aside>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="title-box"><?php _e('Dados do Documento'); ?></h3>
                    <p>
                        <strong>Tipo</strong>
                        <br>
                        <?php echo get_the_term_list( get_the_ID(), 'documento_type', '', '<br>', '' ); ?>
                    </p>
                    <p>
                        <strong>Publicação</strong>
                        <br>
                        <?php echo get_the_date(); ?> <?php _e('às'); ?> <?php echo get_the_time('G\hi'); ?>
                    </p>
                </div>
            </div>
        </aside>
    </div>
</div>
