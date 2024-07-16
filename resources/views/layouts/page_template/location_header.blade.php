<!-- header -->
@if( $action == 'create' )
<div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <select name="barangay_id" class="form-control"  > 
                            @foreach($brgy as $brgys)
                                    <option value="{{ $brgys->id }}" <?php echo auth()->user()->barangay_id == $brgys->id  ? "selected":"" ?>  >{{ $brgys->barangay }}</option>

                            @endforeach
                        </select>
                        <!-- <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}"> -->
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <select name="municipal_id2" class="form-control" style="font-weight:bolder!important;color:black" disabled> 
                            @foreach($mun as $muns)
                                    <option value="{{ $muns->id }}" <?php echo auth()->user()->city_municipal == $muns->id  ? "selected":"" ?>  >{{ $muns->municipal }}</option>

                            @endforeach
                        </select>
                        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}" >
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>

                        <select name="province_id2" class="form-control" disabled style="font-weight:bolder!important;color:black">
                            @foreach($prov as $provs)
                                    <option value="{{ $provs->id }}" <?php echo auth()->user()->Province == $provs->id  ? "selected":"" ?>  >{{ $provs->province }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="province_id" value="{{ auth()->user()->Province }}" >
                        <!-- <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}"> -->
                        <input type="hidden" class="form-control" name="region_id" value="{{auth()->user()->Region}}">
                        <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}"> 
                    
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="dateMonitoring">Date of Monitoring:<span style="color:red">*</span></label>
                        <input type="date" class="form-control" id="dateMonitoring" name="dateMonitoring" value="{{ old('dateMonitoring') }}"  >
                        @error('dateMonitoring')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="periodCovereda">Period Covered:<span style="color:red">*</span></label>
                        <!-- <input type="date" class="form-control" id="exampleFormControlInput1" date-format="mm-yyyy"
                            name="periodCovereda"> -->
                            <select class="form-control" id="periodCovereda" name="periodCovereda" >
                
                              <?php foreach($years as $year) : ?>
                                <option value="{{ $year }}" <?php echo old('periodCovereda') == $year ? 'selected' : '' ?> >
                                    {{ $year }}
                                </option> 
                              <?php endforeach; ?>
                            </select>
                        @error('periodCovereda')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <!-- endheader -->
@endif

@if( $action == 'edit')
<div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <select name="barangay_id" class="form-control"  > 
                            @foreach($brgy as $brgys)
                                    <option value="{{ $brgys->id }}" <?php echo $lguProfile->barangay_id == $brgys->id  ? "selected":"" ?>  >{{ $brgys->barangay }}</option>

                            @endforeach
                        </select>
                        <!-- <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}"> -->
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <select name="municipal_id2" class="form-control" disabled style="font-weight:bolder!important;color:black" > 
                            @foreach($mun as $muns)
                                    <option value="{{ $muns->id }}" <?php echo $lguProfile->municipal_id == $muns->id  ? "selected":"" ?>  >{{ $muns->municipal }}</option>

                            @endforeach
                        </select>
                        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}" >
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>

                        <select name="province_id2" class="form-control" disabled style="font-weight:bolder!important;color:black" >
                            @foreach($prov as $provs)
                                    <option value="{{ $provs->id }}" <?php echo $lguProfile->municipal_id == $provs->id  ? "selected":"" ?>  >{{ $provs->province }}</option>

                            @endforeach
                        </select>
                        <input type="hidden" name="province_id" value="{{ auth()->user()->Province }}" >
                        <!-- <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}"> -->
                        <input type="hidden" class="form-control" name="region_id" value="{{$lguProfile->region_id}}">
                        <input type="hidden" class="form-control" name="user_id" value="{{$lguProfile->id}}"> 
                    
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="dateMonitoring">Date of Monitoring:<span style="color:red">*</span></label>
                        <input type="date" class="form-control" id="dateMonitoring" name="dateMonitoring" value="{{ $lguProfile->dateMonitoring }}"  >
                        @error('dateMonitoring')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="periodCovereda">Period Covered:<span style="color:red">*</span></label>
                        <!-- <input type="date" class="form-control" id="exampleFormControlInput1" date-format="mm-yyyy"
                            name="periodCovereda"> -->
                            <select class="form-control" id="periodCovereda" name="periodCovereda" >
                
                              <?php foreach($years as $year) : ?>
                                <option value="{{ $year }}" <?php echo $lguProfile->periodCovereda == $year ? 'selected' : '' ?> >
                                    {{ $year }}
                                </option> 
                              <?php endforeach; ?>
                            </select>
                        @error('periodCovereda')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <!-- endheader -->
@endif