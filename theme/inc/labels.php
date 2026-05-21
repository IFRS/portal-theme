<?php
add_action('init', function() {
  $get_post_type = get_post_type_object('post');
  $labels = $get_post_type->labels;
  $labels->name = 'Notícias';
  $labels->singular_name = 'Notícia';
  $labels->add_new = 'Adicionar Nova';
  $labels->add_new_item = 'Adicionar Notícia';
  $labels->edit_item = 'Editar Notícia';
  $labels->new_item = 'Nova Notícia';
  $labels->view_item = 'Ver Notícia';
  $labels->search_items = 'Buscar Notícias';
  $labels->not_found = 'Nenhuma Notícia encontrada';
  $labels->not_found_in_trash = 'Nenhuma Notícia encontrada na lixeira';
  $labels->all_items = 'Todas as Notícias';
  $labels->menu_name = 'Notícias';
  $labels->name_admin_bar = 'Notícias';
});
