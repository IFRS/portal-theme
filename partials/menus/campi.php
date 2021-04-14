<?php $id = uniqid('nav-campi-') ?>
<button class="btn d-none menu-campi__toggle" type="button" data-toggle="collapse" data-target="#<?php echo $id; ?>" aria-expanded="false" aria-controls="<?php echo $id; ?>">
    <?php _e('Campi do IFRS', 'ifrs-portal-theme'); ?>
</button>
<?php
    wp_nav_menu(
        array(
            'menu_class'           => 'menu-campi',
            'menu_id'              => false,
            'container'            => 'nav',
            'container_class'      => 'nav-campi collapse show',
            'container_id'         => $id,
            'container_aria_label' => 'Lista de Campi',
            'depth'                => 1,
            'theme_location'       => 'campi',
            'item_spacing'         => 'discard',
        )
    );
?>
