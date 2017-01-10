$(document).ready(function() {
    $('#menu-main .sub-menu').collapse({
        toggle: false
    });
    $('.menu-collapse .menu-item-has-children > a').on('click', function(e) {
        e.preventDefault();
        $(this).next('.collapse').collapse('toggle');
    });
    $('.current-menu-item').parents('.collapse').collapse('show');
});
