<?php
function ifrs_portal_rss_post_thumbnail($content) {
    global $post;

    if (has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . get_the_content();
    }

    return $content;
}

add_filter('the_excerpt_rss', 'ifrs_portal_rss_post_thumbnail');
add_filter('the_content_feed', 'ifrs_portal_rss_post_thumbnail');
