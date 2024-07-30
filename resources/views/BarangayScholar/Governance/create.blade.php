<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">

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
'namePage' => 'Governance',
'activePage' => 'Governance',
'activeNav' => 'MELLPI PRO For LGU', 
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div style="display:flex;align-items:center">
            <a href="{{route('governance.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        </div>

        @include('layouts.page_template.crud_alert_message')

        <div style="padding:25px">
            <form action="{{ route('governance.store') }}" method="POST" id="lgu-profile-form">
                @csrf

                <input type="hidden" name="status" value="1" id="status"> 
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                <!-- header -->
                @include('layouts.page_template.location_header')
                <!-- endheader -->
                
                <br>
                <br>
                <div>
                    <!-- endtablehearder -->
                    <div class="row table-responsive" style="display:flex;padding:10px;" >
                    <table class="table table-striped table-hover">
                    <thead style="background-color:#508D4E;"> 
                            <th>&nbsp;</th>
                            <th class="tableheader"><b>Elements</b></th>
                            <th colspan="5" class="tableheader" ><b>Performance Level<b></th>
                            <th class="tableheader"><b>Document Source</b></th>
                            <th class="tableheader"><b>Rating</b></th>
                            <th class="tableheader"><b>Remarks</b></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>1</td>
                                <td class="bold text-center">2</td>
                                <td class="bold text-center">3</td>
                                <td class="bold text-center">4</td>
                                <td class="bold text-center">5</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td >3a</td>
                                <td>Presence of Barangay Nutrition Committee (BNC)</td>
                                <td>The BNC is organized but membership is limited to 1 to 2 sectors only </td>
                                <td>The BNC is organized but does not include all nutrition-related sectors as applicable in the barangay (pursuant to PPAN IG S.1981 and EO 234 S.1987)
                                    <br>
                                    <ol>
                                    <li>Barangay Captain</li>
                                    <li>Kagawad on Health</li>
                                    <li>Rural Health Midwife</li>
                                    <li>Child Development Worker</li>
                                    <li>School Principal/ Teacher </li>
                                    <li>Agriculture Technician (if existing)</li>
                                    <li>Barangay Secretary </li>
                                    </ol>
                                </td>
                                <td>The BNC is organized with the Barangay Captain as chairperson and is composed of all nutrition-related sectors in level 2 as applicable in the barangay</td>
                                <td>The BNC is organized with the Barangay Captain as chairperson, composed of nutrition-related sectors in level 2 as applicable in the barangay and external partners, is supported by a resolution indicating the functions of each member and reorganized as necessary </td>
                                <td>Barangay Nutrition Action Plan Resolutions Executive Order Organizational Chart</td>
                                <td> Barangay Nutrition Action Plan Minutes of Meeting Documentation of dissemination</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating3a">
                                    <option>Select</option>
                                    <option value="1" {{ old('rating3a') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('rating3a') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('rating3a') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('rating3a') == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('rating3a') == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td>
                                  <textarea class="form-control"  style="width:inherit;height:100%  " name="remarks3a" >{{ old('remarks3a') }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>3b</td>
                                <td>Presence of Nutrition Office and Personnel</td>
                                <td>The barangay has designated a Barangay Nutrition Scholar </td>
                                <td>The barangay designated a BNS and allocated budget for monthly honorarium </td>
                                <td>The barangay designated a BNS with monthly honorarium, budget for supplies and designated a BNS desk </td>
                                <td>The barangay designated a BNS with monthly honorarium, budget for supplies and designated a BNS corner/ office </td>
                                <td>The barangay designated a BNS with monthly honorarium, budget for supplies, designated a BNS corner/ office and is assisted by Barangay Health Workers or other bgy personnel in the conduct of OPT Plus or other activities</td>
                                <td>Resolution Executive Order Barangay Nutrition Action Plan Organizational Chart Approved Annual Budget</td>
                                <td> <select id="loadProvince1" class="form-control" name="rating3b">
                                            <option>Select</option>
                                            <option value="1" {{ old('rating3b') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating3b') == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating3b') == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating3b') == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating3b') == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                </td>
                                <td><textarea class="form-control" name="remarks3b" >{{ old('remarks3b') }}</textarea></td>
                            </tr>
                            <tr>
                                <td>3c</td>
                                <td>Decision-making and Leadership of the Barangay Nutrition Committee </td>
                                <td>The BNC is convened only once for the conduct of one nutrition-related activity</td>
                                <td>The BNC is convened more than once to disseminate nutrition-related information</td>
                                <td>The BNC are convened at least twice to:
                                        <ol>
                                            <li>Disseminate nutrition-related information</li>
                                            <li>Formulate the Barangay Nutrition Action Plan</li>
                                        </ol>
                                </td>
                                <td>The BNC are convened at least three times to accomplish activities in level three and discuss implementation of activities</td>
                                <td>The BNC are convened at least four times to accomplish activites in level 4 and discuss progress of implementation of the Barangay Nutrition Action Plan</td>
                                <td>Minutes of meeting Barangay Nutrition Action Plan Accomplishment Report</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating3c"> 
                                    <option>Select</option>
                                    <option value="1" {{ old('rating3c') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('rating3c') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('rating3c') == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('rating3c') == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('rating3c') == '5' ? 'selected' : '' }}>5</option>
                                </select>
                                </td>
                                <td><textarea class="form-control" name="remarks3c">{{ old('remarks3c') }}</textarea></td>
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