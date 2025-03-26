<?php $id = uniqid('nav-campi-') ?>
<nav class="menu-campi navbar navbar-expand-md bg-body-tertiary mt-3">
  <div class="container-fluid">
    <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-expanded="false" aria-controls="<?php echo $id; ?>" aria-label="Alterna lista de Campi">
      <span class="navbar-toggler-icon"></span>&nbsp;<?php _e('Campi do IFRS', 'ifrs-portal-theme'); ?>
    </button>
    <?php
      wp_nav_menu(
        array(
          'container'            => 'div',
          'container_class'      => 'collapse navbar-collapse',
          'container_id'         => $id,
          'container_aria_label' => 'Lista de Campi',
          'menu_class'           => 'navbar-nav flex-wrap mx-auto',
          'menu_id'              => false,
          'depth'                => 1,
          'theme_location'       => 'campi',
          'item_spacing'         => 'discard',
        )
      );
    ?>
  </div>
</nav>
