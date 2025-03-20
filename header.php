<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Metadados -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="<?php _e('Departamento de Comunicação do Instituto Federal do Rio Grande do Sul', 'ifrs-portal-theme'); ?>">
  <meta name="description" content="<?php _e('O IFRS é uma instituição federal de ensino público e gratuito. Atua com uma estrutura multicampi para promover a educação profissional e tecnológica de excelência e impulsionar o desenvolvimento sustentável das regiões.', 'ifrs-portal-theme'); ?>">
  <meta name="keywords" content="<?php _e('ifrs, portal, site, institucional, faculdade, universidade, ensino, pesquisa, extensão, cursos', 'ifrs-portal-theme'); ?>">

  <?php if (!has_site_icon()) echo get_template_part('partials/favicons'); ?>

  <!-- RSS -->
  <link rel="alternate" type="application/rss+xml" title="<?php echo esc_attr(get_bloginfo('name')); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <!-- WP -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a href="#inicio-conteudo" class="visually-hidden visually-hidden-focusable">Pular para o conte&uacute;do</a>

  <?php wp_body_open(); ?>

  <header class="header">
    <div class="container">
      <?php get_template_part('partials/menus/atalhos'); ?>

      <div class="row align-items-center">
        <div class="col-12 col-lg-4 d-flex align-items-start">
          <a href="https://www.gov.br/pt-br">
            <img src="<?php echo get_theme_file_uri( '/img/govbr.png' ) ?>" class="header__govbr" alt="Governo do Brasil" width="200" height="72">
          </a>
          <div class="vr mx-3"></div>
          <p class="m-0 fs-5">Minist&eacute;rio da Educa&ccedil;&atilde;o</p>
        </div>
        <div class="col-12 col-lg-8">
          <?php get_template_part('partials/menus/acessibilidade'); ?>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-12 col-lg-8 d-flex align-items-center">
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
        <div class="col-12 col-lg-4">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
    <div class="header__barra-servicos">
      <div class="container">
        <?php get_template_part('partials/menus/servicos'); ?>
      </div>
    </div>
  </header>

  <?php do_action( 'portal_menu' ); ?>

  <?php
    if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
      yoast_breadcrumb( '<section class="container" id="breadcrumb"><div class="row"><div class="col"><nav aria-label="Caminhos de Navegação">','</nav></div></section>' );
    } else {
      portal_breadcrumb();
    }
  ?>

  <main role="main" class="container">
    <a href="#inicio-conteudo" id="inicio-conteudo" class="visually-hidden">In&iacute;cio do conte&uacute;do</a>
