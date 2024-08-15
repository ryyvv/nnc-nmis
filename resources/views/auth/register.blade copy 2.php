<head>
        <!-- Other head content -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    </head>

    @extends('layouts.app', [
    'namePage' => 'NMIS',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/background1.png",
    ])

    @section('content')
    <div class="content">
        <div style="margin-left:15%!important;margin-right:15%!important">
            <!-- <div class="row-lg-12 d-flex" > -->

            <div class="col-md-12 d-flex" style="padding-left:0px">
                <div class="card card-signup text-center">

                    <div class="card-body d-flex" style="align-items:center;justify-content:center!important">
                        <!-- left -->
                        <div class="col-5" >
                            <div class="row" style="justify-content:center!important">
                                <img src="/assets/img/logo.png" alt="NNC logo" height="300px" width="300px">
                            </div>
                            <div class="row" style="justify-content:center!important; margin-top:20px">
                                <label style="font-size: 40px;color:#59987e" for="">Nutrition Management Nutrition System</label>
                            </div>
                        </div>

                        <!-- right -->
                        <!-- style="padding-left:20px;border-left: 2px solid gray" -->
                        <div class="col-7" >
                            <div class="card-header">
                                <h4 class="bold card-title" style="color:#59987e">{{ __('Register') }}</h4>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf 
                                <input type="hidden" name="role" value="pending">

                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('Firstname') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('Firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;"  value="{{ old('Firstname') }}" name="Firstname" required autofocus>
                                    </div>
                                    @if ($errors->has('Firstname'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Firstname') }}</strong>
                                    </span>
                                    @endif


                                    <div class="input-group  form-control-lg {{ $errors->has('Middlename') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('Middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;"  value="{{ old('Middlename') }}"  name="Middlename" required autofocus>
                                    </div>
                                    @if ($errors->has('Middlename'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Middlename') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('Lastname') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('Lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;"   value="{{ old('Lastname') }}" name="Lastname" required autofocus>
                                    </div>
                                    @if ($errors->has('Lastname'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- address/location -->
                                <div>
                                    <div class="d-flex">
                                        <!-- Region -->
                                        <div class="input-group form-control-lg {{ $errors->has('Region') ? 'has-danger' : '' }}" style="border-radius: 40px; margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select id="regionSelect" class="form-control text-dark {{ $errors->has('Region') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="Region" required>
                                                <!-- <option value="">Select your Region</option>  -->
                                                <option value="428" selected>Region</option>
                                            </select>
                                        </div>
                                        <!-- @if ($errors->has('Region'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('Region') }}</strong>
                                        </span>
                                        @endif -->

                                        <!-- Province -->
                                        <div class="input-group form-control-lg {{ $errors->has('Province') ? 'has-danger' : '' }}" style="border-radius: 40px;">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select  id="provinceSelect" class="form-control text-dark {{ $errors->has('Province') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="Province" required>
                                                <!-- <option value="">Select your Province</option>  -->
                                                <option value="1301" selected>Province</option>
                                            </select>
                                        </div>
                                        <!-- @if ($errors->has('Province'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('Province') }}</strong>
                                        </span>
                                        @endif -->
                                    </div>

                                    <div class="d-flex">
                                        <!-- Municipal -->
                                        <div class="input-group form-control-lg {{ $errors->has('city_municipal') ? 'has-danger' : '' }}" style="border-radius: 40px;margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select id="citySelect" class="form-control text-dark {{ $errors->has('city_municipal') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="city_municipal" required>
                                                <!-- <option value="">Select your City/Municipal</option>  -->
                                                <option value="1923" selected>City/Municipality</option>
                                            </select>
                                        </div>
                                        <!-- @if ($errors->has('city_municipal'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('city_municipal') }}</strong>
                                        </span>
                                        @endif -->

                                        <!-- Barangay -->
                                        <div class="input-group form-control-lg {{ $errors->has('barangay') ? 'has-danger' : '' }}" style="border-radius: 40px; ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select id="barangaySelect" class="form-control text-dark {{ $errors->has('barangay') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" value="{{ old('barangay') }}" name="barangay" >
                                                <option value="Suyo">Select your Barangay</option>
                                                <option value="Suyo">Suyo-Sample</option> 
                                            </select>
                                        </div>
                                        <!-- @if ($errors->has('barangay'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('barangay') }}</strong>
                                        </span>
                                        @endif -->
                                    </div>
                                </div>

                                <!-- workstation/designation -->
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('agency_office_lgu') ? 'is-invalid' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('agency_office_lgu') ? ' is-invalid' : '' }}" placeholder="{{ __('Agency/Office/Unit') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;"    value="{{ old('agency_office_lgu') }}" name="agency_office_lgu" required autofocus>
                                    </div>
                                    @if ($errors->has('agency_office_lgu'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('agency_office_lgu') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('Division_unit') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('Division_unit') ? ' is-invalid' : '' }}" placeholder="{{ __('Division Unit ') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;"  value="{{ old('Division_unit') }}"  name="Division_unit" required autofocus>
                                    </div>
                                    @if ($errors->has('Division_unit'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Division_unit') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('designation') ? ' has-danger' : '' }}" style="border-radius:40px; ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation/Position') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" value="{{ old('designation') }}"  name="designation" required autofocus>
                                    </div>
                                    @if ($errors->has('designation'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- user email and password -->
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email"  value="{{ old('email') }}" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif


                                    <!-- password -->
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px; margin-right:15px">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="password" name="password" required autofocus>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <!-- Confirm-password -->
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="password"
                                            name="password_confirmation" required>
                                    </div>
                                    <!-- @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif -->

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="bold btn btn-primary btn-round btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

 
            @include('layouts.footer')
            @endsection

            @push('js')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    function loadRegions(regionSelectId) {
                        $.ajax({
                            url: '{{ route("regions.get") }}',
                            method: 'GET',
                            success: function(response) {
                                console.log('Regions:', response);
                                let regionSelect = $(regionSelectId);
                                regionSelect.find('option:not(:first)').remove();
                                response.forEach(function(region) {
                                    regionSelect.append(new Option(region.region, region.id));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading regions:', xhr.responseText);
                                alert('Error loading regions');
                            }
                        });
                    }

                    function loadProvincesByRegion(regionId, provinceSelectId) {
                        console.log('Loading provinces for region:', regionId);
                        $.ajax({
                            url: '{{ url("provinces") }}/' + regionId,
                            method: 'GET',
                            success: function(response) {
                                console.log('Provinces:', response);
                                let provinceSelect = $(provinceSelectId);
                                provinceSelect.find('option:not(:first)').remove();
                                response.forEach(function(province) {
                                    provinceSelect.append(new Option(province.province, province.provcode));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading provinces:', xhr.responseText);
                                alert('Error loading provinces');
                            }
                        });
                    }

                    function loadCitiesByProvince(provcode, citySelectId) {
                        console.log('Loading cities for province code:', provcode);
                        $.ajax({
                            url: '{{ url("cities") }}/' + provcode,
                            method: 'GET',
                            success: function(response) {
                                console.log('Cities:', response);
                                let citySelect = $(citySelectId);
                                citySelect.find('option:not(:first)').remove();
                                response.forEach(function(city) {
                                    citySelect.append(new Option(city.cityname, city.provcode));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading cities:', xhr.responseText);
                                alert('Error loading cities');
                            }
                        });
                    }

                    function loadBarangaysByCity(cityId, barangaySelectId) {
                        console.log('Loading barangays for city:', cityId);
                        $.ajax({
                            url: '{{ url("barangays") }}/' + cityId,
                            method: 'GET',
                            success: function(response) {
                                console.log('Barangays:', response);
                                let barangaySelect = $(barangaySelectId);
                                barangaySelect.find('option:not(:first)').remove();
                                response.forEach(function(barangay) {
                                    barangaySelect.append(new Option(barangay.barangay, barangay.id));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading barangays:', xhr.responseText);
                                alert('Error loading barangays');
                            }
                        });
                    }

                    function setupDropdowns(regionSelectId, provinceSelectId, citySelectId, barangaySelectId) {
                        loadRegions(regionSelectId);

                        $(regionSelectId).change(function() {
                            let selectedRegionId = $(this).val();
                            console.log('Region changed to:', selectedRegionId);
                            if (selectedRegionId) {
                                loadProvincesByRegion(selectedRegionId, provinceSelectId);
                                $(citySelectId).find('option:not(:first)').remove();
                                $(barangaySelectId).find('option:not(:first)').remove();
                            } else {
                                $(provinceSelectId).find('option:not(:first)').remove();
                                $(citySelectId).find('option:not(:first)').remove();
                                $(barangaySelectId).find('option:not(:first)').remove();
                            }
                        });

                        $(provinceSelectId).change(function() {
                            let selectedProvcode = $(this).val();
                            console.log('Province changed to:', selectedProvcode);
                            if (selectedProvcode) {
                                loadCitiesByProvince(selectedProvcode, citySelectId);
                                $(barangaySelectId).find('option:not(:first)').remove();
                            } else {
                                $(citySelectId).find('option:not(:first)').remove();
                                $(barangaySelectId).find('option:not(:first)').remove();
                            }
                        });

                        $(citySelectId).change(function() {
                            let selectedCityId = $(this).val();
                            console.log('City changed to:', selectedCityId);
                            if (selectedCityId) {
                                loadBarangaysByCity(selectedCityId, barangaySelectId);
                            } else {
                                $(barangaySelectId).find('option:not(:first)').remove();
                            }
                        });
                    }

                    // Setup for each set of dropdowns
                    setupDropdowns('#regionSelect', '#provinceSelect', '#citySelect', '#barangaySelect');
                });

                $(document).ready(function() {
                    demo.checkFullPageBackgroundImage();
                });
            </script>
            @endpush