<button class="btn btn-link p-0 mt-1 btn-menu-toggle" data-bs-toggle="collapse" data-bs-target="#portal-menu-principal" aria-expanded="false" aria-controls="portal-menu-principal" aria-label="Alternar Menu">
  <svg class="ham hamRotate" viewBox="0 0 100 100">
    <path
      class="line top"
      d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
    <path
      class="line middle"
      d="m 30,50 h 40" />
    <path
      class="line bottom"
      d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
  </svg>
</button>
<?php add_action( 'portal_menu', function() { ?>
  <a href="#inicio-menu" id="inicio-menu" class="visually-hidden">In&iacute;cio da navega&ccedil;&atilde;o</a>
  <nav class="collapse menu-principal-collapse" tabindex="-1" id="portal-menu-principal" aria-label="Navegação Principal">
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
  <a href="#fim-menu" id="fim-menu" class="visually-hidden">Fim da navega&ccedil;&atilde;o</a>
<?php } );
