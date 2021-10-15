
function _get_project_destination() {
    // AJAX Call starts here =====
    var request = {
      sys_ajax_name: 'get_project_destination',
      // retobj: retobj,
    }
    Ajax(request, function () {
      //   alert(this);
  
      G_projcet_destination = this;
     // alert(G_projcet_destination);
  
  
    })
    // End of AJAX Call ============
  
  }