@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form Builder',
'activePage' => 'forms2',
'activeNav' => '',
])

@section('content')
 
<div class="content" style="margin-top:50px;padding:2%">
<div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
                <div class="card-header">
                <h5 class="title">Form/{{$forms->formname}}</h5>
                    <div class="content" style="margin:30px">
                            @if(session('status'))
                                <div class="row alert alert-success">{{session('status')}}</div>
                                <br>
                            @endif
                        <div class="row row-12" style="display:flex">
                            <div style="display:flex;align-items:center">
                                <a href="{{route('formsb.create')}}" class="btn btn-primary">Create Form</a> 
                            </div>
                        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Form name</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Last Update</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
 
                                    @foreach($forms as $form)
                                    <tr>
                                        <td>{{$forms->formname}}</td>
                                        <td>{{$forms->datecreated}}</td>
                                        <td>{{$forms->lastupdate}}</td>
                                        <td>{{$forms->status}}</td>
                                        <td class="d-flex">
                                           
                                            <a href="{{route('formsb.edit', $forms->id)}}" style="margin-right: 10px"
                                                class="btn btn-primary">Edit</a>

                                            <form action="{{ route('formsb.destroy', $forms->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete data?');">

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
                </div>
            </div>
</div>
@endsection