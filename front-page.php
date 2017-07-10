<?php get_header(); ?>

<?php if (shortcode_exists('image-carousel')) : ?>
    <div class="row hidden-xs">
        <div class="col-xs-12">
            <!-- Carousel -->
            <?php echo do_shortcode('[image-carousel twbs="3"]'); ?>
        </div>
    </div>
<?php endif; ?>

<?php
    $args_sticky = array(
        'posts_per_page' => 1,
        'post__in'  => get_option( 'sticky_posts' ),
        'ignore_sticky_posts' => 1
    );
    $query_sticky = new WP_Query( $args_sticky );
?>

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-push-6">
        <!-- Banners -->
        <?php if (!dynamic_sidebar('widget-home')) : endif; ?>
    </div>
    <div class="col-xs-12 col-md-6 col-md-pull-6">
        <?php if ($query_sticky->have_posts()) : ?>
            <!-- Notícia Destaque -->
            <?php
                $query_sticky->the_post();
                $sticky_ID = get_the_ID();
            ?>
            <article class="noticia-destaque">
                <?php get_template_part('partials/noticias/item-front-page'); ?>
            </article>
        <?php endif; ?>
    </div>
</div>

<?php
    $posts_to_show = 4;
    $posts_per_page = $posts_to_show;
    $sticky_number = count(get_option( 'sticky_posts' ));
    if ($sticky_number > 1 && $sticky_number <= 4) {
        $posts_per_page = $posts_to_show - ($sticky_number - 1);
    }
    $args = array(
        'post_type' => 'post',
        'post__not_in' => array($sticky_ID),
        'posts_per_page' => $posts_per_page
    );
    $query = new WP_Query($args);
?>

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
        <?php if (!dynamic_sidebar('widget-agenda')) : endif; ?>
    </div>
    <div class="col-xs-12 col-md-8">
        <?php get_template_part('partials/editais/latest'); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-8 galeria">
        <?php if (!dynamic_sidebar('widget-gallery')) : endif; ?>
    </div>
    <div class="col-xs-12 col-md-4">
        <?php if (!dynamic_sidebar('widget-home-side')) : endif; ?>


        <!-- Social Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#embed-facebook" aria-controls="embed-facebook" role="tab" data-toggle="tab">Facebook</a></li>
            <li role="presentation"><a href="#embed-twitter" aria-controls="embed-twitter" role="tab" data-toggle="tab">Twitter</a></li>
        </ul>

        <!-- Social Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="embed-facebook">
                <?php get_template_part('partials/facebook'); ?>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="embed-twitter">
                <?php get_template_part('partials/twitter'); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2 class="title-box"><?php _e('Acesso R&aacute;pido'); ?></h2>
        <?php get_template_part('partials/menus/externo'); ?>
    </div>
</div>

<hr class="banner-separator">

<div class="row">
    <div class="col-xs-12">
        <?php if (!dynamic_sidebar('widget-home-banners')) : endif; ?>
    </div>
</div>

<?php get_footer(); ?>
