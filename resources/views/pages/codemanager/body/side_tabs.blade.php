<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Coder Manager Tabs </div>

     


        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-outline-default" style="margin-left:10px;box-shadow:1px 1px 1px silver;">
                <!-- <i class="fa fa-check active-visible"></i> -->
                <i class="fas fa-database"></i>
                <input type="radio">
            </label>
            <label class="btn btn-outline-default active" style="margin-left:10px;box-shadow:1px 1px 1px silver;">
                <!-- <i class="fa fa-check active-visible"></i> -->
                <i class="fab fa-creative-commons-share"></i>
                <input type="radio">
            </label>

         

        </div>


    </div>
    <div class="ibox-body">

        <div class="clf">
            <ul class="nav nav-tabs tabs-line-left">
                <li class="nav-item">
                    <a class="nav-link " href="#tab_database" data-tab="database" data-toggle="tab" aria-expanded="true">
                        <i class="fas fa-database"></i>
                        Database
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#tab_maps" data-tab="maps"  data-toggle="tab" aria-expanded="true">
                        <i class="fas fa-project-diagram"></i>
                        Maps
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tab-9-2" data-tab="ajax"  data-toggle="tab" aria-expanded="false">
                        <i class="fas fa-poo-storm"></i>
                        Ajax
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-9-3" data-tab="fiunctions"  data-toggle="tab" aria-expanded="false">
                        <i class="fa fa-life-ring"></i>
                        Functions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tab-9-4" data-tab="events"  data-toggle="tab" aria-expanded="false">
                        <i class="far fa-keyboard"></i>
                        Events
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tab-9-5" data-tab="renders"  data-toggle="tab" aria-expanded="false">
                        <i class="fas fa-paint-brush"></i>
                        Renders
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tab-9-6" data-tab="modals"  data-toggle="tab" aria-expanded="false">
                        <i class="far fa-object-group"></i>
                        Modals
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#tab_forms" data-tab="forms"  data-toggle="tab" aria-expanded="false">
                        <i class="fas fa-file-invoice"></i>
                        Forms
                    </a>
                </li>

            </ul>
            <div class="tab-content">

                <div class="tab-pane " id="tab_database" aria-expanded="true">
                    @include('pages.codemanager.tabs.tab_database')
                </div>
                <div class="tab-pane active" id="tab_maps" aria-expanded="true">
                    @include('pages.codemanager.tabs.tab_maps')
                </div>
                <div class="tab-pane" id="tab-9-2" aria-expanded="false">
                    @include('pages.codemanager.tabs.tab_ajax')
                </div>
                <div class="tab-pane" id="tab-9-3" aria-expanded="false">
                    @include('pages.codemanager.tabs.tab_functions')
                </div>
                <div class="tab-pane" id="tab-9-4" aria-expanded="false">
                    @include('pages.codemanager.tabs.tab_events')
                </div>
                <div class="tab-pane" id="tab-9-5" aria-expanded="false">
                    @include('pages.codemanager.tabs.tab_renders')
                </div>
                <div class="tab-pane" id="tab-9-6" aria-expanded="false">
                    @include('pages.codemanager.tabs.tab_modals')
                </div>
                <div class="tab-pane " id="tab_forms" aria-expanded="false">
                    @include('pages.codemanager.tabs.tab_forms')
                </div>

            </div>
        </div><br>

    </div>
</div>