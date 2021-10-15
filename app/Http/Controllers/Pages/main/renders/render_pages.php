<?php
namespace App\Http\Controllers\Pages\main\renders;

use App\Http\Controllers\Core\MainCore;

class render_pages extends MainCore
{

    public function main($request)
    {
        $render_name = $request->sys_render_name;
        $page_name = $request->sys_page_name;
        $script_path = $page_name . "\sql";

        $subdir_arr = $this->get_system_pages();
        $retarr = array(
            'test_par' => '1',
            'folder_names' => $subdir_arr[0],
        );

        //  $par_arr = array('par' => 1); // add pars as required
        //  $items = $this->SQL->get_table($script_path, 's_' . $render_name, $par_arr);
        $items = collect([
        ]);

        foreach ($subdir_arr as $value) {

            $newitem = (object) [
                'foldername' => $value,
                'url' => 'google.com',
            ];
            $items->push($newitem);
        }
        return [$retarr, $items];
    }

    public function get_system_pages()
    {
        $somePath = app_path() . "/Http/Controllers/Pages";
        $ret = $this->FolderManager->get_folders_subdir($somePath);
        # $this->LOG->printlog('FolderManager:' . $ret[0]);
        return $ret;
    }

} // ### End Of Class  ###
