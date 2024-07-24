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
            <h5 class="title">{{__("Create Form Title")}}</h5>
            @include('layouts.page_template.crud_alert_message')
            <div class="content" style="margin:30px">
                <div class="row row-12">
                    <form action="{{route('formsb.store')}}" method="POST">
                        @csrf
                        <div style="display:flex">
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Form name:</label>
                                <input type="text" class="form-control" name="formAname" required>
                                <input type="hidden" class="form-control" name="status" value="2"> 
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