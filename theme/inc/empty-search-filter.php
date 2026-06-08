<?php
add_filter('pre_get_posts', function($query) {
   if (is_admin() || !$query->is_main_query() || !$query->is_search()) {
      return $query;
   }

   $search_term = get_query_var('s', '');

   if (!is_string($search_term) || preg_match('/\S/u', $search_term) !== 1) {
      $query->is_search = false;
   }

   return $query;
});
