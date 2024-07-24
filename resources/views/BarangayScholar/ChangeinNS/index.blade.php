@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'change Nutrition Status',
'activePage' => 'changeNS',
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
                    <h5 class="title">{{__("Title")}}</h5>
                    <div class="content" style="margin:30px">
                        <div class="row">
                            <div>
                                <a href="{{route('changeNS.create')}}" class="btn btn-primary">Create data</a>
                            </div>
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


                                    @foreach($cnlocation as $cnlocation)
                                    <tr>
                                        <th scope="rowspan=1">{{$cnlocation->id}}</th>
                                        <td>{{$cnlocation->dateMonitoring}}</td>
                                        <td>{{$cnlocation->periodCovereda}}</td>
                                        <td>{{$cnlocation->periodCoveredb}}</td>
                                        <td>{{$cnlocation->status}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('changeNS.edit', $cnlocation->id)}}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('changeNS.destroy', $cnlocation->id) }}"
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