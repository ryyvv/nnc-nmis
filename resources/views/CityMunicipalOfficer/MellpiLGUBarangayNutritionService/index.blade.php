<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'MELLPI PRO For LGU Profile',
'activePage' => 'NutritionPolicies',
'activeNav' => '',
])

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <!-- <a href="{{route('formsb.index')}}"> -->
                    <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5>
                <!-- </a> -->

            </div>
            

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message') 
 

            <div class="content" style="margin:30px;">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')
               
                <div class="row-12">
                    <a href="{{route('CMOLGUprofile.create')}}" class="btn btn-primary bolder">Create data</a>
                </div>

                <div class="row-12">
                    <table class="display" id="myTable" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" class="tableheader">#</th>
                                <th scope="col-4" class="tableheader">Personnel Submitted</th>
                                <th scope="col-4" class="tableheader">GeoLevel</th>
                                <th scope="col-4" class="tableheader">Date Monitoring </th>
                                <th scope="col" class="tableheader">Period Covered</th>
                                <th scope="col-2" class="tableheader">Status</th>
                                <th scope="col" class="tableheader">Action</th> 
                            </tr>
                        </thead>
                        <tbody>

                            <?php $num = 1; ?>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$num}}</td>
                                <td>Ryan James J. Pascual</td>
                                <td>Barangay</td>
                                <td>{{\Carbon\Carbon::parse($data->dateMonitoring)->format('F j, Y');}}</td>
                                <td>{{$data->periodCovereda}}</td>
                                <td>
                                    @if( $data->status == 0 )
                                    <span class="statusApproved">Approved</span>
                                    @elseif( $data->status == 1 )
                                    <span class="statusPending">For Review </span>
                                    @elseif( $data->status == 3 )
                                    <span class="statusDraft">Declined</span>
                                    @endif
                                </td>
                                <td id="table-edit">
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item"> 
                                            <i onclick="view('nutritionpolicies','{{ $data->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                        </li>
                                        <li class="list-inline-item"> 
                                            <div class="cursor" id="Approved" type="button" onclick="openApproved('{{$data->id}}')">
                                                <i class="fa fa-check"  title="Approved"  style="color:green;position:absolute;z-index:2"aria-hidden="true"></i>
                                                <i class="fa fa-file-o fa-lg"  title="Approved" style="z-index:1;color:gray" aria-hidden="true"></i> 
                                            </div>
                                        </li>
                                        <li class="list-inline-item"> 
                                            <button></button>
                                                <div class="cursor" id="Declined" type="button" onclick="openDeclined('{{$data->id}}')">
                                                <i class="fa fa-times " title="Declined" style="color:red;position:absolute;z-index:2" aria-hidden="true"></i>
                                                <i class="fa fa-file-o fa-lg" title="Declined" style="z-index:1;color:gray" aria-hidden="true"></i> 
                                            </div>
                                        </li> 
                                        
                                    </ul> 
                                </td>
                            </tr>
                            <?php $num++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


 
@include('Modal.Approved')

<!-- alert Modal -->
@include('Modal.Warning')

@endsection