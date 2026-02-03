<?php get_header(); ?>

<main id="post-<?php the_ID(); ?>" <?php post_class(['container']); ?>>
  <?php ob_start(); ?>

  <!-- wp:post-terms {"term":"category"} /-->

  <!-- wp:post-title /-->

  <!-- wp:group {"className":"my-4 p-2 border-top border-bottom","layout":{"type":"flex","flexWrap":"nowrap"}} -->
  <div class="wp-block-group my-4 p-2 border-top border-bottom">
    <!-- wp:post-date {"format":"\\P\\u\\b\\l\\i\\c\\a\\d\\o \\e\\m j \\d\\e F \\d\\e Y"} /-->

    <div class="vr"></div>

    <!-- wp:post-date {"displayType":"modified","format":"\\A\\t\\u\\a\\l\\i\\z\\a\\d\\o \\e\\m j \\d\\e F \\d\\e Y"} /-->

    <!-- wp:spacer {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
    <div aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:pattern {"slug":"ifrs/share"} /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:post-featured-image {"width":"75%","align":"center"} /-->

  <!-- wp:post-content /-->

  <!-- wp:post-terms {"term":"post_tag","prefix":"\u003cstrong\u003ePalavras-chave:\u003c/strong\u003e ","className":"mt-5","style":{"typography":{"textTransform":"capitalize"}}} /-->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
