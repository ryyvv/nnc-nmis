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
        <div style="display:flex;align-items:center">
            <a href="{{ route('BSLGUprofile.index') }}" class="btn btn-primary">Back</a>
            <p style="margin-bottom:0px;margin-left:25px; font-weight:900;font-size:25px">MELLPI PRO FORM B: BARANGAY PROFILE SHEET</p>
        </div>
        
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form action="{{route('BSLGUprofile.update', $lguProfile->id)}}"  method="POST">
            @csrf
            @method('PUT')

                <input type="hidden" name="status" value="{{ old('status', $lguProfile->status) }}" >
                <input type="hidden" name="dateCreated" value="{{ old('dateCreated', $lguProfile->dateCreated) }}">
                <input type="hidden" name="dateUpdates" value="{{ old('dateUpdates', $lguProfile->dateUpdates) }}" >
                <!-- header -->
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <input type="text" class="form-control" name="barangay_id" value="{{ old('dateUpdates',Auth()->user()->barangay) }}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <input type="text" class="form-control" name="municipal_id"
                            value="{{ auth()->user()->city_municipal }}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>
                        <input type="text" class="form-control" name="province_id"   value="{{ auth()->user()->Province }}" >
                        <input type="hidden" class="form-control" name="region_id"  value="{{ auth()->user()->Region }}">
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Date of Monitoring:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dateMonitoring" value="{{$lguProfile->dateMonitoring}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCovereda"  value="{{$lguProfile->periodCovereda}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCoveredb" value="{{$lguProfile->periodCovereda}}">
                    </div>
                </div>
                <!-- endheader -->
                <br>

                <div style="display:flex">
                    <!-- Div1 -->
                    <div class="col col-4 col-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Total Population:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                name="totalPopulation" value="{{$lguProfile->totalPopulation}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">No. of household with access to safe
                                water:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" name="householdWater" value="{{$lguProfile->totalPopulation}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput3">No. of household with sanitary toilets:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3"
                                name="householdToilets" value="{{$lguProfile->householdToilets}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of Day Care Centers</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="dayCareCenter" value="{{$lguProfile->dayCareCenter}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of public elementary schools:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="elementary" value="{{$lguProfile->elementary}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of public secondary schools:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                name="secondarySchool" value="{{$lguProfile->secondarySchool}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of Barangay Health Stations:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="healthStations"  value="{{$lguProfile->healthStations}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of retail outlets/sari-sari stores:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="retailOutlets"  value="{{$lguProfile->retailOutlets}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of bakeries:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="bakeries"  value="{{$lguProfile->bakeries}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of public markets:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="markets"  value="{{$lguProfile->markets}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. of transport terminals:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                name="transportTerminals"  value="{{$lguProfile->transportTerminals}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Percent of Lactating mothers exclusively
                                breastfeeding
                                until
                                the 5th month:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="breastfeeding"  value="{{$lguProfile->breastfeeding}}">
                        </div>

                        <div style="display:flex">
                            <div class="form-group col">
                                <label for="exampleFormControlInput1">Hazard:</label>
                                <input class="form-control" id="exampleFormControlInput1" name="hazards"
                                    style="height:100px; border: 1px solid lightgray;border-radius:5px"  value="{{$lguProfile->hazards}}">
                            </div>
                            <div class="form-group col">
                                <label for="exampleFormControlInput1">LGU/Households affected:</label>
                                <input class="form-control" id="exampleFormControlInput1" name="affectedLGU"
                                    style="height:100px; border: 1px solid lightgray;border-radius:5px"  value="{{$lguProfile->affectedLGU}}">
                              
                            </div>
                        </div>
                    </div>
                    <!-- div2 -->
                    <div class="col col-8 col-4">
                        <div style="display:flex" class="row">
                            <div class="form-group col">
                                <label for="exampleFormControlInput1">No. of households:</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="noHousehold"  value="{{$lguProfile->healthStations}}">
                            </div>
                            <div class="form-group col">
                                <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="noPuroks"  value="{{$lguProfile->noPuroks}}">
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
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="populationA"  value="{{$lguProfile->populationA}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="populationB"  value="{{$lguProfile->populationB}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="populationC"  value="{{$lguProfile->populationC}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="populationD"  value="{{$lguProfile->populationD}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="populationE"  value="{{$lguProfile->populationE}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="populationF"  value="{{$lguProfile->populationF}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group" style="width:170px">
                                    <label for="exampleFormControlInput1">Actual: </label>
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="actualA"  value="{{$lguProfile->actualA}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="actualB"  value="{{$lguProfile->actualB}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="actualC"  value="{{$lguProfile->actualC}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="actualD"  value="{{$lguProfile->actualD}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="actualE"  value="{{$lguProfile->actualE}}">
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="actualF"  value="{{$lguProfile->actualF}}">
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
                                    <label for="exampleFormControlInput1">Yr: </label>
                                </div>
                                <div class=" col">
                                    <label for="exampleFormControlInput1">Yr: </label>
                                </div>
                                <div class=" col">
                                    <label for="exampleFormControlInput1">Yr: </label>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalAAA"  value="{{$lguProfile->psnormalAAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalBAA"  value="{{$lguProfile->psnormalBAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalCAA"  value="{{$lguProfile->psnormalCAA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Underweight: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psunderweightAAA"  value="{{$lguProfile->psunderweightAAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psunderweightBAA"  value="{{$lguProfile->psunderweightBAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psunderweightCAA"  value="{{$lguProfile->psunderweightCAA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Underweight: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pssevereUnderweightAAA"  value="{{$lguProfile->pssevereUnderweightAAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pssevereUnderweightBAA"  value="{{$lguProfile->pssevereUnderweightBAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pssevereUnderweightCAA"  value="{{$lguProfile->pssevereUnderweightCAA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Overweight: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psoverweightAAA"  value="{{$lguProfile->psoverweightAAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psoverweightBAA"  value="{{$lguProfile->psoverweightBAA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psoverweightCAA"  value="{{$lguProfile->psoverweightCAA}}">
                                </div>
                            </div>


                            <!-- Obese -->
                            <br>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalABA"  value="{{$lguProfile->psnormalABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalBBA"  value="{{$lguProfile->psnormalBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalCCA"  value="{{$lguProfile->psnormalCCA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Wasted: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pswastedABA"  value="{{$lguProfile->pswastedABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pswastedBBA"  value="{{$lguProfile->pswastedBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pswastedCCA"  value="{{$lguProfile->pswastedCCA}}">
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Wasted: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psseverelyWastedABA"  value="{{$lguProfile->psseverelyWastedABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psseverelyWastedBBA"  value="{{$lguProfile->psseverelyWastedBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psseverelyWastedCCA"  value="{{$lguProfile->psseverelyWastedCCA}}">
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Overweight: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psoverweightABA"  value="{{$lguProfile->psoverweightABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psoverweightBBA"  value="{{$lguProfile->psoverweightBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psoverweightCCA"  value="{{$lguProfile->psoverweightCCA}}"> 
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Obese: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psobeseABA"  value="{{$lguProfile->psobeseABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psobeseBBA"  value="{{$lguProfile->psobeseBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psobeseCCA"  value="{{$lguProfile->psobeseCCA}}">
                                </div>
                            </div>
                            <br>


                            <!-- tall -->
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalAAB"  value="{{$lguProfile->psnormalAAB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalBBB"  value="{{$lguProfile->psnormalBBB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psnormalCCC"  value="{{$lguProfile->psnormalCCC}}">
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Stunted: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psstuntedAAB"  value="{{$lguProfile->psstuntedAAB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psstuntedBBB"  value="{{$lguProfile->psstuntedBBB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="psstuntedCCC"  value="{{$lguProfile->psstuntedCCC}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Stunted: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pssevereStuntedAAB"  value="{{$lguProfile->pssevereStuntedAAB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pssevereStuntedBBB"  value="{{$lguProfile->pssevereStuntedBBB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pssevereStuntedCCC"  value="{{$lguProfile->pssevereStuntedCCC}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Tall: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pstallAAB"  value="{{$lguProfile->pstallAAB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pstallBBB"  value="{{$lguProfile->pstallBBB}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="pstallCCC"  value="{{$lguProfile->pstallCCC}}">
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
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scnormalABA"  value="{{$lguProfile->scnormalABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scnormalBBA"  value="{{$lguProfile->scnormalBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scnormalCCA"  value="{{$lguProfile->scnormalCCA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Wasted: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scwastedABA"  value="{{$lguProfile->scwastedABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scwastedBBA"  value="{{$lguProfile->scwastedBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scwastedCCA"  value="{{$lguProfile->scwastedCCA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Wasted: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scseverelyWastedABA"  value="{{$lguProfile->scseverelyWastedABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scseverelyWastedBBA"  value="{{$lguProfile->scseverelyWastedBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scseverelyWastedCCA"  value="{{$lguProfile->scseverelyWastedCCA}}">
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Overweight: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scoverweightABA"  value="{{$lguProfile->scoverweightABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scoverweightBBA"  value="{{$lguProfile->scoverweightBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scoverweightCCA"  value="{{$lguProfile->scoverweightCCA}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Obese: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scobeseABA"  value="{{$lguProfile->scobeseABA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scobeseBBA"  value="{{$lguProfile->scobeseBBA}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="scobeseCCA"  value="{{$lguProfile->scobeseCCA}}">
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
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwnormalAAA"  value="{{$lguProfile->pwnormalAAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwnormalBAA"  value="{{$lguProfile->pwnormalBAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwnormalCAA"  value="{{$lguProfile->pwnormalCAA}}">
                                    </div>
                                </div>
                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Nutritionally at-risk: </label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwnutritionllyatriskAAA"  value="{{$lguProfile->pwnutritionllyatriskAAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwnutritionllyatriskBAA"  value="{{$lguProfile->pwnutritionllyatriskBAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwnutritionllyatriskCAA"  value="{{$lguProfile->pwnutritionllyatriskCAA}}">
                                    </div>
                                </div>
                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Overweight: </label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwoverweightAAA"  value="{{$lguProfile->pwoverweightAAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwoverweightBAA"  value="{{$lguProfile->pwoverweightBAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwoverweightCAA"  value="{{$lguProfile->pwoverweightCAA}}">
                                    </div>
                                </div>

                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Obese: </label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwobeseAAA"  value="{{$lguProfile->pwobeseAAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwobeseBAA"  value="{{$lguProfile->pwobeseBAA}}">
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                            name="pwobeseCAA"  value="{{$lguProfile->pwobeseCAA}}">
                                    </div>
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
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="landAreaResidential"  value="{{$lguProfile->landAreaResidential}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="remarksResidential"  value="{{$lguProfile->remarksResidential}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Commercial: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="landAreaCommercial"  value="{{$lguProfile->landAreaCommercial}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="remarksCommercial"  value="{{$lguProfile->remarksCommercial}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Industrial: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="landAreaIndustrial"  value="{{$lguProfile->landAreaIndustrial}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="remarksIndustrial"  value="{{$lguProfile->remarksIndustrial}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Agricultural: </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="landAreaAgricultural"  value="{{$lguProfile->landAreaAgricultural}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="remarksAgricultural"  value="{{$lguProfile->remarksAgricultural}}">
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Forest Land, Mineral Land, National Park:
                                    </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                        name="landAreaFLMLNP"  value="{{$lguProfile->landAreaFLMLNP}}">
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textArea" class="form-control" id="exampleFormControlInput1"
                                        name="remarksFLMLNP"  value="{{$lguProfile->remarksFLMLNP}}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <br>
                <br>
                <label><b>INTERVENTION WITH ACTION LINES FROM NGA/NEW STANDARDS:</b></label>
                <div>
                    <div style="display:flex">
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>Intervention</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Type</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Source</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Available Received</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Date Received</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Volume No. of Pax</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Remarks</label>
                        </div>
                    </div>
                    <!-- I. -->
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">I. Philippine Integrated Managements of Acute
                                Malnutrition</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Training</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="Isource"  value="{{$lguProfile->Isource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="Iavailreceived"  value="{{$lguProfile->Iavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="Idatereceived"  value="{{$lguProfile->Idatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Ivolumepax"  value="{{$lguProfile->Ivolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="Iremarks"  value="{{$lguProfile->Iremarks}}">
                        </div>
                    </div>
                    <!-- II. -->
                    <br>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">II. National Dietary Supplementation
                                Program</label>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">


                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">1. Pregnant Women</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Dietary Supplementation</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIAsource"  value="{{$lguProfile->IIAsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIAavailreceived"  value="{{$lguProfile->IIAavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIAdatereceived"  value="{{$lguProfile->IIAdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIAvolumepax"  value="{{$lguProfile->IIAvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIAremarks"  value="{{$lguProfile->IIAremarks}}">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">2. Children 6-23 months</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Dietary Supplementation</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIBsource"  value="{{$lguProfile->IIBsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIBavailreceived"  value="{{$lguProfile->IIBavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIBdatereceived"  value="{{$lguProfile->IIBdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIBvolumepax"  value="{{$lguProfile->IIBvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIBremarks"  value="{{$lguProfile->IIBremarks}}">
                        </div>
                    </div>
                    <!-- III. -->
                    <br>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">III. Micronutrient Supplementation</label>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">


                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">1. Iron-folic Acid Supplementation for
                                Pregnant Women</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIAsource"  value="{{$lguProfile->IIIAsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIAavailreceived"  value="{{$lguProfile->IIIAavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIIAdatereceived"  value="{{$lguProfile->IIIAdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIAvolumepax"  value="{{$lguProfile->IIIAvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIAremarks"  value="{{$lguProfile->IIIAremarks}}">
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">2. Vitamin A Supplementation for children 6-11
                                months</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIBsource"  value="{{$lguProfile->IIIBsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIBavailreceived"  value="{{$lguProfile->IIIBavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIIBdatereceived"  value="{{$lguProfile->IIIBdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIBvolumepax"  value="{{$lguProfile->IIIBvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIBremarks"  value="{{$lguProfile->IIIBremarks}}">
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">3. Vitamin A Supplementation for children
                                12-59 months</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIICsource"  value="{{$lguProfile->IIICsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIICavailreceived"  value="{{$lguProfile->IIICavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIICdatereceived"  value="{{$lguProfile->IIICdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIICvolumepax"  value="{{$lguProfile->IIICvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIICremarks"  value="{{$lguProfile->IIICremarks}}">
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">4. Micronutrient Powder for children 6-23
                                months</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIDsource"  value="{{$lguProfile->IIIDsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIDavailreceived"  value="{{$lguProfile->IIIDavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIIDdatereceived"  value="{{$lguProfile->IIIDdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIDvolumepax"  value="{{$lguProfile->IIIDvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIDremarks"  value="{{$lguProfile->IIIDremarks}}">
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">5. Weekly Iron-Folic Acic Supplementation for
                                female adolescents in public schools</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIEsource"  value="{{$lguProfile->IIIEsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIEavailreceived"  value="{{$lguProfile->IIIEavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIIEdatereceived"  value="{{$lguProfile->IIIEdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIEvolumepax"  value="{{$lguProfile->IIIEvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIEremarks"  value="{{$lguProfile->IIIEremarks}}">
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">6. Weekly Iron-Folic Acic Supplementation for
                                female adolescents in outside the public schools</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIFsource"  value="{{$lguProfile->IIIFsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIFavailreceived"  value="{{$lguProfile->IIIFavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IIIFdatereceived"  value="{{$lguProfile->IIIFdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIFvolumepax"  value="{{$lguProfile->IIIFvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIFremarks"  value="{{$lguProfile->IIIFremarks}}">
                        </div>
                    </div>

                    <!-- IV. -->
                    <br>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">IV. Mandatory Food Fortification</label>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">


                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">1. Retail outlets selling adequately iodized
                                salt</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Dropdown</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IVAsource"  value="{{$lguProfile->IVAsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IVAavailreceived"  value="{{$lguProfile->IVAavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                                name="IVAdatereceived"  value="{{$lguProfile->IVAdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IVAvolumepax"  value="{{$lguProfile->IVAvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="IVAremarks"  value="{{$lguProfile->IVAremarks}}">
                        </div>
                    </div>

                    <!-- V. -->
                    <br>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">V. Nuitrition-in-Emergencies</label>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col">


                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">1. NIEM Plan integrated in the local Disaster
                                Risk Reduction Management Plan</label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Training</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="VAsource"  value="{{$lguProfile->VAsource}}">
                                <option value="NGA">NGA</option>
                                <option value="LGU">LGU</option>
                                <option value="NGO">NGO</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="VAavailreceived"  value="{{$lguProfile->VAavailreceived}}">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="VAdatereceived"  value="{{$lguProfile->VAdatereceived}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="VAvolumepax"  value="{{$lguProfile->VAvolumepax}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="VAremarks"  value="{{$lguProfile->VAremarks}}">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection