<?php get_header(); ?>

<main class="container py-0">
  <?php ob_start(); ?>

  <!-- wp:image {"scale":"cover","sizeSlug":"full","lightbox":{"enabled":false},"linkDestination":"none","align":"center","className":"img-fluid"} -->
  <figure class="wp-block-image aligncenter size-full img-fluid">
    <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/404.png' ) ); ?>" alt="Erro 404 - Página não encontrada" loading="eager" />
  </figure>
  <!-- /wp:image -->

  <!-- wp:heading {"textAlign":"center"} -->
  <h2 class="wp-block-heading has-text-align-center">N&atilde;o foi possível localizar esta p&aacute;gina!</h2>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center"} -->
  <p class="has-text-align-center">Verifique o endere&ccedil;o informado ou tente voltar para a <a href="<?php echo esc_url( home_url() ); ?>" data-type="page">p&aacute;gina inicial</a>.</p>
  <!-- /wp:paragraph -->

  <?php echo do_blocks(ob_get_clean()); ?>
</main>

<?php get_footer(); ?>
