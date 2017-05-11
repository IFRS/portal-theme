                    <a href="#fim-conteudo" id="fim-conteudo" class="sr-only">Fim do conte&uacute;do</a>
                </main>
            </div>
        </div> <!-- /div.row -->
    </section> <!-- /section.container -->

    <a href="#inicio-rodape" id="inicio-rodape" class="sr-only">In&iacute;cio do rodap&eacute;</a>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <?php
                    wp_nav_menu(
                        array(
                            'menu_class'        => '',
                            'menu_id'           => 'menu-rodape',
                            'container'         => 'nav',
                            'container_class'   => false,
                            'container_id'      => 'menu-rodape-nav',
                            'depth'             => 2,
                            'theme_location'    => 'principal',
                        )
                    );
                ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer do Governo -->
    <div id="footer-brasil"></div>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>
                        <!-- Wordpress -->
                        <a href="http://br.wordpress.org/" target="blank">Desenvolvido com o CMS de c&oacute;digo aberto Wordpress<span class="sr-only"> (abre uma nova p&aacute;gina)</span></a> <span class="glyphicon glyphicon-new-window"></span>
                        &mdash;
                        <!-- Código-fonte -->
                        <a href="https://github.com/IFRS/portal-theme" target="blank">C&oacute;digo-fonte deste tema sob a licen&ccedil;a GPLv3<span class="sr-only"> (abre uma nova p&aacute;gina)</span></a> <span class="glyphicon glyphicon-new-window"></span>
                        &mdash;
                        <!-- Creative Commons -->
                        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cc-by-nc-sa-4.png" alt="M&iacute;dia licenciada sob a Licen&ccedil;a Creative Commons Atribui&ccedil;&atilde;o-N&atilde;oComercial-CompartilhaIgual 4.0 Internacional (abre uma nova p&aacute;gina)" /></a> <span class="glyphicon glyphicon-new-window"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a href="#fim-rodape" id="fim-rodape" class="sr-only">Fim do rodap&eacute;</a>

    <?php wp_footer(); ?>
</body>
</html>
