<?php
/**
 * Thanks to Crunchify
 * http://crunchify.me/1VIxAsz
 */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('share');
}, 10);

add_action('the_content', function($content) {
    $crunchifyURL = urlencode(get_permalink());

    $crunchifyTitle = str_replace( ' ', '%20', get_the_title());

    $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
    $linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.(is_array($crunchifyThumbnail) ? $crunchifyThumbnail[0] : '').'&amp;description='.$crunchifyTitle;
    $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle.' '.$crunchifyURL;

    ob_start();
?>
    <ul class="crunchify-social">
        <li class="crunchify-social__item crunchify-social__item--first"><span class="sr-only">Compartilhar conte&uacute;do:</span></li>
        <li class="crunchify-social__item">
            <a class="btn crunchify-social__link crunchify-social__link_facebook" href="<?php echo $facebookURL; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Compartilhe no Facebook">
                <svg aria-hidden="true" role="img" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0"/></svg>
                <span class="sr-only">Facebook</span>
            </a>
        </li>
        <li class="crunchify-social__item">
            <a class="btn crunchify-social__link crunchify-social__link_twitter" href="<?php echo $twitterURL; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Compartilhe no Twitter">
                <svg aria-hidden="true" role="img" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
                <span class="sr-only">Twitter</span>
            </a>
        </li>
        <li class="crunchify-social__item">
            <a class="btn crunchify-social__link crunchify-social__link_linkedin" href="<?php echo $linkedinURL; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Compartilhe no Linkedin">
                <svg aria-hidden="true" role="img" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                <span class="sr-only">LinkedIn</span>
            </a>
        </li>
        <li class="crunchify-social__item">
            <a class="btn crunchify-social__link crunchify-social__link_pinterest" href="<?php echo $pinterestURL; ?>" data-pin-custom="true" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Compartilhe no Pinterest">
                <svg aria-hidden="true" role="img" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/></svg>
                <span class="sr-only">Pinterest</span>
            </a>
        </li>
        <li class="crunchify-social__item">
            <a class="btn crunchify-social__link crunchify-social__link_whatsapp" href="<?php echo $whatsappURL; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Compartilhe no WhatsApp">
                <svg aria-hidden="true" role="img" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.498 14.382c-.301-.15-1.767-.867-2.04-.966-.273-.101-.473-.15-.673.15-.197.295-.771.964-.944 1.162-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.174-.3-.019-.465.13-.615.136-.135.301-.345.451-.523.146-.181.194-.301.297-.496.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.172-.015-.371-.015-.571-.015-.2 0-.523.074-.797.359-.273.3-1.045 1.02-1.045 2.475s1.07 2.865 1.219 3.075c.149.195 2.105 3.195 5.1 4.485.714.3 1.27.48 1.704.629.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345m-5.446 7.443h-.016c-1.77 0-3.524-.48-5.055-1.38l-.36-.214-3.75.975 1.005-3.645-.239-.375c-.99-1.576-1.516-3.391-1.516-5.26 0-5.445 4.455-9.885 9.942-9.885 2.654 0 5.145 1.035 7.021 2.91 1.875 1.859 2.909 4.35 2.909 6.99-.004 5.444-4.46 9.885-9.935 9.885M20.52 3.449C18.24 1.245 15.24 0 12.045 0 5.463 0 .104 5.334.101 11.893c0 2.096.549 4.14 1.595 5.945L0 24l6.335-1.652c1.746.943 3.71 1.444 5.71 1.447h.006c6.585 0 11.946-5.336 11.949-11.896 0-3.176-1.24-6.165-3.495-8.411"/></svg>
                <span class="sr-only">WhatsApp</span>
            </a>
        </li>
    </ul>
<?php
    return $content . ob_get_clean();
}, 999);
