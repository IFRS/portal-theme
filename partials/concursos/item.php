<div class="row">
    <div class="col-xs-12">
        <?php the_content(); ?>
    </div>
</div>
<div class="row">
<?php
    $concurso_files = array();
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
        }, rwmb_meta('concurso_file' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
        }, rwmb_meta('concurso_retifica_files' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Anexos'];
        }, rwmb_meta('concurso_anexos_files' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Cronograma'];
        }, rwmb_meta('concurso_cronograma_files' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Editais Complementares'];
        }, rwmb_meta('concurso_editais_complementares' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Provas'];
        }, rwmb_meta('concurso_provas_files' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Resultados'];
        }, rwmb_meta('concurso_resultado_files' ))
    );
    $concurso_files = array_merge(
        $concurso_files,
        array_map(function($arr){
            return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Nomeações'];
        }, rwmb_meta('concurso_nomeia_files' ))
    );

    $concurso_files_sorted = usort($concurso_files, "concurso_files_sort");
?>

<?php if ( !empty( $concurso_files ) ) : ?>
    <div class="col-xs-12 concurso-arquivos">
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
                <?php foreach ($concurso_files as $key => $file) : ?>
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
</div>
