<?php get_header(); ?>

<?php the_post(); ?>

<div class="row">
    <div class="col-xs-12">
        <article class="page">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page__title"><?php the_title(); ?></h2>
                </div>
            </div>
            <?php get_template_part('partials/menus/subpages'); ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="page__content">
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', array('class' => 'page__thumb'));
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
