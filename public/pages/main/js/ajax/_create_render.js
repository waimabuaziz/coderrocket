function _create_render(sender, callback) {

    
    //ajax pars here 
    var request = {
        page_name: $('#frm_create_render_txt_pagename').val(),
        render_name:  $('#frm_create_render_txt_rendername').val(),
        render_type: $("input[type='radio'][name='frm_create_render_rbt_render_type']:checked").attr('data-val'),
        render_pars: 'object',
        overwrite: $("#frm_create_render_chb_overwrite").is(":checked"),

    }
 
    //====================================================
    // Setting rocket name as function name
  //  request.sys_ajax_name = arguments.callee.name;
    request.sys_rocket_name =  'r_create_render' ; 
    // Sending Rocket 
    AjaxRocket(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })
    // End of AJAX Call ===================================

}