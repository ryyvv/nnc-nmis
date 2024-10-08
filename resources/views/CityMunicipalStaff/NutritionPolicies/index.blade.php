<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Nutrition Policies',
'activePage' => 'NutritionPolicies',
'activeNav' => 'MELLPI PRO For LGU',  
])

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
           
                    <h5 class="title">{{__("List of MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING")}}</h5>
       
            </div>


            <div class="content"  id="deleteAlert"  style="margin:30px;">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                <div class="alert alert-success d-none" id="successAlert" role="alert">
                    Data deleted successfully!
                </div>
                <div class="row-12">
                    <a href="{{route('CMSnutritionpolicies.create')}}" class="btn btn-primary bolder">Create data</a>
                </div>
                <div class="row-12">
                    <table class="display" id="myTable" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col"  class="tableheader">#</th>
                                <th scope="col-4"  class="tableheader">Officer</th>
                                <th scope="col-4"  class="tableheader">Date Monitoring </th>
                                <th scope="col"  class="tableheader">Period Covered</th>
                                <th scope="col-2"  class="tableheader">Status</th>
                                <th scope="col"  class="tableheader">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $num = 1; ?>
                            
                            @foreach($nplocation as $nplocation)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <th>Ryan James J.Pascual</th>
                                        <td>{{$nplocation->dateMonitoring}}</td>
                                        <td>{{$nplocation->periodCovereda}}</td>
                                        <td>  
                                            @if( $nplocation->status == 0 )
                                            <span class="statusApproved">APPROVED</span>
                                            @elseif( $nplocation->status == 1 )
                                            <span class="statusPending">PENDING</span>
                                            @elseif( $nplocation->status == 2 )
                                            <span class="statusDraft">DRAFT</span>
                                            @endif
                                        </td>
                                        <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $nplocation->status == 0 )
                                                <i onclick="view('nutritionpolicies','{{ $nplocation->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                           
                                                @elseif( $nplocation->status == 1 )
                                                <i onclick="view('nutritionpolicies','{{ $nplocation->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                
                                                @elseif( $nplocation->status == 2 )
                                                <i   class="fa fa-eye fa-lg cursor" style="color:gray;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i onclick="view('nutritionpolicies','{{ $nplocation->id }}','edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="openModal('{{ $nplocation->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>

                                                @endif
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


@include('Modal.DeleteNP')

@endsection