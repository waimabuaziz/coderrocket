 function _migrate_bc_target_result(sender, callback) {

    var request = {
      sys_ajax_name: 'migrate_bc_target_result',
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }