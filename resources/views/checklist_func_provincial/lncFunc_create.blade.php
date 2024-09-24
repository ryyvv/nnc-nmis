<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'lncFunctionality',
'activePage' => 'lncFunctionality',
'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__(" LNC Functional Provincial")}}</h5>
            </div>
        </div>
        <div class="row row-12" style="min-height:1200px">
            <div>
                <form class="form-floating">
                    <div class="  mb-3">
                        <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold ">PSGC</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="input PSGC data">
                    </div>

                    <div class="  mb-3">
                        <select class="form-select form-select-lg mb-3" aria-label="Default select example">
                            <option selected>Geographic Level</option>
                            <option value="1">Regional</option>
                            <option value="2">HUC</option>
                            <option value="3">ICC</option>
                            <option value="4">Municipal</option>
                            <option value="5">SGA</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold ">Income
                            Class</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="input PSGC data">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"
                            style="font-weight:bold ">Regional</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="input PSGC data">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"
                            style="font-weight:bold ">Provincial</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="input PSGC data">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"
                            style="font-weight:bold ">City/Municipal</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="input PSGC data">
                    </div>
                    <div class="  mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Indicator</option>
                            <option value="1">0</option>
                            <option value="2">1</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection