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
    <?php echo get_template_part('partials/title'); ?>
    <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= esc_url(get_feed_link()); ?>">
    <!-- Favicon -->
    <?php echo get_template_part('partials/favicons'); ?>
    <!-- CSS, JS & etc. -->
    <?php wp_head(); ?>
</head>

<body>
    <a href="#content" class="sr-only sr-only-focusable">Pular para o conte&uacute;do</a>

    <?php echo get_template_part('partials/barrabrasil'); ?>

    <!-- Cabeçalho -->
    <header>
        <h1 class="sr-only"><?php bloginfo('name'); ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <!-- Atalhos de teclado -->
                </div>
                <div class="col-xs-12 col-md-6">
                    <!-- Barra de Acessibilidade & Idiomas -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                <?php if (get_header_image() != '') : ?>
                    <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php header_image(); ?>" alt="Marca do IFRS" class="center-block img-responsive"/></a>
                <?php endif; ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Redes Sociais e RSS -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- Barra de Serviços -->
                </div>
            </div>
        </div>
    </header>

    <section role="main">
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <!-- Menu -->
            </div>
            <div class="col-xs-12 col-md-10">
                <!-- Conteúdo -->
                <a href="#inicio-conteudo" id="inicio-conteudo" class="sr-only">In&iacute;cio do conte&uacute;do</a>
