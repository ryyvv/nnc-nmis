@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Permissions',
'activePage' => 'Permissions',
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

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">

    <h4>Permission</h4>
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div> 
    @endif
    <div>
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class=" form-row justify-content-end">
                <div class="col-4 d-flex ">
                    <input type="text" class="form-control" name="permission" placeholder="Permission">
                    <button class="btn btn-primary" type="submit">Add Permission</button>
                </div>
            </div>
        </form>
    </div>


    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="colspan=1">#</th>
                <th scope="col">Permission Name </th>
                <th scope="col">Date created</th>
                <th scope="col">Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <th scope="rowspan=1">{{$permission->id}}</th>
                <td>{{$permission->name}}</td>
                <td>{{$permission->created_at}}</td>
                <td class="d-flex">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="margin-right:10px"
                        data-target="#exampleModal{{$permission->id}}">
                        edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$permission->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="{{ route('permission.update',$permission->id )}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Permission name: </label>
                                            <input type="text" class="form-control" name="permission"
                                                id="formGroupExampleInput" placeholder="{{$permission->name}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            style="margin-left:10px">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this item?');">
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