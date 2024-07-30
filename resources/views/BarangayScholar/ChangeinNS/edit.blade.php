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

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <div style="display:flex;align-items:center">
            <a href="{{ route('changeNS.index') }}" class="btn btn-primary">Back</a>
            <p style="margin-bottom:0px;margin-left:25px; font-weight:900;font-size:25px">MELLPI PRO FORM B: BARANGAY PROFILE SHEET</p>
        </div>
        
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form action="{{ route('changeNS.update', $cnlocation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="status" value="{{$cnlocation->status}}">
                <input type="hidden" name="dateCreated" value="{{$cnlocation->dateCreated}}">
                <input type="hidden" name="dateUpdates" value="{{$cnlocation->dateUpdates}}">
                <input type="hidden" name="user_id" value="{{$cnlocation->user_id}}">
                <!-- header -->
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <input type="text" class="form-control" name="barangay_id" value="{{$cnlocation->barangay_id}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <input type="text" class="form-control" name="municipal_id"
                        value="{{$cnlocation->municipal_id}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>
                        <input type="text" class="form-control" name="province_id" value="{{$cnlocation->province_id}}">
                        <input type="hidden" class="form-control" name="region_id" value="{{$cnlocation->region_id}}">
                    </div>

                </div>
                <br>
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Date of Monitoring:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dateMonitoring" value="{{$cnlocation->dateMonitoring}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCovereda" value="{{$cnlocation->periodCovereda}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCoveredb" value="{{$cnlocation->periodCoveredb}}">
                    </div>
                </div>
                <!-- endheader -->
                <br>
                <br>
                
                <div>
                    <!--tablehearder -->
                    <div class="row"
                        style="display:flex;background-color:#F5F5F5;padding:10px;border-radius:5px;justify-content:center; text-align: center;">
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

                    <!-- 1 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>1</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    underweight children
                                    0-59 months
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within very high level of public health significance (>15%) in the
                                        year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within high level of public health significance (10 to < 15%) in
                                            the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the middle to upper limit of medium level of public health
                                        significance (7.5 to < 10% ) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the lower limit of medium public health significance (5 to
                                        < 7.5% ) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the low level of public health significance (< 5%) in the
                                            year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                Operation Timbang Report (Previous and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6a">
                            <option value="1" {{ old('rating6a', $cnlocation->rating6a) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6a', $cnlocation->rating6a) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6a', $cnlocation->rating6a) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6a', $cnlocation->rating6a) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6a', $cnlocation->rating6a) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6a" 
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6a', $cnlocation->remarks6a) }}</textarea>
                        </div>
                    </div>

                    <!-- 2 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    stunted children
                                    0-59 months
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within very high level of public health significance (>30%) in the
                                        year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within high level of public health significance (20 to < 30%) in
                                            the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the middle to upper limit of medium level of public health
                                        significance (15 to < 20%) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the lower limit of medium public health significance (10 to
                                        < 15%) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the low level of public health significance (< 10%) in the
                                            year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                Operation Timbang Report (Previous and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6b">
                            <option value="1" {{ old('rating6b', $cnlocation->rating6b) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6b', $cnlocation->rating6b) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6b', $cnlocation->rating6b) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6b', $cnlocation->rating6b) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6b', $cnlocation->rating6b) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6b"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6b', $cnlocation->remarks6b) }}</textarea>
                        </div>
                    </div>

                    <!-- 3 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>3</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    wasted children
                                    0-59 months
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within very high level of public health significance (>15%) in the
                                        year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within high level of public health significance (10 to < 15%) in
                                            the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the middle to upper limit of medium level of public health
                                        significance (7.5 to < 10%) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the lower limit of medium public health significance (5 to
                                        < 7.5%) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the low level of public health significance (< 5%) in the
                                            year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                Operation Timbang Report (Previous and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6c">
                            <option value="1" {{ old('rating6c', $cnlocation->rating6c) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6c', $cnlocation->rating6c) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6c', $cnlocation->rating6c) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6c', $cnlocation->rating6c) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6c', $cnlocation->rating6c) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6c" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6c', $cnlocation->remarks6c) }}</textarea>
                        </div>
                    </div>

                    <!-- 4 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>4</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    overweight and obese children
                                    0-59 months
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within very high level of public health significance (>15%) in the
                                        year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within high level of public health significance (10 to < 15%) in
                                            the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the middle to upper limit of medium level of public health
                                        significance (7.5 to < 10%) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the lower limit of medium public health significance (5 to
                                        < 7.5%) in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Prevalence is within the low level of public health significance (< 5%) in the
                                            year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                Operation Timbang Report (Previous and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6d">
                            <option value="1" {{ old('rating6d', $cnlocation->rating6d) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6d', $cnlocation->rating6d) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6d', $cnlocation->rating6d) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6d', $cnlocation->rating6d) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6d', $cnlocation->rating6d) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6d"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6d', $cnlocation->remarks6d) }}</textarea>
                        </div>
                    </div>

                    <!-- 5 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>5</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    wasted school children
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Increased prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        No change in prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Decreased prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Sustained decrease or prevalence maintained within medium public health
                                        significance (< 10%) from two years prior to the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Maintenance of the prevalence of malnutrition to lower than public health
                                        significance (< 5%) from two years prior to the year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                Operation Timbang Report (Previous and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6e">
                            <option value="1" {{ old('rating6e', $cnlocation->rating6e) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6e', $cnlocation->rating6e) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6e', $cnlocation->rating6e) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6e', $cnlocation->rating6e) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6e', $cnlocation->rating6e) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6e"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6e', $cnlocation->remarks6e) }}</textarea>
                        </div>
                    </div>

                    <!-- 6 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>6</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    overweight and obese school children
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Increased prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        No change in prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Decreased prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Sustained decrease or prevalence maintained within medium public health
                                        significance (< 10%) from two years prior to the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Maintenance of the prevalence of malnutrition to lower than public health
                                        significance (< 5%) from two years prior to the year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                School Weighing Report (Previous and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6f">
                            <option value="1" {{ old('rating6f', $cnlocation->rating6f) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6f', $cnlocation->rating6f) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6f', $cnlocation->rating6f) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6f', $cnlocation->rating6f) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6f', $cnlocation->rating6f) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6f"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6f', $cnlocation->remarks6f) }}</textarea>
                        </div>
                    </div>

                    <!-- 7 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>7</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Prevalence of
                                    nutritionally at-risk pregnant women
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Increased prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        No change in prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Decreased prevalence from previous year and the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Sustained decrease or prevalence maintained within medium public health
                                        significance (< 10%) from two years prior to the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Maintenance of the prevalence of malnutrition to lower than public health
                                        significance (< 5%) from two years prior to the year evaluated </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action Plan
                                Prenatal records
                                Barangay Health Station reports
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6g">
                            <option value="1" {{ old('rating6g', $cnlocation->rating6g) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6g', $cnlocation->rating6g) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6g', $cnlocation->rating6g) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6g', $cnlocation->rating6g) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6g', $cnlocation->rating6g) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6g"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6g', $cnlocation->remarks6g) }}</textarea>
                        </div>
                    </div>

                    <!-- 7 -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>8</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Operation Timbang Plus Coverage
                                </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Operation Timbang Plus coverage is < 60% in the year evaluated </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Operation Timbang Plus coverage is < 80% or>110% in the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Operation Timbang Plus coverage is at least 80% in the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Operation Timbang Plus coverage is at least 90% in the year evaluated
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Operation Timbang Plus coverage is at 100 - 110% in the year evaluated
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Barangay Nutrition Action PlanOperation Timbang
                                Report (Previous
                                and current years)
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating6h">
                            <option value="1" {{ old('rating6h', $cnlocation->rating6h) == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('rating6h', $cnlocation->rating6h) == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('rating6h', $cnlocation->rating6h) == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('rating6h', $cnlocation->rating6h) == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('rating6h', $cnlocation->rating6h) == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6h"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px">{{ old('remarks6h', $cnlocation->remarks6h) }}</textarea>
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