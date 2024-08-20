<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 8 Action Sheet',
'activePage' => 'mellpi_pro_row',
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
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdateASForm8', $row->id) }}" method="post" id="lnfp-row-form" enctype="multipart/form-data">
                            @csrf

                            @if ($row)

                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("MELLPI PRO FORM 8a: ACTION SHEET TO IMPROVE PERFORMANCE")}}</h5>
                            </center><br>
                            @include('layouts.page_template.location_header')
                            <input type="hidden" name="lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="nameOf" id="nameOf" value="{{ $row->nameOfPnao }}">
                                        @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:<span style="color:red">*</span> </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ $row->areaOfAssign }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Monitoring:<span style="color:red">*</span> </label>
                                        <input class="form-control" type="date" name="dateMonitor" id="dateMonitor" value="{{ $row->dateMonitoring }}">
                                        @error('dateMonitoring')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table id="lnfp_rowA" class="table table-striped table-bordered" style="width: 100%;">
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
                                                <td colspan="3"><b>Performance of Nutrition Program Management Functions</b></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="A. Coordination" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_A" placeholder="Enter your text here...">{{ $row->recoPNAO_A }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_A" placeholder="Enter your text here...">{{ $row->recoLNC_A }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="B. Orientation, Promotion and Advocacy" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_B" placeholder="Enter your text here...">{{ $row->recoPNAO_B }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_B" placeholder="Enter your text here...">{{ $row->recoLNC_B }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="C. Planning" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_C" placeholder="Enter your text here...">{{ $row->recoPNAO_C }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_C" placeholder="Enter your text here...">{{ $row->recoLNC_C }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="D. Implementation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_D" placeholder="Enter your text here...">{{ $row->recoPNAO_D }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_D" placeholder="Enter your text here...">{{ $row->recoLNC_D }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="E. Monitoring and Evaluation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_E" placeholder="Enter your text here...">{{ $row->recoPNAO_E }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_E" placeholder="Enter your text here...">{{ $row->recoLNC_E }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="F. Resource Generation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_F" placeholder="Enter your text here...">{{ $row->recoPNAO_F }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_F" placeholder="Enter your text here...">{{ $row->recoLNC_F }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="G. Capacity Development" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_G" placeholder="Enter your text here...">{{ $row->recoPNAO_G }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_G" placeholder="Enter your text here...">{{ $row->recoLNC_G }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="H. Documentation and record-keeping" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoPNAO_H" placeholder="Enter your text here...">{{ $row->recoPNAO_H }}</textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" name="recoLNC_H" placeholder="Enter your text here...">{{ $row->recoLNC_H }}</textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table id="lnfp_rowB" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-4"><b>
                                                        <center>Name of Team Member<span style="color:red">*</span></center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Designation and Office<span style="color:red">*</span></center>
                                                    </b></td>
                                                <td class="col-md-4" colspan="2"><b>
                                                        <center>Signature / Date<span style="color:red">*</span></center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM1" value="{{ $row->nameTM1 }}" placeholder="Enter member name">
                                                    @error('nameTM1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice1" value="{{ $row->desigOffice1 }}" placeholder="Enter Designation and Office">
                                                    @error('desigOffice1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td class="col-md-4"><input type="file" class="form8InputB" name="sigDate1">
                                                    @if($row->sigDate1)
                                                    <img src="{{ Storage::url($row->sigDate1) }}" alt="Sig Date 1" style="width: 200px; height: 150px;">
                                                    @endif
                                                    @error('sigDate1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM2" value="{{ $row->nameTM2 }}" placeholder="Enter member name">
                                                    @error('nameTM2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice2" value="{{ $row->desigOffice2 }}" placeholder="Enter Designation and Office">
                                                    @error('desigOffice2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td class="col-md-4"><input type="file" class="form8InputB" name="sigDate2">
                                                    @if($row->sigDate2)
                                                    <img src="{{ Storage::url($row->sigDate2) }}" alt="Sig Date 2" style="width: 200px; height: 150px;">
                                                    @endif
                                                    @error('sigDate2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM3" value="{{ $row->nameTM3 }}" placeholder="Enter member name">
                                                    @error('nameTM3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice3" value="{{ $row->desigOffice3 }}" placeholder="Enter Designation and Office">
                                                    @error('desigOffice3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td class="col-md-4"><input type="file" class="form8InputB" name="sigDate3" value="{{$row->sigDate3}}">
                                                    @if($row->sigDate3)
                                                    <img src="{{ Storage::url($row->sigDate3) }}" alt="Sig Date 3" style="width: 200px; height: 150px;">
                                                    @endif
                                                    @error('sigDate3')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div style="display: flex;">
                                        <div class="col-md-8">
                                            <label for="receivedBy">Received:<span style="color:red">*</span></label>
                                            <input type="text" name="receivedBy" id="receivedBy" class="form8InputBot" value="{{ $row->receivedBy }}" placeholder="Enter receiver's name">
                                            @error('receivedBy')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror</td>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatDate">Date:<span style="color:red">*</span></label>
                                            <input type="date" name="whatDate" id="whatDate" class="form8InputBot" value="{{ $row->whatDate }}">
                                            @error('whatDate')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror</td>
                                        </div>
                                    </div>

                                    @if ($row->status != 1)
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
                                            <button type="submit" id="lnfprow-submit-with-id" class="btn btn-primary" name="action" value="submit">Yes</button>
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
                                                <button type="submit" id="lnfpForm8-submit-with-id" name="action" value="submit" class="bold btn btn-danger" style="background-color:#59987e!important">YES</button>
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
                                            <button type="submit" id="lgu-row-draft-with-id" class="btn btn-primary" name="action" value="draft">Yes</button>
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
                                                <button type="submit" class="bold btn btn-danger" id="lgu-form8-draft-with-id" name="action" value="draft" style="background-color:#ffbe55!important;color:white!important">YES</button>
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
@endsection