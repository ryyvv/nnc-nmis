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
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdateIntForm', $InterviewForm->id) }}" method="post" id="lnfp-interview-form">
                            @csrf

                            @if($InterviewForm)
                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("SEARCH FOR REGIONAL OUTSTANDING PROVINCIAL NUTRITION ACTION OFFICER")}}</h5>
                            </center><br>

                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ $InterviewForm->nameOf }}">
                                        @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ $InterviewForm->areaAssign }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Interview:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateInterview" id="dateInterview" value="{{ $InterviewForm->dateOfInterview }}">
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
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question1" value="{{ $InterviewForm->question1 }}"></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="2" readonly></td> -->
                                                <td class="col-md-1 interviewForms">2</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore1" id="actualScore1" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0" {{ old('q1AScore', $InterviewForm->q1AScore) == 0 ? 'selected' : 0 }}>0</option>
                                                        <option value="1" {{ old('q1AScore', $InterviewForm->q1AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q1AScore', $InterviewForm->q1AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q1AScore', $InterviewForm->q1AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q1AScore', $InterviewForm->q1AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q1AScore', $InterviewForm->q1AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="interviewForm" name="q1Remarks">{{ $InterviewForm->q1Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="interviewFormsnum">2</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question2" value="{{ $InterviewForm->question2 }}" ></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 interviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore2" id="actualScore2" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0" {{ old('q2AScore', $InterviewForm->q2AScore) == 0 ? 'selected' : 0 }}>0</option>
                                                        <option value="1" {{ old('q2AScore', $InterviewForm->q2AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q2AScore', $InterviewForm->q2AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q2AScore', $InterviewForm->q2AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q2AScore', $InterviewForm->q2AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q2AScore', $InterviewForm->q2AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                        <option value="6" {{ old('q2AScore', $InterviewForm->q2AScore) == 6 ? 'selected' : 6 }}>6</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="interviewForm" name="q2Remarks">{{ $InterviewForm->q2Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="interviewFormsnum">3</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question3" value="{{ $InterviewForm->question3 }}"></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 interviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore3" id="actualScore3" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0" {{ old('q3AScore', $InterviewForm->q3AScore) == 0 ? 'selected' : 0 }}>0</option>
                                                        <option value="1" {{ old('q3AScore', $InterviewForm->q3AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q3AScore', $InterviewForm->q3AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q3AScore', $InterviewForm->q3AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q3AScore', $InterviewForm->q3AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q3AScore', $InterviewForm->q3AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                        <option value="6" {{ old('q3AScore', $InterviewForm->q3AScore) == 6 ? 'selected' : 6 }}>6</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="interviewForm" name="q3Remarks">{{ $InterviewForm->q3Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="interviewFormsnum">4</td>
                                                <td class="col-md-6"><input type="text" class="interviewForm" name="question4" value="{{ $InterviewForm->question4 }}" readonly></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 interviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore4" id="actualScore4" class="interviewForms" onchange="AsSubTotal()">
                                                        <option value="0" {{ old('q4AScore', $InterviewForm->q4AScore) == 0 ? 'selected' : 0 }}>0</option>
                                                        <option value="1" {{ old('q4AScore', $InterviewForm->q4AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q4AScore', $InterviewForm->q4AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q4AScore', $InterviewForm->q4AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q4AScore', $InterviewForm->q4AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q4AScore', $InterviewForm->q4AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                        <option value="6" {{ old('q4AScore', $InterviewForm->q4AScore) == 6 ? 'selected' : 6 }}>6</option>
                                                    </select>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="interviewForm"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="interviewForm" name="q4Remarks">{{ $InterviewForm->q4Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-6" colspan="2"><b>SUBTOTAL:</b></td>
                                                <!-- <td class="col-md-1"><input type="number" class="interviewForms" value="0" readonly></td> -->
                                                <td class="col-md-1 interviewForms"><b>20</b></td>
                                                <td class="col-md-1"><b><input type="number" class="interviewForms" id="subASTot" name="subASTot" value="{{ $InterviewForm->subtotalAScore }}" readonly></b></td>
                                                <td class="col-md-3"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    @if($InterviewForm->status == 2)
                                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDraft">Save as Draft</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSubmit">Save and Submit</button>
                                    </div>
                                    @endif
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
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/autoGenerateInput.js') }}""></script>
@endsection