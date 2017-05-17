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
                <div class="col-xs-12">
                    <?php $arquivo = rwmb_meta('documento_file', array('limit' => 1)); ?>
                    <a class="btn btn-primary" href="<?php echo $arquivo[0]['url']; ?>" title="Baixar <?php the_title(); ?>" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Baixar Arquivo</a>
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
                    <p><?php echo get_the_term_list( get_the_ID(), 'documento_type', '', '<br>', '' ); ?></p>
                    <p><strong>Publicação</strong></p>
                    <p><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_date('d/m/Y'); ?></p>
                    <p><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo get_the_time('G\hi'); ?></p>
                </div>
            </div>
        </aside>
    </div>
</div>
