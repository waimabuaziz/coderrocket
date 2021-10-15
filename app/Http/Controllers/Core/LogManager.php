<?php
namespace App\Http\Controllers\Core;

class LogManager
{

    public $MODE;
    private $LOGFILE;

    public function __construct()
    {
        $this->MODE = 'debug';
        $this->LOGFILE = app_path() . '/Http' . '/' . 'Controllers' . '/' . 'Log' . '/' . 'log.php';
    }
    ## =======================================================

    public function printlog($sentstr)
    {
        
        if ($this->MODE == 'debug') {
            $line =   "\n" .$sentstr;
            $file_path = $this->LOGFILE;
            $file = fopen($file_path, 'a');
            fwrite($file, "\n" . $line);
            fclose($file);
        }

    }

    public function print($state,$sentstr)
    {
        
        if ($state == true) {
            $line =   "\n" .$sentstr;
            $file_path = $this->LOGFILE;
            $file = fopen($file_path, 'a');
            fwrite($file, "\n" . $line);
            fclose($file);
        }

    }

    public function clearlog()
    {
        if ($this->MODE == 'debug') {
            $file_path = $this->LOGFILE;
            file_put_contents($file_path, '');

            $today = date("D M j G:i:s T Y");           // Sat Mar 10 17:16:18 MST 2001
            $this->printlog(' === ' .  $today . " === " );
        }

    }

} // ### End Of Class  ###
