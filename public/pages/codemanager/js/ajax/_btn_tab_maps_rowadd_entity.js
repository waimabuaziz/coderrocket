 function _btn_tab_maps_rowadd_entity(filename, callback) {

    var request = {
      sys_ajax_name: 'btn_tab_maps_rowadd_entity',
      filename:filename,
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }