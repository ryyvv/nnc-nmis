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
            <form action="{{ route('visionmission.update', $row->id ) }}" method="POST" id="lgu-profile-form">
                @csrf
                @method('PUT')

                <input type="hidden" name="status" value="{{$row->status}}" id="status">
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
                                <td>1a</td>
                                <td>Presence and knowledge of vision mission statement</td>
                                <td>A vision mission statement for nutrition was formulated but not reflected in the Barangay Nutrition Action Plan</td>
                                <td>A vision mission statement for nutrition was formulated and reflected in the Barangay Nutrition Action Plan</td>
                                <td>The vision mission statement for nutrition program exists and disseminated to BNC members</td>
                                <td>The vision mission statement for nutrition program exists and disseminated to BNC members and other stakeholders</td>
                                <td>The vision mission statement for nutrition program exists and to BNC members, stakeholders and to the rest of the community</td>
                                <td> Barangay Nutrition Action Plan Minutes of Meeting Documentation of dissemination</td>
                                <td> <select id="loadProvince1" class="form-control" name="rating1a" >
                                <option >Select</option>
                                <option value="1" {{ old('rating1a', $row->rating1a) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating1a', $row->rating1a) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating1a', $row->rating1a) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating1a', $row->rating1a) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating1a', $row->rating1a) == '5' ? 'selected' : '' }}>5</option>
                                </select></td>
                                <td><textarea class="form-control" name="remarks1a" >{{ old('remarks1a', $row->remarks1a) }}</textarea></td>
                            </tr>
                            <tr>
                                <td>1b</td>
                                <td>Presence of nutrition-related concerns in the Barangay Development Plan</td>
                                <td>Nutrition-related PAP is integrated in one of the sectoral plans in the Barangay Development Plan</td>
                                <td>Nutrition-related PAP are integrated in at least two of the sectoral plans in the Barangay Development Plan</td>
                                <td>PPAN-related PAP are integrated in at least three of the sectoral plans in the Barangay Development Plan</td>
                                <td>Nutrition-related objectives are included in at least three of the sectoral plans </td>
                                <td>Nutrition outcomes included in the overall success indicators of the Barangay Development Plan</td>
                                <td>Barangay Development Plan</td>
                                <td><select id="loadProvince1" class="form-control" name="rating1b"  > 
                                <option value="1" {{ old('rating1b', $row->rating1b) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating1b', $row->rating1b) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating1b', $row->rating1b) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating1b', $row->rating1b) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating1b', $row->rating1b) == '5' ? 'selected' : '' }}>5</option>
                                </select></td>
                                <td>
                                <textarea  class="form-control" name="remarks1b"> {{ old('remarks1b', $row->remarks1b) }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>1c</td>
                                <td>Presence of nutrition-related concerns in the Annual Investment Program</td>
                                <td>At least one nutrition-related PAP integrated in the Annual Investment Program</td>
                                <td>At least two nutrition-related PAP integrated in the Annual Investment Program</td>
                                <td>At least three PPAN-related PAP integrated in the Annual Investment Program</td>
                                <td>At least four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program </td>
                                <td>More than four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</td>
                                <td>Annual Investment Program</td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating1c"  >
                                    <option>Select</option>
                                    <option value="1" {{ old('rating1c', $row->rating1c) == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('rating1c', $row->rating1c) == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('rating1c', $row->rating1c) == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('rating1c', $row->rating1c) == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('rating1c', $row->rating1c) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                </td>
                                <td>
                                <textarea class="form-control"  name="remarks1c">{{ old('remarks1c', $row->remarks1c) }}</textarea>
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

<!-- Modal Submit -->
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