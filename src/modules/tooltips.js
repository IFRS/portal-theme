$(function () {
    $('.area-social__widget > a > img').on('lazyloaded', function(e) {
        let link = $(e.target).parent();
        console.log(link);
        let texto = link.prev('span').html();
        link.tooltip({
            placement: 'bottom',
            title: texto,
        });
        $(e.target).removeAttr('title');
    });

    $('.area-atalhos__widget > a > img').on('lazyloaded', function(e) {
        let link = $(e.target).parent();
        let texto = link.prev('h3').html();
        link.tooltip({
            placement: 'top',
            title: texto
        });
        $(e.target).removeAttr('title');
    });

    $('.creditos > a[data-toggle="tooltip"] > img').on('lazyloaded', function(e) {
        let link = $(e.target).parent();
        link.tooltip();
    });

    $('.footer__lai[data-toggle="tooltip"] > img').on('lazyloaded', function(e) {
        let link = $(e.target).parent();
        link.tooltip();
    });

    $('.noticia__data[data-toggle="tooltip"]').each(function (i, e) {
        $(e).tooltip();
    });

    $('.crunchify-social__link[data-toggle="tooltip"]').each(function (i, e) {
        $(e).tooltip();
    });
});
