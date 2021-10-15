 function _$_REPLACE_AJAXNAME_$(sender, callback) {

    var request = {
      sys_ajax_name: '$_REPLACE_AJAXNAME_$',
    }
    
    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }