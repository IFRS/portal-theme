<?php

/**
 * Definição de metaboxes para page
 */
add_action( 'rwmb_meta_boxes', function($metaboxes) {
	$prefix = '_page_';

	/**
	 * Subpáginas
	 */
    $metaboxes[] = array(
        'title'      => __( 'Exibição de Subpáginas', 'ifrs-portal-theme' ),
        'post_types' => 'page',
        'context'    => 'side',
        'priority'   => 'low',
        'fields'     => array(
            array(
                'id'          => $prefix . 'subpages',
                'type'        => 'select',
                'placeholder' => 'Padrão (Botões)',
                'options'     => array(
                    'list'    => 'Lista',
                    'index'   => 'Lista Ordenada (Índice)',
                    'hidden'  => 'Oculto (Inserção Manual)',
                ),
            ),
        ),
    );

    return $metaboxes;
} );
