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
        <?php the_content(); ?>
        <ul>
            <?php
                wp_list_pages(array(
                    'exclude'     => get_the_ID(),
                    'show_date'   => '',
                    'sort_column' => 'menu_order',
                    'title_li'    => '',
                ));
            ?>
        </ul>
    </div>
</article>

<?php get_footer(); ?>
