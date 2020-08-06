<?php get_header(); ?>

<?php the_post(); ?>

<article class="page">
    <h2 class="page__title"><?php the_title(); ?></h2>
    <?php get_template_part('partials/subpages/subpages'); ?>
    <div class="page__content">
        <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', array('class' => 'page__thumb'));
            }
        ?>
        <?php the_content(); ?>
    </div>
    <p class="page__meta"><?php printf(__('Última atualização em %s', 'ifrs-portal-theme'), get_the_modified_date('d/m/Y')); ?></p>
</article>

<?php get_footer(); ?>
