<?php
add_filter( 'default_wp_template_part_areas', function( $areas ) {
	$areas[] = array(
		'area'        => 'prefooter',
		'area_tag'    => 'section',
		'label'       => __( 'Pré-rodapé', 'ifrs-portal-theme' ),
		'description' => __( 'Área antes do rodapé, para ser exibida em todas as páginas.', 'ifrs-portal-theme' ),
		'icon'        => 'sidebar'
	);

	return $areas;
} );
