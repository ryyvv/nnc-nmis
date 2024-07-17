<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
 
 @extends('layouts.BSapp', [
'class' => 'sidebar-mini ',
 
])

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("Form Management")}}</h5> -->
            <div style="display:flex;align-items:center">
                <a href="{{route('formsb.index')}}">
                    <h5 class="title" style="margin:0px">List of Categories</h5>
                </a>
            </div>
            
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">List of Forms </li>
                </ol>
            </nav> -->

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

            <div class="content" style="margin:30px">
                <div class="row " style="display:flex">
                    <div style="display:flex;align-items:center">
                        <a href="{{route('formsb.create')}}" style="font-weight:bold" class="btn btn-primary">Create Form Category</a>
                    </div>

                    <table class="table table-striped" >
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Form Name</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Date Created</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach($forms as $forms)
                            <tr> 
                                <td>{{$forms->formAname}}</td>
                                <td>{{$forms->created_at}}</td>
                                <td>{{$forms->status}}</td>
                                <td class="d-flex">
                                    <a href="{{route('formsb.formList', $forms->id)}}" style="margin-right: 10px;font-weight:bold" class="btn btn-primary">View Forms</a>

                                    <a href="{{route('formsb.edit', $forms->id)}}" style="margin-right: 10px;font-weight:bold" class="btn btn-warning">Edit</a>

                                    <!-- <form action="{{ route('formsb.destroy', $forms->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete data?');">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  style="font-weight:bold" class="btn btn-danger">Delete</button>
                                    </form> -->
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