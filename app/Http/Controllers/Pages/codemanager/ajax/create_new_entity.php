<?php
namespace App\Http\Controllers\Pages\codemanager\ajax;
use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;

class create_new_entity extends MainCore
{

    public function main($request)
    {
 
        $tabname = $request->tabname ; 
             
          $data =[];
         
          $data["header"]=  [
            "Name"=> "map_company",
            "EntityType"=> "HTML_Form_Table",
            "EntityType_BGC"=> "lightgreen",
            "EntityType_Color"=> "dimgray",
            "Status"=> "un-Sync",
            "Status_BGC"=> "dimgray",
            "Status_Color"=> "white",
            "form_id"=> "frm_company",
            "sql_table_key"=> "Company_ID",
            "retrive_script_name"=> "r_retrive_rep",
            "page_name"=> "main",
            "model_path"=> ""
       ];
  
        $data["details"] = [] ;
        $data["details"][0] =  [
            "html_input_name"=> "Company_ID",
            "html_input_id"=> "Company_ID",
            "html_input_type"=> "txt",
            "html_obj_type"=> "field",
            "sql_field_name"=> "Company_ID",
            "sql_datatype"=> "varchar",
            "sql_datasize"=> "200",
            "sql_defaultvalue"=> "-",
            "sql_is_key"=> "true",
            "sql_is_auto_increment"=> "true",
            "sql_is_updateid"=> "true",
            "conf_is_const"=> "false",
            "conf_const_val"=> "0",
            "conf_is_subkey"=> "false",
            "conf_sub_map"=> "",
            "conf_insert_mode"=> "direct",
            "conf_is_inserted"=> "false",
            "conf_is_retrived"=> "true",
            "conf_is_updated"=> "false"
             ];
    
 
     $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
     file_put_contents(base_path('Storage/app/public/coderrocket/maps/new.json'), stripslashes($newJsonString));

     
        return  'create_new_entity ->'  .  $tabname     ; 

    }

} // ### End Of Class  ###