<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-md-9">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="title-box"><?php the_title(); ?></h2>
            </div>
        </div>
        <?php get_template_part('partials/concurso-item'); ?>
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
                    <h3 class="title-box"><?php _e('Status do Concurso'); ?></h3>
                    <p><?php echo get_the_term_list( get_the_ID(), 'concurso_status', '', '<br>', '' ); ?></p>
                </div>
            </div>
        </aside>
    </div>
</div>
