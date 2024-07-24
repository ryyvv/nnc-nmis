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
'namePage' => 'Nutrition Policies',
'activePage' => 'NutritionPolicies',
'activeNav' => '',
])


@section('content')

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <h4>MMELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif


        <div>
            <form action="{{ route('nutritionpolicies.store') }}" method="POST">
                @csrf

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                
                <!-- header -->
                @include('layouts.page_template.location_header')

                <br>
                <br>
                <div>
                    <!-- endtablehearder -->
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

                    <!-- 2a -->
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2a</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Adoption, implementation and monitoring of
                                    Barangay Nutrition Action Plan</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">Barangay Nutrition Action Plan
                                        formulated</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay passed a resolution adopting the
                                        Barangay Nutrition Action Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay passed a resolution adopting the
                                        Barangay Nutrition Action Plans and allocating funds thereof</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The PAPs in the Barangay Nutrition Action Plan
                                        are implemented and accomplishments are reported during BNC meetings once a
                                        year</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The PAPs in the Barangay Nutrition Action Plan
                                        are implemented and accomplishments are reported during BNC meetings at least
                                        twice a year</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Resolutions Barangay Nutrition Action Plan Approved
                                Annual Budget PPAN Accomplishment Report Minutes of meeting</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2a">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2a" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2b -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2b</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Republic Act 11037
                                    Masustansyang
                                    Pagkain Para sa
                                    Batang Pilipino</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of RA 11037
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The law was discussed in one of the Barangay
                                        Nutrition Committee
                                        meetings within one year after it was enacted </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay maintained a copy of the resolution in the barangay hall</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        implemented activities to disseminate provisions of the law to the general
                                        public</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Copy of the law
                                        Minutes of meetings
                                        Resolution
                                        Documentation of
                                        posting and/or
                                        dissemination
                                        activities</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Copy of the law Minutes of meetings Resolution
                                Documentation of posting and/or dissemination activities</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2b">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2b" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2c -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2c</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Presence of nutrition-related concerns in the
                                    Annual Investment Program</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">Republic Act 11037 Masustansyang Pagkain Para
                                        sa Batang Pilipino</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay has a
                                        resolution/ordinance/Executive Order and/or a line item in the Approved Annual
                                        Budget on EO 51 - related concerns</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay conducted activities to promote
                                        compliance to EO 51</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay conducted activities to promote
                                        and monitor compliance to EO 51 and reporting of results during BNC
                                        meetings</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">Copy of the law Resolution/ Ordinance Barangay
                                        Nutrition Action Plan Approved Annual Budget Documentation of promotion and
                                        monitoring</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Annual Investment Program</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2c">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2c" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2d -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2d</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Adoption,
                                    implementation and monitoring of national/ sectoral
                                    nutrition policies

                                    Executive Order 51: National Code of Marketing Breastmilk Substitutes, Breastmilk
                                    Supplements and Other Related Products</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of EO 51</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has a
                                        resolution/ ordinance/
                                        Executive Order and/or a line item in the Approved Annual Budget on EO 51 -
                                        related concerns</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to promote compliance to EO 51</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities
                                        to monitor
                                        compliance to EO 51</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducted activities to promote and monitor compliance to EO 51 and
                                        reporting of results during BNC meetings</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Copy of the law
                                Resolution/ Ordinance
                                Barangay Nutrition
                                Action Plan
                                Approved Annual
                                Budget
                                Documentation of
                                promotion and monitoring</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2d">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2d" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>
                    <!-- cons -->
                    <!-- 2e -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2e</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Republic Act 10028:
                                    Expanded
                                    Breastfeeding
                                    Promotion Act of
                                    2009

                                    DILG Memorandum
                                    Circular 2011-54
                                    Implementation and
                                    Monitoring of the
                                    National
                                    Breastfeeding Policy</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of RA 10028 and/or DILG MC 2011-54</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has a resolution/ ordinance and/or budget in the Approved Annual
                                        Budget on RA 10028 - related concerns</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to promote
                                        compliance to the law</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to monitor compliance to RA 10028</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducted
                                        activities to monitor
                                        compliance to RA 10028 and maintains an updated masterlist of establishments/
                                        offices with lactation stations</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Copy of the law
                                Resolution/ Ordinance
                                Barangay Nutrition
                                Action Plan
                                Approved Annual
                                Budget
                                Documentation of
                                promotion and
                                monitoring
                                Masterlist of
                                establishments/
                                offices with
                                lactation stations
                            </label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2e">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2e" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2f -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2f</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Republic Act 8172: An Act for Salt Iodization Nationwide (ASIN Law)</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of RA 8172</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has a
                                        resolution/ ordinance
                                        and/or budget in the Approved Annual Budget on RA 8172 - related
                                        concerns</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to promote compliance to the law</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to monitor compliance to RA 8172</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducted activities to monitor
                                        compliance to RA 8172 and maintains an updated masterlist of retail stores
                                        selling iodized salt</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Copy of the law
                                Resolution/ Ordinance
                                Barangay Nutrition
                                Action Plan
                                Documentation of
                                promotion and
                                monitoring
                                Masterlist of
                                retail stores selling
                                iodized salt</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2f">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2f" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2g -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2g</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    Republic Act 8976:
                                    Philippine Food
                                    Fortification Act </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of RA 8976</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has a resolution/ ordinance and/or budget in the Approved Annual
                                        Budget on RA 8976 - related concerns</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to promote compliance to the law</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted activities to monitor compliance to RA 8976</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducted
                                        activities to monitor
                                        compliance to RA 8976 and maintains an updated masterlist of retail stores
                                        selling fortified foods</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Copy of the law
                                Resolution/ Ordinance
                                Barangay Nutrition
                                Action Plan
                                Approved Annual Budget
                                Documentation of
                                promotion and
                                monitoring
                                Masterlist of
                                retail stores selling
                                fortified foods</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2g">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2g" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2h -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2h</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    NNC Governing
                                    Board Resolution
                                    No.1 series of 2017:
                                    Approving and
                                    Adopting the
                                    Philippine Plan of
                                    Action for Nutrition
                                    2017-2022

                                    DILG MC 2018-42
                                    Adoption and
                                    Implementation of
                                    PPAN 2017-2022</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution No. 1 S. 2017 and/or DILG MC 2018-42
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The activities in the
                                        Barangay Nutrition
                                        Action Plan are
                                        aligned with the
                                        priorities of the
                                        PPAN 2017-2022</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The activities in the Barangay Nutrition Action Plan are aligned with the
                                        priorities of the PPAN 2017-2022 are allocated with budget based on the approved
                                        annual budget </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The BNC monitors implementation of the PPAN priorities in the Barangay Nutrition
                                        Action Plan </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The BNC discuss the result of monitoring and identify action lines to improve
                                        implementation of the PPAN priorities </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Resolutions
                                Ordinances
                                Barangay Nutrition
                                Action Plan
                                Approved Annual
                                Budget
                                Minutes of meeting
                                Minutes of meeting
                                Accomplishment/
                                Documentation
                                reports</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2h">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2h" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2i -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2i</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    NNC Governing
                                    Board Resolutions
                                    Nos. #1 3 S.2012:
                                    Approving the
                                    Guidelines on the
                                    Fabrication,
                                    Verification, and
                                    Maintenance of
                                    Wooden Height
                                    Boards #2 3 S.2018:
                                    Approving the
                                    Guidelines on the
                                    Selection of
                                    Non-Wood Height
                                    and Length
                                    Measuring Tool</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution
                                        No. 3 S. 2012 and No. 3 S. 2018</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has any type of height and length measuring tools available in the
                                        barangay</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay uses the type of height and length measuring tools of wooden/
                                        non-wood material prescribed in the guidelines </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay uses verified height and length measuring tools of wooden/ non-wood
                                        material prescribed in the guidelines </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay uses verified height and length measuring tools of wooden/ non-wood
                                        material as prescribed in the guidelines and allocates budget for maintenance/
                                        replacement of height and length measuirng tools as necessary</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Approved Annual
                                Budget
                                Local Nutrition
                                Action Plan
                                OPT Plus Report</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2i">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2i" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>


                    <!-- 2j -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2j</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    NNC Governing
                                    Board Resolution
                                    No.2 S.2012:
                                    Approving the
                                    Revised
                                    Implementing
                                    Guidelines on
                                    OPT Plus </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The LNC maintains a printed/ electronic copy of NNC GB Resolution No. 3
                                        S.2012</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducts OPT Plus but not in accordance to the guidelines on the
                                        ff:
                                        1. Use of proper
                                        measurement tools
                                        2. At least 80% coverage
                                        3. Timely submission</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducts OPT Plus as provided in the guidelines:
                                        1. Use of proper
                                        measurement tools
                                        2. At least 80%
                                        coverage
                                        3. Timely submission</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducts OPT Plus as provided in the guidelines and uses E-OPT</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducts OPT Plus, utilizes the E-OPT tool and disseminates results
                                        during the BNC meetings </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                OPT Plus
                                Implementing
                                Guidelines
                                Barangay Nutrition
                                Action Plan
                                Consolidated OPT
                                Plus Report
                                Masterlist of
                                malnourished children
                                Minutes of meeting</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2j">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2j" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2k -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2k</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    NNC Governing
                                    Board Resolution No. 6 series of 2012: Adoption of the 2012 Nutritional Guidelines
                                    for Filipinos</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution No. 6 S. 2012 </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has a
                                        resolution, ordinance,
                                        Executive Order
                                        in support to the
                                        resolution</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        implemented at least one activity with multi-stakeholder participation to
                                        promote the NGF </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        conducted more than one activity to promote the NGF</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay conducted more than one activity to promote the NGF using more than
                                        one media/ platform </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Resolutions
                                Ordinances
                                Executive Order
                                Approved Annual
                                Budget
                                Barangay Nutrition
                                Action Plan
                                Minutes of meeting
                                Accomplishment/
                                documentation
                                report</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2k">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2k" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 2l -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>2l</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">
                                    NNC Governing
                                    Board Resolution No. 2 series of 2009: Adopting the National Policy on Nutrition
                                    Management in Emergencies and Disasters</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution
                                        No. 2 S. 2009</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay designated
                                        the lead or focal point for Nutrition-in-Emergencies</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        The barangay has issued a resolution organizing the nutrition cluster in the
                                        area</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Barangay Nutrition Cluster has been formed and planning has been initiated/
                                        completed</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                        Barangay Nutrition
                                        Cluster has been
                                        formed and integrated
                                        with the BDRRMC with allocated budget</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">
                                Resolutions
                                Ordinances
                                Executive Order
                                Barangay Nutrition
                                Action Plan
                                NIEM Plan
                                Minutes of meeting</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating2l">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks2l" placeholder="Your remarks"
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