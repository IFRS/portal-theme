<nav class="menu-principal-horizontal-wrapper d-none d-lg-block" tabindex="-1" aria-label="<?php esc_attr_e('Navegação Principal', 'ifrs-portal-theme'); ?>">
  <?php
    wp_nav_menu(array(
      'theme_location'       => 'principal',
      'menu_class'           => 'menu-principal-horizontal',
      'menu_id'              => false,
      'container'            => 'div',
      'container_class'      => 'container',
      'container_id'         => false,
      'container_aria_label' => false,
      'depth'                => 3,
      'item_spacing'         => 'discard',
      'principal_horizontal_bootstrap' => true,
    ));
  ?>
</nav>
<a href="#fim-menu" id="fim-menu" class="visually-hidden"><?php esc_html_e('Fim da navegação', 'ifrs-portal-theme'); ?></a>
