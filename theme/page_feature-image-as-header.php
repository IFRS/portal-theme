<?php
/**
* Template Name: Imagem Destacada como Cabeçalho
* Template Post Type: page
*/
?>
<?php get_header(); ?>

<main id="page-<?php the_ID(); ?>" <?php post_class(['container-lg']); ?>>
  <?php ob_start(); ?>

  <!-- wp:post-featured-image {"align":"full","className":"mt-0"} /-->

  <!-- wp:post-title {"className":"screen-reader-text"} /-->

  <!-- wp:pattern {"slug":"ifrs/subpages"} /-->

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
