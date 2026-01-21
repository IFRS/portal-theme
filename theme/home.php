<?php get_header(); ?>

<main class="container">
  <?php ob_start(); ?>

  <!-- wp:heading {"className":"mb-4"} -->
  <h2 class="wp-block-heading mb-4">Todas as Not&iacute;cias</h2>
  <!-- /wp:heading -->

  <!-- wp:template-part {"slug":"noticias","lock":{"move":true,"remove":true}} /-->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
