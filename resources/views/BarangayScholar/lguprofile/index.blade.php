<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('assets') }}/js/joboy.js"></script>


@extends('layouts.BSapp', [
'class' => 'sidebar-mini ',
'namePage' => 'MELLPI PRO For LGU Profile',
'activePage' => 'LGUPROFILE',
'activeNav' => '',
])

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <a href="{{route('formsb.index')}}">
                    <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5>
                </a>
            </div>


            <div class="content" style="margin:30px">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                <div class="alert alert-success d-none" id="successAlert" role="alert">
                    Data deleted successfully!
                </div>
                <div class="row">
                    <a href="{{route('BSLGUprofile.create')}}" class="btn btn-primary bolder">Create data</a>
                    <!-- <table class="table table-striped">
                        <thead> -->

        <table id="myTable" class="order-column" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>
            </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>

                    <table class="table table-striped">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">#</th>
                                <th scope="col-4" style="font-weight:bold;font-size:16px!important;color:white">Officer</th>
                                <th scope="col-4" style="font-weight:bold;font-size:16px!important;color:white">Date Monitoring </th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Period Covered</th>
                                <th scope="col-2" style="font-weight:bold;font-size:16px!important;color:white">Status</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Download</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $num = 1; ?>
                            @foreach($lguProfile as $lguProfile)
                            <tr>
                                <td>{{$num}}</td>
                                <td>Ryan James J. Pascual</td>
                                <td>{{\Carbon\Carbon::parse($lguProfile->dateMonitoring)->format('F j, Y');}}</td>
                                <td>{{$lguProfile->periodCovereda}}</td>
                                <td>
                                    @if( $lguProfile->status == 0 ) 
                                    <span class="statusApproved">APPROVED</span>
                                    @elseif( $lguProfile->status == 1 ) 
                                    <span class="statusPending">PENDING</span>
                                    @elseif( $lguProfile->status == 2 ) 
                                    <span class="statusDraft">DRAFT</span>
                                    @endif
                                </td>
                                <td id="table-edit">
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            @if( $lguProfile->status == 0 ) 
                                            <i onclick="LGUmyFunction('{{ $lguProfile->id }}')" class="fa fa-eye fa-lg cursor"  style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i   class="fa fa-edit fa-lg cursor"  style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                            <i   class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @elseif( $lguProfile->status == 1 ) 
                                            <i onclick="LGUmyFunction('{{ $lguProfile->id }}')" class="fa fa-eye fa-lg cursor"  style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i   class="fa fa-edit fa-lg cursor"  style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                            <i   class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @elseif( $lguProfile->status == 2 ) 
                                            <i onclick="LGUmyFunction('{{ $lguProfile->id }}')" class="fa fa-eye fa-lg cursor"  style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i onclick="myFunction('{{ $lguProfile->id }}')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                            <i onclick="openModal('{{ $lguProfile->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
                                            @endif
                                        </li>
                                  


                                    </ul>
                                    <!-- <a href="{{route('BSLGUprofile.edit', $lguProfile->id)}}" id="button-edit" class="btn btn-info">
                                        <img id="img-edit" src="{{ asset('assets') }}/img/edit.png">Edit</a> -->

                                    <!-- <form action="{{ route('BSLGUprofile.destroy', $lguProfile->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete data?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="align-items:center;padding-right:10px;padding-left:10px;padding-top:8px;padding-bottom:8px;margin-right:10px;font-size:12px;font-weight:bold" class="btn btn-primary">
                                            <img style="margin-bottom:3px;color:white;height:15px;width:15px;background-color:none!important;" src="{{ asset('assets') }}/img/delete.png">
                                            Delete</button>
                                    </form> -->
                                </td>
                                <td>
                                <i class="fa fa-file-pdf-o fa-lg cursor" style="color:red;margin-right:7px" aria-hidden="true"></i>
                                <i class="fa fa-file-excel-o fa-lg cursor" style="color:darkgreen;margin-right:7 px" aria-hidden="true"></i>
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
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Sure</button>
            </div>
        </div>
    </div>
</div>

@endsection