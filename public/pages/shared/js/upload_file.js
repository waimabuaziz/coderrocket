function upload_file(sentdata, callback) {
    // #1 
    var elid = sentdata.elid;
    var ext = sentdata.ext;
    var progbarid = sentdata.progid;
    var dist = sentdata.dist;
    var ref_file = sentdata.ref_file;
    var after_upload = sentdata.after_upload;
 

    let FileUpload_1 = document.getElementById(elid);
    FileUpload_1.onchange = function() {
        //================================================
        var file_data = $('#' + elid).prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('ext', ext);
        form_data.append('dist', dist);
        form_data.append('ref_file', ref_file);
        form_data.append('after_upload', after_upload);
        api_ajax_uploadfile('ajax_file_upload', form_data, elid, progbarid, function() {
            callback.call(this);
        });
        //================================================
    }

}

function api_ajax_uploadfile($ajaxname, sentdata, inputid, progressid, callback) {
    // #2 
    var file = document.getElementById(inputid).files[0];
    var filename = file.name;
    $('#' + progressid + '-filename').html(filename);
    $('#' + progressid).html('');
    $('#' + progressid).attr('aria-valuenow', 0);
    $('#' + progressid).css('width', '0%');

    var mainurl = G_mainurl;
    // alert(mainurl + '/api/' + $ajaxname);

    $.ajaxSetup({
        headers: {
            'Authorization': $('meta[name=sent_token]').attr('content'),
        }
    });
    $.ajax({
        xhr: function() { // custom xhr (is the best)

            var xhr = new XMLHttpRequest();
            var total = 0;

            // Get the total size of files
            $.each(document.getElementById(inputid).files, function(i, file) {
                total += file.size;
            });

            // Called when upload progress changes. xhr2
            xhr.upload.addEventListener("progress", function(evt) {
                // show progress like example
                var loaded = (evt.loaded / total).toFixed(2) * 100; // percent
                $('#' + progressid).html('Uploading... ' + loaded + '%');
                $('#' + progressid).attr('aria-valuenow', loaded);
                if (loaded > 100) {
                    loaded = 100;
                }
                $('#' + progressid).css('width', loaded + '%');
                if (loaded == 100) {
                    $('#' + progressid).html('' + loaded + '%');
                }

            }, false);

            return xhr;
        },
        type: 'POST',
        url: mainurl + '/api/' + $ajaxname,
        processData: false,
        contentType: false,
        data: sentdata,
        success: function(data) {
            //alert(data.ret);
            callback.call(data.ret);
        },
        error: function(data) {
            console.log(data);
        }
    })

}