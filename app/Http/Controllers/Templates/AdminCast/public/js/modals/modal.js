
 $("#btn_modal_$_REPLACE_PURENAME_$_submit").click(function(e) {

    _$_REPLACE_PURENAME_$(this,function(){
         // alert(this);
     });
 
 }); 
 
 
 //#################  Auto Generated ###########################
 //#################  Events ###########################
  // ==========================================================
  $("#btn_modal_$_REPLACE_PURENAME_$_open").click(function(e) {
      ModalManager("modal_$_REPLACE_PURENAME_$","open",function(){});
 }); //=== end of btn_modal_$_REPLACE_PURENAME_$_open ==========================
 // =============================================
 // =============================================
 $(document).on("click", "#btn_modal_$_REPLACE_PURENAME_$_open", function() {
     ModalManager("modal_$_REPLACE_PURENAME_$","open",function(){});
 }); //=== end of btn_modal_$_REPLACE_PURENAME_$_open_ Dynamic ==================
 // =============================================
 // =============================================
 $("#btn_modal_$_REPLACE_PURENAME_$_cancel").click(function(e) {
     ModalManager("modal_$_REPLACE_PURENAME_$","cancel",function(){});
 }); //=== end of btn_modal_$_REPLACE_PURENAME_$_cancel ==========
 // =============================================
 $("#btn_modal_$_REPLACE_PURENAME_$_close").click(function(e) {
     ModalManager("modal_$_REPLACE_PURENAME_$","close",function(){});
 }); //=== end of btn_modal_$_REPLACE_PURENAME_$_close =============
 
 // ==============================================================
 $("#modal_$_REPLACE_PURENAME_$").click(function(e) {
     // prevent modal to trigger parent click action 
     e.stopPropagation();
 });
  