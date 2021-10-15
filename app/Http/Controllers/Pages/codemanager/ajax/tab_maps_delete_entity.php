<?php
namespace App\Http\Controllers\Pages\codemanager\ajax;
use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;
 

class tab_maps_delete_entity extends MainCore
{

    public function main($request)
    {
        $this->LOG->print(true, '@@@@@@ Ajax/tab_maps_delete_entity->main() :Begin @@@@@@' );
        $file_name = $request->file_name ; 
        
                $ret = $this->JSONManager->delete_json_file(storage_path().'/app/public/coderrocket/entities/'. $file_name) ;   
             
        return   $ret   ; 

    }

} // ### End Of Class  ###