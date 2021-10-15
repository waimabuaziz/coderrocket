<div class="row">
    @foreach($items as $item)
   
    <div class="col-lg-4 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
            <div class="ibox-body box-shadow">
                <h2 class="m-b-5 font-strong col-dimgray tx-20">{{  $item->foldername  }}</h2>
                <div class="m-b-5 col-gray"> (public)</div>
                <i class="widget-stat-icon"></i>
              
                <div>
                    <small> {{ $item->foldername }} </small></br>
                    <small>3 Functions </small></br>
                    <small>4 Render </small></br>
                    <small>8 Events </small></br>
                </div>
            </div>
            <button type="button" CLASS="btn_page_delete"> DELETE </button>
        </div>

       
    </div>
    @endforeach




</div> <!-- end of row -->