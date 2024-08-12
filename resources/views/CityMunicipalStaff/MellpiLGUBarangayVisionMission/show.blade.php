<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
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
'namePage' => 'Mellpi Pro for LGU Profile',
'activePage' => 'LGUPROFILE',
'activeNav' => '',
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">

            <div class="d-flex justify-content-end center" style="padding-right:20px; ">
                <form action="{{route('BSLGUprofile.download',$lguProfile->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="htmlContent" id="htmlContent">
                    <button type="submit" id="hiddenButton" style="display: none;"></button>
                </form>
                <div style="display:absolute;" onclick="downloadPDF('{{$lguProfile->id}}')">
                    <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i>
                    <label class="download">Download file</label>
                </div>
            </div>

            <div id="downloadable">
                    <div style="display:flex;align-items:center">
                        <a href="#">
                            <h5 class="title" style="margin:0px">FORM B: BARANGAY PROFILE SHEET</h5>
                        </a>
                    </div>

                    <div style="margin-right:15px">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic" href="{{route('BSLGUprofile.index')}}">Mellpi Pro for LGU Profile</a></li>
                                <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Form B: Barangay Profile Sheet -
                                    <?php echo auth()->user()->barangay ?>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div style="margin-top:30px">
                        <div>
                            @include('layouts.page_template.location_header')
                            <br>
                            <div style="display:flex">
                                <!-- Div1 -->
                                <div class="col col-4 col-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Total Population:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="totalPopulation" value="{{$lguProfile->totalPopulation}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">No. of household with access to safe
                                            water:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput2" name="householdWater" value="{{$lguProfile->totalPopulation}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">No. of household with sanitary toilets:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput3" name="householdToilets" value="{{$lguProfile->householdToilets}}">
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
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="secondarySchool" value="{{$lguProfile->secondarySchool}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Barangay Health Stations:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="healthStations" value="{{$lguProfile->healthStations}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of retail outlets/sari-sari stores:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="retailOutlets" value="{{$lguProfile->retailOutlets}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of bakeries:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="bakeries" value="{{$lguProfile->bakeries}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public markets:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="markets" value="{{$lguProfile->markets}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of transport terminals:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="transportTerminals" value="{{$lguProfile->transportTerminals}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Percent of Lactating mothers exclusively
                                            breastfeeding
                                            until
                                            the 5th month:</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="breastfeeding" value="{{$lguProfile->breastfeeding}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="terrain">Terrain:<span style="color:red">*</span></label>
                                        <textarea class="form-control" id="terrain" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" name="terrain">{{$lguProfile->terrain}}</textarea>
                                        @error('terrain')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="hazards">Hazard:<span style="color:red">*</span></label>
                                        <textarea class="form-control" id="hazards" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" name="hazards">{{$lguProfile->hazards}}</textarea>
                                        @error('hazards')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="max-height:800px">
                                        <label for="affectedLGU">LGU/Households affected:<span style="color:red">*</span></label>
                                        <textarea class="form-control" id="affectedLGU" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" name="affectedLGU">{{$lguProfile->affectedLGU}} </textarea>
                                        @error('affectedLGU')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- div2 -->
                                <div class="col col-8 col-4">
                                    <div style="display:flex" class="row">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No. of households:</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="noHousehold" value="{{$lguProfile->healthStations}}">
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="noPuroks" value="{{$lguProfile->noPuroks}}">
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
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="populationA" value="{{$lguProfile->populationA}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="populationB" value="{{$lguProfile->populationB}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="populationC" value="{{$lguProfile->populationC}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="populationD" value="{{$lguProfile->populationD}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="populationE" value="{{$lguProfile->populationE}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="populationF" value="{{$lguProfile->populationF}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group" style="width:170px">
                                                <label for="exampleFormControlInput1">Actual: </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="actualA" value="{{$lguProfile->actualA}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="actualB" value="{{$lguProfile->actualB}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="actualC" value="{{$lguProfile->actualC}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="actualD" value="{{$lguProfile->actualD}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="actualE" value="{{$lguProfile->actualE}}">
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="actualF" value="{{$lguProfile->actualF}}">
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
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalAAA" value="{{$lguProfile->psnormalAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalBAA" value="{{$lguProfile->psnormalBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalCAA" value="{{$lguProfile->psnormalCAA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Underweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psunderweightAAA" value="{{$lguProfile->psunderweightAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psunderweightBAA" value="{{$lguProfile->psunderweightBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psunderweightCAA" value="{{$lguProfile->psunderweightCAA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Underweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightAAA" value="{{$lguProfile->pssevereUnderweightAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightBAA" value="{{$lguProfile->pssevereUnderweightBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightCAA" value="{{$lguProfile->pssevereUnderweightCAA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psoverweightAAA" value="{{$lguProfile->psoverweightAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psoverweightBAA" value="{{$lguProfile->psoverweightBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psoverweightCAA" value="{{$lguProfile->psoverweightCAA}}">
                                            </div>
                                        </div>


                                        <!-- Obese -->
                                        <br>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalABA" value="{{$lguProfile->psnormalABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalBBA" value="{{$lguProfile->psnormalBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalCCA" value="{{$lguProfile->psnormalCCA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pswastedABA" value="{{$lguProfile->pswastedABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pswastedBBA" value="{{$lguProfile->pswastedBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pswastedCCA" value="{{$lguProfile->pswastedCCA}}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedABA" value="{{$lguProfile->psseverelyWastedABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedBBA" value="{{$lguProfile->psseverelyWastedBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedCCA" value="{{$lguProfile->psseverelyWastedCCA}}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psoverweightABA" value="{{$lguProfile->psoverweightABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psoverweightBBA" value="{{$lguProfile->psoverweightBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psoverweightCCA" value="{{$lguProfile->psoverweightCCA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psobeseABA" value="{{$lguProfile->psobeseABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psobeseBBA" value="{{$lguProfile->psobeseBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psobeseCCA" value="{{$lguProfile->psobeseCCA}}">
                                            </div>
                                        </div>
                                        <br>


                                        <!-- tall -->
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalAAB" value="{{$lguProfile->psnormalAAB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalBBB" value="{{$lguProfile->psnormalBBB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psnormalCCC" value="{{$lguProfile->psnormalCCC}}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Stunted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psstuntedAAB" value="{{$lguProfile->psstuntedAAB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psstuntedBBB" value="{{$lguProfile->psstuntedBBB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="psstuntedCCC" value="{{$lguProfile->psstuntedCCC}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Stunted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedAAB" value="{{$lguProfile->pssevereStuntedAAB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedBBB" value="{{$lguProfile->pssevereStuntedBBB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedCCC" value="{{$lguProfile->pssevereStuntedCCC}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Tall: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pstallAAB" value="{{$lguProfile->pstallAAB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pstallBBB" value="{{$lguProfile->pstallBBB}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pstallCCC" value="{{$lguProfile->pstallCCC}}">
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
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scnormalABA" value="{{$lguProfile->scnormalABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scnormalBBA" value="{{$lguProfile->scnormalBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scnormalCCA" value="{{$lguProfile->scnormalCCA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scwastedABA" value="{{$lguProfile->scwastedABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scwastedBBA" value="{{$lguProfile->scwastedBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scwastedCCA" value="{{$lguProfile->scwastedCCA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedABA" value="{{$lguProfile->scseverelyWastedABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedBBA" value="{{$lguProfile->scseverelyWastedBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedCCA" value="{{$lguProfile->scseverelyWastedCCA}}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scoverweightABA" value="{{$lguProfile->scoverweightABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scoverweightBBA" value="{{$lguProfile->scoverweightBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scoverweightCCA" value="{{$lguProfile->scoverweightCCA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scobeseABA" value="{{$lguProfile->scobeseABA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scobeseBBA" value="{{$lguProfile->scobeseBBA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="scobeseCCA" value="{{$lguProfile->scobeseCCA}}">
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
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwnormalAAA" value="{{$lguProfile->pwnormalAAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwnormalBAA" value="{{$lguProfile->pwnormalBAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwnormalCAA" value="{{$lguProfile->pwnormalCAA}}">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Nutritionally at-risk: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskAAA" value="{{$lguProfile->pwnutritionllyatriskAAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskBAA" value="{{$lguProfile->pwnutritionllyatriskBAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskCAA" value="{{$lguProfile->pwnutritionllyatriskCAA}}">
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Overweight: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwoverweightAAA" value="{{$lguProfile->pwoverweightAAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwoverweightBAA" value="{{$lguProfile->pwoverweightBAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwoverweightCAA" value="{{$lguProfile->pwoverweightCAA}}">
                                                </div>
                                            </div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Obese: </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwobeseAAA" value="{{$lguProfile->pwobeseAAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwobeseBAA" value="{{$lguProfile->pwobeseBAA}}">
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" name="pwobeseCAA" value="{{$lguProfile->pwobeseCAA}}">
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
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="landAreaResidential" value="{{$lguProfile->landAreaResidential}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksResidential" value="{{$lguProfile->remarksResidential}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Commercial: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="landAreaCommercial" value="{{$lguProfile->landAreaCommercial}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksCommercial" value="{{$lguProfile->remarksCommercial}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Industrial: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="landAreaIndustrial" value="{{$lguProfile->landAreaIndustrial}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksIndustrial" value="{{$lguProfile->remarksIndustrial}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Agricultural: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="landAreaAgricultural" value="{{$lguProfile->landAreaAgricultural}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksAgricultural" value="{{$lguProfile->remarksAgricultural}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Forest Land, Mineral Land, National Park:
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="landAreaFLMLNP" value="{{$lguProfile->landAreaFLMLNP}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textArea" class="form-control" id="exampleFormControlInput1" name="remarksFLMLNP" value="{{$lguProfile->remarksFLMLNP}}">
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
                                        <select id="loadProvince1" class="form-control" name="Isource" value="{{$lguProfile->Isource}}">
                                            <option value="NGA" {{ old('Isource', $lguProfile->Isource) == 'NGA' ? 'selected' : '' }}>NGA</option>
                                            <option value="LGU" {{ old('Isource', $lguProfile->Isource) == 'LGU' ? 'selected' : '' }}>LGU</option>
                                            <option value="NGO" {{ old('Isource', $lguProfile->Isource) == 'NGO' ? 'selected' : '' }}>NGO</option>
                                            <option value="Private" {{ old('Isource', $lguProfile->Isource) == 'Private' ? 'selected' : '' }}>Private
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="Iavailreceived" value="{{$lguProfile->Iavailreceived}}">
                                            <option value="Yes" {{ old('Iavailreceived', $lguProfile->Iavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('Iavailreceived', $lguProfile->Iavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="Idatereceived" value="{{$lguProfile->Idatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Ivolumepax" value="{{$lguProfile->Ivolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Iremarks" value="{{$lguProfile->Iremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIAsource" value="{{$lguProfile->IIAsource}}">
                                            <option value="NGA" {{ old('IIAsource', $lguProfile->IIAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIAsource', $lguProfile->IIAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIAsource', $lguProfile->IIAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIAsource', $lguProfile->IIAsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIAavailreceived" value="{{$lguProfile->IIAavailreceived}}">
                                            <option value="Yes" {{ old('IIAavailreceived', $lguProfile->IIAavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIAavailreceived', $lguProfile->IIAavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIAdatereceived" value="{{$lguProfile->IIAdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIAvolumepax" value="{{$lguProfile->IIAvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIAremarks" value="{{$lguProfile->IIAremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIBsource" value="{{$lguProfile->IIBsource}}">
                                            <option value="NGA" {{ old('IIBsource', $lguProfile->IIBsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIBsource', $lguProfile->IIBsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIBsource', $lguProfile->IIBsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIBsource', $lguProfile->IIBsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIBavailreceived" value="{{$lguProfile->IIBavailreceived}}">
                                            <option value="Yes" {{ old('IIBavailreceived', $lguProfile->IIBavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIBavailreceived', $lguProfile->IIBavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIBdatereceived" value="{{$lguProfile->IIBdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIBvolumepax" value="{{$lguProfile->IIBvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIBremarks" value="{{$lguProfile->IIBremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIIAsource" value="{{$lguProfile->IIIAsource}}">
                                            <option value="NGA" {{ old('IIIAsource', $lguProfile->IIIAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIIAsource', $lguProfile->IIIAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIIAsource', $lguProfile->IIIAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIIAsource', $lguProfile->IIIAsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>

                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIIAavailreceived" value="{{$lguProfile->IIIAavailreceived}}">
                                            <option value="Yes" {{ old('IIIAavailreceived', $lguProfile->IIIAavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIIAavailreceived', $lguProfile->IIIAavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIIAdatereceived" value="{{$lguProfile->IIIAdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIAvolumepax" value="{{$lguProfile->IIIAvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIAremarks" value="{{$lguProfile->IIIAremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIIBsource" value="{{$lguProfile->IIIBsource}}">
                                            <option value="NGA" {{ old('IIIBsource', $lguProfile->IIIBsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIIBsource', $lguProfile->IIIBsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIIBsource', $lguProfile->IIIBsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIIBsource', $lguProfile->IIIBsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIIBavailreceived" value="{{$lguProfile->IIIBavailreceived}}">
                                            <option value="Yes" {{ old('IIIBavailreceived', $lguProfile->IIIBavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIIBavailreceived', $lguProfile->IIIBavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIIBdatereceived" value="{{$lguProfile->IIIBdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIBvolumepax" value="{{$lguProfile->IIIBvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIBremarks" value="{{$lguProfile->IIIBremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIICsource" value="{{$lguProfile->IIICsource}}">
                                            <option value="NGA" {{ old('IIICsource', $lguProfile->IIICsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIICsource', $lguProfile->IIICsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIICsource', $lguProfile->IIICsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIICsource', $lguProfile->IIICsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIICavailreceived" value="{{$lguProfile->IIICavailreceived}}">
                                            <option value="Yes" {{ old('IIICavailreceived', $lguProfile->IIICavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIICavailreceived', $lguProfile->IIICavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIICdatereceived" value="{{$lguProfile->IIICdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIICvolumepax" value="{{$lguProfile->IIICvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIICremarks" value="{{$lguProfile->IIICremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIIDsource" value="{{$lguProfile->IIIDsource}}">
                                            <option value="NGA" {{ old('IIIDsource', $lguProfile->IIIDsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIIDsource', $lguProfile->IIIDsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIIDsource', $lguProfile->IIIDsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIIDsource', $lguProfile->IIIDsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIIDavailreceived" value="{{$lguProfile->IIIDavailreceived}}">
                                            <option value="Yes" {{ old('IIIDavailreceived', $lguProfile->IIIDavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIIDavailreceived', $lguProfile->IIIDavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIIDdatereceived" value="{{$lguProfile->IIIDdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIDvolumepax" value="{{$lguProfile->IIIDvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIDremarks" value="{{$lguProfile->IIIDremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIIEsource" value="{{$lguProfile->IIIEsource}}">
                                            <option value="NGA" {{ old('IIIEsource', $lguProfile->IIIEsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIIEsource', $lguProfile->IIIEsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIIEsource', $lguProfile->IIIEsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIIEsource', $lguProfile->IIIEsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIIEavailreceived" value="{{$lguProfile->IIIEavailreceived}}">
                                            <option value="Yes" {{ old('IIIEavailreceived', $lguProfile->IIIEavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIIEavailreceived', $lguProfile->IIIEavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIIEdatereceived" value="{{$lguProfile->IIIEdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIEvolumepax" value="{{$lguProfile->IIIEvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIEremarks" value="{{$lguProfile->IIIEremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IIIFsource" value="{{$lguProfile->IIIFsource}}">
                                            <option value="NGA" {{ old('IIIFsource', $lguProfile->IIIFsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IIIFsource', $lguProfile->IIIFsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IIIFsource', $lguProfile->IIIFsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IIIFsource', $lguProfile->IIIFsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IIIFavailreceived" value="{{$lguProfile->IIIFavailreceived}}">
                                            <option value="Yes" {{ old('IIIFavailreceived', $lguProfile->IIIFavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IIIFavailreceived', $lguProfile->IIIFavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IIIFdatereceived" value="{{$lguProfile->IIIFdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIFvolumepax" value="{{$lguProfile->IIIFvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IIIFremarks" value="{{$lguProfile->IIIFremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="IVAsource" value="{{$lguProfile->IVAsource}}">
                                            <option value="NGA" {{ old('IVAsource', $lguProfile->IVAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                            </option>
                                            <option value="LGU" {{ old('IVAsource', $lguProfile->IVAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                            </option>
                                            <option value="NGO" {{ old('IVAsource', $lguProfile->IVAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                            </option>
                                            <option value="Private" {{ old('IVAsource', $lguProfile->IVAsource) == 'Private' ? 'selected' : '' }}>
                                                Private</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="IVAavailreceived" value="{{$lguProfile->IVAavailreceived}}">
                                            <option value="Yes" {{ old('IVAavailreceived', $lguProfile->IVAavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('IVAavailreceived', $lguProfile->IVAavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="IVAdatereceived" value="{{$lguProfile->IVAdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IVAvolumepax" value="{{$lguProfile->IVAvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="IVAremarks" value="{{$lguProfile->IVAremarks}}">
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
                                        <select id="loadProvince1" class="form-control" name="VAsource" value="{{$lguProfile->VAsource}}">
                                            <option value="NGA" {{ old('VAsource', $lguProfile->VAsource) == 'NGA' ? 'selected' : '' }}>NGA</option>
                                            <option value="LGU" {{ old('VAsource', $lguProfile->VAsource) == 'LGU' ? 'selected' : '' }}>LGU</option>
                                            <option value="NGO" {{ old('VAsource', $lguProfile->VAsource) == 'NGO' ? 'selected' : '' }}>NGO</option>
                                            <option value="Private" {{ old('VAsource', $lguProfile->VAsource) == 'Private' ? 'selected' : '' }}>Private
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select id="loadProvince1" class="form-control" name="VAavailreceived" value="{{$lguProfile->VAavailreceived}}">
                                            <option value="Yes" {{ old('VAavailreceived', $lguProfile->VAavailreceived) == 'Yes' ? 'selected' : '' }}>Yes </option>
                                            <option value="No" {{ old('VAavailreceived', $lguProfile->VAavailreceived) == 'No' ? 'selected' : '' }}>No </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" id="exampleFormControlInput1" name="VAdatereceived" value="{{$lguProfile->VAdatereceived}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="VAvolumepax" value="{{$lguProfile->VAvolumepax}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="VAremarks" value="{{$lguProfile->VAremarks}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection