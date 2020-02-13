<?php
add_filter( 'attachment_link', function($link) {
    return;
} );

add_action( 'print_media_templates', function() {
    echo '
        <style>
            .setting select.link-to option[value="post"],
            .setting select[data-setting="link"] option[value="post"]
            { display: none; }
        </style>';
} );
