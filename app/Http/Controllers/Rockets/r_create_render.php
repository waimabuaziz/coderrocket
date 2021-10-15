<?php
namespace App\Http\Controllers\Rockets;

class r_create_render
{
    public $rocket;

    public function __construct()
    {

        $this->rocket = array(

    

        // controller / pagename / render / <--> 
            'render_file' => array(
                'const->dir_type' => 'controller',
                'page_name' => 'page_name',
                'const->parent_dir' => 'renders',
                'const->prefix' => '',
                'pure_name' => 'render_name',
                'const->file_ext' => '.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/controller/renders/',
                'const->template_name' => 'render',
                'const->template_ext' => '.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
 
 

            // ====== Public  ==============================
 
 // --> js /  render  /  <--> 
            'render_func' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js/renders',
                'const->prefix' => '',
                'pure_name' => 'render_name',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/renders/',
                'const->template_name' => 'normal_render', 
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
 

            'view_render' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => 'renders',
                'const->prefix' => '',
                'pure_name' => 'render_name',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/renders/',
                'const->template_name' => 'render',
                'const->template_ext' => '.blade.php',
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
            '__REPLACE_RENDERNAME__' => 'render_name', // __REPLACE_PAGENAME__
            '$_REPLACE_RENDERNAME_$' => 'render_name', // __REPLACE_PURENAME__
            'const->$_REPLACE_TITLE_$' => 'new one here', // __REPLACE_MODEL_UPPER__
        ); // End of rep_arr

    } // End of constuct

} // ### End Of Class ###
