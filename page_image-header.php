<?php
/**
 * Template Name: Imagem destaque como cabeçalho
 */
?>

<?php get_header(); ?>

<?php the_post(); ?>

<article class="page">
    <?php if (has_post_thumbnail()) : ?>
        <h2 class="visually-hidden"><?php the_title(); ?></h2>
        <?php the_post_thumbnail('full', array('class' => 'img-fluid mx-auto')); ?>
    <?php else : ?>
        <h2 class="page__title"><?php the_title(); ?></h2>
    <?php endif; ?>
    <?php get_template_part('partials/subpages/subpages'); ?>
    <div class="page__content">
        <?php the_content(); ?>
    </div>
</article>

<?php get_footer(); ?>
