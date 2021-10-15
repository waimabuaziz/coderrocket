@foreach($items as $item)

<div class="table-box">
    <div class="table-title">

        <div class="table-title-name">

            {{  $item->header['Name']  }}


        </div>
        <div style="text-align:left ">
            <span class="badget-entity-type"
                style="background-color:{{ $item->header['EntityType_BGC']}};color:{{ $item->header['EntityType_Color']}};">
                {{   $item->header['EntityType'] }} </span>
            <span class="badget-entity-type"
                style="background-color:{{ $item->header['Status_BGC'] }};color:{{ $item->header['Status_Color'] }};">
                {{   $item->header['Status'] }} </span>
        </div>

    </div>
    <div class="table-container">
        <table>
            <tbody>

                @foreach($item->sub_items as $subitem)
                <tr>
                    <td>


                        <div class="ibox ibox-success collapsed-mode" style="margin-bottom:2px;">
                            <div class="ibox-head" style="height:25px;padding:2px;padding:2px 4px ;">
                                <div class="ibox-title" style="font-size:12px;padding-left:15px;">
                                <span style="color:darkgreen;">HTML</span> ({{$subitem->details['html_input_name'] }})
                                &nbsp; |
                                <span style="color:rgb(236, 238, 153);">SQL</span> ({{$subitem->details['sql_field_name'] }})
                                </div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

                                </div>
                            </div>
                            <div class="ibox-body" style="display: none;height:280px;">
                               <!-- entity start -->

                               
                        <div class="entity-pan entity-pan-sql">
                            <div class="badget" style="background-color:rgb(236, 238, 153);">
                                SQL
                            </div>
                            <div class="content" style="background-color:whitesmoke;">
                                <span class="span-label"> <span>Field Name:</span>
                                    {{$subitem->details['sql_field_name'] }}
                                </span>
                                <span class="span-label"> <span>Primary Key</span>
                                    {{$subitem->details['sql_is_key'] }} </span>
                                </br> <span class="span-label"> <span>Auto Increment</span>
                                    {{$subitem->details['sql_is_auto_increment'] }}
                                </span>
                                  <span class="span-label"><span> Updated</span>
                                    {{$subitem->details['sql_is_updateid'] }} </span>
                            </div>
                        </div>

                        <div class="entity-pan entity-pan-html">
                            <div class="badget" style="background-color:rgb(194, 240, 172);">
                                HTML
                            </div>
                            <div class="content" style="background-color:whitesmoke;">
                                <span class="span-label"> <span>Input Name:
                                    </span>{{$subitem->details['html_input_name'] }}
                                </span>
                                <span class="span-label"> <span>Input ID</span> {{$subitem->details['html_input_id'] }}
                                </span>
                                </br> <span class="span-label"> <span>Input Type
                                    </span>{{$subitem->details['html_input_type'] }}
                                </span>
                                 <span class="span-label"> <span>Object type</span>
                                    {{$subitem->details['html_obj_type'] }}
                                </span>
                            </div>
                        </div>

                        <div class="entity-pan entity-pan-conf">
                            <div class="badget" style="background-color:rgb(240, 172, 172);color:black;">
                                Cinfiguration
                            </div>
                            <div class="content" style="background-color:silver;">
                                <span class="span-label"> <span> Is Constant Value:
                                    </span>{{$subitem->details['conf_is_const'] }}
                                </span>
                                <span class="span-label"> <span> Const Value </span>
                                    {{$subitem->details['conf_const_val'] }} </span>
                                    </br>   <span class="span-label"> <span> Insert Mode </span>
                                    {{$subitem->details['conf_insert_mode'] }} </span>
                                </br> <span class="span-label"> <span> Is Sub Key
                                    </span>{{$subitem->details['conf_is_subkey'] }}
                                </span>
                                <span class="span-label"> <span> Sub Map </span> {{$subitem->details['conf_sub_map'] }}
                                </span>
                                </br>
                                <span class="span-label"> <span> Is Inserted </span>
                                    {{$subitem->details['conf_is_inserted'] }} </span>

                                <span class="span-label"> <span> Is Retrived </span>
                                    {{$subitem->details['conf_is_retrived'] }} </span>

                                <span class="span-label"> <span> Is Updated </span>
                                    {{$subitem->details['conf_is_updated'] }} </span>
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