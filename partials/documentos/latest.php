<div class="row">
    <div class="col-xs-12">
    <?php
        global $post;

        $args = array(
            'orderby' => 'modified',
            'order' => 'DESC',
            'post_type' => 'documento',
            'posts_per_page' => 5
        );

        $last_documentos = new WP_Query($args);
    ?>

        <div class="latest-documentos">
            <h2 class="title"><?php _e('&Uacute;ltimos Documentos'); ?></h2>
            <?php if ($last_documentos->have_posts()) : ?>
                <?php while ($last_documentos->have_posts()) : $last_documentos->the_post(); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="documento-date-time">
                                <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_modified_date('d/m/Y'); ?>
                                &agrave;s
                                <?php echo get_the_modified_time('G\hi'); ?>
                            </p>
                            &bull;
                            <?php echo get_the_term_list(get_the_ID(), 'documento_type', '<ul class="documento-type"><li>', ',&nbsp;</li><li>', '</li></ul>'); ?>
                            <h3 class="documento-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <a href="<?php echo get_post_type_archive_link( 'documento' ); ?>" class="pull-right link-todos-documentos"><?php _e('Acesse todos os Documentos'); ?></a>
    </div>
</div>
