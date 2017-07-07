require('jquery-bridget');
require('masonry-layout');

$(document).ready(function() {
    $('#lista-noticias').masonry({
        itemSelector: '#lista-noticias > div',
        percentPosition: true
    });

    $('.instagram-pics').masonry({
        itemSelector: 'li',
    });

    $('.gallery').masonry({
        itemSelector: 'dl',
        percentPosition: true
    });
});
