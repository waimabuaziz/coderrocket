<?php
namespace App\Http\Controllers\Rockets;

class r_create_ajax
{
    public $rocket;

    public function __construct()
    {

        $this->rocket = array(

    

        // pagename / ajax / <--> 
            'ajax_file' => array(
                'const->dir_type' => 'controller',
                'page_name' => 'page_name',
                'const->parent_dir' => 'ajax',
                'const->prefix' => '',
                'pure_name' => 'ajax_name',
                'const->file_ext' => '.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/controller/ajax/',
                'const->template_name' => 'ajax',
                'const->template_ext' => '.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
 
 

            // ====== Public  ==============================
 
 // --> js /  ajax  /  <--> 
            'ajax_func' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js/ajax',
                'const->prefix' => '_',
                'pure_name' => 'ajax_name',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/ajax/',
                'template_name' => 'ajax_type', 
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
 
            
// ### End Of View / forms   ###

        ); // End of rocket

        $this->rep_arr = array(
            'const->PHP' => '?php ', // __REPLACE_PHP__
            '$_REPLACE_PAGENAME_$' => 'page_name', // __REPLACE_PAGENAME__
            '__REPLACE_PAGENAME__' => 'page_name', // __REPLACE_PAGENAME__
            '$_REPLACE_PURENAME_$' => 'pure_name', // __REPLACE_PURENAME__
            '__REPLACE_AJAXNAME__' => 'ajax_name', // __REPLACE_PAGENAME__
            '$_REPLACE_AJAXNAME_$' => 'ajax_name', // __REPLACE_PURENAME__
            'const->$_REPLACE_TITLE_$' => 'new one here', // __REPLACE_MODEL_UPPER__
        ); // End of rep_arr

    } // End of constuct

} // ### End Of Class ###
