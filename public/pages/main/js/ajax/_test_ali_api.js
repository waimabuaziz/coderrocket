function _test_ali_api( callback) {
 //  var sentdata = '' ;
    
    $.ajaxSetup({
        headers: {
           // 'Authorization': $('meta[name=sent_token]').attr('content'),
        }
    });
    $.ajax({
        type: 'GET',
        url:  'http://192.168.43.185:8082/test'  ,
      //  data: sentdata,
        success: function(data) {
             alert(JSON.stringify(data));

            // alert(JSON.stringify(this.contents.json));
            console.log(data);

            callback.call(data);
        },
        error: function(data) {
            console.log(data);
        }
    })




}