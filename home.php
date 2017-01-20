<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12">
        <h2><?php echo get_the_title(get_option( 'page_for_posts' )); ?></h2>
    </div>
</div>

<div class="row" id="lista-noticias">
<?php while (have_posts()) : the_post(); ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <article class="noticia">
            <?php get_template_part('partials/noticia', 'home'); ?>
        </article>
    </div>
<?php endwhile; ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <nav class="text-center">
            <?php echo portal_pagination(); ?>
        </nav>
    </div>
</div>

<?php get_footer(); ?>
