<?php
add_filter( 'excerpt_length', function($length) {
	return 60;
}, 999 );

add_filter( 'excerpt_more', function($more) {
	return '&hellip;';
}, 999 );
