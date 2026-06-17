<nav class="collapse menu-principal-collapse" tabindex="-1" id="portal-menu-principal" aria-label="<?php esc_attr_e('Navegação principal', 'ifrs-portal-theme'); ?>">
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
<a href="#fim-menu" id="fim-menu" class="visually-hidden"><?php esc_html_e('Fim da navegação', 'ifrs-portal-theme'); ?></a>
