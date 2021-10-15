
 $("#btn_modal_create_ajax_submit").click(function(e) {

   

}); 


//#################  Auto Generated ###########################
//#################  Events ###########################
 // ==========================================================
 $("#btn_modal_create_ajax_open").click(function(e) {
     ModalManager("modal_create_ajax","open",function(){});
}); //=== end of btn_modal_create_ajax_open ==========================
// =============================================
// =============================================
$(document).on("click", "#btn_modal_create_ajax_open", function() {
    ModalManager("modal_create_ajax","open",function(){});
}); //=== end of btn_modal_create_ajax_open_ Dynamic ==================
// =============================================
// =============================================
$("#btn_modal_create_ajax_cancel").click(function(e) {
    ModalManager("modal_create_ajax","cancel",function(){});
}); //=== end of btn_modal_create_ajax_cancel ==========
// =============================================
$("#btn_modal_create_ajax_close").click(function(e) {
    ModalManager("modal_create_ajax","close",function(){});
}); //=== end of btn_modal_create_ajax_close =============

// ==============================================================
$("#modal_create_ajax").click(function(e) {
    // prevent modal to trigger parent click action 
    e.stopPropagation();
});
 