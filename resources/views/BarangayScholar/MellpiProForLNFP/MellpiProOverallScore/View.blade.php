<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Overall Score Form',
'activePage' => 'mellpi_pro_overallScore',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Overall Score Form")}}</h5>
                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    @include('layouts.page_template.crud_alert_message')

                    <div style="padding:25px">
                        <form action="{{ route('updateOSForm') }}" method="post" id="form">
                            @csrf

                            @if ($overallScore)
                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br> -->
                            <center>
                                <h5 class="title">{{ $overallScore->interview_header }}</h5>
                            </center><br>

                            <input type="hidden" name="lnfp_lgu_id" value="{{$overallScore->lnfp_lgu_id}}">
                            <input type="hidden" value="" name="status" id="status">
                            <input type="hidden" value="draft" name="formrequest" id="formrequest" />
                            <input type="hidden" value="{{ $overallScore->overallId }}" name="id" id="id" />

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:
                                        <h5>{{ $overallScore->pnaoName }}</h5>
                                        <input class="inputHeader" type="hidden" name="nameOf" id="nameOf" value="{{ $overallScore->pnaoName }}">
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:
                                        <h5>{{ $overallScore->pnaoAddress }}</h5>
                                        <input class="inputHeader" type="hidden" name="areaAssign" id="areaAssign" value="{{ $overallScore->pnaoAddress }}">
                                        
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date:</label>
                                        <input class="form-control" type="date" name="dateOS" id="dateOS" value="{{ $overallScore->dateOver }}">
                                        @error('dateOS')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="lnfp_OverallScore1_form">GUIDE</label>
                                    <table id="lnfp_OverallScore1_form" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-6"><b>
                                                    Criterion
                                                </b></td>
                                                <td class="col-md-2"><b>
                                                    <center>Points</center>
                                                </b></td>
                                                <td class="col-md-2"><b>
                                                    <center>Weight</center>
                                                </b></td>
                                                <td class="col-md-2"><b>
                                                    <center>Score</center>
                                                </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Part I: MELLPI Pro</td>
                                                <td>
                                                    <center>100</center>
                                                </td>
                                                <td>
                                                    <center>0.8</center>
                                                </td>
                                                <td>
                                                    <center>80</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Part II: Interview</td>
                                                <td>
                                                    <center>20</center>
                                                </td>
                                                <td>
                                                    <center>0.2</center>
                                                </td>
                                                <td>
                                                    <center>20</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td>
                                                    <center></center>
                                                </td>
                                                <td>
                                                    <center></center>
                                                </td>
                                                <td>
                                                    <center>100</center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>

                                                    <input type="hidden" id="ratingA" value="{{ $overallScore->ratingA }}">
                                                    <input type="hidden" id="ratingBB" value="{{ $overallScore->ratingBB }}">
                                                    <input type="hidden" id="ratingB" value="{{ $overallScore->ratingB }}">
                                                    <input type="hidden" id="ratingC" value="{{ $overallScore->ratingC }}">
                                                    <input type="hidden" id="ratingD" value="{{ $overallScore->ratingD }}">
                                                    <input type="hidden" id="ratingE" value="{{ $overallScore->ratingE }}">
                                                    <input type="hidden" id="ratingF" value="{{ $overallScore->ratingF }}">
                                                    <input type="hidden" id="ratingG" value="{{ $overallScore->ratingG }}">
                                                    <input type="hidden" id="ratingGG" value="{{ $overallScore->ratingGG }}">
                                                    <input type="hidden" id="ratingH" value="{{ $overallScore->ratingH }}">  

                                    <label for="lnfp_OverallScore2_form">ACTUAL SCORE</label>
                                    <table id="lnfp_OverallScore2_form" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-6"><b>
                                                    Criterion
                                                </b></td>
                                                <td class="col-md-2"><b>
                                                    <center>Points</center>
                                                </b></td>
                                                <td class="col-md-2"><b>
                                                    <center>Weight</center>
                                                </b></td>
                                                <td class="col-md-2"><b>
                                                    <center>Score</center>
                                                </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Part I: MELLPI Pro</td>
                                                <td>
                                                    <center><input type="text" name="pointsP1AS" value="" class="formOverallInput" id="pointsP1AS" readonly></center>
                                                </td>
                                                <td>
                                                    <center><input type="text" name="weightP1AS" value="0.8" step="0.1" class="formOverallInput" readonly></center>
                                                </td>
                                                <td>
                                                    <center><input type="text" name="scoreP1AS" id="scoreP1AS" value="" class="formOverallInput" readonly></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Part II: Interview</td>
                                                <td>
                                                    <center><input type="text" name="pointsP2AS" value="{{$overallScore->intSubtotal}}" class="formOverallInput" readonly></center>
                                                </td>
                                                <td>
                                                    <center><input type="text" name="weightP2AS" value="0.2" step="0.1" class="formOverallInput" readonly></center>
                                                </td>
                                                <td>
                                                    <center>
                                                    <input type="hidden" id="intSubtotal" value="{{$overallScore->intSubtotal}}" >       
                                                    <input type="text" name="scoreP2AS" value="" class="formOverallInput" id="formOverallInput" readonly></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td>
                                                    <center></center>
                                                </td>
                                                <td>
                                                    <center></center>
                                                </td>
                                                <td>
                                                    <center>
                                                     
                                                    <input type="text" name="totalScoreAS" id="totalScoreAS" value="" step="0.1" class="formOverallInput" readonly></center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>

                                    <table id="lnfp_OverallScore3_form" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td><b>
                                                    <center>Name of Team Member</center>
                                                </b></td>
                                                <td><b>
                                                    <center>Designation and Office</center>
                                                </b></td>
                                                <td><b>
                                                    <center>Signature/Date</center>
                                                </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="nameTM1" value="{{ $overallScore->nameTM1 }}">
                                                @error('nameTM1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="desigOffice1" value="{{ $overallScore->desigOffice1 }}">
                                                @error('desigOffice1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4">
                                                @if($overallScore->sigDate1)
                                                    <img src="{{ Storage::url($overallScore->sigDate1) }}" alt="Sig Date 1" style="width: 200px; height: 150px;">
                                                @endif
                                                @error('sigDate1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="nameTM2" value="{{ $overallScore->nameTM2 }}">
                                                @error('nameTM2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="desigOffice2" value="{{ $overallScore->desigOffice2 }}">
                                                @error('desigOffice2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4">
                                                @if($overallScore->sigDate2)
                                                    <img src="{{ Storage::url($overallScore->sigDate2) }}" alt="Sig Date 1" style="width: 200px; height: 150px;">
                                                @endif
                                                @error('sigDate2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="nameTM3" value="{{ $overallScore->nameTM3 }}">
                                                @error('nameTM3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="desigOffice3" value="{{ $overallScore->desigOffice3 }}">
                                                @error('desigOffice3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4">
                                                @if($overallScore->sigDate3)
                                                    <img src="{{ Storage::url($overallScore->sigDate3) }}" alt="Sig Date 1" style="width: 200px; height: 150px;">
                                                @endif
                                                @error('sigDate3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div style="display: flex;">
                                        <div class="col-md-8">
                                            <label for="receivedBy">Received:</label>
                                            <h5>{{$overallScore->receivedBy}}</h5>
                                            <input type="hidden" name="receivedBy" id="receivedBy" class="form8InputBot" value="{{$overallScore->receivedBy}}">
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatDate">Date:</label>
                                            <h5>{{$overallScore->whatDate}}</h5>
                                            <input type="hidden" name="whatDate" id="whatDate" class="form8InputBot" value="{{$overallScore->whatDate}}">
                                            
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="d-flex bd-highlight mb-3" style="padding-top:10px;">
                                          <div class="mr-auto p-2 bd-highlight">
                                            <a href="{{ route('viewIntForm', $overallScore->interview_id) }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Previous Interview Form</a></div>
                                          <div class="p-2 bd-highlight">Subject for Approval</div>

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

<script>
    $(document).ready(function() {
        OverAllScore();
    });
</script>

@endsection