@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form Builder',
'activePage' => 'forms2',
'activeNav' => '',
])

@section('content')

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
                <div class="card-header">
                    <h5 class="title">{{__("Edit Category Title")}}</h5>
                    <div class="content" style="margin:30px">
                        <div class="row">
                            <form action="{{route('formsb.update',$forms->id )}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div style="display:flex">
                                    <div class="form-group ">
                                        <label for="exampleFormControlInput1">Form Title:</label>
                                        <input type="text" class="form-control" name="formAname" value="{{$forms->formBname}}" required>
                                        <input type="hidden" class="form-control" name="status" value="2">
                                        <input type="hidden" class="form-control" name="formbuilderA_id" value="{{$formsA->id}}"> 
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
@endsection