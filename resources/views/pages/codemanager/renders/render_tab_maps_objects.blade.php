@foreach($items as $item)

<div class="tb_object_container">

    <table>
        <tr>
            <th>
                <span style="color:skyblue;"> {{$item->header['page_name']  }} </span>
                <span style="color:skyblue;"> / </span>
                <span style="color:dimgray;"> {{  $item->header['Name']  }} </span>
            </th>
        </tr>



        @foreach($item->sub_items as $subitem)

        <tr>
            <td>
                <div  class="open_rds btn_modal_open" data-modalid="modal_rds"  style="font-size:12px;padding-left:15px;">
                    <span style="color:darkgreen;"> </span>
                    ({{$subitem->details['html_input_name'] }})
               
                </div>
            </td>

        </tr>

        @endforeach


        <tbody>

        </tbody>
    </table>

</div>


@endforeach