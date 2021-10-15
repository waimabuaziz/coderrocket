function _$_REPLACE_AJAXNAME_$(sender, callback) {

    var request = {
      parname: '',
    }

    request.sys_rocket_name =  'r_create_ajax' ; 
    AjaxRocket(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }