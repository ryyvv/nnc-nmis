<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Interview Form',
'activePage' => 'mellpi_pro_interview',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Interview Form")}}</h5>
                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    <!-- alerts -->
                    @include('layouts.page_template.crud_alert_message')
                    <div class="content" style="margin:30px">

                        <div class="alert alert-success d-none" id="successAlert" role="alert">
                            Data deleted successfully!
                        </div>
                        <!-- <div class="row-12">
                            <a href="{{ route('lnfpFormInterviewCreate') }}" class="btn btn-primary bolder">Create data</a>
                        </div> -->

                        <table class="display" id="InterviewFormmyTable" style="width:100%!important; max-width:inherit">
                            <thead class="table-light" style="background-color:#508D4E;">

                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">#</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Header</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Name</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Area of Assignment</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date of Interview</th>

                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Status</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center;width:10%;">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $num = 1; ?>
                                @foreach ($InterviewForm as $InterviewForm)
                                <tr>
                                    <td>{{$num}}</td>
                                    <td>{{ $InterviewForm->header  }}</td>
                                    <td>{{ $InterviewForm->nameofPnao  }}</td>
                                    <td>{{ $InterviewForm->periodCovereda }}</td>
                                    <td>{{ $InterviewForm->dateOfInterview }}</td>
                                    <td>
                                        @if( $InterviewForm->status == 0 )
                                        <span class="statusApproved">APPROVED</span>
                                        @elseif( $InterviewForm->status == 1 )
                                        <span class="statusPending">PENDING</span>
                                        @elseif( $InterviewForm->status == 2 )
                                        <span class="statusDraft">DRAFT</span>
                                        @endif
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $InterviewForm->status == 1 )
                                                <i onclick="LNFPmyFunction_InterviewForm('{{ $InterviewForm->id }}', 'lncmanagement', 'edit')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <!-- <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i> -->
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i> -->
                                                @elseif( $InterviewForm->status == 2 )
                                                <!-- <i onclick="LNFPmyFunction_InterviewForm('{{ $InterviewForm->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i> -->
                                                <i onclick="myFunctionLNFP_InterviewForm('{{ $InterviewForm->id }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <!-- <i onclick="LNFPopenModal_InterviewForm('{{ $InterviewForm->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i> -->
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

@endsection