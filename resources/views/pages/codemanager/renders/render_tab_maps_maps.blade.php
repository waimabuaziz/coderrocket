@foreach($items as $item)

<div class="table-box">
    <div class="table-title">

        <div class="table-title-name">

            <span style="color:skyblue;"> {{$item->header['page_name']  }} </span>
            <span style="color:skyblue;"> / </span>
            <span style="color:dimgray;"> {{  $item->header['Name']  }} </span>



        </div>
        <div style="text-align:left ">
  
        <span style="float:left;margin: 2px 10px 2px 5px;">
                <i class="btn_tab_maps_save_entity far fa-save" style="font-size:16px;"
                    data-filename="{{$item->header['real_file_name']}}"
                    data-entityname="{{$item->header['Name']}}"
                    data-pagename="{{$item->header['page_name']}}"  
                    ></i>  
            </span>
            <span style="float:left;margin: 2px 10px 2px 5px;">
                <i class="btn_tab_maps_rowadd_entity fas fa-plus" style="font-size:16px;"
                    data-filename="{{$item->header['real_file_name']}}"
                    data-entityname="{{$item->header['Name']}}"
                    data-pagename="{{$item->header['page_name']}}"
                    ></i>  
            </span>
          


            <span class="badget-entity-type"
                style="background-color:{{ $item->header['EntityType_BGC']}};color:{{ $item->header['EntityType_Color']}};">
                {{   $item->header['EntityType'] }} </span>
            <span class="badget-entity-type"
                style="background-color:{{ $item->header['Status_BGC'] }};color:{{ $item->header['Status_Color'] }};">
                {{   $item->header['Status'] }} </span>

            <span class="badget-entity-type" style="background-color:white;color:dimgray;">
                {{  $item->header['real_file_name']   }} </span>

            <span style="float:right;margin-top:2px; margin-right:10px;">
                <i class="btn_tab_maps_delete_entity far fa-trash-alt"
                    data-filename="{{$item->header['real_file_name']}}"></i>
            </span>


           

        </div>


    </div>
    <div class="table-container">
        <table  id="tb_{{$item->header['page_name']}}_{{$item->header['Name']}}" class="tb_entity"  >
            <tbody>

                 @php 
                     $tr = 0 ; 
                @endphp

                @foreach($item->sub_items as $subitem)
                @php 
                     $tr +=1 ; 
                @endphp
                <tr class ="tr_{{$tr}}" data-cname = "tr_{{$tr}}" >
                    <td>
                        <div class="ibox ibox-success collapsed-mode" style="margin-bottom:2px;">
                            <div class="ibox-head" style="height:25px;padding:2px;padding:2px 4px ;">
                                <div class="ibox-title" style="font-size:12px;padding-left:15px;">
                                    <span style="color:darkgreen;">HTML</span>
                                    ({{$subitem->details['html_input_name'] }})
                                    &nbsp; |
                                    <span style="color:rgb(236, 238, 153);">SQL</span>
                                    ({{$subitem->details['sql_field_name'] }})
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

                                </div>
                            </div>
                            <div class="entity-row ibox-body" style="display: none;height:320px;">
                                <!-- entity start -->


                                <div class="entity-pan entity-pan-sql">
                                    <div class="badget" style="background-color:rgb(236, 238, 153);">
                                        SQL
                                    </div>
                                    <div class="content" style="background-color:whitesmoke;">

                                        <div class="pan-left"
                                            style="width:60%;height:100%;float:left;background-color:skyblue;">
                                            <span class="span-label"> <span>Field Name:</span>
                                                <span data-ftype="text" data-fname="sql_field_name"  class="entity-request span-editable" contenteditable="true">
                                                    {{$subitem->details['sql_field_name'] }}
                                                </span>
                                            </span>
                                            </br> <span class="span-label"> <span>Data Type </span>


                                                @php
                                                $varchar_par = '' ;
                                                $int_par = '' ;
                                                $datetime_par = '' ;
                                                $float_par = '' ;
                                                $decimal_par = '' ;
                                                $timestamp_par = '' ;
                                                switch($subitem->details['sql_datatype'] )
                                                {
                                                case 'varchar':
                                                $varchar_par = 'selected' ;
                                                break;
                                                case 'int':
                                                $int_par = 'selected' ;
                                                break;
                                                case 'datetime':
                                                $datetime_par = 'selected' ;
                                                break;
                                                case 'float':
                                                $float_par = 'selected' ;
                                                break;
                                                case 'decimal':
                                                $decimal_par = 'selected' ;
                                                break;
                                                case 'timestamp':
                                                $timestamp_par = 'selected' ;
                                                break;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="sql_datatype" class="entity-request pan_sel">
                                                    <option value="varchar" {{ $varchar_par }}>varchar</option>
                                                    <option value="int" {{ $int_par }}>int</option>
                                                    <option value="datetime" {{ $datetime_par }}>datetime</option>
                                                    <option value="float" {{ $float_par }}>float</option>
                                                    <option value="decimal" {{ $decimal_par }}>decimal</option>
                                                    <option value="timestamp" {{ $timestamp_par }}>timestamp</option>
                                                </select>



                                            </span>

                                            </br><span class="span-label"><span> Data Size </span>
                                                <span data-ftype="text" data-fname="sql_datasize" class="entity-request span-editable" contenteditable="true">
                                                    {{$subitem->details['sql_datasize'] }}
                                                </span>
                                            </span>

                                            </br> <span class="span-label"><span> Default value</span>
                                                <span data-ftype="text" data-fname="sql_defaultvalue" class="entity-request span-editable" contenteditable="true">
                                                    {{$subitem->details['sql_defaultvalue'] }}
                                                </span>
                                            </span>


                                        </div>

                                        <div class="pan-right"
                                            style="width:40%;height:100%;float:left;background-color:lightgreen;">
                                            <span class="span-label"> <span>Is Primary Key</span>
                                                @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['sql_is_key'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="sql_is_key" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                            </span>

                                            </br> <span class="span-label"><span> Is Update ID</span>
                                                @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['sql_is_updateid'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="sql_is_updateid" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                            </span>

                                            </br> <span class="span-label"> <span>Auto Increment</span>
                                                @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['sql_is_auto_increment'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="sql_is_auto_increment" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                            </span>
                                            </br> <span class="span-label"> <span>Allow Null </span>
                                                @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['sql_allow_null'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="sql_allow_null" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                            </span>

                                        </div>


                                    </div>
                                </div>

                                <div class="entity-pan entity-pan-html">
                                    <div class="badget" style="background-color:rgb(194, 240, 172);">
                                        HTML
                                    </div>
                                    <div class="content" style="background-color:whitesmoke;">


                                        <div class="pan-left"
                                            style="width:60%;height:100%;float:left;background-color:skyblue;">

                                            <span class="span-label"> <span>Input Name: </span>
                                                <span data-ftype="text" data-fname="html_input_name" class="entity-request span-editable " contenteditable="true">
                                                    {{$subitem->details['html_input_name'] }}
                                                </span>
                                            </span>



                                            </br> <span class="span-label"> <span>Input ID</span>
                                                <span data-ftype="text" data-fname="html_input_id" class="entity-request span-editable" contenteditable="true">
                                                    {{$subitem->details['html_input_id'] }}
                                                </span>
                                            </span>


                                        </div>

                                        <div class="pan-right"
                                            style="width:40%;height:100%;float:left;background-color:lightgreen;">

                                            <span class="span-label"> <span>Input Type
                                                </span>
                                                @php
                                                $text_par = '' ;
                                                $select_par = '' ;
                                                $date_par = '' ;
                                                $radio_par = '' ;
                                                $checkbox_par = '' ;

                                                switch($subitem->details['html_input_type'] )
                                                {
                                                case 'text':
                                                $text_par = 'selected' ;
                                                break;
                                                case 'select':
                                                $select_par = 'selected' ;
                                                break;
                                                case 'date':
                                                $date_par = 'selected' ;
                                                break;
                                                case 'radio':
                                                $radio_par = 'selected' ;
                                                break;
                                                case 'checkbox':
                                                $checkbox_par = 'selected' ;
                                                break;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="html_input_type" class="entity-request pan_sel">
                                                    <option value="text" {{ $text_par }}>text</option>
                                                    <option value="select" {{ $select_par }}>select</option>
                                                    <option value="date" {{ $date_par }}>date</option>
                                                    <option value="radio" {{ $radio_par }}>radio</option>
                                                    <option value="checkbox" {{ $checkbox_par }}>checkbox</option>
                                                </select>


                                            </span>

                                            </br><span class="span-label"> <span>Object type</span>

                                                @php
                                                $field_par = '' ;
                                                $table_par = '' ;
                                                switch($subitem->details['html_obj_type'] )
                                                {
                                                case 'text':
                                                $field_par = 'selected' ;
                                                break;
                                                case 'select':
                                                $table_par = 'selected' ;
                                                break;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="html_obj_type" class="entity-request pan_sel">
                                                    <option value="field" {{ $field_par }}>field</option>
                                                    <option value="table" {{ $table_par }}>table</option>
                                                </select>
                                            </span>
                                        </div>


                                        </span>



                                    </div>
                                </div>

                                <div class="entity-pan entity-pan-conf">
                                    <div class="badget" style="background-color:rgb(240, 172, 172);color:black;">
                                        Cinfiguration
                                    </div>
                                    <div class="content" style="background-color:silver;">
                                        <span class="span-label"> <span> Is Constant Value:
                                            </span>
                                  
                                            @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['conf_is_const'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="conf_is_const" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                            </span>
                                        </span>
                                      
                                        <span class="span-label"> <span> Const Value </span>
                                            <span data-ftype="text" data-fname="conf_const_val" class="entity-request span-editable" contenteditable="true">
                                                    {{$subitem->details['conf_const_val'] }}
                                                </span>
                                        </span>
                                       
                                        </br> <span class="span-label"> <span> Insert Mode </span>
                                     
                                            @php
                                                $row_par = '' ;
                                                $chil_par = '' ;
                                                switch($subitem->details['conf_insert_mode'] )
                                                {
                                                case 'true':
                                                $row_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $chil_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="conf_insert_mode" class="entity-request pan_sel">
                                                    <option value="row" {{ $row_par }}>Row</option>
                                                    <option value="child" {{ $chil_par }}>Child</option>
                                                </select>
                                        
                                        </span>
                                       
                                        </br> <span class="span-label"> <span> Is Sub Key
                                            </span>
                                      
                                            @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['conf_is_subkey'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="conf_is_subkey" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>

                                        </span>

                                        <span class="span-label"> <span> Sub Map </span>
                                            <span  data-ftype="text" data-fname="conf_sub_map"  class="entity-request span-editable"   contenteditable="true">
                                                /  {{$subitem->details['conf_sub_map'] }}
                                                </span>
                                        </span>
                                       
                                    </br>
                                        <span class="span-label"> <span> Is Inserted </span>
                                           
                                            @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['conf_is_inserted'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="conf_is_inserted" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                         </span>

                                        <span class="span-label"> <span> Is Retrived </span>
                                     
                                            @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['conf_is_retrived'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="conf_is_retrived"  class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>
                                        </span>

                                        <span class="span-label"> <span> Is Updated </span>
 
                                            @php
                                                $true_par = '' ;
                                                $false_par = '' ;
                                                switch($subitem->details['conf_is_updated'] )
                                                {
                                                case 'true':
                                                $true_par = 'selected' ;
                                                break;
                                                case 'false':
                                                $false_par = 'selected' ;
                                                }
                                                @endphp
                                                <select data-ftype="select" data-fname="conf_is_updated" class="entity-request pan_sel">
                                                    <option value="true" {{ $true_par }}>True</option>
                                                    <option value="false" {{ $false_par }}>False</option>
                                                </select>

                                        </span>
                                    </div>
                                </div>



                                <!-- entity end   -->
                            </div>
                        </div>


                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endforeach