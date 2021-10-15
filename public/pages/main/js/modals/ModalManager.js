function ModalManager(id,event,callback)
{
    switch(event)
    {
         case "open" :
            modal_open(id,function(){});
         break;

         case "close" :
            modal_close(id,function(){});
         break;

         case "cancel" :
            modal_cancel(id,function(){});
         break;
 
    }
  
   callback.call('done');
}



function modal_open(id,callback)
{
     //  form_reset('frm_client', function() {
    $('#' + id).modal('show');
    callback.call('done');
     // });
}
function modal_close(id,callback)
{
    $('#' + id).modal('hide');
    callback.call('done');
}
function modal_cancel(id,callback)
{
    $('#' + id).modal('hide');
    callback.call('done');
}
 
 