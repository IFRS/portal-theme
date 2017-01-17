<?php
class wp_ifrs_navwalker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );

		if ($args->walker->has_children) {
            $output .='<span class="glyphicon glyphicon-chevron-right"></span>';
        }

		$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu collapse\">\n";
	}
}
