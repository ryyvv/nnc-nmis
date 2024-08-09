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
                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <div style="padding:25px">
                        <form action="#" method="post" id="lnfp-overallScore-form">
                            @csrf

                            @if ($overallScore)
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
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ $overallScore->pnaoName }}">
                                        @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ $overallScore->pnaoAddress }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateOS" id="dateOS" value="{{ old('dateOS') }}">
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
                                                    <center><input type="number" name="pointsP1AS" value="0" class="formOverallInput"></center>
                                                </td>
                                                <td>
                                                    <center><input type="number" name="weightP1AS" value="0.8" step="0.1" class="formOverallInput"></center>
                                                </td>
                                                <td>
                                                    <center><input type="number" name="scoreP1AS" value="0" class="formOverallInput"></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Part II: Interview</td>
                                                <td>
                                                    <center><input type="number" name="pointsP2AS" value="0" class="formOverallInput"></center>
                                                </td>
                                                <td>
                                                    <center><input type="number" name="weightP2AS" value="0.2" step="0.1" class="formOverallInput"></center>
                                                </td>
                                                <td>
                                                    <center><input type="number" name="scoreP2AS" value="0" class="formOverallInput"></center>
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
                                                    <center><input type="number" name="totalScoreAS" value="0.00" step="0.1" class="formOverallInput"></center>
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
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="nameTM1">
                                                @error('nameTM1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="desigOffice1">
                                                @error('desigOffice1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="file" class="formOverallInputB" name="sigDate1">
                                                @error('sigDate1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="nameTM2">
                                                @error('nameTM2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="desigOffice2">
                                                @error('desigOffice2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="file" class="formOverallInputB" name="sigDate2">
                                                @error('sigDate2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="nameTM3">
                                                @error('nameTM3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="formOverallInputB" name="desigOffice3">
                                                @error('desigOffice3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="file" class="formOverallInputB" name="sigDate3">
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
                                            <input type="text" name="receivedBy" id="receivedBy" class="form8InputBot">
                                            @error('receivedBy')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror</td>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatDate">Date:</label>
                                            <input type="date" name="whatDate" id="whatDate" class="form8InputBot">
                                            @error('whatDate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror</td>
                                        </div>
                                    </div>
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
                                            <button type="submit" id="lnfpOverallForm-submit" class="btn btn-primary" name="action" value="submit">Yes</button>
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
                                            <button type="submit" id="lnfpOverallForm-draft" class="btn btn-primary" name="action" value="draft">Yes</button>
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