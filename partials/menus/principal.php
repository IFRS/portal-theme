<a href="#inicio-menu" id="inicio-menu" class="visually-hidden">In&iacute;cio da navega&ccedil;&atilde;o</a>
<button class="btn btn-link btn-lg btn-menu-toggle" data-bs-toggle="collapse" data-bs-target="#portal-menu-principal" aria-expanded="false" aria-controls="portal-menu-principal">
  <span class="visually-hidden">Alternar Menu</span>
  <i class="fa-solid fa-bars"></i>
</button>
<?php
  add_action( 'portal_menu', function() {
?>
  <nav class="collapse collapse__menu" tabindex="-1" id="portal-menu-principal" aria-label="Navegação Principal">
    <div class="container-fluid">
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
