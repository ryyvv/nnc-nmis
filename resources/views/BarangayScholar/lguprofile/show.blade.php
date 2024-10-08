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

.form-control:disabled {
    font-weight: bolder !important;
    color: black !important;
}
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'MELLPI PRO For LGU Profile',
'activePage' => 'LGUPROFILE',
'activeNav' => 'MELLPI PRO For LGU',
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">

            <div class="d-flex justify-content-end center" style="padding-right:20px; ">

                <form action="{{route('BSLGUprofile.download',$row->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="htmlContent" id="htmlContent">
                    <button type="submit" id="hiddenButton" style="display: none;"></button>
                </form>

                <div style="display:absolute;" onclick="downloadPDF('{{$row->id}}')">
                    <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;"
                        aria-hidden="true"></i>
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
                            <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic"
                                    href="{{route('BSLGUprofile.index')}}">Mellpi Pro for LGU Profile</a></li>
                            <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Form B:
                                Barangay Profile Sheet -
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
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="totalPopulation" value="{{$row->totalPopulation}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">No. of household with access to safe
                                        water:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput2"
                                        name="householdWater" value="{{$row->totalPopulation}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput3">No. of household with sanitary
                                        toilets:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput3"
                                        name="householdToilets" value="{{$row->householdToilets}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of Day Care Centers</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="dayCareCenter" value="{{$row->dayCareCenter}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of public elementary schools:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="elementary" value="{{$row->elementary}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of public secondary schools:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="secondarySchool" value="{{$row->secondarySchool}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of Barangay Health Stations:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="healthStations" value="{{$row->healthStations}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of retail outlets/sari-sari
                                        stores:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="retailOutlets" value="{{$row->retailOutlets}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of bakeries:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="bakeries" value="{{$row->bakeries}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of public markets:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="markets" value="{{$row->markets}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">No. of transport terminals:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="transportTerminals" value="{{$row->transportTerminals}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Percent of Lactating mothers exclusively
                                        breastfeeding
                                        until
                                        the 5th month:</label>
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="breastfeeding" value="{{$row->breastfeeding}}">
                                </div>

                                <div class="form-group">
                                    <label for="terrain">Terrain:<span style="color:red">*</span></label>
                                    <textarea class="form-control" disabled id="terrain" height="800px"
                                        style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px"
                                        name="terrain">{{$row->terrain}}</textarea>
                                    @error('terrain')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="hazards">Hazard:<span style="color:red">*</span></label>
                                    <textarea class="form-control" disabled id="hazards" height="800px"
                                        style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px"
                                        name="hazards">{{$row->hazards}}</textarea>
                                    @error('hazards')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group" style="max-height:800px">
                                    <label for="affectedLGU">LGU/Households affected:<span
                                            style="color:red">*</span></label>
                                    <textarea class="form-control" disabled id="affectedLGU"
                                        style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px"
                                        name="affectedLGU">{{$row->affectedLGU}} </textarea>
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
                                        <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                            name="noHousehold" value="{{$row->healthStations}}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:</label>
                                        <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                            name="noPuroks" value="{{$row->noPuroks}}">
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
                                            <input type="text" class="form-control" disabled
                                                id="exampleFormControlInput1" name="populationA"
                                                value="{{$row->populationA}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="text" class="form-control" disabled
                                                id="exampleFormControlInput1" name="populationB"
                                                value="{{$row->populationB}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="text" class="form-control" disabled
                                                id="exampleFormControlInput1" name="populationC"
                                                value="{{$row->populationC}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="text" class="form-control" disabled
                                                id="exampleFormControlInput1" name="populationD"
                                                value="{{$row->populationD}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="text" class="form-control" disabled
                                                id="exampleFormControlInput1" name="populationE"
                                                value="{{$row->populationE}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="text" class="form-control" disabled
                                                id="exampleFormControlInput1" name="populationF"
                                                value="{{$row->populationF}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group" style="width:170px">
                                            <label for="exampleFormControlInput1">Actual: </label>
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="actualA" value="{{$row->actualA}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="actualB" value="{{$row->actualB}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="actualC" value="{{$row->actualC}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="actualD" value="{{$row->actualD}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="actualE" value="{{$row->actualE}}">
                                        </div>
                                        <div class="form-group" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="actualF" value="{{$row->actualF}}">
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
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalAAA"
                                                value="{{$row->psnormalAAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalBAA"
                                                value="{{$row->psnormalBAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalCAA"
                                                value="{{$row->psnormalCAA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Underweight: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psunderweightAAA"
                                                value="{{$row->psunderweightAAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psunderweightBAA"
                                                value="{{$row->psunderweightBAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psunderweightCAA"
                                                value="{{$row->psunderweightCAA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Severely Underweight: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pssevereUnderweightAAA"
                                                value="{{$row->pssevereUnderweightAAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pssevereUnderweightBAA"
                                                value="{{$row->pssevereUnderweightBAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pssevereUnderweightCAA"
                                                value="{{$row->pssevereUnderweightCAA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Overweight: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psoverweightAAA"
                                                value="{{$row->psoverweightAAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psoverweightBAA"
                                                value="{{$row->psoverweightBAA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psoverweightCAA"
                                                value="{{$row->psoverweightCAA}}">
                                        </div>
                                    </div>


                                    <!-- Obese -->
                                    <br>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Normal: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalABA"
                                                value="{{$row->psnormalABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalBBA"
                                                value="{{$row->psnormalBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalCCA"
                                                value="{{$row->psnormalCCA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Wasted: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pswastedABA"
                                                value="{{$row->pswastedABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pswastedBBA"
                                                value="{{$row->pswastedBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pswastedCCA"
                                                value="{{$row->pswastedCCA}}">
                                        </div>
                                    </div>

                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Severely Wasted: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psseverelyWastedABA"
                                                value="{{$row->psseverelyWastedABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psseverelyWastedBBA"
                                                value="{{$row->psseverelyWastedBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psseverelyWastedCCA"
                                                value="{{$row->psseverelyWastedCCA}}">
                                        </div>
                                    </div>

                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Overweight: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psoverweightABA"
                                                value="{{$row->psoverweightABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psoverweightBBA"
                                                value="{{$row->psoverweightBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psoverweightCCA"
                                                value="{{$row->psoverweightCCA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Obese: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psobeseABA"
                                                value="{{$row->psobeseABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psobeseBBA"
                                                value="{{$row->psobeseBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psobeseCCA"
                                                value="{{$row->psobeseCCA}}">
                                        </div>
                                    </div>
                                    <br>


                                    <!-- tall -->
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Normal: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalAAB"
                                                value="{{$row->psnormalAAB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalBBB"
                                                value="{{$row->psnormalBBB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psnormalCCC"
                                                value="{{$row->psnormalCCC}}">
                                        </div>
                                    </div>

                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Stunted: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psstuntedAAB"
                                                value="{{$row->psstuntedAAB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psstuntedBBB"
                                                value="{{$row->psstuntedBBB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="psstuntedCCC"
                                                value="{{$row->psstuntedCCC}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Severely Stunted: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pssevereStuntedAAB"
                                                value="{{$row->pssevereStuntedAAB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pssevereStuntedBBB"
                                                value="{{$row->pssevereStuntedBBB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pssevereStuntedCCC"
                                                value="{{$row->pssevereStuntedCCC}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Tall: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pstallAAB"
                                                value="{{$row->pstallAAB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pstallBBB"
                                                value="{{$row->pstallBBB}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="pstallCCC"
                                                value="{{$row->pstallCCC}}">
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
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scnormalABA"
                                                value="{{$row->scnormalABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scnormalBBA"
                                                value="{{$row->scnormalBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scnormalCCA"
                                                value="{{$row->scnormalCCA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Wasted: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scwastedABA"
                                                value="{{$row->scwastedABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scwastedBBA"
                                                value="{{$row->scwastedBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scwastedCCA"
                                                value="{{$row->scwastedCCA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Severely Wasted: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scseverelyWastedABA"
                                                value="{{$row->scseverelyWastedABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scseverelyWastedBBA"
                                                value="{{$row->scseverelyWastedBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scseverelyWastedCCA"
                                                value="{{$row->scseverelyWastedCCA}}">
                                        </div>
                                    </div>

                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Overweight: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scoverweightABA"
                                                value="{{$row->scoverweightABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scoverweightBBA"
                                                value="{{$row->scoverweightBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scoverweightCCA"
                                                value="{{$row->scoverweightCCA}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Obese: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scobeseABA"
                                                value="{{$row->scobeseABA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scobeseBBA"
                                                value="{{$row->scobeseBBA}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="scobeseCCA"
                                                value="{{$row->scobeseCCA}}">
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
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwnormalAAA"
                                                    value="{{$row->pwnormalAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwnormalBAA"
                                                    value="{{$row->pwnormalBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwnormalCAA"
                                                    value="{{$row->pwnormalCAA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Nutritionally at-risk: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwnutritionllyatriskAAA"
                                                    value="{{$row->pwnutritionllyatriskAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwnutritionllyatriskBAA"
                                                    value="{{$row->pwnutritionllyatriskBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwnutritionllyatriskCAA"
                                                    value="{{$row->pwnutritionllyatriskCAA}}">
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwoverweightAAA"
                                                    value="{{$row->pwoverweightAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwoverweightBAA"
                                                    value="{{$row->pwoverweightBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwoverweightCAA"
                                                    value="{{$row->pwoverweightCAA}}">
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese: </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwobeseAAA"
                                                    value="{{$row->pwobeseAAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwobeseBAA"
                                                    value="{{$row->pwobeseBAA}}">
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" disabled
                                                    id="exampleFormControlInput1" name="pwobeseCAA"
                                                    value="{{$row->pwobeseCAA}}">
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
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="landAreaResidential"
                                                value="{{$row->landAreaResidential}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="remarksResidential"
                                                value="{{$row->remarksResidential}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Commercial: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="landAreaCommercial"
                                                value="{{$row->landAreaCommercial}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="remarksCommercial"
                                                value="{{$row->remarksCommercial}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Industrial: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="landAreaIndustrial"
                                                value="{{$row->landAreaIndustrial}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="remarksIndustrial"
                                                value="{{$row->remarksIndustrial}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Agricultural: </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="landAreaAgricultural"
                                                value="{{$row->landAreaAgricultural}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="remarksAgricultural"
                                                value="{{$row->remarksAgricultural}}">
                                        </div>
                                    </div>
                                    <div style="display:flex;">
                                        <div class="form-group col" style="width:170px">
                                            <label for="exampleFormControlInput1">Forest Land, Mineral Land, National
                                                Park:
                                            </label>
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textarea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="landAreaFLMLNP"
                                                value="{{$row->landAreaFLMLNP}}">
                                        </div>
                                        <div class="form-group col" style="margin-left:10px">
                                            <input type="textArea" class="form-control" disabled
                                                id="exampleFormControlInput1" name="remarksFLMLNP"
                                                value="{{$row->remarksFLMLNP}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="Isource"
                                        value="{{$row->Isource}}">
                                        <option value="NGA"
                                            {{ old('Isource', $row->Isource) == 'NGA' ? 'selected' : '' }}>NGA</option>
                                        <option value="LGU"
                                            {{ old('Isource', $row->Isource) == 'LGU' ? 'selected' : '' }}>LGU</option>
                                        <option value="NGO"
                                            {{ old('Isource', $row->Isource) == 'NGO' ? 'selected' : '' }}>NGO</option>
                                        <option value="Private"
                                            {{ old('Isource', $row->Isource) == 'Private' ? 'selected' : '' }}>Private
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="Iavailreceived"
                                        value="{{$row->Iavailreceived}}">
                                        <option value="Yes"
                                            {{ old('Iavailreceived', $row->Iavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('Iavailreceived', $row->Iavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="Idatereceived" value="{{$row->Idatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="Ivolumepax" value="{{$row->Ivolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="Iremarks" value="{{$row->Iremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIAsource"
                                        value="{{$row->IIAsource}}">
                                        <option value="NGA"
                                            {{ old('IIAsource', $row->IIAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIAsource', $row->IIAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIAsource', $row->IIAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIAsource', $row->IIAsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIAavailreceived"
                                        value="{{$row->IIAavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIAavailreceived', $row->IIAavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIAavailreceived', $row->IIAavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIAdatereceived" value="{{$row->IIAdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIAvolumepax" value="{{$row->IIAvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIAremarks" value="{{$row->IIAremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIBsource"
                                        value="{{$row->IIBsource}}">
                                        <option value="NGA"
                                            {{ old('IIBsource', $row->IIBsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIBsource', $row->IIBsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIBsource', $row->IIBsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIBsource', $row->IIBsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIBavailreceived"
                                        value="{{$row->IIBavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIBavailreceived', $row->IIBavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIBavailreceived', $row->IIBavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIBdatereceived" value="{{$row->IIBdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIBvolumepax" value="{{$row->IIBvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIBremarks" value="{{$row->IIBremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIIAsource"
                                        value="{{$row->IIIAsource}}">
                                        <option value="NGA"
                                            {{ old('IIIAsource', $row->IIIAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIIAsource', $row->IIIAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIIAsource', $row->IIIAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIIAsource', $row->IIIAsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIIAavailreceived"
                                        value="{{$row->IIIAavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIIAavailreceived', $row->IIIAavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIIAavailreceived', $row->IIIAavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIAdatereceived" value="{{$row->IIIAdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIAvolumepax" value="{{$row->IIIAvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIAremarks" value="{{$row->IIIAremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIIBsource"
                                        value="{{$row->IIIBsource}}">
                                        <option value="NGA"
                                            {{ old('IIIBsource', $row->IIIBsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIIBsource', $row->IIIBsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIIBsource', $row->IIIBsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIIBsource', $row->IIIBsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIIBavailreceived"
                                        value="{{$row->IIIBavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIIBavailreceived', $row->IIIBavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIIBavailreceived', $row->IIIBavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIBdatereceived" value="{{$row->IIIBdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIBvolumepax" value="{{$row->IIIBvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIBremarks" value="{{$row->IIIBremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIICsource"
                                        value="{{$row->IIICsource}}">
                                        <option value="NGA"
                                            {{ old('IIICsource', $row->IIICsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIICsource', $row->IIICsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIICsource', $row->IIICsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIICsource', $row->IIICsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIICavailreceived"
                                        value="{{$row->IIICavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIICavailreceived', $row->IIICavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIICavailreceived', $row->IIICavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIICdatereceived" value="{{$row->IIICdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIICvolumepax" value="{{$row->IIICvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIICremarks" value="{{$row->IIICremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIIDsource"
                                        value="{{$row->IIIDsource}}">
                                        <option value="NGA"
                                            {{ old('IIIDsource', $row->IIIDsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIIDsource', $row->IIIDsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIIDsource', $row->IIIDsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIIDsource', $row->IIIDsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIIDavailreceived"
                                        value="{{$row->IIIDavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIIDavailreceived', $row->IIIDavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIIDavailreceived', $row->IIIDavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIDdatereceived" value="{{$row->IIIDdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIDvolumepax" value="{{$row->IIIDvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIDremarks" value="{{$row->IIIDremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIIEsource"
                                        value="{{$row->IIIEsource}}">
                                        <option value="NGA"
                                            {{ old('IIIEsource', $row->IIIEsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIIEsource', $row->IIIEsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIIEsource', $row->IIIEsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIIEsource', $row->IIIEsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIIEavailreceived"
                                        value="{{$row->IIIEavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIIEavailreceived', $row->IIIEavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIIEavailreceived', $row->IIIEavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIEdatereceived" value="{{$row->IIIEdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIEvolumepax" value="{{$row->IIIEvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIEremarks" value="{{$row->IIIEremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="IIIFsource"
                                        value="{{$row->IIIFsource}}">
                                        <option value="NGA"
                                            {{ old('IIIFsource', $row->IIIFsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IIIFsource', $row->IIIFsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IIIFsource', $row->IIIFsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IIIFsource', $row->IIIFsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IIIFavailreceived"
                                        value="{{$row->IIIFavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IIIFavailreceived', $row->IIIFavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IIIFavailreceived', $row->IIIFavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIFdatereceived" value="{{$row->IIIFdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIFvolumepax" value="{{$row->IIIFvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IIIFremarks" value="{{$row->IIIFremarks}}">
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
                                    <select class="form-control" disabled name="IVAtype" value="{{$row->IVAtype}}">
                                        <option value="None"
                                            {{ old('IVAtype', $row->IVAtype) == 'None' ? 'selected' : '' }}>None
                                        </option>
                                        <option value="Saktong Iodine sa ASIN (SISA Seal)"
                                            {{ old('IVAtype', $row->IVAtype) == 'Saktong Iodine sa ASIN (SISA Seal)' ? 'selected' : '' }}>
                                            Saktong Iodine sa ASIN (SISA Seal)
                                        </option>
                                    </select>
                                    @error('IVAtype')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IVAsource"
                                        value="{{$row->IVAsource}}">
                                        <option value="NGA"
                                            {{ old('IVAsource', $row->IVAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('IVAsource', $row->IVAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('IVAsource', $row->IVAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('IVAsource', $row->IVAsource) == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="IVAavailreceived"
                                        value="{{$row->IVAavailreceived}}">
                                        <option value="Yes"
                                            {{ old('IVAavailreceived', $row->IVAavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('IVAavailreceived', $row->IVAavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IVAdatereceived" value="{{$row->IVAdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IVAvolumepax" value="{{$row->IVAvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="IVAremarks" value="{{$row->IVAremarks}}">
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
                                    <select id="loadProvince1" class="form-control" disabled name="VAsource"
                                        value="{{$row->VAsource}}">
                                        <option value="NGA"
                                            {{ old('VAsource', $row->VAsource) == 'NGA' ? 'selected' : '' }}>NGA
                                        </option>
                                        <option value="LGU"
                                            {{ old('VAsource', $row->VAsource) == 'LGU' ? 'selected' : '' }}>LGU
                                        </option>
                                        <option value="NGO"
                                            {{ old('VAsource', $row->VAsource) == 'NGO' ? 'selected' : '' }}>NGO
                                        </option>
                                        <option value="Private"
                                            {{ old('VAsource', $row->VAsource) == 'Private' ? 'selected' : '' }}>Private
                                        </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select id="loadProvince1" class="form-control" disabled name="VAavailreceived"
                                        value="{{$row->VAavailreceived}}">
                                        <option value="Yes"
                                            {{ old('VAavailreceived', $row->VAavailreceived) == 'Yes' ? 'selected' : '' }}>
                                            Yes </option>
                                        <option value="No"
                                            {{ old('VAavailreceived', $row->VAavailreceived) == 'No' ? 'selected' : '' }}>
                                            No </option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                        name="VAdatereceived" value="{{$row->VAdatereceived}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="VAvolumepax" value="{{$row->VAvolumepax}}">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                        name="VAremarks" value="{{$row->VAremarks}}">
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