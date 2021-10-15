<div class="page-heading">
    <h1 class="page-title"> Excel To SQL </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item"> CoderRocket / Excel To SQL </li>
    </ol>
</div>








<div class="row mg-b-25">

    <div class="col-lg-12">
        <div class="form-group" style="display:none;">
            <!-- upload input  -->
            <label id="bos_UploadedSheet_IDLink" data-id="bos_UploadedSheet_ID" for="bos_UploadedSheet_ID"
                class="btn btn-outline-info"> upload file</label>
            <input data-htmltype="excel" type="file" name="bos_UploadedSheet_ID" id="bos_UploadedSheet_ID"
                data-type="field" data-ret="" class="request inputfile">
            <!--   end of upload input      -->
            <!-- progress-bar -->
            <div class="progress mg-t-5 " style="height:20px;line-height:20px;">
                <div id="bos_UploadedSheet_IDProgressbar" class="progress-bar progress-bar-striped  bg-success "
                    role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                    style="display:none;font-size:11px;">
                </div>
            </div> <!-- end of progress-bar -->
        </div><!-- End form-group  -->
    </div><!-- col-12 -->


</div><!-- row -->



<div class="row mg-b-25">

    <div class="col-lg-12">
        <button id="btn_render" class="btn btn-outline-success m-t-20" style="margin-left:30px;"> Render </button>

        <button id="btn_migrate_staff_earn_result" class="btn btn-outline-info   m-t-20" style="margin-left:30px;">
            Migraste Staff Earn Results </button>

        <button id="btn_migrate_bc_target_result" class="btn btn-outline-warning   m-t-20" style="margin-left:30px;">
            Migraste BC Target Results </button>



        <button id="btn_export_results" class="btn btn-outline-info   m-t-20" style="margin-left:30px;">
            Export Results To Excell </button>


    </div><!-- col -->

</div><!-- row -->




<div id="result_render_test" style="margin-left:20px;padding:20px;">




</div>