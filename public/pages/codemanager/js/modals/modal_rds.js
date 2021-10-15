
 $("#btn_modal_rds_submit").click(function(e) {

    _rds(this,function(){
         // alert(this);
     });
 
 }); 
 
 
 //#################  Auto Generated ###########################
 //#################  Events ###########################
  // ==========================================================
  $("#btn_modal_rds_open").click(function(e) {
      ModalManager("modal_rds","open",function(){});
 }); //=== end of btn_modal_rds_open ==========================
 // =============================================
 // =============================================
 $(document).on("click", "#btn_modal_rds_open", function() {
     ModalManager("modal_rds","open",function(){});
 }); //=== end of btn_modal_rds_open_ Dynamic ==================
 // =============================================
 // =============================================
 $("#btn_modal_rds_cancel").click(function(e) {
     ModalManager("modal_rds","cancel",function(){});
 }); //=== end of btn_modal_rds_cancel ==========
 // =============================================
 $("#btn_modal_rds_close").click(function(e) {
     ModalManager("modal_rds","close",function(){});
 }); //=== end of btn_modal_rds_close =============
 
 // ==============================================================
 $("#modal_rds").click(function(e) {
     // prevent modal to trigger parent click action 
     e.stopPropagation();
 });
  