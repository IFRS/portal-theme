$(window).load(function() {
    $('#lista-noticias').masonry({
        itemSelector: '#lista-noticias > div',
        percentPosition: true
    });

    $('.instagram-pics').masonry({
        itemSelector: 'li',
        percentPosition: true
    });
});
