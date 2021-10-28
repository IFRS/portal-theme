<?php
if (is_super_admin()) {
	add_action( 'cmb2_admin_init', function() {
		$prefix = 'banner_especial';
		$options = new_cmb2_box( array(
			'id'           => $prefix . '_metabox',
			'title'        => esc_html__( 'Banner Especial', 'ifrs-portal-theme' ),
			'object_types' => array( 'options-page' ),
			'option_key'      => $prefix . '_options',
			'menu_title'      => esc_html__( 'Banner Especial', 'ifrs-portal-theme' ),
			'parent_slug'     => 'themes.php',
			'capability'      => 'manage_options',
			// 'icon_url'        => 'dashicons-palmtree',
			// 'position'        => 1,
			// 'admin_menu_hook' => 'network_admin_menu',
			// 'display_cb'      => false,
			// 'save_button'     => esc_html__( 'Salvar', 'ifrs-portal-theme' ),
		) );

		$options->add_field( array(
			'name' => 'Habilitar?',
			'id'   => $prefix . '_enable',
			'type' => 'checkbox',
		) );

		$options->add_field( array(
			'name'    => esc_html__('Imagem'),
			'desc'    => esc_html__('Envie ou selecione uma imagem.', 'ifrs-portal-theme'),
			'id'      => $prefix . '_img',
			'type'    => 'file',
			'options' => array(
				'url' => false,
			),
			'text'    => array(
				'add_upload_file_text' => esc_html__('Adicionar Imagem', 'ifrs-portal-theme'),
			),
			'query_args' => array(
				'type' => array(
					'image/gif',
					'image/jpeg',
					'image/png',
				),
			),
			'preview_size' => 'thumbnail',
		) );

		$options->add_field( array(
			'name' => esc_html__( 'URL do Link', 'ifrs-portal-theme' ),
			'id'   => $prefix . '_url',
			'type' => 'text_url',
		) );
	} );
}
