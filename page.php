<?php get_header(); ?>

<?php the_post(); ?>

<div class="row">
    <div class="col-xs-12">
        <article class="post">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <?php get_template_part('partials/share', 'buttons'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="post-content">
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', array('class' => 'post-thumb'));
                            }
                        ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>

<?php get_footer(); ?>
