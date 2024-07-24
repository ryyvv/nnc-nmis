<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>


@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form Management',
'activePage' => 'forms2',
'activeNav' => '',
])

@section('content')

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-hearder">

            <div style="display:flex;align-items:center">
                <a href="{{route('formsb.index')}}">
                    <h5 class="title" style="margin:3px">{{$formsA->formAname}}</h5>
                </a>
            </div>
           
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style= "font-family: Arial, sans-serif;font-style:italic" href="{{route('formsb.index')}}">{{$formsA->formAname}}</a></li>
                    <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic;" href="{{route('formsb.formList',[ $formsA->id, $formsB->id])}}">{{$formsB->formBname}} Form</a></li>
                    <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Create Fields</li>
                </ol>
            </nav>

            @include('layouts.page_template.crud_alert_message')

            <div class="content" style="margin:30px">
                <div class="row-12"> 
                    <form action="{{route('formsb.storeFormC', ['id' => $formsA->id, 'idb' => $formsB->id])}}" method="POST">
                        @csrf

                        <input type="hidden" name="formbuilderA_id" value="{{$formsA->id}}">
                        <input type="hidden" name="formbuilderB_id" value="{{$formsB->id}}">
                        <input type="hidden" name="status" value="2">
                        <div>
                            <div id="fields">
                                <div class="d-flex formRow" >
                                    <div class=" col-4 form-group">
                                        <label for="exampleFormControlInput1">Field Label:</label>
                                        <input type="text" class="form-control form-control-lg"   type="text" name="fields[0][label]" >
                                    </div>
                                    <div class=" col-4 form-group">
                                        <label for="exampleFormControlInput1">Field Name:</label>
                                        <input type="text" class="form-control form-control-lg" type="text" name="fields[0][name]" >
                                    </div>
                                    <div class=" col-4 form-group">
                                        <label for="exampleFormControlInput1">Field Type:</label>
                                         <!-- <input type="text" class="form-control form-control-lg" type="text" name="fields[0][type]" > -->

                                        <select name="fields[0][type]"   class="form-control form-control-lg" type="text"  >
                                            <option value="">Choose...</option>
                                            <option value="label">Label</option>
                                            <option value="text">Text</option>
                                            <option value="number">Number</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div>   
                            </div>  
                        </div>

                        <br><br>
                        <button type="button" onclick="addField()" class="btn btn-primary">Add Field</button>
                        <button type="submit" class="btn btn-warning">Create Form</button>
                    </form>
                </div>
            </div>



        </div>
    </div>


</div>

<script>
    let fieldCount = 1;

    function addField() {
        const fieldsDiv = document.getElementById('fields');
        const newFieldDiv = document.createElement('div');
        newFieldDiv.className = 'd-flex formRow';

        newFieldDiv.innerHTML = `  
                    <div class="d-flex" style="width:100%;margin-top:20px" >
                        <div class=" col-4  form-group">
                            <label for="exampleFormControlInput1">Field Label:</label>
                            <input type="text" class="form-control form-control-lg"  type="text" name="fields[${fieldCount}][label]"   >
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeField(this)">Remove</button>
                            </div>
                        <div class=" col-4 form-group">
                            <label for="exampleFormControlInput1">Field Name:</label>
                            <input type="text" class="form-control form-control-lg"  type="text" name="fields[${fieldCount}][name]"   >
                        </div>
                        <div class=" col-4 form-group">
                            <label for="exampleFormControlInput1">Field Type:</label>
                            <select name="fields[${fieldCount}][type]" class="form-control form-control-lg" type="text"  >
                                            <option value="">Choose...</option>
                                            <option value="label">Label</option>
                                            <option value="text">Text</option>
                                            <option value="number">Number</option>
                                            <option value="date">Date</option>
                                        </select>
                        </div>
                    <div> 
              
            `;

        fieldsDiv.appendChild(newFieldDiv);
        fieldCount++;
    }

    function removeField(button) {
    // Traverse up the DOM tree to find the parent div that should be removed
    const fieldDiv = button.closest('.formRow');
    fieldDiv.remove();
}
</script>
@endsection