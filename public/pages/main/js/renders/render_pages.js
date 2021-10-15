function render_pages(sender, callback) {

    //ajax pars here 
    var request = {
        page_name: $('#modal_createpage_txt_pagename').val(),
        security_type: $("input[type='radio'][name='modal_createpage_rbt_security_type']:checked").attr('data-val'),
        parameters_count: $("input[type='radio'][name='modal_createpage_rbt_parameters_count']:checked").attr('data-val'),
        _: $("#modal_createpage_chb_overwrite").is(":checked"),
    }

    //====================================================
    // Setting rocket name as function name
    request.sys_render_name = arguments.callee.name;
    // Sending Render 
    Render(request, function () {
         $('#result_render_pages').html(this);
        if (typeof callback === 'function')
         { 
             callback.call(this); 
          }
    })
    // End of AJAX Call ===================================

}