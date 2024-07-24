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
'namePage' => 'Governance',
'activePage' => 'Governance',
'activeNav' => '',
])

@section('content')

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <h4>MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form action="{{ route('governance.store') }}" method="POST">
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

                    <!-- 3a -->
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>3a</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Presence of Barangay Nutrition Committee (BNC)</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">The BNC is organized but membership is limited to 1 to 2 sectors only </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The BNC is organized but does not include all nutrition-related sectors as applicable in the barangay (pursuant to PPAN IG S.1981 and EO 234 S.1987)
                                            <br>        
                                            1. Barangay Captain
                                            <br>
                                            2. Kagawad on Health
                                            <br>
                                            3. Rural Health Midwife
                                            <br>
                                            4. Child Development Worker
                                            <br>
                                            5. School Principal/ Teacher
                                            <br>
                                            6. Agriculture Technician (if existing)
                                            <br>
                                            7. Barangay Secretary
                                            </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The BNC is organized with the Barangay Captain as chairperson and is composed of all nutrition-related sectors in level 2 as applicable in the barangay </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                    The BNC is organized with the Barangay Captain as chairperson, composed of nutrition-related sectors in level 2 as applicable in the barangay and external partners, is supported by a  resolution indicating the functions of each member and reorganized as necessary </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                       Barangay Nutrition
                                            Action Plan
                                            Resolutions
                                            Executive Order 
                                            Organizational
                                            Chart</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Barangay Nutrition Action Plan Minutes of Meeting
                                Documentation of dissemination</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating3a">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks3a" placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <!-- 3b -->
                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>3b</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Presence of Nutrition
Office and Personnel</label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay has designated a Barangay Nutrition Scholar </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay designated a BNS and allocated budget for monthly honorarium </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay designated a BNS with monthly honorarium, budget for supplies and designated a BNS desk </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay designated a BNS with monthly honorarium, budget for supplies and designated a BNS corner/ office </label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The barangay designated a BNS with monthly honorarium, budget for supplies, designated a BNS corner/ office and is assisted by Barangay Health Workers or other bgy personnel in the conduct of OPT Plus or other activities</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Resolution Executive Order Barangay Nutrition Action Plan Organizational Chart Approved Annual Budget</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating3b">
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <textarea type="text" name="remarks3b"  placeholder="Your remarks"
                                style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="row" style="display:flex">
                        <div style="display:flex" class="col-2 justify-content-center">
                            <div>
                                <label for="exampleFormControlInput1"><b>3c</b></label>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1">Decision-making and Leadership of the Barangay Nutrition Committee </label>
                            </div>
                        </div>
                        <div class="col" style="padding:0px!important">
                            <div style="display:flex" style="justify-content:center!important">
                                <div class="col">
                                    <label for="exampleFormControlInput1">The BNC is convened only once for the conduct of one nutrition-related activity</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The BNC is convened more than once to disseminate nutrition-related information</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">The BNC are convened at least twice to:
                                        <br>
                                         1. Disseminate nutrition-related information
                                         <br>
                                         2. Formulate the Barangay Nutrition Action Plan</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                    The BNC
                                    are convened at
                                    least three times to
                                    accomplish
                                    activities in level three and discuss implementation of activities</label>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlInput1">
                                    The BNC are
                                    convened at least four times to accomplish activites in level 4 and discuss progress of implementation of the Barangay Nutrition Action Plan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1" style="padding:0px!important">
                            <label for="exampleFormControlInput1">Minutes of meeting
                                Barangay Nutrition
                                Action Plan
                                Accomplishment
                                Report</label>
                        </div>
                        <div class="col-1">
                            <select id="loadProvince1" class="form-control" name="rating3c"> 
                                <option>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-1">
                        <textarea type="text" name="remarks3c"  placeholder="Your remarks"
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