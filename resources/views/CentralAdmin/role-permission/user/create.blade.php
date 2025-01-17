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
'namePage' => 'Users',
'activePage' => 'users',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
 
   
            <!-- <div class="row-lg-12 d-flex" > -->
            <div class="content" style="margin:30px;">
 

                    <div class="card-body d-flex" style="align-items:center;justify-content:center!important">
                        <!-- left -->
                        <div class="col-5">
                            <div class="row" style="justify-content:center!important">
                                <img src="/assets/img/logo.png" alt="NNC logo" height="300px" width="300px">
                            </div>
                            <div class="row" style="justify-content:center!important; margin-top:20px">
                                <label style="font-size: 40px;color:#59987e" for="">Nutrition Management Nutrition
                                    System</label>
                            </div>
                        </div>

                        <!-- right -->
                        <!-- style="padding-left:20px;border-left: 2px solid gray" -->
                        <div class="col-7">
                            <div class="card-header">
                                <h4 class="bold card-title" style="color:#59987e">{{ __('Register') }}</h4>
                            </div>
                            <form method="POST" action="{{ route('CAadmin.store') }}">
                                @csrf

                                <!-- //set as underReview -->
                                <input type="hidden" name="role" value="3"> 
                                <!-- //set as active -->
                                <input type="hidden" name="userstatus" value="1">  
                                <!-- //userRoles set as dropdown to admin  approve -->
                                <input type="hidden" name="otherrole" value="1"> 
                                <!-- //set as pending  -->
                                <input type="hidden" name="status" value="3"> 
                                

                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('Firstname') ? ' has-danger' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('Firstname') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Firstname') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            value="{{ old('Firstname') }}" name="Firstname" required autofocus>
                                    </div>
                                    @if ($errors->has('Firstname'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Firstname') }}</strong>
                                    </span>
                                    @endif


                                    <div class="input-group  form-control-lg {{ $errors->has('Middlename') ? ' has-danger' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('Middlename') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Middlename') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            value="{{ old('Middlename') }}" name="Middlename" required autofocus>
                                    </div>
                                    @if ($errors->has('Middlename'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Middlename') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('Lastname') ? ' has-danger' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('Lastname') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Lastname') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            value="{{ old('Lastname') }}" name="Lastname" required autofocus>
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
                                        <div class="input-group form-control-lg {{ $errors->has('Region') ? 'has-danger' : '' }}"
                                            style="border-radius: 40px; margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text"
                                                    style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select
                                                class="form-control text-dark {{ $errors->has('Region') ? 'is-invalid' : '' }}"
                                                style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;"
                                                name="Region" id="region-dropdown" required>
                                                <!-- <option value="">Select your Region</option>  -->
                                                <option value="428" selected>Select Region</option>
                                            </select>
                                        </div>
                                        <!-- @if ($errors->has('Region'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('Region') }}</strong>
                                        </span>
                                        @endif -->

                                        <!-- Province -->
                                        <div class="input-group form-control-lg {{ $errors->has('Province') ? 'has-danger' : '' }}"
                                            style="border-radius: 40px;">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text"
                                                    style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select
                                                class="form-control text-dark {{ $errors->has('Province') ? 'is-invalid' : '' }}"
                                                style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;"
                                                name="Province" id="province-dropdown">
                                                <!-- <option value="">Select your Province</option>  -->
                                                <option value="1301" selected>Select Province</option>
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
                                        <div class="input-group form-control-lg {{ $errors->has('city_municipal') ? 'has-danger' : '' }}"
                                            style="border-radius: 40px;margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text"
                                                    style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select
                                                class="form-control text-dark {{ $errors->has('city_municipal') ? 'is-invalid' : '' }}"
                                                style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;"
                                                name="city_municipal" id="city-dropdown" required>
                                                <!-- <option value="">Select your City/Municipal</option>  -->
                                                <option selected>Select City/Municipality</option>
                                            </select>
                                        </div>
                                        <!-- @if ($errors->has('city_municipal'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('city_municipal') }}</strong>
                                        </span>
                                        @endif -->

                                        <!-- Barangay -->
                                        <div class="input-group form-control-lg {{ $errors->has('barangay') ? 'has-danger' : '' }}"
                                            style="border-radius: 40px; ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text"
                                                    style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select
                                                class="form-control text-dark {{ $errors->has('barangay') ? 'is-invalid' : '' }}"
                                                style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;"
                                                value="{{ old('barangay') }}" name="barangay" id="barangay-dropdown"
                                                required>
                                                <option>Select Barangay</option>
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
                                    <div class="input-group  form-control-lg {{ $errors->has('agency_office_lgu') ? 'is-invalid' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('agency_office_lgu') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Agency/Office/Unit') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            value="{{ old('agency_office_lgu') }}" name="agency_office_lgu" required
                                            autofocus>
                                    </div>
                                    @if ($errors->has('agency_office_lgu'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('agency_office_lgu') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('Division_unit') ? ' has-danger' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('Division_unit') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Division Unit ') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            value="{{ old('Division_unit') }}" name="Division_unit" required autofocus>
                                    </div>
                                    @if ($errors->has('Division_unit'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('Division_unit') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('designation') ? ' has-danger' : '' }}"
                                        style="border-radius:40px; ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('designation') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Designation/Position') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            value="{{ old('designation') }}" name="designation" required autofocus>
                                    </div>
                                    @if ($errors->has('designation'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- user email and password -->
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Email') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            type="email" value="{{ old('email') }}" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif


                                    <!-- password -->
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}"
                                        style="border-radius:40px; margin-right:15px">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input
                                            class="form-control text-dark {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Password') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            type="password" name="password" required autofocus>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <!-- Confirm-password -->
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}"
                                        style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control" placeholder="{{ __('Confirm Password') }}"
                                            style="border-top-right-radius:40px;border-bottom-right-radius:40px;"
                                            type="password" name="password_confirmation" required>
                                    </div>
                                    <!-- @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif -->

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="bold btn btn-primary btn-round btn-lg">Create User</button>
                                </div>
                            </form>
                        </div>
                   
            </div>
</div>
        </div>
    </div>
</div>


            @include('layouts.footer')
            @endsection

            @push('js')
            <script>
            $(document).ready(function() {
                const routes = {
                    getRegions: '{{ route("equipment.regions.get") }}',
                    getProvinces: '{{ route("equipment.provinces.get") }}',
                    getCitiesAndMunicipalities: '{{ route("equipment.citiesAndMunicipalities.get") }}',
                    getBarangays: '{{ route("equipment.barangays.get") }}',
                };

                const dropdowns = {
                    region: $('#region-dropdown'),
                    province: $('#province-dropdown'),
                    city: $('#city-dropdown'),
                    barangay: $('#barangay-dropdown'),
                };

                const clearAndDisableDropdown = (dropdown, placeholder) => {
                    dropdown.empty().append(
                            `<option value="" disabled selected>Select ${placeholder}</option>`)
                        .prop('disabled', true);
                };

                const populateDropdown = (dropdown, data, valueKey, textKey, placeholder) => {
                    dropdown.empty().append(
                        `<option value="" disabled selected>Select ${placeholder}</option>`);
                    data.forEach(item => {
                        dropdown.append(
                            `<option value="${item[valueKey]}">${item[textKey]}</option>`);
                    });
                    dropdown.prop('disabled', false);
                };

                const fetchDataAndPopulate = (url, params, dropdown, valueKey, textKey, placeholder) => {
                    $.get(url, params)
                        .done(function(data) {
                            if (!data || data.length === 0) {
                                clearAndDisableDropdown(dropdown, placeholder);
                                return;
                            }
                            populateDropdown(dropdown, data, valueKey, textKey, placeholder);
                        })
                        .fail(function() {
                            alert(`Failed to fetch ${placeholder.toLowerCase()}.`);
                        });
                };

                $.get(routes.getRegions)
                    .done(function(data) {
                        clearAndDisableDropdown(dropdowns.province, 'Province');
                        clearAndDisableDropdown(dropdowns.city, 'City/Municipality');
                        clearAndDisableDropdown(dropdowns.barangay, 'Barangay');
                        populateDropdown(dropdowns.region, data, 'reg_code', 'name', 'Region');
                    })
                    .fail(function() {
                        alert('Failed to fetch regions.');
                    });

                dropdowns.region.change(function() {
                    const regionCode = $(this).val();
                    const ncrRegionCode = '13';

                    clearAndDisableDropdown(dropdowns.province, 'Province');
                    clearAndDisableDropdown(dropdowns.barangay, 'Barangay');

                    if (!regionCode) return;

                    if (regionCode === ncrRegionCode) {
                        fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                            reg_code: regionCode
                        }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality');
                        return;
                    }

                    fetchDataAndPopulate(routes.getProvinces, {
                        reg_code: regionCode
                    }, dropdowns.province, 'prov_code', 'name', 'Province');
                    fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                        reg_code: regionCode,
                        excludeProvincialAreas: true
                    }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality');
                });

                dropdowns.province.change(function() {
                    const provinceCode = $(this).val();
                    if (!provinceCode) return;

                    fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                        prov_code: provinceCode
                    }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality');
                });

                dropdowns.city.change(function() {
                    const citymunCode = $(this).val();
                    const cityOfManilaCode = '1380600';
                    if (!citymunCode) return;

                    fetchDataAndPopulate(routes.getBarangays, {
                        citymun_code: citymunCode
                    }, dropdowns.barangay, 'psgc_code', 'name', 'Barangay');
                });
            });
            </script>
            @endpush