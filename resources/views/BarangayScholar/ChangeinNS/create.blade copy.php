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
                  <td>1a</td>
                  <td>Presence and knowledge of vision mission statement</td>
                  <td>A vision mission statement for nutrition was formulated but not reflected in the Barangay Nutrition Action Plan</td>
                  <td>A vision mission statement for nutrition was formulated and reflected in the Barangay Nutrition Action Plan</td>
                  <td>The vision mission statement for nutrition program exists and disseminated to BNC members</td>
                  <td>The vision mission statement for nutrition program exists and disseminated to BNC members and other stakeholders</td>
                  <td>The vision mission statement for nutrition program exists and to BNC members, stakeholders and to the rest of the community</td>
                  <td> Barangay Nutrition Action Plan Minutes of Meeting Documentation of dissemination</td>
                  <td> <select id="loadProvince1" class="form-control" name="rating1a">
                      <option>Select</option>
                      <option value="1" {{ old('rating1a') == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating1a') == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating1a') == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating1a') == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating1a') == '5' ? 'selected' : '' }}>5</option>
                    </select></td>
                  <td><textarea class="form-control" name="remarks1a">{{ old('remarks1a') }}</textarea></td>
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
                  <td><select id="loadProvince1" class="form-control" name="rating1b">
                      <option>Select</option>
                      <option value="1" {{ old('rating1b') == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating1b') == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating1b') == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating1b') == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating1b') == '5' ? 'selected' : '' }}>5</option>
                    </select></td>
                  <td>
                    <textarea class="form-control" name="remarks1b"> {{ old('remarks1b') }}</textarea>
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
                    <select id="loadProvince1" class="form-control" name="rating1c">
                      <option>Select</option>
                      <option value="1" {{ old('rating1c') == '1' ? 'selected' : '' }}>1</option>
                      <option value="2" {{ old('rating1c') == '2' ? 'selected' : '' }}>2</option>
                      <option value="3" {{ old('rating1c') == '3' ? 'selected' : '' }}>3</option>
                      <option value="4" {{ old('rating1c') == '4' ? 'selected' : '' }}>4</option>
                      <option value="5" {{ old('rating1c') == '5' ? 'selected' : '' }}>5</option>
                    </select>
                  </td>
                  <td>
                    <textarea class="form-control" name="remarks1c">{{ old('remarks1c') }}</textarea>
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