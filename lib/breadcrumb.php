<?php
function portal_breadcrumb() {
    $home      = 'Home';
    $before    = '<li class="active">';
    $sep       = '';
    $after     = '</li>';

    if (!is_home() && !is_front_page() || is_paged()) {
		echo '<div class="container" id="breadcrumb"><div class="row"><div class="col-xs-12">';
		echo '<ol class="breadcrumb">';
		echo __('Voc&ecirc; est&aacute; em: ');

        global $post;
        $homeLink = home_url();
		$siteprincipal = get_home_url('1','/');
        $nomesite = get_bloginfo('name');

        echo '<li><a href="' . $homeLink . '">' . $nomesite . '</a> '.$sep. '</li> ';

        if (is_category()) {
            global $wp_query;
            $cat_obj   = $wp_query->get_queried_object();
            $thisCat   = $cat_obj->term_id;
            $thisCat   = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) {
                echo get_category_parents($parentCat, true, $sep);
            }
            echo $before . single_cat_title('', false) . $after;
        } elseif (is_search()) {
            echo $before . 'Resultado da pesquisa por: "' . get_search_query() . '"' . $after;
        } elseif (is_tax('concurso_status')) {
            echo '<li><a href="' . get_post_type_archive_link( 'concurso' ) . '">' . __('Concursos') . '</a></li>';
            echo $before . single_term_title('', false) . $after;
        } elseif (is_tax('documento_type')) {
            echo '<li><a href="' . get_post_type_archive_link( 'documento' ) . '">' . __('Documentos') . '</a></li>';
            echo $before . single_term_title('', false) . $after;
        } elseif (is_tax('edital_category')) {
            echo '<li><a href="' . get_post_type_archive_link( 'edital' ) . '">' . __('Editais') . '</a></li>';
            echo $before . single_term_title('', false) . $after;
        } elseif (is_day()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                'Y'
            ) . '</a></li> ';
            echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                'F'
            ) . '</a></li> ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
                'Y'
            ) . '</a></li> ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug      = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->name . '</a></li> ';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
                echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            echo $before . post_type_archive_title('', false) . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat    = get_the_category($parent->ID);
            $cat    = $cat[0];
            echo get_category_parents($cat, true, $sep);
            echo '<li><a href="' . get_permalink(
                $parent
            ) . '">' . $parent->post_title . '</a></li> ';
            echo $before . get_the_title() . $after;

        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page          = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
                    $page->ID
                ) . '</a>' . $sep . '</li>';
                $parent_id     = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) {
                echo $crumb;
            }
            echo $before . get_the_title() . $after;
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . ' ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Erro 404' . $after;
        }

        echo '</ol>';
		echo '</div></div></div>';
    }
}
