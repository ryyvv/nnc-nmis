<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

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
'namePage' => 'Vision Mission',
'activePage' => 'VISION',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
    <div style="display:flex;align-items:center">
      <a href="{{route('visionmission.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
      <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
    </div>

    @include('layouts.page_template.crud_alert_message')

    <div style="padding:25px">
      <form action="{{ route('visionmission.store') }}" method="POST" id="form">
        @csrf

        <input type="hidden" name="status" value="" id="status"> 
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <!-- header -->
        @include('layouts.page_template.location_header')
        
        <br>
        <br>
        <div>
          <!-- endtablehearder -->
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
                  <td class=" fontA bold">1a</td>
                  <td class="fontA" >Presence and knowledge of vision mission statement</td>
                  <td class="fontA">A vision mission statement for nutrition was formulated but not reflected in the Barangay Nutrition Action Plan</td>
                  <td class="fontA">A vision mission statement for nutrition was formulated and reflected in the Barangay Nutrition Action Plan</td>
                  <td class="fontA">The vision mission statement for nutrition program exists and disseminated to BNC members</td>
                  <td class="fontA">The vision mission statement for nutrition program exists and disseminated to BNC members and other stakeholders</td>
                  <td class="fontA">The vision mission statement for nutrition program exists and disseminated to BNC members, stakeholders and to the rest of the community</td>
                  <td class="fontA">Barangay Nutrition Action Plan Minutes of Meeting Documentation of dissemination</td>
                  <td class="fontA"> 
                    <select id="loadProvince1" class="form-control" name="rating1a">
                      <option value="" >Select</option>
                      <option value="1"  <?php echo ( old('rating1a') == '1' ? 'selected':'' )  ?>>1</option>
                      <option value="2"  <?php echo ( old('rating1a') == '2' ? 'selected':'' )  ?>>2</option>
                      <option value="3"  <?php echo ( old('rating1a') == '3' ? 'selected':'' )  ?>>3</option>
                      <option value="4"  <?php echo ( old('rating1a') == '4' ? 'selected':'' )  ?>>4</option>
                      <option value="5"  <?php echo ( old('rating1a') == '5' ? 'selected':'' )  ?>>5</option>
                    </select>
                    @error('rating1a')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td  >
                    <textarea class="form-control textArea"   name="remarks1a">{{ old('remarks1a') }}</textarea>
                    @error('remarks1a')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td class="fontA bold">1b</td>
                  <td class="fontA">Presence of nutrition-related concerns in the Barangay Development Plan</td>
                  <td class="fontA">Nutrition-related PAP is integrated in one of the sectoral plans in the Barangay Development Plan</td>
                  <td class="fontA">Nutrition-related PAP are integrated in at least two of the sectoral plans in the Barangay Development Plan</td>
                  <td class="fontA">PPAN-related PAP are integrated in at least three of the sectoral plans in the Barangay Development Plan</td>
                  <td class="fontA">Nutrition-related objectives are included in at least three of the sectoral plans </td>
                  <td class="fontA">Nutrition outcomes included in the overall success indicators of the Barangay Development Plan</td>
                  <td class="fontA">Barangay Development Plan</td>
                  <td>
                    <select id="loadProvince1" class="form-control" name="rating1b">
                      <option value=""  >Select</option>
                      <option value="1" <?php echo ( old('rating1b') == '1' ? 'selected':'' )  ?>>1</option>
                      <option value="2" <?php echo ( old('rating1b') == '2' ? 'selected':'' )  ?>>2</option>
                      <option value="3" <?php echo ( old('rating1b') == '3' ? 'selected':'' )  ?>>3</option>
                      <option value="4" <?php echo ( old('rating1b') == '4' ? 'selected':'' )  ?>>4</option>
                      <option value="5" <?php echo ( old('rating1b') == '5' ? 'selected':'' )  ?>>5</option>
                    </select>
                    @error('rating1b')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td>
                    <textarea class="form-control textArea"    name="remarks1b">{{ old('remarks1b') }}</textarea>
                    @error('remarks1b')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td class="fontA bold">1c</td>
                  <td class="fontA">Presence of nutrition-related concerns in the Annual Investment Program</td>
                  <td class="fontA">At least one nutrition-related PAP integrated in the Annual Investment Program</td>
                  <td class="fontA">At least two nutrition-related PAP integrated in the Annual Investment Program</td>
                  <td class="fontA">At least three PPAN-related PAP integrated in the Annual Investment Program</td>
                  <td class="fontA">At least four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program </td>
                  <td class="fontA">More than four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</td>
                  <td class="fontA">Annual Investment Program</td>
                  <td class="fontA">
                    <select id="loadProvince1" class="form-control" name="rating1c">
                      <option value="">Select</option>
                      <option value="1" <?php echo ( old('rating1c') == '1' ? 'selected':'' )  ?>>1</option>
                      <option value="2" <?php echo ( old('rating1c') == '2' ? 'selected':'' )  ?>>2</option>
                      <option value="3" <?php echo ( old('rating1c') == '3' ? 'selected':'' )  ?>>3</option>
                      <option value="4" <?php echo ( old('rating1c') == '4' ? 'selected':'' )  ?>>4</option>
                      <option value="5" <?php echo ( old('rating1c') == '5' ? 'selected':'' )  ?>>5</option>
                    </select>
                    @error('rating1c')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td>
                    <textarea class="form-control textArea"  name="remarks1c">{{ old('remarks1c') }}</textarea>
                    @error('remarks1c')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                </tr>


              </tbody>
            </table>
          </div>


          <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
            <button type="button"  style="margin-right:6px" class="bold btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
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



 <!-- alert Modal -->
@include('Modal.Draft')

<!-- alert Modal -->
@include('Modal.Submit')


@endsection