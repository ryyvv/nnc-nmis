<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

@extends('layouts.app', [
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
            <div class="row-12">
                        <a href="{{route('formsb.createFormsFields',['id' => $formsA->id, 'idb' => $formsB->id])}}" style="font-weight:bold" class="btn btn-primary">Create Input Field</a>
                        <a href="#" style="font-weight:bold" class="btn btn-primary">Custom  Form</a>
                    </div>

                    <div class="row-12">
                        <table id="formbuilderC" class="display">
                            <thead style="background-color:#508D4E;">
                                <tr>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">#</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Field Name</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Field Label</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Field Type</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Date Created</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Status</th>
                                    <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $nums = 1 ?>
                                @foreach($formsC as $formsC)
                                <tr>
                                    <td>{{$nums}}</td>
                                    <td>{{$formsC->name}}</td>
                                    <td>{{$formsC->label}}</td>
                                    <td>{{$formsC->type}}</td>
                                    <td>{{$formsC->created_at}}</td>
                                    <td>{{$formsC->status}}</td>
                                    <td  style="padding-top:7px;padding-bottom:7px">
                                    @if( $formsC->status == 0 )
                                            <i onclick="formBfunction('formslist', '{{ $formsB->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                            <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @elseif( $formsC->status == 1 )
                                            <i onclick="formBfunction('formslist', '{{ $formsC->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                            <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @elseif( $formsC->status == 2 )
                                            <i onclick="formBfunction('formslist', '{{ $formsC->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            <i onclick="formAfunction('formsb' , '{{ $formsC->id }}', 'edit')"class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                            <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                            @endif
                                        <!-- <a href="{{route('formsb.formList', $formsB->id)}}" style="margin-right: 10px" class="btn btn-primary">View Fields</a>

                                        <a href="{{route('formsb.edit', $formsB->id)}}" style="margin-right: 10px" class="btn btn-primary">Edit</a>

                                        <form action="{{ route('formsb.destroyFormB', ['id' => $formsA->id, 'idb' => $formsB->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete data?');">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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