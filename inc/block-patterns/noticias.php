<?php

register_block_pattern('core/query-noticias', array(
	'title'      => 'Notícias',
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
	'content'    => '
    <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"disable_pagination":true},"displayLayout":{"type":"flex","columns":3}} -->
    <div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
    <!-- wp:group {"layout":{"inherit":false}} -->
    <div class="wp-block-group">
    <!-- wp:post-featured-image {"isLink":true} /-->
    <!-- wp:post-terms {"term":"category"} /-->
    <!-- wp:post-title {"isLink":true} /-->
    <!-- wp:post-excerpt {"excerptLength":30} /-->
    <!-- wp:post-date /-->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
  ',
));
