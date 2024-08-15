<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
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
                        <!-- <h4>MELLPI PRO FOR LNFP FORM 5a:</h4> -->
                    </div>

                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                        <form action="{{ route('lguLnfpUpdate', $row->id) }}" method="POST">
                            @csrf


                            @if($row)
                            <input type="hidden" name="lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" name="dateMoni" value="{{$row->dateMonitoring}}">
                            <input type="hidden" value="{{ $row->status }}" name="statForm">

                            @foreach ($form5a as $form5a)
                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro Form 5a: Provincial Nutrition Action Officer Monitoring")}}</h5>
                                
                            </center><br>
                            @include('layouts.page_template.location_header')
                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ $row->nameofPnao }}">
                                        @error('numOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="address" id="address" value="{{ $row->address }}">
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group col-md-12">
                                        <label for="provDep">Province of Deployment: </label>
                                        <input class="inputHeader" type="text" name="provDev" id="provDev" value="{{ $row->provDeploy }}">
                                    </div> -->
                                    <div class="form-group col-md-12">
                                        <label for="numYr">Number of Years PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="number" name="numYr" id="numYr" placeholder="0" value="{{ $row->numYearPnao }}">
                                        @error('numYr')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="fulltime">Full time:<span style="color:red">*</span> </label>
                                        <select class="form-control" name="fulltime" id="fulltime" value="{{ $row->fulltime }}">
                                            <!-- <option value="">{{ $row->fulltime }}</option> -->
                                            <option {{ old('fulltime', $row->fulltime) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Yes" {{ old('fulltime', $row->fulltime) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('fulltime', $row->fulltime) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('fulltime')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="profAct">With continuing professional Activities?:<span style="color:red">*</span> </label>
                                        <select class="form-control" name="profAct" id="profAct" value="{{ $row->profAct }}">
                                            <!-- <option Selected>Select</option> -->
                                            <option {{ old('profAct', $row->profAct) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Yes" {{ old('profAct', $row->profAct) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('profAct', $row->profAct) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('profAct')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Birthday:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="bday" id="bday" value="{{ $row->bdate }}">
                                        @error('bday')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="sex">Sex:<span style="color:red">*</span> </label>
                                        <select class="form-control" name="sex" id="sex" value="{{ $row->sex }}">
                                            <!-- <option selected>Select</option> -->
                                            <option {{ old('sex', $row->sex) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Male" {{ old('sex', $row->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('sex', $row->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('sex')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="dateDesig">Date of Designation:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateDesig" id="dateDesig" value="{{ $row->dateDesignation }}">
                                        @error('dateDesig')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="seconded">Seconded from the Office of: </label>
                                        <input class="inputHeader" type="text" name="seconded" id="seconded" value="{{ $row->secondedOffice }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Capacity development activities attended in the previous year: </label>
                                <div class="form-group col-md-12">
                                    <label for="devAct">1</label>
                                    <input class="inputHeader" type="text" id="devAct" name="num1" value="{{ $row->devActnum1 }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="devAct">2</label>
                                    <input class="inputHeader" type="text" id="devAct" name="num2" value="{{ $row->devActnum2 }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="devAct">3</label>
                                    <input class="inputHeader" type="text" id="devAct" name="num3" value="{{ $row->devActnum3 }}">
                                </div>
                            </div>
                            <div>
                                <div class="editContentButtons">
                                    <input type="hidden" id="action" name="action" value="">

                                    <button type="button" class="btn btn-outline-primary" id="editForm" onclick="toggleReadonly()" hidden>Edit Contents</button>
                                    <!-- <button type="submit" name="action" value="update" class="btn btn-outline-primary">Save</button> -->
                                    <!-- <button type="button" name="cancel" id="cancelForm" class="btn btn-outline-primary" onclick="cancelForm()" hidden>Cancel</button> -->
                                    <button type="submit" name="action" value="update" id="saveForm" class="btn btn-outline-primary" hidden>Save All</button>
                                </div>
                            </div>


                            <div class="form5">
                                <!-- endtablehearder -->
                                <div class="row" style="display:flex;background-color:#F5F5F5;padding:10px;border-radius:5px;justify-content:center; text-align: center;">
                                    <div class="col-2 justify-content-center">
                                        <label for="exampleFormControlInput1"><b>ELEMENTS</b></label>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>PERFORMANCE LEVEL</b></label>
                                        </div>
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>1</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>2</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>3</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>4</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>5</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1"><b>DOCUMENT SOURCE</b></label>
                                    </div>
                                    <div class="col-1" id="labelRating">
                                        <label for="exampleFormControlInput1"><b>RATING</b></label>
                                    </div>
                                    <div class="col-1" id="labelRemark">
                                        <label for="exampleFormControlInput1"><b>REMARKS/EVIDENCE</b></label>
                                    </div>
                                </div>
                                <br>
                                <!-- endtablehearder -->


                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>A</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsA}}</label>
                                            <textarea name="elementsA" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsA}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceA1}}</label>
                                                <textarea name="performanceA1" id="performanceA1" class="performance" hidden readonly>{{$form5a->performanceA1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceA2}}</label>
                                                <textarea name="performanceA2" id="performanceA2" class="performance" hidden readonly>{{$form5a->performanceA2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceA3}}</label>
                                                <textarea name="performanceA3" id="performanceA3" class="performance" hidden readonly>{{$form5a->performanceA3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceA4}}</label>
                                                <textarea name="performanceA4" id="performanceA4" class="performance" hidden readonly>{{$form5a->performanceA4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceA5}}</b></label>
                                                <textarea name="performanceA5" id="performanceA5" class="performance" hidden readonly>{{$form5a->performanceA5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceA}}</label>
                                        <textarea name="docuSourceA" id="docuSourceA" class="performance" hidden readonly>{{$form5a->documentSourceA}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingA">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingA', $row->ratingA) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingA', $row->ratingA) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingA', $row->ratingA) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingA', $row->ratingA) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingA', $row->ratingA) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingA', $row->ratingA) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingA')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksA" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksA }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>B</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsB}}</label>
                                            <textarea name="elementsB" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsB}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceB1}}</label>
                                                <textarea name="performanceB1" id="performanceB1" class="performance" hidden readonly>{{$form5a->performanceB1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceB2}}</label>
                                                <textarea name="performanceB2" id="performanceB2" class="performance" hidden readonly>{{$form5a->performanceB2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceB3}}</label>
                                                <textarea name="performanceB3" id="performanceB3" class="performance" hidden readonly>{{$form5a->performanceB3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceB4}}</label>
                                                <textarea name="performanceB4" id="performanceB4" class="performance" hidden readonly>{{$form5a->performanceB4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceB5}}</label>
                                                <textarea name="performanceB5" id="performanceB5" class="performance" hidden readonly>{{$form5a->performanceB5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceB}}</label>
                                        <textarea name="docuSourceB" id="docuSourceB" class="performance" hidden readonly>{{$form5a->documentSourceB}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingB">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingB', $row->ratingB) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingB', $row->ratingB) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingB', $row->ratingB) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingB', $row->ratingB) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingB', $row->ratingB) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingB', $row->ratingB) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingB')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksB" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksB }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1" class="tab"><b></b></label>
                                        </div>
                                        <div class="col">
                                            <!-- <label for="exampleFormControlInput1"></label> -->
                                            <textarea name="elementsBB" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsBB}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceBB1}}</label>
                                                <textarea name="performanceBB1" id="performanceBB1" class="performance" hidden readonly>{{$form5a->performanceBB1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceBB2}}</label>
                                                <textarea name="performanceBB2" id="performanceBB2" class="performance" hidden readonly>{{$form5a->performanceBB2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceBB3}}</label>
                                                <textarea name="performanceBB3" id="performanceBB3" class="performance" hidden readonly>{{$form5a->performanceBB3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceBB4}}</label>
                                                <textarea name="performanceBB4" id="performanceBB4" class="performance" hidden readonly>{{$form5a->performanceBB4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceBB5}}</label>
                                                <textarea name="performanceBB5" id="performanceBB5" class="performance" hidden readonly>{{$form5a->performanceBB5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <!-- <label for="exampleFormControlInput1"></label> -->
                                        <textarea name="docuSourceBB" id="docuSourceBB" class="performance" hidden readonly>{{$form5a->documentSourceBB}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingBB">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingBB', $row->ratingBB) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingBB', $row->ratingBB) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingBB', $row->ratingBB) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingBB', $row->ratingBB) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingBB', $row->ratingBB) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingBB', $row->ratingBB) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingBB')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksBB" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksBB }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>C</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsC}}</label>
                                            <textarea name="elementsC" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsC}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceC1}}</label>
                                                <textarea name="performanceC1" id="performanceC1" class="performance" hidden readonly>{{$form5a->performanceC1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceC2}}</label>
                                                <textarea name="performanceC2" id="performanceC2" class="performance" hidden readonly>{{$form5a->performanceC2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performancec3}}</label>
                                                <textarea name="performanceC3" id="performanceC3" class="performance" hidden readonly>{{$form5a->performancec3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceC4}}</label>
                                                <textarea name="performanceC4" id="performanceC4" class="performance" hidden readonly>{{$form5a->performanceC4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceC5}}</label>
                                                <textarea name="performanceC5" id="performanceC5" class="performance" hidden readonly>{{$form5a->performanceC5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceC}}</label>
                                        <textarea name="docuSourceC" id="docuSourceC" class="performance" hidden readonly>{{$form5a->documentSourceC}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingC">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingC', $row->ratingC) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingC', $row->ratingC) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingC', $row->ratingC) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingC', $row->ratingC) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingC', $row->ratingC) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingC', $row->ratingC) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingC')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksC" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksC }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>D</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsD}}</label>
                                            <textarea name="elementsD" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsD}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceD1}}</label>
                                                <textarea name="performanceD1" id="performanceD1" class="performance" hidden readonly>{{$form5a->performanceD1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceD2}}</label>
                                                <textarea name="performanceD2" id="performanceD2" class="performance" hidden readonly>{{$form5a->performanceD2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceD3}}</label>
                                                <textarea name="performanceD3" id="performanceD3" class="performance" hidden readonly>{{$form5a->performanceD3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceD4}}</label>
                                                <textarea name="performanceD4" id="performanceD4" class="performance" hidden readonly>{{$form5a->performanceD4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceD5}}</label>
                                                <textarea name="performanceD5" id="performanceD5" class="performance" hidden readonly>{{$form5a->performanceD5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceD}}</label>
                                        <textarea name="docuSourceD" id="docuSourceD" class="performance" hidden readonly>{{$form5a->documentSourceD}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingD">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingD', $row->ratingD) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingD', $row->ratingD) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingD', $row->ratingD) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingD', $row->ratingD) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingD', $row->ratingD) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingD', $row->ratingD) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingD')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksD" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksD }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>E</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsE}}</label>
                                            <textarea name="elementsE" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsE}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceE1}}</label>
                                                <textarea name="performanceE1" id="performanceE1" class="performance" hidden readonly>{{$form5a->performanceE1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceE2}}</label>
                                                <textarea name="performanceE2" id="performanceE2" class="performance" hidden readonly>{{$form5a->performanceE2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceE3}}</label>
                                                <textarea name="performanceE3" id="performanceE3" class="performance" hidden readonly>{{$form5a->performanceE3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceE4}}</label>
                                                <textarea name="performanceE4" id="performanceE4" class="performance" hidden readonly>{{$form5a->performanceE4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceE5}}</label>
                                                <textarea name="performanceE5" id="performanceE5" class="performance" hidden readonly>{{$form5a->performanceE5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceE}}</label>
                                        <textarea name="docuSourceE" id="docuSourceE" class="performance" hidden readonly>{{$form5a->documentSourceE}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingE">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingE', $row->ratingE) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingE', $row->ratingE) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingE', $row->ratingE) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingE', $row->ratingE) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingE', $row->ratingE) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingE', $row->ratingE) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingE')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksE" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksE }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>F</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsF}}</label>
                                            <textarea name="elementsF" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsF}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceF1}}</label>
                                                <textarea name="performanceF1" id="performanceF1" class="performance" hidden readonly>{{$form5a->performanceF1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceF2}}</label>
                                                <textarea name="performanceF2" id="performanceF2" class="performance" hidden readonly>{{$form5a->performanceF2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceF3}}</label>
                                                <textarea name="performanceF3" id="performanceF3" class="performance" hidden readonly>{{$form5a->performanceF3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceF4}}</label>
                                                <textarea name="performanceF4" id="performanceF4" class="performance" hidden readonly>{{$form5a->performanceF4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceF5}}</label>
                                                <textarea name="performanceF5" id="performanceF5" class="performance" hidden readonly>{{$form5a->performanceF5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceF}}</label>
                                        <textarea name="docuSourceF" id="docuSourceF" class="performance" hidden readonly>{{$form5a->documentSourceF}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingF">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingF', $row->ratingF) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingF', $row->ratingF) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingF', $row->ratingF) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingF', $row->ratingF) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingF', $row->ratingF) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingF', $row->ratingF) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingF')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksF" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksF }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>G</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsG}}</label>
                                            <textarea name="elementsG" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsG}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceG1}}</label>
                                                <textarea name="performanceG1" id="performanceG1" class="performance" hidden readonly>{{$form5a->performanceG1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceG2}}</label>
                                                <textarea name="performanceG2" id="performanceG2" class="performance" hidden readonly>{{$form5a->performanceG2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceG3}}</label>
                                                <textarea name="performanceG3" id="performanceG3" class="performance" hidden readonly>{{$form5a->performanceG3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceG4}}</label>
                                                <textarea name="performanceG4" id="performanceG4" class="performance" hidden readonly>{{$form5a->performanceG4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceG5}}</label>
                                                <textarea name="performanceG5" id="performanceG5" class="performance" hidden readonly>{{$form5a->performanceG5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceG}}</label>
                                        <textarea name="docuSourceG" id="docuSourceG" class="performance" hidden readonly>{{$form5a->documentSourceG}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingG">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingG', $row->ratingG) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingG', $row->ratingG) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingG', $row->ratingG) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingG', $row->ratingG) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingG', $row->ratingG) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingG', $row->ratingG) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingG')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksG" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksG }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1" class="tab"><b></b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsGG}}</label>
                                            <textarea name="elementsGG" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsGG}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceGG1}}</label>
                                                <textarea name="performanceGG1" id="performanceGG1" class="performance" hidden readonly>{{$form5a->performanceGG1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceGG2}}</label>
                                                <textarea name="performanceGG2" id="performanceGG2" class="performance" hidden readonly>{{$form5a->performanceGG2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceGG3}}</label>
                                                <textarea name="performanceGG3" id="performanceGG3" class="performance" hidden readonly>{{$form5a->performanceGG3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceGG4}}</label>
                                                <textarea name="performanceGG4" id="performanceGG4" class="performance" hidden readonly>{{$form5a->performanceGG4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceGG5}}</label>
                                                <textarea name="performanceGG5" id="performanceGG5" class="performance" hidden readonly>{{$form5a->performanceGG5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <!-- <label for="exampleFormControlInput1"></label> -->
                                        <textarea name="docuSourceGG" id="docuSourceGG" class="performance" hidden readonly>{{$form5a->documentSourceGG}}</textarea>
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceGG}}</label>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingGG">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingGG', $row->ratingGG) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingGG', $row->ratingGG) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingGG', $row->ratingGG) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingGG', $row->ratingGG) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingGG', $row->ratingGG) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingGG', $row->ratingGG) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingGG')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksGG" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksGG }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="row" style="display:flex">
                                    <div style="display:flex" class="col-2 justify-content-center">
                                        <div>
                                            <label for="exampleFormControlInput1"><b>H</b></label>
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->elementsH}}</label>
                                            <textarea name="elementsH" id="elementsID" class="elements" hidden readonly>{{$form5a->elementsH}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col" style="padding:0px!important">
                                        <div style="display:flex" style="justify-content:center!important">
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceH1}}</label>
                                                <textarea name="performanceH1" id="performanceH1" class="performance" hidden readonly>{{$form5a->performanceH1}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceH2}}</label>
                                                <textarea name="performanceH2" id="performanceH2" class="performance" hidden readonly>{{$form5a->performanceH2}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceH3}}</label>
                                                <textarea name="performanceH3" id="performanceH3" class="performance" hidden readonly>{{$form5a->performanceH3}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceH4}}</label>
                                                <textarea name="performanceH4" id="performanceH4" class="performance" hidden readonly>{{$form5a->performanceH4}}</textarea>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->performanceH5}}</label>
                                                <textarea name="performanceH5" id="performanceH5" class="performance" hidden readonly>{{$form5a->performanceH5}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="padding:0px!important">
                                        <label for="exampleFormControlInput1" id="labelForm5" class="labelsForm">{{$form5a->documentSourceH}}</label>
                                        <textarea name="docuSourceH" id="docuSourceH" class="performance" hidden readonly>{{$form5a->documentSourceH}}</textarea>
                                    </div>
                                    <div class="col-1" name="ratingSelect">
                                        <select id="loadProvince1" class="form-control" name="ratingH">
                                            <!-- <option>Select</option> -->
                                            <option {{ old('ratingH', $row->ratingH) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="1" {{ old('ratingH', $row->ratingH) == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('ratingH', $row->ratingH) == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('ratingH', $row->ratingH) == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('ratingH', $row->ratingH) == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('ratingH', $row->ratingH) == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('ratingH')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-1" name="remarksTextarea">
                                        <textarea type="text" name="remarksH" placeholder="Your remarks" class="inputRemarks">{{ $row->remarksH }}</textarea>
                                    </div>
                                </div>

                            </div>

                            @if ($row->status != 1)
                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                    Draft
                                </button> -->
                                <button type="submit" name="action" value="submit" class="btn btn-primary" hidden>Submit</button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDraft">
                                    Save as Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalUpdate">
                                    Save and Submit
                                </button>
                                <!-- <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#exampleModalUpdate">Update</button> -->
                            </div>
                            @endif
                            @endforeach
                            @endif


                            <!-- Modal Submit -->
                            <!-- <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to submit?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lgu-draft" class="btn btn-primary" name="action" value="updateResponse">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                                            <div>
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/yqiuuheo.json"
                                                    trigger="hover"
                                                    colors="primary:#109121,secondary:#d1fad7"
                                                    style="width:150px;height:150px">
                                                </lord-icon>
                                            </div>
                                            <!-- <div class="bold" style="font-size: 25px;color:#109121"> -->
                                            <div class="bold" style="font-size: 25px;color:#59987e">
                                                Confirm Submission?
                                            </div>
                                            <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                                                Are you sure you want to save and submit this form? This process cannot be undone.
                                            </div>
                                            <div>
                                                <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                <button type="submit" id="lgu-draft" name="action" value="updateResponse" class="bold btn btn-danger" style="background-color:#59987e!important">YES</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Draft -->
                            <!-- <div class="modal fade" id="exampleModalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Save as Draft?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lgu-draft" class="btn btn-primary" name="action" value="saveDraft">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="modal fade" id="exampleModalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                                            <div>
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/yqiuuheo.json"
                                                    trigger="hover"
                                                    colors="primary:#faf9d1,secondary:#ffbe55"
                                                    style="width:150px;height:150px">
                                                </lord-icon>
                                            </div>
                                            <div class="bold" style="font-size: 25px;color:#e88c30">
                                                Save as draft?
                                            </div>
                                            <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                                                Are you sure you want to save this as a draft?
                                            </div>
                                            <div>
                                                <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                <button type="submit" id="lgu-draft" class="bold btn btn-danger" name="action" value="saveDraft" style="background-color:#ffbe55!important;color:white!important">YES</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                console.log('Alert message found, hiding now');
                alertMessage.style.display = 'none';
            } else {
                console.log('Alert message not found');
            }
        }, 3000);
    });
</script>
<script src="{{ asset('assets/js/autoGenerateInput.js') }}"></script>

<!-- Modal Draft -->
<div class="modal fade" id="exampleModalCenterDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Save as Draft?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" id="lgu-draft" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection