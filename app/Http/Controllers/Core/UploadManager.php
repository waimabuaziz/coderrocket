<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Core\ExcelManager;
use App\Http\Controllers\Core\LogManager;
use Illuminate\Http\Request;
use Storage;

class UploadManager
{
    private $LOG;
    private $ExcelManager;

    public $app_path;
    public $public_path;
    public $resource_path;
    public $routers_path;

    public $Local_app_path;
    public $Local_public_path;
    public $Local_resource_path;
    public $Local_routers_path;

    public function __construct()
    {
        $this->LOG = new LogManager();
        $this->ExcelManager = new ExcelManager();

        $this->Local_app_path = app_path();
        $this->Local_public_path = public_path();
        $this->Local_resource_path = resource_path();
        $this->Local_routers_path = base_path() . '\routes';

        // ================= set global destination =========================================
        $json = Storage::disk('local')->get('config.json');
        $json = json_decode($json, true);
        $this->app_path = $json['base_path'] . '\\' . $json['project_path'] . '\app';
        $this->public_path = $json['base_path'] . '\\' . $json['project_path'] . '\public';
        $this->resource_path = $json['base_path'] . '\\' . $json['project_path'] . '\resources';
        $this->routers_path = $json['base_path'] . '\\' . $json['project_path'] . '\routes';
        // ================= End set global destination =========================================

    }

    public function ajax_file_upload(Request $request)
    {
        //   $newfilename = $request->newfilename ;
        $myret = 'NO ';

        $ext = $request->ext;
        $ref_file = $request->ref_file;
        $after_upload = $request->after_upload;

      

        $userid = 1;
        $newfilename = md5(uniqid($userid, true)) . $ext;
        $dist = $request->dist;
        // get the original file name
        if ($request->hasFile('file')) {
            //  $myret = $newfilename  ;
            $file = $request->file('file');
            //you also need to keep file extension as well
            $name = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            //using the array instead of object
            $name = $newfilename;
            $dir = public_path() . '/' . $dist;
            $filesize = $file->getSize();

            $request->file('file')->move($dir, $name);
        }

        // ============ managing existed file name =================
        $originalfilename = $file->getClientOriginalName();
        $myfilename = pathinfo($originalfilename, PATHINFO_FILENAME);
        $myextension = pathinfo($originalfilename, PATHINFO_EXTENSION);
        $myfullfilename = $myfilename . '.' . $myextension;
        // ============ End of managing existed file name =================


      

        // ============ calls for after_upload paramaeter =================
        // what to do with the file after its uploaded , if nothing will do nothing 
        switch ($after_upload) {
            case 'exceltosql':
            
                $this->ExcelManager->read_excel($newfilename, $ref_file);
                break;
                case 'nothing':
                // do nothing
                  break;
        }
        // ============ calls for after_upload paramaeter =================

        return response()->json(['ret' => $dist . $newfilename]);
    }

} // End of class
