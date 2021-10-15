function _create_page(sender, callback) {

    
    //ajax pars here 
    var request = {
        page_name: $('#modal_createpage_txt_pagename').val(),
        security_type: $("input[type='radio'][name='modal_createpage_rbt_security_type']:checked").attr('data-val'),
        parameters_count: $("input[type='radio'][name='modal_createpage_rbt_parameters_count']:checked").attr('data-val'),
        overwrite: $("#modal_createpage_chb_overwrite").is(":checked"),
    }

    //====================================================
    // Setting rocket name as function name
  //  request.sys_ajax_name = arguments.callee.name;
    request.sys_rocket_name =  'r_create_page' ; 
    // Sending Rocket 
    AjaxRocket(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })
    // End of AJAX Call ===================================

}