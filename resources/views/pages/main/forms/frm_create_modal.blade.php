<form id="frm_create_modal" action="javascript:;" method="post" novalidate="novalidate">


    <h6 class="m-t-10 m-b-10  clr-header">Create Modal</h6>

    <div class="alert alert-info alert-bordered">
        <strong>Create a new Modal rocket!</strong> </br>
        This rocket will create all the required files for Modal with form inside .

    </div>


    <div class="form-group">
        <input class="form-control" type="text" id="frm_create_modal_txt_pagename"
            name="frm_create_modal_txt_pagename" placeholder="Page Name " autocomplete="off">
    </div>

    <div class="form-group">
        <input class="form-control" type="text" id="frm_create_modal_txt_purename"
            name="frm_create_modal_txt_purename" placeholder="Pure Name " autocomplete="off">
    </div>



    <div class="row">
        <label class="m-l-15 clr-title">Modal Type</label>
        <div class="col-12 m-b-20">
            <div>

            <label class="ui-radio ui-radio-inline ui-radio-success tx-13">
                    <input type="radio" name="frm_create_modal_rbt_modal_type" data-val="xsmall" checked>
                    <span class="input-span"></span> X-Small  </label>

                <label class="ui-radio ui-radio-inline ui-radio-success tx-13">
                    <input type="radio" name="frm_create_modal_rbt_modal_type" data-val="small" checked>
                    <span class="input-span"></span> Small  </label>

                <label class="ui-radio ui-radio-inline ui-radio-success  tx-13">
                    <input type="radio" name="frm_create_modal_rbt_modal_type" data-val="medium">
                    <span class="input-span"></span> Medium  </label>

                    
                <label class="ui-radio ui-radio-inline ui-radio-success  tx-13">
                    <input type="radio" name="frm_create_modal_rbt_modal_type" data-val="large">
                    <span class="input-span"></span> Large  </label>

                    <label class="ui-radio ui-radio-inline ui-radio-success  tx-13">
                    <input type="radio" name="frm_create_modal_rbt_modal_type" data-val="xlarge">
                    <span class="input-span"></span> X-Large  </label>

            </div>
        </div>

      
    </div>

    <label class="m-l-15 clr-title">Overwrite</label>
    <div class="m-b-10">
        <label class="ui-checkbox ui-checkbox-inline">
            <input id="frm_create_modal_chb_overwrite" name="frm_create_modal_chb_overwrite" type="checkbox" checked>
            <span class="input-span"></span>overwrite if exist</label>

    </div>


   <div class="form-group">
        <button id="btn_modal_create_modal_submit" class="btn btn-info btn-block" type="button">Create Modal
            (luanch rocket)</button>
    </div>
</form>