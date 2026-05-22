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
    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640" fill="currentColor" class="img-fluid"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M448 256C501 256 544 213 544 160C544 107 501 64 448 64C395 64 352 107 352 160C352 165.4 352.5 170.8 353.3 176L223.6 248.1C206.7 233.1 184.4 224 160 224C107 224 64 267 64 320C64 373 107 416 160 416C184.4 416 206.6 406.9 223.6 391.9L353.3 464C352.4 469.2 352 474.5 352 480C352 533 395 576 448 576C501 576 544 533 544 480C544 427 501 384 448 384C423.6 384 401.4 393.1 384.4 408.1L254.7 336C255.6 330.8 256 325.5 256 320C256 314.5 255.5 309.2 254.7 304L384.4 231.9C401.3 246.9 423.6 256 448 256z"/></svg>
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
