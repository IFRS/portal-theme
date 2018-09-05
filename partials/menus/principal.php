<div class="area-nav">
    <?php if (!dynamic_sidebar('widget-nav')) : endif; ?>
</div>

<button class="btn btn-menu-toggle btn-lg d-block mx-auto d-lg-none"><i class="fas fa-bars"></i>&nbsp;<span class="sr-only">Esconder/Mostrar&nbsp;</span>Menu</button>
<nav class="menu-navbar collapse show">
    <?php
        wp_nav_menu(
            array(
                'menu_class'        => 'menu-relevancia',
                'menu_id'           => false,
                'container'         => false,
                'container_class'   => false,
                'container_id'      => false,
                'depth'             => 1,
                'theme_location'    => 'relevancia',
            )
        );

        wp_nav_menu(
            array(
                'menu_class'        => 'menu-collapse menu-principal',
                'menu_id'           => false,
                'container'         => false,
                'container_class'   => false,
                'container_id'      => false,
                'depth'             => 3,
                'theme_location'    => 'principal',
            )
        );
    ?>
</nav>
