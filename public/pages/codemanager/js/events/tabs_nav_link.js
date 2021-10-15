$('.nav-link').on('click', function () {
    var tapref = $(this).attr('data-tab');
    var tabid = 'tab_' + tapref;
    tab_result_reset(tabid);

});

function tab_result_reset(tabid) {

    hide_all_tab_pans(function () {
        $('#' + tabid).css('display', 'block');
    });

}
function hide_all_tab_pans(callback) {
    $('.tab-pane').css('display', 'none');
    callback.call('done');
}