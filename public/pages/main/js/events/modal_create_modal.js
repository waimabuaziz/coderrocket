
 $("#btn_modal_create_modal_submit").click(function(e) {

   _create_modal(this,function(){
        // alert(this);
    });

}); 


//#################  Auto Generated ###########################
//#################  Events ###########################
 // ==========================================================
 $("#btn_modal_create_modal_open").click(function(e) {
     ModalManager("modal_create_modal","open",function(){});
}); //=== end of btn_modal_create_modal_open ==========================
// =============================================
// =============================================
$(document).on("click", "#btn_modal_create_modal_open", function() {
    ModalManager("modal_create_modal","open",function(){});
}); //=== end of btn_modal_create_modal_open_ Dynamic ==================
// =============================================
// =============================================
$("#btn_modal_create_modal_cancel").click(function(e) {
    ModalManager("modal_create_modal","cancel",function(){});
}); //=== end of btn_modal_create_modal_cancel ==========
// =============================================
$("#btn_modal_create_modal_close").click(function(e) {
    ModalManager("modal_create_modal","close",function(){});
}); //=== end of btn_modal_create_modal_close =============

// ==============================================================
$("#modal_create_modal").click(function(e) {
    // prevent modal to trigger parent click action 
    e.stopPropagation();
});
 