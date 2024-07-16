@extends('layouts.BSapp', [
'class' => 'sidebar-mini ',
'namePage' => 'Form management',
'activePage' => 'forms2',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <div style="display:flex;align-items:center">
                <a href="{{route('formsb.index')}}">
                    <h5 class="title" style="margin:3px">{{$formsA->formAname}}</h5>
                </a>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic" href="{{route('formsb.index')}}">{{$formsA->formAname}}</a></li>
                    <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic;" href="{{route('formsb.formList',[ $formsA->id, $formsB->id])}}">{{$formsB->formBname}}</a></li>
                    <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Form Fields</li>
                </ol>
            </nav>
            <!-- alerts -->
            @include('layouts.page_template.crud_alert_message')

            <div class="content" style="margin:30px">
                <div class="row " style="display:flex">
                    <div style="display:flex;align-items:center">
                        <a href="{{route('formsb.createFormsFields',['id' => $formsA->id, 'idb' => $formsB->id])}}"  style="font-weight:bold"  class="btn btn-primary">Create Input Field</a>
                    </div>

                    <table class="table table-striped">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Field Name</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Date Created</th>
                                <!-- <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th> -->
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($formsC as $formsC)
                            <tr>
                                <td>{{$formsC->formBname}}</td>
                                <td>{{$formsC->created_at}}</td>
                                <!-- <td>{{$formsC->status}}</td> -->
                                <td class="d-flex">
                                    <a href="{{route('formsb.formList', $formsB->id)}}" style="margin-right: 10px" class="btn btn-primary">View Fields</a>

                                    <a href="{{route('formsb.edit', $formsB->id)}}" style="margin-right: 10px" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('formsb.destroyFormB', ['id' => $formsA->id, 'idb' => $formsB->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete data?');">

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