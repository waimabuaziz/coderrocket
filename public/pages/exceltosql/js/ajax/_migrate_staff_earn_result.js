 function _migrate_staff_earn_result(sender, callback) {

    var request = {
      sys_ajax_name: 'migrate_staff_earn_result',
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }