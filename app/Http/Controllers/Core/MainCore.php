<?php

namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Redirect;
use App\Models\SYS_FileManager; 
use App\Http\Controllers\Core\SQLManager;
use App\Http\Controllers\Core\LogManager;
use App\Http\Controllers\Core\CrudManager;
use App\Http\Controllers\Core\RocketManager;
use App\Http\Controllers\Core\FolderManager;
use App\Http\Controllers\Core\JSONManager;
use Storage;

class MainCore extends Controller
{

   // Public $PAGENAME ;
    Public $SQL ; 
    Public $CRUD;
    Public $LOG ;
    Public $Rocket;
    Public $FolderManager;
    Public $JSONManager;
 
    public function __construct()
    {
        //$this->PAGENAME =  array_slice(explode('\\', __NAMESPACE__), -1)[0] ;
         $this->SQL = new SQLManager() ; 
         $this->CRUD = new CrudManager() ;  
         $this->LOG = new LogManager() ;  
        $this->Rocket = new RocketManager() ;  
        $this->FolderManager = new FolderManager() ;  
        $this->JSONManager = new JSONManager() ; 

    }
    
 

        public function submit_frm_to_obj($request)
        {
            $this->LOG->print(true, '@@@@@@ MainCore->submit_frm_to_obj: Begin @@@@@@');
            $namespace =  __NAMESPACE__;
             $crud = $this->CRUD;
             $ret =  $crud->save_obj($request) ; 
          return $ret ; 
        }

 
}