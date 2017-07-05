require('jquery-fancybox/source/js/jquery.fancybox');

$( document ).ready( function() {
    $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
} );
