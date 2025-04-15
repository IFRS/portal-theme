<?php
setcookie(TEST_COOKIE, 'WP Cookie check', array (
    'expires' => 0,
    'path' => COOKIEPATH,
    'domain' => COOKIE_DOMAIN,
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Lax'
));
if ( SITECOOKIEPATH != COOKIEPATH ) {
    setcookie(TEST_COOKIE, 'WP Cookie check', array (
        'expires' => 0,
        'path' => SITECOOKIEPATH,
        'domain' => COOKIE_DOMAIN,
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Lax'
    ));
}
