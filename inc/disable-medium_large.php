<?php
add_action('after_switch_theme', function() {
    update_option('medium_large_size_w', '0');
    update_option('medium_large_size_h', '0');
});
