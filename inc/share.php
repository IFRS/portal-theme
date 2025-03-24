<?php
add_action('the_content', function($content) {
  if (is_front_page() || is_home()) return $content;

  $URL = urlencode(get_permalink());

  $title = urlencode(get_the_title());

  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$URL;
  $twitterURL = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$URL;
  $linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$URL.'&amp;title='.$title;
  $whatsappURL = 'whatsapp://send?text='.$title.' '.$URL;

  ob_start();
?>
  <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
  <div class="wp-block-group">
    <!-- wp:html -->
      <i class="fa-solid fa-share-nodes"></i>
      <span class="visually-hidden">Compartilhar conte&uacute;do:</span>
    <!-- /wp:html -->
    <!-- wp:social-links {"size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
    <ul class="wp-block-social-links has-small-icon-size is-style-logos-only">
      <!-- wp:social-link {"url":"<?php echo $facebookURL; ?>","service":"facebook"} /-->

      <!-- wp:social-link {"url":"<?php echo $twitterURL; ?>","service":"x"} /-->

      <!-- wp:social-link {"url":"<?php echo $linkedinURL; ?>","service":"linkedin"} /-->

      <!-- wp:social-link {"url":"<?php echo $whatsappURL; ?>","service":"whatsapp"} /-->
    </ul>
    <!-- /wp:social-links -->
  </div>
  <!-- /wp:group -->
<?php
  $blocks = parse_blocks(ob_get_clean());
  foreach($blocks as $block) {
    $content .= render_block($block);
  }
  return $content;
}, 999);
