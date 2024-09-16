<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<script src="{{ asset('assets/js/custom.js') }}"></script>
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
                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    @include('layouts.page_template.crud_alert_message')

                    <div style="padding:25px">
                      

                            @if($row)
                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("SEARCH FOR REGIONAL OUTSTANDING PROVINCIAL NUTRITION ACTION OFFICER")}}</h5>
                            </center><br> -->

                            <div style="display:flex">
                            <div class="form-group col">
                                <label for="nameOf"> HEADER:<span style="color:red">*</span> </label>
                                <select id="header" class="form-control" name="header">
                                    <option value="" > Select </option>
                                    @foreach ($availableForms as $formKey => $formName)
                                        <option value="{{ $formKey }}" <?php echo $row->header == $formKey ? 'selected':'' ?> >{{ $formName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            </div>
                           
                            <br>
                            
                            <input type="hidden" name="lnfp_lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" value="{{ $row->status }}" name="status" id="status">
                            <input type="hidden" value="draft" name="formrequest" id="formrequest" />
                            <input type="hidden" value="{{ $row->id }}" name="id" id="id" />
                            <input type="hidden" value="{{ $row->form5_id }}" name="form5_id" id="form5_id" />
                            <input type="hidden" value="{{ $row->form8_id }}" name="form8_id" id="form8_id" />
                            <!-- <input type="hidden" name="lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2"> -->

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:</label>
                                        <h5>{{ $row->nameofPnao }}</h5>
                                        <input class="hidden" type="hidden" name="nameOf" id="nameOf" value="{{ $row->nameofPnao }}">
                                        
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:</label>
                                        <h5>{{ $row->address }}</h5>
                                        <input class="hidden" type="hidden" name="areaAssign" id="areaAssign" value="{{ $row->address }}">
                                        
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Interview: </label>
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
                                                <td class="col-md-6"><textarea name="question1" class="InterviewForm" placeholder="Enter your question here...">{{ $row->question1 }}</textarea></td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="2" readonly></td> -->
                                                <td class="col-md-1 InterviewForms">2</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore1" id="actualScore1" class="InterviewForms" onchange="updateSubtotal()">
                                                        <option value="" {{ old('q1AScore', $row->q1AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q1AScore', $row->q1AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q1AScore', $row->q1AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q1AScore', $row->q1AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q1AScore', $row->q1AScore) == 4 ? 'selected' : 4 }}>4</option>
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
                                                    <select name="actualScore2" id="actualScore2" class="InterviewForms" onchange="updateSubtotal()">
                                                        <option value="" {{ old('q2AScore', $row->q2AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q2AScore', $row->q2AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q2AScore', $row->q2AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q2AScore', $row->q2AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q2AScore', $row->q2AScore) == 4 ? 'selected' : 4 }}>4</option>
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
                                                    <select name="actualScore3" id="actualScore3" class="InterviewForms" onchange="updateSubtotal()">
                                                        <option value="" {{ old('q3AScore', $row->q3AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q3AScore', $row->q3AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q3AScore', $row->q3AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q3AScore', $row->q3AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q3AScore', $row->q3AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                    </select>
                                                    @error('actualScore3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="row"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="InterviewForm" name="q3Remarks" placeholder="Enter your remarks here...">{{ $row->q3Remarks }}</textarea></td>
                                            </tr>

                                            <!-- Not available for Barangay Level -->
                                            @if( auth()->user()->role != 10 )
                                            <tr>
                                                <td class="InterviewFormsnum">4</td>
                                                <td class="col-md-6"><input type="text" class="InterviewForms" name="question4" value="{{ $row->question4 }}" readonly></td>
                                                <!-- <td class="col-md-1"><input type="number" class="InterviewForms" value="6" readonly></td> -->
                                                <td class="col-md-1 InterviewForms">6</td>
                                                <td class="col-md-1">
                                                    <select name="actualScore4" id="actualScore4" class="InterviewForms" onchange="updateSubtotal()">
                                                        <option value="" {{ old('q4AScore', $row->q4AScore) == "" ? 'selected' : "" }}>0</option>
                                                        <option value="1" {{ old('q4AScore', $row->q4AScore) == 1 ? 'selected' : 1 }}>1</option>
                                                        <option value="2" {{ old('q4AScore', $row->q4AScore) == 2 ? 'selected' : 2 }}>2</option>
                                                        <option value="3" {{ old('q4AScore', $row->q4AScore) == 3 ? 'selected' : 3 }}>3</option>
                                                        <option value="4" {{ old('q4AScore', $row->q4AScore) == 4 ? 'selected' : 4 }}>4</option>
                                                    </select>
                                                    @error('actualScore4')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror</td>
                                                </td>
                                                <!-- <td class="col-md-2"><input type="number" class="row"></td> -->
                                                <td class="col-md-3"><textarea type="text" class="InterviewForm" name="q4Remarks" placeholder="Enter your remarks here...">{{ $row->q4Remarks }}</textarea></td>
                                            </tr>
                                            @endif

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
                                  
                                    <div class="d-flex bd-highlight mb-3" style="padding-top:10px;">
                                          <div class="mr-auto p-2 bd-highlight">
                                            <a href="{{ route('viewForm8', $row->form8_id) }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Previous Form 8</a></div>
                                          <div class="p-2 bd-highlight">
                                            @if( $row->overall_status == 2 )
                                            <a href="{{ route('editOSForm', $row->overall_id ) }}"> Next Overall Score <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div> 
                                            @else
                                            <a href="{{ route('viewOSForm', $row->overall_id ) }}"> Next Overall Score <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div> 
                                            @endif
                                        </div>

                                     </div>
                              
                                </div>
                            </div>

                           
                            @endif
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection