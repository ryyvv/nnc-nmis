
<style>
.form-section {
    display: none;
}

.form-section.current {
    display: inline;
}

.striped-rows .row:nth-child(odd) {
    background-color: #f2f2f2;
}

.col-sm {
    margin: auto;
    padding: 1rem 1rem;
}

.row .form-control {
    border-color: #bebebe !important;
    border: 1px solid;
    border-radius: 5px;
}

.form-control:disabled {
    font-weight: bolder !important;
    color: black !important;
}
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'LNC Management',
'activePage' => 'LNCManagement',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content') 
<div class="content" style="margin-top:50px;padding:2%">
<div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
<div class="card-header">
      <div class="d-flex justify-content-end center" style="padding-right:20px; ">
                <form action="{{route('lncmanagement.download',$row->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="htmlContent" id="htmlContent">
                    <button type="submit" id="hiddenButton" style="display: none;"></button>
                </form>

                <div style="display:absolute;" onclick="downloadPDF('{{$row->id}}')">
                    <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i>
                    <label class="download">Download file</label>
                </div>
        </div>
 

        @include('layouts.page_template.crud_alert_message')
            <div id="downloadable"> 
                <div style="display:flex;align-items:center">
                        <a href="#">
                            <h5 class="title" style="margin:0px">FORM B: BARANGAY PROFILE SHEET</h5>
                        </a>
                </div>

                <div style="margin-right:15px">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic" href="{{route('BSLGUprofile.index')}}">Mellpi Pro for LGU Profile</a></li>
                                <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Form B: Barangay Profile Sheet -
                                    <?php echo auth()->user()->barangay ?>
                                </li>
                            </ol>
                        </nav>
                </div>
                
                <div style="margin-top:30px">
                    @include('layouts.page_template.location_header')
                    <div class="row table-responsive" style="display:flex;padding:10px;">
                        <table class="table table-striped table-hover">
                            <thead style="background-color:#508D4E;">
                                <th class="text-center">&nbsp;</th>
                                <th class="tableheader">Elements</th>
                                <th colspan="5" class="tableheader">Performance Level</th>
                                <th class="tableheader">Document Source</th>
                                <th class="tableheader" style="padding-left:20px;padding-right:20px">Rating</th>
                                <th class="tableheader">Remarks</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="bold text-center">1</td>
                                    <td class="bold text-center">2</td>
                                    <td class="bold text-center">3</td>
                                    <td class="bold text-center">4</td>
                                    <td class="bold text-center">5</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4a</td>
                                    <td class="fontA">Nutrition Assessment</td>
                                    <td class="fontA">Updated Operation Timbang Plus reports available but not consolidated</td>
                                    <td class="fontA">Only updated and consolidated OPT Plus reports are available</td>
                                    <td class="fontA">Updated and consolidated OPT Plus reports available and school weighing reports as applicable and reported during BNC meetings</td>
                                    <td class="fontA">OPT Plus and school weighing reports (as applicable) used to prepare nutrition situation report</td>
                                    <td class="fontA">Nutrition situation prepared and used in the formulation of the Barangay Nutrition Action Plan</td>
                                    <td class="fontA"> Consolidated OPT Plus reports School weighing reports Nutrition Situation Barangay Nutrition Action Plan</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4a" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4a', $row->rating4a) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4a', $row->rating4a) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4a', $row->rating4a) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4a', $row->rating4a) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4a', $row->rating4a) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4a')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA">
                                        <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4a" disabled>{{ old('remarks4a', $row->remarks4a) }}</textarea>
                                        @error('remarks4a')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4b</td>
                                    <td class="fontA">Planning</td>
                                    <td class="fontA">Barangay Nutrition Action Plan is formulated but not adopted through a resolution</td>
                                    <td class="fontA">BNAP is formulated and adopted through a resolution with allocation of funds</td>
                                    <td class="fontA">BNAP formulated and adopted through a resolution with allocation of fund adopts a three year format</td>
                                    <td class="fontA">BNAP formulated in Level 3 is reviewed and updated at least once a year</td>
                                    <td class="fontA">PAPs in the BNAP is integrated in the Barangay Development Plan</td>
                                    <td class="fontA">Barangay Nutrition Action Plan Resolutions Minutes of Meeting Barangay Development Plan</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4b" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4b', $row->rating4b) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4b', $row->rating4b) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4b', $row->rating4b) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4b', $row->rating4b) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4b', $row->rating4b) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4b')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4b" disabled>{{ old('remarks4b', $row->remarks4b) }}</textarea>
                                        @error('remarks4b')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4c</td>
                                    <td class="fontA">Resource Generation and Mobilization</td>
                                    <td class="fontA">Only one activity in the BNAP is funded in the approved barangay budget</td>
                                    <td class="fontA">The budget for the BNAP is limited to sectoral budgets in the approved barangay budget</td>
                                    <td class="fontA">The PAPs in the BNAP are integrated in the approved annual barangay budget Program</td>
                                    <td class="fontA">The budget for BNAP in the approved annual barangay budget includes honorarium/ allowance for BNS and nutrition program budget and program</td>
                                    <td class="fontA">The budget for BNAP includes honorarium/ allowance for BNS and nutrition program from the approved annual barangay budget and funding from external sources</td>
                                    <td class="fontA">Barangay Nutrition Action Plan Annual Investment Program Approved Annual Barangay Budget Summary of Income and Expenditures</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4c" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4c', $row->rating4c) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4c', $row->rating4c) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4c', $row->rating4c) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4c', $row->rating4c) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4c', $row->rating4c) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4c')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4c" disabled>{{ old('remarks4c',$row->remarks4c) }}</textarea>
                                        @error('remarks4c')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr style="display:none">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="fontA bold" style="border-top: none">&nbsp;</td>
                                    <td class="fontA" style="border-top: none;">&nbsp;</td>
                                    <td class="fontA">Less than 70% of BNAP budget in the annual barangay budget utilized</td>
                                    <td class="fontA">At least 70% of BNAP budget in the annual barangay budget utilized</td>
                                    <td class="fontA">At least 90% of BNAP budget in the annual barangay budget utilized</td>
                                    <td class="fontA">More than 90% of BNAP budget in the annual barangay budget utilized</td>
                                    <td class="fontA">100% of BNAP budget in the annual barangay budget utilized</td>
                                    <td class="fontA" style="border-top: none"></td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4c2" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4c2', $row->rating4c2) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4c2', $row->rating4c2) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4c2', $row->rating4c2) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4c2', $row->rating4c2) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4c2', $row->rating4c2) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4c2')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4c2" disabled>{{ old('remarks4c2',$row->remarks4c2) }}</textarea>
                                        @error('remarks4c2')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4d</td>
                                    <td class="fontA">Service Delivery</td>
                                    <td class="fontA">Less than 50% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                    <td class="fontA">More than 50% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                    <td class="fontA">At least 80% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                    <td class="fontA">More than 80% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                    <td class="fontA">100% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                    <td class="fontA"> Barangay Nutrition Action Plan Masterlist of malnourished children Masterlist of beneficiaries</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4d" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4d', $row->rating4d) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4d', $row->rating4d) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4d', $row->rating4d) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4d', $row->rating4d) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4d', $row->rating4d) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4d')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4d" disabled>{{ old('remarks4d', $row->remarks4d) }}</textarea>
                                        @error('remarks4d')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4e</td>
                                    <td class="fontA">Monitoring and Evaluation</td>
                                    <td class="fontA">Monitoring conducted by BNS only</td>
                                    <td class="fontA">Interagency monitoring conducted but not documented</td>
                                    <td class="fontA">Interagency monitoring conducted and documented at least once a year</td>
                                    <td class="fontA">Interagency monitoring conducted and documented at least twice a year</td>
                                    <td class="fontA">Results of interagency monitoring disseminated during BNC meeting/s and used in BNAP formulation</td>
                                    <td class="fontA"> Barangay Nutrition Action Plan Monitoring report Documentation report Minutes of meeting</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4e" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4e', $row->rating4e) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4e', $row->rating4e) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4e', $row->rating4e) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4e', $row->rating4e) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4e', $row->rating4e) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4e')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4e" disabled>{{ old('remarks4e',$row->remarks4e ) }}</textarea>
                                        @error('remarks4e')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4f</td>
                                    <td class="fontA">Capacity Development Barangay Nutrition Committee members</td>
                                    <td class="fontA">Only one member of the Barangay Nutrition Committee trained/ oriented on Baranagy Nutrition Action Plan formulation</td>
                                    <td class="fontA">Only two members of the BNAP trained/ oriented on BNAP formulation</td>
                                    <td class="fontA">Barangay Captain, Kagawad on Health and one BNC member trained/ oriented on BNAP formulation</td>
                                    <td class="fontA">Three BNC members in Level 3 trained/ oriented in BNAP formulation and attended least one nutrition-related trainings/ forums within the year</td>
                                    <td class="fontA">More than three BNC members trained/ oriented in BNAP formulation and attended at least one nutrition-related training/ forum within the year</td>
                                    <td class="fontA"> Barangay Nutrition Action Plan Accomplishment Report Training Cetificates Documentation</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4f" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4f', $row->rating4f) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4f', $row->rating4f) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4f', $row->rating4f) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4f', $row->rating4f) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4f', $row->rating4f) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4f')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4f" disabled>{{ old('remarks4f', $row->remarks4f) }}</textarea>
                                        @error('remarks4f')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">4g</td>
                                    <td class="fontA">Barangay Nutrition Scholars</td>
                                    <td class="fontA">Less than 100% of BNSs trained in Basic Course for BNS</td>
                                    <td class="fontA">100% of BNSs trained in Basic Course for BNS</td>
                                    <td class="fontA">100% of BNSs trained in Basic Course for BNS and at least one BNS trained/ oriented on Barangay Nutrition Action Plan formulation</td>
                                    <td class="fontA">100% of BNSs trained in Basic Course for BNS and at least one BNS trained/ oriented on Barangay Nutrition Action Plan formulation and less than 50% of the BNSs attended at least one nutrition-related training/ forum</td>
                                    <td class="fontA">100% of BNSs trained in Basic Course for BNS and at least one BNS trained/ oriented on Barangay Nutrition Action Plan formulation and more than 50% of the BNSs attended at least one nutrition-related training/ forum</td>
                                    <td class="fontA"> Barangay Nutrition Action Plan Accomplishment Report Training Cetificates Documentation</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating4g" disabled>
                                            <option value="">Select</option>
                                            <option value="1" {{ old('rating4g', $row->rating4g) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating4g', $row->rating4g) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating4g', $row->rating4g) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating4g', $row->rating4g) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating4g', $row->rating4g) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating4g')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td class="fontA"><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control" name="remarks4g" disabled>{{ old('remarks4g', $row->remarks4g) }}</textarea>
                                        @error('remarks4g')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
      </div>
    </div>
</div>
</div>

@endsection