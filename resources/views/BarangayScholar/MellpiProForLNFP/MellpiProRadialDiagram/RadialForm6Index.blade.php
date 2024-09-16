
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 6 Monitoring',
'activePage' => 'mellpi_pro_form6',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Form 6 Monitoring")}}</h5>

                    <!-- <div class="row-12">
                        <a href="{{ route('MellpiProRadialCreate.create') }}" class="btn btn-primary bolder">Sample View</a>
                    </div> -->

                    <table class="display" id="form6Table" style="width:100%!important; max-width:inherit">
                        <thead class="table-light" style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">#</th>
                                <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Officer</th> -->
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Name</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date Monitoring</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Period Covered</th>
                                <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Name</th> -->
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Status</th>
                                <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Date of Monitoring</th> -->
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white;text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            @foreach ($form6 as $form6)
                            <tr>
                                <td>{{$num}}</td>
                                <td>{{$form6->nameofPnao}}</td>
                                <td>{{\Carbon\Carbon::parse($form6->dateMonitoring)->format('F j, Y');}}</td>
                                <td>{{$form6->periodCovereda}}</td>
                                <td>
                                        @if( $form6->status == 0 )
                                            <span class="statusApproved">APPROVED</span>
                                            @elseif( $form6->status == 1 )
                                            <span class="statusPending">PENDING</span>
                                            @elseif( $form6->status == 2 )
                                            <span class="statusDraft">DRAFT</span>
                                            @else
                                            <span class="statusApproved">Submitted</span>
                                        @endif
                                </td>
                                <!-- <td>Date of Monitoring</td> -->
                                <td>
                                @if( $form6->status == 1 || $form6->status == 3 )
                                <i onclick="myLNFPmyFunction_form6('{{ $form6->id }}')"  class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                @elseif( $form6->status == 2 )
                                <i onclick="LNFPmyFunction_form6('{{ $form6->id }}')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                               @endif
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
@endsection
