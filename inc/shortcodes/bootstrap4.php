<?php
/**
 * Baseado no código do repositório https://github.com/MWDelaney/bootstrap-3-shortcodes/
 * Código adaptado para as necessidades do projeto e atualizado para funcionar no Bootstrap 4.
 */

function ifrs_bs4_fix_shortcodes($content){
	$array = array (
		'<p>[' => '[',
		']</p>' => ']',
		']<br />' => ']',
		']<br>' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}

add_filter('the_content', 'ifrs_bs4_fix_shortcodes');

$shortcodes = array(
	'alert',
	'badge',
	'button',
	'button-group',
	'card',
	'collapsibles',
	'collapse',
	'column',
	'img',
	'embed-responsive',
	'jumbotron',
	'lead',
	'list-group',
	'list-group-item',
	'list-group-item-heading',
	'list-group-item-text',
	'media',
	'media-body',
	'modal',
	'modal-footer',
	'responsive',
	'row',
	'tab',
	'table-wrap',
	'tabs',
);

foreach ( $shortcodes as $shortcode ) {
	$function = 'ifrs_bs4_' . str_replace( '-', '_', $shortcode );
	add_shortcode( $shortcode, $function );
}

function ifrs_bs4_alert( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"type"          => false,
		"dismissable"   => false,
		"xclass"        => false,
		"data"          => false
	), $atts );

	$class  = 'alert';
	$class .= ( $atts['type'] )         ? ' alert-' . $atts['type'] : ' alert-success';
	$class .= ( $atts['dismissable']   == 'true' )  ? ' alert-dismissable' : '';
	$class .= ( $atts['xclass'] )       ? ' ' . $atts['xclass'] : '';

	$dismissable = ( $atts['dismissable'] ) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s>%s%s</div>',
		esc_attr( trim($class) ),
		( $data_props )  ? ' ' . $data_props : '',
		$dismissable,
		do_shortcode( $content )
	);
}

