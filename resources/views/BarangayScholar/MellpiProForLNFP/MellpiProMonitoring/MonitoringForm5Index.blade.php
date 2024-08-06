<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="{{ asset('js/diether.js') }}"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 5 Monitoring',
'activePage' => 'mellpi_pro_form5',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Form 5 Monitoring")}}</h5>
                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif
                    <div class="content" style="margin:30px">

                        <!-- alerts -->
                        @include('layouts.page_template.crud_alert_message')

                        <div class="alert alert-success d-none" id="successAlert" role="alert">
                            Data deleted successfully!
                        </div>
                        <div class="row-12">
                            <a href="{{ route('MellpiProMonitoringCreate.create') }}" class="btn btn-primary bolder">Create data</a>
                        </div>

                        <table class="display" id="form5myTable" width="100%">
                            <thead class="table-light" style="background-color:#508D4E;">

                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">#</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Name</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Address</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Province Of Deployment</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Number of Years</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Fulltime</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">With Continuing Activities</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Date of Designation</th>

                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;width:10%;">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $num = 1; ?>
                                @foreach ($form5a_rr as $form5a_rr)
                                <tr>
                                    <td>{{$num}}</td>
                                    <td>{{ $form5a_rr->nameofPnao }}</td>
                                    <td>{{ $form5a_rr->address }}</td>
                                    <td>{{ $form5a_rr->provDeploy }}</td>
                                    <td>{{ $form5a_rr->numYearPnao }}</td>
                                    <td>{{ $form5a_rr->fulltime }}</td>
                                    <td>{{ $form5a_rr->profAct }}</td>
                                    <td>{{ $form5a_rr->dateDesignation }}</td>
                                    <td>
                                        @if( $form5a_rr->status == 0 )
                                        <span class="statusApproved">APPROVED</span>
                                        @elseif( $form5a_rr->status == 1 )
                                        <span class="statusPending">PENDING</span>
                                        @elseif( $form5a_rr->status == 2 )
                                        <span class="statusDraft">DRAFT</span>
                                        @endif
                                    </td>
                                    <!-- <td>{{$form5a_rr->status}}</td> -->

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $form5a_rr->status == 0 )
                                                <i onclick="LNFPmyFunction('{{ $form5a_rr->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i>  -->
                                                @elseif( $form5a_rr->status == 1 )
                                                <i onclick="myFunctionLNFP('{{ $form5a_rr->id }}', 'lncmanagement', 'edit')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i> -->
                                                @elseif( $form5a_rr->status == 2 )
                                                <i onclick="LNFPmyFunction('{{ $form5a_rr->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i onclick="myFunctionLNFP('{{ $form5a_rr->id }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="LNFPopenModal('{{ $form5a_rr->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                console.log('Alert message found, hiding now');
                alertMessage.style.display = 'none';
            } else {
                console.log('Alert message not found');
            }
        }, 3000);
    });
</script>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDeleteLNFP_form5('{{ $form5a_rr->id }}')">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection