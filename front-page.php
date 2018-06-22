<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12">
    <?php
        if (is_front_page()) {
            get_template_part('partials/menus/campi');
        }
    ?>
    </div>
</div>

<?php
    $escopos = get_terms(array(
        'taxonomy' => 'escopo',
        'hide_empty' => false,
        'fields' => 'ids'
    ));

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => 'escopo',
                'field' => 'term_id',
                'terms' => $escopos,
                'operator' => 'NOT IN'
            )
        )
    );

    $query = new WP_Query($args);
?>

<div class="row">
    <!-- Banners -->
    <div class="col-xs-12 col-md-5 col-md-push-7">
        <div class="area-home">
            <?php if (!dynamic_sidebar('widget-home')) : endif; ?>
        </div>
    </div>
    <?php while ($query->have_posts() && $query->current_post < 4) : $query->the_post(); ?>
        <?php if ($query->current_post == 0) : ?>
            <!-- Notícia Destaque -->
            <div class="col-xs-12 col-md-7 col-md-pull-5">
                <article class="noticia noticia_destaque">
                    <?php get_template_part('partials/noticias/item'); ?>
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
                    <?php get_template_part('partials/noticias/item'); ?>
                </article>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <div class="acesso-todas-noticias">
            <hr class="acesso-todas-noticias__separador">
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="pull-right acesso-todas-noticias__link"><?php _e('Acesse mais notícias'); ?></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
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
            <ul class="area-atalhos">
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
