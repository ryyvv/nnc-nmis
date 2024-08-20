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
    <div class="card-header">

      <div class="d-flex justify-content-end center" style="padding-right:20px; ">
        <form action="{{route('nutritionpolicies.download',$row->id)}}" method="POST">
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
          <!-- <a href="{{route('governance.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a> -->
          <a href="#">
            <h5 class="title" style="margin:0px">FORM B: BARANGAY PROFILE SHEET</h5>
          </a>
          <!-- <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4> -->
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

        <div style="padding:30px">
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
                  <td class="fontA bold">3a</td>
                  <td class="fontA">Presence of Barangay Nutrition Committee (BNC)</td>
                  <td class="fontA">The BNC is organized but membership is limited to 1 to 2 sectors only </td>
                  <td class="fontA">The BNC is organized but does not include all nutrition-related sectors as applicable in the barangay (pursuant to PPAN IG S.1981 and EO 234 S.1987)
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
                  <td class="fontA">The BNC is organized with the Barangay Captain as chairperson and is composed of all nutrition-related sectors in level 2 as applicable in the barangay</td>
                  <td class="fontA">The BNC is organized with the Barangay Captain as chairperson, composed of nutrition-related sectors in level 2 as applicable in the barangay and external partners, is supported by a resolution indicating the functions of each member and reorganized as necessary </td>
                  <td class="fontA">Barangay Nutrition Action Plan Resolutions Executive Order Organizational Chart</td>
                  <td class="fontA"> Barangay Nutrition Action Plan Minutes of Meeting Documentation of dissemination</td>
                  <td class="fontA">
                    <select id="loadProvince1" class="form-control" name="rating3a">
                      <option value="">Select</option>
                      <option value="1" {{ old('rating3a', $row->rating3a) == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating3a', $row->rating3a) == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating3a', $row->rating3a) == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating3a', $row->rating3a) == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating3a', $row->rating3a) == '5' ? 'selected' : '' }}>5</option>
                    </select>
                    @error('rating3a')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td>
                    <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks3a">{{ old('remarks3a', $row->remarks3a) }}</textarea>
                    @error('remarks3a')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td class="fontA bold">3b</td>
                  <td class="fontA">Presence of Nutrition Office and Personnel</td>
                  <td class="fontA">The barangay has designated a Barangay Nutrition Scholar </td>
                  <td class="fontA">The barangay designated a BNS and allocated budget for monthly honorarium </td>
                  <td class="fontA">The barangay designated a BNS with monthly honorarium, budget for supplies and designated a BNS desk </td>
                  <td class="fontA">The barangay designated a BNS with monthly honorarium, budget for supplies and designated a BNS corner/ office </td>
                  <td class="fontA">The barangay designated a BNS with monthly honorarium, budget for supplies, designated a BNS corner/ office and is assisted by Barangay Health Workers or other bgy personnel in the conduct of OPT Plus or other activities</td>
                  <td class="fontA">Resolution Executive Order Barangay Nutrition Action Plan Organizational Chart Approved Annual Budget</td>
                  <td class="fontA">
                    <select id="loadProvince1" class="form-control" name="rating3b">
                      <option value="">Select</option>
                      <option value="1" {{ old('rating3b', $row->rating3b) == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating3b', $row->rating3b) == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating3b', $row->rating3b) == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating3b', $row->rating3b) == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating3b', $row->rating3b) == '5' ? 'selected' : '' }}>5</option>
                    </select>
                    @error('rating3b')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td><textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks3b">{{ old('remarks3b' , $row->remarks3b) }}</textarea>
                    @error('remarks3b')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td class="fontA bold">3c</td>
                  <td class="fontA">Decision-making and Leadership of the Barangay Nutrition Committee </td>
                  <td class="fontA">The BNC is convened only once for the conduct of one nutrition-related activity</td>
                  <td class="fontA">The BNC is convened more than once to disseminate nutrition-related information</td>
                  <td class="fontA">The BNC are convened at least twice to:
                    <ol>
                      <li>Disseminate nutrition-related information</li>
                      <li>Formulate the Barangay Nutrition Action Plan</li>
                    </ol>
                  </td>
                  <td class="fontA">The BNC are convened at least three times to accomplish activities in level three and discuss implementation of activities</td>
                  <td class="fontA">The BNC are convened at least four times to accomplish activites in level 4 and discuss progress of implementation of the Barangay Nutrition Action Plan</td>
                  <td class="fontA">Minutes of meeting Barangay Nutrition Action Plan Accomplishment Report</td>
                  <td class="fontA">
                    <select id="loadProvince1" class="form-control" name="rating3c">
                      <option value="">Select</option>
                      <option value="1" {{ old('rating3c', $row->rating3c) == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating3c', $row->rating3c) == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating3c', $row->rating3c) == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating3c', $row->rating3c) == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating3c', $row->rating3c) == '5' ? 'selected' : '' }}>5</option>
                    </select>
                    @error('rating3c')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td><textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks3c">{{ old('remarks3c', $row->remarks3c) }}</textarea>
                    @error('remarks3c')
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