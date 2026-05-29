<?php
add_filter('embed_oembed_html', function($html, $url, $attr, $post_ID) {
    if (stripos($html, '<iframe ') !== false) {
        if (stripos($html, ' loading=') === false) {
            $html = preg_replace('/<iframe\s/i', '<iframe loading="lazy" ', $html, 1);
        }

        if (stripos($html, 'embed-responsive') === false && stripos($html, ' ratio ') === false) {
            $html = sprintf('<div class="embed-responsive embed-responsive-16by9">%s</div>', $html);
        }
    }

    return $html;
}, 10, 4);
