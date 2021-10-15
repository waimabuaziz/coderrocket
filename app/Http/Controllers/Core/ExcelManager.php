<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Core\JSONManager;
use App\Http\Controllers\Core\LogManager;
use Storage;
//use Illuminate\Support\Facades\Storage;
use \App\Models\ProccessMonitor;

class ExcelManager
{
    private $LOG;
    public $JSONManager;

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
        $this->JSONManager = new JSONManager();

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

    public function read_excel($file_name, $map_name)
    {

        $this->LOG->clearlog();

        $json = $this->JSONManager->read_json_file(storage_path() . '/app/public/excel_maps/' . $map_name . '.json');

        $dir_path = $json['header']['dir_path'];
        $upload_path = $json['header']['upload_path'];
        $file_extension = $json['header']['file_extension'];
        $table_name = $json['header']['table_name'];
        $model = $json['header']['model'];
        $monitor_proccess = $json['header']['monitor_proccess'];
        $max_row_count = $json['header']['max_row_count'];
        $h_first_row = $json['header']['first_row'];

        //-------  init table -----------------------
        $full_model_path = '\App\Models\\' . $model;
        $MyModel = new $full_model_path();

        //  $this->LOG->printlog(' col_count     => '  . $col_count ) ;
        switch ($dir_path) {
            case 'public_path':
                $path = public_path() . $upload_path . $file_name;
                break;

        }
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $spreadsheet->load($path);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // -------------- how much rows you want to read from excel
        $row_loop_max = 0;
        if ($max_row_count == 'max') {
            $row_loop_max = count($sheetData);
        } else {
            $row_loop_max = $max_row_count;
        }
        // ------------------------------------------------------------------

        // -------------------------- init process monitor Row  ------------------------
        $MyProcModel = new \App\Models\ProccessMonitor();
        $MyProcTB = new $MyProcModel;
        $MyProcTB->User_ID = 1;
        $MyProcTB->Status = 'On Progress';
        $MyProcTB->Percentage = '0 %';
        $MyProcTB->Function = 'ExcelToSql(' . $map_name . ')';
        $MyProcTB->Target = $row_loop_max;
        $MyProcTB->Current = 0;
        $MyProcTB->Ref = $file_name; // file name will be uniqe every time its uploaded even if its the same file
        $MyProcTB->save();
        $MyProc_has_error = false ; 
        // --------------------------------------------

        // $this->LOG->printlog('$row_loop_max->' . $row_loop_max  );

        if (!empty($sheetData)) {
            for ($i = $h_first_row; $i < $row_loop_max ; $i++) { //skipping first row
                // ------ init table row here  --------
                $MyTable = new $MyModel;

                $proc_ref = $file_name;
                $MyProcTable = ProccessMonitor::whereIn('Ref', array($proc_ref))->first();

                //-------------------------------
                //----------------- loop columns here ----------------------------------
                foreach ($json["details"] as $item) { //foreach element in $arr
                    $col_name = $item['col_name'];
                    $sql_field_name = $item['sql_field_name'];
                    $index = $item['col_index'];
                    //----------------- set val if const or not ----------------
                    if ($item['is_const'] == 'true') {
                        $cell_val = $item['const_val'];
                    } else {
                        $cell_val = $sheetData[$i][$index];
                    }
                    //----------------------------------------------------------
                    //----------------- fix value if numeric ----------------
                    $cell_val = $this->set_data_type($cell_val, $item['data_type']);
                    //----------------------------------------------------------
                    //----------------- insert into sql table ----------------

                    $MyTable->$sql_field_name = $cell_val;
                    //----------------------------------------------------------
                    //  $this->LOG->printlog('$MyTable->' . $sql_field_name . ' = ' . $cell_val);
                }
                //----------------- insert row in table  ----------------------------------
                try {
                    $MyTable->save();
              }
                catch (\Throwable $ex) {
                    $MyProc_has_error = true ; 
                    $MyProcTable->Status = 'Error: ' . $ex->errorInfo[2];
                }
                //----------------- /insert row in table ----------------------------------

                //----------------- update proc monitor table ----------------------------------
                $percentage = round( (($i + 1) / $row_loop_max) * 100 , 0);
                  $MyProcTable->Current = $i + 1;
                $MyProcTable->Percentage = (string)$percentage . '%';
                $MyProcTable->save();
                //-----------------  / update proc monitor table ------------------------------

                //----------------- End loop columns here ----------------------------------
            } // end for

            // $this->LOG->printlog(' $MyProcStatus->Status => '  . 'done' );
            //----------------- update proc monitor status to done  ----------------------------------
            $MyProcStatus = ProccessMonitor::whereIn('Ref', array($file_name))->first();
           if( $MyProc_has_error == false  )
           {
             $MyProcStatus->Status = 'Done';
           }
             $MyProcStatus->save();
            //----------------- update proc monitor status to done  ----------------------------------

        } // ind if empty sheet

    }

    public function set_data_type($sent_val, $sent_ref)
    {
        switch ($sent_ref) {
            case 'int':
                return intval($sent_val);
                break;
            case 'decimal':
                return floatval($sent_val);
                break;

            case 'float':
                return floatval($sent_val);
                break;

            case 'date':
                return $sent_val; // add your date condition here if you want
                break;

            default:
                return $sent_val;
                break;

        }
    }

    public function get_excell_header($objWorksheet, $sent_cellname, $sent_endtext)
    {
        // --- loop to get first row no  ------------------
        $cellcontent = '';
        $r = 0;
        $col = 0; // first column to start
        while ($cellcontent == '') {
            $cellcontent = '';
            $cellcontent .= $objWorksheet->getCellByColumnAndRow($col, $r);
            if ($cellcontent != $sent_cellname) // if its not the first header field
            {
                $cellcontent = '';
            }
            $r++;
            if ($r > 10) // if exceded 10 rows go to next column
            {
                $col++;
                $r = 0;
            }
        }
        //========
        // -----------------------------------------------
        $first_row_no = $r - 1;
        $first_col_no = $col;
        // ------------------------------------------------
        // ----- get last row no ----
        $lastcell = '';
        $r2 = 0;
        $col2 = 0;
        while (trim($lastcell) != $sent_endtext && $r2 < 300000) {
            // check 30 columns
            for ($x = 0; $x <= 30; $x++) {
                $lastcell = '';
                $lastcell .= $objWorksheet->getCellByColumnAndRow($x, $r2);
                if (trim($lastcell) == $sent_endtext) {
                    $col2 = $x;
                    $x = 31; // to break the for loop
                }
            }
            $r2++;
        }
        // ---------------------------
        $last_row_no = $r2 - 1 - 1;
        // $last_row_no = '' ;
        //  $last_row_no .= $objWorksheet->getCellByColumnAndRow(8, 135) ;
        // ---------------------------
        $excell_header = array("first_row" => $first_row_no, "first_col" => $first_col_no, "last_row" => $last_row_no);
        return $excell_header;
    }

} // End of class
