<a href="#fim-conteudo" id="fim-conteudo" class="visually-hidden"><?php esc_html_e('Fim do conteúdo', 'ifrs-portal-theme'); ?></a>

<?php echo do_blocks('<!-- wp:template-part {"slug":"prefooter","className":"container mb-5","theme":"ifrs-portal-theme","lock":{"move":true,"remove":true}} /-->'); ?>

<?php if (has_nav_menu( 'campi' )) get_template_part('partials/menus/campi'); ?>

<footer>
  <a href="#inicio-rodape" id="inicio-rodape" class="visually-hidden"><?php esc_html_e('Início do rodapé', 'ifrs-portal-theme'); ?></a>

  <section class="footer__content">
    <div class="container">
      <?php echo do_blocks('<!-- wp:template-part {"slug":"footer-content"} /-->'); ?>

      <div class="row align-items-center py-4">
        <!-- Redes Sociais -->
        <div class="col-12 col-sm-6">
          <?php block_template_part( 'social' ); ?>
        </div>
        <!-- Acesso à Informação -->
        <div class="col-12 col-sm-6">
          <a href="https://www.gov.br/acessoainformacao" target="_blank" class="footer__lai ms-0 ms-sm-auto mt-4 mt-md-0" rel="noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Site sobre a Lei de Acesso à Informação', 'ifrs-portal-theme'); ?>">
            <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/acesso-info.svg' ) ); ?>" alt="<?php esc_attr_e('Site sobre a Lei de Acesso à Informação (abre uma nova página)', 'ifrs-portal-theme'); ?>" class="img-fluid mx-auto" width="544" height="228" loading="lazy" />
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="footer__creditos">
    <!-- Wordpress -->
    <a href="https://br.wordpress.org/" target="_blank" rel="noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Desenvolvido com WordPress', 'ifrs-portal-theme'); ?>">
      <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/creditos-wordpress.png' ) ); ?>" alt="<?php esc_attr_e('Desenvolvido com WordPress (abre uma nova página)', 'ifrs-portal-theme'); ?>" width="98" height="20" loading="lazy" />
      <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 640 640" fill="currentColor" class="ms-1" aria-hidden="true" focusable="false"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M384 64C366.3 64 352 78.3 352 96C352 113.7 366.3 128 384 128L466.7 128L265.3 329.4C252.8 341.9 252.8 362.2 265.3 374.7C277.8 387.2 298.1 387.2 310.6 374.7L512 173.3L512 256C512 273.7 526.3 288 544 288C561.7 288 576 273.7 576 256L576 96C576 78.3 561.7 64 544 64L384 64zM144 160C99.8 160 64 195.8 64 240L64 496C64 540.2 99.8 576 144 576L400 576C444.2 576 480 540.2 480 496L480 416C480 398.3 465.7 384 448 384C430.3 384 416 398.3 416 416L416 496C416 504.8 408.8 512 400 512L144 512C135.2 512 128 504.8 128 496L128 240C128 231.2 135.2 224 144 224L224 224C241.7 224 256 209.7 256 192C256 174.3 241.7 160 224 160L144 160z"/></svg>
    </a>
    <!-- Código-fonte -->
    <a href="https://github.com/IFRS/portal-theme/" target="_blank" rel="noopener" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Código-fonte deste tema sob a licença GPLv3', 'ifrs-portal-theme'); ?>">
      <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/creditos-git.png' ) ); ?>" alt="<?php esc_attr_e('Código-fonte deste tema sob a licença GPLv3 (abre uma nova página)', 'ifrs-portal-theme'); ?>" width="43" height="18" loading="lazy" />
      <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 640 640" fill="currentColor" class="ms-1" aria-hidden="true" focusable="false"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M384 64C366.3 64 352 78.3 352 96C352 113.7 366.3 128 384 128L466.7 128L265.3 329.4C252.8 341.9 252.8 362.2 265.3 374.7C277.8 387.2 298.1 387.2 310.6 374.7L512 173.3L512 256C512 273.7 526.3 288 544 288C561.7 288 576 273.7 576 256L576 96C576 78.3 561.7 64 544 64L384 64zM144 160C99.8 160 64 195.8 64 240L64 496C64 540.2 99.8 576 144 576L400 576C444.2 576 480 540.2 480 496L480 416C480 398.3 465.7 384 448 384C430.3 384 416 398.3 416 416L416 496C416 504.8 408.8 512 400 512L144 512C135.2 512 128 504.8 128 496L128 240C128 231.2 135.2 224 144 224L224 224C241.7 224 256 209.7 256 192C256 174.3 241.7 160 224 160L144 160z"/></svg>
    </a>
    <!-- Creative Commons -->
    <a href="https://creativecommons.org/licenses/by-sa/4.0/deed.pt_BR" target="_blank" rel="noopener license" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php esc_attr_e('Artefatos licenciados sob a Licença Creative Commons Atribuição-CompartilhaIgual 4.0 Internacional', 'ifrs-portal-theme'); ?>">
      <img src="<?php echo esc_url( get_parent_theme_file_uri( '/img/creditos-cc-by-sa.png' ) ); ?>" alt="<?php esc_attr_e('Artefatos licenciados sob a Licença Creative Commons Atribuição-CompartilhaIgual 4.0 Internacional (abre uma nova página)', 'ifrs-portal-theme'); ?>" width="80" height="15" loading="lazy" />
      <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 640 640" fill="currentColor" class="ms-1" aria-hidden="true" focusable="false"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M384 64C366.3 64 352 78.3 352 96C352 113.7 366.3 128 384 128L466.7 128L265.3 329.4C252.8 341.9 252.8 362.2 265.3 374.7C277.8 387.2 298.1 387.2 310.6 374.7L512 173.3L512 256C512 273.7 526.3 288 544 288C561.7 288 576 273.7 576 256L576 96C576 78.3 561.7 64 544 64L384 64zM144 160C99.8 160 64 195.8 64 240L64 496C64 540.2 99.8 576 144 576L400 576C444.2 576 480 540.2 480 496L480 416C480 398.3 465.7 384 448 384C430.3 384 416 398.3 416 416L416 496C416 504.8 408.8 512 400 512L144 512C135.2 512 128 504.8 128 496L128 240C128 231.2 135.2 224 144 224L224 224C241.7 224 256 209.7 256 192C256 174.3 241.7 160 224 160L144 160z"/></svg>
    </a>
  </section>

  <a href="#fim-rodape" id="fim-rodape" class="visually-hidden"><?php esc_html_e('Fim do rodapé', 'ifrs-portal-theme'); ?></a>
</footer>

<?php wp_footer(); ?>

</body>
</html>
