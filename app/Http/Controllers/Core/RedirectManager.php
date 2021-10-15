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
 

class RedirectManager extends Controller
{
 
    Public function Page_Redirect(Request $request)
    {  
        $actions = $request->route()->getAction();
        $pagename =   $actions['page_name']; ;  
     //   return 'returned from redirect page =>'  . $pagename ; 
         return view('pages.'.$pagename.'.init')->with(['par1' =>  $pagename]) ;;
    }
 

    Public function Page_Redirect_one_par(Request $request,$par1)
    {  
        $actions = $request->route()->getAction();
        $pagename =   $actions['page_name']; 
        return 'returned from redirect one par page =>'  . $pagename ; 
         return view('pages.'.$pagename.'.init')->with(['par1' =>  $par1  ]) ;;
    }


      
    Public function Page_Redirect_tow_par(Request $request,$par1,$par2)
    {  
        $actions = $request->route()->getAction();
        $pagename =   $actions['page_name']; ;  
        return 'returned from redirect tow par page =>'  . $pagename ; 
         return view('pages.'.$pagename.'.init')->with(['par1' =>  $par1 ,'par2' => $par2 ]) ;;
    }

         
    Public function Page_Redirect_three_par(Request $request,$par1,$par2,$par3)
    {  
        $actions = $request->route()->getAction();
        $pagename =   $actions['page_name']; ;  
        return 'returned from redirect three par page =>'  . $pagename ; 
         return view('pages.'.$pagename.'.init')->with(['par1' =>  $par1 ,'par2' => $par2 ,'par3' => $par3 ]) ;;
    }


 
}