 function _tab_maps_delete_entity(sender, callback) {

    var request = {
      sys_ajax_name: 'tab_maps_delete_entity',
      file_name:sender,
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }