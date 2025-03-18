<a href="#inicio-menu" id="inicio-menu" class="visually-hidden">In&iacute;cio da navega&ccedil;&atilde;o</a>
<button class="btn btn-link btn-lg btn-menu-toggle">
  <span class="visually-hidden">Alternar Menu</span>
  <i class="fa-solid fa-bars"></i>
</button>
<?php
  add_action( 'wp_footer', function() {
?>
  <nav class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-menu-principal" aria-label="Navegação Principal">
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas-menu-principal" aria-label="Fechar Menu"></button>
    </div>

    <div class="offcanvas-body">
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
            'menu_class'        => 'menu-principal',
            'menu_id'           => false,
            'container'         => false,
            'container_class'   => false,
            'container_id'      => false,
            'depth'             => 3,
            'theme_location'    => 'principal',
          )
        );
      ?>
    </div>
  </nav>
<?php
  } );
?>

<a href="#fim-menu" id="fim-menu" class="visually-hidden">Fim da navega&ccedil;&atilde;o</a>
