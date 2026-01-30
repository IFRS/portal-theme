<a href="#fim-conteudo" id="fim-conteudo" class="visually-hidden">Fim do conte&uacute;do</a>

<?php echo do_blocks('<!-- wp:template-part {"slug":"prefooter","className":"container mb-5","theme":"ifrs-portal-theme","lock":{"move":true,"remove":true}} /-->'); ?>

<?php if (has_nav_menu( 'campi' )) get_template_part('partials/menus/campi'); ?>

<footer>
  <a href="#inicio-rodape" id="inicio-rodape" class="visually-hidden">In&iacute;cio do rodap&eacute;</a>

  <section class="footer__content">
    <div class="container">
      <?php echo do_blocks('<!-- wp:template-part {"slug":"footer-content"} /-->'); ?>

      <div class="row align-items-center py-4">
        <!-- Redes Sociais -->
        <div class="col-12 col-sm-6">
          <?php echo block_template_part( 'social' ); ?>
        </div>
        <!-- Acesso à Informação -->
        <div class="col-12 col-sm-6">
          <a href="https://www.gov.br/acessoainformacao" target="_blank" class="footer__lai ms-0 ms-sm-auto" rel="noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="Site sobre a Lei de Acesso &agrave; Informa&ccedil;&atilde;o">
            <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/acesso-info.svg' ) ); ?>" alt="Site sobre a Lei de Acesso &agrave; Informa&ccedil;&atilde;o (abre uma nova p&aacute;gina)" class="lazyload img-fluid mx-auto" width="544" height="228" loading="lazy" />
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="footer__creditos">
    <!-- Wordpress -->
    <a href="https://br.wordpress.org/" target="_blank" rel="noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="Desenvolvido com Wordpress">
      <img src="<?php echo esc_url (get_parent_theme_file_uri( '/img/creditos-wordpress.png' ) ); ?>" alt="Desenvolvido com Wordpress (abre uma nova p&aacute;gina)" class="lazyload" width="98" height="20" loading="lazy" />
      <i class="ms-1 fa-solid fa-arrow-up-right-from-square"></i>
    </a>
    <!-- Código-fonte -->
    <a href="https://github.com/IFRS/portal-theme/" target="_blank" rel="noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="C&oacute;digo-fonte deste tema sob a licen&ccedil;a GPLv3">
      <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/creditos-git.png' ) ); ?>" alt="C&oacute;digo-fonte deste tema sob a licen&ccedil;a GPLv3 (abre uma nova p&aacute;gina)" class="lazyload" width="43" height="18" loading="lazy" />
      <i class="ms-1 fa-solid fa-arrow-up-right-from-square"></i>
    </a>
    <!-- Creative Commons -->
    <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt_BR" target="_blank" rel="noopener license" data-bs-toggle="tooltip" data-bs-placement="top" title="M&iacute;dia licenciada sob a Licen&ccedil;a Creative Commons Atribui&ccedil;&atilde;o-N&atilde;oComercial-CompartilhaIgual 4.0 Internacional">
      <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/creditos-cc-by-nc-sa.png' ) ); ?>" alt="M&iacute;dia licenciada sob a Licen&ccedil;a Creative Commons Atribui&ccedil;&atilde;o-N&atilde;oComercial-CompartilhaIgual 4.0 Internacional (abre uma nova p&aacute;gina)" class="lazyload" width="80" height="15" loading="lazy" />
      <i class="ms-1 fa-solid fa-arrow-up-right-from-square"></i>
    </a>
  </section>

  <a href="#fim-rodape" id="fim-rodape" class="visually-hidden">Fim do rodap&eacute;</a>
</footer>

<?php wp_footer(); ?>

</body>
</html>
