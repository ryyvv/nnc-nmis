<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Discussion Question',
'activePage' => 'discussionquestion',
'activeNav' => '',
])

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <a href="{{route('formsb.index')}}">
                    <h5 class="title">{{__("List of Discussion Question")}}</h5>
                </a>
            </div>


            <div class="content" style="margin:30px;">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                <div class="alert alert-success d-none" id="successAlert" role="alert">
                    Data deleted successfully!
                </div>
                <div class="row-12">
                    <a href="{{route('discussionquestion.create')}}" class="btn btn-primary bolder">Create data</a>
                </div>
                <div class="row-12">
                    <table class="display" id="myTableQC" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" class="tableheader">#</th>
                                <th scope="col-4" class="tableheader">Officer</th>
                                <th scope="col-4" class="tableheader">Date Monitoring </th>
                                <th scope="col" class="tableheader">Period Covered</th>
                                <th scope="col-2" class="tableheader">Status</th>
                                <th scope="col" class="tableheader">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $nums = 1; ?>
                            @foreach($dqlocation as $dqlocations)
                            <tr>
                                <td>{{$nums}}</td>
                                <td>dynamic Name(show)</td>
                                <td>{{$dqlocations->dateMonitoring}}</td>
                                <td>{{$dqlocations->periodCovered}}</td>
                                <td>
                                    @if( $dqlocations->status == 0 )
                                    <span class="statusApproved">APPROVED</span>
                                    @elseif( $dqlocations->status == 1 )
                                    <span class="statusPending">PENDING</span>
                                    @elseif( $dqlocations->status == 2 )
                                    <span class="statusDraft">DRAFT</span>
                                    @endif
                                </td>
                                <td>
                                <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $dqlocations->status == 0 )  
                                                <i onclick="view('discussionquestion','{{ $dqlocations->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                @elseif( $dqlocations->status == 1 )
                                                <i onclick="view('discussionquestion','{{ $dqlocations->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                                @elseif( $dqlocations->status == 2 )
                                                <i onclick="view('discussionquestion','{{ $dqlocations->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i onclick="view('discussionquestion','{{ $dqlocations->id }}','edit')"  class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="openModal('{{ $dqlocations->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
                                                @endif
                                            </li>
                                        </ul>
                                    <!-- <a href="{{route('discussionquestion.edit', $dqlocations->id)}}" class="btn btn-primary">edit</a>
                                    <form action="{{ route('discussionquestion.destroy', $dqlocations->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete data?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> -->
                                </td> 
                            </tr>
                            <?php $nums++; ?>
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
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Sure</button>
            </div>
        </div>
    </div>
</div>
@endsection