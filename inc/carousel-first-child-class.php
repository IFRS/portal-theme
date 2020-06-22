<?php
add_action('init', function() {
    global $wp_registered_sidebars, $wp_registered_widgets;

    $sidebars = wp_get_sidebars_widgets();

    if ( empty( $sidebars ) ) {
        return;
    }

    if (!empty($sidebars['widget-carousel']) && count($sidebars['widget-carousel']) > 0) {
        $wp_registered_widgets[$sidebars['widget-carousel'][0]]['classname'] .= ' active';
    }
});
