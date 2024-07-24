@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Vision Mission',
'activePage' => 'VISION',
'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("MELLPI PROFORM B 1a: BARANGAY NUTRITION MONITORING")}}</h5>
                    <div class="content" style="margin:30px">
                        <div class="row">
                            <div style="display:flex;align-items:center">
                                <a href="{{route('visionmission.create')}}" class="btn btn-primary">Create data</a>
                                <p style="margin-bottom:0px;margin-left:25px; font-weight:900;font-size:25px">MELLPI PROFORM B 1a: BARANGAY NUTRITION MONITORING</p>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                            @endif
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


                                    @foreach($vmlocation as $vmlocation)
                                    <tr>
                                        <th scope="rowspan=1">{{$vmlocation->id}}</th>
                                        <td>{{$vmlocation->dateMonitoring}}</td>
                                        <td>{{$vmlocation->periodCovereda}}</td>
                                        <td>{{$vmlocation->periodCoveredb}}</td>
                                        <td>{{$vmlocation->status}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('visionmission.edit', $vmlocation->id)}}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('visionmission.destroy', $vmlocation->id) }}"
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