$('#bos_UploadedSheet_IDLink').on('click', function() {

     


    var progressid = 'bos_UploadedSheet_IDProgressbar';
    $('#' + progressid).css('width', 0 + '%');
    $('#' + progressid).html('' + 0 + '%');
    $('#' + progressid).css('display', 'block');

    var fileid = $(this).attr('data-id');

    // start upload file
    var data = {
        elid: fileid,
        ext: '.xls',
        progid: fileid + 'Progressbar',
        dist: 'pages/exceltosql/uploads/',
        after_upload: 'exceltosql',
        ref_file: 'upload_bctarget',  
      
    }
    upload_file(data, function() {
        // get return uploaded temp file name 
        var csvdist = this; //  enter csv dist  
        // alert(csvdist);
        $('#bos_UploadedSheet_ID').attr('data-ret', this)

            document.getElementById("bos_UploadedSheet_ID").value = "";
            var delayInMilliseconds = 1000; //2 second
            setTimeout(function() {
              //  $('#' + progressid).css('display', 'none');
            }, delayInMilliseconds);

    });
    //========= End upload file ============


});