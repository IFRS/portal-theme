<?php
add_filter('pre_get_posts', function($query) {
   if (is_admin() || !$query->is_main_query() || !$query->is_search()) {
      return $query;
   }

   $search_get = null;
   $search_post = null;

   if (isset($_GET['s'])) {
      $search_get = sanitize_text_field(wp_unslash($_GET['s']));
   }

   if (isset($_POST['s'])) {
      $search_post = sanitize_text_field(wp_unslash($_POST['s']));
   }

   if (($search_get !== null && $search_get === '') || ($search_post !== null && $search_post === '')) {
      $query->is_search = false;
   }

   return $query;
});
