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
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdate', $row->id) }}" id="lnfp-profile-form-edit" method="POST">
                            @csrf

                            @if ($row)
                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro PNAO Form: Provincial Profile Forms")}}</h5>
                            </center><br>

                            @include('layouts.page_template.location_header')

                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" name="action" id="action" value="">

                            <!-- header -->
                            <!-- <div style="display:flex">
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Barangay:<span style="color:red">*</span> </label>
                                    <input type="text" class="form-control" name="barangay_id" placeholder="ex. 100" value="{{Auth()->user()->barangay}}">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Municipality/City:<span style="color:red">*</span> </label>
                                    <input type="text" class="form-control" name="municipal_id" placeholder="ex. 100" value="{{auth()->user()->city_municipal }}">
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Province:<span style="color:red">*</span> </label>
                                    <input type="text" class="form-control" name="province_id" placeholder="ex. 100" value="{{auth()->user()->Province}}">
                                    
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Region:<span style="color:red">*</span> </label>
                                    <input type="test" class="form-control" name="region_id" placeholder="ex. 100" value="{{auth()->user()->Region}}">
                                </div>

                            </div> -->
                            <br>
                            

                            <div style="display:flex">
                                <!-- Div1 -->
                                <div class="col col-4 col-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Municipalities:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="numOfMun">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Total Population:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="totalPopulation" placeholder="ex. 100" value="{{ $row->totalPopulation }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">No. of household with access to
                                            safe
                                            water:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput2" name="householdWater" placeholder="ex. 100" value="{{ $row->householdWater }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">No. of household with sanitary
                                            toilets:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput3" name="householdToilets" placeholder="ex. 100" value="{{ $row->householdToilets }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Day Care Centers:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="dayCareCenter" placeholder="ex. 100" value="{{ $row->dayCareCenter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public elementary
                                            schools:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="elementary" placeholder="ex. 100" value="{{ $row->elementary }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public secondary
                                            schools:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="secondarySchool" placeholder="ex. 100" value="{{ $row->secondarySchool }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Barangay Health
                                            Stations:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="healthStations" placeholder="ex. 100" value="{{ $row->healthStations }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of retail outlets/sari-sari
                                            stores:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="retailOutlets" placeholder="ex. 100" value="{{ $row->retailOutlets }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of bakeries:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="bakeries" placeholder="ex. 100" value="{{ $row->bakeries }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public markets:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="markets" placeholder="ex. 100" value="{{ $row->markets }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of transport
                                            terminals:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="transportTerminals" placeholder="ex. 100" value="{{ $row->transportTerminals }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Percent of Lactating mothers
                                            exclusively
                                            breastfeeding
                                            until
                                            the 5th month:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="breastfeeding" placeholder="ex. 100" value="{{ $row->breastfeeding }}">
                                    </div>

                                    <div style="display:flex">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">Hazard:<span style="color:red">*</span> </label>
                                            <input class="form-control" id="exampleFormControlInput1" name="hazards" style="height:100px; border: 1px solid lightgray;border-radius:5px" placeholder="ex. 100" value="{{ $row->hazards }}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">LGU/Households
                                                affected:<span style="color:red">*</span> </label>
                                            <input class="form-control" id="exampleFormControlInput1" name="affectedLGU" style="height:100px; border: 1px solid lightgray;border-radius:5px" placeholder="ex. 100" value="{{ $row->affectedLGU }}">

                                        </div>
                                    </div>
                                </div>
                                <!-- div2 -->
                                <div class="col col-8 col-4">
                                    <div style="display:flex" class="row">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No. of households:<span style="color:red">*</span> </label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="noHousehold" placeholder="ex. 100" value="{{ $row->noHousehold }}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:<span style="color:red">*</span> </label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="noPuroks" placeholder="ex. 100" value="{{ $row->noPuroks }}">
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
                                                <label for="exampleFormControlInput1">Estimated:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationA" placeholder="ex. 100" value="{{ $row->populationA }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationB" placeholder="ex. 100" value="{{ $row->populationB }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationC" placeholder="ex. 100" value="{{ $row->populationC }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationD" placeholder="ex. 100" value="{{ $row->populationD }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationE" placeholder="ex. 100" value="{{ $row->populationE }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationF" placeholder="ex. 100" value="{{ $row->populationF }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group" style="width:170px">
                                                <label for="exampleFormControlInput1">Actual:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualA" placeholder="ex. 100" value="{{ $row->actualA }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualB" placeholder="ex. 100" value="{{ $row->actualB }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualC" placeholder="ex. 100" value="{{ $row->actualC }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualD" placeholder="ex. 100" value="{{ $row->actualD }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualE" placeholder="ex. 100" value="{{ $row->actualE }}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualF" placeholder="ex. 100" value="{{ $row->actualF }}">
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
                                                Yr: <label for="exampleFormControlInput1" id="currentBYearMinus2"> </label>
                                            </div>
                                            <div class=" col">
                                                Yr: <label for="exampleFormControlInput1" id="currentBYearMinus1"> </label>
                                            </div>
                                            <div class=" col">
                                                Yr: <label for="exampleFormControlInput1" id="currentBYear"> </label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalAAA" placeholder="ex. 100" value="{{ $row->psnormalAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBAA" placeholder="ex. 100" value="{{ $row->psnormalBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCAA" placeholder="ex. 100" value="{{ $row->psnormalCAA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Underweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightAAA" placeholder="ex. 100" value="{{ $row->psunderweightAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightBAA" placeholder="ex. 100" value="{{ $row->psunderweightBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightCAA" placeholder="ex. 100" value="{{ $row->psunderweightCAA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Underweight:<span style="color:red">*</span>
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightAAA" placeholder="ex. 100" value="{{ $row->pssevereUnderweightAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightBAA" placeholder="ex. 100" value="{{ $row->pssevereUnderweightBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightCAA" placeholder="ex. 100" value="{{ $row->pssevereUnderweightCAA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightAAA" placeholder="ex. 100" value="{{ $row->psoverweightAAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightBAA" placeholder="ex. 100" value="{{ $row->psoverweightBAA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightCAA" placeholder="ex. 100" value="{{ $row->psoverweightCAA }}">
                                            </div>
                                        </div>


                                        <!-- Obese -->
                                        <br>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalABA" placeholder="ex. 100" value="{{ $row->psnormalABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBBA" placeholder="ex. 100" value="{{ $row->psnormalBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCCA" placeholder="ex. 100" value="{{ $row->psnormalCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedABA" placeholder="ex. 100" value="{{ $row->pswastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedBBA" placeholder="ex. 100" value="{{ $row->pswastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedCCA" placeholder="ex. 100" value="{{ $row->pswastedCCA }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedABA" placeholder="ex. 100" value="{{ $row->psseverelyWastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedBBA" placeholder="ex. 100" value="{{ $row->psseverelyWastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedCCA" placeholder="ex. 100" value="{{ $row->psseverelyWastedCCA }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightABA" placeholder="ex. 100" value="{{ $row->psoverweightABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightBBA" placeholder="ex. 100" value="{{ $row->psoverweightBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightCCA" placeholder="ex. 100" value="{{ $row->psoverweightCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseABA" placeholder="ex. 100" value="{{ $row->psobeseABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseBBA" placeholder="ex. 100" value="{{ $row->psobeseBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseCCA" placeholder="ex. 100" value="{{ $row->psobeseCCA }}">
                                            </div>
                                        </div>
                                        <br>


                                        <!-- tall -->
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalAAB" placeholder="ex. 100" value="{{ $row->psnormalAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBBB" placeholder="ex. 100" value="{{ $row->psnormalBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCCC" placeholder="ex. 100" value="{{ $row->psnormalCCC }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Stunted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedAAB" placeholder="ex. 100" value="{{ $row->psstuntedAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedBBB" placeholder="ex. 100" value="{{ $row->psstuntedBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedCCC" placeholder="ex. 100" value="{{ $row->psstuntedCCC }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Stunted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedAAB" placeholder="ex. 100" value="{{ $row->pssevereStuntedAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedBBB" placeholder="ex. 100" value="{{ $row->pssevereStuntedBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedCCC" placeholder="ex. 100" value="{{ $row->pssevereStuntedCCC }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Tall:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallAAB" placeholder="ex. 100" value="{{ $row->pstallAAB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallBBB" placeholder="ex. 100" value="{{ $row->pstallBBB }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallCCC" placeholder="ex. 100" value="{{ $row->pstallCCC }}">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <label><b>Nutrition Status of School Children:</b></label>
                                    <div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalABA" placeholder="ex. 100" value="{{ $row->scnormalABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalBBA" placeholder="ex. 100" value="{{ $row->scnormalBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalCCA" placeholder="ex. 100" value="{{ $row->scnormalCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedABA" placeholder="ex. 100" value="{{ $row->scwastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedBBA" placeholder="ex. 100" value="{{ $row->scwastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedCCA" placeholder="ex. 100" value="{{ $row->scwastedCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedABA" placeholder="ex. 100" value="{{ $row->scseverelyWastedABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedBBA" placeholder="ex. 100" value="{{ $row->scseverelyWastedBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedCCA" placeholder="ex. 100" value="{{ $row->scseverelyWastedCCA }}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightABA" placeholder="ex. 100" value="{{ $row->scoverweightABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightBBA" placeholder="ex. 100" value="{{ $row->scoverweightBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightCCA" placeholder="ex. 100" value="{{ $row->scoverweightCCA }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseABA" placeholder="ex. 100" value="{{ $row->scobeseABA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseBBA" placeholder="ex. 100" value="{{ $row->scobeseBBA }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseCCA" placeholder="ex. 100" value="{{ $row->scobeseCCA }}">
                                            </div>
                                        </div>

                                        <br>
                                        <br>
                                        <label><b>Nutrition Status of Pregnant Woman:</b></label>
                                        <div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalAAA" placeholder="ex. 100" value="{{ $row->pwnormalAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalBAA" placeholder="ex. 100" value="{{ $row->pwnormalBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalCAA" placeholder="ex. 100" value="{{ $row->pwnormalCAA }}">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Nutritionally at-risk:<span style="color:red">*</span>
                                                    </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskAAA" placeholder="ex. 100" value="{{ $row->pwnutritionllyatriskAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskBAA" placeholder="ex. 100" value="{{ $row->pwnutritionllyatriskBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskCAA" placeholder="ex. 100" value="{{ $row->pwnutritionllyatriskCAA }}">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightAAA" placeholder="ex. 100" value="{{ $row->pwoverweightAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightBAA" placeholder="ex. 100" value="{{ $row->pwoverweightBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightCAA" placeholder="ex. 100" value="{{ $row->pwoverweightCAA }}">
                                                </div>
                                            </div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span> </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseAAA" placeholder="ex. 100" value="{{ $row->pwobeseAAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseBAA" placeholder="ex. 100" value="{{ $row->pwobeseBAA }}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseCAA" placeholder="ex. 100" value="{{ $row->pwobeseCAA }}">
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
                                                <label for="exampleFormControlInput1">Total No.:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="newNutritionScholar" placeholder="ex. 100" value="{{ $row->newBrgyScholar }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="oldNutritionScholar" placeholder="ex. 100" value="{{ $row->oldBrgyScholar }}">
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
                                                <label for="exampleFormControlInput1">Land Area</label>
                                            </div>
                                            <div class="form-group col">
                                                <label for="exampleFormControlInput1">Remarks</label>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Residential:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaResidential" placeholder="ex. 100" value="{{ $row->landAreaResidential }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksResidential" placeholder="ex. 100" value="{{ $row->remarksResidential }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Commercial:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaCommercial" placeholder="ex. 100" value="{{ $row->landAreaCommercial }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksCommercial" placeholder="ex. 100" value="{{ $row->remarksCommercial }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Industrial:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaIndustrial" placeholder="ex. 100" value="{{ $row->landAreaIndustrial }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksIndustrial" placeholder="ex. 100" value="{{ $row->remarksIndustrial }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Agricultural:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaAgricultural" placeholder="ex. 100" value="{{ $row->landAreaAgricultural }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksAgricultural" placeholder="ex. 100" value="{{ $row->remarksAgricultural }}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Forest Land, Mineral Land,
                                                    National Park:<span style="color:red">*</span>
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaFLMLNP" placeholder="ex. 100" value="{{ $row->landAreaFLMLNP }}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textArea" class="form-control" id="exampleFormControlInput1" name="remarksFLMLNP" placeholder="ex. 100" value="{{ $row->remarksFLMLNP }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if ($row->status != 1)
                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                <!-- <button type="submit" class="btn btn-warning ">Save as draft</button> -->
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                    Save as Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Save and Submit
                                </button>

                            </div>
                            @endif
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