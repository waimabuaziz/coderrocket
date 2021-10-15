function _create_ajax(sender, callback) {

    
    //ajax pars here 
    var request = {
        page_name: $('#frm_create_ajax_txt_pagename').val(),
        ajax_name:  $('#frm_create_ajax_txt_ajaxname').val(),
        ajax_type: $("input[type='radio'][name='frm_create_ajax_rbt_ajax_type']:checked").attr('data-val'),
        ajax_pars: 'object',
        overwrite: $("#frm_create_ajax_chb_overwrite").is(":checked"),
    }

    //====================================================
    // Setting rocket name as function name
  //  request.sys_ajax_name = arguments.callee.name;
    request.sys_rocket_name =  'r_create_ajax' ; 
    // Sending Rocket 
    AjaxRocket(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })
    // End of AJAX Call ===================================

}