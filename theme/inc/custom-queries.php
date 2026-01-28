<?php
add_action('pre_get_posts', function($query) {
  if (!is_admin() && $query->is_main_query()) {
    if ($query->is_home()) {
      $query->set('ignore_sticky_posts', true);
    }

    if ($query->is_category() || $query->is_tag() || $query->is_home()) {
      $query->set('posts_per_page', 9);
    }

    if ($query->is_tax('escopo')) {
      $query->set('posts_per_page', 9);
    }

    if ($query->is_search()) {
      $query->set('posts_per_page', 10);
    }
  }
});
