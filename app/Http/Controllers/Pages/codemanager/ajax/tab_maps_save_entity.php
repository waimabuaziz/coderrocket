<?php
namespace App\Http\Controllers\Pages\codemanager\ajax;

use App\Http\Controllers\Core\MainCore;

class tab_maps_save_entity extends MainCore
{

    public function main($request)
    {

        $this->LOG->print(true, '@@@@@@ Ajax/tab_maps_save_entity->main() :Begin @@@@@@');

        $sent_obj = $request->obj;

        $sent_page_name = $sent_obj['header']['pagename'];
        $sent_entity_name = $sent_obj['header']['name'];
        $sent_file_name = $sent_obj['header']['filename'];
        $sent_rows_count = $sent_obj['header']['rows_count'];

        $this->LOG->print(true, 'sent_page_name -> ' . $sent_page_name);
        $this->LOG->print(true, 'sent_entity_name -> ' . $sent_entity_name);
        $this->LOG->print(true, 'sent_file_name -> ' . $sent_file_name);
        $this->LOG->print(true, 'sent_rows_count -> ' . $sent_rows_count);

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
            "page_name" => $sent_page_name,
            "model_path" => "",
        ];

        $test = $sent_obj['details'][0]['html_input_name'];
        $this->LOG->print(true, 'html_input_name -> ' . $test);
      

        $rindex = 0 ; 
        $sent_rows_count = (int) $sent_rows_count;
        while ($rindex < $sent_rows_count) {
            $data["details"][$rindex] = [
                "sql_field_name" => $sent_obj['details'][$rindex]['sql_field_name'],
                "sql_datatype" => $sent_obj['details'][$rindex]['sql_datatype'],
                "sql_datasize" => $sent_obj['details'][$rindex]['sql_datasize'],
                "sql_defaultvalue" => $sent_obj['details'][$rindex]['sql_defaultvalue'],
                "sql_is_key" => $sent_obj['details'][$rindex]['sql_is_key'],
                "sql_is_auto_increment" => $sent_obj['details'][$rindex]['sql_is_auto_increment'],
                "sql_allow_null" => $sent_obj['details'][$rindex]['sql_allow_null'],
                "sql_is_updateid" => $sent_obj['details'][$rindex]['sql_is_updateid'],
                "html_input_name" => $sent_obj['details'][$rindex]['html_input_name'],
                "html_input_id" => $sent_obj['details'][$rindex]['html_input_id'],
                "html_input_type" => $sent_obj['details'][$rindex]['html_input_type'],
                "html_obj_type" => $sent_obj['details'][$rindex]['html_obj_type'],
                "conf_is_const" => $sent_obj['details'][$rindex]['conf_is_const'],
                "conf_const_val" => $sent_obj['details'][$rindex]['conf_const_val'],
                "conf_insert_mode" => $sent_obj['details'][$rindex]['conf_insert_mode'],
                "conf_is_subkey" => $sent_obj['details'][$rindex]['conf_is_subkey'],
                "conf_sub_map" => $sent_obj['details'][$rindex]['conf_sub_map'],
                "conf_is_inserted" => $sent_obj['details'][$rindex]['conf_is_inserted'],
                "conf_is_retrived" => $sent_obj['details'][$rindex]['conf_is_retrived'],
                "conf_is_updated" => $sent_obj['details'][$rindex]['conf_is_updated'],
            ];
            $this->LOG->print(true, 'sent_rows_count -> ' .  $rindex . '=>' . $sent_obj['details'][$rindex]['html_input_name']  . '=>' . $sent_obj['details'][$rindex]['sql_datatype']);
            $rindex++;
        }

        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(base_path('Storage/app/public/coderrocket/entities/' . $sent_file_name . ''), stripslashes($newJsonString));

        return 'done';

    }

} // ### End Of Class  ###
