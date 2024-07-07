@extends('layouts.BSapp', [
'class' => 'sidebar-mini ',
'namePage' => 'Form Builder',
'activePage' => 'forms2',
'activeNav' => '',
])

@section('content')

<div class="content">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Create Form")}}</h5>
                    <div class="content" style="margin:30px">
                        <div class="row">
                            <form action="{{route('formsb.store')}}" method="POST">
                            @csrf
                                <div style="display:flex">
                                    <div class="form-group ">
                                        <label for="exampleFormControlInput1">Form name:</label>
                                        <input type="text" class="form-control" name="formname" required>
                                        <input type="hidden" class="form-control" name="status" value="pending">
                                        <input type="hidden" class="form-control" name="datecreated" value="01/01/2024">
                                        <input type="hidden" class="form-control" name="lastupdate" value="01/01/2024">
                                    </div>
                                </div>
                                <div style="display:flex">
                                     <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection