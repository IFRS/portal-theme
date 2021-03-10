<?php
    wp_nav_menu(
        array(
            'menu_class'           => 'menu-campi',
            'menu_id'              => false,
            'container'            => 'nav',
            'container_class'      => false,
            'container_id'         => false,
            'container_aria_label' => 'Lista de Campi',
            'depth'                => 1,
            'theme_location'       => 'campi',
            'item_spacing'         => 'discard',
        )
    );
?>
