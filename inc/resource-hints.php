<?php
add_action('wp_head', function() {
?>
    <link rel="preconnect" href="https://vlibras.gov.br">

    <link rel="preload" as="font" href="/opensans/Regular/OpenSans-Regular.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/opensans/Italic/OpenSans-Italic.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/opensans/Bold/OpenSans-Bold.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/opensans/BoldItalic/OpenSans-BoldItalic.woff2" type="font/woff2" crossorigin="anonymous">

    <link rel="preload" as="font" href="/opensans/Regular/OpenSans-Regular.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="/opensans/Italic/OpenSans-Italic.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="/opensans/Bold/OpenSans-Bold.woff" type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href="/opensans/BoldItalic/OpenSans-BoldItalic.woff" type="font/woff" crossorigin="anonymous">
<?php
});
