<?php
/**
 *  Remove h1 from the WordPress editor.
 *
 *  @param   array  $init  The array of editor settings
 *  @return  array         The modified edit settings
 */
function wp_remove_h1_from_editor( $init ) {
    $init['block_formats'] = 'Paragraph=p;Heading 1=h3;Heading 2=h4;Heading 3=h5;Heading 4=h6;Preformatted=pre;';
    return $init;
}
add_filter( 'tiny_mce_before_init', 'wp_remove_h1_from_editor' );
