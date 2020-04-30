<?php
add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_home()) {
            $query->set('ignore_sticky_posts', true);
        }
    }
});
