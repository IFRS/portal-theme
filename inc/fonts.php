<?php
add_action('wp_head', function() {
    $fonts_file = get_template_directory_uri(). '/css/fonts.css';
?>
    <link rel="preload" as="style" href="<?php echo $fonts_file; ?>"/>
    <link rel="stylesheet" href="<?php echo $fonts_file; ?>" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="<?php echo $fonts_file; ?>"/>
    </noscript>
<?php
}, 1);
