<?php
function add_prettyphoto_rel($content) {
       global $post;
       $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 rel="prettyPhoto[post-gallery]" title="'.$post->post_title.'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}

add_filter('the_content', 'add_prettyphoto_rel');
