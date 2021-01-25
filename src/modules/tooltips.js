$(function () {
    $('.area-atalhos__widget > a').each(function (i, e) {
        texto = $(e).prev('span').html();
        $(e).tooltip({
            placement: 'top',
            title: texto
        });
        $(e).children('img').first().removeAttr('title');
    });

    $('.creditos > a[data-toggle="tooltip"]').each(function (i, e) {
        $(e).tooltip();
    });
});
