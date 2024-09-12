<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Overall Score Form',
'activePage' => 'mellpi_pro_overallScore',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Overall Score Form")}}</h5>
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
                        <!-- <div class="row-12">
                            <a href="{{ route('lnfpFormOverallScoreCreate') }}" class="btn btn-primary bolder">Create data</a>
                        </div> -->

                        <table class="display" id="overallScoremyTable" style="width:100%!important; max-width:inherit">
                            <thead class="table-light" style="background-color:#508D4E;">

                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">#</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Name</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Status</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center;width:10%;">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $num = 1; ?>
                                @foreach ($overallScore as $overallScore)
                                <tr>
                                    <td>{{$num}}
                                    </td>
                                    <td>{{ $overallScore->pnaoName }}
                                    </td>
                                    <td>{{ $overallScore->dateOver }}
                                    </td>
                                    <td>
                                        <center>
                                        @if( $overallScore->status == 0 )
                                        <span class="statusApproved">APPROVED</span>
                                        @elseif( $overallScore->status == 1 )
                                        <span class="statusPending">Submitted</span>
                                        @elseif( $overallScore->status == 2 )
                                        <span class="statusDraft">DRAFT</span>
                                        @endif
                                        </center>
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
     
                                                @if( $overallScore->status == 1 )
                                                <i onclick="myLNFPmyFunction_overallScore('{{ $overallScore->overallId }}', 'lncmanagement', 'edit')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <!-- <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i> -->
                                                <!-- <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i> -->
                                                <!-- <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i> -->
                                                @elseif( $overallScore->status == 2 )
                                                <i onclick="LNFPmyFunction_overallScore('{{ $overallScore->overallId }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <!-- <i onclick="myFunctionLNFP_overallScore('{{ $overallScore->overallId }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i> -->
                                                <!-- <i onclick="LNFPopenModal_overallScore('{{ $overallScore->overallId }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i> -->
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
<div class="modal fade" id="deleteModal_OverallScoreForm" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-danger" onclick="confirmDeleteLNFP_IntForm()">Sure</button>
            </div>
        </div>
    </div>
</div>
@endsection