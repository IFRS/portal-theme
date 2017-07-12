<?php
remove_action('wp_head', 'wp_generator');

function portal_remove_version() {
    return '';
}
add_filter('the_generator', 'portal_remove_version');
