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
            <div class="col-xs-12">
                <h2 class="title-box">Not&iacute;cias para <?php echo $escopo->name; ?></h2>
            </div>
        </div>
        <div class="row" id="lista-noticias">
        <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <article class="noticia">
                    <?php get_template_part('partials/noticias/item'); ?>
                </article>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php wp_reset_query(); ?>
                <a href="<?php echo get_term_link( $escopo, 'escopo' ); ?>" class="pull-right link-todas-noticias"><?php _e('Acesse mais notícias'); ?></a>
            </div>
        </div>
<?php
    return ob_get_clean();
}

add_shortcode( 'noticias-escopo', 'noticias_escopo_shortcode' );
