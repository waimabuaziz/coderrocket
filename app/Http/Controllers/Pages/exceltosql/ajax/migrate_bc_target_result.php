<?php
namespace App\Http\Controllers\Pages\exceltosql\ajax;
use App\Http\Controllers\Core\MainCore;
 

class migrate_bc_target_result extends MainCore
{

    public function main($request)
    {
 
        $ajax_name = $request->sys_ajax_name;
        $page_name = $request->sys_page_name;
        $script_path = $page_name . "\sql";
      //  $this->LOG->printlog('script_path ->:' . $script_path ) ;
        
        $set_arr = array(
            '@p_year' => '2021',
            '@p_quarter' =>  'Q2',
            '@p_m1' =>  '4',
            '@p_m2' =>  '5',
            '@p_m3' =>  '6',
            '@p_min_earned_percent' =>  '1',
            '@p_const_bouns_per_emp' =>  '1000',
            '@p_bc_req_achived_perc' =>  '90'
        ); // add pars as required

          $par_arr = array( 
            'par1' => '1'
        ); // add pars as required

         // first reset table and drop old data 
         $items = $this->SQL->exec_set_script($script_path,  's_drop_bc_target_result', $par_arr,$set_arr);
         // second migrate new data 
         $items = $this->SQL->exec_set_script($script_path, 's_migrate_bc_target_result'  , $par_arr,$set_arr);
   
  
             
        return  'migrate_bc_target_result'    ; 

    }

} // ### End Of Class  ###