function ifrs_bs4_row( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'row';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s>%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_column( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"xl"          => false,
		"lg"          => false,
		"md"          => false,
		"sm"          => false,
		"offset_lg"   => false,
		"offset_md"   => false,
		"offset_sm"   => false,
		"xclass"      => false,
		"data"        => false
	), $atts );

	$class  = '';
	$class .= ( $atts['xl'] )			                                ? ' col-xl-' . $atts['xl'] : '';
	$class .= ( $atts['lg'] )			                                ? ' col-lg-' . $atts['lg'] : '';
	$class .= ( $atts['md'] )                                           ? ' col-md-' . $atts['md'] : '';
	$class .= ( $atts['sm'] )                                           ? ' col-sm-' . $atts['sm'] : '';
	$class .= ( $atts['xs'] )                                           ? ' col-xs-' . $atts['xs'] : '';
	$class .= ( $atts['offset_xl'] || $atts['offset_xl'] === "0" )      ? ' offset-xl-' . $atts['offset_xl'] : '';
	$class .= ( $atts['offset_lg'] || $atts['offset_lg'] === "0" )      ? ' offset-lg-' . $atts['offset_lg'] : '';
	$class .= ( $atts['offset_md'] || $atts['offset_md'] === "0" )      ? ' offset-md-' . $atts['offset_md'] : '';
	$class .= ( $atts['offset_sm'] || $atts['offset_sm'] === "0" )      ? ' offset-sm-' . $atts['offset_sm'] : '';
	$class .= ( $atts['xclass'] )                                       ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s>%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_list_group( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"linked" => false,
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'list-group';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<%1$s class="%2$s"%3$s>%4$s</%1$s>',
		( $atts['linked'] == 'true' ) ? 'div' : 'ul',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_list_group_item( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"link"    => false,
		"type"    => false,
		"active"  => false,
		"target"  => false,
		"xclass"  => false,
		"data"    => false
	), $atts );

	$class  = 'list-group-item';
	$class .= ( $atts['type'] )     ? ' list-group-item-' . $atts['type'] : '';
	$class .= ( $atts['active']   == 'true' )   ? ' active' : '';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<%1$s %2$s %3$s class="%4$s"%5$s>%6$s</%1$s>',
		( $atts['link'] )     ? 'a' : 'li',
		( $atts['link'] )     ? 'href="' . esc_url( $atts['link'] ) . '"' : '',
		( $atts['target'] )   ? sprintf( ' target="%s"', esc_attr( $atts['target'] ) ) : '',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_list_group_item_heading( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'mb-1';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="d-flex w-100 justify-content-between"><h4 class="%s"%s>%s</h4></div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_list_group_item_text( $atts, $content = null ) {

	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'mb-1';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<p class="%s"%s>%s</p>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_badge( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"pill"   => false,
		"xclass"  => false,
		"data"    => false
	), $atts );

	$class  = 'badge';
	$class .= ( $atts['pill']   == 'true' )    ? ' badge-pill' : '';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<span class="%s"%s>%s</span>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_button( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"type"     => false,
		"size"     => false,
		"block"    => false,
		"dropdown" => false,
		"link"     => '',
		"target"   => false,
		"disabled" => false,
		"active"   => false,
		"xclass"   => false,
		"title"    => false,
		"data"     => false
	), $atts );
	$class  = 'btn';
	$class .= ( $atts['type'] )     ? ' btn-' . $atts['type'] : ' btn-default';
	$class .= ( $atts['size'] )     ? ' btn-' . $atts['size'] : '';
	$class .= ( $atts['block'] == 'true' )    ? ' btn-block' : '';
	$class .= ( $atts['dropdown']   == 'true' ) ? ' dropdown-toggle' : '';
	$class .= ( $atts['disabled']   == 'true' ) ? ' disabled' : '';
	$class .= ( $atts['active']     == 'true' )   ? ' active' : '';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';
	$data_props = $this->parse_data_attributes( $atts['data'] );
	return sprintf(
		'<a href="%s" class="%s"%s%s%s>%s</a>',
		esc_url( $atts['link'] ),
		esc_attr( trim($class) ),
		( $atts['target'] )     ? sprintf( ' target="%s"', esc_attr( $atts['target'] ) ) : '',
		( $atts['title'] )      ? sprintf( ' title="%s"',  esc_attr( $atts['title'] ) )  : '',
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_button_group( $atts, $content = null ) {
	$atts = shortcode_atts( array(
			"size"      => false,
			"vertical"  => false,
			"xclass"    => false,
			"data"      => false
	), $atts );
	$class  = 'btn-group';
	$class .= ( $atts['size'] )         ? ' btn-group-' . $atts['size'] : '';
	$class .= ( $atts['vertical']   == 'true' )     ? ' btn-group-vertical' : '';
	$class .= ( $atts['xclass'] )       ? ' ' . $atts['xclass'] : '';
	$data_props = $this->parse_data_attributes( $atts['data'] );
	return sprintf(
		'<div class="%s"%s>%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_table_wrap( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'bordered'   => false,
		'striped'    => false,
		'hover'      => false,
		'condensed'  => false,
		'responsive' => false,
		'xclass'     => false,
		'data'       => false
	), $atts );

	$class  = 'table';
	$class .= ( $atts['bordered']  == 'true' )    ? ' table-bordered' : '';
	$class .= ( $atts['striped']   == 'true' )    ? ' table-striped' : '';
	$class .= ( $atts['hover']     == 'true' )    ? ' table-hover' : '';
	$class .= ( $atts['condensed'] == 'true' )    ? ' table-condensed' : '';
	$class .= ( $atts['xclass'] )                 ? ' ' . $atts['xclass'] : '';

	$return = '';

	$tag = array('table');
	$content = do_shortcode($content);

	$return .= ifrs_bs4_scrape_dom_element($tag, $content, $class, '', $atts['data']);
	$return = ( $atts['responsive'] ) ? '<div class="table-responsive">' . $return . '</div>' : $return;
	return $return;
}

