$(function() {
    /* Sticky Footer */
    setColumnSize();
    $(window).resize(function () { setColumnSize(); });

    /* Activate Tooltips */
    $('[data-toggle="tooltip"]').tooltip({
        placement: 'top'
    });
});

function setColumnSize() {
    $('.wrapper').css('min-height', $( window ).height() - 22);
}