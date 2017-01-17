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

<div class="row">
    <div class="col-xs-12 col-md-6">
        <!-- Notícia Destaque -->
        <?php the_post(); ?>
        <article class="noticia-destaque">
        <?php if (has_post_thumbnail()) : ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive center-block noticia-imagem')); ?>
                </div>
            </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="noticia-titulo"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="noticia-resumo">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Banners -->
        <?php if (!dynamic_sidebar('widget-home')) : endif; ?>
    </div>
</div>

<hr class="separador-noticia"/>

<div class="row">
    <?php while (have_posts()) : the_post(); ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <article class="noticia">
            <?php if (has_post_thumbnail()) : ?>
                <div class="row">
                    <div class="col-xs-12">
                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive center-block noticia-imagem')); ?>
                    </div>
                </div>
            <?php endif; ?>
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="noticia-titulo"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="noticia-resumo">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    <?php endwhile; ?>
</div>

<hr class="separador-noticia"/>

<div class="row">
    <div class="col-xs-12">
        <?php wp_reset_query(); ?>
        <a href="<?php get_post_type_archive_link( 'post' ); ?>" class="btn btn-success btn-sm pull-right"><?php _e('Acesse mais notícias'); ?></a>
    </div>
</div>

<?php get_footer(); ?>
