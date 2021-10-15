 function _create_modal(sender, callback) {

    var request = {
      page_name: $('#frm_create_modal_txt_pagename').val(),
      pure_name:  $('#frm_create_modal_txt_purename').val(),
      modal_type: $("input[type='radio'][name='frm_create_modal_rbt_modal_type']:checked").attr('data-val'),
      overwrite: $("#frm_create_modal_chb_overwrite").is(":checked"),
    }

    request.sys_rocket_name =  'r_create_modal' ; 
    AjaxRocket(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })

  }