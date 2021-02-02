<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Metadados -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="author" content="<?php _e('Departamento de Comunicação do Instituto Federal do Rio Grande do Sul', 'ifrs-portal-theme'); ?>">
    <meta name="description" content="<?php _e('O IFRS é uma instituição federal de ensino público e gratuito. Atua com uma estrutura multicampi para promover a educação profissional e tecnológica de excelência e impulsionar o desenvolvimento sustentável das regiões.', 'ifrs-portal-theme'); ?>">
    <meta name="keywords" content="<?php _e('ifrs, portal, site, institucional, faculdade, universidade, ensino, pesquisa, extensão, cursos', 'ifrs-portal-theme'); ?>">
    <?php if (!has_site_icon()) echo get_template_part('partials/favicons'); ?>
    <!-- Contexto Barra Brasil -->
    <meta property="creator.productor" content="http://estruturaorganizacional.dados.gov.br/id/unidade-organizacional/100918">
    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="<?php echo esc_attr(get_bloginfo('name')); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
    <!-- WP -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a href="#inicio-conteudo" class="sr-only sr-only-focusable">Pular para o conte&uacute;do</a>

    <?php wp_body_open(); ?>

    <?php echo get_template_part('partials/barrabrasil'); ?>

    <!-- Cabeçalho -->
    <header class="header">
        <div class="container">
            <div class="row header__menus">
                <div class="col-12 col-lg-6">
                    <?php get_template_part('partials/menus/atalhos'); ?>
                </div>
                <div class="col-12 col-lg-6">
                    <?php get_template_part('partials/menus/acessibilidade'); ?>
                </div>
            </div>
            <div class="row header__content">
                <div class="col-12 col-lg-8 header__title">
                    <?php echo get_template_part('partials/header-title'); ?>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="header__aside">
                        <?php get_search_form(); ?>
                        <?php if (is_active_sidebar('widget-social')) : ?>
                            <nav>
                                <ul class="area-social">
                                    <?php if (!dynamic_sidebar('widget-social')) : endif; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__barra-servicos">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php get_template_part('partials/menus/servicos'); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Corpo -->
    <?php portal_breadcrumb(); ?>

    <section class="container">
        <div class="row">
            <div class="col-12 col-lg-2">
                <!-- Menu -->
                <a href="#inicio-menu" id="inicio-menu" class="sr-only">In&iacute;cio da navega&ccedil;&atilde;o</a>
                <?php get_template_part('partials/menus/principal'); ?>
                <a href="#fim-menu" id="fim-menu" class="sr-only">Fim da navega&ccedil;&atilde;o</a>
            </div>
            <div class="col-12 col-lg-10">
                <!-- Conteúdo -->
                <main role="main">
                    <a href="#inicio-conteudo" id="inicio-conteudo" class="sr-only">In&iacute;cio do conte&uacute;do</a>
