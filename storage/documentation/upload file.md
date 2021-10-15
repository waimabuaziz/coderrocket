<span style="font-size:18px;font-weight:bold;color:#006bb3">
 How to upload a file in CoderRocket Using AJAX Lib ?
</span>

## First start with HTML:
add this element in HTML page 
you need Upload elements with progressbar elements.

<span style="font-size:14px;font-weight:bold;color:#80ccff">
 Upload Filw HTML Elements:
</span>

``` html
 <!-- upload input  -->
                <label id="[UploadedSheet_IDLink]" data-id="[UploadedSheet_IDLink]" for="[UploadedSheet_ID]"
                    class="btn btn-outline-info"> Upload File </label>
                <input data-htmltype="[excel]" type="file" name="[UploadedSheet_ID]" id="[UploadedSheet_ID]"
                    data-type="field" data-ret="" class="request inputfile">
                <!--   end of upload input      -->
```

<span style="font-size:14px;font-weight:bold;color:#80ccff">
Progressbar Elements:
</span>

``` html
 <!-- upload input  -->
              <!-- progress-bar -->
                <div class="progress mg-t-5 " style="height:20px;line-height:20px;">
                    <div id="[UploadedSheet_IDProgressbar]" class="progress-bar progress-bar-striped  bg-success "
                        role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                        style="display:none;font-size:11px;">
                    </div>
                </div> <!-- end of progress-bar -->
                <!--   end of upload input      -->
```

<span style="color:black;font-style:italic;background-color:orange"> 
All parameters within <span style="background-color:silver;padding:0px 10px;">[..]</span> you have to change them with your own names for id's and should have to be the same in their exact places 
 </span>

<br/><br/>

<span style="font-size:25px;font-weight:bold;color:#cccc00">
Javascript Code
</span>

now you have to add this event to the click event of the element 
<span style="color:#006bb3;background-color:skyblue;padding:0px 10px;" >  [UploadedSheet_IDLink]  </span>

 
<span style="font-size:14px;color:#cccc00">
JS click event 
</span>

``` javascript
$('#UploadedSheet_IDLink').on('click', function() {

    $('.lbl-val').text(''); //reset all validation labels 

    var progressid = 'UploadedSheet_IDProgressbar';
    $('#' + progressid).css('width', 0 + '%');
    $('#' + progressid).html('' + 0 + '%');
    $('#' + progressid).css('display', 'block');

    var fileid = $(this).attr('data-id');
    // start upload file
    var data = {
        elid: fileid,
        ext: '.xls',
        progid: fileid + 'Progressbar',
        dist: 'pages/[pagename]/[uploads folder name]/',
    }
    upload_file(data, function() {
        // get return uploaded temp file name 
        var csvdist = this; //  enter csv dist  
        // alert(csvdist);
        $('#UploadedSheet_ID').attr('data-ret', this)

            document.getElementById("UploadedSheet_ID").value = "";
            var delayInMilliseconds = 1000; //2 second
            setTimeout(function() {
                $('#' + progressid).css('display', 'none');
            }, delayInMilliseconds);
    });
    //========= End upload file ============
});
```

 
<br />
<span style="color:yellow;font-size:14px;font-weight:bolder">
  Required Libraries and functions:
 </span>
  <br />

<span style="color:blue;font-style:italic;background-color:lightgreen"> 
    you should have these functions in your shared file or any wherer you want:
 </span>
   <br />

  <br />
<span style="color:#cccc00;font-size:14px;">
   upload_file.js
  </span>
<br />

``` javascript 
function upload_file(sentdata, callback) {
    // #1 
    var elid = sentdata.elid;
    var ext = sentdata.ext;
    var progbarid = sentdata.progid;
    var dist = sentdata.dist;
    var dbupdate = sentdata.dbupdate;

    let FileUpload_1 = document.getElementById(elid);
    FileUpload_1.onchange = function() {
        //================================================
        var file_data = $('#' + elid).prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('ext', ext);
        form_data.append('dist', dist);
        form_data.append('dbupdate', dbupdate);
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
```



<br/><br/>

<span style="font-size:25px;font-weight:bold;color:#336699">
Controller Code [PHP]
</span>

in your controller you need this function to work :

<span style="color:#006699;font-size:14px;">
  required imports 
  </span>

``` php
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PHPExcel;
use PHPExcel_IOFactory;
use Storage;
```

<span style="color:#006699;font-size:14px;">
  upload_file function 
</span>

``` php
 public function ajax_file_upload(Request $request)
      {
      //   $newfilename = $request->newfilename ; 
          $myret = 'NO ' ; 
         
          $ext = $request->ext;
          $userid = 1 ; 
          $newfilename  = md5(uniqid($userid, true)) . $ext ; 
          $dist = $request->dist;
          // get the original file name
        if($request->hasFile('file')) {
        //  $myret = $newfilename  ;
          $file = $request->file('file');
          //you also need to keep file extension as well
          $name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
          //using the array instead of object
        $name = $newfilename ; 
        $dir = public_path().'/'.$dist; ; 
        $filesize = $file->getSize();
  
        $request->file('file')->move($dir, $name);
      }

      // ============ managing existed file name =================
      $originalfilename = $file->getClientOriginalName();
      $myfilename = pathinfo($originalfilename, PATHINFO_FILENAME);
      $myextension = pathinfo($originalfilename, PATHINFO_EXTENSION);
      $myfullfilename = $myfilename . '.' . $myextension  ; 
      // ============ End of managing existed file name =================
          return response()->json(['ret' => $dist.$newfilename ]);  
      }
  
  

```

 