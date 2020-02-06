<div class="lista-noticias">
    <div class="row">
        <div class="col-12">
            <h2 class="lista-noticias__title">
            <?php
                if (is_home()) {
                    echo get_the_title(get_option( 'page_for_posts' ));
                } elseif (is_category()) {
                    echo single_cat_title(__('Not&iacute;cias da categoria&nbsp;'), false);
                } elseif (is_tag()) {
                    echo single_tag_title(__('Not&iacute;cias com a tag&nbsp;'), false);
                } elseif (is_tax('escopo')) {
                    echo single_term_title('Not&iacute;cias para ', false);
                } else {
                    echo 'Not&iacute;cias';
                }
            ?>
            </h2>
        </div>
    </div>

    <div class="card-deck lista-noticias__content">
    <?php while (have_posts()) : the_post(); ?>
        <div class="card border-white">
            <div class="card-body p-0">
                <article class="noticia">
                    <?php get_template_part('partials/noticias/item'); ?>
                </article>
            </div>
        </div>
    <?php endwhile; ?>
    </div>

    <div class="row">
        <div class="col-12">
            <nav class="text-center">
                <?php echo portal_pagination(); ?>
            </nav>
        </div>
    </div>
</div>
