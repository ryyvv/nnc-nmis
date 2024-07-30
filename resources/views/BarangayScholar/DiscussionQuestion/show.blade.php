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
'namePage' => 'User Profile',
'activePage' => 'profile',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content') 
<div class="content" style="margin-top:50px;padding:2%">
<div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">  
        <div style="display:flex;align-items:center">
            <a href="{{route('discussionquestion.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        </div>
        
        @include('layouts.page_template.crud_alert_message')

      <div style="padding:25px">
                <!-- header -->
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <input type="text" class="form-control" name="barangay_id" value="{{$dqlocation->barangay_id}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <input type="text" class="form-control" name="municipal_id"
                        value="{{$dqlocation->municipal_id}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>
                        <input type="text" class="form-control" name="province_id"  value="{{$dqlocation->province_id}}">
                        <input type="hidden" class="form-control" name="region_id"  value="{{$dqlocation->region_id}}">
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Date of Monitoring:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" 
                        name="dateMonitoring"  value="{{$dqlocation->dateMonitoring}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label> 
                        <input type="number" id="yearInput" name="periodCovered" class="form-control" 
                        min="1900" max="2100" required  value="{{$dqlocation->periodCovered}}">

                    </div> 
                </div>
                <!-- endheader -->
                <br>
                <br>
                <div>
                    <!--tablehearder -->
                    <div class="row-12" style="display:flex;background-color:#F5F5F5;padding:10px;border-radius:5px;">
                        <div class="justify-content-center">
                            <label for="exampleFormControlInput1"></label>
                        </div>
                        <div class="col justify-content-center">
                            <label for="exampleFormControlInput1"><b>Dimensions</b></label>
                        </div>
                        <div class="col " style="padding:0px!important">
                            <label for="exampleFormControlInput1"><b>What are the good practices
                                    done/initiated?</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>What are the issues and problems and
                                    why?</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>What local initiatives have been done?</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>What are the immediate actions for
                                    improvement?</b></label>
                        </div>
                    </div>
                    <!-- endtablehearder -->

                    <!-- 1 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>1</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                                Vision and Mission
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7aa"  
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7aa', $dqlocation->practice7aa) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ab"  
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ab', $dqlocation->practice7ab) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ac"  
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ac', $dqlocation->practice7ac) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ad" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ad', $dqlocation->practice7ad) }}</textarea>
                        </div>
                    </div>

                    <!-- 2 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>2</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                                Nutrition Laws and Policies
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ba" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ba', $dqlocation->practice7ba) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7bb" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7bb', $dqlocation->practice7bb) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7bc" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7bc', $dqlocation->practice7bc) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7bd" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7bd', $dqlocation->practice7bd) }}</textarea>
                        </div>
                    </div>

                    <!-- 3 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>3</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Governance and Organizational
                            Structure
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ca" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ca', $dqlocation->practice7ca) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7cb" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7cb', $dqlocation->practice7cb) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7cc" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7cc', $dqlocation->practice7cc) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7cd" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7cd', $dqlocation->practice7cd) }}</textarea>
                        </div>
                    </div>

                    <!-- 4 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>4</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Local Nutrition Committee
                            Management Functions
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7da" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7da', $dqlocation->practice7da) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7db" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7db', $dqlocation->practice7db) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7dc" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7dc', $dqlocation->practice7dc) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7dd" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7dd', $dqlocation->practice7dd) }}</textarea>
                        </div>
                    </div>

                    <!-- 5 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>5</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Nutrition Interventions/ Services
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ea" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ea', $dqlocation->practice7ea) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7eb" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7eb', $dqlocation->practice7eb) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ec" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ec', $dqlocation->practice7ec) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ed" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ed', $dqlocation->practice7ed) }}</textarea>
                        </div>
                    </div>

                    <!-- 6 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>6</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Changes in Nutritional Status in
                            the Local Government Unit
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fa" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fa', $dqlocation->practice7fa) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fb" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fb', $dqlocation->practice7fb) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fc" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fc', $dqlocation->practice7fc) }}</textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fd" 
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;
                                width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fd', $dqlocation->practice7fd) }}</textarea>
                        </div>
                    </div>

                </div>
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