
 $("#btn_modal_create_render_submit").click(function(e) {

    _create_render(this,function(){
         // alert(this);
     });
 
 }); 
 
 
 //#################  Auto Generated ###########################
 //#################  Events ###########################
  // ==========================================================
  $("#btn_modal_create_render_open").click(function(e) {
      ModalManager("modal_create_render","open",function(){});
 }); //=== end of btn_modal_create_render_open ==========================
 // =============================================
 // =============================================
 $(document).on("click", "#btn_modal_create_render_open", function() {
     ModalManager("modal_create_render","open",function(){});
 }); //=== end of btn_modal_create_render_open_ Dynamic ==================
 // =============================================
 // =============================================
 $("#btn_modal_create_render_cancel").click(function(e) {
     ModalManager("modal_create_render","cancel",function(){});
 }); //=== end of btn_modal_create_render_cancel ==========
 // =============================================
 $("#btn_modal_create_render_close").click(function(e) {
     ModalManager("modal_create_render","close",function(){});
 }); //=== end of btn_modal_create_render_close =============
 
 // ==============================================================
 $("#modal_create_render").click(function(e) {
     // prevent modal to trigger parent click action 
     e.stopPropagation();
 });
  