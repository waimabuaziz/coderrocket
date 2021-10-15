$("#btn_modal_create_entity_submit").click(function (e) {

    var formid = $(this).attr('data-formid');
    _form_submit(formid, function () {

        render_tab_maps_maps('', function () {
            Modal_Close('modal_create_entity') ; 
        });

    });

});



function _form_submit(formid, callback) {

    myobj = form_to_obj(formid);
    // alert(JSON.stringify(myobj));


    var request = {
        sys_ajax_name: 'submit_frm_to_obj',
        sys_map_name: $('#' + formid).attr('data-map'),
        obj: myobj,
    }

    Ajax(request, function () {
        if (typeof callback === 'function') { callback.call(this); }
    })



}