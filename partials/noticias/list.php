<div class="row">
    <div class="col-xs-12">
        <h2 class="title-box">
        <?php
            if (is_home()) {
                echo get_the_title(get_option( 'page_for_posts' ));
            } elseif (is_category()) {
                echo single_cat_title(__('Notícias da categoria&nbsp;'), false);
            } elseif (is_tag()) {
                echo single_tag_title(__('Notícias com a tag&nbsp;'), false);
            }
        ?>
        </h2>
    </div>
</div>

<div class="row" id="lista-noticias">
<?php while (have_posts()) : the_post(); ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <article class="noticia">
            <?php get_template_part('partials/noticias/item-front-page'); ?>
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
