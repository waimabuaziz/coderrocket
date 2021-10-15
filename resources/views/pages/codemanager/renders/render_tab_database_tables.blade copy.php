 @foreach($retarr['par_json'] as $key => $item)

 <div class="table-box">
     <div class="table-title">
        
        
         {{ $key }}

     </div>
     <table>
         <tbody>
             @foreach($item as $jsonitem)
             <tr>
                 <td>
                     <span class="span-fieldname">  {{ $jsonitem['FieldName'] }} </span>
                     </br>
                     <span class="span-datatype"> {{ $jsonitem['DataType'] }} </span>
                     <span class="span-datalenght">  {{ $jsonitem['DataLenght'] }}   </span>

                     <span class="span-isnull">   {{ $jsonitem['IsNull'] }}   </span>
                 </td>
             </tr>
             @endforeach

         </tbody>
     </table>
 </div>



 @endforeach