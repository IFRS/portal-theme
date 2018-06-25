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
        <div class="ultimos-editais">
            <h2 class="ultimos-editais__title"><?php _e('&Uacute;ltimos Editais'); ?></h2>
            <?php while ($last_editais->have_posts()) : $last_editais->the_post(); ?>
                <div class="row ultimos-editais__edital">
                    <div class="col-xs-12">
                        <p class="ultimos-editais__edital-datetime">
                            <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_modified_date('d/m/Y'); ?>
                            &agrave;s
                            <?php echo get_the_modified_time('G\hi'); ?>
                        </p>
                        &bull;
                        <?php echo get_the_term_list(get_the_ID(), 'edital_category', '<ul class="ultimos-editais__edital-categories"><li>', ',&nbsp;</li><li>', '</li></ul>'); ?>
                        <h3 class="ultimos-editais__edital-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <div class="acesso-todos-editais">
            <hr class="acesso-todos-editais__separador">
            <a href="<?php echo get_post_type_archive_link( 'edital' ); ?>" class="pull-right acesso-todos-editais__link"><?php _e('Acesse todos os Editais'); ?></a>
        </div>
    </div>
</div>
<?php endif; ?>
