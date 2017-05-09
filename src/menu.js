$(document).ready(function() {
    $('.menu-collapse .sub-menu').addClass('collapse');
    $('.menu-collapse .sub-menu').prev('a').addClass('collapsed');

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
    });

    $('.collapse').on('hide.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').addClass('collapsed');
    });

    // Abre todos os collapse até o item atual;
    $('.current-menu-item').parents('.collapse').collapse('show');
});
