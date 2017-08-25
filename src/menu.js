$(function() {
    $('.menu-collapse .sub-menu').addClass('collapse');
    $('.menu-collapse .sub-menu').prev('a').addClass('collapsed');
    $('.menu-collapse .sub-menu').prev('a').attr('aria-expanded', 'false');
    $('.menu-collapse .sub-menu').prev('a').append('<span class="sr-only"> (Expandir submenus)</span>');

    $('#menu-main .sub-menu').collapse({
        toggle: false
    });
    $('.menu-collapse .menu-item-has-children > a').on('click', function(e) {
        $(this).nextAll('.collapse').collapse('toggle');
        e.preventDefault();
    });

    $('.collapse').on('show.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').removeClass('collapsed');
        collapse.prev('a').attr('aria-expanded', 'true');
        collapse.prev('a').children('span.sr-only').first().text(' (Ocultar submenus)');
    });

    $('.collapse').on('hide.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').addClass('collapsed');
        collapse.prev('a').attr('aria-expanded', 'false');
        collapse.prev('a').children('span.sr-only').first().text(' (Expandir submenus)');
    });

    // Abre todos os collapse até o item atual;
    $('.current-menu-item').parents('.collapse').collapse('show');
});
