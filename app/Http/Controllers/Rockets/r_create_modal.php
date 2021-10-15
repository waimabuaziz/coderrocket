<?php
namespace App\Http\Controllers\Rockets;

class r_create_modal
{
    public $rocket;

    public function __construct()
    {

        $this->rocket = array(

            // ====== Controller  ==============================
            // 'folder_page_controller' => array(
            //     'page_name' => 'page_name',
            //     'const->folder_name' => '',
            //     'const->dir_type' => 'controller',
            //     'const->dist_dir' => '',
            //     'overwrite' => 'overwrite',
            //     'funcs->page_create' => 'create_folder',
            // ),

            // ====== Public  ==============================
 
 // --> js /  events  /  <--> 
            'modal.js' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js/modals',
                'const->prefix' => 'modal_',
                'pure_name' => 'pure_name',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/modals/',
                'const->template_name' => 'modal',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

            // --> js /  events  /  <--> 
            'form.js' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js/forms',
                'const->prefix' => 'frm_',
                'pure_name' => 'pure_name',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/forms/',
                'const->template_name' => 'form',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
 

               // ====== View  ==============================

                // --> view /  modals  /  <--> 
                'modal.blade.php' => array(
                    'const->dir_type' => 'view',
                    'page_name' => 'page_name',
                    'const->parent_dir' => 'modals',
                    'const->prefix' => 'modal_',
                    'pure_name' => 'pure_name',
                    'const->file_ext' => '.blade.php',
                    'const->suffix' => '',
                    'const->dist_dir' => '',
                    'const->content_type' => 'template',
                    'const->content' => '',
                    'const->template_path' => 'AdminCast/view/modals/',
                    'template_name' => 'modal_type',
                    'const->template_ext' => '.php',
                    'overwrite' => 'overwrite',
                    'funcs->create_file' => 'create_file',
                ),

                    // --> view /  modals  /  <--> 
                    'form.blade.php' => array(
                        'const->dir_type' => 'view',
                        'page_name' => 'page_name',
                        'const->parent_dir' => 'forms',
                        'const->prefix' => 'frm_',
                        'pure_name' => 'pure_name',
                        'const->file_ext' => '.blade.php',
                        'const->suffix' => '',
                        'const->dist_dir' => '',
                        'const->content_type' => 'template',
                        'const->content' => '',
                        'const->template_path' => 'AdminCast/view/forms/',
                        'const->template_name' => 'form',
                        'const->template_ext' => '.php',
                        'overwrite' => 'overwrite',
                        'funcs->create_file' => 'create_file',
                    ),



// ### End Of View / forms   ###


        'append_line' => array(
            'page_name' => 'page_name' ,
            'const->dir_type' => 'view',
            'const->file_path_name_ext' => 'includes.blade.php',
            'const->content' => "@include('pages.__REPLACE_PAGENAME__.modals.modal___REPLACE_PURENAME__')",
            'funcs->append_string_to_file' => 'append_string_to_file',
        ) ,




        ); // End of rocket

        $this->rep_arr = array(
            'const->PHP' => '?php ', // __REPLACE_PHP__
            '$_REPLACE_PAGENAME_$' => 'page_name', // __REPLACE_PAGENAME__
            '__REPLACE_PAGENAME__' => 'page_name', // __REPLACE_PAGENAME__
            '$_REPLACE_PURENAME_$' => 'pure_name', // __REPLACE_PURENAME__
            '__REPLACE_PURENAME__' => 'pure_name', // __REPLACE_PAGENAME__
            '$_REPLACE_AJAXNAME_$' => 'ajax_name', // __REPLACE_PURENAME__
            '__REPLACE_AJAXNAME__' => 'ajax_name', // __REPLACE_PAGENAME__
            'const->$_REPLACE_TITLE_$' => 'new one here', // __REPLACE_MODEL_UPPER__
        ); // End of rep_arr

    } // End of constuct

} // ### End Of Class ###