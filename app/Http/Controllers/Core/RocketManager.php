<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Core\FileManager;
use App\Http\Controllers\Core\FolderManager;
use App\Http\Controllers\Core\LogManager;

class RocketManager
{

    private $LOG;
    private $FileManager;
    private $FolderManager;

    public function __construct()
    {
        $this->LOG = new LogManager();
        $this->FileManager = new FileManager();
        $this->FolderManager = new FolderManager();

    }
    ## =======================================================

     public function create_folder($sent_arr, $rep_arr)
    {
        // $this->LOG->printlog('RocketManager:folder_create') ;

          
        $par_arr = array(
            'folder_name' =>$sent_arr['page_name']  . $sent_arr['folder_name'], // folders has to contain their parent page name 
            'dir_type' => $sent_arr['dir_type'],
            'dist_dir' => $sent_arr['dist_dir'],
            'overwrite' => $sent_arr['overwrite'],
        ); // add pars as required

        $this->FolderManager->folder_create($par_arr, $rep_arr);
       // $this->LOG->printlog('created folder => ' . $par_arr['dir_type'] . "/" . $par_arr['folder_name'] ) ;
        

    }

    public function create_file($sent_arr, $rep_arr)
    {
        #  $this->LOG->printlog('RocketManager:file_create') ;

        $par_arr = array(
            'page_name' => $sent_arr['page_name'],
            'prefix' => $sent_arr['prefix'],
            'pure_name' => $sent_arr['pure_name'],
            'suffix' => $sent_arr['suffix'],
            'dir_type' => $sent_arr['dir_type'],
            'parent_dir' => $sent_arr['parent_dir'],
            'content' => $sent_arr['content'],
            'file_ext' => $sent_arr['file_ext'],
            'overwrite' => $sent_arr['overwrite'],
            'content_type' => $sent_arr['content_type'],
            'template_path' => $sent_arr['template_path'],
            'template_name' => $sent_arr['template_name'],
            'template_ext' => $sent_arr['template_ext'],
        ); // add pars as required

    #    $this->LOG->printlog('RocketManager:file_create->' . $sent_arr['overwrite']) ;

           $this->FileManager->file_create($par_arr, $rep_arr);
      //  $this->LOG->printlog('created file => ' . $par_arr['dir_type'] . "/" . $par_arr['page_name'] . "/" . $par_arr['parent_dir'] . "/" . $par_arr['pure_name'] .   $par_arr['file_ext'] ) ;

    }

    public function append_string_to_file($sent_arr, $rep_arr)
    {
        // $this->LOG->printlog('RocketManager:append_string_to_file') ;

        $page_name = $sent_arr['page_name'] ; // $par_arr[0]; 
        $tier_type = $sent_arr['dir_type'] ; // $par_arr[1]; // controller , view , public
        $file_path_name_ext = $sent_arr['file_path_name_ext'] ; // $par_arr[2]; // file path from dir ex:[controller/Pages/...]
        $content = $sent_arr['content'] ; // $par_arr[3]; // file path from dir ex:[controller/Pages/...]

        // here replace content with replace arr

        // replace with reparr
        foreach ($rep_arr as $key => $value) {
            $originalstr = $key;
            $newstr = $value;
            //  $this->LOG->printlog($originalstr . '=>' . $newstr) ;
            $content = str_replace($originalstr, $newstr, $content); // replace with rep_arr
        }

        // ======================================

        $fullpath = $this->FileManager->get_file_path($tier_type);
        $fullpath .= $page_name . '/' . $file_path_name_ext;

        $this->FileManager->append_string_to_file($fullpath, $content);
    }

    ## =======================================================
    ## =======================================================
    ## =======================================================

    public function add_router($par_arr, $rep_arr)
    {

        //  $this->LOG->printlog('RocketManager:add_router') ;

        $page_name = $par_arr[0];
        $par_count = $par_arr[1];
        $file_path = $par_arr[2];

        $fullpath = $this->FileManager->get_file_path('router') . $file_path;

        $replacer_string = '#ref_codegenerator_ref_dont_delete_this_line_middleware#';

        switch ($par_count) {
            case '1':
                $first_str = "Route::get('/" . $page_name . "', ['uses' =>  'Core\MainCore@Page_Redirect','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]); ";
                $this->FileManager->delete_string_in_file($fullpath, $first_str);

                $par_one_str = "Route::get('/" . $page_name . "/{par1}', ['uses' =>  'Core\MainCore@Page_Redirect_one_par','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]);";
                $this->FileManager->delete_string_in_file($fullpath, $par_one_str);

                $new_string = $first_str . "\n" . $par_one_str . "\n" . $replacer_string;
                $this->FileManager->replace_string_in_file($fullpath, $replacer_string, $new_string);

                break;

            case '2':
                $first_str = "Route::get('/" . $page_name . "', ['uses' =>  'Core\MainCore@Page_Redirect','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]); ";
                $this->FileManager->delete_string_in_file($fullpath, $first_str);

                $par_one_str = "Route::get('/" . $page_name . "/{par1}', ['uses' =>  'Core\MainCore@Page_Redirect_one_par','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]);";
                $this->FileManager->delete_string_in_file($fullpath, $par_one_str);

                $par_two_str = "Route::get('/" . $page_name . "/{par1}/{par2}', ['uses' =>  'Core\MainCore@Page_Redirect_tow_par','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]);";
                $this->FileManager->delete_string_in_file($fullpath, $par_two_str);

                $new_string = $first_str . "\n" . $par_one_str . "\n" . $par_two_str . "\n" . $replacer_string;
                $this->FileManager->replace_string_in_file($fullpath, $replacer_string, $new_string);

                break;

            default:

                $first_str = "Route::get('/" . $page_name . "', ['uses' =>  'Core\MainCore@Page_Redirect','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]); ";
                $this->FileManager->delete_string_in_file($fullpath, $first_str);

                $par_one_str = "Route::get('/" . $page_name . "/{par1}', ['uses' =>  'Core\MainCore@Page_Redirect_one_par','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]);";
                $this->FileManager->delete_string_in_file($fullpath, $par_one_str);

                $par_two_str = "Route::get('/" . $page_name . "/{par1}/{par2}', ['uses' =>  'Core\MainCore@Page_Redirect_tow_par','page_name' => '" . $page_name . "','as' => '" . $page_name . "',]);";
                $this->FileManager->delete_string_in_file($fullpath, $par_two_str);

                $new_string = $first_str . "\n" . $replacer_string;
                $this->FileManager->replace_string_in_file($fullpath, $replacer_string, $new_string);
                break;

        }

    }

 
    public function file_append($par_arr, $rep_arr)
    {
        //  $this->LOG->printlog('RocketManager:file_append') ;

        $par_arr = array(
            'page_name' => $par_arr[0],
            'prefix' => $par_arr[1],
            'pure_name' => $par_arr[2],
            'suffix' => $par_arr[3],
            'tier_type' => $par_arr[4],
            'parent_dir' => $par_arr[5],
            'content' => $par_arr[6],
            'file_ext' => $par_arr[7],
            'overwrite' => $par_arr[8],
            'content_type' => $par_arr[9],
            'template_path' => $par_arr[10],
        ); // add pars as required

        $this->FileManager->file_append($par_arr, $rep_arr);
    }

