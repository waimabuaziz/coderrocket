// Set all defaults values here 
var G_mainurl = $('meta[name=APP_URL]').attr('content');
var G_local_sender = '$_REPLACE_PAGENAME_$';
var G_obj = {};
var last_url_segment = '';
var G_projcet_destination = '';


// ##############################
$(document).ready(function () {



    switch (URLParameterCount()) {

        case 0:
            // Calling all init from here after default settings 
            Init(function () {
                // add here any init callback if exist 
            })
            break;
        case 1:
            // Calling all init from here after default settings 
            Init_bypar_one(last_url_segment, function () {
                // add here any init callback if exist 
            })
            break;
        case 2:
            // Calling all init from here after default settings 
            Init_bypar_tow(function () {
                // add here any init callback if exist 
            })
            break;

        case 3:
            // Calling all init from here after default settings 
            Init_bypar_three(function () {
                // add here any init callback if exist 
            })
            break;
    }






}); // *** End of document ready ***


function URLParameterCount() {
    var sPageURL = window.location.href;
    var pure_url = sPageURL.replace(G_mainurl, "");
    var parcount = (pure_url.split("/").length - 1) - 1;
    last_url_segment = sPageURL.substring(sPageURL.lastIndexOf('/') + 1);

    return parcount;
}