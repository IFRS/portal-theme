<?php
  wp_nav_menu(array(
    'theme_location'       => 'principal',
    'menu_class'           => 'menu-principal',
    'menu_id'              => false,
    'container'            => 'nav',
    'container_class'      => 'nav-principal d-none d-lg-block',
    'container_id'         => false,
    'container_aria_label' => 'Navegação Principal',
    'depth'                => 3,
    'item_spacing'         => 'discard',
    'principal_horizontal_bootstrap' => true,
  ));
?>
<a href="#fim-menu" id="fim-menu" class="visually-hidden"><?php esc_html_e('Fim da navegação', 'ifrs-portal-theme'); ?></a>
