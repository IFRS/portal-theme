<?php get_header(); ?>

<main class="container">
  <?php ob_start(); ?>

  <!-- wp:query-title {"type":"archive","level":2,"showPrefix":false,"className":"mb-4"} /-->
  <!-- wp:template-part {"slug":"noticias","lock":{"move":true,"remove":true}} /-->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
