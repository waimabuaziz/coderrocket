function Ajax(sentdata, callback) {
    var mainurl = G_mainurl;
     

    sentdata.sys_page_name = G_local_sender;
    //sentdata.sys_ajax_name = sentdata.ajax_name;
   
  //   alert(  sentdata.sys_page_name ) ; 

    $.ajaxSetup({
        headers: {
            'Authorization': $('meta[name=sent_token]').attr('content'),
        }
    });
    $.ajax({
        type: 'POST',
        url: mainurl + '/api/' + 'Main_Ajax',
        data: sentdata,
        success: function(data) {
            // alert(data.ret);
            callback.call(data.ret);
        },
        error: function(data) {
            console.log(data);
        }
    })

}

function Render(sentdata, callback) {
    var mainurl = G_mainurl;
     
    sentdata.sys_page_name = G_local_sender;
   //  alert( G_local_sender ) ; 

    $.ajaxSetup({
        headers: {
            'Authorization': $('meta[name=sent_token]').attr('content'),
        }
    });
    $.ajax({
        type: 'POST',
        url: mainurl + '/api/' + 'Main_Render',
        data: sentdata,
        success: function(data) {
            // alert(data.ret);
            callback.call(data.ret);
        },
        error: function(data) {
            console.log(data);
        }
    })

}


function AjaxRocket(sentdata, callback) {
    var mainurl = G_mainurl;
    sentdata.sys_page_name = G_local_sender;
  //  alert( G_local_sender ) ; 

    $.ajaxSetup({
        headers: {
            'Authorization': $('meta[name=sent_token]').attr('content'),
        }
    });
    $.ajax({
        type: 'POST',
        url: mainurl + '/api/' + 'Main_AjaxRocket',
        data: sentdata,
        success: function(data) {
            // alert(data.ret);
            callback.call(data.ret);
        },
        error: function(data) {
            console.log(data);
        }
    })

}