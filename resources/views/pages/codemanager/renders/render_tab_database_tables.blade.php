@foreach($items as $item)
    
 <div class="table-box">
     <div class="table-title">

         <div class="table-title-name">
            
         {{  $item->header['Name']  }}

         </div>
         <div style="text-align:left ">
             <span class="badget-entity-type" style="background-color:{{ $item->header['EntityType_BGC']}};color:{{ $item->header['EntityType_Color']}};">
                 {{   $item->header['EntityType'] }} </span>
             <span class="badget-entity-type" style="background-color:{{ $item->header['Status_BGC'] }};color:{{ $item->header['Status_Color'] }};">
                 {{   $item->header['Status'] }} </span>
         </div>

     </div>
     <table>
         <tbody>
            
         @foreach($item->sub_items as $subitem)
             <tr>
                 <td>
                     <span class="span-fieldname">  {{$subitem->details['FieldName'] }} </span>
                     </br>
                     <span class="span-datatype">  {{$subitem->details['DataType'] }}   </span>
                     <span class="span-datalenght">  {{$subitem->details['DataLenght'] }}   </span>

                     <span class="span-isnull">   {{$subitem->details['IsNull'] }}  </span>
                 </td>
             </tr>
             @endforeach

         </tbody>
     </table>
 </div>


 @endforeach
 