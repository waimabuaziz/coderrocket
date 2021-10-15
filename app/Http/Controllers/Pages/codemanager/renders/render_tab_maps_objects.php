<?php
namespace App\Http\Controllers\Pages\codemanager\renders;
use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;

class render_tab_maps_objects extends MainCore
{

  
    public function main($request)
    {
        $items  =  $this->JSONManager->read_json_table(storage_path().'/app/public/coderrocket/entities') ; 
        $retarr = array(
       'par' =>   'par'
       );
        return [$retarr, $items];
    }


} // ### End Of Class  ###
