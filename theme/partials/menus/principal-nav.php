<nav class="collapse menu-principal-collapse" tabindex="-1" id="portal-menu-principal" aria-label="Navegação Principal">
  <?php
    wp_nav_menu(array(
      'menu_class'        => 'menu-principal',
      'menu_id'           => false,
      'container'         => 'div',
      'container_class'   => 'container',
      'container_id'      => false,
      'depth'             => 3,
      'theme_location'    => 'principal',
    ));
  ?>
</nav>
<a href="#fim-menu" id="fim-menu" class="visually-hidden">Fim da navega&ccedil;&atilde;o</a>
