<?php
add_filter('embed_oembed_html', function($html, $url, $attr, $post_ID) {
    if (stripos($html, '<iframe ') !== false && (stripos($url, '.youtube.com') !== false || stripos($url, '.youtu.be') !== false)) {
        $html = sprintf('<div class="embed-responsive embed-responsive-16by9">%s</div>', $html);
    }

    return $html;
}, 10, 4);
