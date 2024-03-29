$(function() {
    $('.menu-collapse .sub-menu').addClass('collapse');
    $('.menu-collapse .sub-menu').prev('a').addClass('collapsed');
    $('.menu-collapse .sub-menu').prev('a').attr('aria-expanded', 'false');
    $('.menu-collapse .sub-menu').prev('a').append('<span class="visually-hidden"> (Expandir submenus)</span>');

    $('.menu-collapse > .menu-item-has-children > a, .menu-collapse > .menu-item-has-children > .sub-menu > .menu-item-has-children > a').on('click', function(e) {
        $(this).nextAll('.collapse').each(function() {
            $(this).collapse('toggle');
        });
        e.preventDefault();
    });

    $('.menu-collapse .collapse').on('show.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').removeClass('collapsed');
        collapse.prev('a').attr('aria-expanded', 'true');
        collapse.prev('a').children('span.visually-hidden').first().text(' (Ocultar submenus)');
    });

    $('.menu-collapse .collapse').on('hide.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').addClass('collapsed');
        collapse.prev('a').attr('aria-expanded', 'false');
        collapse.prev('a').children('span.visually-hidden').first().text(' (Expandir submenus)');
    });

    // Abre todos os collapse até o item atual.
    $('.current-menu-item, .current-menu-parent').parents('.collapse').each(function() {
        $(this).each(function() {
            $(this).collapse('show');
        });
    });

    // Controla a exibição do menu em viewports pequenos.
    function menu_resize_control() {
        if ($(window).width() < 992) {
            $('.menu-navbar').collapse('hide');
            $('.menu-navbar').addClass('menu-navbar--overlay');
            $('.menu-navbar__close').removeClass('d-none');

            $('.nav-campi').collapse('hide');
            $('.menu-campi__toggle').removeClass('d-none');
        } else {
            $('body').removeAttr('style');

            $('.menu-navbar').collapse('show');
            $('.menu-navbar').removeClass('menu-navbar--overlay');
            $('.menu-navbar__close').addClass('d-none');

            $('.nav-campi').collapse('show');
            $('.menu-campi__toggle').addClass('d-none');
        }
    }

    menu_resize_control();

    var width_control = $(window).width();
    $(window).resize(function() {
        clearTimeout(window.resizedFinished);
        window.resizedFinished = setTimeout(function() {
            if ($(window).width() === width_control) {
                return;
            }
            menu_resize_control();
        }, 250);
    });

    // Botões
    $('.btn-menu-toggle').on('click', function(e) {
        $('.menu-navbar').each(function() {
            $(this).collapse('show');
        });
        e.preventDefault();
    });
    $('.menu-navbar__close').on('click', function(e) {
        $('.menu-navbar').each(function() {
            $(this).collapse('hide');
        });
       e.preventDefault();
    });

    // Eventos
    $('.menu-navbar').on('show.bs.collapse', function(e) {
        if (e.target === this) {
            $('body').css({
                'overflow': 'hidden',
            });
        }
    });
    $('.menu-navbar').on('hide.bs.collapse', function(e) {
        if (e.target === this) {
            $('body').removeAttr('style');
        }
    });
});
