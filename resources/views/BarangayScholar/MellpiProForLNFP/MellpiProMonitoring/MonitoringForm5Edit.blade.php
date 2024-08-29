<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script> -->
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 5 Monitoring',
'activePage' => 'mellpi_pro_form5',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; align-items:center;">
                        <a href="{{route('MellpiProMonitoringIndex.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <h4>CREATE MELLPI PRO FOR LNFP FORM 5a:</h4>
                    </div>

                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                        <form action="{{ route('lguLnfpUpdate', $row->id) }}" method="POST" id="form">
                            @csrf


                        
                            <input type="hidden" name="lnfp_lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" name="dateMonitoring" value="{{$row->dateMonitoring}}">
                            <input type="hidden" value="{{ $row->status }}" name="status" id="status">
                            <input type="hidden" value="draft" name="formrequest" id="formrequest" />
                            <input type="hidden" value="{{ $row->id }}" name="id" id="id" />

                            @foreach ($form5a as $form5a)

                            <div style="display:flex">
                            <div class="form-group col">
                                <label for="nameOf"> HEADER:<span style="color:red">*</span> </label>
                                <select class="form-control" name="header" id="header">
                                    <option>Select</option>
                                    <!-- For provincial staff -->
                                    @if( auth()->user()->role == 7 )
                                    <option value="5a">MELLPI PRO FORM 5a: PROVINCIAL NUTRITION ACTION OFFICER MONITORING</option>
                                    <!-- For City Municipal staff -->
                                    @elseif( auth()->user()->role == 7 || auth()->user()->role == 9 )
                                    <option value="5b">MELLPI PRO FORM 5b: CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING</option>
                                    <option value="5c1">MELLPI PRO FORM 5c.1: DISTRICT NUTRITION PROGRAM COORDINATOR MONITORING</option>
                                    <option value="5c2">MELLPI PRO FORM 5c.2: CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING</option>
                                    <!-- For barangay staff -->
                                    @elseif( auth()->user()->role == 7 || auth()->user()->role == 10 )
                                    <option value="MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING" selected >MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING</option>
                                    @endif
                                </select>
                            </div>
                            
                            </div>
                            <br />
                           
                           
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="text" name="nameOf" id="nameOf" value="{{ $row->nameofPnao }}">
                                    @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="address">Address:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="text" name="address" id="address" value="{{ $row->address }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="numYr">Number of Years PNAO:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="number" name="numYr" id="numYr" placeholder="0" min="1" max="100" value="{{ $row->numYearPnao }}">
                                    @error('numYr')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="fulltime">Full time:<span style="color:red">*</span> </label>
                                    <select class="form-control" name="fulltime" id="fulltime">
                                            <option {{ old('fulltime', $row->fulltime) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Yes" {{ old('fulltime', $row->fulltime) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('fulltime', $row->fulltime) == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('fulltime')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="profAct">With continuing professional Activities?:<span style="color:red">*</span> </label>
                                    <select class="form-control" name="profAct" id="profAct">
                                            <option {{ old('profAct', $row->profAct) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Yes" {{ old('profAct', $row->profAct) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('profAct', $row->profAct) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('profAct')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                   
                                </div>
                                <div class="form-group col">
                                        <label for="bday">Birthday:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="bday" id="bday" value="{{ $row->bdate }}">
                                        @error('bday')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="sex">Sex:<span style="color:red">*</span> </label>
                                    <select class="form-control" name="sex" id="sex">
                                            <option {{ old('sex', $row->sex) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Male" {{ old('sex', $row->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('sex', $row->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('sex')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col">
                                        <label for="dateDesig">Date of Designation:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateDesig" id="dateDesig" value="{{ $row->dateDesignation }}">
                                        @error('dateDesig')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="seconded">Seconded from the Office of:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="text" name="seconded" id="seconded" value="{{ $row->secondedOffice }}">
                                    @error('seconded')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="form-group col">
                                <label for="periodCovereda">For Period:<span style="color:red">*</span></label>
                                <select class="form-control" id="periodCovereda" name="periodCovereda" required>
                                    <option value="">Select</option>
                                        <?php foreach ($years as $year) : ?>
                                            <option value="{{ $year }}" <?php echo old('periodCovereda') == $year || $row->periodCovereda == $year ? 'selected' : '' ?>>
                                                {{ $year }}
                                            </option>
                                        <?php endforeach; ?>
                                </select>
                                @error('periodCovereda')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label>Capacity development activities attended in the previous year:<span style="color:red">*</span> </label>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">1</label>
                                        <input class="form-control" type="text" id="devAct" name="num1" value="{{ $row->devActnum1 }}">
                                        @error('num1')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">2</label>
                                        <input class="form-control" type="text" id="devAct" name="num2" value="{{ $row->devActnum2 }}">
                                        @error('num2')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">3</label>
                                        <input class="form-control" type="text" id="devAct" name="num3" value="{{ $row->devActnum3 }}">
                                        @error('num3')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col">&nbsp;</div>
                            </div>


                            <div class="form5">
                                <!-- endtablehearder -->
                                <div class="row" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">

                                    <div class="row table-responsive" style="display:flex;padding:10px;">
                                        <table class="table table-striped table-hover">
                                            <thead style="background-color:#508D4E;">
                                                <th class="text-center">&nbsp;</th>
                                                <th class="tableheader">Elements</th>
                                                <th colspan="5" class="tableheader">Performance Level</th>
                                                <th class="tableheader">Document Source</th>
                                                <th class="tableheader" style="padding-left:20px;padding-right:20px">Rating</th>
                                                <th class="tableheader">Remarks</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td class="bold text-center">1</td>
                                                    <td class="bold text-center">2</td>
                                                    <td class="bold text-center">3</td>
                                                    <td class="bold text-center">4</td>
                                                    <td class="bold text-center">5</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>A</td>
                                                    <td>{{$form5a->elementsA}}</td>
                                                    <td>{{$form5a->performanceA1}}</td>
                                                    <td>{{$form5a->performanceA2}}</td>
                                                    <td>{{$form5a->performanceA3}}</td>
                                                    <td>{{$form5a->performanceA4}}</td>
                                                    <td>{{$form5a->performanceA5}}</td>
                                                    <td>{{$form5a->documentSourceA}}</td>
                                                    <td>
                                                            <select id="loadProvince1" class="form-control" name="ratingA">
                                                                <!-- <option>Select</option> -->
                                                                <option>Select</option>
                                                                <option value="1" {{ old('ratingA', $row->ratingA) == 1 ? 'selected' : '' }}>1</option>
                                                                <option value="2" {{ old('ratingA', $row->ratingA) == 2 ? 'selected' : '' }}>2</option>
                                                                <option value="3" {{ old('ratingA', $row->ratingA) == 3 ? 'selected' : '' }}>3</option>
                                                                <option value="4" {{ old('ratingA', $row->ratingA) == 4 ? 'selected' : '' }}>4</option>
                                                                <option value="5" {{ old('ratingA', $row->ratingA) == 5 ? 'selected' : '' }}>5</option>
                                                            </select>
                                                            @error('ratingA')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                    </td>
                                                    <td><textarea name="remarksA" placeholder="Your remarks" class="form-control">{{ $row->remarksA }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>B</td>
                                                    <td>{{$form5a->elementsB}}</td>
                                                    <td>{{$form5a->performanceB1}}</td>
                                                    <td>{{$form5a->performanceB2}}</td>
                                                    <td>{{$form5a->performanceB3}}</td>
                                                    <td>{{$form5a->performanceB4}}</td>
                                                    <td>{{$form5a->performanceB5}}</td>
                                                    <td>{{$form5a->documentSourceB}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingB">
                                                            <!-- <option>Select</option> -->
                                                            <option>Select</option>
                                                            <option value="1" {{ old('ratingB', $row->ratingB) == 1 ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ old('ratingB', $row->ratingB) == 2 ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ old('ratingB', $row->ratingB) == 3 ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ old('ratingB', $row->ratingB) == 4 ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ old('ratingB', $row->ratingB) == 5 ? 'selected' : '' }}>5</option>
                                                        </select>
                                                        @error('ratingB')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td><textarea name="remarksB" placeholder="Your remarks" class="form-control">{{ $row->remarksB }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>{{$form5a->elementsBB}}</td>
                                                    <td>{{$form5a->performanceBB1}}</td>
                                                    <td>{{$form5a->performanceBB2}}</td>
                                                    <td>{{$form5a->performanceBB3}}</td>
                                                    <td>{{$form5a->performanceBB4}}</td>
                                                    <td>{{$form5a->performanceBB5}}</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingBB">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingBB', $row->ratingBB) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingBB', $row->ratingBB) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingBB', $row->ratingBB) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingBB', $row->ratingBB) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingBB', $row->ratingBB) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingBB')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksBB" placeholder="Your remarks" class="form-control">{{ $row->remarksBB }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>C</td>
                                                    <td>{{$form5a->elementsC}}</td>
                                                    <td>{{$form5a->performanceC1}}</td>
                                                    <td>{{$form5a->performanceC2}}</td>
                                                    <td>{{$form5a->performanceC3}}</td>
                                                    <td>{{$form5a->performanceC4}}</td>
                                                    <td>{{$form5a->performanceC5}}</td>
                                                    <td>{{$form5a->documentSourceC}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingC">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingC', $row->ratingC) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingC', $row->ratingC) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingC', $row->ratingC) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingC', $row->ratingC) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingC', $row->ratingC) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingC')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksC" placeholder="Your remarks" class="form-control">{{ $row->remarksC }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>D</td>
                                                    <td>{{$form5a->elementsD}}</td>
                                                    <td>{{$form5a->performanceD1}}</td>
                                                    <td>{{$form5a->performanceD2}}</td>
                                                    <td>{{$form5a->performanceD3}}</td>
                                                    <td>{{$form5a->performanceD4}}</td>
                                                    <td>{{$form5a->performanceD5}}</td>
                                                    <td>{{$form5a->documentSourceD}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingD">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingD', $row->ratingD) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingD', $row->ratingD) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingD', $row->ratingD) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingD', $row->ratingD) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingD', $row->ratingD) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingD')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksD" placeholder="Your remarks" class="form-control">{{ $row->remarksD }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>E</td>
                                                    <td>{{$form5a->elementsE}}</td>
                                                    <td>{{$form5a->performanceE1}}</td>
                                                    <td>{{$form5a->performanceE2}}</td>
                                                    <td>{{$form5a->performanceE3}}</td>
                                                    <td>{{$form5a->performanceE4}}</td>
                                                    <td>{{$form5a->performanceE5}}</td>
                                                    <td>{{$form5a->documentSourceE}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingE">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingE', $row->ratingE) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingE', $row->ratingE) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingE', $row->ratingE) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingE', $row->ratingE) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingE', $row->ratingE) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingE')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksE" placeholder="Your remarks" class="form-control"> {{ $row->remarksE }} </textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>F</td>
                                                    <td>{{$form5a->elementsF}}</td>
                                                    <td>{{$form5a->performanceF1}}</td>
                                                    <td>{{$form5a->performanceF2}}</td>
                                                    <td>{{$form5a->performanceF3}}</td>
                                                    <td>{{$form5a->performanceF4}}</td>
                                                    <td>{{$form5a->performanceF5}}</td>
                                                    <td>{{$form5a->documentSourceF}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingF">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingF', $row->ratingF) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingF', $row->ratingF) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingF', $row->ratingF) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingF', $row->ratingF) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingF', $row->ratingF) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingF')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksF" placeholder="Your remarks" class="form-control"> {{ $row->remarksF }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>G</td>
                                                    <td>{{$form5a->elementsG}}</td>
                                                    <td>{{$form5a->performanceG1}}</td>
                                                    <td>{{$form5a->performanceG2}}</td>
                                                    <td>{{$form5a->performanceG3}}</td>
                                                    <td>{{$form5a->performanceG4}}</td>
                                                    <td>{{$form5a->performanceG5}}</td>
                                                    <td>{{$form5a->documentSourceG}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingG">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingG', $row->ratingG) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingG', $row->ratingG) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingG', $row->ratingG) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingG', $row->ratingG) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingG', $row->ratingG) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingG')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksG" placeholder="Your remarks" class="form-control">{{ $row->remarksG }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>{{$form5a->elementsGG}}</td>
                                                    <td>{{$form5a->performanceGG1}}</td>
                                                    <td>{{$form5a->performanceGG2}}</td>
                                                    <td>{{$form5a->performanceGG3}}</td>
                                                    <td>{{$form5a->performanceGG4}}</td>
                                                    <td>{{$form5a->performanceGG5}}</td>
                                                    <td>{{$form5a->documentSourceGG}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingGG">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingGG', $row->ratingGG) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingGG', $row->ratingGG) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingGG', $row->ratingGG) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingGG', $row->ratingGG) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingGG', $row->ratingGG) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingGG')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksGG" placeholder="Your remarks" class="form-control">{{ $row->remarksGG }}</textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>H</td>
                                                    <td>{{$form5a->elementsH}}</td>
                                                    <td>{{$form5a->performanceH1}}</td>
                                                    <td>{{$form5a->performanceH2}}</td>
                                                    <td>{{$form5a->performanceH3}}</td>
                                                    <td>{{$form5a->performanceH4}}</td>
                                                    <td>{{$form5a->performanceH5}}</td>
                                                    <td>{{$form5a->documentSourceH}}</td>
                                                    <td>
                                                    <select id="loadProvince1" class="form-control" name="ratingH">
                                                        <!-- <option>Select</option> -->
                                                        <option>Select</option>
                                                        <option value="1" {{ old('ratingH', $row->ratingH) == 1 ? 'selected' : '' }}>1</option>
                                                        <option value="2" {{ old('ratingH', $row->ratingH) == 2 ? 'selected' : '' }}>2</option>
                                                        <option value="3" {{ old('ratingH', $row->ratingH) == 3 ? 'selected' : '' }}>3</option>
                                                        <option value="4" {{ old('ratingH', $row->ratingH) == 4 ? 'selected' : '' }}>4</option>
                                                        <option value="5" {{ old('ratingH', $row->ratingH) == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                    @error('ratingH')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </td>
                                                    <td><textarea name="remarksH" placeholder="Your remarks" class="form-control">{{ $row->remarksH }}</textarea></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>

                
                        
                            @endforeach
                    


                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                              
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                    Save as Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Next Form
                                </button>
                        
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('Modal.Draft')
@include('Modal.Submit')


@endsection

