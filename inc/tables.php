<?php
add_filter( 'the_content', function($content) {
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
    } else {
        return $content;
    }
} );
