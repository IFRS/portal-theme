<?php if (!dynamic_sidebar('widget-nav')) : endif; ?>

<nav class="menu-nav">
<?php
    wp_nav_menu(
        array(
            'menu_class'        => '',
            'menu_id'           => 'menu-relevancia',
            'container'         => false,
            'container_class'   => false,
            'container_id'      => false,
            'depth'             => 1,
            'theme_location'    => 'relevancia',
        )
    );

    wp_nav_menu(
        array(
            'menu_class'        => 'menu-collapse',
            'menu_id'           => 'menu-principal',
            'container'         => false,
            'container_class'   => false,
            'container_id'      => false,
            'depth'             => 3,
            'theme_location'    => 'principal',
            'walker'            => new wp_ifrs_navwalker()
        )
    );
?>
</nav>
