function obj_to_form(obj, formid, callback) {


    var i = 0;
    obj.forEach((element) => {
        var htmlid = obj[i]['htmlid'];
        var value = obj[i]['value'];
        var htmltype = obj[i]['htmltype'];
        var type = obj[i]['type'];
        var isupdateid = obj[i]['isupdateid'];

        if (isupdateid == 'true') {
            $('#' + formid).attr('data-updateid', value);
        }


        switch (type) {
            case 'field':
                obj_to_form_field(htmlid, htmltype, value, function() {});
                break;
        }


        //alert(htmlid + '=> ' + value + ' as a [' + htmltype + '] For -> ' + type);
        i++;
    })

    $('#' + formid).attr('data-mode', 'update');
    callback.call('done');

}


function obj_to_form_field(htmlid, htmltype, value, callback) {
    //alert('ID:= ' + htmlid + ' ,htmltype:->' + htmltype + ' ,value:=' + value);

    switch (htmltype) {
        case 'text':
            $('#' + htmlid).val(value);
            break;
        case 'select':
            $('#' + htmlid).val(value);
            break;
        case 'select-one':

            break;
        case 'date':

            var fixeddate = date_fix_sql_to_form(value);
            $('#' + htmlid).val(fixeddate);
            break;
        case 'radio':

            break;
        case 'checkbox':

            break;
        default:
            // retobj.field[i].name = element.name;
            // retobj.field[i].value = element.value;
            // retobj.details[element.name].value = element.value;

            break;

    } // end of switch

    callback.call('done');

}