<?php
namespace App\Http\Controllers\Pages\main\ajax;

use App\Http\Controllers\Core\MainCore;
use Storage;


class get_project_destination extends MainCore
{

    public function main($request)
    {
 

            $json = Storage::disk('local')->get('config.json');
            $json = json_decode($json, true);
            
            $main_ip = $json['main_ip'] ; 
            $destination_url = $json['destination_url'] ; 
            $project_folder = $json['project_folder'] ; 

            $full_proect_path =  $main_ip . $destination_url .  $project_folder ; 
        return  $full_proect_path   ; 

    }

} // ### End Of Class  ###