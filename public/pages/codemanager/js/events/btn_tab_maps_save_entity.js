$(document).on("click", ".btn_tab_maps_save_entity", function () {

    var entityname = $(this).attr('data-entityname');
    var filename = $(this).attr('data-filename');
    var pagename = $(this).attr('data-pagename');
    

    fill_map_json(entityname, pagename, filename, function () {
        var ret_obj = this;
        
       // alert( ret_obj.details[0]['html_input_name']) ;

        _tab_maps_save_entity(ret_obj, function () {
            render_tab_maps_maps('', function () {
            });
        });

    })


});


$(document).on("click", ".btn_tab_maps_rowadd_entity", function () {

    var entityname = $(this).attr('data-entityname');
    var filename = $(this).attr('data-filename');
    var pagename = $(this).attr('data-pagename');
 
       _btn_tab_maps_rowadd_entity(filename, function () {
            render_tab_maps_maps('', function () {
            });
        });

     


});




function fill_map_json(entityname, pagename, filename, callback) {

    var obj = {};
    obj.header = {};
    obj.details = {};


    obj.header.name = entityname;
    obj.header.pagename = pagename;
    // obj.header.name = 'test';
    obj.header.filename = filename;


    var row_count = 0;
    // .entity-request
    //   each start ============================================================
    $('#tb_' + pagename + '_' + entityname + ' tr').each(function () {
        
        var trel = this;
        obj.details[row_count] = {};

        var mycname =  $(trel).attr('data-cname') ;
        // ----- sub loop ---------------------
        $('#tb_' + pagename + '_' + entityname + ' .' + mycname  +  ' .entity-request').each(function () {
          
            var entel = this;
             var data_ftype= $(entel).attr('data-ftype') ;
             var data_fname= $(entel).attr('data-fname') ;

          var inputvalue = '' ; 
                switch(data_ftype)
            {
                case 'text' : 
               // obj.details[row_count][data_fname] = $(entel).html().trim() ;   
                inputvalue= $(entel).html().trim() ; 
                break;
                case 'select' : 
              //  obj.details[row_count][data_fname] =  entel.options[entel.selectedIndex].text ; 
                inputvalue= $(entel).val() ;  
                break;
            }
            obj.details[row_count][data_fname] = inputvalue ; 
         //   alert('.' + mycname  +  ' ' + "\n" + ' ,fname =>' +data_fname + "\n" +' ,ftype =>' +  data_ftype + "\n" +' ,inputvalue =>' + inputvalue) ; 


        });
        // ----- End sub loop ---------------------
      
        row_count++;

    }); // end each ==================================================================

    obj.header.rows_count = row_count;
    callback.call(obj);
}