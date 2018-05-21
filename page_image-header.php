<?php /* Template Name: Imagem destaque como cabeçalho */ ?>

<?php get_header(); ?>

<?php the_post(); ?>

<div class="row">
    <div class="col-xs-12">
        <article class="page">
            <div class="row">
                <div class="col-xs-12">
                    <?php if (has_post_thumbnail()) : ?>
                        <h2 class="hidden"><?php the_title(); ?></h2>
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive center-block')); ?>
                    <?php else : ?>
                        <h2 class="page-title"><?php the_title(); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <?php get_template_part('partials/menus/subpages'); ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-content">
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