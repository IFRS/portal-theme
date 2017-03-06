<?php
/*
 Copyright Crunchify
 http://crunchify.me/1VIxAsz
*/

$crunchifyURL = urlencode(get_permalink());

$crunchifyTitle = str_replace( ' ', '%20', get_the_title());

$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
?>
<ul class="crunchify-social">
    <li><a class="crunchify-link crunchify-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a></li>
    <li><a class="crunchify-link crunchify-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a></li>
    <li><a class="crunchify-link crunchify-whatsapp" href="<?php echo $whatsappURL; ?>" target="_blank">WhatsApp</a></li>
    <li><a class="crunchify-link crunchify-googleplus" href="<?php echo $googleURL; ?>" target="_blank">Google+</a></li>
    <li><a class="crunchify-link crunchify-pinterest" href="<?php echo $pinterestURL; ?>" data-pin-custom="true" target="_blank">Pin It</a></li>
</ul>
