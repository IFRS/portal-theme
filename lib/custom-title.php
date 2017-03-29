<?php
add_filter('pre_get_document_title', 'portal_custom_title', 50);
function portal_custom_title($title) {
    if (is_front_page()) {
        return get_bloginfo('name') . ' - ' . get_bloginfo('description');
    } else {
        return $title;
    }
}
