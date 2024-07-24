<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form Management',
'activePage' => 'forms2',
'activeNav' => '',

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
                <div class="row-12">
                    <a href="{{route('formsb.create')}}" style="font-weight:bold" class="btn btn-primary">Create Form Category</a>
                </div>

                <div class="row-12">
                    <table id="formbuilderA" class="display">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">#</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Form Name</th>
                                <th scope="col" style="font-weight:bold ;font-size:16px!important;color:white">Date Created</th>
                                <th scope="col" style="font-weight:bold;font-size:16px!important;color:white">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php $loops = 1; ?>
                            @foreach($forms as $forms)
                            <tr>
                                <td>{{$loops}}</td>
                                <td>{{$forms->formAname}}</td>
                                <td><label>{{\Carbon\Carbon::parse($forms->created_at)->format('F j, Y');}}</label>
                                    <span>{{\Carbon\Carbon::parse($forms->created_at)->format('g:i A');}}</span>
                                </td>

                                <td class="d-flex">
                                    @if( $forms->status == 0 )
                                    <i onclick="formAfunction('formsb' , '{{ $forms->id }}', 'formslist')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                    <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                    <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                    @elseif( $forms->status == 1 )
                                    <i onclick="formAfunction('formsb' , '{{ $forms->id }}', 'formslist')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                    <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                    <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                    @elseif( $forms->status == 2 )
                                    <i onclick="formAfunction('formsb' , '{{ $forms->id }}', 'formslist')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                    <i onclick="formAfunction('formsb' , '{{ $forms->id }}', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                    <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                    <!-- <i onclick="openModal('{{ $forms->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i> -->
                                    @endif

                                </td>


                            </tr>
                            <?php $loops++; ?>
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
                <button type="button" class="btn btn-danger" onclick="confirmDelete('formsb','delete' )">Sure</button>
            </div>
        </div>
    </div>
</div>
@endsection