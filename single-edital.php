<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-md-9">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="title-box"><?php the_title(); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php $edital_file = rwmb_meta( 'edital_file' ); ?>
            <?php $edital_retifica = rwmb_meta( 'edital_retifica_files' ); ?>
            <?php $edital_anexos = rwmb_meta( 'edital_anexos_files' ); ?>
            <?php $edital_publica = rwmb_meta( 'edital_publica_files' ); ?>
            <?php if ( !empty( $edital_file ) ) : ?>
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Arquivos Principais</h3>
                        </div>
                        <div class="list-group">
                            <?php foreach ($edital_file as $file) : ?>
                                <a class="list-group-item list-group-item-info" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><?php echo $file['title'] ?></a>
                            <?php endforeach; ?>
                            <?php if ( !empty( $edital_retifica ) ) : ?>
                                <?php foreach ($edital_retifica as $file) : ?>
                                    <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><?php echo $file['title'] ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if ( !empty( $edital_anexos ) ) : ?>
                    <div class="col-xs-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Anexos</h3>
                            </div>
                            <div class="list-group">
                                <?php foreach ($edital_anexos as $file) : ?>
                                    <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><?php echo $file['title'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( !empty( $edital_publica ) ) : ?>
                    <div class="col-xs-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Outras Publicações</h3>
                            </div>
                            <div class="list-group">
                                <?php foreach ($edital_publica as $file) : ?>
                                    <a class="list-group-item" title="<?php echo $file['title'] ?>" href="<?php echo $file['url'] ?>"><?php echo $file['title'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="title-box">Dados do Edital</h3>
                <p><strong>Data de Publicação:</strong>&nbsp;<?php echo rwmb_meta( 'edital_date' ); ?></p>
                <p><strong>Última Modificação:</strong>&nbsp;<?php the_modified_date(); ?></p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
