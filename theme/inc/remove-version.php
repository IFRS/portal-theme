<?php
remove_action('wp_head', 'wp_generator');

add_filter('the_generator', function() {
    return '';
});
