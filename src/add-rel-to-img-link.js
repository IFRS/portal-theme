$(document).ready(function() {
    $('.post-content').find('a[href$=".gif"], a[href$=".jpg"], a[href$=".png"], a[href$=".bmp"]').each(function() {
        $(this).attr('rel', 'gallery');
    });
});
