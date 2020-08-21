<?php get_header(); ?>

<?php the_post(); ?>

<article class="cursos">
    <h2 class="cursos__title"><?php the_title(); ?></h2>
    <?php the_content(); ?>
</article>

<?php get_footer(); ?>
