<?php
    global $post;

    $args = array(
        'orderby' => 'modified',
        'order' => 'DESC',
        'post_type' => 'edital',
        'posts_per_page' => 5
    );

    $last_editais = new WP_Query($args);
?>
<?php if ($last_editais->have_posts()) : ?>
<div class="row">
    <div class="col-xs-12">
        <div class="latest-editais">
            <h2 class="title"><?php _e('&Uacute;ltimos Editais'); ?></h2>
            <?php while ($last_editais->have_posts()) : $last_editais->the_post(); ?>
                <div class="row">
                    <div class="col-xs-12">
                        <p class="edital-date-time">
                            <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_modified_date('d/m/Y'); ?>
                            &agrave;s
                            <?php echo get_the_modified_time('G\hi'); ?>
                        </p>
                        &bull;
                        <?php echo get_the_term_list(get_the_ID(), 'edital_category', '<ul class="edital-categories"><li>', ',&nbsp;</li><li>', '</li></ul>'); ?>
                        <h3 class="edital-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <a href="<?php echo get_post_type_archive_link( 'edital' ); ?>" class="pull-right link-todos-editais"><?php _e('Acesse todos os Editais'); ?></a>
    </div>
</div>
<?php endif; ?>
