<?php
namespace App\Http\Controllers\Pages\codemanager\ajax;
use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;

class btn_tab_maps_rowadd_entity extends MainCore
{

    public function main($request)
    {
        $logtstate = true ; 
        $this->LOG->print($logtstate, '@@@@@@ Ajax/btn_tab_maps_rowadd_entity->main() :Begin @@@@@@' );
        $sent_file_name = $request->filename ; 
        
        
          $json = $this->JSONManager->read_json_file(storage_path().'/app/public/coderrocket/entities/'. $sent_file_name) ;   
             
          $this->LOG->print($logtstate, 'get json file' );
        
          $index = 0 ; 
            foreach($json["details"] as $item) { //foreach element in $arr
                $index ++ ; 
            }
            $this->LOG->print($logtstate, '  array index  ' .  $index  );

            if($index > 0 )
            {
                $sql_is_key = 'false' ;
                $sql_is_auto_increment = 'false' ;
                $sql_allow_null = 'true';
                $sql_is_updateid = 'false' ; 
                $conf_is_inserted = 'true' ;
                $conf_is_updated = 'true' ; 
            }
            else{
                $sql_is_key = 'true' ;
                $sql_is_auto_increment = 'true' ;
                $sql_allow_null = 'false';
                $sql_is_updateid = 'true' ; 
                $conf_is_inserted = 'false' ;
                $conf_is_updated = 'false' ; 
            }


          $json["details"][$index] = [
              "sql_field_name" => "none",
              "sql_datatype"=> "varchar",
              "sql_datasize"=> "200",
              "sql_defaultvalue"=> "-",
              "sql_is_key" => $sql_is_key,
              "sql_is_auto_increment" => $sql_is_auto_increment,
              "sql_allow_null"=>  $sql_allow_null,
              "sql_is_updateid" => $sql_is_updateid,
              "html_input_name" => "Col_" . strval($index + 1 ) ,
              "html_input_id" => "Col_" . strval($index + 1 )  ,
              "html_input_type" => "txt",
              "html_obj_type" => "field",
              "conf_is_const" => "false",
              "conf_const_val" => "0",
              "conf_insert_mode" => "direct",
              "conf_is_subkey" => "false",
              "conf_sub_map" => "",
              "conf_is_inserted" =>  $conf_is_inserted,
              "conf_is_retrived" => "true",
              "conf_is_updated" => $conf_is_updated,
          ];
             
          $this->LOG->print($logtstate, 'fill details array' );


          $newJsonString = json_encode($json, JSON_PRETTY_PRINT);
          file_put_contents(base_path('Storage/app/public/coderrocket/entities/'  . $sent_file_name . ''), stripslashes($newJsonString));

          $this->LOG->print($logtstate, 'saved' );
          
        return  'btn_tab_maps_rowadd_entity'    ; 

    }

} // ### End Of Class  ###