function ifrs_bs4_card( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"header"  => false,
		"footer"  => false,
		"xclass"  => false,
		"data"    => false
	), $atts );

	$class  = 'card';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	$footer = ( $atts['footer'] ) ? '<div class="card-footer">' . $atts['footer'] . '</div>' : '';

	if ( $atts['header'] ) {
		$header = sprintf(
			'<h4 class="card-header">%s</h4>',
			esc_html( $atts['header'] )
		);
	}
	else {
		$header = '';
	}

	return sprintf(
		'<div class="%s"%s>%s<div class="card-body">%s</div>%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		$header,
		do_shortcode( $content ),
		( $footer ) ? ' ' . $footer : ''
	);
}

function ifrs_bs4_tabs( $atts, $content = null ) {
	if ( isset( $GLOBALS['tabs_count'] ) )
		$GLOBALS['tabs_count']++;
	else
		$GLOBALS['tabs_count'] = 0;

	$GLOBALS['tabs_default_count'] = 0;

	$atts = apply_filters('bs_tabs_atts',$atts);

	$atts = shortcode_atts( array(
			"type"    => false,
			"xclass"  => false,
			"data"    => false,
			"name"    => false,
	), $atts );

	$ul_class  = 'nav';
	$ul_class .= ( $atts['type'] )     ? ' nav-' . $atts['type'] : ' nav-tabs';
	$ul_class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$div_class = 'tab-content';

	// If user defines name of group, use that for ID for tab history purposes
	if (isset($atts['name'])) {
		$id = $atts['name'];
	} else {
		$id = 'custom-tabs-' . $GLOBALS['tabs_count'];
	}


	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	$atts_map = ifrs_bs4_attribute_map( $content );

	// Extract the tab titles for use in the tab widget.
	if ( $atts_map ) {
		$tabs = array();
		$GLOBALS['tabs_default_active'] = true;
		foreach ( $atts_map as $check ) {
			if ( !empty($check["tab"]["active"]) ) {
				$GLOBALS['tabs_default_active'] = false;
			}
		}

		$i = 0;

		foreach ( $atts_map as $tab ) {
			$class  = 'nav-item';
			$class .= ( !empty($tab["tab"]["xclass"]) ) ? ' ' . esc_attr($tab["tab"]["xclass"]) : '';

			if (!isset($tab["tab"]["link"])) {
				$tab_id = 'custom-tab-' . $GLOBALS['tabs_count'] . '-' . md5( $tab["tab"]["title"] );
			} else {
				$tab_id = $tab["tab"]["link"];
			}

			$tabs[] = sprintf(
				'<li class="%s"><a href="#%s" class="nav-link%s" data-toggle="tab">%s</a></li>',
				esc_attr( trim($class) ),
				sanitize_html_class($tab_id),
				( !empty($tab["tab"]["active"]) || ($GLOBALS['tabs_default_active'] && $i == 0) ) ? ' active' : '',
				$tab["tab"]["title"]
			);
			$i++;
		}
	}

	$output = sprintf(
		'<ul class="%s" id="%s"%s>%s</ul><div class="%s">%s</div>',
		esc_attr( $ul_class ),
		sanitize_html_class( $id ),
		( $data_props ) ? ' ' . $data_props : '',
		( $tabs )  ? implode( $tabs ) : '',
		sanitize_html_class( $div_class ),
		do_shortcode( $content )
	);

	return apply_filters('bs_tabs', $output);
}

