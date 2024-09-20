<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script>

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
                <div style="display: flex; align-items:center;">
                        <a href="{{route('lnfpForm8Index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <h4>VIEW MELLPI PRO FOR LNFP FORM 8:</h4>
                    </div>
                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdateASForm8', $row->id) }}" method="post" id="form" enctype="multipart/form-data">
                            @csrf

                            @if ($row)

                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("MELLPI PRO FORM 8a: ACTION SHEET TO IMPROVE PERFORMANCE")}}</h5>
                            </center><br> -->

                            <!-- <div style="display:flex"> -->
                            <div style="display:flex">
                            <div class="form-group col">
                                <input type="hidden" name="header" value="{{ $row->form6_header }}" />
                                <label for="nameOf"> HEADER:</label>
                                <select id="header_view" class="form-control" name="header" disabled>
                                    <option value="" > Select </option>
                                    @foreach ($availableForms as $formKey => $formName)
                                        <option value="{{ $formKey }}" <?php echo $row->form6_header == $formKey ? 'selected':'' ?> >{{ $formName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            </div>
                            
                            
                            <input type="hidden" name="lgu_id" value="{{$row->lnfp_lgu_id}}">
                            <input type="hidden" value="" name="status" id="status">
                            <input type="hidden" value="draft" name="formrequest" id="formrequest" />
                            <input type="hidden" value="{{ $row->id }}" name="id" id="id" />
                            <input type="hidden" value="{{ $row->form5_id }}" name="form5_id" id="form5_id" />

                            <input type="hidden" id="action" name="action" value="">

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:
                                        <h5>{{ $row->nameofPnao }}</h5>
                                        
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment: </label>
                                        <input class="inputHeader" type="text" name="areaAssign" id="areaAssign" value="{{ $row->areaOfAssign }}">
                                        @error('areaAssign')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Monitoring:
                                            <h5>{{\Carbon\Carbon::parse($row->dateMonitoring)->format('F j, Y');}}</h5>
                                        
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
                                                <td class="col-md-4">
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
                                                <td class="col-md-4">
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
                                                <td class="col-md-4">
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
                                            <label for="receivedBy">Received:</label>
                                            <input type="text" name="receivedBy" id="receivedBy" class="form8InputBot" value="{{ $row->receivedBy }}" placeholder="Enter receiver's name">
                                            @error('receivedBy')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror</td>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="whatDate">Date:</label>
                                            <input type="date" name="whatDate" id="whatDate" class="form8InputBot" value="{{ $row->whatDate }}">
                                            @error('whatDate')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror</td>
                                        </div>
                                    </div>

                                  
                                    <div class="d-flex bd-highlight mb-3" style="padding-top:10px;">
                                          <div class="mr-auto p-2 bd-highlight">
                                            <a href="{{ route('lguLnfpViewForm6', $row->form7_id) }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Previous Form 6 and 7</a></div>
                                          <div class="p-2 bd-highlight">
                                            @if( $row->interview_status == 2 )
                                            <a href="{{ route('editIntForm', $row->interview_id ) }}"> Next Interview Form <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div> 
                                            @else
                                            <a href="{{ route('viewIntForm', $row->interview_id ) }}"> Next Interview Form <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div> 
                                            @endif
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