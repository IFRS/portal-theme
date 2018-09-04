<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Meta Init -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="author" content="Instituto Federal do Rio Grande do Sul - Diretoria de Comunicação">
    <meta name="keywords" content="ifrs, portal, site, institucional">
    <meta property="creator.productor" content="http://estruturaorganizacional.dados.gov.br/id/unidade-organizacional/100918">
    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
    <?php echo get_template_part('partials/title'); ?>
    <!-- Favicon -->
    <?php echo get_template_part('partials/favicons'); ?>
    <!-- CSS, JS & etc. -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a href="#inicio-conteudo" class="sr-only sr-only-focusable">Pular para o conte&uacute;do</a>

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
                        <div class="row">
                            <div class="col-12">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <?php if (is_active_sidebar('widget-social')) : ?>
                            <div class="row">
                                <div class="col-12">
                                    <nav>
                                        <ul class="area-social">
                                            <?php if (!dynamic_sidebar('widget-social')) : endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
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
