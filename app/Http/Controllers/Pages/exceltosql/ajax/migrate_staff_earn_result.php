<?php
namespace App\Http\Controllers\Pages\exceltosql\ajax;
use App\Http\Controllers\Core\MainCore;
 

class migrate_staff_earn_result extends MainCore
{

    public function main($request)
    {

        $ajax_name = $request->sys_ajax_name;
        $page_name = $request->sys_page_name;
        $script_path = $page_name . "\sql";
      //  $this->LOG->printlog('script_path ->:' . $script_path ) ;
        $set = 'set @p_year=2021' ; 

 
        $set_arr = array(
            '@p_year' => '2021',
            '@p_quarter' =>  'Q2'
        ); // add pars as required

          $par_arr = array( 
            'par1' => '1'
        ); // add pars as required

         // first reset table and drop old data 
        $items = $this->SQL->exec_set_script($script_path, 's_drop_staff_earn_result' , $par_arr,$set_arr);
         // second migrate new data 
         $items = $this->SQL->exec_set_script($script_path, 's_migrate_staff_earn_result'  , $par_arr,$set_arr);
   
        return  'migrate_staff_earn_result'    ; 

    }

} // ### End Of Class  ###