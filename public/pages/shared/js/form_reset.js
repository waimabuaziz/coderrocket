function form_reset(formid, callback) {


    var elements = document.querySelectorAll("#" + formid + " .request")
    for (var i = 0, element; element = elements[i++];) {

        var request_htmltype = $(element).attr('data-htmltype');
        // alert(element.id);

        switch (request_htmltype) {
            case 'text':
                $('#' + element.id).val('');

                break;
            case 'select':
                $('#' + element.id).val('-1');

                break;
            case 'select-one':


                break;
            case 'date':

                $('#' + element.id).val('');

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

        }



    } // end of foreach

    $('#' + formid).attr('data-mode', 'insert');
    $('#' + formid).attr('data-updateid', '0');

    $('.lbl-val').text(''); //reset all validation labels 

    callback.call('done');


}