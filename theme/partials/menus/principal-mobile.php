<a id="inicio-menu" href="#inicio-menu" class="visually-hidden"><?php esc_html_e('Início da navegação', 'ifrs-portal-theme'); ?></a>
<button class="btn btn-link p-0 mt-1 btn-menu-toggle d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#portal-menu-principal-mobile" aria-expanded="false" aria-controls="portal-menu-principal-mobile" aria-label="<?php esc_attr_e('Alternar menu', 'ifrs-portal-theme'); ?>">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="64" height="64"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"/></svg>
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="portal-menu-principal-mobile" aria-labelledby="portal-menu-principal-mobile-label">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="portal-menu-principal-mobile-label">Menu Principal</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
  </div>
  <div class="offcanvas-body">
    <?php
      wp_nav_menu(array(
        'menu_class'        => 'menu-principal-mobile',
        'menu_id'           => false,
        'container'         => 'nav',
        'container_class'   => '',
        'container_id'      => false,
        'depth'             => 3,
        'theme_location'    => 'principal',
      ));
    ?>
  </div>
</div>
