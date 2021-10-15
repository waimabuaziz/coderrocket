 function _tab_maps_save_entity(obj, callback) {

    var request = {
      sys_ajax_name: 'tab_maps_save_entity',
      obj:obj,
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }