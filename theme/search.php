<?php get_header(); ?>

<main class="container" data-search-term="<?php echo esc_attr(get_search_query()); ?>">
  <?php ob_start(); ?>

  <!-- wp:query-title {"type":"search","level":2,"className":"mb-4"} /-->

  <!-- wp:query {"query":{"inherit":true}} -->
  <div class="wp-block-query">
    <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"default","columnCount":3}} -->
      <!-- wp:post-title {"level":3,"isLink":true} /-->

      <!-- wp:post-excerpt {"excerptLength":99} /-->

      <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
      <div class="wp-block-group">
        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
          <!-- wp:portal/post-type-badge /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-date /-->
      </div>
      <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"className":"mt-5 mb-3","paginationArrow":"chevron","showLabel":false,"layout":{"type":"flex","justifyContent":"center"}} -->
      <!-- wp:query-pagination-previous /-->

      <!-- wp:query-pagination-numbers {"midSize":5} /-->

      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
      <!-- wp:html -->
      <div class="alert alert-warning" role="alert">
        <strong>Ops!</strong> N&atilde;o foram encontrados resultados para essa busca. Tente com outros termos.
      </div>
      <!-- /wp:html -->
    <!-- /wp:query-no-results -->
  </div>
  <!-- /wp:query -->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
