$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('#collapseYearly').on('show.bs.collapse', function () {
        $('#toggleYearly').toggleClass('active');
    });
    $('#collapseYearly').on('hide.bs.collapse', function () {
        $('#toggleYearly').toggleClass('active');
    });
    if ($('#collapseYearly').hasClass('show')) {
        $('#toggleYearly').toggleClass('active');
    }

    $('#collapseMonthly').on('show.bs.collapse', function () {
        $('#toggleMonthly').toggleClass('active');
    });
    $('#collapseMonthly').on('hide.bs.collapse', function () {
        $('#toggleMonthly').toggleClass('active');
    });
    if ($('#collapseMonthly').hasClass('show')) {
        $('#toggleMonthly').toggleClass('active');
    }
});
