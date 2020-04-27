require('@fancyapps/fancybox');

$(function() {
    $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('data-fancybox', 'gallery').each(function() {
        let caption = $(this).parent().next('.gallery-caption').text();

        if (!caption) {
            caption = $(this).next('.wp-caption-text').text();
        }

        if (caption) {
            $(this).attr('data-caption', $.trim(caption));
        }
    });
});
