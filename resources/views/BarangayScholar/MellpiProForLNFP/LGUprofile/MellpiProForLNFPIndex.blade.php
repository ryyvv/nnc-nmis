<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('assets') }}/js/joboy.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'LGU Profile LNFP',
'activePage' => 'LGUPROFILELNFP',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("LGU Profile LNFP")}}</h5>
                    <a href="{{route('MellpiProForLNFPCreate.create')}}" class="btn btn-primary">Create data</a>

                    <table style="overflow: scroll;" class="table table-striped">
                                <thead class="table-light" style="background-color:#508D4E;">

                                    <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">#</th>
                                        <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Date Monitoring</th>
                                        <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Period Covered</th>
                                        <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th>
                                        <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $num = 1; ?>
                                    @foreach ($form5a_rr as $form5a_rr)
                                    <tr>
                                        <td>{{$num}}</td>
                                        <td>DATE MONITORING</td>
                                        <td>PERIOD COVERED</td>
                                        <td><?php echo ($form5a_rr->status) == 2 ? '<span class="badge bg-warning" id="badge-pending">Pending..</span>' : '<span id="badge-draft" class="badge bg-secondary">Draft</span>' ?></td>
                                        <!-- <td>{{$form5a_rr->status}}</td> -->
                                        <td id="table-edit">
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    @if( $form5a_rr->status == 2 )
                                                    <a href="#" class="btn btn-info btn-sm rounded-0 btn-edit" type="button" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                    @elseif( $form5a_rr->status == 1 )
                                                    <a href="#" class="btn btn-warning btn-sm rounded-0 btn-edit" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style=" display:<?php echo ($form5a_rr->status == 2 ? "none" : "block") ?> " onclick="openModal('{{ $form5a_rr->id }}')" class="btn btn-danger btn-sm rounded-0 btn-delete" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>

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
                                                                        <button type="submit" class="btn btn-danger" onclick="confirmDelete()">Sure</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
@endsection