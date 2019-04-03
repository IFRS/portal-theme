<?php
function portal_pagination() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $args = array(
        // 'base'               => '%_%',
        'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'             => '/page/%#%',
        'total'              => $wp_query->max_num_pages,
        'current'            => max( 1, get_query_var('paged') ),
        'show_all'           => false,
        'end_size'           => 1,
        'mid_size'           => 2,
        'prev_next'          => true,
        'prev_text'          => 'P&aacute;gina Anterior',
        'next_text'          => 'Pr&oacute;xima P&aacute;gina',
        'type'               => 'array',
        'add_args'           => false,
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => ''
    );

    $pages = paginate_links( $args );

    if ( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination justify-content-center">';
        foreach ( $pages as $page ) {
            if (strpos($page, 'current') !== false) {
                echo '<li class="page-item active">'.$page.'</li>';
            } else {
                echo '<li class="page-item">'.$page.'</li>';
            }
        }
        echo '</ul>';
    }
}
