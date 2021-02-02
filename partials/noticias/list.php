<div class="lista-noticias">
    <h2 class="lista-noticias__title">
    <?php
        if (is_home()) {
            echo get_the_title(get_option( 'page_for_posts' ));
        } elseif (is_category()) {
            echo single_cat_title(__('Not&iacute;cias da categoria&nbsp;', 'ifrs-portal-theme'), false);
        } elseif (is_tag()) {
            echo single_tag_title(__('Not&iacute;cias com a tag&nbsp;', 'ifrs-portal-theme'), false);
        } elseif (is_tax('escopo')) {
            echo single_term_title('Not&iacute;cias para ', false);
        } else {
            echo __('Not&iacute;cias', 'ifrs-portal-theme');
        }
    ?>
    </h2>

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
    <nav class="text-center">
        <?php echo portal_pagination(); ?>
    </nav>
</div>
