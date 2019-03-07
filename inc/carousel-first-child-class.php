<?php
add_action('init', 'ak_add_order_classes_for_widgets' );

function ak_add_order_classes_for_widgets() {
    global $wp_registered_sidebars, $wp_registered_widgets;

    $sidebars = wp_get_sidebars_widgets();

    if ( empty( $sidebars ) ) {
        return;
    }

    if (count($sidebars['widget-carousel']) > 0) {
        $wp_registered_widgets[$sidebars['widget-carousel'][0]]['classname'] .= ' active';
    }
}
