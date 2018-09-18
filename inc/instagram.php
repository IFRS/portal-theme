<?php
// Filtra vídeos do feed
add_filter('wpiw_images_only', '__return_true');

// Controle de cache
add_filter('null_instagram_cache_time', function() {
    return HOUR_IN_SECONDS * 4;
});
