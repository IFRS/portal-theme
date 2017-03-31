$('#collapseYearly').on('show.bs.collapse', function () {
    $('#toggleYearly').toggleClass('active');
});
$('#collapseYearly').on('hide.bs.collapse', function () {
    $('#toggleYearly').toggleClass('active');
});

$('#collapseMonthly').on('show.bs.collapse', function () {
    $('#toggleMonthly').toggleClass('active');
});
$('#collapseMonthly').on('hide.bs.collapse', function () {
    $('#toggleMonthly').toggleClass('active');
});


$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
