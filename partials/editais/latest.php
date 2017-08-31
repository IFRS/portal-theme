<div class="row">
    <div class="col-xs-12">
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

        <div class="latest-editais">
            <h2 class="title"><?php _e('&Uacute;ltimos Editais'); ?></h2>
            <?php if ($last_editais->have_posts()) : ?>
                <?php while ($last_editais->have_posts()) : $last_editais->the_post(); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <p>
                                <span class="edital-date-time">
                                    <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_modified_date('d/m/Y'); ?>
                                    &agrave;s
                                    <?php echo get_the_modified_time('G\hi'); ?>
                                </span>
                                &bull;
                                <span class="edital-category"><?php echo get_the_terms(get_the_ID(), 'edital_category')[0]->name; ?></span>
                            </p>
                            <h3 class="edital-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
        <a href="<?php echo get_post_type_archive_link( 'edital' ); ?>" class="pull-right link-todos-editais"><?php _e('Acesse todos os Editais'); ?></a>
    </div>
</div>
