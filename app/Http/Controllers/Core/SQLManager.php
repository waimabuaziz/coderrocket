<?php
namespace App\Http\Controllers\Core;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Core\LogManager;
class SQLManager
{

    Public $LOG ;

    public function __construct()
    { 
         $this->LOG = new LogManager() ;  
    }

    public function get_table($pagename, $scriptname, $par_arr)
    {
      # $this->LOG->printlog('SQl ->:' . $pagename ) ;

        $sql_str = $this->script_loader($pagename, $scriptname . '.sql');
        $sql_str = str_replace("@", ":", $sql_str); // replace @ with : to work
        $sql_str = str_replace("#", "@", $sql_str); // replace @ with : to work
      #  $this->LOG->printlog('SQL->get_table-> ' . $sql_str ) ;
        $ret = DB::select(DB::raw($sql_str), $par_arr);
        return $ret; // return all rows  as a table
    }


    public function get_value($pagename, $fieldname, $scriptname, $par_arr)
    {

        $sql_str = $this->script_loader($pagename, $scriptname . '.sql');
        $sql_str = str_replace("@", ":", $sql_str); // replace @ with : to work
        $sql_str = str_replace("#", "@", $sql_str); // replace @ with : to work

       //  $this->printlog('get_value sql: =  ' . $sql_str . "\n");

        $ret = DB::select(DB::raw($sql_str), $par_arr);
        if (isset($ret[0]->$fieldname)) {
            return $ret[0]->$fieldname;
        } else {
            return null;
        }

    }

    public function get_row($pagename, $scriptname, $par_arr)
    {

        $sql_str = $this->script_loader($pagename, $scriptname . '.sql');
        $sql_str = str_replace("@", ":", $sql_str); // replace @ with : to work
        $sql_str = str_replace("#", "@", $sql_str); // replace @ with : to work

        //  $this->printlog('get_value sql: =  ' . $sql_str . "\n");

        $ret = DB::select(DB::raw($sql_str), $par_arr);
        return $ret[0];
    }



 


    public function script_loader($pagename, $scriptname)
    {
        $app_path = app_path();
        $file_path = $app_path . '/Http/Controllers/Pages/' . $pagename . '/';

        $sql = '';
        foreach (file($file_path . $scriptname) as $line) {
            // loop with $line for each line of yourfile.txt
            $sql .= $line;
        }

        return $sql;
    }

    public function del_row($pagename, $scriptname, $par_arr)
    {


        $sql_str = $this->script_loader($pagename, $scriptname . '.sql');
        $sql_str = str_replace("@", ":", $sql_str); // replace @ with : to work
        $sql_str = str_replace("#", "@", $sql_str); // replace @ with : to work

     
      
      $ret = DB::select(DB::raw($sql_str), $par_arr);
        
      // $this->printlog(' === sqlscript === ' . "\n" . $sql_str);
        return 'done';
        //  return  $ret[0]->$fieldname ;
    }

    public function exec_script($pagename, $scriptname, $par_arr)
    {

       // $this->printlog(' === sqlscript === ' . "\n" . $scriptname);


        $sql_str = $this->script_loader($pagename, $scriptname . '.sql');
        $sql_str = str_replace("@", ":", $sql_str); // replace @ with : to work
        $sql_str = str_replace("#", "@", $sql_str); // replace @ with : to work

       //  $this->printlog(' === sqlscript === ' . "\n" . $sql_str);

        $ret = DB::select(DB::raw($sql_str), $par_arr);
       // $this->printlog(' === sqlscript done === ' . "\n" );
    
        return 'done';

    }

    public function exec_string_script($scriptstring)
    {
        // $this->printlog('===  SQL ==== ' . "\n" . $scriptstring);
        $ret = DB::select(DB::raw($scriptstring));
        return 'done';
    }

    public function exec_set_script($pagename, $scriptname, $par_arr,$set_arr)
    {
        // $this->printlog('===  SQL ==== ' . "\n" . $scriptstring);
       

          

               $sql_str = $this->script_loader($pagename, $scriptname . '.sql');
               $sql_str = str_replace("@", ":", $sql_str); // replace @ with : to work
               $sql_str = str_replace("$", "@", $sql_str); // replace @ with : to work
              //  $this->printlog(' === sqlscript === ' . "\n" . $sql_str);
     
              foreach ($set_arr as $key => $value) {
                $pname = $key;
                $pval = $value;
                DB::statement(DB::raw(" set ". $pname .  "="   ."'". $pval. "'" )); 
                $this->LOG->printlog(  " set " . $pname . "="   ."'". $pval. "'" ) ;
            }
    
                // DB::statement(DB::raw('set @p_year=2021')) ; 
                // DB::statement(DB::raw('set @p_quarter=' . '"'. 'Q2'. '"' )); 
               // DB::statement(DB::raw($set)); 

               try {
                $ret = DB::select(DB::raw($sql_str), $par_arr);
                }
                catch (\Throwable $ex) {
                    $this->LOG->printlog('SQL Script ->:' . $sql_str ) ;
                    $this->LOG->printlog('-------------'   ) ;
                    $this->LOG->printlog('error ->:' . $ex) ;
                //  $ex->errorInfo[2];
                }
              // $this->printlog(' === sqlscript done === ' . "\n" );
        
               return 'done';
     
    }


    //   DB::statement(DB::raw('set @bos_row_number=0')); 


    function describe_table($tablename)
    {
         $sql_str = 'Describe ' . $tablename . ' ; ' ; 
         $ret = DB::select( DB::raw($sql_str));
         return  $ret ;  // return all rows  as a table 
    }

    

} // ### End Of Class  ###