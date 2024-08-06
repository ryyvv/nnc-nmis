<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 8 Action Sheet',
'activePage' => 'mellpi_pro_form8',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdateASForm8', $form8->id) }}" method="post" id="lnfp-form8-form" enctype="multipart/form-data">
                            @csrf

                            @if ($form8)

                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("MELLPI PRO FORM 8a: ACTION SHEET TO IMPROVE PERFORMANCE")}}</h5>
                                <label for="period">For the period:<span style="color:red">*</span> </label>
                                <select name="forTheperiod" id="forTheperiod" class="inputHeaderPeriod">
                                    <option selected>{{ $form8->forThePeriod }}</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $startYear = 1900;
                                    $endYear = $currentYear;
                                    for ($year = $startYear; $year <= $endYear; $year++) {
                                        echo "<option value=\"$year\">$year</option>";
                                    }
                                    ?>
                                </select>
                                @error('forTheperiod')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </center><br>
                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" id="action" name="action" value=""> 

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ $form8->nameOfPnao }}">
                                        @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ $form8->areaOfAssign }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Monitoring:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateMonitor" id="dateMonitor" value="{{ $form8->dateMonitor }}">
                                        @error('dateMonitor')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table id="lnfp_form8A" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-4"><b>
                                                        <center>Parameters</center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Recommendation for the PNAO</center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Recommendation for the Local Nutrition Committee</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Performance of Nutrition Program Management Functions</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="A. Coordination" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_A" >{{ $form8->recoPNAO_A }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_A" >{{ $form8->recoLNC_A }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="B. Orientation, Promotion and Advocacy" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_B" >{{ $form8->recoPNAO_B }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_B" >{{ $form8->recoLNC_B }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="C. Planning" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_C" >{{ $form8->recoPNAO_C }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_C" >{{ $form8->recoLNC_C }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="D. Implementation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_D" >{{ $form8->recoPNAO_D }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_D" >{{ $form8->recoLNC_D }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="E. Monitoring and Evaluation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_E" >{{ $form8->recoPNAO_E }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_E" >{{ $form8->recoLNC_E }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="F. Resource Generation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_F" >{{ $form8->recoPNAO_F }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_F" >{{ $form8->recoLNC_F }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="G. Capacity Development" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_G" >{{ $form8->recoPNAO_G }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_G" >{{ $form8->recoLNC_G }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="H. Documentation and record-keeping" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_H" >{{ $form8->recoPNAO_H }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_H" >{{ $form8->recoLNC_H }}</textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table id="lnfp_form8B" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-4"><b>
                                                        <center>Name of Team Member</center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Designation and Office</center>
                                                    </b></td>
                                                <td class="col-md-4" colspan="2"><b>
                                                        <center>Signature / Date</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM1" value="{{ $form8->nameTM1 }}">
                                                @error('nameTM1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice1" value="{{ $form8->desigOffice1 }}">
                                                @error('desigOffice1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="file" class="form8InputB" name="sigDate1">
                                                @if($form8->sigDate1)
                                                    <img src="{{ Storage::url($form8->sigDate1) }}" alt="Sig Date 1" style="width: 200px; height: 150px;">
                                                @endif
                                                @error('sigDate1')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM2" value="{{ $form8->nameTM2 }}">
                                                @error('nameTM2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice2" value="{{ $form8->desigOffice2 }}">
                                                @error('desigOffice2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="file" class="form8InputB" name="sigDate2">
                                                @if($form8->sigDate2)
                                                    <img src="{{ Storage::url($form8->sigDate2) }}" alt="Sig Date 2" style="width: 200px; height: 150px;">
                                                @endif
                                                @error('sigDate2')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM3" value="{{ $form8->nameTM3 }}">
                                                @error('nameTM3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice3" value="{{ $form8->desigOffice3 }}">
                                                @error('desigOffice3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                                <td class="col-md-4"><input type="file" class="form8InputB" name="sigDate3">
                                                @if($form8->sigDate3)
                                                    <img src="{{ Storage::url($form8->sigDate3) }}" alt="Sig Date 3" style="width: 200px; height: 150px;">
                                                @endif
                                                @error('sigDate3')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror</td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM4"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice4"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="sigDate4"></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                    <br>
                                    <div style="display: flex;">
                                        <div class="col-md-8">
                                            <label for="receivedBy">Received:</label>
                                            <input type="text" name="receivedBy" id="receivedBy" class="form8InputBot" value="{{ $form8->receivedBy }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatDate">Date:</label>
                                            <input type="date" name="whatDate" id="whatDate" class="form8InputBot" value="{{ $form8->whatDate }}">
                                        </div>
                                    </div>
                                    
                                    @if ($form8->status != 1)
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
                                            <button type="submit" id="lnfpForm8-submit-with-id" class="btn btn-primary" name="action" value="submit">Yes</button>
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
                                            <button type="submit" id="lgu-form8-draft-with-id" class="btn btn-primary" name="action" value="draft">Yes</button>
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
@endsection