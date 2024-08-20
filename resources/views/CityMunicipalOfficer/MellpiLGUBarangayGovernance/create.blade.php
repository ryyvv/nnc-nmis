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
'namePage' => ' Mellpi Pro for LGU Profile',
'activePage' => 'Governance',
'activeNav' => '',
])

@section('content') 
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div style="display:flex;align-items:center">
            <a href="{{route('BSLGUprofile.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B: BARANGAY PROFILE SHEET</h4>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <div style="padding:25px">
            <form action="{{ route('BSLGUprofilest.storeSubmit') }}" id="lgu-profile-form" method="POST">
                @csrf
                
                <input type="hidden" name="status" id="status"> 
                @include('layouts.page_template.location_header') 

                <br>
                <div style="display:flex">
                    <!-- Div1 -->
                    <div class="col col-4 col-2">
                        <div class="form-group">
                            <label for="totalPopulation">Total Population:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" placeholder="ex. 100" id="totalPopulation" 
                            name="totalPopulation" value="{{ old('totalPopulation') }}"> 
                            @error('totalPopulation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       

                        <div class="form-group">
                            <div class="form-group">
                                <label for="householdWater">No. of household with access to safe water:<span style="color:red">*</span></label>
                                <input type="number" min="1" max="1000" class="form-control" id="householdWater" name="householdWater" 
                                placeholder="ex. 100"  
                                value="{{ old('householdWater') }}">
                                @error('householdWater')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="householdToilets">No. of household with sanitary toilets:<span style="color:red">*</span></label>
                            <input  type="number" min="1" max="1000" class="form-control" id="householdToilets" name="householdToilets"
                            placeholder="ex. 100" value="{{ old('householdToilets') }}">
                            @error('householdToilets')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dayCareCenter">No. of Day Care Centers:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="dayCareCenter" name="dayCareCenter"
                            placeholder="ex. 100 " value="{{ old('dayCareCenter') }}">
                            @error('dayCareCenter')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="elementary">No. of public elementary schools:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000"  class="form-control" id="elementary" placeholder="ex. 100 " 
                            value="{{ old('elementary') }}" name="elementary">
                            @error('elementary')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="secondarySchool">No. of public secondary schools:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="secondarySchool" name="secondarySchool"
                            placeholder="ex. 100 " value="{{ old('secondarySchool') }}">
                            @error('secondarySchool')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="healthStations">No. of Barangay Health Stations:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="healthStations" name="healthStations"
                            placeholder="ex. 100 " value="{{ old('healthStations') }}">
                            @error('healthStations')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="retailOutlets">No. of retail outlets/sari-sari stores:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="retailOutlets" name="retailOutlets"
                            placeholder="ex. 100 " value="{{ old('retailOutlets') }}">
                            @error('retailOutlets')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bakeries">No. of bakeries:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="bakeries" name="bakeries"
                            placeholder="ex. 100 " value="{{ old('bakeries') }}">
                            @error('bakeries')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="markets">No. of public markets:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="markets" name="markets"
                            placeholder="ex. 100 " value="{{ old('markets') }}">
                            @error('markets')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="transportTerminals">No. of transport terminals:<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="transportTerminals" name="transportTerminals"
                            placeholder="ex. 100 " value="{{ old('transportTerminals') }}">
                            @error('transportTerminals')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="breastfeeding">Percent of Lactating mothers exclusively
                                breastfeeding u ntil the 5th month(%):<span style="color:red">*</span></label>
                            <input type="number" min="1" max="1000" class="form-control" id="breastfeeding" name="breastfeeding"
                            placeholder="ex. 100 " value="{{ old('breastfeeding') }}">
                            @error('breastfeeding')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="terrain">Terrain:<span style="color:red">*</span></label>
                            <textarea class="form-control" id="terrain" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" name="terrain"
                            >{{ old('terrain') }}</textarea>
                            @error('terrain')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="hazards">Hazard:<span style="color:red">*</span></label>
                            <textarea class="form-control" id="hazards" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" name="hazards"
                            >{{ old('hazards') }}</textarea>
                            @error('hazards')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" style="max-height:800px">
                            <label for="affectedLGU">LGU/Households affected:<span style="color:red">*</span></label>
                            <textarea class="form-control" id="affectedLGU" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" name="affectedLGU"
                            >{{ old('affectedLGU') }}</textarea>
                            @error('affectedLGU')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- div2 -->
                    <div class="col col-8 col-4">
                        <div style="display:flex" class="row">
                            <div class="form-group col">
                                <label for="noHousehold">No. of households:<span style="color:red">*</span></label>
                                <input type="number" min="1" max="1000" class="form-control" id="noHousehold" name="noHousehold"
                                placeholder="ex. 100 " value="{{ old('noHousehold') }}">
                                @error('noHousehold')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="noPuroks ">No.of SITIOS/PUROKS:<span style="color:red">*</span></label>
                                <input type="number" min="1" max="1000" class="form-control" id="noPuroks " 
                                name="noPuroks" placeholder="ex. 100 " value="{{ old('noPuroks') }}">
                                @error('noPuroks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                    <label for="exampleFormControlInput1">Estimated:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="populationA"
                                     name="populationA" value="{{ old('populationA') }}" placeholder="ex. 100">
                                     @error('populationA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="populationB" value="{{ old('populationB') }}" placeholder="ex. 100">
                                    @error('populationB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                     name="populationC" value="{{ old('populationC') }}" placeholder="ex. 100">
                            @error('populationC')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="populationD" value="{{ old('populationD') }}" placeholder="ex. 100">
                            
                            @error('populationD')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="populationE" value="{{ old('populationE') }}" placeholder="ex. 100">
                                    @error('populationE')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                     name="populationF" value="{{ old('populationF') }}" placeholder="ex. 100" >
                                     @error('populationF')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group" style="width:170px">
                                    <label for="exampleFormControlInput1">Actual:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="actualA" value="{{ old('actualA') }}" placeholder="ex. 100">
                                    @error('actualA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="actualB" value="{{ old('actualB') }}" placeholder="ex. 100">
                                    @error('actualB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="actualC"  value="{{ old('actualC') }}" placeholder="ex. 100" >
                                    @error('actualC')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                     name="actualD" value="{{ old('actualD') }}" placeholder="ex. 100">
                                     @error('actualD')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="actualE" value="{{ old('actualE') }}" placeholder="ex. 100">
                                    @error('actualE')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="actualF" value="{{ old('actualF') }}" placeholder="ex. 100">
                                    @error('actualF')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <label><b>Nutrition Status of Preschool Children(%):</b></label>
                        <div>
                            <div style="display:flex" class="row">
                                <div class="  col">
                                    <label for="exampleFormControlInput1"></label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus2"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus1"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYear"> </label>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalAAA" value="{{ old('psnormalAAA') }}" placeholder="ex. 100">
                                    @error('psnormalAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                     name="psnormalBAA" value="{{ old('psnormalBAA') }}" placeholder="ex. 100">
                                     @error('psnormalBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalCAA" value="{{ old('psnormalCAA') }}" placeholder="ex. 100" >
                                    @error('psnormalCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror 
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Underweight:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psunderweightAAA" value="{{ old('psunderweightAAA') }}" placeholder="ex. 100">
                                    @error('psunderweightAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psunderweightBAA" value="{{ old('psunderweightBAA') }}" placeholder="ex. 100">
                                    @error('psunderweightBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psunderweightCAA" value="{{ old('psunderweightCAA') }}" placeholder="ex. 100">
                                    @error('psunderweightCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Underweight:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1"  
                                    name="pssevereUnderweightAAA" value="{{ old('pssevereUnderweightAAA') }}" placeholder="ex. 100">
                                    @error('pssevereUnderweightAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pssevereUnderweightBAA" value="{{ old('pssevereUnderweightBAA') }}" placeholder="ex. 100">
                                    @error('pssevereUnderweightBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pssevereUnderweightCAA" value="{{ old('pssevereUnderweightCAA') }}" placeholder="ex. 100">  
                                    @error('pssevereUnderweightCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psoverweightAAA" value="{{ old('psoverweightAAA') }}" placeholder="ex. 100">
                                    @error('psoverweightAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psoverweightBAA" value="{{ old('psoverweightBAA') }}" placeholder="ex. 100">
                                    @error('psoverweightBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psoverweightCAA" value="{{ old('psoverweightCAA') }}" placeholder="ex. 100">
                                    @error('psoverweightCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>


                            <!-- Obese -->
                            <br> <div style="display:flex" class="row">
                                <div class="  col">
                                    <label for="exampleFormControlInput1"></label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus2"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus1"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYear"> </label>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalABA" value="{{ old('psnormalABA') }}" placeholder="ex. 100">
                                    @error('psnormalABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalBBA"  value="{{ old('psnormalBBA') }}" placeholder="ex. 100">
                                    @error('psnormalBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalCCA" value="{{ old('psnormalCCA') }}" placeholder="ex. 100">
                                    @error('psnormalCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Wasted:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pswastedABA" value="{{ old('pswastedABA') }}" placeholder="ex. 100">
                                    @error('pswastedABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pswastedBBA" value="{{ old('pswastedBBA') }}" placeholder="ex. 100">
                                    @error('pswastedBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pswastedCCA" value="{{ old('pswastedCCA') }}" placeholder="ex. 100">
                                    @error('pswastedCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Wasted:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psseverelyWastedABA" value="{{ old('psseverelyWastedABA') }}" placeholder="ex. 100">
                                    @error('psseverelyWastedABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psseverelyWastedBBA" value="{{ old('psseverelyWastedBBA') }}" placeholder="ex. 100">
                                    @error('psseverelyWastedBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psseverelyWastedCCA" value="{{ old('psseverelyWastedCCA') }}" placeholder="ex. 100">
                                    @error('psseverelyWastedCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psoverweightABA" value="{{ old('psoverweightABA') }}" placeholder="ex. 100">
                                    @error('psoverweightABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psoverweightBBA" value="{{ old('psoverweightBBA') }}" placeholder="ex. 100">
                                    @error('psoverweightBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psoverweightCCA" value="{{ old('psoverweightCCA') }}" placeholder="ex. 100">
                                    @error('psoverweightCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psobeseABA" value="{{ old('psobeseABA') }}" placeholder="ex. 100">
                                    @error('psobeseABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psobeseBBA" value="{{ old('psobeseBBA') }}" placeholder="ex. 100">
                                    @error('psobeseBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psobeseCCA" value="{{ old('psobeseCCA') }}" placeholder="ex. 100">
                                    @error('psobeseCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <br>


                            <!-- tall -->
                            <div style="display:flex" class="row">
                                <div class="  col">
                                    <label for="exampleFormControlInput1"></label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus2"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus1"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYear"> </label>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalAAB" value="{{ old('psnormalAAB') }}" placeholder="ex. 100">
                                    @error('psnormalAAB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalBBB" value="{{ old('psnormalBBB') }}" placeholder="ex. 100">
                                    @error('psnormalBBB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psnormalCCC" value="{{ old('psnormalCCC') }}" placeholder="ex. 100">
                                    @error('psnormalCCC')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Stunted:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psstuntedAAB" value="{{ old('psstuntedAAB') }}" placeholder="ex. 100">
                                    @error('psstuntedAAB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psstuntedBBB" value="{{ old('psstuntedBBB') }}" placeholder="ex. 100">
                                    @error('psstuntedBBB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="psstuntedCCC" value="{{ old('psstuntedCCC') }}" placeholder="ex. 100">
                                    @error('psstuntedCCC')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Stunted:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pssevereStuntedAAB" value="{{ old('pssevereStuntedAAB') }}" placeholder="ex. 100">
                                    @error('pssevereStuntedAAB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pssevereStuntedBBB" value="{{ old('pssevereStuntedBBB') }}" placeholder="ex. 100">
                                    @error('pssevereStuntedBBB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pssevereStuntedCCC"  value="{{ old('pssevereStuntedCCC') }}" placeholder="ex. 100">
                                    @error('pssevereStuntedCCC')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Tall:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pstallAAB" value="{{ old('pstallAAB') }}" placeholder="ex. 100">
                                    @error('pstallAAB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pstallBBB" value="{{ old('pstallBBB') }}" placeholder="ex. 100">
                                    @error('pstallBBB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="pstallCCC" value="{{ old('pstallCCC') }}" placeholder="ex. 100">
                                    @error('pstallCCC')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <label><b>Nutrition Status of School Children:</b></label>
                        <div>
                        <div style="display:flex" class="row">
                                <div class="  col">
                                    <label for="exampleFormControlInput1"></label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus2"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus1"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYear"> </label>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scnormalABA" value="{{ old('scnormalABA') }}" placeholder="ex. 100">
                                    @error('scnormalABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scnormalBBA" value="{{ old('scnormalBBA') }}" placeholder="ex. 100">
                                    @error('scnormalBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                     name="scnormalCCA" value="{{ old('scnormalCCA') }}" placeholder="ex. 100">
                                    @error('scnormalCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Wasted:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                     name="scwastedABA" value="{{ old('scwastedABA') }}" placeholder="ex. 100">
                                    @error('scwastedABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scwastedBBA" value="{{ old('scwastedBBA') }}" placeholder="ex. 100">
                                    @error('scwastedBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scwastedCCA" value="{{ old('scwastedCCA') }}" placeholder="ex. 100">
                                    @error('scwastedCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Severely Wasted:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scseverelyWastedABA"  value="{{ old('scseverelyWastedABA') }}" placeholder="ex. 100">
                                    @error('scseverelyWastedABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scseverelyWastedBBA" value="{{ old('scseverelyWastedBBA') }}" placeholder="ex. 100">
                                    @error('scseverelyWastedBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scseverelyWastedCCA" value="{{ old('scseverelyWastedCCA') }}" placeholder="ex. 100">
                                    @error('scseverelyWastedCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>

                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scoverweightABA" value="{{ old('scoverweightABA') }}" placeholder="ex. 100">
                                    @error('scoverweightABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scoverweightBBA" value="{{ old('scoverweightBBA') }}" placeholder="ex. 100">
                                    @error('scoverweightBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scoverweightCCA" value="{{ old('scoverweightCCA') }}" placeholder="ex. 100" >
                                    @error('scoverweightCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scobeseABA" value="{{ old('scobeseABA') }}" placeholder="ex. 100" >
                                    @error('scobeseABA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scobeseBBA" value="{{ old('scobeseBBA') }}" placeholder="ex. 100" >
                                    @error('scobeseBBA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                                    name="scobeseCCA" value="{{ old('scobeseCCA') }}" placeholder="ex. 100" >
                                    @error('scobeseCCA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>

                            <br>
                            <br>
                            <label><b>Nutrition Status of Pregnant Woman:</b></label>
                            <div>
                            <div style="display:flex" class="row">
                                <div class="  col">
                                    <label for="exampleFormControlInput1"></label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus2"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYearMinus1"> </label>
                                </div>
                                <div class=" col">
                                    Yr: <label for="exampleFormControlInput1" id="currentYear"> </label>
                                </div>
                            </div>
                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwnormalAAA" value="{{ old('pwnormalAAA') }}" placeholder="ex. 100">
                                        @error('pwnormalAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwnormalBAA" value="{{ old('pwnormalBAA') }}" placeholder="ex. 100">
                                        @error('pwnormalBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwnormalCAA" value="{{ old('pwnormalCAA') }}" placeholder="ex. 100">
                                        @error('pwnormalCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                </div>
                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Nutritionally at-risk:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwnutritionllyatriskAAA" value="{{ old('pwnutritionllyatriskAAA') }}" placeholder="ex. 100">
                                        @error('pwnutritionllyatriskAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwnutritionllyatriskBAA" value="{{ old('pwnutritionllyatriskBAA') }}" placeholder="ex. 100">
                                        @error('pwnutritionllyatriskBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwnutritionllyatriskCAA" value="{{ old('pwnutritionllyatriskCAA') }}" placeholder="ex. 100">  
                            @error('pwnutritionllyatriskCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                </div>
                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwoverweightAAA"  value="{{ old('pwoverweightAAA') }}" placeholder="ex. 100">  
                            @error('pwoverweightAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwoverweightBAA" value="{{ old('pwoverweightBAA') }}" placeholder="ex. 100"> 
                            @error('pwoverweightBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwoverweightCAA" value="{{ old('pwoverweightCAA') }}" placeholder="ex. 100"> 
                            @error('pwoverweightCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                </div>

                                <div style="display:flex;">
                                    <div class="form-group col" style="width:170px">
                                        <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span></label>
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwobeseAAA" value="{{ old('pwobeseAAA') }}" placeholder="ex. 100">  
                            @error('pwobeseAAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1" 
                                        name="pwobeseBAA" value="{{ old('pwobeseBAA') }}" placeholder="ex. 100"> 
                            @error('pwobeseBAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                    </div>
                                    <div class="form-group col" style="margin-left:10px">
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                         name="pwobeseCAA" value="{{ old('pwobeseCAA') }}" placeholder="ex. 100">  
                            @error('pwobeseCAA')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                    <label for="exampleFormControlInput1">land Area (sqm?)</label>
                                </div>
                                <div class="form-group col">
                                    <label for="exampleFormControlInput1">Remarks</label>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Residential:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" min="1" max="1000000" class="form-control" id="exampleFormControlInput1" 
                                    name="landAreaResidential" value="{{ old('pwobeseCAA') }}"
                                    placeholder="ex.1000">  
                                    @error('pwobeseCAA')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" 
                                    placeholder="Your remarks"
                                    name="remarksResidential" value="{{ old('remarksResidential') }}">  
                            @error('remarksResidential')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Commercial:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" min="1" max="1000000"class="form-control" id="exampleFormControlInput1" 
                                    placeholder="ex.1000"
                                    name="landAreaCommercial" value="{{ old('landAreaCommercial') }}"> 
                                    @error('landAreaCommercial')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" 
                                    name="remarksCommercial" value="{{ old('landAreaCommercial') }}" 
                                    placeholder="Your remarks">  
                            @error('landAreaCommercial')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Industrial:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" min="1" max="1000000" class="form-control" id="exampleFormControlInput1" 
                                    placeholder="ex.1000"  
                                    name="landAreaIndustrial" value="{{ old('landAreaIndustrial') }}">  
                                    @error('landAreaIndustrial')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1" 
                                    name="remarksIndustrial" value="{{ old('remarksIndustrial') }}"
                                    placeholder="Your remarks">  
                                    @error('remarksIndustrial')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Agricultural:<span style="color:red">*</span></label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" min="1" max="1000000" class="form-control" id="exampleFormControlInput1" 
                                    placeholder="ex.1000"
                                    name="landAreaAgricultural" value="{{ old('landAreaAgricultural') }}" >  
                            @error('landAreaAgricultural')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textarea" class="form-control" id="exampleFormControlInput1"
                                     name="remarksAgricultural" value="{{ old('remarksAgricultural') }}" placeholder="Your remarks">  
                            @error('remarksAgricultural')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                            </div>
                            <div style="display:flex;">
                                <div class="form-group col" style="width:170px">
                                    <label for="exampleFormControlInput1">Forest Land, Mineral Land, National Park:<span style="color:red">*</span>
                                    </label>
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="number" min="1" max="1000000"class="form-control" id="exampleFormControlInput1" 
                                    name="landAreaFLMLNP" value="{{ old('landAreaFLMLNP') }}" placeholder="ex.1000">
                             @error('landAreaFLMLNP')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                </div>
                                <div class="form-group col" style="margin-left:10px">
                                    <input type="textArea" class="form-control" id="exampleFormControlInput1" 
                                    name="remarksFLMLNP" value="{{ old('remarksFLMLNP') }}" placeholder="Your remarks"> 
                            @error('remarksFLMLNP')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                Malnutrition<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Training</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="Isource">
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('Isource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU" <?php echo ( old('Isource') == 'LGU' ? 'selected':'' )  ?>  >LGU</option>
                                <option value="NGO" <?php echo ( old('Isource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private" <?php echo ( old('Isource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select> 
                             @error('Isource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="Iavailreceived">
                            <option value="">Choose...</option> 
                                <option value="YES" <?php echo ( old('Iavailreceived') == 'YES' ? 'selected':'' )  ?> >YES</option>
                                <option value="NO" <?php echo ( old('Iavailreceived') == 'NO' ? 'selected':'' )  ?> >NO</option>
                            </select>  @error('Iavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('Idatereceived') }}" name="Idatereceived">  
                            @error('Idatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"   placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" value="{{ old('Ivolumepax') }}" name="Ivolumepax"> 
                             @error('Ivolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="remarks" value="{{ old('Iremarks') }}" name="Iremarks"> 
                             @error('Iremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                            <label for="exampleFormControlInput1">1. Pregnant Women<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Dietary Supplementation</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIAsource">
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IIAsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIAsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIAsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIAsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  @error('IIAsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIAavailreceived">
                            <option value="">Choose...</option> 
                                <option value="Yes" <?php echo ( old('IIAavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                                <option value="No"  <?php echo ( old('IIAavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select> 
                             @error('IIAavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIAdatereceived') }}" name="IIAdatereceived">
                               @error('IIAdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"  placeholder="ex.1000"   class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIAvolumepax') }}" name="IIAvolumepax">  
                            @error('IIAvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIAremarks') }}" name="IIAremarks" placeholder="remarks"> 
                             @error('IIAremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">2. Children 6-23 months<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Dietary Supplementation</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIBsource" >
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IIBsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIBsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIBsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIBsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                                <option value="Private">Private</option>
                            </select>  
                            @error('IIBsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIBavailreceived" >
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IIBavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIBavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  

                            @error('IIBavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIBdatereceived') }}" name="IIBdatereceived"  >   
                            @error('IIBdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"   placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIBvolumepax') }}"  name="IIBvolumepax">  
                             @error('IIBvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIBremarks') }}" name="IIBremarks" placeholder="remarks"> 
                             @error('IIBremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                Pregnant Women<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIAsource">
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IIIAsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIIAsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIIAsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIIAsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  
                              @error('IIIAsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIAavailreceived">
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IIIAavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIIAavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select> 
                             @error('IIIAavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIAdatereceived') }}"  name="IIIAdatereceived"> 
                             @error('IIIAdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"  placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIAvolumepax') }}" name="IIIAvolumepax"> 
                             @error('IIIAvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIIAremarks') }}" name="IIIAremarks" placeholder="remarks"> 
                              @error('IIIAremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">2. Vitamin A Supplementation for children 6-11
                                months<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIBsource">
                            <option value="">Choose...</option> 
                            <option value="NGA" <?php echo ( old('IIIBsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIIBsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIIBsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIIBsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  
                            @error('IIIBsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIBavailreceived">
                            <option value="">Choose...</option>   
                            <option value="Yes" <?php echo ( old('IIIBavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIIBavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  
                            @error('IIIBavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIIBdatereceived') }}" name="IIIBdatereceived"> 
                               @error('IIIBdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"   placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIBvolumepax') }}" name="IIIBvolumepax"> 
                             @error('IIIBvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIIBremarks') }}" name="IIIBremarks" placeholder="remarks">  
                             @error('IIIBremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">3. Vitamin A Supplementation for children
                                12-59 months<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIICsource">
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IIICsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIICsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIICsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIICsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>   
                            @error('IIICsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIICavailreceived">
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IIICavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIICavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  @error('IIICavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIICdatereceived') }}" name="IIICdatereceived"> 
                             @error('IIICdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"   placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIICvolumepax') }}" name="IIICvolumepax">  
                            @error('IIICvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIICremarks') }}" name="IIICremarks" placeholder="remarks"> 
                             @error('IIICremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">4. Micronutrient Powder for children 6-23
                                months<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIDsource">
                            <option value="">Choose...</option>  
                                <option value="NGA" <?php echo ( old('IIIDsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIIDsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIIDsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIIDsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  
                             @error('IIIDsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIDavailreceived">
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IIIDavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIIDavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  
                            @error('IIIDavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1
                            " value="{{ old('IIIDdatereceived') }}" name="IIIDdatereceived"> 
                             @error('IIIDdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"  placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIDvolumepax') }}" name="IIIDvolumepax"> 
                            @error('IIIDvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIDremarks') }}" name="IIIDremarks" placeholder="remarks">  
                            @error('IIIDremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">5. Weekly Iron-Folic Acic Supplementation for
                                female adolescents in public schools<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIEsource">
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IIIEsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIIEsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIIEsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIIEsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select> 
                             @error('IIIEsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIEavailreceived">
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IIIEavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIIEavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  
                             @error('IIIEavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIEdatereceived') }}"  name="IIIEdatereceived"> 
                             @error('IIIEdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"  placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIIEvolumepax') }}" name="IIIEvolumepax"> 
                              @error('IIIEvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('IIIEremarks') }}" name="IIIEremarks" placeholder="remarks"> 
                              @error('IIIEremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="display:flex;">
                        <div class="col">
                            <label for="exampleFormControlInput1">6. Weekly Iron-Folic Acic Supplementation for
                                female adolescents in outside the public schools<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Commodity</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIFsource">                            <option value="">Choose...</option>
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IIIFsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IIIFsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IIIFsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IIIFsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  
                            @error('IIIFsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IIIFavailreceived">
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IIIFavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IIIFavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  
                            @error('IIIFavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIFdatereceived') }}" name="IIIFdatereceived">  
                            @error('IIIFdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"   placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIFvolumepax') }}" name="IIIFvolumepax"> 
                             @error('IIIFvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IIIFremarks') }}" name="IIIFremarks"  placeholder="remarks"  > 
                             @error('IIIFremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                salt<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Dropdown</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IVAsource">
                            <option value="">Choose...</option> 
                                <option value="NGA" <?php echo ( old('IVAsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('IVAsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('IVAsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('IVAsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  
                            @error('IVAsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="IVAavailreceived">
                            <option value="">Choose...</option> 
                            <option value="Yes" <?php echo ( old('IVAavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                            <option value="No"  <?php echo ( old('IVAavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select>  @error('IVAavailreceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IVAdatereceived') }}" name="IVAdatereceived"> 
                             @error('IVAdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"  placeholder="ex.1000"  class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IVAvolumepax') }}" name="IVAvolumepax"> 
                             @error('IVAvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1" 
                            value="{{ old('IVAremarks') }}" name="IVAremarks"  placeholder="remarks"  >  
                            @error('IVAremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                                Risk Reduction Management Plan<span style="color:red">*</span></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Training</label>
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="VAsource">
                            <option value="">Choose...</option>
                                <option value="NGA" <?php echo ( old('VAsource') == 'NGA' ? 'selected':'' )  ?> >NGA</option>
                                <option value="LGU"  <?php echo ( old('VAsource') == 'LGU' ? 'selected':'' )  ?> >LGU</option>
                                <option value="NGO"  <?php echo ( old('VAsource') == 'NGO' ? 'selected':'' )  ?> >NGO</option>
                                <option value="Private"  <?php echo ( old('VAsource') == 'Private' ? 'selected':'' )  ?> >Private</option>
                            </select>  @error('VAsource')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <select id="loadProvince1" class="form-control" name="VAavailreceived">
                            <option value="">Choose...</option>
                                <option value="Yes" <?php echo ( old('VAavailreceived') == 'Yes' ? 'selected':'' )  ?> >Yes</option>
                                <option value="No"  <?php echo ( old('VAavailreceived') == 'No' ? 'selected':'' )  ?> >No</option>
                            </select> 
                            @error('VAavailreceived')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="exampleFormControlInput1"
                             value="{{ old('VAdatereceived') }}" name="VAdatereceived">
                               @error('VAdatereceived')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                        <input type="number" min="1" max="100000"   placeholder="ex.1000"  class="form-control" id="e xampleFormControlInput1" 
                            value="{{ old('VAvolumepax') }}" name="VAvolumepax"> 
                             @error('VAvolumepax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                              value="{{ old('VAremarks') }}" name="VAremarks"  placeholder="remarks"  >  
                              @error('VAremarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                    <!-- <button type="submit" class="btn btn-warning ">Save as draft</button> -->
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="bold btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                    Save as Draft
                    </button>
                    <button type="button" class="bold btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                   Save and Submit
                    </button>

                </div>
            </form>
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
        <button type="submit" id="lgu-submit" class="btn btn-primary">Yes</button>
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
        <button type="submit" id="lgu-draft" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

@endsection