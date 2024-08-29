<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Users',
'activePage' => 'Users',
'activeNav' => '',
])

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">

<style>
    .form-section {
        display: none;
    }

    .form-section.current {
        display: inline;
    }

    .striped-rows .row:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .col-sm {
        margin: auto;
        padding: 1rem 1rem;
    }

    .row .form-control {
        border-color: #bebebe !important;
        border: 1px solid;
        border-radius: 5px;
    }
</style>
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <!-- <a href="{{route('formsb.index')}}"> -->
                <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5>
                <!-- </a> -->

            </div>

            <!-- alerts -->
            @include('layouts.page_template.crud_alert_message')

            <div class="content" id="deleteAlert" style="margin:30px;">



                <div class="row-12">
                    <a href="{{route('CAadmin.create')}}" class="btn btn-primary">Add new Account </a>
                </div>
                <div class="row-12">
                    <table class="display" id="myTable" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" class="tableheader">#</th>
                                <th scope="col-2" class="tableheader">Name</th>
                                <!-- <th scope="col-4" class="tableheader">Email</th> -->
                                <th scope="col" class="tableheader">Agency/Unit</th>
                                <th scope="col" class="tableheader">Designation</th>
                                <th scope="col" class="tableheader">Role</th>
                                <th scope="col" class="tableheader">Status</th>
                                <th scope="col" class="tableheader">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $num = 1; ?>
                            @foreach($users as $users)
                            <tr>
                                <td>{{$num}}</td>
                                <td>{{$users->Firstname}} {{$users->Middlename}} {{$users->Lastname}}</td>
                                <!-- <td>{{$users->email}}</td> -->
                                <td>{{$users->agency_office_lgu}}</td>

                                <td>{{$users->agency_office_lgu}}</td>
                                <td>
                                    @php
                                    $roles = DB::table('roles')->where('id', $users->role)->first();
                                    @endphp



                                    {{ $roles->name }}
                                </td>
                                <td>
                                    <div class="row">


                                    @if( $users->status == 1 )
                                    <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #28a745;padding:4px;border-radius:15px; ">
                                        <div style="border-radius:15px; border: 2px solid #28a745; background-color: #28a745; padding: 2px;margin-right:5px">
                                            <lord-icon
                                                src="https://cdn.lordicon.com/guqkthkk.json"
                                                trigger="hover"
                                                colors="primary:#ffffff"
                                                style="width:15px;height:15px">
                                            </lord-icon>
                                        </div>
                                        <div class="bold" style="text-align:center;margin-right:8px;color:#28a745">Approved</div>
                                    </div>
                                    @elseif( $users->status == 2 )
                                    <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #FF6969;padding:4px;border-radius:15px; ">
                                        <div style="border-radius:15px; border: 2px solid white; background-color: #FF6969; padding: 2px;margin-right:5px"> 
                                            <i class="fas fa-times" style="color:white;padding-left:2px;padding-right:2px"></i>
                                        </div>
                                        <div class="bold" style="text-align:center;margin-right:8px;color: #FF6969;">Declined</div>
                                    </div>
                                    @elseif( $users->status == 3 )
                                    <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #ffbe55;;padding:4px;border-radius:15px; ">
                                        <div style="border-radius:15px; background-color: #ffbe55;; padding: 2px;margin-right:5px"> 
                                            <lord-icon
                                                src="https://cdn.lordicon.com/qvyppzqz.json"
                                                trigger="hover"
                                                stroke="bold"
                                                colors="primary:#ffffff,secondary:#ffffff"
                                                style="width:20px;height:20px">
                                            </lord-icon>
                                        </div>
                                        <div class="bold" style="text-align:center;margin-right:8px;color:#ffbe55;">Pending</div>
                                    </div>
                                    @endif
                            
                                    </div> 
                                </td>

                                <td class="d-flex">
                                    <i onclick="view('admin','{{ $users->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                    <!-- <i onclick="editlgu('{{ $users->id }}')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i> -->
                                    <i onclick="openModal('{{ $users->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
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