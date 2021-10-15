<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Core\LogManager;
use App\Http\Controllers\Core\CRUD\Crud_mysql;
use App\Http\Controllers\Core\CRUD\Crud_json;
use App\Http\Controllers\Core\CRUD\Crud_csv;
use App\Http\Controllers\Core\CRUD\Crud_excel;
use App\Http\Controllers\Core\CRUD\Crud_txt;
use Storage;
class CrudManager  
{
  private $LOG ;
    public  $app_path;
    public  $public_path;
    public  $resource_path;
    public  $routers_path;

    public  $Local_app_path;
    public  $Local_public_path;
    public  $Local_resource_path;
    public  $Local_routers_path;

    public $Crud_mysql;
    public $Crud_json;
    public $Crud_csv;
     public $Crud_excel; 
     public $Crud_txt;



    public function __construct()
    {
        $this->LOG = new LogManager() ;

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

       $this->Crud_mysql = new Crud_mysql();
       $this->Crud_json = new Crud_json();
       $this->Crud_csv = new Crud_csv();
       $this->Crud_excel = new Crud_excel();
       $this->Crud_txt = new Crud_txt();

      }
 

      function save_obj($request)
      {
      // =========Log Stuff ===========
       $logstate = true;
       // ==============================
       $this->LOG->print($logstate, '@@@@@@ CrudManager->save_obj: Begin @@@@@@');
        $page_name  = $request->sys_page_name ; 
        $map_name = $request->sys_map_name ; 
        $mapnamespace = 'App\Http\Controllers\Pages\\' . $page_name . '\maps\\' . $map_name    ; 
      
       
         $sent_obj = $request->obj ; 
         $map = new  $mapnamespace ; 
        // $this->LOG->printlog('primary key => ' .  $mapnamespace )   ; 

            //  Filling Data Array ==========
                $arr_data = array();
                $arr_data =$map->content ; 
            //  Filling Data Array ==========
     
        $sent_mode = $sent_obj['header']['mode'] ; 
        $sent_updateid = $sent_obj['header']['updateid'] ; 
    
        switch($sent_mode)
        {
            case 'insert' :
                // send  data to execute functions 
                return $this->insert_obj($arr_data,$map,$sent_obj) ; 
            break;
            case 'update' :
                // send  data to execute functions 
                return $this->update_obj($arr_data,$map, $sent_obj,$sent_updateid) ; 
            break;
            case 'delete' :
                // send  data to execute functions 
                return $this->delete_obj($arr_data,$map, $sent_obj,$sent_updateid) ; 
            break;
        }

        return 'save_obj  from CrudManager , Page_name = ' .  $sent_updateid   ;

      }
    


      function insert_obj($array_data , $map,$sent_obj)
      {
       
            $crud_type =  $map->crud_type ; 
         
            switch($crud_type)
            {
                case 'mysql' :
                     return $this->Crud_mysql->insert_row($array_data,$map,$sent_obj) ; 
                break;
                case 'csv' :
                    //  return $this->update_obj($arr_data,$map,$sent_updateid) ; 
                break;
                case 'json' :
                    return $this->Crud_json->create($array_data,$map,$sent_obj) ; 
                break;
                case 'excel' :
                    //  return $this->delete_obj($arr_data,$map,$sent_updateid) ; 
                break;
            }





            return 'insert_obj -> ' . $crud_type ; 
      }

      
      function update_obj($array_data , $map ,$updateid)
      {




        return 'update_obj' ; 
      }


            
      function delete_obj($array_data ,$map,$updateid)
      {




        return 'delete_obj' ; 
      }

}// End of class
 

 