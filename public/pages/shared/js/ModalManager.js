

// ############ Main Events #####################
// ==========================================================
$(".btn_modal_open").click(function (e) {
  
    var modalid = $(this).attr('data-modalid') ; 
    Modal_Open(modalid);
}); //-------------------
$(document).on("click", ".btn_modal_open", function () {
    var modalid = $(this).attr('data-modalid') ; 
    Modal_Open(modalid);
}); //=========================================================
// ==========================================================
$(".btn_modal_close").click(function (e) {
    var modalid = $(this).attr('data-modalid') ; 
    Modal_Close(modalid);
}); //-------------------
$(document).on("click", ".btn_modal_close", function () {
    var modalid = $(this).attr('data-modalid') ; 
    Modal_Close(modalid);
}); //=========================================================
// ==========================================================
$(".btn_modal_cancel").click(function (e) {
    var modalid = $(this).attr('data-modalid') ; 
    Modal_Close(modalid);
}); //-------------------
$(document).on("click", ".btn_modal_cancel", function () {
    var modalid = $(this).attr('data-modalid') ; 
    Modal_Close(modalid);
}); //=========================================================



// ############ Main Function #####################
function Modal_Open(modalid, callback) {
    $('#' + modalid).modal('show');
    callback.call('done');
} // End of function open modal =================
function Modal_Close(modalid, callback) {
    $('#' + modalid).modal('hide');
    callback.call('done');
} // End of function open modal =================
function Modal_Cancel(modalid, callback) {

    $('#' + modalid).modal('hide');
    callback.call('done');

} // End of function open modal =================


// ############## without callback ############
function Modal_Open(modalid) {
    $('#' + modalid).modal('show');
} // End of function open modal =================
function Modal_Close(modalid) {
    $('#' + modalid).modal('hide');
} // End of function open modal =================
function Modal_Cancel(modalid) {
    $('#' + modalid).modal('hide');
} // End of function open modal =================