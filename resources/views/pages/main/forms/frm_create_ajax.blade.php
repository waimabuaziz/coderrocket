<form id="frm_create_ajax" action="javascript:;" method="post" novalidate="novalidate">


    <h6 class="m-t-10 m-b-10  clr-header">Create AJAX</h6>

    <div class="alert alert-info alert-bordered">
        <strong>Create a new AJAX rocket!</strong> </br>
        This rocket will create all the required files for Ajax.

    </div>


    <div class="form-group">
        <input class="form-control" type="text" id="frm_create_ajax_txt_pagename"
            name="frm_create_ajax_txt_pagename" placeholder="Page Name " autocomplete="off">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" id="frm_create_ajax_txt_ajaxname"
            name="frm_create_ajax_txt_ajaxname" placeholder="Ajax Name " autocomplete="off">
    </div>



    <div class="row">
        <label class="m-l-15 clr-title">Ajax Type</label>
        <div class="col-12 m-b-20">
            <div>
                <label class="ui-radio ui-radio-inline ui-radio-success tx-13">
                    <input type="radio" name="frm_create_ajax_rbt_ajax_type" data-val="normal_ajax" checked>
                    <span class="input-span"></span>Normal Ajax</label>

                <label class="ui-radio ui-radio-inline ui-radio-warning  tx-13">
                    <input type="radio" name="frm_create_ajax_rbt_ajax_type" data-val="rocket_ajax">
                    <span class="input-span"></span>Rocket Ajax</label>

            </div>
        </div>

        <label class="m-l-15 clr-title">Parameters</label>

        <div class="col-12 m-b-20">
            <div class="form-group">
                <input class="form-control" type="text" id="frm_create_ajax_txt_parname"
                    name="frm_create_ajax_txt_parname" placeholder="Parameter Name " autocomplete="off">
            </div>

            <div class="form-group">
                <input class="form-control" type="text" id="frm_create_ajax_txt_parvalue"
                    name="frm_create_ajax_txt_parvalue" placeholder="Parameter Value " autocomplete="off">
            </div>

            <button id="btn_add_ajax_par" class="btn btn-info btn-block m-b-10" type="button"> Add Parmeter</button>


            <table id="tb_create_ajax_pars">
                <tr>
                    <th>Parameter Name</th>
                    <th>Parameter Value</th>
                    <th>Remove</th>
                </tr>
                <!-- <tr>
                    <td>sys_ajax_name</td>
                    <td>Maria Anders</td>
                    <td> <i class="i_remove_per far fa-trash-alt"></i> </td>
                </tr> -->
                
            </table>


        </div>

    </div>

    <label class="m-l-15 clr-title">Overwrite</label>
    <div class="m-b-10">
        <label class="ui-checkbox ui-checkbox-inline">
            <input id="frm_create_ajax_chb_overwrite" name="frm_create_ajax_chb_overwrite" type="checkbox" checked>
            <span class="input-span"></span>overwrite if exist</label>

    </div>





    <div class="form-group">
        <button id="btn_modal_create_ajax_submit" class="btn btn-info btn-block" type="button">Create Ajax
            (luanch rocket)</button>
    </div>
</form>