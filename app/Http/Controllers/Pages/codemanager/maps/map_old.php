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
        $this->crud_type = 'mysql';
        $this->content = array(

            'Test_ID' => array(
                'htmlname' => 'frm_create_entity_txt_entity_name',
                'htmlid' => 'frm_create_entity_txt_entity_name',
                'sqlname' => 'Test_ID',
                'issqlprimary' => 'true',
                'isupdateid' => 'true',
                'type' => 'field',
                'htmltype' => 'text',
                'inserttype' => 'sql_row',
                'isconst' => 'false',
                'constval' => '',
                'issubkey' => 'false',
                'submap' => 'undefined',
                'isretrived' => 'true',
                'isinserted' => 'false',
                'isupdated' => 'false',
            ),
            'TestName' => array(
                'htmlname' => 'frm_create_entity_txt_entity_name',
                'htmlid' => 'frm_create_entity_txt_entity_name',
                'sqlname' => 'TestName',
                'issqlprimary' => 'false',
                'isupdateid' => 'false',
                'type' => 'field',
                'htmltype' => 'text',
                'inserttype' => 'sql_row',
                'isconst' => 'false',
                'constval' => '',
                'ischild' => 'false',
                'submap' => 'undefined',
                'isretrived' => 'true',
                'isinserted' => 'true',
                'isupdated' => 'true',
            ),
            'Description' => array(
                'htmlname' => 'frm_create_entity_txt_entity_name',
                'htmlid' => 'frm_create_entity_txt_entity_name',
                'sqlname' => 'Description',
                'issqlprimary' => 'false',
                'isupdateid' => 'false',
                'type' => 'field',
                'htmltype' => 'text',
                'inserttype' => 'sql_row',
                'isconst' => 'true',
                'constval' => 'const me',
                'ischild' => 'false',
                'submap' => 'undefined',
                'isretrived' => 'true',
                'isinserted' => 'true',
                'isupdated' => 'true',
            ),
            'Notes' => array(
                'htmlname' => 'note_child',
                'htmlid' => 'note_child',
                'sqlname' => 'none',
                'issqlprimary' => 'false',
                'isupdateid' => 'false',
                'type' => 'field',
                'htmltype' => 'text',
                'inserttype' => 'sql_child',
                'isconst' => 'true',
                'constval' => 'empty',
                'ischild' => 'true',
                'submap' => 'undefined',
                'isretrived' => 'true',
                'isinserted' => 'true',
                'isupdated' => 'true',
            ),

        ); // end of content array

    } // End of construc
} // ### End Of Class ###
