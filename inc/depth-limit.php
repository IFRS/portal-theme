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

// Thanks to certainlyakey
// https://gist.github.com/certainlyakey/9da9bab22cd073ee486d
// Limit pages nesting depth to 2nd level
// caution! by default affects all hierarchical CPTs
function portal_limit_pages_nesting($a) {
	$a['depth'] = 2;
	return $a;
}

add_action('page_attributes_dropdown_pages_args','portal_limit_pages_nesting');
