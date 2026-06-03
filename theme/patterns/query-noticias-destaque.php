<?php
/**
 * Title: Notícias Destaque
 * Slug: ifrs/query-noticias-destaque
 * Categories: query
 * Block Types: core/query
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
