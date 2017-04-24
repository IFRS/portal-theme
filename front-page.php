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
            <?php get_template_part('partials/noticias/item-front-page'); ?>
        </article>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Banners -->
        <?php if (!dynamic_sidebar('widget-home')) : endif; ?>
    </div>
</div>

<div class="row">
    <!-- Demais notícias -->
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <article class="noticia">
                <?php get_template_part('partials/noticias/item-front-page'); ?>
            </article>
        </div>
    <?php endwhile; ?>
</div>

<hr class="separador-noticia"/>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="pull-right link-todas-noticias"><?php _e('Acesse mais notícias'); ?></a>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <!-- TODO Agenda -->
        <?php get_template_part('partials/eventos/latest'); ?>
    </div>
    <div class="col-xs-12 col-md-8">
        <!-- TODO Últimos Editais -->
        <?php get_template_part('partials/editais/latest'); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-8 galeria">
        <?php if (!dynamic_sidebar('widget-gallery')) : endif; ?>
    </div>
    <div class="col-xs-12 col-md-4">
        <?php if (!dynamic_sidebar('widget-home-side')) : endif; ?>
        <?php get_template_part('partials/facebook'); ?>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-xs-12">
        <?php get_template_part('partials/menus/externo'); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2 class="title-box"><?php _e('Banners'); ?></h2>
        <?php if (!dynamic_sidebar('widget-home-banners')) : endif; ?>
    </div>
</div>

<?php get_footer(); ?>
