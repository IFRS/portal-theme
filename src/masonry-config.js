$(window).load(function() {
    $('#menu-rodape').masonry({
        itemSelector: '#menu-rodape > .menu-item',
        percentPosition: true
    });

    $('#lista-noticias').masonry({
        itemSelector: '#lista-noticias > div',
        percentPosition: true
    });

    $('.panel-collapse').on('shown.bs.collapse', function() {
        $('.panel-concurso .concurso-arquivos').masonry({
            itemSelector: '.col-xs-12',
            columnWidth: '.col-xs-12',
            percentPosition: true
        });
    });
});
