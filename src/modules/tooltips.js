$(function () {
    $('.area-social__widget > a').each(function (i, e) {
        texto = $(e).prev('span').html();
        $(e).tooltip({
            placement: 'bottom',
            title: texto
        });
        $(e).children('img').first().removeAttr('title');
    });

    $('.noticia__data[data-toggle="tooltip"]').each(function (i, e) {
        $(e).tooltip();
    });

    $('.crunchify-social__link[data-toggle="tooltip"]').each(function (i, e) {
        $(e).tooltip();
    });

    $('.area-atalhos__widget > a').each(function (i, e) {
        texto = $(e).prev('h3').html();
        $(e).tooltip({
            placement: 'top',
            title: texto
        });
        $(e).children('img').first().removeAttr('title');
    });

    $('.footer__lai').tooltip();

    $('.creditos > a[data-toggle="tooltip"]').each(function (i, e) {
        $(e).tooltip();
    });
});
