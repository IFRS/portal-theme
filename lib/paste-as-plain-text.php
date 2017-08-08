<?php
// always paste as plain text
foreach ( array( 'tiny_mce_before_init', 'teeny_mce_before_init') as $filter ) {
	add_filter( $filter, function( $mceInit ) {
		$mceInit[ 'paste_text_sticky' ] = true;
		$mceInit[ 'paste_text_sticky_default' ] = true;
		return $mceInit;
	});
}

// load 'paste' plugin in minimal/pressthis editor
add_filter( 'teeny_mce_plugins', function( $plugins ) {
	$plugins[] = 'paste';
	return $plugins;
});
