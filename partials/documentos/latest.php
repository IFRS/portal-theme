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
<?php if ($last_documentos->have_posts()) : ?>
<div class="row">
    <div class="col-12">
        <div class="latest-documentos">
            <h2 class="title"><?php _e('&Uacute;ltimos Documentos'); ?></h2>
            <?php while ($last_documentos->have_posts()) : $last_documentos->the_post(); ?>
                <div class="row">
                    <div class="col-12">
                        <p class="documento-date-time">
                            <i class="fas fa-calendar-alt"></i>&nbsp;<?php echo get_the_modified_date('d/m/Y'); ?>
                            &agrave;s
                            <?php echo get_the_modified_time('G\hi'); ?>
                        </p>
                        &bull;
                        <?php echo get_the_term_list(get_the_ID(), 'documento_type', '<ul class="documento-type"><li>', ',&nbsp;</li><li>', '</li></ul>'); ?>
                        <h3 class="documento-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php wp_reset_query(); ?>
        <a href="<?php echo get_post_type_archive_link( 'documento' ); ?>" class="float-right link-todos-documentos"><?php _e('Acesse todos os Documentos'); ?></a>
    </div>
</div>
<?php endif; ?>
