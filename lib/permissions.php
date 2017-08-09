<?php
// Remove os atributos de página para não-administradores
add_action('admin_menu', function() {
    if ( is_admin() ) {
        if ( !current_user_can('administrator') ) {
            remove_meta_box('pageparentdiv', 'page', 'normal');
        }
    }
});

// Fix Media Permissions
add_action('init', function() {
    global $wp_post_types;
    $wp_post_types['attachment']->cap->edit_posts = 'manage_files';
    $wp_post_types['attachment']->cap->delete_posts = 'manage_files';
});

// Activate Theme
add_action('after_switch_theme', function() {
    // Jornalista Role
    if (!get_role( 'jornalista' )) {
        add_role('jornalista', __('Jornalista'), array(
            'read'                   => true,
            'upload_files'           => true,
            'manage_files'           => true,

            'publish_posts'          => true,
            'edit_posts'             => true,
            'edit_others_posts'      => true,
            'edit_published_posts'   => true,
            'delete_posts'           => true,
            'delete_others_posts'    => true,
            'delete_published_posts' => true,
            'manage_categories'      => true,
        ));
    }

    // Administrar de Conteúdo Role
    if (!get_role( 'conteudo_manager' )) {
        add_role('conteudo_manager', __('Gestor de Conteúdo'), array(
            'read'                   => true,
            'upload_files'           => true,
            'manage_files'           => true,

            'publish_pages'          => true,
            'edit_pages'             => true,
            'edit_others_pages'      => true,
            'edit_published_pages'   => true,
            'delete_pages'           => true,
            'delete_others_pages'    => true,
            'delete_published_pages' => true,
        ));
    }

    // Conteudista Role
    if (!get_role( 'conteudista' )) {
        add_role('conteudista', __('Conteudista'), array(
            'read'                   => true,
            'upload_files'           => true,
            'manage_files'           => true,

            'publish_pages'          => false,
            'edit_pages'             => true,
            'edit_others_pages'      => true,
            'edit_published_pages'   => true,
        ));
    }

    // Cadastrador de Concursos
    if (!get_role( 'cadastrador_concursos' )) {
        add_role('cadastrador_concursos', __('Cadastrador de Concursos'), array(
            'read'                   => true,
            'upload_files'           => true,
            'manage_files'           => true,

            'create_concursos'       => true,
            'edit_concursos'         => true,
            'manage_concursos'       => false,

            'assign_concurso_status' => true
        ));
    }

    // Cadastrador de Documentos
    if (!get_role( 'cadastrador_documentos' )) {
        add_role('cadastrador_documentos', __('Cadastrador de Documentos'), array(
            'read'                    => true,
            'upload_files'            => true,
            'manage_files'            => true,

            'create_documentos'       => true,
            'edit_documentos'         => true,
            'manage_documentos'       => false,

            'assign_documento_type'   => true,
            'assign_documento_origin' => true
        ));
    }

    // Cadastrador de Editais
    if (!get_role( 'cadastrador_editais' )) {
        add_role('cadastrador_editais', __('Cadastrador de Editais'), array(
            'read'                   => true,
            'upload_files'           => true,
            'manage_files'           => true,

            'create_editais'         => true,
            'edit_editais'           => true,
            'manage_editais'         => false,

            'assign_edital_category' => true
        ));
    }
});

// De-activate Theme
add_action('switch_theme', function() {
    if (get_role( 'jornalista' )) {
        remove_role( 'jornalista' );
    }
    if (get_role( 'conteudo_manager' )) {
        remove_role( 'conteudo_manager' );
    }
    if (get_role( 'conteudista' )) {
        remove_role( 'conteudista' );
    }
    if (get_role( 'eventos_manager' )) {
        remove_role( 'eventos_manager' );
    }
    if (get_role( 'cadastrador_concursos' )) {
        remove_role( 'cadastrador_concursos' );
    }
    if (get_role( 'cadastrador_documentos' )) {
        remove_role( 'cadastrador_documentos' );
    }
    if (get_role( 'cadastrador_editais' )) {
        remove_role( 'cadastrador_editais' );
    }
});
