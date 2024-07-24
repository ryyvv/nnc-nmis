<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>

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

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <h4><b>MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</b></h4>
        <br>

        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form action="{{ route('visionmission.store') }}" method="POST" id="lgu-profile-form">
                @csrf

                <input type="hidden" name="status" value="" id="status">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <!-- header -->
                @include('layouts.page_template.location_header')
                <br>
                <br>
                <div>
                    <!-- endtablehearder -->
                    <div class="row" style="display:flex;background-color:#F5F5F5;padding:10px;border-radius:5px;justify-content:center; text-align: center;" >
                        <div class="col-2 justify-content-center">
                            <label for="exampleFormControlInput1"><b>ELEMENTS</b></label>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div>
                                <label for="exampleFormControlInput1"><b>PERFORMANCE LEVEL</b></label>
                            </div>
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1"><b>1</b></label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1"><b>2</b></label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1"><b>3</b></label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1"><b>4</b></label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1"><b>5</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1"><b>DOCUMENT SOURCE</b></label>
                        </div>
                        <div class="col-1">
                            <label for="exampleFormControlInput1"><b>RATING</b></label>
                        </div>
                        <div class="col-1">
                            <label for="exampleFormControlInput1"><b>REMARKS/EVIDENCE</b></label>
                        </div>
                    </div>
                    <br>
                    <!-- endtablehearder -->


                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>1a</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Presence and
                                    knowledge of vision mission statement</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">A vision mission statement for nutrition
                                        was formulated but not reflected in the Barangay Nutrition Action
                                        Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">A vision mission statement for nutrition
                                        was formulated and reflected in the Barangay Nutrition Action
                                        Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The vision mission statement for nutrition
                                        program exists and disseminated to BNC members</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The vision mission statement for nutrition
                                        program exists and disseminated to BNC members and other
                                        stakeholders</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The vision mission statement for nutrition
                                        program exists and to BNC members, stakeholders and to the rest of the
                                        community</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Barangay Nutrition Action Plan Minutes of Meeting
                                Documentation of dissemination</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating1a">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>1b</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Presence of nutrition-related concerns in the Barangay Development Plan</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">Nutrition-related PAP is integrated in one of the sectoral plans in the Barangay Development Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">Nutrition-related PAP are integrated in at least two of the sectoral plans in the Barangay Development Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">PPAN-related PAP are integrated in at least three of the sectoral plans in the Barangay Development Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">Nutrition-related objectives are included in at least three of the sectoral plans </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1"> Nutrition outcomes included in the overall success indicators of the Barangay Development Plan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Barangay Development Plan</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating1b">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks1b"  placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>1c</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Presence of nutrition-related concerns in the Annual Investment Program</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">At least one nutrition-related PAP integrated in the Annual Investment Program</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">At least two nutrition-related PAP integrated in the Annual Investment Program</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">At least three PPAN-related PAP integrated in the Annual Investment Program</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">At least four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">More than four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Annual Investment Program</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating1c">
                                <option>Select</option>
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                        <textarea type="text" name="remarks1c"  placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                </div>


                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                    Draft
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Submit
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