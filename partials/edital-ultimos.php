<div class="row">
    <div class="col-xs-12">
    <?php
        global $post;

        $args = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'edital',
            'numberposts' => 5
        );

        $last_editais = new WP_Query($args);
    ?>
    <?php if ($last_editais->have_posts()) : ?>
        <div class="latest-editais">
            <h2 class="title-box"><?php _e('&Uacute;ltimos Editais'); ?></h2>
            <?php while ($last_editais->have_posts()) : $last_editais->the_post(); ?>
                <article>
                    <div class="row">
                        <div class="edital-date-time col-xs-12 col-md-3">
                            <p class="edital-date"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_date('d/m/Y'); ?></p>
                            <p class="edital-time"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo get_the_time('G\hi'); ?></p>
                        </div>
                        <div class="edital-body col-xs-12 col-md-9">
                            <p class="edital-category"><?php echo get_the_terms(get_the_ID(), 'edital_category')[0]->name; ?></p>
                            <h3 class="edital-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <a href="<?php echo get_post_type_archive_link( 'edital' ); ?>" class="pull-right link-todos-editais"><?php _e('Acesse todos os Editais'); ?></a>
    </div>
</div>
