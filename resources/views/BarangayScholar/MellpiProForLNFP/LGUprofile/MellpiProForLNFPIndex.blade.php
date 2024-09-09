<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<!-- <script src="{{ asset('js/diether.js') }}"></script> -->
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'LGU Profile LNFP',
'activePage' => 'LGUPROFILELNFP',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:90px;">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("LGU Profile LNFP")}}</h5>
                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    <!-- alerts -->
                    @include('layouts.page_template.crud_alert_message')

                    <div class="content">

                        <div class="alert alert-success d-none" id="successAlert" role="alert">
                            Data deleted successfully!
                        </div>
                        <div class="row-12">
                            <a href="{{route('MellpiProForLNFPCreate.create')}}" class="btn btn-primary bolder">Create data</a>
                        </div>

                        <table class="display" id="LNFP_Profile_myTable" style="width:100%!important; max-width:inherit">
                            <thead class="table-light" style="background-color:#508D4E;">

                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">#</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Officer</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date Monitoring</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Period Covered</th>
                                    <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Form Status</th> -->
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Status</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center;width:10%;">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $num = 1; ?>
                                @foreach ($lnfpProfile as $lnfpProfile)
                                <tr>
                                    <td>{{$num}}</td>
                                    <td>{{$lnfpProfile->lnfp_officer}}
                                    </td>
                                    <!-- <td>{{$lnfpProfile->dateMonitoring}}</td> -->
                                    <td>{{\Carbon\Carbon::parse($lnfpProfile->dateMonitoring)->format('F j, Y');}}
                                    <td><center>{{$lnfpProfile->periodCovereda}}</center>
                                    </td>
                                    <!-- <td>&nbsp;</td> -->
                                
                                    <td>
                                            @if( $lnfpProfile->status == 0 )
                                            <span class="statusApproved">APPROVED</span>
                                            @elseif( $lnfpProfile->status == 1 )
                                            <span class="statusPending">PENDING</span>
                                            @elseif( $lnfpProfile->status == 2 )
                                            <span class="statusDraft">DRAFT</span>
                                            @endif
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $lnfpProfile->status == 1 || $lnfpProfile->status == 0 )
                                                <i onclick="myFunctionLNFP_lguprofile_View('{{ $lnfpProfile->id }}', 'lncmanagement', 'edit')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <!-- <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i> -->
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i> -->
                                                @elseif( $lnfpProfile->status == 2 )
                                                <!-- <i onclick="myFunctionLNFP_lguprofile_View('{{ $lnfpProfile->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i> -->
                                                <i onclick="myFunctionLNFP_lguprofile('{{ $lnfpProfile->id }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="openModalLNFP('{{ $lnfpProfile->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i> -->
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
</div>

@include('Modal.DeleteLNFP')


@endsection