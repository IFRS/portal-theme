<?php get_header(); ?>

<?php
    if (is_front_page()) {
        get_template_part('partials/menus/campi');
    }
?>

<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5
    );

    $query = new WP_Query($args);
?>

<div class="row">
    <!-- Banners -->
    <div class="col-xs-12 col-md-5 col-md-push-7">
        <?php if (!dynamic_sidebar('widget-home')) : endif; ?>
    </div>
    <?php while ($query->have_posts() && $query->current_post < 4) : $query->the_post(); ?>
        <?php if ($query->current_post == 0) : ?>
            <!-- Notícia Destaque -->
            <div class="col-xs-12 col-md-7 col-md-pull-5">
                <article class="noticia-destaque">
                      <?php get_template_part('partials/noticias/item-front-page'); ?>
                </article>
            </div>
         </div> <!-- /.row  -->
        <?php else : ?>
            <?php if ($query->current_post == 1) : ?>
                <div class="row">
            <?php endif; ?>
            <!-- Notícia Normal -->
            <div class="col-xs-12 col-sm-6 col-md-3">
                <article class="noticia">
                    <?php get_template_part('partials/noticias/item-front-page'); ?>
                </article>
            </div>
        <?php endif; ?>
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
<?php if (is_active_sidebar('widget-agenda')) : ?>
    <div class="col-xs-12 col-md-4">
        <?php if (!dynamic_sidebar('widget-agenda')) : endif; ?>
    </div>
    <div class="col-xs-12 col-md-8">
<?php else : ?>
    <div class="col-xs-12">
<?php endif; ?>
        <?php get_template_part('partials/editais/latest'); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-8">
        <?php if (!dynamic_sidebar('widget-gallery')) : endif; ?>
    </div>
    <div class="col-xs-12 col-md-4">
        <?php if (!dynamic_sidebar('widget-home-side')) : endif; ?>
    </div>
</div>

<?php if (is_active_sidebar('widget-atalhos')) : ?>
<div class="row">
    <div class="col-xs-12">
        <h2 class="title-box"><?php _e('Acesso R&aacute;pido'); ?></h2>
        <nav>
            <ul class="barra" id="menu-externo">
                <?php if (!dynamic_sidebar('widget-atalhos')) : endif; ?>
            </ul>
        </nav>
    </div>
</div>
<?php endif; ?>

<hr class="banner-separator">

<div class="row">
    <div class="col-xs-12">
        <?php if (!dynamic_sidebar('widget-banners')) : endif; ?>
    </div>
</div>

<?php get_footer(); ?>
