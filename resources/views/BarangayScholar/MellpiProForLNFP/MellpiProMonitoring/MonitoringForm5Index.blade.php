<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('assets') }}/js/joboy.js"></script>

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

                        <div class="row">
                            <a href="{{ route('MellpiProMonitoringCreate.create') }}" class="btn btn-primary">Create data</a>

                            <table style="overflow: scroll;" class="table table-striped">
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
                                        <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
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
                                        <td><?php echo ($form5a_rr->status) == 2 ? '<span class="badge bg-warning" id="badge-pending">Pending..</span>' : '<span id="badge-draft" class="badge bg-secondary">Draft</span>' ?></td>
                                        <!-- <td>{{$form5a_rr->status}}</td> -->
                                        <td id="table-edit">

                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    @if( $form5a_rr->status == 2 )
                                                    <i onclick="LNFPmyFunction('{{ $form5a_rr->id }}')" class="fa fa-eye cursor" style="color:#4bb5ff" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                    @elseif( $form5a_rr->status == 1 )
                                                    <i onclick="myFunctionLNFP('{{ $form5a_rr->id }}')" class="fa fa-edit cursor" style="color:#FFB236" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    <i onclick="LNFPopenModal('{{ $form5a_rr->id }}')" class="fa fa-trash fa-lg cursor" style="display:<?php echo ($form5a_rr->status == 2 ? "none" : "block") ?>;color:red" title="Delete "></i>
                                                </li>
                                                <!-- <li class="list-inline-item">
                                                    @if( $form5a_rr->status == 2 )
                                                    <a href="{{ route('lguLnfpEdit', $form5a_rr->id)}}" class="btn btn-info btn-sm rounded-0 btn-edit" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                    @elseif( $form5a_rr->status == 1 )
                                                    <a href="{{ route('lguLnfpEdit', $form5a_rr->id)}}" class="btn btn-warning btn-sm rounded-0 btn-edit" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    @endif
                                                </li> -->

                                                <!-- <li class="list-inline-item">
                                                    <form action="{{ route('lguLnfpDeleteForm5a', $form5a_rr->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li> -->
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
                <button type="button" class="btn btn-danger" onclick="confirmDeleteLNFP()">Sure</button>
            </div>
        </div>
    </div>
</div>

<!-- <form action="{{ route('lguLnfpDeleteForm5a', $form5a_rr->id) }}" method="POST">
    @csrf
    @method('DELETE')
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
                    Are you sure you want to delete this data {{$form5a_rr->id}}? 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDeleteLNFP()">Sure</button>
                </div>
            </div>
        </div>
    </div>
</form> -->
<!-- <button type="submit" class="btn btn-danger">Sure</button> -->
@endsection