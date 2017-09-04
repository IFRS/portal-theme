<?php if (!dynamic_sidebar('widget-nav')) : endif; ?>

<a href="#" id="menu-navbar-toggle" class="btn btn-primary btn-lg visible-sm visible-xs"><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;<span class="sr-only">Esconder/Mostrar&nbsp;</span>Menu</a>
<nav class="menu-navbar collapse in">
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
            )
        );
    ?>
</nav>
