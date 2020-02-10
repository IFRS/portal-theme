<?php
add_filter( 'the_content', function($content) {
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $dom = new DOMDocument();
    @$dom->loadHTML($content);

    $tables = [];

    foreach ($dom->getElementsByTagName('table') as $node) {
        $tables[] = $node;
    }

    foreach ($tables as $node) {
        $fallback = $node->cloneNode(true);

        $oldClass = $node->getAttribute('class');
        $newClass = 'table ' . $oldClass;
        $node->setAttribute('class', $newClass);
    }

    $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));

    return $newHtml;
} );
