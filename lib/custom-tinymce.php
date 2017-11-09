<?php
/**
 *  Remove h1 and add iframe to the WordPress editor.
 *
 *  @param   array  $init  The array of editor settings
 *  @return  array         The modified edit settings
 */
function portal_custom_tinymce($initArray) {
    $initArray['block_formats'] = 'Paragraph=p;Heading 1=h3;Heading 2=h4;Heading 3=h5;Heading 4=h6;Preformatted=pre;';
    $initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
    return $initArray;
}

add_filter('tiny_mce_before_init', 'portal_custom_tinymce');
