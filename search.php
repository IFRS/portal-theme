<?php get_header(); ?>

<?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
        <p><?php _e('Nenhum resultado encontrado.'); ?></p>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="title-box"><?php printf('Resultados da busca por &quot;%s&quot;', get_search_query()); ?></h2>
        </div>
    </div>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('partials/search-result'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php the_posts_navigation(array('next_text' => 'Resultados anteriores', 'prev_text' => 'Mais resultados', 'screen_reader_text' => ' ')); ?>

<?php get_footer(); ?>
