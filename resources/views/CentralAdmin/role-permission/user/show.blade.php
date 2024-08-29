<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Users Information',
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
                <h5 class="title">User info:</h5>
                <!-- </a> -->
            </div>

            <div class="content" id="deleteAlert" style="margin:30px;">
                <div class="row-12">
                    <p>First Name: {{$users->Firstname}}</p>
                    <p>Middle Name: {{$users->Middlename}}</p>
                    <p>Last name Name: {{$users->Lastname}}</p>
                    <p>Region: {{$users->Region}}</p>
                    <p>Region: {{$users->Province}}</p>
                </div>

            </div>
        </div>
    </div>

    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <h5 class="title">Account Status</h5>
                </div>
                <div class="p-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Edit Mode</label>
                    </div>
                </div>
            </div>

            <!-- alerts -->
            <div class="content" style="margin:30px;">
                @include('layouts.page_template.crud_alert_message')
            </div>

            <div class="content" style="margin:30px;">
                <form action="{{route('CAadmin.userstatusupdate', $users->id)}}" id="formuserstatusupdate" method="POST">
                    @csrf
                    @method('PUT')
                   
                        <div class="form-group">
                            <label for="userrole">User Role:</label>
                            <select class="form-control" id="userrole" name="role" disabled required>
                                @foreach($role as $role)
                                <option value="{{ $role->id }}" {{ old('role', $users->role) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="userdesignation">Designation:</label>
                            <input class="form-control" type="text" id="userdesignation" name="designation" value="{{$users->designation}}" disabled required>
                        </div>
                  
                        <div class="form-group">
                            <label for="userrequest">Request Status:</label>
                            <select class="form-control" id="userrequest" name="userrequest" disabled required>
                                @foreach($userrequeststatus as $userrequeststatus)
                                <option value="{{ $userrequeststatus->id }}" {{ old('status', $users->status) == $userrequeststatus->id ? 'selected' : '' }}>{{ $userrequeststatus->requeststatus }}</option>
                                @endforeach
                            </select>
                        </div>
                   
                        <div class="form-group">
                            <label for="userstatus">User Status:</label>
                            <select class="form-control" id="userstatus" name="userstatus" disabled required>
                                @foreach($userstatus as $userstatus)
                                <option value="{{ $userstatus->id }}" {{ old('userstatus', $users->role) == $userstatus->id ? 'selected' : '' }}>{{ $userstatus->status }}</option>
                                @endforeach
                            </select>
                            <input id="hiddenuserstatus" name="hiddenuserstatus" type="hidden" value="{{$users->userstatus}}"/>
                        </div>
       
                    <button id="updateAccountStatusBtn" disabled type="button" class="bold btn btn-primary" data-toggle="modal" data-target="#exampleModalSaveChanges">
                        Save Changes
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <h5 class="title">Update Password</h5>
                </div>
                <div class="p-2">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">Edit Mode</label>
                    </div>
                </div>
            </div>
            
            <div class="content" style="margin:30px;">
            <form action="{{route('CAadmin.changepassword', $users->id)}}" id="formuserpasswordupdate" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="password">Email</label>
                        <input class="bold form-control" type="text" id="email" name="email" value="{{$users->email}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input class="form-control" disabled  type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="form-control" disabled type="password" id="password_confirmation" name="password_confirmation"  required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="togglePassword"> Show Password
                    </div>
                    <button id="updatePasswordBtn" disabled type="button" class="bold btn btn-primary" data-toggle="modal" data-target="#exampleModalSaveChangesPass">
                        Save Changes
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>

</div>

<!-- alert Modal -->
@include('Modal.Savechanges')

@include('Modal.Savechangespass')

@endsection