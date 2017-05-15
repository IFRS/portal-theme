<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12">
        <article class="page">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </div>
            </div>
            <?php get_template_part('partials/menus/subpage-menu'); ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-content">
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', array('class' => 'page-thumb'));
                            }
                        ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php get_template_part('partials/share-buttons'); ?>
                </div>
            </div>
        </article>
    </div>
</div>

<?php get_footer(); ?>
