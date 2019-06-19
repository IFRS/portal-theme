                    <a href="#fim-conteudo" id="fim-conteudo" class="sr-only">Fim do conte&uacute;do</a>
                </main>
            </div>
        </div> <!-- /div.row -->
    </section> <!-- /section.container -->

    <!-- Rodapé -->
    <a href="#inicio-rodape" id="inicio-rodape" class="sr-only">In&iacute;cio do rodap&eacute;</a>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php
                    wp_nav_menu(
                        array(
                            'menu_class'        => 'menu-rodape',
                            'menu_id'           => '',
                            'container'         => 'nav',
                            'container_class'   => '',
                            'container_id'      => 'sitemap',
                            'depth'             => 2,
                            'theme_location'    => 'principal',
                        )
                    );
                ?>
                </div>
            </div>
        </div>
        <div class="container footer__info">
            <div class="row">
                <div class="col-12 col-lg-6 area-rodape">
                    <?php if (!dynamic_sidebar('widget-footer')) : endif; ?>
                </div>
                <div class="col-12 col-lg-3 offset-lg-3 col-xl-2 offset-xl-4">
                    <a href="http://www.acessoainformacao.gov.br/"><img src="<?php echo get_template_directory_uri(); ?>/img/acesso-info.png" alt="Acesso &agrave; Informa&ccedil;&atilde;o" class="img-fluid mx-auto"></a>
                </div>
            </div>
        </div>
        <div class="license">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="license__content">
                            <!-- Wordpress -->
                            <a href="https://br.wordpress.org/" target="blank" class="license__link">Desenvolvido com o CMS de c&oacute;digo aberto Wordpress<span class="sr-only"> (abre uma nova p&aacute;gina)</span></a> <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            &mdash;
                            <!-- Código-fonte -->
                            <a href="https://github.com/IFRS/portal-theme" target="blank" class="license__link">C&oacute;digo-fonte deste tema sob a licen&ccedil;a GPLv3<span class="sr-only"> (abre uma nova p&aacute;gina)</span></a> <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            &mdash;
                            <!-- Creative Commons -->
                            <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="blank" class="license__link"><img src="<?php echo get_template_directory_uri(); ?>/img/cc-by-nc-sa-4.png" alt="M&iacute;dia licenciada sob a Licen&ccedil;a Creative Commons Atribui&ccedil;&atilde;o-N&atilde;oComercial-CompartilhaIgual 4.0 Internacional (abre uma nova p&aacute;gina)" /></a> <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#fim-rodape" id="fim-rodape" class="sr-only">Fim do rodap&eacute;</a>

    <?php wp_footer(); ?>
</body>
</html>
