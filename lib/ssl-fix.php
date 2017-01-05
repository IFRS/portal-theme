<?php
// Multisite SSL Verification Workaround
add_filter('https_ssl_verify', '__return_false');
add_filter('https_local_ssl_verify', '__return_false');
