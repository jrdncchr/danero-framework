// STICKY FOOTER
$(function(){
    setColumnSize();
    $(window).resize(function () { setColumnSize(); });
});

function setColumnSize() {
    $('.wrapper').css('min-height', $( window ).height() - 22);
}