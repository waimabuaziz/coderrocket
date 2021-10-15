<form id="frm_createpage" action="javascript:;" method="post" novalidate="novalidate">


    <h6 class="m-t-10 m-b-10  clr-header">Create New Page</h6>

    <div class="alert alert-info alert-bordered">
    <strong>Create a new page rocket!</strong> </br>
    This rocket will create all the required folders and files for a new page.
 
    </div>


    <div class="form-group">
        <input class="form-control" type="text" id="modal_createpage_txt_pagename" name="modal_createpage_txt_pagename"
            placeholder="Page Name " autocomplete="off">
    </div>



    <div class="row">
        <label class="m-l-15 clr-title">Security Type</label>
        <div class="col-12 m-b-20">
            <div>
                <label class="ui-radio ui-radio-inline ui-radio-success tx-13">
                    <input type="radio" name="modal_createpage_rbt_security_type" data-val="public" checked>
                    <span class="input-span"></span>Public</label>

                <label class="ui-radio ui-radio-inline ui-radio-warning  tx-13">
                    <input type="radio" name="modal_createpage_rbt_security_type" data-val="middleware">
                    <span class="input-span"></span>Middleware</label>

            </div>
        </div>

        <label class="m-l-15 clr-title">Parameters</label>
        <div class="col-12 m-b-20">
            <div class="check-list">

                <label class="ui-radio   tx-13">
                    <input type="radio" name="modal_createpage_rbt_parameters_count" checked data-val="0">
                    <span class="input-span"></span>None Parameters</label>

                <label class="ui-radio  tx-13 ">
                    <input type="radio" name="modal_createpage_rbt_parameters_count" data-val="1">
                    <span class="input-span"></span>One Parameter</label>

                <label class="ui-radio  tx-13 ">
                    <input type="radio" name="modal_createpage_rbt_parameters_count" data-val="2">
                    <span class="input-span"></span>Tow Parameters</label>

                <label class="ui-radio   tx-13">
                    <input type="radio" name="modal_createpage_rbt_parameters_count" data-val="3">
                    <span class="input-span"></span>Three Parameters</label>

            </div>
        </div>

    </div>

    <label class="m-l-15 clr-title">Overwrite</label>
    <div class="m-b-10">
        <label class="ui-checkbox ui-checkbox-inline">
            <input id="modal_createpage_chb_overwrite" name="modal_createpage_chb_overwrite" type="checkbox" checked>
            <span class="input-span"></span>overwrite if exist</label>

    </div>





    <div class="form-group">
        <button id="btn_modal_createpage_submit" class="btn btn-info btn-block" type="button">Create Page
            (rocket)</button>
    </div>
</form>