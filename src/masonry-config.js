require('jquery-bridget');
require('masonry-layout');

$(document).ready(function() {
    $('#lista-noticias').masonry({
        itemSelector: '#lista-noticias > div',
        percentPosition: true
    });

    $('.instagram-pics').masonry({
        itemSelector: 'li',
        percentPosition: true
    });

    $('.post-content .gallery').masonry({
        itemSelector: 'dl',
        percentPosition: true
    });
});
