<?php
function portal_custom_queries( $query ) {
    if ($query->is_main_query() & !is_admin()) {
        if ($query->is_post_type_archive('edital')) {
            $query->query_vars['posts_per_page'] = -1;
            $query->query_vars['nopaging'] = true;
        }
    }
}

add_action( 'pre_get_posts', 'portal_custom_queries' );
