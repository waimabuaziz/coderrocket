<?php

namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Redirect;
use App\Models\SYS_FileManager; 
use App\Http\Controllers\Core\RocketManager;
use App\Http\Controllers\Core\LogManager;

class AjaxManager extends Controller
{
 
  Public $LOG ;

  Public $CoreFuncs ; 
  public function __construct()
    {
      // array of Main Core Ajax Function 
        $this->CoreFuncs = array(
          "submit_frm_to_obj",
          "Joe",
           "Glenn",
          "Cleveland"
     );
     // End of array of Main Core Ajax Function 

     $this->LOG = new LogManager() ;  

    }
    

    Public function Main_Ajax(Request $request)
    {  
      $this->LOG->clearlog();
      $this->LOG->print(true, '@@@@@@ AjaxManager->Main_Ajax: Begin @@@@@@');
       
       if (in_array($request->sys_ajax_name, $this->CoreFuncs))
        {
          return $this->Main_Core_Ajax($request);
        }

        $sys_ajax_name = $request->sys_ajax_name ; 
        $sys_page_name = $request->sys_page_name ;
        $classname = $sys_ajax_name ; 
        $usepath = app("App\Http\Controllers\Pages\\{$sys_page_name}\\ajax\\{$classname}"); 
        $Ajax = new  $usepath; 
        $MyAjax =  new $Ajax ; 

      //  return response()->json(['ret' =>  $classname ]);  

        try {
            $ret = $MyAjax->main($request) ; 
             return response()->json(['ret' => $ret  ]); 

        } catch (Exception $e) {
           // report($e);
            return response()->json(['ret' => 'error e exception' ]);  
        }
          catch (\Throwable $ex) {
           return response()->json(['ret' => 'called Ajax is not exist' ]);   
         }


     //  return response()->json(['ret' => 'main ajaxx' ]);  
    }
 


    Public function Main_AjaxRocket(Request $request)
    {  
      
        $sys_rocket_name = $request->sys_rocket_name ; 
        //$sys_page_name = $request->sys_page_name ;

      //  $classname = $sys_rocket_name ; 
      //  $usepath = app("App\Http\Controllers\Rockets\\{$classname}"); 
      //  $Rocket = new  $usepath; 
       // $MyRocket =  new $Rocket ; 

       $MyRocket = new RocketManager();

      //  return response()->json(['ret' =>  $classname ]);  


        try {
            $ret = $MyRocket->MainRocket($request) ; 
             return response()->json(['ret' => $ret  ]); 

        } catch (Exception $e) {
           // report($e);
            return response()->json(['ret' => 'error e exception' ]);  
        }
          catch (\Throwable $ex) {
           return response()->json(['ret' => 'called Ajax is not exist' ]);   
         }


     //  return response()->json(['ret' => 'main ajaxx' ]);  
    }
 



    Public function Main_Core_Ajax($request)
    {  
 

        $sys_ajax_name = $request->sys_ajax_name ; 
        $sys_page_name = $request->sys_page_name ;
        $classname = $sys_ajax_name ; 
        $usepath = app("App\Http\Controllers\Core\MainCore"); 
        $Ajax = new  $usepath; 
        $MyAjax =  new $Ajax ; 

      //  return response()->json(['ret' =>  $classname ]);  

     //  $this->LOG->printlog('Main_Core_Ajax   => '. $classname);

        try {
            $ret = $MyAjax->$classname($request) ; 
             return response()->json(['ret' => $ret  ]); 

        } catch (Exception $e) {
           // report($e);
            return response()->json(['ret' => 'error e exception' ]);  
        }
          catch (\Throwable $ex) {
           return response()->json(['ret' => 'called Ajax is not exist' ]);   
         }


     //  return response()->json(['ret' => 'main ajaxx' ]);  
    }
 

 
}