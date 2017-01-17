$(document).ready(function() {
    $('#menu-main .sub-menu').collapse({
        toggle: false
    });
    $('.menu-collapse .menu-item-has-children > a').on('click', function(e) {
        $(this).nextAll('.collapse').collapse('toggle');
        e.preventDefault();
    });

    $('.collapse').on('show.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').children('.glyphicon').removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
    });

    $('.collapse').on('hide.bs.collapse', function(e) {
        var collapse = $(e.target);
        collapse.prev('a').children('.glyphicon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
    });

    // Abre todos os collapse até o item atual;
    $('.current-menu-item').parents('.collapse').collapse('show');
});