function ifrs_bs4_tab( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'title'   => false,
		'active'  => false,
		'fade'    => false,
		'xclass'  => false,
		'data'    => false,
		'link'    => false
	), $atts );

	if ( $GLOBALS['tabs_default_active'] && $GLOBALS['tabs_default_count'] == 0 ) {
		$atts['active'] = true;
	}

	$GLOBALS['tabs_default_count']++;

	$class  = 'tab-pane';
	$class .= ( $atts['fade']   == 'true' )                            ? ' fade' : '';
	$class .= ( $atts['active'] == 'true' )                            ? ' active' : '';
	$class .= ( $atts['active'] == 'true' && $atts['fade'] == 'true' ) ? ' show' : '';
	$class .= ( $atts['xclass'] )                                      ? ' ' . $atts['xclass'] : '';


	if (!isset($atts['link']) || $atts['link'] == NULL) {
		$id = 'custom-tab-' . $GLOBALS['tabs_count'] . '-' . md5( $atts['title'] );
	} else {
		$id = $atts['link'];
	}

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div id="%s" class="%s"%s>%s</div>',
		sanitize_html_class($id),
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_collapsibles( $atts, $content = null ) {
	if ( isset($GLOBALS['collapsibles_count']) )
		$GLOBALS['collapsibles_count']++;
	else
		$GLOBALS['collapsibles_count'] = 0;

	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false
	), $atts );

	$class = 'accordion';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$id = 'custom-accordion-'. $GLOBALS['collapsibles_count'];

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s" id="%s"%s>%s</div>',
		esc_attr( trim($class) ),
		esc_attr($id),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_collapse( $atts, $content = null ) {
	if ( isset($GLOBALS['single_collapse_count']) )
		$GLOBALS['single_collapse_count']++;
	else
		$GLOBALS['single_collapse_count'] = 0;

	$atts = shortcode_atts( array(
		"title"   => false,
		"active"  => false,
		"xclass"  => false,
		"data"    => false
	), $atts );

	$panel_class = 'card';
	$panel_class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$collapse_class = 'collapse';
	$collapse_class .= ( $atts['active'] == 'true' )  ? ' show' : '';

	$a_class = '';
	$a_class .= ( $atts['active'] == 'true' )  ? '' : 'collapsed';

	$parent = isset( $GLOBALS['collapsibles_count'] ) ? 'custom-accordion-' . $GLOBALS['collapsibles_count'] : 'single-collapse';
	$current_collapse = $parent . '-' . $GLOBALS['single_collapse_count'];

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%1$s"%2$s>
			<div class="card-header">
				<h4 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="%3$s">%4$s</a>
				</h4>
			</div>
			<div id="%3$s" class="%5$s"%6$s>
				<div class="card-body">%7$s</div>
			</div>
		</div>',
		esc_attr( $panel_class ),
		( $data_props )   ? ' ' . $data_props : '',
		$current_collapse,
		$atts['title'],
		esc_attr( $collapse_class ),
		( $parent )       ? ' data-parent="#' . $parent . '"' : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_media( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'media';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass']: '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s>%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_media_body( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"title"  => false,
		"xclass" => false,
		"data"   => false
	), $atts );

	$div_class  = 'media-body';
	$div_class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s><h4 class="mt-0">%s</h4>%s</div>',
		esc_attr( $div_class ),
		( $data_props ) ? ' ' . $data_props : '',
		esc_html(  $atts['title']),
		do_shortcode( $content )
	);
}

function ifrs_bs4_jumbotron( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"title"  => false,
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'jumbotron';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s>%s%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		( $atts['title'] ) ? '<h2 class="display-4">' . esc_html( $atts['title'] ) . '</h2>' : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_lead( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false
	), $atts );

	$class  = 'lead';
	$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<p class="%s"%s>%s</p>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_img( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"type"       => false,
		"responsive" => false,
		"xclass"     => false,
		"data"       => false
	), $atts );

	$class  = '';
	$class .= ( $atts['type'] )       ? 'img-' . $atts['type'] . ' ' : '';
	$class .= ( $atts['responsive']   == 'true' ) ? ' img-fluid' : '';
	$class .= ( $atts['xclass'] )     ? ' ' . $atts['xclass'] : '';

	$return = '';
	$tag = array('img');
	$content = do_shortcode($content);
	$return .= ifrs_bs4_scrape_dom_element($tag, $content, $class, '', $atts['data']);

	return $return;
}

function ifrs_bs4_embed_responsive( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"ratio"      => false,
		"xclass"     => false,
		"data"       => false
	), $atts );

	$class  = 'embed-responsive ';
	$class .= ( $atts['ratio'] )      ? ' embed-responsive-' . $atts['ratio'] . ' ' : '';
	$class .= ( $atts['xclass'] )     ? ' ' . $atts['xclass'] : '';

	$embed_class = 'embed-responsive-item';

	$tag = array('iframe', 'embed', 'video', 'object');
	$content = do_shortcode($content);
	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'<div class="%s"%s>%s</div>',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		ifrs_bs4_scrape_dom_element($tag, $content, $embed_class, '', '')
	);
}

