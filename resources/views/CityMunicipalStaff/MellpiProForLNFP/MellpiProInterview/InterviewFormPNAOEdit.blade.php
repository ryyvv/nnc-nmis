<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script>

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
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdateIntForm', $row->id) }}" method="post" id="lnfp-interview-form">
                            @csrf

                            @if($row)
                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("SEARCH FOR REGIONAL OUTSTANDING PROVINCIAL NUTRITION ACTION OFFICER")}}</h5>
                            </center><br>
                            @include('layouts.page_template.location_header')
                            <br>
                            <input type="hidden" name="lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ $row->nameOf }}">
                                        @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ $row->areaAssign }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Interview:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateInterview" id="dateInterview" value="{{ $row->dateOfInterview }}">
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
                                                <td class="InterviewFormsnum">1</td>
                                                <td class="col-md-6"><input type="text" class="InterviewForm" name="question1" value="{{ $row->question1 }}" readonly></td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="2" readonly></td> -->
                                                <td class="col-md-1 InterviewForms">2</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore1" id="actualScore1" class="InterviewForms" onchange="AsSubTotal()">
                                                        <option value="" {{ old('q1AScore', $row->q1AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q1AScore', $row->q1AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q1AScore', $row->q1AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q1AScore', $row->q1AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q1AScore', $row->q1AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q1AScore', $row->q1AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                    </select>
                                                    @error('actualScore1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="row"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="InterviewForm" name="q1Remarks" placeholder="Enter your remarks here...">{{ $row->q1Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="InterviewFormsnum">2</td>
                                                <td class="col-md-6">
                                                    <!-- <input type="text" class="InterviewForm" name="question2" value="{{ $row->question2 }}" > -->
                                                    <textarea name="question2" class="InterviewForm" placeholder="Enter your question here...">{{ $row->question2 }}</textarea>
                                                    @error('question2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 InterviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore2" id="actualScore2" class="InterviewForms" onchange="AsSubTotal()">
                                                        <option value="" {{ old('q2AScore', $row->q2AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q2AScore', $row->q2AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q2AScore', $row->q2AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q2AScore', $row->q2AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q2AScore', $row->q2AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q2AScore', $row->q2AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                        <option value="6" {{ old('q2AScore', $row->q2AScore) == 6 ? 'selected' : 6 }}>6</option>
                                                    </select>
                                                    @error('actualScore2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="row"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="InterviewForm" name="q2Remarks" placeholder="Enter your remarks here...">{{ $row->q2Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="InterviewFormsnum">3</td>
                                                <td class="col-md-6">
                                                    <!-- <input type="text" class="InterviewForm" name="question3" value="{{ $row->question3 }}"> -->
                                                    <textarea name="question3" class="InterviewForm" placeholder="Enter your question here...">{{ $row->question3 }}</textarea>
                                                    @error('question2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 InterviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore3" id="actualScore3" class="InterviewForms" onchange="AsSubTotal()">
                                                        <option value="" {{ old('q3AScore', $row->q3AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q3AScore', $row->q3AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q3AScore', $row->q3AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q3AScore', $row->q3AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q3AScore', $row->q3AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q3AScore', $row->q3AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                        <option value="6" {{ old('q3AScore', $row->q3AScore) == 6 ? 'selected' : 6 }}>6</option>
                                                    </select>
                                                    @error('actualScore3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="row"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="InterviewForm" name="q3Remarks" placeholder="Enter your remarks here...">{{ $row->q3Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="InterviewFormsnum">4</td>
                                                <td class="col-md-6"><input type="text" class="InterviewForms" name="question4" value="{{ $row->question4 }}" readonly></td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 InterviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore4" id="actualScore4" class="InterviewForms" onchange="AsSubTotal()">
                                                        <option value="" {{ old('q4AScore', $row->q4AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q4AScore', $row->q4AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q4AScore', $row->q4AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q4AScore', $row->q4AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q4AScore', $row->q4AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                        <option value="5" {{ old('q4AScore', $row->q4AScore) == 5 ? 'selected' : 5 }}>5</option>
                                                        <option value="6" {{ old('q4AScore', $row->q4AScore) == 6 ? 'selected' : 6 }}>6</option>
                                                    </select>
                                                    @error('actualScore4')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="row"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="InterviewForm" name="q4Remarks" placeholder="Enter your remarks here...">{{ $row->q4Remarks }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-6" colspan="2"><b>SUBTOTAL:</b></td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="0" readonly></td> -->
                                                <td class="col-md-1 InterviewForms"><b>20</b></td>
                                                <td class="col-md-1"><b><input type="number" class="InterviewFormsTotal" id="subASTot" name="subASTot" placeholder="0" value="{{ $row->subtotalAScore }}" readonly></b></td>
                                                <td class="col-md-3"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    @if($row->status == 2)
                                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDraft">Save as Draft</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSubmit">Save and Submit</button>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="modal fade" id="exampleModalSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <button type="submit" id="lnfprow-submit" class="btn btn-primary" name="action" value="submit">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="modal fade" id="exampleModalSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <div class="bold" style="font-size: 25px;color:#59987e">
                                                Confirm Submission?
                                            </div>
                                            <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                                                Are you sure you want to save and submit this form? This process cannot be undone.
                                            </div>
                                            <div>
                                                <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                <button type="submit" id="lnfprow-submit" name="action" value="submit" class="bold btn btn-danger" style="background-color:#59987e!important">YES</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="modal fade" id="exampleModalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to save as draft?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lnfprow-draft" class="btn btn-primary" name="action" value="draft">Yes</button>
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
                                                <button type="submit" class="bold btn btn-danger" id="lnfprow-draft" name="action" value="draft" style="background-color:#ffbe55!important;color:white!important">YES</button>
                                            </div>
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