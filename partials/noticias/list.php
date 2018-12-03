<div class="lista-noticias">
    <div class="row">
        <div class="col-12">
            <h2 class="lista-noticias__title">
                <?php get_template_part('partials/noticias/list-title'); ?>
            </h2>
        </div>
    </div>

    <div class="card-deck lista-noticias__content">
    <?php while (have_posts()) : the_post(); ?>
        <div class="card border-light">
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
