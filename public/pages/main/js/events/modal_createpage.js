
 $("#btn_modal_createpage_submit").click(function(e) {

    _create_page(this,function(){
        // alert(this);
    });

}); 


//#################  Auto Generated ###########################
//#################  Events ###########################
 // ==========================================================
 $("#btn_modal_createpage_open").click(function(e) {
     ModalManager("modal_createpage","open",function(){});
}); //=== end of btn_modal_createpage_open ==========================
// =============================================
// =============================================
$(document).on("click", "#btn_modal_createpage_open", function() {
    ModalManager("modal_createpage","open",function(){});
}); //=== end of btn_modal_createpage_open_ Dynamic ==================
// =============================================
// =============================================
$("#btn_modal_createpage_cancel").click(function(e) {
    ModalManager("modal_createpage","cancel",function(){});
}); //=== end of btn_modal_createpage_cancel ==========
// =============================================
$("#btn_modal_createpage_close").click(function(e) {
    ModalManager("modal_createpage","close",function(){});
}); //=== end of btn_modal_createpage_close =============

// ==============================================================
$("#modal_createpage").click(function(e) {
    // prevent modal to trigger parent click action 
    e.stopPropagation();
});
 