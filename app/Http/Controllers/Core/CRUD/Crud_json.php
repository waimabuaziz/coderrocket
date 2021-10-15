<?php
namespace App\Http\Controllers\Core\CRUD;

use App\Http\Controllers\Core\LogManager;
use Storage;

class Crud_json
{
    private $LOG;
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

    public function create($arr_data, $map, $sent_obj)
    {
        // =========Log Stuff ===========
        $logstate = true;
        // ==============================

        $ret = '';
        $this->LOG->print($logstate, '@@@@@@ Crud_json->create : Begin @@@@@@');
        // set table key if its menetioned in the map content it will be changed
        $primarykey = $map->tablekey;
        $this->LOG->print($logstate, 'primary key set to => ' . $primarykey);

        $htmlname_entityname = $arr_data['entity_proerties']['htmlname_entityname'];
        $htmlname_pagename = $arr_data['entity_proerties']['htmlname_pagename'];
        $htmlname_rowscount = $arr_data['entity_proerties']['htmlname_rowscount'];

        $sent_entity_name = $sent_obj['details'][$htmlname_entityname]['value'];
        $sent_file_name = $sent_obj['details'][$htmlname_entityname]['value'];
        $sent_page_name = $sent_obj['details'][$htmlname_pagename]['value'];
        $sent_rows_count = $sent_obj['details'][$htmlname_rowscount]['value'];
        

        $this->LOG->print($logstate, 'test => ' . $sent_file_name);

        $data = [];
        $data["header"] = [
            "Name" => $sent_entity_name,
            "EntityType" => "Entity",
            "EntityType_BGC" => "lightgreen",
            "EntityType_Color" => "dimgray",
            "Status" => "Not Generated",
            "Status_BGC" => "dimgray",
            "Status_Color" => "white",
            "form_id" => "frm_company",
            "sql_table_key" => "Company_ID",
            "retrive_script_name" => "r_retrive_rep",
            "page_name" =>  $sent_page_name,
            "model_path" => "",
        ];

     

        $data["details"] = [];
        $data["details"][0] = [
            "sql_field_name" => "none",
            "sql_datatype"=> "varchar",
            "sql_datasize"=> "200",
            "sql_defaultvalue"=> "-",
            "sql_is_key" => "true",
            "sql_is_auto_increment" => "true",
            "sql_allow_null"=> "false",
            "sql_is_updateid" => "true",
            "html_input_name" => "Col_1",
            "html_input_id" => "Col_1",
            "html_input_type" => "txt",
            "html_obj_type" => "field",
            "conf_is_const" => "false",
            "conf_const_val" => "0",
            "conf_insert_mode" => "direct",
            "conf_is_subkey" => "false",
            "conf_sub_map" => "",
            "conf_is_inserted" => "false",
            "conf_is_retrived" => "true",
            "conf_is_updated" => "false",
        ];

        $rows_count = 1;
        $sent_rows_count =  (int)$sent_rows_count ; 
        while ($rows_count < $sent_rows_count) {
          $data["details"][$rows_count] = [
            "sql_field_name" => "none",
            "sql_datatype"=> "varchar",
            "sql_datasize"=> "200",
            "sql_defaultvalue"=> "-",
            "sql_is_key" => "true",
            "sql_is_auto_increment" => "true",
            "sql_allow_null"=> "false",
            "sql_is_updateid" => "true",
            "html_input_name" => "Col_" . strval($rows_count + 1) ,
            "html_input_id" => "Col_" . strval($rows_count + 1)  ,
            "html_input_type" => "txt",
            "html_obj_type" => "field",
            "conf_is_const" => "false",
            "conf_const_val" => "0",
            "conf_insert_mode" => "direct",
            "conf_is_subkey" => "false",
            "conf_sub_map" => "",
            "conf_is_inserted" => "false",
            "conf_is_retrived" => "true",
            "conf_is_updated" => "false",
        ];
        $rows_count ++ ;
        }

        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(base_path('Storage/app/public/coderrocket/entities/' .$sent_page_name . '_' . $sent_file_name . '.json'), stripslashes($newJsonString));

        $this->LOG->print($logstate, '@@@@@@ Crud_json->create : End @@@@@@');
        return 'insert crud_json';

    }

    public function read_json_table($parent_path)
    {

        $items = collect([
        ]);

        $dir = new \DirectoryIterator($parent_path);
        $fname = '';
        foreach ($dir as $file) {
            if ($file->isFile()) {
                //  $content = file_get_contents($file->getRealPath());
                $fname .= $file;
                // =======================================
                $myjson = $this->read_json_file($parent_path . "/" . $file);
                $json_arr_header = $myjson['header'];
                $json_arr_details = $myjson['details'];

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
                    'entity_file' => $file,
                    'sub_items' => $sub_items,
                    'header' => $json_arr_header,
                ];
                $items->push($entity_item);
            }
        }
        //=========================================

        return $items;

    }

    public function read_json_file($file_path)
    {

        $path = $file_path; // ie: /var/www/laravel/app/storage/json/filename.json
        $json = json_decode(file_get_contents($path), true);
        return $json;

    }

} // End of class
