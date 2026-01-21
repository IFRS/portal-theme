<?php get_header(); ?>

<main class="container-lg">
  <?php ob_start(); ?>

  <!-- wp:post-title /-->

  <!-- wp:pattern {"slug":"ifrs/subpages"} /-->

  <!-- wp:post-featured-image {"width":"100%","align":"center"} /-->

  <!-- wp:post-content /-->

  <div class="clearfix"></div>

  <!-- wp:group {"className":"my-4 p-2 border-top","layout":{"type":"flex","flexWrap":"nowrap"}} -->
  <div class="wp-block-group my-4 p-2 border-top">
    <!-- wp:post-date {"displayType":"modified","format":"\\A\\t\\u\\a\\l\\i\\z\\a\\d\\o \\e\\m j \\d\\e F \\d\\e Y"} /-->

    <!-- wp:spacer {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
    <div aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:pattern {"slug":"ifrs/share"} /-->
  </div>
  <!-- /wp:group -->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
