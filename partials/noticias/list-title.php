<?php
    if (is_home()) {
        echo get_the_title(get_option( 'page_for_posts' ));
    } elseif (is_category()) {
        echo single_cat_title(__('Not&iacute;cias da categoria&nbsp;'), false);
    } elseif (is_tag()) {
        echo single_tag_title(__('Not&iacute;cias com a tag&nbsp;'), false);
    } elseif (is_tax('escopo')) {
        echo single_term_title('Not&iacute;cias para ', false);
    } else {
        echo 'Not&iacute;cias';
    }
