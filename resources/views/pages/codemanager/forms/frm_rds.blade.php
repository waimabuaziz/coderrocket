<form id="frm_rds" action="javascript:;" method="post" novalidate="novalidate" data-updateid="0" data-mode="insert">


    <div class="ibox-body">
        <ul class="nav    ">
            <li class="nav-item">
                <div class="tab_link   active" data-tab="rds-sql"    aria-expanded="true">
                <i class="fas fa-database"></i> SQL</div>
            </li>
            <li class="nav-item">
                <div class="tab_link "  data-tab="rds-html"   aria-expanded="false"> 
                    <i class="fab fa-html5"></i>
                 HTML</div>
            </li>
            <li class="nav-item">
                <div class="tab_link"   data-tab="rds-config"   aria-expanded="false"> 
                <i class="fas fa-sliders-h"></i>   Config</div>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane  tab-pane-rds" id="tab-rds-sql" aria-expanded="true"> 
                @include('pages.codemanager.forms.sub_form.rds_sql')
            </div>
            <div class="tab-pane tab-pane-rds" id="tab-rds-html" aria-expanded="false">
            @include('pages.codemanager.forms.sub_form.rds_html')
            </div>
            <div class="tab-pane tab-pane-rds" id="tab-rds-config" aria-expanded="false">
            @include('pages.codemanager.forms.sub_form.rds_config')
            </div>
        </div><br>  
    </div>




    <div class="form-group">
        <button id="btn_modal_rds_submit" class="btn btn-info btn-block" type="button">rds
            (submit)</button>
    </div>
</form>