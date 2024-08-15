<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Interview Form',
'activePage' => 'mellpi_pro_interview',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Interview Form")}}</h5>
                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <div style="padding:25px">
                        <form action="{{ route('lnfpInterviewStore') }}" method="post" id="lnfp-interview-form">
                            @csrf

                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("SEARCH FOR REGIONAL OUTSTANDING PROVINCIAL NUTRITION ACTION OFFICER")}}</h5>
                            </center><br>
                            @include('layouts.page_template.location_header')
                            <br>
                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ old('nameOf') }}">
                                        @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ old('areaAssign') }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Interview:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateInterview" id="dateInterview" value="{{ old('dateInterview') }}">
                                        @error('dateInterview')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table id="lnfp_Interview_form" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-6" colspan="2"><b>
                                                        <center>QUESTIONS</center>
                                                    </b></td>
                                                <td class="col-md-1"><b>
                                                        <center>SCORE</center>
                                                    </b></td>
                                                <td class="col-md-2"><b>
                                                        <center>ACTUAL SCORE</center>
                                                    </b></td>
                                                <td class="col-md-3"><b>
                                                        <center>REMARKS</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="interviewFormsnum">1</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question1" value="Tell us something about yourself, personal and professional history."></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="2" readonly></td> -->
                                                <td class="col-md-1 interviewForms">2</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore1" id="actualScore1" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3">
                                                    <textarea type="text" class="interviewForm" name="q1Remarks">
                                                        {{ old('q1Remarks') }}
                                                    </textarea>
                                                    @error('q1Remarks')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="interviewFormsnum">2</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question2" value="" ></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 interviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore2" id="actualScore2" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3">
                                                    <textarea type="text" class="interviewForm" name="q2Remarks">
                                                    {{ old('q2Remarks') }}
                                                    </textarea>
                                                    @error('q2Remarks')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="interviewFormsnum">3</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question3" value=""></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 interviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore3" id="actualScore3" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3">
                                                    <textarea type="text" class="interviewForm" name="q3Remarks">
                                                    {{ old('q3Remarks') }}
                                                    </textarea>
                                                    @error('q3Remarks')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="interviewFormsnum">4</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question4" value="What is your greatest accomplishment and how dit it benefit community/LGU?" readonly></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 interviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore4" id="actualScore4" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3">
                                                    <textarea type="text" class="interviewForm" name="q4Remarks">
                                                    {{ old('q4Remarks') }}
                                                    </textarea>
                                                    @error('q4Remarks')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-6" colspan="2"><b>SUBTOTAL:</b></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="0" readonly></td> -->
                                                <td class="col-md-1 interviewForms"><b>20</b></td>
                                                <td class="col-md-1"><b><input type="number" class="interviewFormsTotal" id="subASTot" name="subASTot" value="0" readonly></b></td>
                                                <td class="col-md-3"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <br>
                                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDraft">Save as Draft</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSubmit">Save and Submit</button>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModalSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to submit?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lnfpInterviewForm-submit" class="btn btn-primary" name="action" value="submit">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to save as draft?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lnfpInterviewForm-draft" class="btn btn-primary" name="action" value="draft">Yes</button>
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
<script src="{{ asset('assets/js/autoGenerateInput.js') }}""></script>
@endsection