<?php
add_filter('render_block_core/search', function($block_content) {
  if (is_admin() || !class_exists('WP_HTML_Tag_Processor')) {
    return $block_content;
  }

  $processor = new WP_HTML_Tag_Processor($block_content);

  while ($processor->next_tag('input')) {
    $class = $processor->get_attribute('class');
    if (!is_string($class) || strpos($class, 'wp-block-search__input') === false) {
      continue;
    }

    $processor->set_attribute('required', 'required');
    $processor->set_attribute('pattern', '.*\\S.*');
    $processor->set_attribute('title', 'Digite um termo com pelo menos um caractere.');

    break;
  }

  return $processor->get_updated_html();
}, 10, 1);
