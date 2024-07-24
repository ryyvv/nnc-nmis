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
'namePage' => 'change Nutrition Status',
'activePage' => 'changeNS',
'activeNav' => '',
])


@section('content')

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <h4><b>MELLPI Pro FORM B 2a: CHANGES IN THE NUTRITIONAL STATUS IN THE BARANGAY</b></h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6a" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6b"  
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6c" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6d" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6e" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6f" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6g" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks6h" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
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