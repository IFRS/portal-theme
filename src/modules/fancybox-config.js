require('jquery-fancybox/source/js/jquery.fancybox');

$(function() {
    $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
    $("a[rel='gallery']").each(function() {
        var caption = $(this).parent().next('.gallery-caption').text();
        if (caption) {
            $(this).attr('title', $.trim(caption));
        }
    });
});
