<?php
add_filter('pre_get_document_title', function($title) {
    if (is_front_page()) {
        return get_bloginfo('name') . ' - ' . get_bloginfo('description');
    } else {
        return $title;
    }
}, 50);
