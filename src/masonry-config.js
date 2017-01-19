$(window).load(function() {
    $('#menu-rodape').masonry({
        itemSelector: '#menu-rodape > .menu-item',
        percentPosition: true
    });

    $('#lista-noticias').masonry({
        itemSelector: '#lista-noticias > div',
        percentPosition: true
    });
});
