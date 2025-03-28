<?php
/**
 * Title: Cabeçalho Padrão do Site
 * Slug: ifrs/site-header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<div class="container">
  <?php get_template_part('partials/menus/atalhos'); ?>

  <div class="row align-items-center">
    <div class="col-12 col-md-5 col-lg-5">
      <div class="d-flex align-items-center mb-2 mb-md-0">
        <a href="https://www.gov.br/pt-br">
          <img src="<?php echo get_theme_file_uri( '/img/govbr.png' ) ?>" class="header__govbr" alt="Governo do Brasil" width="200" height="72">
        </a>
        <div class="vr mx-3"></div>
        <p class="m-0 fs-5">Minist&eacute;rio da Educa&ccedil;&atilde;o</p>
      </div>
    </div>
    <div class="col-12 col-md-7 col-lg-7">
      <?php get_template_part('partials/menus/acessibilidade'); ?>
    </div>
  </div>

  <div class="row align-items-center">
    <div class="col-12 col-md-6 col-lg-8 d-flex align-items-center">
      <?php get_template_part('partials/menus/principal'); ?>
      <div class="header__principal">
        <?php if (has_custom_logo()) : ?>
          <h1 class="visually-hidden"><?php bloginfo('name'); ?></h1>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <h1 class="header__title m-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <?php get_search_form(); ?>
    </div>
  </div>
</div>

<div class="header__barra-servicos">
  <div class="container">
    <?php get_template_part('partials/menus/servicos'); ?>
  </div>
</div>

<?php do_action( 'portal_menu' ); ?>

<?php
  if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
    yoast_breadcrumb( '<section class="container"><nav class="breadcrumb-yoast" aria-label="Caminhos de Navegação">','</nav></section>' );
  } else {
    portal_breadcrumb();
  }
