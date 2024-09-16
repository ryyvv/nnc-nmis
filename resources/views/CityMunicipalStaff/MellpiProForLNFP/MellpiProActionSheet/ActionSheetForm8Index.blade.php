
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 8 Action Sheet',
'activePage' => 'mellpi_pro_form8',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Form 8 Action Sheet")}}</h5>
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
                        <div class="row-12">
                            <a href="{{ route('lnfpForm8Create') }}" class="btn btn-primary bolder">Create data</a>
                        </div>

                        <table class="display" id="form8myTable" width="100%">
                            <thead class="table-light" style="background-color:#508D4E;">

                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">#</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Officer</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date of Monitoring</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Period Covered</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Name</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Area of Assignment</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Status</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center;width:10%;">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $num = 1; ?>
                                @foreach ($form8 as $form8)
                                <tr>
                                    <td>
                                        <center>{{$num}}</center>
                                    </td>
                                    <td>
                                        <center>{{$form8->lnfp_officer}}</center>
                                    </td>
                                    <td>
                                        <center>{{ $form8->dateMonitor }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $form8->forThePeriod }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $form8->nameOfPnao }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $form8->areaOfAssign }}</center>
                                    </td>
                                    
                                    <td>
                                        <center>
                                        @if( $form8->status == 0 )
                                        <span class="statusApproved">APPROVED</span>
                                        @elseif( $form8->status == 1 )
                                        <span class="statusPending">PENDING</span>
                                        @elseif( $form8->status == 2 )
                                        <span class="statusDraft">DRAFT</span>
                                        @endif
                                        </center>
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $form8->status == 0 )
                                                <i onclick="LNFPmyFunction_form8('{{ $form8->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i>  -->
                                                @elseif( $form8->status == 1 )
                                                <i onclick="myFunctionLNFP_form8('{{ $form8->id }}', 'lncmanagement', 'edit')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i> -->
                                                @elseif( $form8->status == 2 )
                                                <i onclick="LNFPmyFunction_form8('{{ $form8->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i onclick="myFunctionLNFP_form8('{{ $form8->id }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="LNFPopenModal_form8('{{ $form8->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
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

<!-- Delete -->
<div class="modal fade" id="deleteModal_form8" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-danger" onclick="confirmDeleteLNFP_Form8()">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection