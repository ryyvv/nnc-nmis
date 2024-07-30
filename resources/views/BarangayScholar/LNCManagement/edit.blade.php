
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
 
        <div style="display:flex;align-items:center">
            <a href="{{route('lncmanagement.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        </div>
 

        @include('layouts.page_template.crud_alert_message')

        <div style="padding:25px">
            <form action="{{ route('lncmanagement.update', $row->id) }}" method="POST" id="lgu-profile-form">
                @csrf
                @method('PUT')

                <input type="hidden" name="status"  value="{{$row->status}}" id="status">
                <input type="hidden" name="user_id" value="{{$row->user_id}}">
                <!-- header -->
                @include('layouts.page_template.location_header')
                <!-- endheader -->
                 
                <br>
                <div>
                    <!-- endtablehearder -->
                    <div class="row table-responsive" style="display:flex;padding:10px;" >
                    <table class="table table-striped table-hover">
                        <thead style="background-color:#508D4E;"> 
                            <th class="text-center" >&nbsp;</th>
                            <th class="tableheader">Elements</th>
                            <th colspan="5" class="tableheader">Performance Level</th>
                            <th class="tableheader">Document Source</th>
                            <th class="tableheader">Rating</th>
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
                                <td>4a</td>
                                <td>Nutrition Assessment</td>
                                <td>Updated Operation Timbang Plus reports available but not consolidated</td>
                                <td>Only updated and consolidated OPT Plus reports are available</td>
                                <td>Updated and consolidated OPT Plus reports available and school weighing reports as applicable and reported during BNC meetings</td>
                                <td>OPT Plus and school weighing reports (as applicable) used to prepare nutrition situation report</td>
                                <td>Nutrition situation prepared and used in the formulation of the Barangay Nutrition Action Plan</td>
                                <td> Consolidated OPT Plus reports School weighing reports Nutrition Situation Barangay Nutrition Action Plan</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4a">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4a', $row->rating4a) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4a', $row->rating4a) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4a', $row->rating4a) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4a', $row->rating4a) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4a', $row->rating4a) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td>
                                <textarea class="form-control" name="remarks4a">{{ old('remarks4a', $row->remarks4a) }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>4b</td>
                                <td>Planning</td>
                                <td>Barangay Nutrition Action Plan is formulated but not adopted through a resolution</td>
                                <td>BNAP is formulated and adopted through a resolution with allocation of funds</td>
                                <td>BNAP formulated and adopted through a resolution with allocation of fund adopts a three year format</td>
                                <td>BNAP formulated in Level 3 is reviewed and updated at least once a year</td>
                                <td>PAPs in the BNAP is integrated in the Barangay Development Plan</td>
                                <td>Barangay Nutrition Action Plan Resolutions Minutes of Meeting Barangay Development Plan</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4b">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4b', $row->rating4b) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4b', $row->rating4b) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4b', $row->rating4b) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4b', $row->rating4b) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4b', $row->rating4b) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks4b">{{ old('remarks4b', $row->remarks4b) }}</textarea></td>
                            </tr>
                            <tr>
                                <td>4c</td>
                                <td>Presence of nutrition-related concerns in the Annual Investment Program</td>
                                <td>At least one nutrition-related PAP integrated in the Annual Investment Program</td>
                                <td>At least two nutrition-related PAP integrated in the Annual Investment Program</td>
                                <td>At least three PPAN-related PAP integrated in the Annual Investment Program</td>
                                <td>At least four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</td>
                                <td>More than four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</td>
                                <td>Annual Investment Program</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4c">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4c', $row->rating4c) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4c', $row->rating4c) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4c', $row->rating4c) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4c', $row->rating4c) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4c', $row->rating4c) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks4c">{{ old('remarks4c',$row->remarks4c) }}</textarea></td>
                            </tr>
                            <tr>
                                <td>4d</td>
                                <td>Service Delivery</td>
                                <td>Less than 50% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                <td>More than 50% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                <td>At least 80% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                <td>More than 80% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                <td>100% of the malnourished are targeted in delivery of barangay-funded nutrition programs</td>
                                <td> Barangay Nutrition Action Plan Masterlist of malnourished children Masterlist of beneficiaries</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4d">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4d', $row->rating4d) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4d', $row->rating4d) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4d', $row->rating4d) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4d', $row->rating4d) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4d', $row->rating4d) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks4d">{{ old('remarks4d', $row->remarks4d) }}</textarea></td>
                            </tr>
                            <tr>
                                <td>4e</td>
                                <td>Monitoring and Evaluation</td>
                                <td>Monitoring conducted by BNS only</td>
                                <td>Interagency monitoring conducted but not documented</td>
                                <td>Interagency monitoring conducted and documented at least once a year</td>
                                <td>Interagency monitoring conducted and documented at least twice a year</td>
                                <td>Results of interagency monitoring disseminated during BNC meeting/s and used in BNAP formulation</td>
                                <td> Barangay Nutrition Action Plan Monitoring report Documentation report Minutes of meeting</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4e">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4e', $row->rating4e) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4e', $row->rating4e) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4e', $row->rating4e) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4e', $row->rating4e) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4e', $row->rating4e) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks4e">{{ old('remarks4e',$row->remarks4e ) }}</textarea></td>
                            </tr>
                            <tr>
                                <td>4f</td>
                                <td>Capacity Development Barangay Nutrition Committee members</td>
                                <td>Only one member of the Barangay Nutrition Committee trained/ oriented on Baranagy Nutrition Action Plan formulation</td>
                                <td>Only two members of the BNAP trained/ oriented on BNAP formulation</td>
                                <td>Barangay Captain, Kagawad on Health and one BNC member trained/ oriented on BNAP formulation</td>
                                <td>Three BNC members in Level 3 trained/ oriented in BNAP formulation and attended least one nutrition-related trainings/ forums within the year</td>
                                <td>More than three BNC members trained/ oriented in BNAP formulation and attended at least one nutrition-related training/ forum within the year</td>
                                <td> Barangay Nutrition Action Plan Accomplishment Report Training Cetificates Documentation</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4f">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4f', $row->rating4f) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4f', $row->rating4f) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4f', $row->rating4f) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4f', $row->rating4f) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4f', $row->rating4f) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks4f">{{ old('remarks4f', $row->remarks4f) }}</textarea></td>
                            </tr>
                            <tr>
                                <td>4g</td>
                                <td>Barangay Nutrition Scholars</td>
                                <td>Less than 100% of BNSs trained in Basic Course for BNS</td>
                                <td>100% of BNSs trained in Basic Course for BNS</td>
                                <td>100% of BNSs trained in Basic Course for BNS and at least one BNS trained/ oriented on Barangay Nutrition Action Plan formulation</td>
                                <td>100% of BNSs trained in Basic Course for BNS and at least one BNS trained/ oriented on Barangay Nutrition Action Plan formulation and less than 50% of the BNSs attended at least one nutrition-related training/ forum</td>
                                <td>100% of BNSs trained in Basic Course for BNS and at least one BNS trained/ oriented on Barangay Nutrition Action Plan formulation and more than 50% of the BNSs attended at least one nutrition-related training/ forum</td>
                                <td> Barangay Nutrition Action Plan Accomplishment Report Training Cetificates Documentation</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating4g">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating4g', $row->rating4g) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating4g', $row->rating4g) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating4g', $row->rating4g) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating4g', $row->rating4g) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating4g', $row->rating4g) == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks4g">{{ old('remarks4g', $row->remarks4g) }}</textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                <button type="button" class="bold btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                    Save as Draft
                    </button>
                    <button type="button" class="bold btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Save and Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Submit-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to submit this form?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" id="lgu-submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Draft -->
<div class="modal fade" id="exampleModalCenterDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Save as Draft?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" id="lgu-draft" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>


@endsection