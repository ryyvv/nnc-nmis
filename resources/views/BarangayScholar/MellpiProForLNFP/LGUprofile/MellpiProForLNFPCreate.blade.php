<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.BSapp', [
'class' => 'sidebar-mini ',
'namePage' => 'LGU Profile LNFP',
'activePage' => 'LGUPROFILELNFP',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; align-items:center;">
                        <a href="{{route('BSLGUprofileLNFPIndex.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <!-- <h4>MELLPI PRO FOR LNFP FORM :</h4> -->
                    </div>
                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif

                    <div>
                        <form action="#">
                            @csrf
                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro PNAO Form: Provincial Profile Form")}}</h5>
                            </center><br>

                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="dateCreated" value="05/19/2024">
                            <input type="hidden" name="dateUpdates" value="05/19/2024">
                            <!-- header -->
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Barangay:</label>
                                    <input type="text" class="form-control" name="barangay_id"
                                        value="{{Auth()->user()->barangay}}">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Municipality/City:</label>
                                    <input type="text" class="form-control" name="municipal_id"
                                        value="{{auth()->user()->city_municipal }}">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Province:</label>
                                    <input type="text" class="form-control" name="province_id"
                                        value="{{auth()->user()->Province}}">
                                    <input type="hidden" class="form-control" name="region_id"
                                        value="{{auth()->user()->Region}}">
                                </div>

                            </div>
                            <br>
                            <div style="display:flex">

                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Date of Monitoring:</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        name="dateMonitoring">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Period Covered From:</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        data-date-format="mm-yyyy" name="periodCovereda">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Period Covered To:</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        data-date-format="mm-yyyy" name="periodCoveredb">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">No. of Municipalities:</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        name="numOfMun">
                                </div>
                            </div>
                            <!-- endheader -->
                            <br>

                            <div style="display:flex">
                                <!-- Div1 -->
                                <div class="col col-4 col-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Total Population:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="totalPopulation">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">No. of household with access to
                                            safe
                                            water:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput2"
                                            name="householdWater">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">No. of household with sanitary
                                            toilets:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput3"
                                            name="householdToilets">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Day Care Centers</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="dayCareCenter">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public elementary
                                            schools:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="elementary">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public secondary
                                            schools:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="secondarySchool">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Barangay Health
                                            Stations:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="healthStations">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of retail outlets/sari-sari
                                            stores:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="retailOutlets">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of bakeries:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="bakeries">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public markets:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="markets">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of transport
                                            terminals:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="transportTerminals">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Percent of Lactating mothers
                                            exclusively
                                            breastfeeding
                                            until
                                            the 5th month:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            name="breastfeeding">
                                    </div>

                                    <div style="display:flex">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">Hazard:</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="hazards"
                                                style="height:100px; border: 1px solid lightgray;border-radius:5px">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">LGU/Households
                                                affected:</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="affectedLGU"
                                                style="height:100px; border: 1px solid lightgray;border-radius:5px">

                                        </div>
                                    </div>
                                </div>
                                <!-- div2 -->
                                <div class="col col-8 col-4">
                                    <div style="display:flex" class="row">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No. of households:</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="noHousehold">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                                name="noPuroks">
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <div class="row" style="display:flex">
                                            <div class="col ">
                                                <label for="exampleFormControlInput1"><b>Population</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>6-11mons</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>6-23mons</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>12-59mons</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>0-59mons</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>Pregnant</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>Lactating</b></label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group" style="width:170px">
                                                <label for="exampleFormControlInput1">Estimated: </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                                    name="populationA">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                                    name="populationB">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                                    name="populationC">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                                    name="populationD">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                                    name="populationE">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                                    name="populationF">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group" style="width:170px">
                                                <label for="exampleFormControlInput1">Actual: </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="actualA">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="actualB">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="actualC">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="actualD">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="actualE">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="actualF">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <label><b>Nutrition Status of Preschool Children:</b></label>
                                    <div>
                                        <div style="display:flex" class="row">
                                            <div class="  col">
                                                <label for="exampleFormControlInput1"></label>
                                            </div>
                                            <div class=" col">
                                                <label for="exampleFormControlInput1">Year: <?php echo date("Y",strtotime("-1 year")); ?> </label>
                                            </div>
                                            <div class=" col">
                                                <label for="exampleFormControlInput1">Year: <?php echo date("Y",strtotime("-2 year")); ?></label>
                                            </div>
                                            <div class=" col">
                                                <label for="exampleFormControlInput1">Year: <?php echo date("Y",strtotime("-3 year")); ?></label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalAAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalBAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalCAA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Underweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psunderweightAAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psunderweightBAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psunderweightCAA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Underweight:
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pssevereUnderweightAAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pssevereUnderweightBAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pssevereUnderweightCAA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psoverweightAAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psoverweightBAA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psoverweightCAA">
                                            </div>
                                        </div>


                                        <!-- Obese -->
                                        <br>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalCCA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pswastedABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pswastedBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pswastedCCA">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psseverelyWastedABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psseverelyWastedBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psseverelyWastedCCA">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psoverweightABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psoverweightBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psoverweightCCA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psobeseABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psobeseBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psobeseCCA">
                                            </div>
                                        </div>
                                        <br>


                                        <!-- tall -->
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalAAB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalBBB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psnormalCCC">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Stunted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psstuntedAAB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psstuntedBBB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="psstuntedCCC">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Stunted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pssevereStuntedAAB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pssevereStuntedBBB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pssevereStuntedCCC">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Tall: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pstallAAB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pstallBBB">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="pstallCCC">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <label><b>Nutrition Status of School Children:</b></label>
                                    <div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scnormalABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scnormalBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scnormalCCA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scwastedABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scwastedBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scwastedCCA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scseverelyWastedABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scseverelyWastedBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scseverelyWastedCCA">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scoverweightABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scoverweightBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scoverweightCCA">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scobeseABA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scobeseBBA">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="scobeseCCA">
                                            </div>
                                        </div>

                                        <br>
                                        <br>
                                        <label><b>Nutrition Status of Pregnant Woman:</b></label>
                                        <div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Normal: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwnormalAAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwnormalBAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwnormalCAA">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Nutritionally at-risk:
                                                    </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwnutritionllyatriskAAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwnutritionllyatriskBAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwnutritionllyatriskCAA">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Overweight: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwoverweightAAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwoverweightBAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwoverweightCAA">
                                                </div>
                                            </div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Obese: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwobeseAAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwobeseBAA">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="pwobeseCAA">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div>
                                        <div style="display:flex">
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1"><b>Barangay Nutrition Scholars</b></label>
                                            </div>
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1">New</label>
                                            </div>
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1">Old</label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Total No.: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="newNutritionScholar">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="oldNutritionScholar">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div>
                                        <div style="display:flex">
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1"><b>Land use Classification</b></label>
                                            </div>
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1">land Area</label>
                                            </div>
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1">Remarks</label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Residential: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="newNutritionScholar">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control"
                                                    id="exampleFormControlInput1" name="oldNutritionScholar">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Commercial: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="landAreaCommercial">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control"
                                                    id="exampleFormControlInput1" name="remarksCommercial">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Industrial: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="landAreaIndustrial">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control"
                                                    id="exampleFormControlInput1" name="remarksIndustrial">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Agricultural: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="landAreaAgricultural">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control"
                                                    id="exampleFormControlInput1" name="remarksAgricultural">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Forest Land, Mineral Land,
                                                    National Park:
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control"
                                                    id="exampleFormControlInput1" name="landAreaFLMLNP">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textArea" class="form-control"
                                                    id="exampleFormControlInput1" name="remarksFLMLNP">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDraft">
                                    Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSubmit">
                                    Submit
                                </button>
                                <!-- <button type="submit" name="action" value="submit" class="btn btn-primary">Submit</button> -->
                            </div>
                            <!-- Modal Submit -->
                            <div class="modal fade" id="exampleModalSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure want to submit?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lgu-draft" class="btn btn-primary" name="action" value="submit">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Draft -->
                            <div class="modal fade" id="exampleModalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <button type="submit" id="lgu-draft" class="btn btn-primary" name="action" value="draft">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection