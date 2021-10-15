<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Core\LogManager;
use Storage;
class JSONManager  
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


   

      public function read_json_table($parent_path)
      {
  
          $items = collect([
          ]);
  
          $dir = new \DirectoryIterator($parent_path);
          $fname = '' ; 
          foreach ($dir as $file) {
            $fname = '' ;
              if ($file->isFile()) {
                //  $content = file_get_contents($file->getRealPath());
                  $fname  .=  $file    ; 
                  // =======================================
                  $myjson = $this->read_json_file($parent_path . "/" . $file )  ;  
                  $json_arr_header =  $myjson['header'] ; 
                  $json_arr_header['real_file_name'] =   $fname ; 
                  $json_arr_details =  $myjson['details'] ; 
               
                  $sub_items = collect([
                      ]);
                      foreach ($json_arr_details as $value) {
                          $new_sub_item = (object) [
                              'details' => $value,
                          ];
                          $sub_items->push($new_sub_item);
                      }
                  // =======================================
                    $entity_item = (object) [
                      'entity_file' => $file  ,
                      'sub_items' => $sub_items  ,
                      'header' => $json_arr_header   ,
                  ];
                  $items->push($entity_item);
              }
          }  // end foreach
          //=========================================
  
          return $items ; 
          
      }


      public function read_json_file($file_path)
      {
  
          $path =  $file_path; // ie: /var/www/laravel/app/storage/json/filename.json
          $json = json_decode(file_get_contents($path), true); 
          return $json ; 

      }
  
  



      public function delete_json_file($file_path)
      {
        $this->LOG->print(true, '@@@@@@ JSONManager->delete_json_file: Begin @@@@@@' );
        $this->LOG->print(true, 'file path =>' . $file_path);

        if (!unlink($file_path)) { 
            $this->LOG->print(true, 'file canot be deleted  =>'  );
        } 
        else { 
            $this->LOG->print(true, 'file has been deleted  =>'  );
        } 


         return 'file deleted' ; 
      }

    

}// End of class
 

 