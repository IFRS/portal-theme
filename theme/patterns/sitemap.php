<?php
/**
 * Title: Mapa do Site
 * Slug: ifrs/sitemap
 * Categories: list
 * Block Types:
 */
?>
<!-- wp:html -->
<nav aria-label="Mapa do Site">
<!-- /wp:html -->
<!-- wp:list -->
<ul class="wp-block-list sitemap">
    <?php
      wp_list_pages(array(
        'exclude'     => get_option('page_on_front') . ',' . get_option('page_for_posts'),
        'show_date'   => '',
        'sort_column' => 'menu_order',
        'title_li'    => '',
      ));
    ?>
</ul>
<!-- /wp:list -->
<!-- wp:html -->
</nav>
<!-- /wp:html -->
