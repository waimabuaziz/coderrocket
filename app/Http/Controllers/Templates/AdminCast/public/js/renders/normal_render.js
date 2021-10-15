function $_REPLACE_RENDERNAME_$(sender, callback) {

    //render pars here 
    var request = {
        par_name:  'par' ,
    }

    //====================================================
    // Setting rocket name as function name
    request.sys_render_name = arguments.callee.name;
    // Sending Render 
    Render(request, function () {
         $('#result_$_REPLACE_RENDERNAME_$').html(this);
        if (typeof callback === 'function')
         { 
             callback.call(this); 
          }
    })
    // End of AJAX Call ===================================

}