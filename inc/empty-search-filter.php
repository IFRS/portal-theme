<?php
function empty_search_filter($query) {
   if (((isset($_GET['s']) && empty($_GET['s'])) || (isset($_POST['s']) && empty($_POST['s']))) && $query->is_main_query()) {
      $query->is_search = false;
   }
   return $query;
}

add_filter('pre_get_posts', 'empty_search_filter');
