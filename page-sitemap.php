<?php get_header(); ?>

<?php the_post(); ?>

<article class="page">
    <h2 class="page__title"><?php the_title(); ?></h2>
    <?php get_template_part('partials/subpages/subpages'); ?>
    <div class="page__content">
        <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', array('class' => 'page__thumb'));
            }
        ?>
        <?php add_action('the_content', function($content) { ?>
            <?php ob_start(); ?>
            <ul class="sitemap" aria-label="Mapa do Site">
                <?php
                    wp_list_pages(array(
                        'exclude'     => get_the_ID() . ',' . get_option('page_on_front') . ',' . get_option('page_for_posts'),
                        'show_date'   => '',
                        'sort_column' => 'menu_order',
                        'title_li'    => '',
                    ));
                ?>
            </ul>
            <?php return $content . ob_get_clean(); ?>
        <?php }, 1); ?>
        <?php the_content(); ?>
    </div>
</article>

<?php get_footer(); ?>
