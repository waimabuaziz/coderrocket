<div class="row">

<div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Employees Rewards Results </div>
                            </div>
                            <div class="ibox-body">
                                <table id="tb_test" class="table table-hover">
                                    <thead>
                                        <tr class="thtr ">
                                          
                                            <th>BC Name</th>
                                            <th>Staff ID</th>
                                            <th>Employment NO</th>
                                            <th>Employee Name</th>
                                            <th>Email</th>
                                            <th>Employee Earns (LYD) </th>
                                            <th>Emp Earn Over 1% </th>
                                            <th>Employee Reward  (LYD) </th>
                                            <th> BCTarget (Others) </th>
                                            <th>BCEarn (Others)</th>
                                            <th>BCAchivmentPerc (Others)</th>
                                            <th>BCReward</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                           
                                            <td> {{ $item->BCName }}</td>
                                            <td> {{ $item->Staff_ID }}</td>
                                            <td> {{ $item->EmployeeNO }}</td>
                                            <td> {{ $item->EmployeeName }}</td>
                                            <td> {{ $item->Email }}</td>
                                            <td> {{ number_format($item->EmpolyeeEarns,0) }}</td>
                                            <td> {{ $item->has_reward }}</td>
                                            <td> {{ number_format($item->EmployeeReward,0) }}</td>
                                            <td> {{ number_format($item->BCTarget,0) }}</td>
                                            <td> {{ number_format($item->BCEarn,0) }}</td>
                                            <td> {{ $item->BCAchivmentPerc }}</td>
                                            <td> {{ number_format($item->BCReward,0) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>




     

 

</div> <!-- end of row -->