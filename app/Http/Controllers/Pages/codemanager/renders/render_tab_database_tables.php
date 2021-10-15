<?php
namespace App\Http\Controllers\Pages\codemanager\renders;

use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;

class render_tab_database_tables extends MainCore
{

  
    public function main($request)
    {

     
        $items  =  $this->JSONManager->read_json_table(storage_path().'/app/public/coderrocket/database') ; 
        $retarr = array(
       'par' =>   'par'
       );
        return [$retarr, $items];
    
       
    }

    public function read_json_table()
    {

        $items = collect([
        ]);

        $dir = new \DirectoryIterator(storage_path().'/app/public/coderrocket/database');
        $fname = '' ; 
        foreach ($dir as $file) {
            if ($file->isFile()) {
              //  $content = file_get_contents($file->getRealPath());
                $fname .=  $file    ; 

                
                // =======================================
                $myjson = $this->read_json_file('/app/public/coderrocket/database/'.$file )  ;  
                $json_arr_header =  $myjson['header'] ; 
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
                    'header' => $json_arr_header[0]  ,
                ];
                $items->push($entity_item);
            }
        }
        //=========================================

        return $items ; 
        
    }

    public function read_json_file($file_path)
    {

        // $file_path = "/app/public/tasks.json" ;
        $path = storage_path() . $file_path; // ie: /var/www/laravel/app/storage/json/filename.json
        $json = json_decode(file_get_contents($path), true); 

        return $json ; 
    }





    public function get_collection_arr()
    {
     
        $x = 0 ; 
        $dynamic_arr = array();
        while ($x < 10) {
                    $dynamic_arr[] = $x;
            $x++ ; 
        }
        //==============================
        $static_arr = array();
        $static_arr[] = 'companies';
        $static_arr[] = 'reps';
        
 

        return $static_arr;
    }


} // ### End Of Class  ###