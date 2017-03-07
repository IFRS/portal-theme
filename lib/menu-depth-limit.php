<?php
/**
 * Limit max menu depth in admin panel to 2
 */
function portal_menu_depth_limit( $hook ) {
    if ( $hook != 'nav-menus.php' ) return;

    // override default value right after 'nav-menu' JS
    wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 2;', 'after' );
}

add_action( 'admin_enqueue_scripts', 'portal_menu_depth_limit' );
