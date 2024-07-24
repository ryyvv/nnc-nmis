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
'activeNav' => '',
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
            <form action="{{ route('visionmission.update', $vmbarangay->id ) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="status" value="{{$vmbarangay->status}}">
                <input type="hidden" name="dateCreated" value="{{$vmbarangay->dateCreated}}">
                <input type="hidden" name="dateUpdates" value="{{$vmbarangay->dateUpdates}}">
                <input type="hidden" name="user_id" value="{{$vmbarangay->user_id}}}}">
                <!-- header -->
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <input type="text" class="form-control" name="barangay_id" value="{{$vmbarangay->barangay_id}}}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <input type="text" class="form-control" name="municipal_id"
                            value="{{$vmbarangay->municipal_id}}}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>
                        <input type="text" class="form-control" name="province_id" value="{{$vmbarangay->province_id}}}}">
                        <input type="hidden" class="form-control" name="region_id" value="{{$vmbarangay->region_id}}}}">
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Date of Monitoring:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dateMonitoring" value="{{$vmbarangay->dateMonitoring}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCovereda" value="{{$vmbarangay->periodCovereda}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCoveredb" value="{{$vmbarangay->periodCoveredb}}">
                    </div>
                </div>
                <!-- endheader -->
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
                            <div style="display:flex" style="justify-content:center!important" >
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
                            <select id="loadProvince1" class="form-control" name="rating1a" >
                                <option >Select</option>
                                <option value="1" {{ old('rating1a', $vmbarangay->rating1a) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating1a', $vmbarangay->rating1a) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating1a', $vmbarangay->rating1a) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating1a', $vmbarangay->rating1a) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating1a', $vmbarangay->rating1a) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks1a" 
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks1a', $vmbarangay->remarks1a) }}</textarea>
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
                            <select id="loadProvince1" class="form-control" name="rating1b"  > 
                                <option value="1" {{ old('rating1b', $vmbarangay->rating1b) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating1b', $vmbarangay->rating1b) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating1b', $vmbarangay->rating1b) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating1b', $vmbarangay->rating1b) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating1b', $vmbarangay->rating1b) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks1b"   
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"> {{ old('remarks1b', $vmbarangay->remarks1b) }}</textarea>
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
                            <select id="loadProvince1" class="form-control" name="rating1c"  >
                                <option>Select</option>
                                <option value="1" {{ old('rating1c', $vmbarangay->rating1c) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating1c', $vmbarangay->rating1c) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating1c', $vmbarangay->rating1c) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating1c', $vmbarangay->rating1c) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating1c', $vmbarangay->rating1c) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text"  name="remarks1c"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks1c', $vmbarangay->remarks1c) }}</textarea>
                        </div>
                    </div>

                </div>


                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection