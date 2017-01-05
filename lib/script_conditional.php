<?php
/**
 * Adding extra data to scripts
**/
if ( ! function_exists( 'wp_script_add_data' ) ) :
    function wp_script_add_data( $handle, $key, $value ) {
        global $wp_scripts;
        return $wp_scripts->add_data( $handle, $key, $value );
    }
endif;
