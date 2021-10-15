<div class="row">




    <div class="card" style="width:300px;margin:20px;">
       
            <img class="card-img-top" style="width:100%;height:200px;;" src="{{ env('APP_URL_LINK')}}/pages/gorcery/img/oil_corn_baraka.jpg">
         

        <div class="card-body">
            <h4 class="card-title">Jane Smith</h4>
            <div>Some quick example text.</div>
        </div>
        <ul class="list-group list-group-divider no-margin">
            <li class="list-group-item" style="border-top-color:#e1eaec;">Sales
                <span class="badge badge-danger badge-circle float-right">4</span>
            </li>
            <li class="list-group-item">Photos
                <span class="badge badge-info badge-circle float-right">7</span>
            </li>
            <li class="list-group-item">Friends
                <span class="badge badge-warning badge-circle float-right">24</span>
            </li>
        </ul>
        <div class="card-footer">
            <a class="text-info"><i class="fa fa-star"></i> Follow</a>
            <span class="pull-right text-muted font-13">Joined in 12.01</span>
        </div>
    </div>




    <div class="card" style="width:300px;margin:20px;">
        <img class="card-img-top" src="{{ env('APP_URL_LINK')}}/pages/gorcery/img/rice_sos_1.jpg">
        <div class="card-body">
            <h4 class="card-title">Jane Smith</h4>
            <div>Some quick example text.</div>
        </div>
        <ul class="list-group list-group-divider no-margin">
            <li class="list-group-item" style="border-top-color:#e1eaec;">Sales
                <span class="badge badge-danger badge-circle float-right">4</span>
            </li>
            <li class="list-group-item">Photos
                <span class="badge badge-info badge-circle float-right">7</span>
            </li>
            <li class="list-group-item">Friends
                <span class="badge badge-warning badge-circle float-right">24</span>
            </li>
        </ul>
        <div class="card-footer">
            <a class="text-info"><i class="fa fa-star"></i> Follow</a>
            <span class="pull-right text-muted font-13">Joined in 12.01</span>
        </div>
    </div>




    <div class="card" style="width:300px;margin:20px;">
        <img class="card-img-top" src="{{ env('APP_URL_LINK')}}/pages/gorcery/img/spiga1.jpg">
        <div class="card-body">
            <h4 class="card-title">Jane Smith</h4>
            <div>Some quick example text.</div>
        </div>
        <ul class="list-group list-group-divider no-margin">
            <li class="list-group-item" style="border-top-color:#e1eaec;">Sales
                <span class="badge badge-danger badge-circle float-right">4</span>
            </li>
            <li class="list-group-item">Photos
                <span class="badge badge-info badge-circle float-right">7</span>
            </li>
            <li class="list-group-item">Friends
                <span class="badge badge-warning badge-circle float-right">24</span>
            </li>
        </ul>
        <div class="card-footer">
            <a class="text-info"><i class="fa fa-star"></i> Follow</a>
            <span class="pull-right text-muted font-13">Joined in 12.01</span>
        </div>
    </div>



    @foreach($items as $item)






    @endforeach

</div> <!-- end of row -->