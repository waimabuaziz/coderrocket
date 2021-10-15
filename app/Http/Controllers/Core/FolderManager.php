<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Core\LogManager;
use Storage;

class FolderManager
{
    private $LOG;
    public $app_path;
    public $public_path;
    public $resource_path;
    public $routers_path;

    public function __construct()
    {
        $this->LOG = new LogManager();
     
        $this->Local_app_path = app_path(); 
        $this->Local_public_path = public_path(); 
        $this->Local_resource_path = resource_path();
        $this->Local_routers_path = base_path() . '\routes'  ;  


        // ================= set global destination =========================================
        $json = Storage::disk('local')->get('config.json');
        $json = json_decode($json, true);
        $this->app_path =  $json['base_path'] .'\\'. $json['project_path'] . '\app'  ; 
        $this->public_path =  $json['base_path'] .'\\'. $json['project_path'] . '\public'  ; 
        $this->resource_path = $json['base_path'] .'\\'. $json['project_path'] . '\resources'  ; 
        $this->routers_path  = $json['base_path'] .'\\'. $json['project_path'] . '\routes'  ; 
       // ================= End set global destination =========================================


    }

    public function get_folders_subdir($path)
    {
        // $directories = glob($path . '/*', GLOB_ONLYDIR);
        $dirs = array();
        $dir = dir($path);
        while (false !== ($entry = $dir->read())) {
            if ($entry != '.' && $entry != '..') {
                if (is_dir($path . '/' . $entry)) {
                    $dirs[] = $entry;
                }
            }
        }
        return $dirs;
    }

    public function folder_create($sentarr, $reparr)
    {
        # $this->LOG->printlog('FolderManager:folder_create');

        //  $this->LOG->printlog('page_name = ' . $sentarr['page_name']);
        // $this->LOG->printlog('folder_name = ' . $sentarr['folder_name']);
        //  $this->LOG->printlog('dir_type = ' . $sentarr['dir_type']);
        //  $this->LOG->printlog('dist_dir = ' . $sentarr['dist_dir']);
        //    $this->LOG->printlog('overwrite = ' . $sentarr['overwrite']);

        $folder_name = $sentarr['folder_name'];
        $dir_type = $sentarr['dir_type'];
        $overwrite = $sentarr['overwrite'];
        //-----------------------------------------
        # $this->LOG->printlog('page_name:'.$page_name);
        $folder_path = $this->get_folder_path($dir_type);
        #  $this->LOG->printlog('page_name:'.$folder_path);
        //==========================================
        #   $this->LOG->printlog($folder_path . $folder_name) ;
        // $this->LOG->printlog('ret= ' . $this->i_createfolder($folder_path,$folder_name) ) ;
        return $this->i_createfolder($folder_path, $folder_name);
        //==========================================
        //  $this->LOG->printlog('done') ;
    }
    ###########################################################################
    ###########################################################################
    public function i_createfolder($folderpath, $foldername)
    {
        # $this->LOG->printlog('FolderManager:i_createfolder');

        $folder_path = $folderpath . $foldername;

        # $this->LOG->printlog('folder_path =' .  $folder_path);

        if (!file_exists($folder_path)) {

            mkdir($folder_path, 0777, true);
            chmod($folder_path, 0777); // giving permission to file

            //  $this->LOG->printlog('f folder is alreday  existed ! ' );
            return ' folder has been created  in ';
        } else {
            // $this->LOG->printlog('f folder is alreday  existed ! ' );
            return ' folder is alreday  existed ! ';
        }

    }
    ###########################################################################
    ###########################################################################
    public function get_folder_path($dirtype)
    {
        # $this->LOG->printlog('FolderManager:get_folder_path');
        //   $this->LOG->printlog('switch:tiertype => ' . $tiertype);

        switch ($dirtype) {
            case 'controller':
                $dirpath = $this->app_path . '/Http/Controllers/Pages/';
                break;
            case 'core':
                $dirpath = $this->app_path . '/Http/Controllers/Pages/';
                break;
            case 'public':
                $dirpath = $this->public_path . '/Pages' . '/';
                break;
            case 'view':
                $dirpath = $this->resource_path . '/views/Pages' . '/';
                break;
        }

        //     $this->LOG->printlog('return dirpath = ' . $dirpath);
        return $dirpath;
    }

    ###########################################################################
    ###########################################################################

    ###########################################################################
    ###########################################################################

    ###########################################################################
    ###########################################################################

} // End of class
