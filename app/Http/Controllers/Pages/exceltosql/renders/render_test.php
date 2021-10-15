<?php
namespace App\Http\Controllers\Pages\exceltosql\renders;
use App\Http\Controllers\Core\MainCore;
use Illuminate\Support\Facades\Storage;

class render_test extends MainCore
{

  
    public function main($request)
    {
        $render_name = $request->sys_render_name;
        $page_name = $request->sys_page_name;
        $script_path = $page_name . "\sql";
        // $this->LOG->printlog('render_pages ->:' . $render_name ) ;
        
        $retarr = array(
            'test_par' => '1',  
        );

         $par_arr = array('par' => 1); // add pars as required
         $items = $this->SQL->get_table($script_path, 's_' . $render_name, $par_arr);
    
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
        $static_arr[] = 'A';
        $static_arr[] = 'B  ';
        $static_arr[] = 'C';
        $static_arr[] = 'D';
        $static_arr[] = 'E';
        $static_arr[] = 'F';
        $static_arr[] = 'G';
        $static_arr[] = 'H';
        $static_arr[] = '  I';

        return $static_arr;
    }


} // ### End Of Class  ###
