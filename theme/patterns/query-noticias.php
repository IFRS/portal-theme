<?php
/**
 * Title: Notícias
 * Slug: ifrs/query-noticias
 * Categories: query
 * Block Types: core/query
 */
?>

<!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"disable_pagination":true},"displayLayout":{"type":"flex","columns":4}} -->
<div class="wp-block-query">
  <!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
    <!-- wp:group {"className":"h-100","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
    <div class="wp-block-group h-100">
      <!-- wp:post-terms {"term":"category"} /-->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-excerpt {"excerptLength":25} /-->
      <!-- wp:post-date {"className":"mt-auto","style":{"layout":{"selfStretch":"fit","flexSize":null}}} /-->
    </div>
    <!-- /wp:group -->
  <!-- /wp:post-template -->
</div>
<!-- /wp:query -->
