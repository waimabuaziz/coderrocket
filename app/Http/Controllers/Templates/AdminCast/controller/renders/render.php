<?php
namespace App\Http\Controllers\Pages\__REPLACE_PAGENAME__\renders;
use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;

class __REPLACE_RENDERNAME__ extends MainCore
{

  
    public function main($request)
    {
        $render_name = $request->sys_render_name;
        $page_name = $request->sys_page_name;
        $script_path = $page_name . "\sql";

        $subdir_arr = $this->get_collection_arr();
        $retarr = array(
            'test_par' => '1',
            'folder_names' => $subdir_arr[0],
        );

        //  $par_arr = array('par' => 1); // add pars as required
        //  $items = $this->SQL->get_table($script_path, 's_' . $render_name, $par_arr);
        $items = collect([
        ]);

        foreach ($subdir_arr as $value) {

            $newitem = (object) [
                'itemname' => $value,
                'url' => 'google.com',
            ];
            $items->push($newitem);
        }
        return [$retarr, $items];
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
        $static_arr[] = 'الأمل';
        $static_arr[] = 'سما الوطن';
        $static_arr[] = 'الأندلس';
        $static_arr[] = 'الحنان';
        $static_arr[] = 'الوفاء';
        $static_arr[] = 'الصيادلة';
        $static_arr[] = 'الواحة';
        $static_arr[] = 'المتحدة';
        $static_arr[] = 'دواء ليبيا';

        return $static_arr;
    }


} // ### End Of Class  ###
