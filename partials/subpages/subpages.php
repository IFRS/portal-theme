<?php
$option = get_post_meta(get_the_ID(), '_page_subpages', true);

if (isset($option) && !empty($option)) {
    get_template_part('partials/subpages/subpages', $option);
} else {
    get_template_part('partials/subpages/subpages', 'buttons');
}
