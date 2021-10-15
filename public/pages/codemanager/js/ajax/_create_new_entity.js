 function _create_new_entity(sender, callback) {

    var request = {
      sys_ajax_name: 'create_new_entity',
      tabname:sender.mytab 
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }