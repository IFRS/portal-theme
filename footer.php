                <a href="#fim-conteudo" id="fim-conteudo" class="sr-only">Fim do conte&uacute;do</a>
            </main>
        </div> <!-- /div.row -->
    </section> <!-- /section.container -->

    <!-- Rodapé -->
    <a href="#inicio-rodape" id="inicio-rodape" class="sr-only">In&iacute;cio do rodap&eacute;</a>
    <footer class="footer">
        <div class="container">
            <div class="row footer__info">
                <div class="col-12 col-md-6 col-lg-6 area-rodape">
                    <?php if (!dynamic_sidebar('widget-footer')) : endif; ?>
                </div>
                <div class="col-12 col-md-3 col-lg-3">
                    <?php get_template_part('partials/banner-e-mec'); ?>
                </div>
                <div class="col-12 col-md-3 col-lg-3">
                    <a href="https://www.gov.br/acessoainformacao" target="_blank" class="footer__lai d-block px-sm-5 px-md-0" rel="noopener" data-toggle="tooltip" data-placement="top" title="Site sobre a Lei de Acesso &agrave; Informa&ccedil;&atilde;o">
                        <img data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/acesso-info.svg" alt="Site sobre a Lei de Acesso &agrave; Informa&ccedil;&atilde;o (abre uma nova p&aacute;gina)" class="lazyload img-fluid mx-auto" width="544" height="228"/>
                    </a>
                    <div class="creditos">
                        <!-- Wordpress -->
                        <a href="https://br.wordpress.org/" target="_blank" rel="noopener" data-toggle="tooltip" data-placement="top" title="Desenvolvido com Wordpress">
                            <img data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/creditos-wordpress.png" alt="Desenvolvido com Wordpress (abre uma nova p&aacute;gina)" class="lazyload" width="98" height="20"/>
                        </a>
                        <!-- Código-fonte -->
                        <a href="https://github.com/IFRS/portal-theme/" target="_blank" rel="noopener" data-toggle="tooltip" data-placement="top" title="C&oacute;digo-fonte deste tema sob a licen&ccedil;a GPLv3">
                            <img data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/creditos-git.png" alt="C&oacute;digo-fonte deste tema sob a licen&ccedil;a GPLv3 (abre uma nova p&aacute;gina)" class="lazyload" width="43" height="18"/>
                        </a>
                        <!-- Creative Commons -->
                        <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt_BR" target="_blank" rel="noopener license" data-toggle="tooltip" data-placement="top" title="M&iacute;dia licenciada sob a Licen&ccedil;a Creative Commons Atribui&ccedil;&atilde;o-N&atilde;oComercial-CompartilhaIgual 4.0 Internacional">
                            <img data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/creditos-cc-by-nc-sa.png" alt="M&iacute;dia licenciada sob a Licen&ccedil;a Creative Commons Atribui&ccedil;&atilde;o-N&atilde;oComercial-CompartilhaIgual 4.0 Internacional (abre uma nova p&aacute;gina)" class="lazyload" width="80" height="15"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#fim-rodape" id="fim-rodape" class="sr-only">Fim do rodap&eacute;</a>
    </footer>

    <?php wp_footer(); ?>

    <!-- VLibras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
</body>
</html>
