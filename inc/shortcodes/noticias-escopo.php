<?php
function noticias_escopo_shortcode($atts, $escopo = '') {
    $escopo = get_term_by( 'slug', $escopo, 'escopo' );

    $args = array(
        'nopaging' => true,
        'posts_per_page' => 4,
        'ignore_sticky_posts' => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'escopo',
                'field' => 'slug',
                'terms' => $escopo
            )
        )
    );

    $noticias = new WP_Query($args);

    ob_start();
?>
        <div class="row">
            <div class="col-12">
                <h2 class="title-box">Not&iacute;cias para <?php echo $escopo->name; ?></h2>
            </div>
        </div>
        <div class="row" id="lista-noticias">
        <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
            <div class="col-12 col-sm-6 col-md-3">
                <article class="noticia">
                    <?php get_template_part('partials/noticias/item'); ?>
                </article>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
            <div class="col-12">
                <div class="acesso-todas-noticias">
                    <hr class="acesso-todas-noticias__separador">
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="float-right acesso-todas-noticias__link"><?php _e('Acesse mais notícias'); ?></a>
                </div>
            </div>
        </div>
<?php
    return ob_get_clean();
}

add_shortcode( 'noticias-escopo', 'noticias_escopo_shortcode' );
