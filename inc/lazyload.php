<?php
// Lazyload Converter
function ifrs_add_lazyload($content) {
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $dom = new DOMDocument();
    @$dom->loadHTML($content);

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
    }

    $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));

    return $newHtml;
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
}, 1000 );
