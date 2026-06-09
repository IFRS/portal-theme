<?php

add_action('category_add_form_fields', function() {
  ?>
  <div class="form-field term-portal-hide-from-home-wrap">
    <label for="portal-hide-from-home" style="display:inline-flex; align-items:center; gap:8px;">
      <input type="checkbox" name="portal_hide_from_home" id="portal-hide-from-home" value="1" />
      <?php esc_html_e('Ocultar da página inicial', 'ifrs-portal-theme'); ?>
    </label>
    <p><?php esc_html_e('Quando marcado, notícias desta categoria não aparecem na página inicial.', 'ifrs-portal-theme'); ?></p>
  </div>
  <?php
});

add_action('category_edit_form_fields', function($term) {
  $hide_from_home = get_term_meta($term->term_id, 'portal_hide_from_home', true) === '1';
  ?>
  <tr class="form-field term-portal-hide-from-home-wrap">
    <th scope="row"><label for="portal-hide-from-home"><?php esc_html_e('Ocultar da página inicial', 'ifrs-portal-theme'); ?></label></th>
    <td>
      <label for="portal-hide-from-home">
        <input
          type="checkbox"
          name="portal_hide_from_home"
          id="portal-hide-from-home"
          value="1"
          <?php checked($hide_from_home); ?>
        />
        <?php esc_html_e('Não exibir notícias desta categoria na página inicial.', 'ifrs-portal-theme'); ?>
      </label>
    </td>
  </tr>
  <?php
});

$save_category_visibility = function($term_id) {
  if (!current_user_can('manage_categories')) {
    return;
  }

  $hide_from_home = isset($_POST['portal_hide_from_home']) ? '1' : '0';
  update_term_meta($term_id, 'portal_hide_from_home', $hide_from_home);
};

add_action('created_category', $save_category_visibility);
add_action('edited_category', $save_category_visibility);
