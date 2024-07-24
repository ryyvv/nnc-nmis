@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Discussion Question',
'activePage' => 'discussionquestion',
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
                                <a href="{{route('discussionquestion.create')}}" class="btn btn-primary">Create data</a>
                            </div>


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="colspan=1">#</th>
                                        <th scope="col">Date Monitoring </th>
                                        <th scope="col">Period Covered</th> 
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach($dqlocation as $dqlocation)
                                    <tr>
                                        <th scope="rowspan=1">{{$dqlocation->id}}</th>
                                        <td>{{$dqlocation->dateMonitoring}}</td>
                                        <td>{{$dqlocation->periodCovered}}</td> 
                                        <td>{{$dqlocation->status}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('discussionquestion.edit', $dqlocation->id)}}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('discussionquestion.destroy', $dqlocation->id) }}"
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