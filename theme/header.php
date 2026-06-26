<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Metadados -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="<?php esc_attr_e('Departamento de Comunicação do Instituto Federal do Rio Grande do Sul', 'ifrs-portal-theme'); ?>">
    <meta name="keywords" content="<?php esc_attr_e('ifrs, portal, site, institucional, instituto, federal, faculdade, universidade, cursos, ensino, pesquisa, extensão, ead', 'ifrs-portal-theme'); ?>">
    <meta name="description" content="<?php esc_attr_e('O IFRS é uma instituição federal de ensino público e gratuito. Atua com uma estrutura multicampi para promover a educação profissional e tecnológica de excelência e impulsionar o desenvolvimento sustentável das regiões.', 'ifrs-portal-theme'); ?>">

    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="<?php echo esc_attr(sprintf(__('%s Feed', 'ifrs-portal-theme'), get_bloginfo('name'))); ?>" href="<?php echo esc_url(get_feed_link()); ?>">

    <!-- WP -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a href="#inicio-conteudo" class="visually-hidden visually-hidden-focusable"><?php esc_html_e('Pular para o conteúdo', 'ifrs-portal-theme'); ?></a>

  <?php wp_body_open(); ?>

  <!-- Cabeçalho -->
  <header class="header">
    <div class="container">
      <?php get_template_part('partials/menus/atalhos'); ?>

      <div class="row align-items-center">
        <div class="col-12 col-md-5 col-lg-5">
          <div class="d-flex align-items-center mb-2 mb-md-0">
            <a href="https://www.gov.br/pt-br">
              <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/govbr.png' ) ); ?>" class="header__govbr" alt="<?php esc_attr_e('Governo do Brasil', 'ifrs-portal-theme'); ?>" width="200" height="72" loading="eager">
            </a>
            <div class="vr mx-3"></div>
            <p class="header__mec"><?php esc_html_e('Ministério da Educação', 'ifrs-portal-theme'); ?></p>
          </div>
        </div>
        <div class="col-12 col-md-7 col-lg-7">
          <?php get_template_part('partials/menus/acessibilidade'); ?>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-12 col-md-8 col-lg-7 d-flex align-items-center mb-5 mb-md-0">
          <?php get_template_part('partials/menus/principal', 'mobile'); ?>
          <div class="header__principal">
            <h1 class="visually-hidden"><?php bloginfo('name'); ?></h1>
            <?php echo do_blocks('<!-- wp:template-part {"slug":"header-content","lock":{"move":true,"remove":true}} /-->'); ?>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-5">
          <?php get_search_form(); ?>
        </div>
      </div>

      <div class="row align-items-center">
        <?php get_template_part('partials/menus/principal'); ?>
      </div>
    </div>
  </header>

  <?php
  if ( function_exists('yoast_breadcrumb') && ! is_front_page() ) {
    $breadcrumb_start = sprintf(
      '<section class="container"><nav class="breadcrumb-yoast" aria-label="%s">',
      esc_attr__('Caminhos de navegação', 'ifrs-portal-theme')
    );
    yoast_breadcrumb($breadcrumb_start,'</nav></section>');
  } else {
    echo do_blocks('<!-- wp:breadcrumbs /-->');
  }
  ?>

  <a id="inicio-conteudo" href="#inicio-conteudo" class="visually-hidden visually-hidden-focusable"><?php esc_html_e('Início do conteúdo', 'ifrs-portal-theme'); ?></a>