    public function get_pure_template_content($templatepath)
    {
        // pure template contetn : means no replace array working  , we set empty rep arr
        $rep_arr = array(
            'p_par' => 'p_par',
        ); // add pars as required
        $content = $this->FileManager->get_template_content($templatepath, $rep_arr);

        return $content;

    }
    public function get_replaced_template_content($templatepath, $rep_arr)
    {

        $content = $this->FileManager->get_template_content($templatepath, $rep_arr);
        return $content;

    }

    public function update_pure_template_content($templatepath, $newcontent)
    {
        // pure template contetn : means no replace array working
        $rep_arr = array(
            'p_par' => 'p_par',
        ); // add pars as required
        $content = $this->FileManager->get_template_content($templatepath, $rep_arr);

        return $content;

    }

    //########################## Main Rocket ############################################
    //#####################################################################################
    public function MainRocket($request)
    {

         $this->LOG->clearlog() ;
       ##  $this->LOG->printlog('RocketManager:MainRocket') ;

        $rocket_name = $request->sys_rocket_name;
        ## $this->LOG->printlog('rocket_name : ' .  $rocket_name  ) ;

        //  $rocket_path = __NAMESPACE__  . '\\' . 'rockets\\R_'.  $rocket_name ;
        $rocket_path = 'App\Http\Controllers\Rockets\\' . $rocket_name;
        #  $this->LOG->printlog($rocket_path) ;
        $myrocket = new $rocket_path;
        $ret = '';

        # $this->LOG->printlog($rocket_path) ;
        //################################ Rep arr ######################################
        $rep_arr = array();
        foreach ($myrocket->rep_arr as $key => $value) {

            switch (substr($key, 0, 7)) {
                case 'const->':
                    # $this->LOG->printlog(substr($key,7,20) . '=>' .  $value) ;
                    # $this->LOG->printlog(substr($value,7,20)) ;
                    $rep_arr[substr($key, 7, 20)] = $value;
                    break;
                default:
                    # $this->LOG->printlog($key . '=>' . $request->objpar[$value]) ;
                    # $this->LOG->printlog($request->objpar[$value]) ;
                    $rep_arr[$key] = $request->$value;
                    break;
            }
        }
        //######################################################################

        //######################################################################
        foreach ($myrocket->rocket as $key => $value) {

            $proc_name = $value; // process value
            //   $func_call =  $key  ; // process name

            # $this->LOG->printlog('rocket_name : ' . $key);

            $par_arr = array();
            foreach ($proc_name as $key2 => $value2) {
                $parname = $key2;
                $req_val = $value2; // process val
                // $ret .=  $req_val . ' => ' .  $request->obj[$req_val]  . ' | ';

                switch (substr($parname, 0, 7)) {
                    case 'funcs->':
                        $func_call = $req_val;
                        # $this->LOG->printlog($func_call) ;
                        break;
                    case 'const->':
                        $par_val = $req_val;

                        // array_push($par_arr, $par_val);
                        $par_arr[substr($parname, 7, 100)] = $par_val;
                        # $this->LOG->printlog(substr($parname, 7, 100)) ;

                        $ret .= $parname . ' => ' . $par_val . ' | ';
                        break;

                    default:
                        $par_val = $request->$req_val;
                        # $this->LOG->printlog($par_val) ;
                       
                        // array_push($par_arr, $par_val);
                        $par_arr[$parname] = $par_val;
                        # $this->LOG->printlog($parname) ;

                        $ret .= $parname . ' => ' . $request->$req_val . ' | ';
                        #  $this->LOG->printlog($ret) ;
                        break;
                }
                //  ###  $this->LOG->printlog($ret) ;
                $ret = '';
                // return  $request->objpar['template_path'] ;

            } // end foreach sub
            #  $this->LOG->printlog($func_call) ;
            #  $this->LOG->printlog($par_arr[0]) ;
            $this->$func_call($par_arr, $rep_arr);

        } // end foreach 1

        return 'done';
    }
    //#####################################################################################
    //########################## End Of Rocket ############################################

} // ### End Of Class  ###
