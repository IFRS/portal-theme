<?php
add_shortcode( 'posts-by-category', function($atts, $link_text = '') {
    // Attributes
    $atts = shortcode_atts(
        array(
            'cat' => get_option('default_category'),
            'num' => 5,
            'ignore_sticky' => false,
        ),
        $atts,
        'posts-by-category'
    );

    if (empty($link_text)) {
        $link_text = __('Acesse mais notícias', 'ifrs-portal-theme');
    }



    $args = array(
        'posts_per_page' => $atts['num'],
        'ignore_sticky_posts' => $atts['ignore_sticky'],
        'cat' => $atts['cat'],
    );

    $posts = new WP_Query($args);

    ob_start();
?>
    <div class="row">
        <div class="col-12">
            <ul class="posts-by-category">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <li class="posts-by-category__item"><a href="<?php the_permalink(); ?>" class="posts-by-category__link"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
            </ul>
            <a href="<?php echo get_category_link($atts['cat']) ?>"><strong><?php echo esc_html($link_text); ?></strong></a>
        </div>
    </div>
<?php
    return ob_get_clean();
} );
