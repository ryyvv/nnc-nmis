<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
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
                        <h4 style="margin-top:18px;font-weight:bold">EDIT LGU PROFILE (LNFP)</h4>
                    </div>

                    <br />

                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif

                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                        <form action="{{ route('MellpiProForLNFPUpdate.storeUpdate', $row->id) }}" id="lnfp-profile-form-edit" method="POST">
                            @csrf

                            @if ($row)
                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro PNAO Form: Provincial Profile Forms")}}</h5>
                            </center><br> -->

                            @include('layouts.page_template.location_header_lnfp')

                            <input type="hidden" name="submitStatus" value="1">
                            <input type="hidden" name="DraftStatus" value="2">

                            <input type="hidden" name="action" id="action" value="">

                            <input type="hidden" name="user_name" value="{{ $row->lnfp_officer }}">
                            <br>
                            

                            <div style="display:flex">
                                <!-- Div1 -->
                                <div class="col col-4 col-2">


                                    <!-- FOR CITY AND MUNICIPALITY -->
                                    @if( auth()->user()->otherrole != 10 )
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Income Class:<span style="color:red">*</span></label>
                                        <select class="form-control" name="income_class">
                                            <option value="">Select</option>
                                            <option value="1st" <?php echo ( old('income_class', $row->income_class ) == '1st' ? 'selected':'' ) ?> >1st</option>
                                            <option value="2nd" <?php echo ( old('income_class', $row->income_class ) == '2nd' ? 'selected':'' ) ?> >2nd</option>
                                            <option value="3rd" <?php echo ( old('income_class', $row->income_class ) == '3rd' ? 'selected':'' ) ?> >3rd</option>
                                            <option value="4th" <?php echo ( old('income_class', $row->income_class ) == '4th' ? 'selected':'' ) ?> >4th</option>
                                            <option value="5th" <?php echo ( old('income_class', $row->income_class ) == '5th' ? 'selected':'' ) ?> >5th</option> 
                                        </select>
                                        @error('income_class')
                                        <div class="text-danger" id="warning-mesg">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif                        



                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Municipalities:<span style="color:red">*</span> </label>
                                        <input type="number" placeholder="ex. 100" class="form-control" id="exampleFormControlInput1" name="numOfMun" value="{{ $row->numOfMuni }}">
                                        @error('numOfMun')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Total Population:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="totalPopulation" placeholder="ex. 100" value="{{ $row->totalPopulation }}">
                                        @error('totalPopulation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">No. of household with access to
                                            safe
                                            water:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput2" name="householdWater" placeholder="ex. 100" value="{{ $row->householdWater }}">
                                        @error('householdWater')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">No. of household with sanitary
                                            toilets:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput3" name="householdToilets" placeholder="ex. 100" value="{{ $row->householdToilets }}">
                                        @error('householdToilets')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Day Care Centers:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="dayCareCenter" placeholder="ex. 100" value="{{ $row->dayCareCenter }}">
                                        @error('dayCareCenter')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public elementary
                                            schools:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="elementary" placeholder="ex. 100" value="{{ $row->elementary }}">
                                        @error('elementary')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public secondary
                                            schools:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="secondarySchool" placeholder="ex. 100" value="{{ $row->secondarySchool }}">
                                        @error('secondarySchool')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of Barangay Health
                                            Stations:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="healthStations" placeholder="ex. 100" value="{{ $row->healthStations }}">
                                        @error('healthStations')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of retail outlets/sari-sari
                                            stores:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="retailOutlets" placeholder="ex. 100" value="{{ $row->retailOutlets }}">
                                        @error('retailOutlets')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of bakeries:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="bakeries" placeholder="ex. 100" value="{{ $row->bakeries }}">
                                        @error('bakeries')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of public markets:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="markets" placeholder="ex. 100" value="{{ $row->markets }}">
                                        @error('markets')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">No. of transport
                                            terminals:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="transportTerminals" placeholder="ex. 100" value="{{ $row->transportTerminals }}">
                                        @error('transportTerminals')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Percent of Lactating mothers
                                            exclusively
                                            breastfeeding
                                            until
                                            the 5th month:<span style="color:red">*</span> </label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="breastfeeding" placeholder="ex. 100" value="{{ $row->breastfeeding }}">
                                        @error('breastfeeding')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">Hazard (Type/ Month):<span style="color:red">*</span> </label>
                                            <input class="form-control" id="exampleFormControlInput1" name="hazards" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" placeholder="ex. 100" value="{{ $row->hazards }}">
                                            @error('hazards')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">LGU/Households
                                                affected:<span style="color:red">*</span> </label>
                                            <input class="form-control" id="exampleFormControlInput1" name="affectedLGU" height="800px" style="max-height:380px;height:300px;border: 1px solid lightgray;border-radius:5px" placeholder="ex. 100" value="{{ $row->affectedLGU }}">
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
                                            <label for="exampleFormControlInput1">No. of households:<span style="color:red">*</span> </label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="noHousehold" placeholder="ex. 100" value="{{ $row->noHousehold }}">
                                            @error('noHousehold')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col">
                                            <label for="exampleFormControlInput1">No.of SITIOS/PUROKS:<span style="color:red">*</span> </label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" name="noPuroks" placeholder="ex. 100" value="{{ $row->noPuroks }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationA" placeholder="ex. 100" value="{{ $row->populationA }}">
                                                @error('populationA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationB" placeholder="ex. 100" value="{{ $row->populationB }}">
                                                @error('populationB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationC" placeholder="ex. 100" value="{{ $row->populationC }}">
                                                @error('populationC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationD" placeholder="ex. 100" value="{{ $row->populationD }}">
                                                @error('populationD')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationE" placeholder="ex. 100" value="{{ $row->populationE }}">
                                                @error('populationE')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="populationF" placeholder="ex. 100" value="{{ $row->populationF }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualA" placeholder="ex. 100" value="{{ $row->actualA }}">
                                                @error('actualA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualB" placeholder="ex. 100" value="{{ $row->actualB }}">
                                                @error('actualB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualC" placeholder="ex. 100" value="{{ $row->actualC }}">
                                                @error('actualC')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualD" placeholder="ex. 100" value="{{ $row->actualD }}">
                                                @error('actualD')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualE" placeholder="ex. 100" value="{{ $row->actualE }}">
                                                @error('actualE')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="actualF" placeholder="ex. 100" value="{{ $row->actualF }}">
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
                                                @error('psnormalAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBAA" placeholder="ex. 100" value="{{ $row->psnormalBAA }}">
                                                @error('psnormalBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCAA" placeholder="ex. 100" value="{{ $row->psnormalCAA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightAAA" placeholder="ex. 100" value="{{ $row->psunderweightAAA }}">
                                                @error('psunderweightAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightBAA" placeholder="ex. 100" value="{{ $row->psunderweightBAA }}">
                                                @error('psunderweightBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psunderweightCAA" placeholder="ex. 100" value="{{ $row->psunderweightCAA }}">
                                                @error('psunderweightCAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div class="form-group col" style="width:170px">
                                                <label for="exampleFormControlInput1">Severely Underweight:<span style="color:red">*</span>
                                                </label>
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightAAA" placeholder="ex. 100" value="{{ $row->pssevereUnderweightAAA }}">
                                                @error('pssevereUnderweightAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightBAA" placeholder="ex. 100" value="{{ $row->pssevereUnderweightBAA }}">
                                                @error('pssevereUnderweightBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereUnderweightCAA" placeholder="ex. 100" value="{{ $row->pssevereUnderweightCAA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightAAA" placeholder="ex. 100" value="{{ $row->psoverweightAAA }}">
                                                @error('psoverweightAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightBAA" placeholder="ex. 100" value="{{ $row->psoverweightBAA }}">
                                                @error('psoverweightBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightCAA" placeholder="ex. 100" value="{{ $row->psoverweightCAA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalABA" placeholder="ex. 100" value="{{ $row->psnormalABA }}">
                                                @error('psnormalABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBBA" placeholder="ex. 100" value="{{ $row->psnormalBBA }}">
                                                @error('psnormalBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCCA" placeholder="ex. 100" value="{{ $row->psnormalCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedABA" placeholder="ex. 100" value="{{ $row->pswastedABA }}">
                                                @error('pswastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedBBA" placeholder="ex. 100" value="{{ $row->pswastedBBA }}">
                                                @error('pswastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pswastedCCA" placeholder="ex. 100" value="{{ $row->pswastedCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedABA" placeholder="ex. 100" value="{{ $row->psseverelyWastedABA }}">
                                                @error('psseverelyWastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedBBA" placeholder="ex. 100" value="{{ $row->psseverelyWastedBBA }}">
                                                @error('psseverelyWastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psseverelyWastedCCA" placeholder="ex. 100" value="{{ $row->psseverelyWastedCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightABA" placeholder="ex. 100" value="{{ $row->psoverweightABA }}">
                                                @error('psoverweightABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightBBA" placeholder="ex. 100" value="{{ $row->psoverweightBBA }}">
                                                @error('psoverweightBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psoverweightCCA" placeholder="ex. 100" value="{{ $row->psoverweightCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseABA" placeholder="ex. 100" value="{{ $row->psobeseABA }}">
                                                @error('psobeseABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseBBA" placeholder="ex. 100" value="{{ $row->psobeseBBA }}">
                                                @error('psobeseBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psobeseCCA" placeholder="ex. 100" value="{{ $row->psobeseCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalAAB" placeholder="ex. 100" value="{{ $row->psnormalAAB }}">
                                                @error('psnormalAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalBBB" placeholder="ex. 100" value="{{ $row->psnormalBBB }}">
                                                @error('psnormalBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psnormalCCC" placeholder="ex. 100" value="{{ $row->psnormalCCC }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedAAB" placeholder="ex. 100" value="{{ $row->psstuntedAAB }}">
                                                @error('psstuntedAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedBBB" placeholder="ex. 100" value="{{ $row->psstuntedBBB }}">
                                                @error('psstuntedBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="psstuntedCCC" placeholder="ex. 100" value="{{ $row->psstuntedCCC }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedAAB" placeholder="ex. 100" value="{{ $row->pssevereStuntedAAB }}">
                                                @error('pssevereStuntedAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedBBB" placeholder="ex. 100" value="{{ $row->pssevereStuntedBBB }}">
                                                @error('pssevereStuntedBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pssevereStuntedCCC" placeholder="ex. 100" value="{{ $row->pssevereStuntedCCC }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallAAB" placeholder="ex. 100" value="{{ $row->pstallAAB }}">
                                                @error('pstallAAB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallBBB" placeholder="ex. 100" value="{{ $row->pstallBBB }}">
                                                @error('pstallBBB')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="pstallCCC" placeholder="ex. 100" value="{{ $row->pstallCCC }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalABA" placeholder="ex. 100" value="{{ $row->scnormalABA }}">
                                                @error('scnormalABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalBBA" placeholder="ex. 100" value="{{ $row->scnormalBBA }}">
                                                @error('scnormalBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scnormalCCA" placeholder="ex. 100" value="{{ $row->scnormalCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedABA" placeholder="ex. 100" value="{{ $row->scwastedABA }}">
                                                @error('scwastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedBBA" placeholder="ex. 100" value="{{ $row->scwastedBBA }}">
                                                @error('scwastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scwastedCCA" placeholder="ex. 100" value="{{ $row->scwastedCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedABA" placeholder="ex. 100" value="{{ $row->scseverelyWastedABA }}">
                                                @error('scseverelyWastedABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedBBA" placeholder="ex. 100" value="{{ $row->scseverelyWastedBBA }}">
                                                @error('scseverelyWastedBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scseverelyWastedCCA" placeholder="ex. 100" value="{{ $row->scseverelyWastedCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightABA" placeholder="ex. 100" value="{{ $row->scoverweightABA }}">
                                                @error('scoverweightABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightBBA" placeholder="ex. 100" value="{{ $row->scoverweightBBA }}">
                                                @error('scoverweightBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scoverweightCCA" placeholder="ex. 100" value="{{ $row->scoverweightCCA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseABA" placeholder="ex. 100" value="{{ $row->scobeseABA }}">
                                                @error('scobeseABA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseBBA" placeholder="ex. 100" value="{{ $row->scobeseBBA }}">
                                                @error('scobeseBBA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="scobeseCCA" placeholder="ex. 100" value="{{ $row->scobeseCCA }}">
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
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalAAA" placeholder="ex. 100" value="{{ $row->pwnormalAAA }}">
                                                    @error('pwnormalAAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalBAA" placeholder="ex. 100" value="{{ $row->pwnormalBAA }}">
                                                    @error('pwnormalBAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnormalCAA" placeholder="ex. 100" value="{{ $row->pwnormalCAA }}">
                                                    @error('pwnormalCAA')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div style="display:flex;">
                                                <div class="form-group col" style="width:170px">
                                                    <label for="exampleFormControlInput1">Nutritionally at-risk:<span style="color:red">*</span>
                                                    </label>
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskAAA" placeholder="ex. 100" value="{{ $row->pwnutritionllyatriskAAA }}">
                                                    @error('pwnutritionllyatriskAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskBAA" placeholder="ex. 100" value="{{ $row->pwnutritionllyatriskBAA }}">
                                                    @error('pwnutritionllyatriskBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwnutritionllyatriskCAA" placeholder="ex. 100" value="{{ $row->pwnutritionllyatriskCAA }}">
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
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightAAA" placeholder="ex. 100" value="{{ $row->pwoverweightAAA }}">
                                                    @error('pwoverweightAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightBAA" placeholder="ex. 100" value="{{ $row->pwoverweightBAA }}">
                                                    @error('pwoverweightBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwoverweightCAA" placeholder="ex. 100" value="{{ $row->pwoverweightCAA }}">
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
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseAAA" placeholder="ex. 100" value="{{ $row->pwobeseAAA }}">
                                                    @error('pwobeseAAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseBAA" placeholder="ex. 100" value="{{ $row->pwobeseBAA }}">
                                                    @error('pwobeseBAA')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col" style="margin-left:10px">
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="pwobeseCAA" placeholder="ex. 100" value="{{ $row->pwobeseCAA }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="newNutritionScholar" placeholder="ex. 100" value="{{ $row->newBrgyScholar }}">
                                                @error('newNutritionScholar')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="oldNutritionScholar" placeholder="ex. 100" value="{{ $row->oldBrgyScholar }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaResidential" placeholder="ex. 100" value="{{ $row->landAreaResidential }}">
                                                @error('landAreaResidential')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksResidential" placeholder="ex. 100" value="{{ $row->remarksResidential }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaCommercial" placeholder="ex. 100" value="{{ $row->landAreaCommercial }}">
                                                @error('landAreaCommercial')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksCommercial" placeholder="ex. 100" value="{{ $row->remarksCommercial }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaIndustrial" placeholder="ex. 100" value="{{ $row->landAreaIndustrial }}">
                                                @error('landAreaIndustrial')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksIndustrial" placeholder="ex. 100" value="{{ $row->remarksIndustrial }}">
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
                                                <input type="number" class="form-control" id="exampleFormControlInput1" name="landAreaAgricultural" placeholder="ex. 100" value="{{ $row->landAreaAgricultural }}">
                                                @error('landAreaAgricultural')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textarea" class="form-control" id="exampleFormControlInput1" name="remarksAgricultural" placeholder="ex. 100" value="{{ $row->remarksAgricultural }}">
                                                @error('remarksAgricultural')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                                @error('landAreaFLMLNP')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col" style="margin-left:10px">
                                                <input type="textArea" class="form-control" id="exampleFormControlInput1" name="remarksFLMLNP" placeholder="ex. 100" value="{{ $row->remarksFLMLNP }}">
                                                @error('remarksFLMLNP')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if ($row->status != 1)
                            <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                    Save as Draft
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Next Form
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
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
</div> -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                <div  >
                <lord-icon
                    src="https://cdn.lordicon.com/yqiuuheo.json"
                    trigger="hover"
                    colors="primary:#109121,secondary:#d1fad7"
                    style="width:150px;height:150px">
                </lord-icon>
                </div>
                <!-- <div class="bold" style="font-size: 25px;color:#109121"> -->
                <div class="bold" style="font-size: 25px;color:#59987e">
                    Confirm Submission?
                </div>
                <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px" >
                    Are you sure you want to save and submit this form? This process cannot be undone.
                </div>
                <div>
                    <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    <button type="button" id="lnfplgu-submit-with-id" class="bold btn btn-danger" style="background-color:#59987e!important"  >YES</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenterDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
</div> -->
<div class="modal fade" id="exampleModalCenterDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
        <div class="modal-content"> 
            <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                <div  >
                <!-- <lord-icon
                    src="https://cdn.lordicon.com/yqiuuheo.json"
                    trigger="loop"
                    colors="primary:#918d10,secondary:#faf9d1"
                    style="width:150px;height:150px">
                </lord-icon> -->
                <lord-icon
                    src="https://cdn.lordicon.com/yqiuuheo.json"
                    trigger="hover"
                    colors="primary:#faf9d1,secondary:#ffbe55"
                    style="width:150px;height:150px">
                </lord-icon>
                </div>
                <div class="bold" style="font-size: 25px;color:#e88c30">
                    Save as draft?
                </div>
                <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px" >
                    Are you sure you want to save this as a draft?
                </div>
                <div>
                    <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    <button type="button" class="bold btn btn-danger" id="lnfplgu-draft-with-id" style="background-color:#ffbe55!important;color:white!important" >YES</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection