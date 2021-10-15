$('#frm_create_ajax').on("click", ".i_remove_per", function () {
   
     var whichtr = $(this).closest("tr");
    whichtr.remove();

}); //=== end   ==================

$('#frm_create_ajax .i_remove_per').on('click', function () {

    var whichtr = $(this).closest("tr");
    whichtr.remove();
 
});

$('#btn_add_ajax_par').on('click', function () {

    create_ajax_add_par();

});

 function create_ajax_add_par()
 {
    var i_remove = '<i class="i_remove_per far fa-trash-alt"></i> ';
    var parname = $('#frm_create_ajax_txt_parname').val();
    var parvalue =  $('#frm_create_ajax_txt_parvalue').val();
    var tr_content = '<tr> <td> ' + parname  + '  </td>  <td> ' + parvalue  + ' </td>  <td>  ' + i_remove  + '  </td>   </tr>';
    $('#tb_create_ajax_pars tr:last').after(tr_content);

    $('#frm_create_ajax_txt_parname').val('');
    $('#frm_create_ajax_txt_parvalue').val('');

 }

 $('#frm_create_ajax_txt_parname').keyup(function(e){
    if(e.keyCode == 13)
    {
        $('#frm_create_ajax_txt_parvalue').select();
        $('#frm_create_ajax_txt_parvalue').focus();

    }
});

$('#frm_create_ajax_txt_parvalue').keyup(function(e){
    if(e.keyCode == 13)
    {
         create_ajax_add_par();
         $('#frm_create_ajax_txt_parname').select();
         $('#frm_create_ajax_txt_parname').focus();
    }
});


 
$('#btn_modal_create_ajax_submit').on('click', function () {

    frm_create_ajax_submit() ; 

});

function frm_create_ajax_submit()
{

    _create_ajax('',function(){
            //  alert('doen');
    });



}

 