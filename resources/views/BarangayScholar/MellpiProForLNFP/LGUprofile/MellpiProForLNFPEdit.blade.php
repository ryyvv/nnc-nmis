<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.app', [
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

                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdate', $lnfpProfile->id) }}" id="lnfp-profile-form-edit" method="POST">
                            @csrf

                            @if ($lnfpProfile)
                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro PNAO Form: Provincial Profile Formsss")}}</h5>
                            </center><br>

                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" name="action" id="action" value="">
                            
                            <!-- header -->
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Barangay:</label>
                                    <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Municipality/City:</label>
                                    <input type="text" class="form-control" name="municipal_id" value="{{auth()->user()->city_municipal }}">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Province:</label>
                                    <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}">
                                    <!-- <input type="test" class="form-control" name="region_id" value="{{auth()->user()->Region}}"> -->
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Region:</label>
                                    <input type="test" class="form-control" name="region_id" value="{{auth()->user()->Region}}">
                                </div>

                            </div>
                            <br>
                            <div style="display:flex">

                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Date of Monitoring:</label>
                                    <input type="date" class="form-control" id="dateMonitoring" name="dateMonitoring" value="{{ $lnfpProfile->dateMonitoring }}">
                                </div>
                                <div class="form-group col">
                                    <!-- <label for="exampleFormControlInput1">Period Covered From:</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        data-date-format="mm-yyyy" name="periodCovereda"> -->

                                    <label for="exampleFormControlInput1">Period Covered: </label>
                                    <select name="periodCovereda" id="exampleFormControlInput1" class="form-control">
                                        <option selected>{{ $lnfpProfile->periodCovereda }}</option>
                                        <?php
                                        $currentYear = date('Y');
                                        $startYear = 1900;
                                        $endYear = $currentYear;
                                        for ($year = $startYear; $year <= $endYear; $year++) {
                                            echo "<option value=\"$year\">$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group col">
                                    <label for="exampleFormControlInput1">Period Covered To:</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        data-date-format="mm-yyyy" name="periodCoveredb">
                                </div> -->
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">No. of Municipalities:</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="numOfMun">
                                </div>
                            </div>
                            <!-- endheader -->
                            <br>

                            <div style="display:flex">
                                <!-- Div1 -->
                                <div class="col col-4 col-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Total Population:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="totalPopulation" value="{{ $lnfpProfile->totalPopulation }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">No. of household with access to
                                            safe
                                            water:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput2" name="householdWater" value="{{ $lnfpProfile->householdWater }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">No. of household with sanitary
                                            toilets:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput3" name="householdToilets" value="{{ $lnfpProfile->householdToilets }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Day Care Centers</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="dayCareCenter" value="{{ $lnfpProfile->dayCareCenter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public elementary
                                            schools:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="elementary" value="{{ $lnfpProfile->elementary }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public secondary
                                            schools:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="secondarySchool" value="{{ $lnfpProfile->secondarySchool }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Barangay Health
                                            Stations:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="healthStations" value="{{ $lnfpProfile->healthStations }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of retail outlets/sari-sari
                                            stores:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="retailOutlets" value="{{ $lnfpProfile->retailOutlets }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of bakeries:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="bakeries" value="{{ $lnfpProfile->bakeries }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public markets:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="markets" value="{{ $lnfpProfile->markets }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of transport
                                            terminals:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="transportTerminals" value="{{ $lnfpProfile->transportTerminals }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Percent of Lactating mothers
                                            exclusively
                                            breastfeeding
                                            until
                                            the 5th month:</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="breastfeeding" value="{{ $lnfpProfile->breastfeeding }}">
                                    </div>

                                    <div style="display:flex">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">Hazard:</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="hazards" style="height:100px; border: 1px solid lightgray;border-radius:5px" value="{{ $lnfpProfile->hazards }}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">LGU/Households
                                                affected:</label>
                                            <input class="form-control" id="exampleFormControlInput1" name="affectedLGU" style="height:100px; border: 1px solid lightgray;border-radius:5px" value="{{ $lnfpProfile->affectedLGU }}">

                                        </div>
                                    </div>
                                </div>
                                <!-- div2 -->
                                <div class="col col-8 col-4">
                                    <div style="display:flex" class="row">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No. of households:</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="noHousehold" value="{{ $lnfpProfile->noHousehold }}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="noPuroks" value="{{ $lnfpProfile->noPuroks }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationA" value="{{ $lnfpProfile->populationA }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationB" value="{{ $lnfpProfile->populationB }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationC" value="{{ $lnfpProfile->populationC }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationD" value="{{ $lnfpProfile->populationD }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationE" value="{{ $lnfpProfile->populationE }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationF" value="{{ $lnfpProfile->populationF }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group" style="width:170px">
                                                <label for="exampleFormControlInput1">Actual: </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualA" value="{{ $lnfpProfile->actualA }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualB" value="{{ $lnfpProfile->actualB }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualC" value="{{ $lnfpProfile->actualC }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualD" value="{{ $lnfpProfile->actualD }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualE" value="{{ $lnfpProfile->actualE }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualF" value="{{ $lnfpProfile->actualF }}">
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
                                                <label for="exampleFormControlInput1">Year: <?php echo date("Y", strtotime("-1 year")); ?> </label>
                                            </div>
                                            <div class=" col">
                                                <label for="exampleFormControlInput1">Year: <?php echo date("Y", strtotime("-2 year")); ?></label>
                                            </div>
                                            <div class=" col">
                                                <label for="exampleFormControlInput1">Year: <?php echo date("Y", strtotime("-3 year")); ?></label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalAAA" value="{{ $lnfpProfile->psnormalAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBAA" value="{{ $lnfpProfile->psnormalBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCAA" value="{{ $lnfpProfile->psnormalCAA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Underweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightAAA" value="{{ $lnfpProfile->psunderweightAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightBAA" value="{{ $lnfpProfile->psunderweightBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightCAA" value="{{ $lnfpProfile->psunderweightCAA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Underweight:
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightAAA" value="{{ $lnfpProfile->pssevereUnderweightAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightBAA" value="{{ $lnfpProfile->pssevereUnderweightBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightCAA" value="{{ $lnfpProfile->pssevereUnderweightCAA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightAAA" value="{{ $lnfpProfile->psoverweightAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightBAA" value="{{ $lnfpProfile->psoverweightBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightCAA" value="{{ $lnfpProfile->psoverweightCAA }}">
                                            </div>
                                        </div>


                                        <!-- Obese -->
                                        <br>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalABA" value="{{ $lnfpProfile->psnormalABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBBA" value="{{ $lnfpProfile->psnormalBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCCA" value="{{ $lnfpProfile->psnormalCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedABA" value="{{ $lnfpProfile->pswastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedBBA" value="{{ $lnfpProfile->pswastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedCCA" value="{{ $lnfpProfile->pswastedCCA }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedABA" value="{{ $lnfpProfile->psseverelyWastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedBBA" value="{{ $lnfpProfile->psseverelyWastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedCCA" value="{{ $lnfpProfile->psseverelyWastedCCA }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightABA" value="{{ $lnfpProfile->psoverweightABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightBBA" value="{{ $lnfpProfile->psoverweightBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightCCA" value="{{ $lnfpProfile->psoverweightCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseABA" value="{{ $lnfpProfile->psobeseABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseBBA" value="{{ $lnfpProfile->psobeseBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseCCA" value="{{ $lnfpProfile->psobeseCCA }}">
                                            </div>
                                        </div>
                                        <br>


                                        <!-- tall -->
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalAAB" value="{{ $lnfpProfile->psnormalAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBBB" value="{{ $lnfpProfile->psnormalBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCCC" value="{{ $lnfpProfile->psnormalCCC }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Stunted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedAAB" value="{{ $lnfpProfile->psstuntedAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedBBB" value="{{ $lnfpProfile->psstuntedBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedCCC" value="{{ $lnfpProfile->psstuntedCCC }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Stunted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedAAB" value="{{ $lnfpProfile->pssevereStuntedAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedBBB" value="{{ $lnfpProfile->pssevereStuntedBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedCCC" value="{{ $lnfpProfile->pssevereStuntedCCC }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Tall: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallAAB" value="{{ $lnfpProfile->pstallAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallBBB" value="{{ $lnfpProfile->pstallBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallCCC" value="{{ $lnfpProfile->pstallCCC }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalABA" value="{{ $lnfpProfile->scnormalABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalBBA" value="{{ $lnfpProfile->scnormalBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalCCA" value="{{ $lnfpProfile->scnormalCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedABA" value="{{ $lnfpProfile->scwastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedBBA" value="{{ $lnfpProfile->scwastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedCCA" value="{{ $lnfpProfile->scwastedCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedABA" value="{{ $lnfpProfile->scseverelyWastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedBBA" value="{{ $lnfpProfile->scseverelyWastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedCCA" value="{{ $lnfpProfile->scseverelyWastedCCA }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightABA" value="{{ $lnfpProfile->scoverweightABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightBBA" value="{{ $lnfpProfile->scoverweightBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightCCA" value="{{ $lnfpProfile->scoverweightCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseABA" value="{{ $lnfpProfile->scobeseABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseBBA" value="{{ $lnfpProfile->scobeseBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseCCA" value="{{ $lnfpProfile->scobeseCCA }}">
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
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalAAA" value="{{ $lnfpProfile->pwnormalAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalBAA" value="{{ $lnfpProfile->pwnormalBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalCAA" value="{{ $lnfpProfile->pwnormalCAA }}">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Nutritionally at-risk:
                                                    </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskAAA" value="{{ $lnfpProfile->pwnutritionllyatriskAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskBAA" value="{{ $lnfpProfile->pwnutritionllyatriskBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskCAA" value="{{ $lnfpProfile->pwnutritionllyatriskCAA }}">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Overweight: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightAAA" value="{{ $lnfpProfile->pwoverweightAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightBAA" value="{{ $lnfpProfile->pwoverweightBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightCAA" value="{{ $lnfpProfile->pwoverweightCAA }}">
                                                </div>
                                            </div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Obese: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseAAA" value="{{ $lnfpProfile->pwobeseAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseBAA" value="{{ $lnfpProfile->pwobeseBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseCAA" value="{{ $lnfpProfile->pwobeseCAA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="newNutritionScholar" value="{{ $lnfpProfile->newBrgyScholar }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="oldNutritionScholar" value="{{ $lnfpProfile->oldBrgyScholar }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaResidential" value="{{ $lnfpProfile->landAreaResidential }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksResidential" value="{{ $lnfpProfile->remarksResidential }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Commercial: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaCommercial" value="{{ $lnfpProfile->landAreaCommercial }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksCommercial" value="{{ $lnfpProfile->remarksCommercial }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Industrial: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaIndustrial" value="{{ $lnfpProfile->landAreaIndustrial }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksIndustrial" value="{{ $lnfpProfile->remarksIndustrial }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Agricultural: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaAgricultural" value="{{ $lnfpProfile->landAreaAgricultural }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksAgricultural" value="{{ $lnfpProfile->remarksAgricultural }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Forest Land, Mineral Land,
                                                    National Park:
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaFLMLNP" value="{{ $lnfpProfile->landAreaFLMLNP }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textArea" class="form-control" id="exampleFormControlInput1" name="remarksFLMLNP" value="{{ $lnfpProfile->remarksFLMLNP }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                <!-- <button type="submit" class="btn btn-warning ">Save as draft</button> -->
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                    Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Submit
                                </button>

                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
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
                <button type="submit" id="lnfplgu-submit-with-id" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
                <button type="submit" id="lnfplgu-draft-with-id" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection