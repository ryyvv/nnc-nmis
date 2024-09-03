<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<!-- <script src="{{ asset('assets') }}/js/Barangay.js"></script> -->
<script src="https://cdn.lordicon.com/lordicon.js"></script>

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
                        <h4 style="margin-top:18px;font-weight:bold">CREATE LGU PROFILE (LNFP)</h4>
                    </div>
                    <!-- @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif -->

                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div style="padding:25px">
                        <form action="{{ route('MellpiProForLNFPSubmit.storeSubmit') }}" id="form" method="POST">
                            @csrf
                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro PNAO Form: Provincial Profile Form")}}</h5>
                            </center><br> -->

                            @include('layouts.page_template.location_header')

                            
                            <input type="hidden" value="" name="status" id="status">
                            <!-- <input type="hidden" value="" name="formrequest" id="formrequest" /> -->

                         

                            <!-- endheader -->
                            <br>

                            <div style="display:flex">
                                <!-- Div1 -->
                                <div class="col col-4 col-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Municipalities:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" class="form-control" value="{{ old('numOfMun') }}" id="exampleFormControlInput1" name="numOfMun">
                                        @error('numOfMun')
                                        <div class="text-danger" id="warning-mesg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Total Population:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('totalPopulation') }}" class="form-control" id="exampleFormControlInput1" name="totalPopulation">
                                        @error('totalPopulation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">No. of household with access to
                                            safe
                                            water:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('householdWater') }}" class="form-control" id="exampleFormControlInput2" name="householdWater">
                                        @error('householdWater')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">No. of household with sanitary
                                            toilets:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('householdToilets') }}" class="form-control" id="exampleFormControlInput3" name="householdToilets">
                                        @error('householdToilets')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Day Care Centers</label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('dayCareCenter') }}" class="form-control" id="exampleFormControlInput1" name="dayCareCenter">
                                        @error('dayCareCenter')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public elementary
                                            schools:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('elementary') }}" class="form-control" id="exampleFormControlInput1" name="elementary">
                                        @error('elementary')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public secondary
                                            schools:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('secondarySchool') }}" class="form-control" id="exampleFormControlInput1" name="secondarySchool">
                                        @error('secondarySchool')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Barangay Health
                                            Stations:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('healthStations') }}" class="form-control" id="exampleFormControlInput1" name="healthStations">
                                        @error('healthStations')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of retail outlets/sari-sari
                                            stores:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('retailOutlets') }}" class="form-control" id="exampleFormControlInput1" name="retailOutlets">
                                        @error('retailOutlets')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of bakeries:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('bakeries') }}" class="form-control" id="exampleFormControlInput1" name="bakeries">
                                        @error('bakeries')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public markets:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('markets') }}" class="form-control" id="exampleFormControlInput1" name="markets">
                                        @error('markets')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of transport
                                            terminals:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('transportTerminals') }}" class="form-control" id="exampleFormControlInput1" name="transportTerminals">
                                        @error('transportTerminals')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Percent of Lactating mothers
                                            exclusively
                                            breastfeeding
                                            until
                                            the 5th month:<span style="color:red">*</span></label>
                                        <input type="number" min="1" placeholder="ex. 100" value="{{ old('breastfeeding') }}" class="form-control" id="exampleFormControlInput1" name="breastfeeding">
                                        @error('breastfeeding')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">Hazard (Type/ Month):<span style="color:red">*</span></label>
                                            <textarea class="form-control" id="exampleFormControlInput1" name="hazards" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px">{{ old('hazards') }}</textarea>
                                            @error('hazards')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">LGU/Households
                                                affected:<span style="color:red">*</span></label>
                                            <textarea class="form-control" id="exampleFormControlInput1" name="affectedLGU" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px">{{ old('affectedLGU') }}</textarea>
                                            @error('affectedLGU')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <!-- div2 -->
                                <div class="col col-8 col-4">
                                    <div style="display:flex" class="row">
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No. of households:<span style="color:red">*</span></label>
                                            <input type="number" min="1" placeholder="ex. 100" value="{{ old('noHousehold') }}" class="form-control" id="exampleFormControlInput1" name="noHousehold">
                                            @error('noHousehold')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:<span style="color:red">*</span></label>
                                            <input type="number" min="1" placeholder="ex. 100" value="{{ old('noPuroks') }}" class="form-control" id="exampleFormControlInput1" name="noPuroks">
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
                                                <label for="exampleFormControlInput1"><b>6-11mos</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>6-23mos</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>12-59mos</b></label>
                                            </div>
                                            <div class="col">
                                                <label for="exampleFormControlInput1"><b>0-59mos</b></label>
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
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('populationA') }}" class="form-control" id="exampleFormControlInput1" name="populationA">
                                                @error('populationA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('populationB') }}" class="form-control" id="exampleFormControlInput1" name="populationB">
                                                @error('populationB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('populationC') }}" class="form-control" id="exampleFormControlInput1" name="populationC">
                                                @error('populationC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('populationD') }}" class="form-control" id="exampleFormControlInput1" name="populationD">
                                                @error('populationD')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('populationE') }}" class="form-control" id="exampleFormControlInput1" name="populationE">
                                                @error('populationE')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('populationF') }}" class="form-control" id="exampleFormControlInput1" name="populationF">
                                                @error('populationF')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group" style="width:170px">
                                                <label for="exampleFormControlInput1">Actual:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('actualA') }}" class="form-control" id="exampleFormControlInput1" name="actualA">
                                                @error('actualA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('actualB') }}" class="form-control" id="exampleFormControlInput1" name="actualB">
                                                @error('actualB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('actualC') }}" class="form-control" id="exampleFormControlInput1" name="actualC">
                                                @error('actualC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('actualD') }}" class="form-control" id="exampleFormControlInput1" name="actualD">
                                                @error('actualD')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('actualE') }}" class="form-control" id="exampleFormControlInput1" name="actualE">
                                                @error('actualE')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('actualF') }}" class="form-control" id="exampleFormControlInput1" name="actualF">
                                                @error('actualF')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalAAA') }}" class="form-control" id="exampleFormControlInput1" name="psnormalAAA">
                                                @error('psnormalAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalBAA') }}" class="form-control" id="exampleFormControlInput1" name="psnormalBAA">
                                                @error('psnormalBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalCAA') }}" class="form-control" id="exampleFormControlInput1" name="psnormalCAA">
                                                @error('psnormalCAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Underweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psunderweightAAA') }}" class="form-control" id="exampleFormControlInput1" name="psunderweightAAA">
                                                @error('psunderweightAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psunderweightBAA') }}" class="form-control" id="exampleFormControlInput1" name="psunderweightBAA">
                                                @error('psunderweightBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psunderweightCAA') }}" class="form-control" id="exampleFormControlInput1" name="psunderweightCAA">
                                                @error('psunderweightCAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Underweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pssevereUnderweightAAA') }}" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightAAA">
                                                @error('pssevereUnderweightAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pssevereUnderweightBAA') }}" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightBAA">
                                                @error('pssevereUnderweightBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pssevereUnderweightCAA') }}" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightCAA">
                                                @error('pssevereUnderweightCAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psoverweightAAA') }}" class="form-control" id="exampleFormControlInput1" name="psoverweightAAA">
                                                @error('psoverweightAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psoverweightBAA') }}" class="form-control" id="exampleFormControlInput1" name="psoverweightBAA">
                                                @error('psoverweightBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psoverweightCAA') }}" class="form-control" id="exampleFormControlInput1" name="psoverweightCAA">
                                                @error('psoverweightCAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Obese -->
                                        <br>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalABA') }}" class="form-control" id="exampleFormControlInput1" name="psnormalABA">
                                                @error('psnormalABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalBBA') }}" class="form-control" id="exampleFormControlInput1" name="psnormalBBA">
                                                @error('psnormalBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalCCA') }}" class="form-control" id="exampleFormControlInput1" name="psnormalCCA">
                                                @error('psnormalCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pswastedABA') }}" class="form-control" id="exampleFormControlInput1" name="pswastedABA">
                                                @error('pswastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pswastedBBA') }}" class="form-control" id="exampleFormControlInput1" name="pswastedBBA">
                                                @error('pswastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pswastedCCA') }}" class="form-control" id="exampleFormControlInput1" name="pswastedCCA">
                                                @error('pswastedCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psseverelyWastedABA') }}" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedABA">
                                                @error('psseverelyWastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psseverelyWastedBBA') }}" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedBBA">
                                                @error('psseverelyWastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psseverelyWastedCCA') }}" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedCCA">
                                                @error('psseverelyWastedCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psoverweightABA') }}" class="form-control" id="exampleFormControlInput1" name="psoverweightABA">
                                                @error('psoverweightABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psoverweightBBA') }}" class="form-control" id="exampleFormControlInput1" name="psoverweightBBA">
                                                @error('psoverweightBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psoverweightCCA') }}" class="form-control" id="exampleFormControlInput1" name="psoverweightCCA">
                                                @error('psoverweightCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psobeseABA') }}" class="form-control" id="exampleFormControlInput1" name="psobeseABA">
                                                @error('psobeseABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psobeseBBA') }}" class="form-control" id="exampleFormControlInput1" name="psobeseBBA">
                                                @error('psobeseBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psobeseCCA') }}" class="form-control" id="exampleFormControlInput1" name="psobeseCCA">
                                                @error('psobeseCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>


                                        <!-- tall -->
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalAAB') }}" class="form-control" id="exampleFormControlInput1" name="psnormalAAB">
                                                @error('psnormalAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalBBB') }}" class="form-control" id="exampleFormControlInput1" name="psnormalBBB">
                                                @error('psnormalBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psnormalCCC') }}" class="form-control" id="exampleFormControlInput1" name="psnormalCCC">
                                                @error('psnormalCCC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Stunted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psstuntedAAB') }}" class="form-control" id="exampleFormControlInput1" name="psstuntedAAB">
                                                @error('psstuntedAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psstuntedBBB') }}" class="form-control" id="exampleFormControlInput1" name="psstuntedBBB">
                                                @error('psstuntedBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('psstuntedCCC') }}" class="form-control" id="exampleFormControlInput1" name="psstuntedCCC">
                                                @error('psstuntedCCC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Stunted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pssevereStuntedAAB') }}" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedAAB">
                                                @error('pssevereStuntedAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pssevereStuntedBBB') }}" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedBBB">
                                                @error('pssevereStuntedBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pssevereStuntedCCC') }}" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedCCC">
                                                @error('pssevereStuntedCCC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Tall:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pstallAAB') }}" class="form-control" id="exampleFormControlInput1" name="pstallAAB">
                                                @error('pstallAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pstallBBB') }}" class="form-control" id="exampleFormControlInput1" name="pstallBBB">
                                                @error('pstallBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('pstallCCC') }}" class="form-control" id="exampleFormControlInput1" name="pstallCCC">
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

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Normal:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scnormalABA') }}" class="form-control" id="exampleFormControlInput1" name="scnormalABA">
                                                @error('scnormalABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scnormalBBA') }}" class="form-control" id="exampleFormControlInput1" name="scnormalBBA">
                                                @error('scnormalBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scnormalCCA') }}" class="form-control" id="exampleFormControlInput1" name="scnormalCCA">
                                                @error('scnormalCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scwastedABA') }}" class="form-control" id="exampleFormControlInput1" name="scwastedABA">
                                                @error('scwastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scwastedBBA') }}" class="form-control" id="exampleFormControlInput1" name="scwastedBBA">
                                                @error('scwastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scwastedCCA') }}" class="form-control" id="exampleFormControlInput1" name="scwastedCCA">
                                                @error('scwastedCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Wasted:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scseverelyWastedABA') }}" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedABA">
                                                @error('scseverelyWastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scseverelyWastedBBA') }}" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedBBA">
                                                @error('scseverelyWastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scseverelyWastedCCA') }}" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedCCA">
                                                @error('scseverelyWastedCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scoverweightABA') }}" class="form-control" id="exampleFormControlInput1" name="scoverweightABA">
                                                @error('scoverweightABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scoverweightBBA') }}" class="form-control" id="exampleFormControlInput1" name="scoverweightBBA">
                                                @error('scoverweightBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scoverweightCCA') }}" class="form-control" id="exampleFormControlInput1" name="scoverweightCCA">
                                                @error('scoverweightCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scobeseABA') }}" class="form-control" id="exampleFormControlInput1" name="scobeseABA">
                                                @error('scobeseABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scobeseBBA') }}" class="form-control" id="exampleFormControlInput1" name="scobeseBBA">
                                                @error('scobeseBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('scobeseCCA') }}" class="form-control" id="exampleFormControlInput1" name="scobeseCCA">
                                                @error('scobeseCCA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwnormalAAA') }}" class="form-control" id="exampleFormControlInput1" name="pwnormalAAA">
                                                    @error('pwnormalAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwnormalBAA') }}" class="form-control" id="exampleFormControlInput1" name="pwnormalBAA">
                                                    @error('pwnormalBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwnormalCAA') }}" class="form-control" id="exampleFormControlInput1" name="pwnormalCAA">
                                                    @error('pwnormalCAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Nutritionally at-risk:<span style="color:red">*</span> </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwnutritionllyatriskAAA') }}" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskAAA">
                                                    @error('pwnutritionllyatriskAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwnutritionllyatriskBAA') }}" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskBAA">
                                                    @error('pwnutritionllyatriskBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwnutritionllyatriskCAA') }}" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskCAA">
                                                    @error('pwnutritionllyatriskCAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Overweight:<span style="color:red">*</span> </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwoverweightAAA') }}" class="form-control" id="exampleFormControlInput1" name="pwoverweightAAA">
                                                    @error('pwoverweightAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwoverweightBAA') }}" class="form-control" id="exampleFormControlInput1" name="pwoverweightBAA">
                                                    @error('pwoverweightBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwoverweightCAA') }}" class="form-control" id="exampleFormControlInput1" name="pwoverweightCAA">
                                                    @error('pwoverweightCAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Obese:<span style="color:red">*</span> </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwobeseAAA') }}" class="form-control" id="exampleFormControlInput1" name="pwobeseAAA">
                                                    @error('pwobeseAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwobeseBAA') }}" class="form-control" id="exampleFormControlInput1" name="pwobeseBAA">
                                                    @error('pwobeseBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" min="1" placeholder="ex. 100" value="{{ old('pwobeseCAA') }}" class="form-control" id="exampleFormControlInput1" name="pwobeseCAA">
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
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('newNutritionScholar') }}" class="form-control" id="exampleFormControlInput1" name="newNutritionScholar">
                                                @error('newNutritionScholar')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('oldNutritionScholar') }}" class="form-control" id="exampleFormControlInput1" name="oldNutritionScholar">
                                                @error('oldNutritionScholar')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('landAreaResidential') }}" class="form-control" id="exampleFormControlInput1" name="landAreaResidential">
                                                @error('landAreaResidential')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" value="{{ old('remarksResidential') }}" name="remarksResidential">
                                                @error('remarksResidential')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Commercial:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('landAreaCommercial') }}" class="form-control" id="exampleFormControlInput1" name="landAreaCommercial">
                                                @error('landAreaCommercial')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" value="{{ old('remarksCommercial') }}" name="remarksCommercial">
                                                @error('remarksCommercial')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Industrial:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('landAreaIndustrial') }}" class="form-control" id="exampleFormControlInput1" name="landAreaIndustrial">
                                                @error('landAreaIndustrial')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" value="{{ old('remarksIndustrial') }}" name="remarksIndustrial">
                                                @error('remarksIndustrial')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Agricultural:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('landAreaAgricultural') }}" class="form-control" id="exampleFormControlInput1" name="landAreaAgricultural">
                                                @error('landAreaAgricultural')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" value="{{ old('remarksAgricultural') }}" name="remarksAgricultural">
                                                @error('remarksAgricultural')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Forest Land, Mineral Land,
                                                    National Park:<span style="color:red">*</span> </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" min="1" placeholder="ex. 100" value="{{ old('landAreaFLMLNP') }}" class="form-control" id="exampleFormControlInput1" name="landAreaFLMLNP">
                                                @error('landAreaFLMLNP')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textArea" class="form-control" id="exampleFormControlInput1" value="{{ old('remarksFLMLNP') }}" name="remarksFLMLNP">
                                                @error('remarksFLMLNP')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                    Save as Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" id="next-submit" data-target="#exampleModalCenter">
                                    Next Form
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@include('Modal.Draft')
@include('Modal.Submit')

@endsection