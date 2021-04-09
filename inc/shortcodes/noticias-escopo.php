<?php
add_shortcode( 'noticias-escopo', function($atts, $escopo = '') {
    wp_enqueue_style('home');

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
    <div class="lista-noticias">
        <h2 class="lista-noticias__title">Not&iacute;cias para <?php echo $escopo->name; ?></h2>
        <div class="card-deck lista-noticias__content">
        <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
            <div class="card border-white">
                <div class="card-body p-0">
                    <article class="noticia">
                        <?php get_template_part('partials/noticias/item'); ?>
                    </article>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <?php wp_reset_query(); ?>
        <div class="acesso-todas-noticias">
            <hr class="acesso-todas-noticias__separador">
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="float-right acesso-todas-noticias__link"><?php _e('Acesse mais notícias', 'ifrs-portal-theme'); ?></a>
        </div>
    </div>
<?php
    return ob_get_clean();
} );
