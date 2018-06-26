<?php
function empty_search_filter($query) {
   // If 's' request variable is set but empty
   if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()) {
      $query->is_search = false;
   }
   return $query;
}

add_filter('pre_get_posts', 'empty_search_filter');
