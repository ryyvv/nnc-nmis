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
                    <h5 class="title">{{__("Create Data")}}</h5>
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

                        <table class="display" id="LNFP_Profile_myTable" width="100%">
                            <thead class="table-light" style="background-color:#508D4E;">

                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">#</th>
                                    <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Officer</th> -->
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date Monitoring</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Period Covered</th>
                                    <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th> -->
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;width:10%;">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $num = 1; ?>
                                @foreach ($lnfp as $lnfp)
                                <tr>
                                    <td>
                                        <center>
                                            {{$num}}
                                        </center>
                                    </td>
                                    <!-- <td>name</td> -->
                                    <!-- <td>{{$lnfp->dateMonitoring}}</td> -->
                                    <td>
                                        <center>
                                            {{\Carbon\Carbon::parse($lnfp->dateMonitoring)->format('F j, Y');}}
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            {{$lnfp->periodCovereda}}
                                        </center>
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <!-- <i onclick="LNFPmyFunction_lguprofile('{{ $lnfp->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i> -->
                                                <i onclick="myFunctionLNFP_addform('{{ $lnfp->id }}', 'lncmanagement', 'edit')" class="fa fa-plus fa-lg cursor" style="color:#508d4e;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Add Monitoring"></i>
                                                <!-- <i onclick="LNFPopenModaLguProfilel('{{ $lnfp->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i> -->
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


<!-- Delete -->
<div class="modal fade" id="deleteModal_lguprofile" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-danger" onclick="confirmDeleteLNFP_Lguprofile()">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection