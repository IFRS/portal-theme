require('jquery-bridget');
require('masonry-layout');

$(function() {
    $('#lista-noticias').masonry({
        itemSelector: '#lista-noticias > div',
        percentPosition: true
    });

    $('.gallery').masonry({
        itemSelector: 'dl',
        percentPosition: true
    });
});
