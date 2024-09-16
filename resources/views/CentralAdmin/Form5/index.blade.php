<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>


@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Form5 PNAO',
'activePage' => 'form5a',
'activeNav' => '',
])

@section('content')

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <div>
                <form action="" method="POST">
                    @csrf
                    <div class=" form-row justify-content-end">
                        <div class="col-4 d-flex ">
                            <input type="text" class="form-control" name="role" placeholder="Role">
                            <button class="btn btn-primary" type="submit">Add role</button>
                        </div>
                    </div>
                </form>
            </div> -->

            @include('layouts.page_template.crud_alert_message')
            
            <div class="row-12" >
                <table class="display" id="myTableForm5" style="width:100%!important; max-width:inherit" >
                    <thead style="background-color:#508D4E;">
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">Elements</th>
                            <th scope="col">1</th>
                            <th scope="col">2</th>
                            <th scope="col">3</th>
                            <th scope="col">4</th>
                            <th scope="col">5</th>
                            <th scope="col">Document Source</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($forms as $form)
                        <tr>
                            <td>
                                <i onclick="myForm5Edit('{{ $form->id }}')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                            </td>
                            <td>{{ $form->column1 }}</td>
                            <td>{{ $form->column2 }}</td>
                            <td class="">{{ $form->column3 }}</td>
                            <td class="">{{ $form->column4 }}</td>
                            <td class="">{{ $form->column5 }}</td>
                            <td class="">{{ $form->column6 }}</td>
                            <td class="">{{ $form->column7 }}</td>
                            <td class="">{{ $form->column8 }}</td>
                        </tr>
                        
                        @endforeach
                    </tbody> 
            </div>
        </div>
    </div>
</div>
@endsection
