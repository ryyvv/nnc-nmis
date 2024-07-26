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
'namePage' => 'Change Nutrition Status',
'activePage' => 'changeNS',
'activeNav' => '',
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div style="display:flex;align-items:center">
            <a href="{{route('visionmission.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI Pro FORM B 2a: CHANGES IN THE NUTRITIONAL STATUS IN THE BARANGAY</h4>
        </div>

        @include('layouts.page_template.crud_alert_message')

        <div style="padding:25px">
            <form action="{{ route('changeNS.store') }}" method="POST">
                @csrf

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <!-- header -->
                @include('layouts.page_template.location_header')
                <!-- endheader -->
                <br>
                <br>
                <div>
                <div class="row table-responsive" style="display:flex;padding:10px;">
            <table class="table table-striped table-hover">
              <thead style="background-color:#508D4E;">
                <th class="text-center">&nbsp;</th>
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
                  <td class="bold">1</td>
                  <td> Prevalence of underweight children 0-59 months</td>
                  <td> Prevalence ofunderweight children 0-59 months</td>
                  <td>Prevalence is within high level of public health significance (10 to < 15%) in
                  the year evaluated</td>
                  <td> Prevalence is within the middle to upper limit of medium level of public health
                  significance (7.5 to < 10% ) in the year evaluated</td>
                  <td>Prevalence is within the lower limit of medium public health significance (5 to
                  < 7.5% ) in the year evaluated</td>
                  <td> Prevalence is within the low level of public health significance (< 5%) in the
                  year evaluated</td>
                  <td>Barangay Nutrition Action Plan
                  Operation Timbang Report (Previous and current years)</td>
                  <td> 
                    <select class="form-control" name="rating6a">
                      <option>Select</option>
                      <option value="1" {{ old('rating1a') == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating1a') == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating1a') == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating1a') == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating1a') == '5' ? 'selected' : '' }}>5</option>
                    </select>
                    @error('rating6a')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror</td>
                  <td>
                    <textarea class="form-control" name="remarks6a">{{ old('remarks6a') }}</textarea>
                  @error('remarks6a')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror</td>
                </tr>
                <tr>
                  <td class="bold">2</td>
                  <td> Prevalence of underweight children 0-59 months</td>
                  <td> Prevalence of underweight children 0-59 months</td>
                  <td>Prevalence is within high level of public health significance (10 to < 15%) in
                  the year evaluated</td>
                  <td> Prevalence is within the middle to upper limit of medium level of public health
                  significance (7.5 to < 10% ) in the year evaluated</td>
                  <td>Prevalence is within the lower limit of medium public health significance (5 to
                  < 7.5% ) in the year evaluated</td>
                  <td> Prevalence is within the low level of public health significance (< 5%) in the
                  year evaluated</td>
                  <td>Barangay Nutrition Action Plan
                  Operation Timbang Report (Previous and current years)</td>
                  <td> 
                    <select class="form-control" name="rating6a">
                      <option>Select</option>
                      <option value="1" {{ old('rating1a') == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating1a') == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating1a') == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating1a') == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating1a') == '5' ? 'selected' : '' }}>5</option>
                    </select>
                    @error('rating6a')
                            <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </td>
                  <td>
                    <textarea class="form-control" name="remarks1a">{{ old('remarks6a') }}</textarea>
                  @error('terrain')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror</td>
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