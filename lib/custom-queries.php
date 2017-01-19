<?php
function portal_custom_queries( $query ) {
    if ($query->is_main_query() & !is_admin()) {
        // if ($query->is_home()) {
        //     $query->query_vars['posts_per_page'] = 4;
        // }
    }
}

add_action( 'pre_get_posts', 'portal_custom_queries' );
