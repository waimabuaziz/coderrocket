<?php
namespace App\Http\Controllers\Rockets;

class r_create_page
{
    public $rocket;

    public function __construct()
    {

        $this->rocket = array(

            // ====== Controller  ==============================
            'folder_page_controller' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '',
                'const->dir_type' => 'controller',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

            'ajax_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/ajax',
                'const->dir_type' => 'controller',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

            'render_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/renders',
                'const->dir_type' => 'controller',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

            'sql_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/sql',
                'const->dir_type' => 'controller',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

            'map_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/map',
                'const->dir_type' => 'controller',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

            // ====== Public  ==============================

            'folder_page_public' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

// >>> Public / Links  >>>
            'links_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/links',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'links_css_links' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'links',
                'const->prefix' => '',
                'const->pure_name' => 'css_links',
                'const->file_ext' => '.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/links/',
                'const->template_name' => 'css_links',
                'const->template_ext' => '.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
            'links_js_links' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'links',
                'const->prefix' => '',
                'const->pure_name' => 'js_links',
                'const->file_ext' => '.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/links/',
                'const->template_name' => 'js_links',
                'const->template_ext' => '.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
// ### End Of Public / Links  ###

// >>> Public / css >>>
            'css_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/css',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

            'css_style_file' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'css',
                'const->prefix' => '',
                'const->pure_name' => 'style',
                'const->file_ext' => '.css',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/css/',
                'const->template_name' => 'style',
                'const->template_ext' => '.css',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
// ### End Of Public / css ###

// >>> Public / js >>>
            'js_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_init' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js',
                'const->prefix' => '',
                'const->pure_name' => 'init',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/',
                'const->template_name' => 'init',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
            'js_init_bypar_one' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js',
                'const->prefix' => '',
                'const->pure_name' => 'init_bypar_one',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/',
                'const->template_name' => 'init_bypar_one',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
            'js_init_bypar_tow' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js',
                'const->prefix' => '',
                'const->pure_name' => 'init_bypar_tow',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/',
                'const->template_name' => 'init_bypar_tow',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
            'js_init_bypar_three' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js',
                'const->prefix' => '',
                'const->pure_name' => 'init_bypar_three',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/',
                'const->template_name' => 'init_bypar_three',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

            'js_core' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/core',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_core_defaults' => array(
                'const->dir_type' => 'public',
                'page_name' => 'page_name',
                'const->parent_dir' => 'js/core',
                'const->prefix' => '',
                'const->pure_name' => 'defaults',
                'const->file_ext' => '.js',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/public/js/core/',
                'const->template_name' => 'defaults',
                'const->template_ext' => '.js',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

            'js_lib' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/lib',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_events' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/events',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_functions' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/functions',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_ajax' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/ajax',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_renders' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/renders',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_modals' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/modals',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'js_forms' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/js/forms',
                'const->dir_type' => 'public',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),

// ### End Of Public / js ###

            // ====== View ===================================================
            'view_folder' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '',
                'const->dir_type' => 'view',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'view_init' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => '',
                'const->prefix' => '',
                'const->pure_name' => 'init',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/',
                'const->template_name' => 'init',
                'const->template_ext' => '.blade.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),
            'view_includes' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => '',
                'const->prefix' => '',
                'const->pure_name' => 'includes',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/',
                'const->template_name' => 'includes',
                'const->template_ext' => '.blade.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

// >>> View / body  >>>
            'view_body' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/body',
                'const->dir_type' => 'view',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
            'view_body_main' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => 'body',
                'const->prefix' => '',
                'const->pure_name' => 'main',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/body/',
                'const->template_name' => 'main',
                'const->template_ext' => '.blade.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

            'view_body_content' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => 'body',
                'const->prefix' => '',
                'const->pure_name' => 'content',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/body/',
                'const->template_name' => 'content',
                'const->template_ext' => '.blade.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

            'view_body_top_header' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => 'body',
                'const->prefix' => '',
                'const->pure_name' => 'top_header',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/body/',
                'const->template_name' => 'top_header',
                'const->template_ext' => '.blade.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),


            'view_body_side_bar' => array(
                'const->dir_type' => 'view',
                'page_name' => 'page_name',
                'const->parent_dir' => 'body',
                'const->prefix' => '',
                'const->pure_name' => 'side_bar',
                'const->file_ext' => '.blade.php',
                'const->suffix' => '',
                'const->dist_dir' => '',
                'const->content_type' => 'template',
                'const->content' => '',
                'const->template_path' => 'AdminCast/view/body/',
                'const->template_name' => 'side_bar',
                'const->template_ext' => '.blade.php',
                'overwrite' => 'overwrite',
                'funcs->create_file' => 'create_file',
            ),

// ### End Of View / body   ###

// >>> View / modals  >>>
            'view_modals' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/modals',
                'const->dir_type' => 'view',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
// ### End Of View / modals   ###

            // >>> View / forms  >>>
            'view_forms' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/forms',
                'const->dir_type' => 'view',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
// ### End Of View / forms   ###

            // >>> View / renders  >>>
            'view_renders' => array(
                'page_name' => 'page_name',
                'const->folder_name' => '/renders',
                'const->dir_type' => 'view',
                'const->dist_dir' => '',
                'overwrite' => 'overwrite',
                'funcs->page_create' => 'create_folder',
            ),
// ### End Of View / forms   ###




            // ====== Router ===================================================

            // 'add_router' => array(
            //     'page_name' => 'page_name' ,
            //     'const->par_count' => '0',
            //     'const->file_path' => 'web.php',
            //     'funcs->add_router' => 'add_router',
            // ) ,
            // ====== End of Router ===================================================

        ); // End of rocket

        $this->rep_arr = array(
            'const->PHP' => '?php ', // __REPLACE_PHP__
            '$_REPLACE_PAGENAME_$' => 'page_name', // __REPLACE_PAGENAME__
            '__REPLACE_PAGENAME__' => 'page_name', // __REPLACE_PAGENAME__
            '$_REPLACE_PURENAME_$' => 'pure_name', // __REPLACE_PURENAME__
            'const->$_REPLACE_TITLE_$' => 'new one here', // __REPLACE_MODEL_UPPER__
        ); // End of rep_arr

    } // End of constuct

} // ### End Of Class ###
