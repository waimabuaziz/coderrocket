
$(document).on("click", ".ibox-collapse", function () {
    var ibox = $(this).closest('div.ibox');
    ibox.toggleClass('collapsed-mode').children('.ibox-body').slideToggle(200);
});
 