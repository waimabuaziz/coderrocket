<?php
namespace App\Http\Controllers\Pages\codemanager\maps;

class map_create_entity
{
    public $content;
    public $model;
    public $pagename;
    public $tablekey;

    public function __construct()
    {
        $this->tablekey = 'Test_ID';
        $this->retrivescript = 's_retrive_test';
        $this->pagename = 'codemanager';
        $this->model = new \App\Models\Test();
        $this->crud_type = 'json';
        $this->content = array(

            'entity_proerties' => array(
                'htmlname_rowscount' => 'frm_create_entity_txt_entity_rows',
                'htmlname_pagename' => 'frm_create_entity_txt_page_name',
                'htmlname_entityname' => 'frm_create_entity_txt_entity_name',
               ),
         

        ); // end of content array

    } // End of construc
} // ### End Of Class ###
