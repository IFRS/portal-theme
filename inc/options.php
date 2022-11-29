<?php
if (is_super_admin()) {
	add_action( 'cmb2_admin_init', function() {
		/* Banner Especial */
		$banner_especial_prefix = 'banner_especial';
		$banner_especial = new_cmb2_box( array(
			'id'           => $banner_especial_prefix . '_metabox',
			'title'        => esc_html__( 'Banner Especial', 'ifrs-portal-theme' ),
			'object_types' => array( 'options-page' ),
			'option_key'      => $banner_especial_prefix . '_options',
			'menu_title'      => esc_html__( 'Banner Especial', 'ifrs-portal-theme' ),
			'parent_slug'     => 'themes.php',
			'capability'      => 'manage_options',
			// 'icon_url'        => 'dashicons-palmtree',
			// 'position'        => 1,
			// 'admin_menu_hook' => 'network_admin_menu',
			// 'display_cb'      => false,
			// 'save_button'     => esc_html__( 'Salvar', 'ifrs-portal-theme' ),
		) );

		$banner_especial->add_field( array(
			'name' => 'Habilitar?',
			'id'   => $banner_especial_prefix . '_enable',
			'type' => 'checkbox',
		) );

		$banner_especial->add_field( array(
			'name'    => esc_html__('Imagem'),
			'desc'    => esc_html__('Envie ou selecione uma imagem.', 'ifrs-portal-theme'),
			'id'      => $banner_especial_prefix . '_img',
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

		$banner_especial->add_field( array(
			'name' => esc_html__( 'URL do Link', 'ifrs-portal-theme' ),
			'id'   => $banner_especial_prefix . '_url',
			'type' => 'text_url',
		) );

		/* e-MEC */
		$e_mec_prefix = 'e_mec';
		$e_mec = new_cmb2_box( array(
			'id'           => $e_mec_prefix . '_metabox',
			'title'        => esc_html__( 'Banner e-MEC', 'ifrs-portal-theme' ),
			'object_types' => array( 'options-page' ),
			'option_key'      => $e_mec_prefix . '_options',
			'menu_title'      => esc_html__( 'Banner e-MEC', 'ifrs-portal-theme' ),
			'parent_slug'     => 'themes.php',
			'capability'      => 'manage_options',
			// 'icon_url'        => 'dashicons-palmtree',
			// 'position'        => 1,
			// 'admin_menu_hook' => 'network_admin_menu',
			// 'display_cb'      => false,
			// 'save_button'     => esc_html__( 'Salvar', 'ifrs-portal-theme' ),
		) );

		$e_mec->add_field( array(
			'name' => 'Habilitar?',
			'id'   => $e_mec_prefix . '_enable',
			'type' => 'checkbox',
		) );

		$e_mec->add_field( array(
			'name'    => esc_html__('Imagem'),
			'desc'    => esc_html__('Envie ou selecione uma imagem.', 'ifrs-portal-theme'),
			'id'      => $e_mec_prefix . '_img',
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

		$e_mec->add_field( array(
			'name' => esc_html__( 'URL', 'ifrs-portal-theme' ),
			'desc' => __( 'Endereço da página da instituição no e-MEC.', 'ifrs-portal-theme' ),
			'id'   => $e_mec_prefix . '_url',
			'type' => 'text_url',
		) );
	} );
}
