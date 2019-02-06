<?php while(have_posts()) : the_post(); ?>
    <?php get_template_part('partials/cursos/item'); ?>
<?php endwhile; ?>
