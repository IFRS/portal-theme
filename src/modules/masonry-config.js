require('jquery-bridget');
require('masonry-layout');

$(window).on('load', function() {
    $('#menu-rodape').masonry({
        percentPosition: true
    });

    $('#lista-noticias').masonry({
        percentPosition: true
    });

    $('.gallery').masonry({
        itemSelector: 'dl',
        percentPosition: true
    });
});
