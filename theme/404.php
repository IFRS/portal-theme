<?php get_header(); ?>

<main class="container">
  <?php ob_start(); ?>

  <!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","className":"img-fluid"} -->
  <figure class="wp-block-image aligncenter size-full img-fluid"><img src="<?php echo get_parent_theme_file_uri( 'img/404.png' ); ?>" alt="Erro 404 - Página não encontrada"/></figure>
  <!-- /wp:image -->

  <!-- wp:heading {"textAlign":"center"} -->
  <h2 class="wp-block-heading has-text-align-center">Ops, temos um problema!</h2>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center"} -->
  <p class="has-text-align-center">A p&aacute;gina que voc&ecirc; procura n&atilde;o foi encontrada. Tente voltar para a <a href="<?php echo esc_url( home_url() ); ?>" data-type="page">p&aacute;gina inicial</a>.</p>
  <!-- /wp:paragraph -->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
