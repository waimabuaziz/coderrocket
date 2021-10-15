function form_to_obj(formid) {

    var retobj = {};
    retobj.header = {};
    retobj.details = {};

    retobj.header.name = 'formtoobj';
    retobj.header.mode = $('#' + formid).attr('data-mode');
    retobj.header.updateid = $('#' + formid).attr('data-updateid');

     
    // var elements = document.querySelectorAll("#frm_accountindex input[type=text]")
    var elements = document.querySelectorAll("#" + formid + " .request")

    for (var i = 0, element; element = elements[i++];) {

        // ----- form_to_ob will be directed by request type ---
        var request_type = $(element).attr('data-type');
        var request_htmltype = $(element).attr('data-htmltype');
        var request_return = $(element).attr('data-ret');

        retobj.details[element.name] = {};
        retobj.details[element.name].type = request_type;

        //alert(element.name);

        switch (request_type) {
            case 'field':
                retobj.details[element.name].value = form_to_obj_field(element);
                // alert(form_to_obj_field(element));
                break;
            case 'attachments':

                break;
            case 'files':

                break;
            case 'images':

                break;
            case 'objects':

                break;
            case 'csv':
                retobj.details[element.name].value = form_to_obj_csv(element);
                break;
            case 'excell':

                break;
            case 'img-view':
                retobj.details[element.name].value = form_to_obj_imgview(element);
                break;
            case 'table':

                break;
            case 'jexcell':

                break;
            default:
                // same as field
                break;
        }
        // -------------------------------------------------------

    } //end of for loop

    return retobj;
}


function form_to_obj_field(element) {

    var request_htmltype = $(element).attr('data-htmltype');
    //  alert(element.name + ':->' + request_htmltype + '->' + element.value);

    switch (request_htmltype) {
        case 'excel':
            var val = $('#' + element.id).attr("data-ret");
            return val;
            break;
        case 'text':
            return element.value;
            break;
        case 'select':
            return element.value;
            break;
        case 'select-one':
            return element.value;
            break;
        case 'date':
            var newdate = date_fix_form_to_sql(element.value);
            return newdate;
            break;
        case 'radio':
            if (element.checked == true) {
                var val = $('#' + element.id).attr("data-value");
                return val;
            }
            break;
        case 'checkbox':
            if (element.checked == true) {
                var val = 1;
                return val;
            } else {
                var val = 0;
                return val;
            }
            break;
        default:
            // retobj.field[i].name = element.name;
            // retobj.field[i].value = element.value;
            // retobj.details[element.name].value = element.value;

            break;

    } // end of switch


}



function form_to_obj_imgview(element) {

    /*
    |   upload image to temp folder and give it a uniqe name 
    |   get returne name of uploaded file
    |   view the uploaded image with random name on the viewer
    |   return the random name to be inserted in the database 
    |
    */

    var imgsrc = $('#' + element.id).attr('data-ret');
    return imgsrc;

}

function form_to_obj_csv(element) {


    var csvobj = {};
    csvobj.header = {};
    csvobj.details = {};

    csvobj.header.ext = 'csv';
    csvobj.details.uploadedref = '1231ojo123';


    return csvobj;

}