<?php
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

            'edit_pages'             => true,
            'edit_others_pages'      => true,
            'delete_pages'           => true,
        ));
    }

    // Cadastrador de Eventos Role
    if (!get_role( 'eventos_manager' )) {
        add_role('eventos_manager', __('Gestor de Eventos'), array(
            'read'                              => true,
            'upload_files'                      => true,
            'manage_files'                      => true,

            'edit_tribe_event'                  => true,
            'read_tribe_event'                  => true,
            'delete_tribe_event'                => true,
            'delete_tribe_events'               => true,
            'edit_tribe_events'                 => true,
            'edit_others_tribe_events'          => true,
            'delete_others_tribe_events'        => true,
            'publish_tribe_events'              => true,
            'edit_published_tribe_events'       => true,
            'delete_published_tribe_events'     => true,
            'delete_private_tribe_events'       => true,
            'edit_private_tribe_events'         => true,
            'read_private_tribe_events'         => true,

            'edit_tribe_venue'                  => true,
            'read_tribe_venue'                  => true,
            'delete_tribe_venue'                => true,
            'delete_tribe_venues'               => true,
            'edit_tribe_venues'                 => true,
            'edit_others_tribe_venues'          => true,
            'delete_others_tribe_venues'        => true,
            'publish_tribe_venues'              => true,
            'edit_published_tribe_venues'       => true,
            'delete_published_tribe_venues'     => true,
            'delete_private_tribe_venues'       => true,
            'edit_private_tribe_venues'         => true,
            'read_private_tribe_venues'         => true,

            'edit_tribe_organizer'              => true,
            'read_tribe_organizer'              => true,
            'delete_tribe_organizer'            => true,
            'delete_tribe_organizers'           => true,
            'edit_tribe_organizers'             => true,
            'edit_others_tribe_organizers'      => true,
            'delete_others_tribe_organizers'    => true,
            'publish_tribe_organizers'          => true,
            'edit_published_tribe_organizers'   => true,
            'delete_published_tribe_organizers' => true,
            'delete_private_tribe_organizers'   => true,
            'edit_private_tribe_organizers'     => true,
            'read_private_tribe_organizers'     => true,
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
});