<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12">
        <!-- Carousel -->
        <?php
            if (shortcode_exists('image-carousel')) {
                echo do_shortcode('[image-carousel twbs="3"]');
            }
        ?>
    </div>
</div>

<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4
    );
    $query = new WP_Query($args);
?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <!-- Notícia Destaque -->
        <?php $query->the_post(); ?>
        <article class="noticia-destaque">
            <?php get_template_part('partials/noticia', 'home'); ?>
        </article>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Banners -->
        <?php if (!dynamic_sidebar('widget-home')) : endif; ?>
    </div>
</div>

<hr class="separador-noticia"/>

<div class="row">
    <!-- Demais notícias -->
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <article class="noticia">
                <?php get_template_part('partials/noticia', 'home'); ?>
            </article>
        </div>
    <?php endwhile; ?>
</div>

<hr class="separador-noticia"/>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-success btn-sm pull-right"><?php _e('Acesse mais notícias'); ?></a>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <?php if (!dynamic_sidebar('widget-gallery')) : endif; ?>
    </div>
</div>



<?php get_footer(); ?>
