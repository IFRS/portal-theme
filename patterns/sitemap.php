<?php
/**
 * Title: Mapa do Site
 * Slug: ifrs/sitemap
 * Categories: list
 * Block Types:
 */
?>
<!-- wp:list -->
<ul class="wp-block-list sitemap" aria-label="Mapa do Site">
  <!-- wp:list-item -->
    <?php
      wp_list_pages(array(
        'exclude'     => get_the_ID() . ',' . get_option('page_on_front') . ',' . get_option('page_for_posts'),
        'show_date'   => '',
        'sort_column' => 'menu_order',
        'title_li'    => '',
      ));
    ?>
</ul>
<!-- /wp:list -->