function ifrs_bs4_modal( $atts, $content = null ) {
	if ( isset($GLOBALS['modal_count']) )
		$GLOBALS['modal_count']++;
	else
		$GLOBALS['modal_count'] = 0;

	$atts = shortcode_atts( array(
		"text"    => false,
		"title"   => false,
		"size"    => false,
		"xclass"  => false,
		"data"    => false
	), $atts );

	$a_class  = '';
	$a_class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

	$div_class  = 'modal fade';
	$div_class .= ( $atts['size'] ) ? ' bs-modal-' . $atts['size'] : '';

	$div_size = ( $atts['size'] ) ? ' modal-' . $atts['size'] : '';

	$id = 'custom-modal-' . $GLOBALS['modal_count'];

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	$modal_output = sprintf(
		'<div class="%1$s" id="%2$s" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog %3$s">
				<div class="modal-content">
					<div class="modal-header">
						%4$s
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						%5$s
					</div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->
		</div> <!-- /.modal -->
		',
		esc_attr( $div_class ),
		esc_attr( $id ),
		esc_attr( $div_size ),
		( $atts['title'] ) ? '<h4 class="modal-title">' . $atts['title'] . '</h4>' : '',
		do_shortcode( $content )
	);

	add_action('wp_footer', function() use ($modal_output) {
		echo $modal_output;
	}, 100,0);

	return sprintf(
		'<a data-toggle="modal" href="#%1$s" class="%2$s"%3$s>%4$s</a>',
		esc_attr( $id ),
		esc_attr( $a_class ),
		( $data_props ) ? ' ' . $data_props : '',
		esc_html( $atts['text'] )
	);
}

function ifrs_bs4_modal_footer( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		"xclass" => false,
		"data"   => false,
	), $atts );

	$class  = 'modal-footer';
	$class .= ( $atts['xclass'] ) ? ' ' . $atts['xclass'] : '';

	$data_props = ifrs_bs4_parse_data_attributes( $atts['data'] );

	return sprintf(
		'</div><div class="%s"%s>%s',
		esc_attr( trim($class) ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
	);
}

function ifrs_bs4_attribute_map($str, $att = null) {
	$res = array();
	$return = array();
	$reg = get_shortcode_regex();
	preg_match_all('~'.$reg.'~',$str, $matches);
	foreach($matches[2] as $key => $name) {
		$parsed = shortcode_parse_atts($matches[3][$key]);
		$parsed = is_array($parsed) ? $parsed : array();
			$res[$name] = $parsed;
			$return[] = $res;
		}
	return $return;
}

function ifrs_bs4_parse_data_attributes( $data ) {
	$data_props = '';

	if ( $data ) {
		$data = explode( '|', $data );

		foreach( $data as $d ) {
			$d = explode( ',', $d );
			$data_props .= sprintf( 'data-%s="%s" ', esc_html( $d[0] ), esc_attr( trim( $d[1] ) ) );
		}
	} else {
		$data_props = false;
	}

	return $data_props;
}

function ifrs_bs4_scrape_dom_element( $tag, $content, $class, $title = '', $data = null ) {
	$previous_value = libxml_use_internal_errors(TRUE);

	$dom = new DOMDocument;
	$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

	libxml_clear_errors();
	libxml_use_internal_errors($previous_value);

	foreach ($tag as $find) {
		$tags = $dom->getElementsByTagName($find);

		foreach ($tags as $find_tag) {
			$outputdom = new DOMDocument;
			$new_root = $outputdom->importNode($find_tag, true);
			$outputdom->appendChild($new_root);

			if ( is_object($outputdom->documentElement) ) {
				$outputdom->documentElement->setAttribute('class', $outputdom->documentElement->getAttribute('class') . ' ' . esc_attr( $class ));

				if ( $title ) {
					$outputdom->documentElement->setAttribute('title', $title );
				}

				if ( $data ) {
					$data = explode( '|', $data );

					foreach( $data as $d ):
						$d = explode(',',$d);
						$outputdom->documentElement->setAttribute('data-'.$d[0],trim($d[1]));
					endforeach;
				}
			}

			return $outputdom->saveHTML($outputdom->documentElement);
		}
	}
}
