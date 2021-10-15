<div class="row">
    @foreach($items as $item)
    
    <div class="card" style="width:320px;margin:5px;">
 
    <div class="card-header">
            <!-- <h6 class="m-0">   Medical Company </h6> -->
            <small class="text-muted">16 January 2014</small>
        </div>


        <div class="card-body">
            <p class="card-text" style="color:skyblue;font-size:32px;text-align:center;font-family:'Droid Arabic Naskh';">
                  {{ $item->itemname }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <a class="link-blue">
                <i class="far fa-frown-open" style="font-size:18px;"></i>
                 
             </a>
                <button class="btn btn-default btn-sm"> Details <i class="fa fa-share pull-rightx"></i></button>
            </div>
        </div>
    </div>

    @endforeach

</div> <!-- end of row -->