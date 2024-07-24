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
'namePage' => 'Nutrition Service',
'activePage' => 'nutritionservice',
'activeNav' => '',
])


@section('content')

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <h4>MELLPI PRO FORM B: BARANGAY PROFILE SHEET</h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form action="{{ route('nutritionservice.store') }}" method="POST">
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
                    <!-- tablehearder -->
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

                    <!-- 5a-----51a -->
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label for="exampleFormControlInput1"><b>5a
                                    </b></label></div>
                            <div class="col-11" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Infant and Young Child Feeding</b>
                                    <br>Community-based health and nutrition support strengthening
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            1. Functional
                                            breastfeeding
                                            support group</label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Breastfeeding support group established in the barangay with written
                                            agreement of its establishment and directory of members </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Breastfeeding
                                            support group
                                            oriented on Infant
                                            and Young Child
                                            Feeding and Milk Code and provided guidance in the conduct of peer
                                            counselling and referral </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Breastfeeding
                                            support group
                                            conducted
                                            activities such as
                                            peer counseling,
                                            sharing of
                                            experience and
                                            assistance in
                                            breastfeeding and
                                            complementary
                                            feeding for
                                            pregnant and
                                            lactating mothers</label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Breastfeeding
                                            support group
                                            conducted
                                            activities in Level 3 and maintains a list of lactating mothers
                                            and status of breastfeeding and/or complementary feeding includin
                                            information on those with breastfeeding or complementary feeding challenge
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Breastfeeding
                                            support group
                                            conducted activities
                                            and maintains a list of lactating mothers and status of breastfeeding
                                            and/or complementary feeding and conducts follow through activities until
                                            the lactating mother have ransitioned from exclusive breastfeeding to
                                            continued breastfeeding with complementary feeding
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Written agreement on
                                    estbalishment of
                                    Breastfeeding Support
                                    Group
                                    Directory of members
                                    Documentation of activities
                                    Masterlist of lactating
                                    mothers with breastfeeding
                                    and complementary
                                    feeding status
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5aa">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5aa" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 51b -->
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Establishment of breastfeeding places in barangay facilities</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            2. Lactation stations
                                            established in
                                            barangay facilities
                                            such as Barangay
                                            Health Stations,
                                            multi-purpose hall and in public schools </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay has one lactation station but not maintained </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay has one lactation station accessible to the public and
                                            well-maintained
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay has one lactation station accessible to the public,
                                            well-maintained and has accessible handwashing facility, comfortable seats
                                            and proper ventilation
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay has one lactation station as described in level 3 and maintains
                                            a logbook of users
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay has more than one lactation station as described in level 3 and
                                            maintains a logbook of users
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    (By ocular
                                    inspection)
                                    Documentation
                                    report
                                    Lactation station logbook
                                    of users
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ab">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ab" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 51c -->
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Promotion of compliance to the Milk Code</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            3. Activities
                                            conducted to
                                            promote compliance
                                            to Executive Order
                                            51, Milk Code
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay have Milk Code materials posted in the Barangay Health Station
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The Barangay
                                            Health Station is
                                            compliant to the
                                            Milk Code
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The Barangay Health Station includes the Milk Code in its Infant and Young
                                            Child Feeding classes for pregnant and lactating mothers
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The Barangay
                                            issued a
                                            resolution in
                                            support of the Milk Code including regular inspection of Barangay Health
                                            Station/s
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Members of the
                                            Barangay Nutrition
                                            Committee conduct
                                            inspection in the
                                            Barangay Health
                                            Stations at least
                                            twice a year to
                                            ensure compliance of
                                            health workers and clients in the public health facility
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Milk code materials
                                    Ocular inspection of the
                                    Barangay Health Station
                                    IYCF classes learning
                                    materials
                                    Resolution
                                    Documentation Report
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ac">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ac" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!--5b----- 52a -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5b</b></label></div>
                            <div class="col-11" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Philippine Integrated Management of Acute Malnutrition</b>
                                    <br>Provision of services for Severe Acute Malnutrition (SAM) and Moderate Acute
                                    Malnutrition (MAM)
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            4. Referral of
                                            severely and
                                            moderately acute
                                            malnourished
                                            children to Barangay Health Stations and/or Rural Health Units
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The LGU only
                                            maintains a
                                            master list of
                                            children with
                                            severe and
                                            moderate acute
                                            malnutrition
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts active case finding of SAM and MAM cases
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts
                                            active case finding
                                            of SAM and MAM
                                            cases and refers
                                            cases to the
                                            appropriate facility
                                            for PIMAM
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts
                                            active case finding
                                            of SAM and MAM
                                            cases, refers cases to the appropriate
                                            facility for PIMAM and monitors the
                                            progress of the SAM and MAM cases
                                            enrolled but not reported monthly
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts
                                            active case finding
                                            of SAM and MAM
                                            cases, refers cases to the
                                            appropriate facility for PIMAM
                                            and monitors the progress of the
                                            SAM and MAM cases enrolled and reports monthly
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Masterlist of
                                    children with SAM
                                    Referral forms
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5b">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5b" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!--5c----- 52a -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5c</b></label></div>
                            <div class="col-11" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>National Dietary Supplementation Program</b>
                                    <br>Dietary supplementation of pregnant women
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            5. Nutritionally-at-
                                            risk pregnant women enrolled/covered in
                                            the dietary supplementation program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            monitors the
                                            nutritional status of all pregnant women
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary
                                            supplementation program and covers less than 90% of the target pregnant
                                            women for 90 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary supplementation program and covers at least 90% of the target
                                            pregnant women for 90 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary supplementation program and covers more than 90% of the target
                                            pregnant women for 90 days days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary
                                            supplementation
                                            program and covers 100% of the target pregnant women for 90 days
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Accomplishment/
                                    Documentation reports
                                    NDSP Reports
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ca">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ca" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 5c 52b -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Dietary supplementation of infants and young children 6-23 months</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            6. Infants and young children 6-23 months old enrolled in the dietary
                                            supplementation program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            monitors the
                                            nutritional status of all infants and young children 6-23 months
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/ coordinates the dietary supplementation program and covers less
                                            than 90% of all infants and young children 6-23 months for 90 - 120 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary
                                            supplementation program and covers at least 90% of all infants and young
                                            children 6-23 months for 90 - 120 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary
                                            supplementation program and covers more than 90% of all infants and young
                                            children 6-23 months for 90 - 120 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            implements/
                                            coordinates the
                                            dietary
                                            supplementation program and covers more than 100% of all infants and young
                                            children 6-23 months for 90 - 120 days
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Accomplishment/
                                    documentation
                                    report
                                    Masterlist of
                                    children 6-23
                                    months
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5cb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5cb" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 5c 52c -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Dietary supplementation of children in child development centers and supervised
                                        neighborhood play</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            7. Children in child
                                            development centers and supervised neighborhood play provided with dietary
                                            supplementation
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Child Development
                                            Worker (CDW)
                                            provides updates on the Supplementary Feeding in Day Care Centers and
                                            Supervised Neighborhood Play during the Barangay Nutrition Committee
                                            meeting/s
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            CDW shares
                                            consolidated data to the Barangay Nutrition Committee and used for the
                                            preparation of the nutrition situation in the area
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC uses the data on the nutritional status of children in child development
                                            centers and supervised neighborhood play for the identification of PAPs for
                                            preschool-age children in the local nutrition action plan to complement the
                                            supplementary feeding program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC implements
                                            the PAPs and
                                            monitors the
                                            progress in
                                            improving the
                                            nutritional status of
                                            children in child
                                            development
                                            centers and
                                            supervised
                                            neighborhood play
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC assesses the
                                            effectiveness and
                                            efficiency of the PAPs formulated to complement the supplementary feeding
                                            program in child development centers and supervised neighborhood play and
                                            provides recommendations to improve implementation of PAPs
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Minutes of meeting
                                    Nutrition Situation
                                    Local Nutrition Action Plan
                                    Supplementary Feeding
                                    Report
                                    Plan Implementation
                                    Report
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5cc">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5cc" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 5c 52d -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Dietary supplementation of wasted school children</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            8. Support to the
                                            School-based Feeding
                                            Program (SBFP)
                                            targeting children
                                            from Kinder to Grade VI who are wasted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay Nutrition
                                            Committee
                                            member from
                                            DepED provides
                                            updates on the
                                            School-based
                                            Feeding Program
                                            during the Barangay
                                            Nutrition
                                            Committee meeting
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC member from DepED shares consolidated data to the Barangay Nutrition
                                            Committee and used for the preparation of the nutrition situation in the
                                            area
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The progress of
                                            implementation is shared by the school and discussed by the BNC to identify
                                            areas where BNC can provide assistance
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            provides
                                            assistance as
                                            agreed with the school
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The barangay
                                            utilizes the data
                                            shared in the assessment and formulation of activities in the BNAP for
                                            school age children
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    School-based feeding
                                    program report
                                    Documentation report
                                    Minutes of BNC meeting
                                    Barangay Nutrition Action
                                    Plan
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5cd">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5cd" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!--5d----- 52a -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5d</b></label></div>
                            <div class="col-11" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>National Nutrition Promotion Program for Behavior Change</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            9. Nutrition
                                            promotion activities for behavior change conducted for population groups
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Nutrition
                                            promotion
                                            activities targeting
                                            children conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Nutrition
                                            promotion
                                            activities targeting
                                            children and adolescents conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Nutrition
                                            promotion
                                            activities targeting
                                            children and adolescents and pregnant and lactating women conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Nutrition
                                            promotion
                                            activities targeting
                                            children and adolescents, pregnant and lactating women and senior citizens
                                            and PWDs conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Nutrition
                                            promotion
                                            activities targeting
                                            children and adolescents, pregnant and lactating women, senior citizens and
                                            PWDs and other population groups/ sectors conducted
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Documentation reports
                                    IEC materials
                                    Sectoral accomplishments
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5da">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5da" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            10. Nutrition
                                            promotion for
                                            behavior change
                                            activities for the
                                            public conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Activities in celebration of the National Nutrition Month and conducted by
                                            the barangay with participation from at least one sector
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Activities in celebration of National Nutrition Month conducted by the LGU
                                            with participation of at least two sectors
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Activities in celebration of National Nutrition Month conducted by the
                                            barangay with participation of at least three sectors
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Activities in celebration of National Nutrition Month and to promote the
                                            Nutritional Guidelines for Filipinos conducted by the barangay with
                                            participation of at least three sectors
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Activities in celebration of National Nutrition Month and to promote the
                                            Nutritional Guidelines for Filipinos conducted by the barangay with
                                            participation of more than three sectors
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Documentation reports
                                    IEC materials
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5db">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5db" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- 5e 52d -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5e</b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Micronutrient Supplementation</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 11 -->
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            11. Pregnant women provided with iron-folic acid
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid was prescribed to pregnant women but not provided
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Pregnant women were provided with iron-folic acid covering less than 90% of
                                            the target
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Pregnant women
                                            were provided with iron-folic acid covering at least 90% of the target for
                                            180 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Pregnant women
                                            were provided with iron-folic acid covering more than 90% of the target for
                                            180 days
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Pregnant women were provided with iron-folic acid covering 100% of the
                                            target for 180 days
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    FHSIS Report
                                    Masterlist of pregnant
                                    mothers who received
                                    iron-folic acid
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ea">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ea" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>


                        <!-- 12 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            12. Vitamin A
                                            provided to children 6-11 months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Vitamin A was
                                            prescribed to
                                            children 6-11
                                            months but not
                                            provided
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            One dose of
                                            vitamin A provided to less than 90% of children 6-11 months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            One dose of
                                            vitamin A provided to at least 90% of children 6-11 months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            One dose of
                                            vitamin A provided to at least 90% of children 6-11 months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            One dose of vitamin A provided to 100% of children 6-11 months old
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    FHSIS Report
                                    Masterlist of children 6-11 months who received Vitamin A
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5eb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5eb" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>


                        <!-- 13 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            13. Vitamin A
                                            capsules provided to children 12-59 months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Vitamin A was prescribed to
                                            children 12-59 months old but not provided
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Two doses of vitamin A provided to less than 90% of children 12-59 months
                                            old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Two doses of
                                            vitamin A provided
                                            to at least 90% of
                                            children 12-59
                                            months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Two doses of
                                            vitamin A provided
                                            more than 90% of
                                            children 12-59
                                            months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Two doses of vitamin A provided 100% of children 12-59 months old
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    FHSIS Report
                                    Masterlist of children 12-59 months who received Vitamin A
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ec">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ec" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 14 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            14. Micronutrient
                                            powder provided to young children 6-23 months old
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Micronutrient
                                            powder was
                                            prescribed to young children 6-23 months old but not provided
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Micronutrient
                                            powder provided to young children 6-23 months old but covers less than 90%
                                            of the target
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Micronutrient powder provided to young children 6-23 months old and covers
                                            at least 90% of the target
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Micronutrient
                                            powder provided to young children 6-23 months old and covers more than 90%
                                            of the target
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Micronutrient
                                            powder provided to young children 6-23 months old and covers 100% of the
                                            target
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    FHSIS Report
                                    Masterlist of children 6-23 months who received MNP
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ed">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ed" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 15 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            15. Weekly provision
                                            of iron-folic acid
                                            tablets to adolescent female learners in public schools through Weekly Iron
                                            Folic Acid (WIFA) Supplementation Program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets prescribed
                                            to adolescent
                                            female learners in public schools but not provided
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid tablets provided weekly to less than 100% of adolescent
                                            female learner in public schools with parents consent
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets provided
                                            weekly to 100% of adolescent female learners in public schools with parents
                                            consent for two cycles
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets provided
                                            weekly to 100% of adolescent female learners in public schools with parents
                                            consent for two cycles and information on the benefits of WIFA disseminated
                                            among parents
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid tablets provided weekly to 100% of adolescent female
                                            learners in public schools for two cycles with parents' consent, information
                                            on the benefits of WIFA disseminated among parents and updates shared to
                                            Barangay Nutrition Committee
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    School-based Weekly Iron Folic Acid Supplementation Report
                                    Minutes of meeting
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ee">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ee" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 16 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            16. Weekly Iron Folic Acid (WIFA) provided to adolescent females in Grade 7
                                            to 10 from private schools, out-of-school adolescent females and women aged
                                            10-49 years not covered by WIFA in public schools
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid tablets prescribed to adolescent females outside the public
                                            school system but not provided
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets provided
                                            weekly to less than 90% of adolescent females outside the public school
                                            through Barangay Health Stations
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets provided
                                            weekly to at least 90% of adolescent females outside the public school
                                            through Barangay Health Stations
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets provided
                                            weekly to more than 90% of adolescent females outside the public school
                                            through Barangay Health Stations
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Iron-folic acid
                                            tablets provided
                                            weekly to 100% of adolescent females outside the public school through
                                            Barangay Health Stations
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    FHSIS Report
                                    Masterlist of adolescents who received WIFA from Barangay Health Station
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ef">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ef" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 5f -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5f</b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Mandatory Food Fortification</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 17 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            17. Retail outlets
                                            selling iodized salt
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The LGU monitors retail outlets selling table salt
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 90% of
                                            retail outlets selling iodized salt
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 90% of the retail outlets selling iodized salt
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 90% of the retail stores selling adequately iodized salt
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            More than 90% of
                                            retail stores selling adequately iodized salt
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Master list of retail outlets selling iodized salt
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5fa">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5fa" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 18 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            18. Bakery owners
                                            using vitamin A
                                            fortified flour
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The LGU monitors the type of flour bakeries use
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 90% of
                                            the bakery owners are using vitamin A fortified flour in baked products
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 90% of the bakery owners are using vitamin A fortified flour in
                                            baked products
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            More than 90% of
                                            bakery owners are using vitamin A fortified flour in baked products
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            100% of bakery
                                            owners are using
                                            vitamin A fortified
                                            flour in baked
                                            products
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Master list of bakeries using fortified flour
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5fb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5fb" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 19 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            19. Retail stores selling vitamin A fortified cooking oil
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            The LGU monitors retail stores selling cooking oil
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 90% of
                                            the retail stores
                                            selling vitamin A
                                            fortified cooking oil
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 90% of
                                            the retail stores
                                            selling vitamin A
                                            fortified cooking oil
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            More than 90% of
                                            the retail stores
                                            selling vitamin A
                                            fortified cooking oil
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            100% of the retail
                                            stores selling vitamin A fortified cooking oil
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Master list of markets selling vitamin A fortified cooking oil
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5fc">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5fc" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>


                    <!-- 5g -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5g</b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Nutrition in Emergencies Program</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 20 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            20. NiEm Plan
                                            integration in the
                                            DRRM-H plan and
                                            Local DRRM Plan
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            NiEm activities
                                            identified but not
                                            integrated in the
                                            Barangay Nutrition Action Plan
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            NiEm activities
                                            identified and
                                            integrated to the
                                            Barangay Nutrition Action Plan but not integrated to the Barangay DRRMC
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            NiEm activities
                                            identified and
                                            integrated to the
                                            Barangay Nutrition Action Plan and
                                            Barangay DRRMC
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            NiEm activities
                                            identified and
                                            integrated to the
                                            Barangay Nutrition Action Plan and
                                            Barangay DRRMC
                                            are implemented
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            NiEm activities
                                            identified and
                                            integrated to the
                                            Barangay Nutrition
                                            Action Plan and
                                            Barangay DRRMC
                                            are implemented
                                            and reviewed
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Barangay DRRMC
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ga">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ga" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 5h -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5h</b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Overweight and Obesity Management and Prevention Program</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 21 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            21. Activities
                                            promoting healthy
                                            diets and active
                                            lifestyle for
                                            preschool children
                                            conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination on
                                            Pinggang Pinoy and active lifestyle for preschool children conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination and other activities conducted to promote Pinggang Pinoy and
                                            active lifestyle
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination,
                                            distribution of IEC materials and other activities to promote Pinggang Pinoy
                                            and active lifestyle implemented and covered at least 50% of preschool
                                            children
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination,
                                            distribution of IEC materials and conduct of other activities to promote
                                            Pinggang Pinoy and active lifestyle implemented and covered more than 50% of
                                            preschool children
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            In addition to the
                                            parameters in Level
                                            4, the LGU
                                            formulated policies in support of promotion of healthy diets and active
                                            lifestyle and maintains safe and open spaces and play areas for children
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Documentation report
                                    IEC materials
                                    Resolution
                                    Ocular inspection of safe, open spaces and play areas for children
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ha">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ha" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 22 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            22. Activities
                                            promoting proper
                                            diet and healthy
                                            lifestyle for the
                                            general public
                                            conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination on
                                            Pinggan Pinoy and healthy lifestyle for the general public conducted
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination and other activities conducted to promote Pinggang Pinoy and
                                            active lifestyle
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Information
                                            dissemination,
                                            distribution of IEC materials and other activities conducted to promote
                                            Pinggang Pinoy and active lifestyle
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            In addition to the
                                            parameters in Level 3, promotion of proper diet and healthy lifestyle is
                                            supported by a policy
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            In addition to the
                                            parameters in Level
                                            4, the LGU maintains safe open indoor/ outdoor spaces for physical
                                            activities
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Documentation report
                                    IEC materials
                                    Resolution
                                    Ocular inspection of safe spaces for indoor/outdoor physical activities
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5hb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5hb" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 5i -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b>5i</b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>Nutrition-Sensitive Programs</b>
                                    <br>NS Programs to increase income and improve economic access to food
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 23 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            23. Eligible
                                            households with
                                            nutritionally
                                            vulnerable or
                                            affected provided
                                            with seed capital/ material
                                            assistance for
                                            livelihood
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 30% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of seed capital/
                                            material assistance
                                            for livelihood
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of seed capital/ material assistance for
                                            livelihood
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of seed capital/ material assistance
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of seed capital/ material assistance and
                                            market-linkages
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            More than 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in
                                            the provision of
                                            seed capital/
                                            material assistance
                                            and
                                            market-linkages
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Accomplishment/
                                    documentation report
                                    Master list of beneficiaries
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ia">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ia" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 24 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            24. Eligible
                                            households with
                                            nutritionally
                                            vulnerable or
                                            affected provided
                                            with livelihood
                                            training
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 30% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of livelihood training
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Less than 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of livelihood training
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of livelihood training
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            At least 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in the provision of livelihood training and
                                            industry-linkages
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            More than 50% of
                                            eligible households
                                            with nutritionally
                                            vulnerable or
                                            affected included in
                                            the provision of
                                            livelihood training and industry-linkages
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Accomplishment/
                                    documentation report
                                    Master list of beneficiaries
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ib">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ib" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>




                    </div>

                    <!-- 5c 52d -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>NS Programs to improve physical access to food</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 25 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            25. Gulayan sa
                                            Paaralan established and maintained in school
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Member of the
                                            Barangay Nutrition
                                            Committee from
                                            DepED provides
                                            updates on the
                                            Gulayan sa
                                            Paaralan Project
                                            during BNC
                                            meeting/s
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC member from
                                            DepED shares data to the local nutrition committee and used in the
                                            preparation of the nutrition situation
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC uses the
                                            data in
                                            identification of
                                            PAPs in the
                                            barangay nutrition
                                            action plan to
                                            complement the
                                            Gulayan sa
                                            Paaralan Project
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC implements
                                            the PAPs in the
                                            barangay nutrition
                                            action plan
                                            complementing the Gulayan sa Paaralan Project
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC conducts data
                                            monitoring of the
                                            status of the Gulayan sa Paaralan and determines possible assistance from
                                            the BNC if necessary
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Minutes of meeting
                                    Nutrition Situation
                                    Local Nutrition Action Plan
                                    Documentation Reporteficiaries
                                    Monitoring report
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ic">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ic" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 26 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            26. Households with nutritionally
                                            vulnerable or
                                            affected provided
                                            with inputs for
                                            backyard vegetable
                                            gardening
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay provides technical assistance to households in establishing
                                            backyard vegetable gardens
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay provides
                                            technical assistance and inputs for establishing a backyard vegetable garden
                                            to less than 80% of households with nutritionally vulnerable or affected
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay provides
                                            technical assistance and inputs for establishing a backyard vegetable garden
                                            to at least 80% of households with nutritionally vulnerable or affected
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay provides
                                            technical assistance and inputs for establishing a backyard vegetable garden
                                            to more than 80% of households with nutritionally vulnerable or affected
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay provides
                                            technical assistance, inputs for the backyard vegetable garden and conducts
                                            monitoring of the status of the gardens at least twice a year
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Documentation Report
                                    Master list of beneficiaries
                                    Monitoring report
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5id">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5id" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 27-29 -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>NS Programs to improve access to safe drinking water and sanitary toilet
                                        facilities</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 27 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            27. Households have access to safe drinking water
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts data monitoring of the number of households with access to
                                            safe drinking water
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that less than 90%
                                            of households
                                            have access to
                                            safe drinking water
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that at least 90%
                                            of households
                                            have access to
                                            safe drinking water
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that more than 90%
                                            of households
                                            have access to
                                            safe drinking water
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that 100%
                                            of households
                                            have access to
                                            safe drinking water
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Documentation report
                                    Monitoring report
                                    OPT Plus Family Profile
                                    Masterlist of households with access to safe drinking water
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ie">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ie" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 28 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            28. Households have access to sanitary toilet facilities
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts data monitoring of
                                            the number of households with access to sanitary
                                            toilet facilities
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that less than 90% of households have access to
                                            sanitary toilet
                                            facilities
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that at least 90% of households have access to
                                            sanitary toilet
                                            facilities
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that more than 90% of households have access to
                                            sanitary toilet
                                            facilities
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay ensures
                                            that 100% of households have access to
                                            sanitary toilet
                                            facilities
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition ActionPlan
                                    Documentation report
                                    Monitoring report
                                    OPT Plus Family Profile
                                    Masterlist of households with access to safe drinking water
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5if">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5if" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>

                        <!-- 29 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            29. Schools provided
                                            with access to safe
                                            water, adequate
                                            toilets, handwashing
                                            facilities through the
                                            WASH in Schools
                                            (WinS) program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Member of the
                                            Barangay Nutrition
                                            Committee from
                                            DepED provides
                                            updates on the
                                            WASH in Schools
                                            Program during
                                            BNC meeting/s
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Member of the
                                            Barangay Nutrition
                                            Committee from
                                            DepED shares data to the BNC and used in the preparation of the nutrition
                                            situation
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC uses the data
                                            in identification of PAPs in the Barangay Nutrition Action Plan to
                                            complement the WASH in Schools Program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC conducts data monitoring of the access to safe drinking water, access to
                                            functional toilets and access to handwashing facilities in relation to the
                                            nutritional status of school children
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            BNC conducts
                                            data monitoring of
                                            WASH in Schools
                                            and determines
                                            possible assistance
                                            from the BNC if
                                            necessary
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Minutes of meeting
                                    Nutrition Situation
                                    Barangay Nutrition Action Plan
                                    Monitoring Report
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ig">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ig" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 30 -->
                    <br>
                    <div class="row" style="display:flex">
                        <!-- Top -->
                        <div class="row-12" style="display:flex;">
                            <div class="col" style="padding-right:15px"><label
                                    for="exampleFormControlInput1"><b></b></label></div>
                            <div class="col-12" style="padding-left:0px">
                                <label for="exampleFormControlInput1">
                                    <b>NS Programs to prevent teen-age pregnancy</b>
                                </label>
                            </div>
                        </div>
                        <!-- endTop -->

                        <!-- 30 -->
                        <br>
                        <div class="row" style="display:flex; margin-top:10px">
                            <div class="col" style="padding:0px!important">
                                <div style="display:flex" style="justify-content:center!important">
                                    <div class="col" style="margin-left:45px">
                                        <label for="exampleFormControlInput1">
                                            30. Reproductive
                                            health programs for adolescents implemented
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts data monitoring of teenage pregnancies
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts data monitoring on teenage pregnancies and assists in the
                                            provision of services for adolescents (e.g. counseling)
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            Barangay conducts data monitoring, assists in provision of services for
                                            adolescents and conducts information dissemination activities on
                                            reproductive health among adolescents
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            In addition to the
                                            parameters in Level 3, the barangay also provides policy support for the
                                            Adolescent Health Development Program
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1">
                                            In addition to the
                                            parameters in Level
                                            4, the barangay also mobilized the Sangunianng Kabataan in cooperation with
                                            the Barangay Health Station to lead the activities for the Adolescent Health
                                            Development Program


                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="padding:0px!important">
                                <label for="exampleFormControlInput1">
                                    Barangay Nutrition Action Plan
                                    Monitoring Report
                                    Documentation Report
                                    Resolution
                                </label>
                            </div>
                            <div class=" col-1 ">
                                <select id="loadProvince1" class="form-control" name="rating5ih">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col col-1   ">
                                <textarea type="text" name="remarks5ih" placeholder="Your remarks"
                                    style="background-color:#F5F5F5;border:0px;font-size:12px;width:inherit;max-height:120px;height:120px"></textarea>
                            </div>
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