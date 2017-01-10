<?php if (!dynamic_sidebar('widget-nav')) : endif; ?>

<?php
    wp_nav_menu(
        array(
            'menu_class'        => '',
            'menu_id'           => 'menu-relevancia',
            'container'         => 'nav',
            'container_class'   => false,
            'container_id'      => 'menu-relevancia-nav',
            'depth'             => 1,
            'theme_location'    => 'relevancia',
        )
    );

    wp_nav_menu(
        array(
            'menu_class'        => 'menu-collapse',
            'menu_id'           => 'menu-principal',
            'container'         => 'nav',
            'container_class'   => false,
            'container_id'      => 'menu-principal-nav',
            'depth'             => 3,
            'theme_location'    => 'principal',
            'walker'            => new wp_ifrs_navwalker()
        )
    );
