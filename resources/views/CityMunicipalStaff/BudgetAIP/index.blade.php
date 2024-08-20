<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script>


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

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Budget AIP',
'activePage' => 'budgetAIP',
'activeNav' => 'MELLPI PRO For LGU', 
])

 
@section('content')

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
      
        <div style="display:flex;align-items:center">
            <!-- <a href="{{route('formsb.index')}}"> -->
                <h5 class="title">{{__("List of Change in NS")}}</h5>
            <!-- </a> -->
        </div>
 

        <div class="content" style="margin:30px;">
            <!-- alerts -->
            @include('layouts.page_template.crud_alert_message')

            <div class="row-12">
                <a href="{{route('CMSbudgetAIP.create')}}" class="btn btn-primary bolder">Create data</a>
            </div>

            <div class="row-12">
                    <table class="display" id="myTable" width="100%">
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

                            <?php $num = 1; ?>
                            
                            @foreach($cnlocation as $cnlocation)
                                    <tr>
                                        <th scope="rowspan=1">{{$num}}</th>
                                        <td>{{$cnlocation->firstname}} {{$cnlocation->middlename}} {{$cnlocation->lastname}}</td>
                                        <td>{{$cnlocation->dateMonitoring}}</td>
                                        <td>{{$cnlocation->periodCovereda}}</td> 
                                        <td>  
                                            @if( $cnlocation->status == 0 )
                                            <span class="statusApproved">APPROVED</span>
                                            @elseif( $cnlocation->status == 1 )
                                            <span class="statusPending">PENDING</span>
                                            @elseif( $cnlocation->status == 2 )
                                            <span class="statusDraft">DRAFT</span>
                                            @endif</td>
                                        <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                @if( $cnlocation->status == 0 )
                                                <i onclick="view('changeNS','{{ $cnlocation->id }}','show')"  class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                               
                                                @elseif( $cnlocation->status == 1 )
                                                <i onclick="view('changeNS','{{ $cnlocation->id }}','show')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i class="fa fa-edit fa-lg cursor" style="color:gray;margin-right:10px" title="Edit Disabled"></i>
                                                <i class="fa fa-trash fa-lg cursor" style="color:gray;margin-right:10px" title="Delete "></i>
                                              
                                                @elseif( $cnlocation->status == 2 )
                                                <i   class="fa fa-eye fa-lg cursor" style="color:gray;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                <i onclick="view('changeNS','{{ $cnlocation->id }}','edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                <i onclick="openModal('{{ $cnlocation->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i>
                                                
                                                @endif
                                            </li>
                                        </ul>
                                        </td>
                            
                                    </tr>
                                    <?php $num++; ?>
                             @endforeach
                        </tbody>
                    </table>
                </div>
        
        </div>
    </div>
</div>
</div>

 
@include('Modal.DeleteBudget')


@endsection