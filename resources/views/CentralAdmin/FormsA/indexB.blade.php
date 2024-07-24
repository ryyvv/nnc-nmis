
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>


@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form Management',
'activePage' => 'forms2',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{$formsA->formAname}} Form List</h5> -->
            <div style="display:flex;align-items:center">
                <a href="{{route('formsb.index')}}">
                    <h5 class="title" style="margin:0px">{{$formsA->formAname}}</h5>
                </a>
            </div>
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic" href="{{route('formsb.index')}}">{{$formsA->formAname}}</a></li>
                    <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">List of Forms </li>
                </ol>
            </nav>

            <!-- alerts -->
            @include('layouts.page_template.crud_alert_message')

            <div class="content" style="margin:30px">
                    <div class="row-12">
                        <a href="{{route('formsb.createForms',$formsA->id)}}"  style="font-weight:bold"  class="btn btn-primary">Create Form Title</a>
                    </div>
                   <div class="row-12">
                   <table id="formbuilderB" class="display">
                            <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">#</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Form Name</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Date Created</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $nums = 1 ?>
                            @foreach($formsB as $formsB)
                            <tr>
                                <td>{{$nums}}</td>
                                <td>{{$formsB->formBname}}</td>
                                <td>{{$formsB->created_at}}</td>
                                <td>{{$formsB->status}}</td>
                                <td class="d-flex">
                                     @if( $formsB->status == 0 )
                                            <i onclick="formBfunction('formslist', '{{ $formsB->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                            <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @elseif( $formsB->status == 1 )
                                            <i onclick="formBfunction('formslist', '{{ $formsB->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                            <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @elseif( $formsB->status == 2 )
                                            <i onclick="formBfunction('formslist', '{{ $formsB->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i onclick="formAfunction('formsb' , '{{ $formsB->id }}', 'edit')"class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                            <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @endif
                                    <!-- <a href="{{route('formsb.fieldList', ['id' => $formsA->id, 'idb' => $formsB->id])}}" style="font-weight:bold;margin-right: 10px" class="btn btn-primary">View Fields</a>

                                    <a href="{{route('formsb.edit', $formsB->id)}}" style="margin-right: 10px;font-weight:bold" class="btn btn-warning ">Edit</a> -->
<!-- 
                                    <form action="{{ route('formsb.destroyFormB', ['id' => $formsA->id, 'idb' => $formsB->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete data?');">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  style="font-weight:bold"  class="btn btn-danger">Delete</button>
                                    </form> -->
                                </td>


                            </tr>
                            <?php $nums++ ?>
                            @endforeach
                        </tbody>
                    </table>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection