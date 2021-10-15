<?php
namespace App\Http\Controllers\Core\CRUD;
use App\Http\Controllers\Core\LogManager;
use Storage;
class Crud_csv
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

      }
 
 
}// End of class
 

 