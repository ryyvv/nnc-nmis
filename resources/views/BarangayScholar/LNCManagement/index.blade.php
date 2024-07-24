@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'LNC Management',
'activePage' => 'LNCManagement',
'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING")}}</h5>
                    <div class="content" style="margin:30px">
                        <div class="row"> 
                                <a href="{{route('lncmanagement.create')}}" class="btn btn-primary">Create data</a>
                       
                            @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                            @endif


                            <!-- add table here! -->

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="colspan=1">#</th>
                                        <th scope="col">Date Monitoring </th>
                                        <th scope="col">Period CoveredA</th>
                                        <th scope="col">Period CoveredB</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach($lnclocation as $lnclocation)
                                    <tr>
                                        <th scope="rowspan=1">{{$lnclocation->id}}</th>
                                        <td>{{$lnclocation->dateMonitoring}}</td>
                                        <td>{{$lnclocation->periodCovereda}}</td>
                                        <td>{{$lnclocation->periodCoveredb}}</td>
                                        <td>{{$lnclocation->status}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('lncmanagement.edit', $lnclocation->id)}}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('lncmanagement.destroy', $lnclocation->id) }}"
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
    </div>
</div>
@endsection