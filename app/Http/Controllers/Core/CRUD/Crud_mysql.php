<?php
namespace App\Http\Controllers\Core\CRUD;

use App\Http\Controllers\Core\LogManager;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Crud_mysql
{
    private $LOG;
    public $app_path;
    public $public_path;
    public $resource_path;
    public $routers_path;

    public $Local_app_path;
    public $Local_public_path;
    public $Local_resource_path;
    public $Local_routers_path;

    public function __construct()
    {
        $this->LOG = new LogManager();

        $this->Local_app_path = app_path();
        $this->Local_public_path = public_path();
        $this->Local_resource_path = resource_path();
        $this->Local_routers_path = base_path() . '\routes';

        // ================= set global destination =========================================
        $json = Storage::disk('local')->get('config.json');
        $json = json_decode($json, true);
        $this->app_path = $json['base_path'] . '\\' . $json['project_path'] . '\app';
        $this->public_path = $json['base_path'] . '\\' . $json['project_path'] . '\public';
        $this->resource_path = $json['base_path'] . '\\' . $json['project_path'] . '\resources';
        $this->routers_path = $json['base_path'] . '\\' . $json['project_path'] . '\routes';
        // ================= End set global destination =========================================

    }

    public function insert_row($arr_data, $map, $sent_obj)
    {
        // =========Log Stuff ===========
        $logstate = true;
        // ==============================
        $ret = '';
        $this->LOG->print($logstate, '@@@@@@ Crud_mysql->insert_row: Begin @@@@@@');
        // set table key if its menetioned in the map content it will be changed
        $primarykey = $map->tablekey;
        $this->LOG->print($logstate, 'primary key set to => ' . $primarykey);
        //initiate database model
        $Model = $map->model;
        $MyTable = new $Model;
        $this->LOG->print($logstate, 'model initiated ');
        // filling MYTable Object
        foreach ($arr_data as $key => $item) {
            $this->LOG->print($logstate, 'foreach start ' . 'key->' . $key);
            $htmlname = $item['htmlname'];
            $sqlname = $item['sqlname'];
            //-------------------------------------------------------------
            if ($item['issqlprimary'] == 'true') // set primary key
            {
                $primarykey = $sqlname;
            }
            //-------------------------------------------------------------
            if ($item['isconst'] == 'true') // check if there is a constval
            {
                // get from constval
                $value = $item['constval'];
            } else {
                // get from request obj [from submitted GUI form ]
                $value = $sent_obj['details'][$htmlname]['value'];
            }
            //-------------------------------------------------------------   
            if ($item['inserttype'] == 'sql_row' and $item['issqlprimary'] != 'true' and $item['isinserted'] == 'true') // insert if not primary and isinserted
            {
                $this->LOG->print($logstate, 'inserttype =>' . $item['inserttype']);

                $MyTable->$sqlname = $value;
                $ret .= '$MyTable' . '->' . $sqlname . ' = ' . $value . "\n";
                $this->LOG->print($logstate, '$MyTable' . '->' . $sqlname . ' = ' . $value);

            }
            //-------------------------------------------------------------
        } // end foreach $arr_data

        $this->LOG->print($logstate, '=== MyTable Data ===' . "\n" . $ret);

        try {
            $MyTable->save();
            $lastinsertedid = $MyTable->$primarykey; // last inserted id
            $this->LOG->print($logstate, 'lastinsertedid => ' . $lastinsertedid);
        } catch (Exception $e) {
            $this->LOG->print($logstate, '$MyTable->save(): Exception Error => ' . $e);
        } catch (\Throwable $ex) {
            $this->LOG->print($logstate, '$MyTable->save():Throwable Error => ' . $ex);
        }

        // after inserting the sql_row now we check if there is
        // a child object  which will be inserted as a child of the current insert
        // using the last inserted id as a parent id
        $this->LOG->print($logstate, ' ----- Insert_Child_Start -----');
        $child_foreign_key = $lastinsertedid;
        foreach ($arr_data as $key => $item) {
            $htmlname = $item['htmlname'];
            $sqlname = $item['sqlname'];
            //-------------------------------------------------------------
            if ($item['inserttype'] == 'sql_child' and $item['issqlprimary'] != 'true' and $item['isinserted'] == 'true') // insert if not primary and isinserted
            {
                $this->LOG->print($logstate, 'child =>' . $htmlname);
            }
            //-------------------------------------------------------------

        }
        $this->LOG->print($logstate, ' ----- Insert_Child_End-----');
        $this->LOG->print($logstate, '@@@@@@ Crud_mysql->insert_row: End @@@@@@');
        return 'insert crud_mysql';
    }

} // End of class
