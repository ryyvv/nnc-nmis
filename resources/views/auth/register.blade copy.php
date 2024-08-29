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
    <div class="container">
        <div class="row" style="justify-content:center; align-items:center">
            <!-- <div class="col-md-4 ml-auto">
                <div class="info-area info-horizontal mt-2">
                    <div class="icon icon-primary">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                    </div>
                    <div class="description">
                        <h5 class="info-title">{{ __('Marketing') }}</h5>
                        <p class="description">
                            {{ __("We've created the marketing campaign of the website. It was a very interesting collaboration.") }}
                        </p>
                    </div>
                </div>
                <div class="info-area info-horizontal">
                    <div class="icon icon-info">
                        <i class="now-ui-icons users_single-02"></i>
                    </div>
                    <div class="description">
                        <h5 class="info-title">{{ __('Built Audience') }}</h5>
                        <p class="description">
                            {{ __('There is also a Fully Customizable CMS Admin Dashboard for this product.') }}
                        </p>
                    </div>
                </div>
            </div>  -->
            <div class="col-md-12 mr-auto" style="margin-left:30px">
                <div class="card card-signup text-center">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Register') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!--Begin input name -->

                            <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px; background:white;">
                                <span class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons users_circle-08 text-dark"></i>
                                    </div>
                                </span>
                                <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                    </div>
                    <div class="d-flex region">

                        <select id="regionSelect" class="form-control" name="Region">
                            <option value="428" selected>Region</option>
                        </select>
                        <select id="provinceSelect" class="form-control" name="Province">
                            <option value="1301" selected>Province</option>
                        </select>
                        <select id="citySelect" class="form-control" name="city_municipal">
                            <option value="1923" selected>City/Municipality</option>
                        </select>
                        <div class="input-group {{ $errors->has('agency_office_lgu') ? ' has-danger' : '' }}" style="margin-right:10px">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </div>
                            </div>
                            <input class="form-control {{ $errors->has('barangay') ? ' is-invalid' : '' }}" placeholder="{{ __('barangay') }}" type="text" name="barangay" value="{{ old('barangay') }}" required autofocus>
                            @if ($errors->has('agency_office_lgu'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('barangay') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="input-group {{ $errors->has('agency_office_lgu') ? ' has-danger' : '' }}" style="margin-right:10px">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </div>
                            </div>
                            <input class="form-control {{ $errors->has('agency_office_lgu') ? ' is-invalid' : '' }}" placeholder="{{ __('Agency/Office/Unit') }}" type="text" name="agency_office_lgu" value="{{ old('agency_office_lgu') }}" required autofocus>
                            @if ($errors->has('agency_office_lgu'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('agency_office_lgu') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px; background:white;">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08 text-dark"></i>
                                </div>
                            </span>
                            <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div class="input-group {{ $errors->has('Division_unit') ? ' has-danger' : '' }}" style="margin-right:10px">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </div>
                            </div>
                            <input class="form-control {{ $errors->has('Division_unit') ? ' is-invalid' : '' }}" placeholder="{{ __('Division/Unit') }}" type="text" name="Division_unit" value="{{ old('Division_unit') }}" required autofocus>
                            @if ($errors->has('Division_unit'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('Division_unit') }}</strong>
                            </span>
                            @endif
                        </div>
                        <select class="form-control" name="role" data-group="block-0">
                            <option>Designation</option>
                            @foreach($Role as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--Begin input email -->
                    <div class="input-group w-50 mr-2 {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </div>
                        </div>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <!--Begin input user type-->
                    <div class="d-flex hays">
                        <!--Begin input password -->
                        <div class="input-group mr-2 {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons objects_key-25"></i>
                                </div>
                            </div>
                            <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Password') }}" type="password" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!--Begin input confirm password -->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons objects_key-25"></i></i>
                                </div>
                            </div>
                            <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password"
                                name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> <!-- Closing tag for col-md-12 -->
    </div> <!-- Closing tag for row -->
</div> <!-- Closing tag for container -->
</div> <!-- Closing tag for content -->
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