<?php
/**
 * Title: Compartilhamento
 * Slug: ifrs/share
 * Categories: buttons
 * Block Types:
 */

$URL = urlencode(get_permalink());

$title = urlencode(get_the_title());

$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

$emailURL = "mailto:?subject=$title&body=$URL";
$facebookURL = "https://www.facebook.com/sharer.php?u=$URL";
$twitterURL = "https://twitter.com/intent/tweet?text=$title&amp;url=$URL";
$linkedinURL = "https://www.linkedin.com/sharing/share-offsite/?url=$URL";
$whatsappURL = "https://wa.me/?text=$title%20$URL";
?>
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
<div class="wp-block-group" style="color: var(--bs-secondary);">
  <!-- wp:html -->
    <i class="fa-solid fa-share-nodes"></i>
    <span class="visually-hidden">Compartilhar conte&uacute;do:</span>
  <!-- /wp:html -->
  <!-- wp:social-links {"className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
  <ul class="wp-block-social-links is-style-logos-only">
    <!-- wp:social-link {"url":"<?php echo $emailURL; ?>","service":"mail"} /-->

    <!-- wp:social-link {"url":"<?php echo $facebookURL; ?>","service":"facebook"} /-->

    <!-- wp:social-link {"url":"<?php echo $twitterURL; ?>","service":"x"} /-->

    <!-- wp:social-link {"url":"<?php echo $linkedinURL; ?>","service":"linkedin"} /-->

    <!-- wp:social-link {"url":"<?php echo $whatsappURL; ?>","service":"whatsapp"} /-->
  </ul>
  <!-- /wp:social-links -->
</div>
<!-- /wp:group -->
