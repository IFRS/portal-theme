<?php
/**
 * Limit max menu depth in admin panel to 3
 */
add_action( 'admin_enqueue_scripts', function( $hook ) {
    if ( $hook != 'nav-menus.php' ) return;

    // override default value right after 'nav-menu' JS
    wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 3;', 'after' );
} );

// Thanks to certainlyakey
// https://gist.github.com/certainlyakey/9da9bab22cd073ee486d
// Limit pages nesting depth to 3nd level
// caution! by default affects all hierarchical CPTs
add_action( 'page_attributes_dropdown_pages_args', function( $a ) {
	$a['depth'] = 5;
	return $a;
} );
