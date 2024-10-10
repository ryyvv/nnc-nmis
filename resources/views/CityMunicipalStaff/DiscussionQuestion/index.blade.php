<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Discussion Question',
'activePage' => 'discussionquestion',
'activeNav' => 'MELLPI PRO For LGU', 
])

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <a href="{{route('CMSdiscussionquestion.index')}}">
                    <h5 class="title">{{__("List of Discussion Question")}}</h5>
                </a>
            </div>


            <div class="content" style="margin:30px;">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                 
                <div class="row-12">
                    <a href="{{route('CMSdiscussionquestion.create')}}" class="btn btn-primary bolder">Create data</a>
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
                                <td>{{$dqlocations->firstname}} {{$dqlocations->middlename}} {{$dqlocations->lastname}}</td>
                                <td>{{$dqlocations->dateMonitoring}}</td>
                                <td>{{$dqlocations->periodCovereda}}</td>
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
                                                <i  class="fa fa-eye fa-lg cursor" style="color:gray;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i onclick="view('discussionquestion','{{ $dqlocations->id }}','edit')"  class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="openModal('{{ $dqlocations->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
                                                @endif
                                            </li>
                                        </ul>
                               
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

@include('Modal.DeleteDQ')
 
@endsection