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

 
<div class="content" style="padding:2%">

    <h4>Roles</h4>
    @if(session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div>
        <a href="{{route('CAadmin.create')}}" class="btn btn-primary">Add new Account </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="colspan=1">#</th>
                <th scope="col">Name </th>
                <th scope="col">Email </th>
                <th scope="col">Address</th>
                <th scope="col">Agency/Unit</th>
                <th scope="col">Designation</th>
                <th scope="col">Status</th>
                <th scope="col">Date_Created </th>
                <th scope="col">Action </th>
            </tr>
        </thead>
        <tbody>
      
            
            @foreach($users as $users)
            <tr>
                <th scope="rowspan=1">{{$users->id}}</th>
                <td>{{$users->Firstname}} {{$users->Middlename}} {{$users->Lastname}}</td>
                <td>{{$users->email}}</td>
                <td>

                    <!-- @php
                        $municipals = DB::table('municipals')->select('municipal')->where('id', $users->city_municipal)->first();
                    @endphp
                        {{$municipals->municipal}}, 

                    @php
                        $provinces  = DB::table('provinces')->where('id', $users->Province)->first();
                    @endphp
                    {{  $provinces->province }}, 

                    @php
                        $regions = DB::table('regions')->where('id', $users->Region)->first();
                    @endphp
                    {{  $regions->region }} -->

                </td>
                <td>{{$users->agency_office_lgu}}</td>
                <td>
                @php
                        $roles = DB::table('roles')->where('id', $users->role)->first();
                @endphp
                    {{  $roles->name }}

            
                </td>
                <td>{{$users->status}}</td>
                <td>{{$users->created_at}}</td>
                <td class="d-flex">

                <!-- <a href="{{url('/adminusers/'.$users->id.'/edit')}}" class="btn btn-primary" style="margin-right:10px">Edit</a>     -->
                <a href="{{route('CAadmin.edit', $users->id)}}" class="btn btn-primary" >edit</a>
                    <form action="{{ route('CAadmin.destroy', $users->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this account?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection