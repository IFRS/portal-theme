<?php
/**
 * Title: Notícias Destaque
 * Slug: ifrs/query-noticias-destaque
 * Categories: query
 * Description: Exibe as notícias em destaque, 2 fixas (sticky) e 4 das demais em grid, usado normalmente na página inicial.
 * Block Types: core/query
 * Post types: page
 * Template Types: front-page
 */
?>

<!-- wp:query {"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false,"disable_pagination":true},"displayLayout":{"type":"flex","columns":2},"className":"noticias-destaque"} -->
<div class="wp-block-query noticias-destaque">
  <!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
    <!-- wp:group {"layout":{"inherit":false}} -->
    <div class="wp-block-group">
      <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->
      <!-- wp:post-terms {"term":"category"} /-->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-excerpt {"excerptLength":30} /-->
      <!-- wp:post-date {"textAlign":"right"} /-->
    </div>
    <!-- /wp:group -->
  <!-- /wp:post-template -->
</div>
<!-- /wp:query -->

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
