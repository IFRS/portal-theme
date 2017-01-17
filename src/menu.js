$(document).ready(function() {
    $('#menu-main .sub-menu').collapse({
        toggle: false
    });
    $('.menu-collapse .menu-item-has-children > a').on('click', function(e) {
        $(this).nextAll('.collapse').collapse('toggle');
        e.preventDefault();
    });

    $('.collapse').on('show.bs.collapse', function() {
        $(this).prevAll('.glyphicon').removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
    });

    $('.collapse').on('hide.bs.collapse', function() {
        $(this).prevAll('.glyphicon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
    });

    $('.current-menu-item').parents('.collapse').collapse('show');
});
