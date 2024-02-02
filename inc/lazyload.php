<?php
// Lazyload Images
function ifrs_add_lazyload($content) {
    if (!empty($content)) {
        $content = mb_encode_numericentity(
            htmlspecialchars_decode(
                htmlentities($content, ENT_NOQUOTES, 'UTF-8', false)
                ,ENT_NOQUOTES
            ), [0x80, 0x10FFFF, 0, ~0],
            'UTF-8'
        );
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // fix html5/svg errors
        @$dom->loadHTML($content, LIBXML_COMPACT);

        $images = [];

        foreach ($dom->getElementsByTagName('img') as $node) {
            $images[] = $node;
        }

        foreach ($images as $node) {
            $fallback = $node->cloneNode(true);

            $oldClass = $node->getAttribute('class');
            $newClass = 'lazyload ' . $oldClass;
            $node->setAttribute('class', $newClass);

            $node->setAttribute('data-sizes', 'auto');

            $oldsrc = $node->getAttribute('src');

            if ($oldsrc) {
                $node->setAttribute('data-src', $oldsrc);
                $node->removeAttribute('src');
            }

            $oldsrcset = $node->getAttribute('srcset');

            if ($oldsrcset) {
                $node->setAttribute('data-srcset', $oldsrcset);
                $newsrcset = '';
                $node->setAttribute('srcset', $newsrcset);
            }

            $node->setAttribute('loading', 'lazy');
            $node->setAttribute('decoding', 'async');
        }

        $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));

        return $newHtml;
    }

    return $content;
}

add_filter('the_content', 'ifrs_add_lazyload', 99);
add_filter('post_thumbnail_html', 'ifrs_add_lazyload', 99);
add_filter('get_avatar', 'ifrs_add_lazyload', 99);

add_action( 'dynamic_sidebar_before', function() {
    ob_start();
}, 0 );

add_action( 'dynamic_sidebar_after', function() {
    $content = ob_get_clean();

    echo ifrs_add_lazyload($content);

    unset($content);
}, 999 );
