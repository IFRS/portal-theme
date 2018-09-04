<div class="row">
    <div class="col-12">
        <?php the_content(); ?>
    </div>
</div>
<div class="row">
<?php
    $concurso_files = array();
    $concurso_files['edital'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
    }, rwmb_meta('concurso_file' ));

    $concurso_files['edital'] = array_merge(
        $concurso_files['edital'],
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
        }, rwmb_meta('concurso_retifica_files' ))
    );

    $concurso_files['anexos'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Anexos'];
    }, rwmb_meta('concurso_anexos_files' ));

    $concurso_files['cronograma'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Cronograma'];
    }, rwmb_meta('concurso_cronograma_files' ));

    $concurso_files['editais_complementares'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Editais Complementares'];
    }, rwmb_meta('concurso_editais_complementares' ));

    $concurso_files['listas'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Listas'];
    }, rwmb_meta('concurso_listas_files' ));

    $concurso_files['provas'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Provas'];
    }, rwmb_meta('concurso_provas_files' ));

    $concurso_files['gabaritos'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Gabaritos'];
    }, rwmb_meta('concurso_gabaritos_files' ));

    $concurso_files['recursos'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Recursos'];
    }, rwmb_meta('concurso_recursos_files' ));

    $concurso_files['resultados'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Resultados'];
    }, rwmb_meta('concurso_resultado_files' ));

    $concurso_files['nomeia'] = array_map(function($arr){
        return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Nomeações'];
    }, rwmb_meta('concurso_nomeia_files' ));

    // $concurso_files_sorted = usort($concurso_files, "concurso_files_sort");
?>

<?php if ( !empty( $concurso_files ) ) : ?>
    <div class="col-12 concurso-arquivos">
        <ul class="tab-list row" role="tablist">
            <?php if (!empty($concurso_files['edital'])) : ?><li class="active col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-edital" aria-controls="tab-edital" role="tab" data-toggle="tab">Edital</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['anexos'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-anexos" aria-controls="tab-anexos" role="tab" data-toggle="tab">Anexos</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['cronograma'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-cronograma" aria-controls="tab-cronograma" role="tab" data-toggle="tab">Cronograma</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['editais_complementares'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-editais_complementares" aria-controls="tab-editais_complementares" role="tab" data-toggle="tab">Editais Complementares</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['listas'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-listas" aria-controls="tab-listas" role="tab" data-toggle="tab">Listas</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['provas'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-provas" aria-controls="tab-provas" role="tab" data-toggle="tab">Provas</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['gabaritos'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-gabaritos" aria-controls="tab-gabaritos" role="tab" data-toggle="tab">Gabaritos</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['recursos'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-recursos" aria-controls="tab-recursos" role="tab" data-toggle="tab">Recursos</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['resultados'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-resultados" aria-controls="tab-resultados" role="tab" data-toggle="tab">Resultados</a></li><?php endif; ?>
            <?php if (!empty($concurso_files['nomeia'])) : ?><li class="col-xs-12 col-sm-4 col-lg-3" role="presentation"><a href="#tab-<?php the_ID(); ?>-nomeia" aria-controls="tab-nomeia" role="tab" data-toggle="tab">Nomeações</a></li><?php endif; ?>
        </ul>
        <div class="tab-content">
        <?php foreach ($concurso_files as $grupo => $files) : ?>
            <?php if (!empty($files)) : ?>
                <div role="tabpanel" class="tab-pane fade<?php echo ($grupo == 'edital') ? ' in active' : ''; ?>" id="tab-<?php the_ID(); ?>-<?php echo $grupo; ?>">
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
                            <?php foreach ($files as $key => $file) : ?>
                                <tr>
                                    <td><?php echo date_i18n( 'd/m/Y H:i', $file['date'] ); ?></td>
                                    <td>
                                        <a href="<?php echo $file['url']; ?>"><strong><?php echo $file['title']; ?></strong></a>
                                        <br>
                                        <?php echo get_post_field('post_content', $file['ID']); ?>
                                    </td>
                                    <td><?php echo $file['group']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
</div>
