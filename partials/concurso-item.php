<div class="row">
    <div class="col-xs-12">
        <?php the_content(); ?>
    </div>
</div>
<div class="row">
<?php
    $concurso_file = rwmb_meta('concurso_file' );
    $concurso_retifica = rwmb_meta('concurso_retifica_files' );
    $concurso_anexos = rwmb_meta('concurso_anexos_files' );
    $concurso_cronograma = rwmb_meta('concurso_cronograma_files' );
    $concurso_prova_objetiva = rwmb_meta('concurso_prova_objetiva_files' );
    $concurso_prova_didatica = rwmb_meta('concurso_prova_didatica_files' );
    $concurso_prova_titulos = rwmb_meta('concurso_prova_titulos_files' );
    $concurso_resultados = rwmb_meta('concurso_resultado_files' );
    $concurso_nomeia = rwmb_meta('concurso_nomeia_files' );
?>
<?php if ( !empty( $concurso_file ) ) : ?>
    <div class="concurso-arquivos">
        <div class="col-xs-12 col-md-6">
            <h4><?php _e('Edital'); ?></h4>
            <div class="list-group">
                <?php foreach ($concurso_file as $file) : ?>
                    <a class="list-group-item list-group-item-info" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                <?php endforeach; ?>
                <?php if ( !empty( $concurso_retifica ) ) : ?>
                    <?php foreach ($concurso_retifica as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( !empty( $concurso_anexos ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Anexos'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_anexos as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $concurso_cronograma ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Cronograma'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_cronograma as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $concurso_prova_objetiva ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Prova Objetiva'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_prova_objetiva as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $concurso_prova_didatica ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Prova Did&aacute;tica'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_prova_didatica as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $concurso_prova_titulos ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Prova de T&iacute;tulos'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_prova_titulos as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $concurso_resultados ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Resultados'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_resultados as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $concurso_nomeia ) ) : ?>
            <div class="col-xs-12 col-md-6">
                <h4><?php _e('Nomea&ccedil;&otilde;es'); ?></h4>
                <div class="list-group">
                    <?php foreach ($concurso_nomeia as $file) : ?>
                        <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><span class="glyphicon glyphicon-file"></span>&nbsp;<?php echo $file['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
</div>
