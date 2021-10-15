<?php
namespace App\Http\Controllers\Pages\main\ajax;

use App\Http\Controllers\Core\MainCore;


class ajax_create_page extends MainCore
{

    public function main($request)
    {

        $recived_pars = array(
            'page_name' =>  $request->page_name,
            'security_type' =>  $request->security_type,
            'parameters_count' => $request->parameters_count,
            'overwrite' =>  $request->overwrite ,
         ); //  





        // return 'ret  ajax_create_page -> '  . $page_name . '-> ' .$security_type . ' -> ' .  $parameters_count  . ' ->  ' . $overwrite  ;

        return  $this->Rocket->create_file('','') ;

    }

} // ### End Of Class  ###
