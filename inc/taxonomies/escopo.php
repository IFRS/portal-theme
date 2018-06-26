<?php
if ( ! function_exists( 'escopo_taxonomy' ) ) {
    function escopo_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Escopos', 'Taxonomy General Name', 'ifrs-portal-theme' ),
            'singular_name'              => _x( 'Escopo', 'Taxonomy Singular Name', 'ifrs-portal-theme' ),
            'menu_name'                  => __( 'Escopo', 'ifrs-portal-theme' ),
            'all_items'                  => __( 'Todos os Escopos', 'ifrs-portal-theme' ),
            'parent_item'                => __( 'Escopo Pai', 'ifrs-portal-theme' ),
            'parent_item_colon'          => __( 'Escopo Pai:', 'ifrs-portal-theme' ),
            'new_item_name'              => __( 'Novo Escopo', 'ifrs-portal-theme' ),
            'add_new_item'               => __( 'Adicionar Novo Escopo', 'ifrs-portal-theme' ),
            'edit_item'                  => __( 'Editar Escopo', 'ifrs-portal-theme' ),
            'update_item'                => __( 'Atualizar Escopo', 'ifrs-portal-theme' ),
            'view_item'                  => __( 'Visualizar Escopo', 'ifrs-portal-theme' ),
            'separate_items_with_commas' => __( 'Escopos separados por vírgulas', 'ifrs-portal-theme' ),
            'add_or_remove_items'        => __( 'Adicionar ou Remover Escopos', 'ifrs-portal-theme' ),
            'choose_from_most_used'      => __( 'Escolher pelo Escopo mais usado', 'ifrs-portal-theme' ),
            'popular_items'              => __( 'Escopos Populares', 'ifrs-portal-theme' ),
            'search_items'               => __( 'Buscar Escopos', 'ifrs-portal-theme' ),
            'not_found'                  => __( 'Não encontrado', 'ifrs-portal-theme' ),
            'no_terms'                   => __( 'Sem Escopos', 'ifrs-portal-theme' ),
            'items_list'                 => __( 'Lista de Escopos', 'ifrs-portal-theme' ),
            'items_list_navigation'      => __( 'Lista de Navegação de Escopos', 'ifrs-portal-theme' ),
        );
        $rewrite = array(
            'slug'                       => 'noticias/escopos',
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $capabilities = array(
            'manage_terms'               => 'manage_escopos',
            'edit_terms'                 => 'edit_escopos',
            'delete_terms'               => 'delete_escopos',
            'assign_terms'               => 'edit_posts',
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
            'rewrite'                    => $rewrite,
            'capabilities'               => $capabilities,
            'show_in_rest'               => false,
        );
        register_taxonomy( 'escopo', array( 'post' ), $args );
    }
    add_action( 'init', 'escopo_taxonomy', 0 );
}
