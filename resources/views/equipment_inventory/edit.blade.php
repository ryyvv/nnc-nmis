<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Equipment Inventory',
'activePage' => 'EquipmentInventoryIndex',
'activeNav' => '',
])

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css').time()}}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <div style="display: flex; align-items: baseline; margin-bottom:15px;">
                    <a href="{{ route('BSequipmentInventory.index') }}" style="margin-right: 15px;">
                        <i class="now-ui-icons arrows-1_minimal-left" style="font-size: 18px; font-weight: bold;"></i>
                    </a>
                    <h5 class="title" style="margin: 0; line-height: 1;">{{ __("Edit Equipment Inventory") }}</h5>
                </div>
            </div>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <div style="padding: 0px 15px 15px 15px;">
            <form action="" id="form" method="POST">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="PUT">

                <hr>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputPSGC">Region</label>
                        <select id="region-dropdown" class="form-control" name="inputRegion">
                            <option value="">Select Region</option>
                        </select>
                        @error('inputRegion')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPSGC">Province</label>
                        <select id="province-dropdown" disabled class="form-control" name="inputProvince">
                            <option selected>Select Province</option>
                        </select>
                        @error('inputProvince')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCM">City/Municipality</label>
                        <select id="city-dropdown" disabled class="form-control" name="inputCM">
                            <option selected>Select City/Municipality</option>
                        </select>
                        @error('inputCM')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group col-md-4" id="totalBarangay" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-6">
                        <label for="inputtotalBarangay">Total No. of Barangay</label>
                        <input type="number" class="form-control" name="inputtotalBarangay" id="inputtotalBarangay"
                            value="{{ old('inputtotalBarangay') ?? 0 }}" placeholder='0' onchange="totalHB()">
                        @error('inputtotalBarangay')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div>
                    <label for="formHB"><b>Height Board (HB)</b></label>
                </div>
                <hr>
                <div style="display:flex;">
                    <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                        <div class="form-group col-md-6">
                            <label for="inputWHB">Wooden HB</label>
                            <input type="number" class="form-control" name="inputWHB" id="inputWHB"
                                value="{{ old('inputWHB') ?? 0 }}" placeholder="0" onchange="totalHB()">
                            @error('inputWHB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputNonWHB">Non-wooden HB</label>
                            <input type="number" class="form-control" name="inputNonWHB" id="inputNonWHB"
                                value="{{ old('inputNonWHB') ?? 0 }}" placeholder="0" onchange="totalHB()">
                            @error('inputNonWHB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputHBNonF">Defective/Non-functional</label>
                            <input type="number" class="form-control" name="inputHBNonF" id="inputHBNonF"
                                value="{{ old('inputHBNonF') ?? 0 }}" placeholder="0" onchange="totalHB()">
                            @error('inputHBNonF')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTotalHB">Total HB</label>
                            <input type="number" class="form-control" name="inputTotalHB" id="inputTotalHB"
                                value="{{ old('inputTotalHB') ?? 0 }}" placeholder="0" readonly>
                            @error('inputTotalHB')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputHBpercent">HB% Availability</label>
                            <input type="number" class="form-control" name="inputHBpercent" id="inputHBpercent"
                                value="{{ old('inputHBpercent') ?? 0 }}" placeholder="0" readonly>
                            @error('inputHBpercent')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                        <div class="form-group col-md-4">
                            <label for="inputSteelRules">Steel Rules</label>
                            <input type="number" class="form-control" name="inputSteelRules" id="inputSteelRules"
                                value="{{ old('inputSteelRules') ?? 0 }}" placeholder="0">
                            @error('inputSteelRules')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputMicrotoise">Microtoise</label>
                            <input type="number" class="form-control" name="inputMicrotoise" id="inputMicrotoise"
                                value="{{ old('inputMicrotoise') ?? 0 }}" placeholder="0">
                            @error('inputMicrotoise')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputInfantometer">Infantometer</label>
                            <input type="number" class="form-control" name="inputInfantometer" id="inputInfantometer"
                                value="{{ old('inputInfantometer') ?? 0 }}" placeholder="0">
                            @error('inputInfantometer')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="formHB">
                        <div class="form-group col-md-12">
                            <label for="inputHBRemarks">Remarks</label>
                            <input type="text" class="form-control" name="inputHBRemarks" id="inputHBRemarks"
                                value="{{ old('inputHBRemarks') ?? '' }}" placeholder="Remarks">
                            @error('inputHBRemarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <label for="formWS"><b>Weighing Scale (WS)</b></label>
                </div>
                <hr>
                <div style="display:flex;">
                    <div class="form-group col-md-4" id="formWS" style="display:flex; border-right:1px solid;">
                        <div class="form-group col-md-6">
                            <label for="inputWSHanging">Hanging-type</label>
                            <input type="number" class="form-control" name="inputWSHanging" id="inputWSHanging"
                                value="{{ old('inputWSHanging') ?? 0 }}" placeholder="0" onchange="totalWS()">
                            @error('inputWSHanging')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputWSNonF">Defective/Non-functional</label>
                            <input type="number" class="form-control" name="inputWSNonF" id="inputWSNonF"
                                value="{{ old('inputWSNonF') ?? 0 }}" placeholder="0" onchange="totalWS()">
                            @error('inputWSNonF')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTotalWS">Total WS</label>
                            <input type="text" class="form-control" name="inputTotalWS" id="inputTotalWS"
                                value="{{ old('inputTotalWS') ?? 0 }}" placeholder="0" readonly>
                            @error('inputTotalWS')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputWSpercent">WS% Availability</label>
                            <input type="text" class="form-control" name="inputWSpercent" id="inputWSpercent"
                                value="{{ old('inputWSpercent') ?? 0 }}" placeholder="0" readonly>
                            @error('inputWSpercent')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                        <div class="form-group col-md-6">
                            <label for="inputInfantScale">Infant Scale</label>
                            <input type="text" class="form-control" name="inputInfantScale" id="inputInfantScale"
                                value="{{ old('inputInfantScale') ?? 0 }}" placeholder="0">
                            @error('inputInfantScale')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputBeamBalance">Beam Balance</label>
                            <input type="text" class="form-control" name="inputBeamBalance" id="inputBeamBalance"
                                value="{{ old('inputBeamBalance') ?? 0 }}" placeholder="0">
                            @error('inputBeamBalance')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="formHB">
                        <div class="form-group col-md-12">
                            <label for="inputWSRemarks">Remarks</label>
                            <input type="text" class="form-control" name="inputWSRemarks" id="inputWSRemarks"
                                value="{{ old('inputWSRemarks') ?? '' }}" placeholder="Remarks">
                            @error('inputWSRemarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <label for="formMUAC"><b>MUAC</b></label>
                </div>
                <hr>
                <div style="display:flex;">
                    <div class="form-group col-md-4" id="formMUAC" style="display:flex; border-right:1px solid;">
                        <div class="form-group col-md-6">
                            <label for="inputMChild">Child</label>
                            <input type="number" class="form-control" name="inputMChild" id="inputMChild"
                                value="{{ old('inputMChild') ?? 0 }}" placeholder="0" onchange="muac_child()">
                            @error('inputMChild')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputMNonFChild">Defective/Non-functional</label>
                            <input type="number" class="form-control" name="inputMNonFChild" id="inputMNonFChild"
                                value="{{ old('inputMNonFChild') ?? 0 }}" placeholder="0" onchange="muac_child()">
                            @error('inputMNonFChild')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTotalChild">Total (Child)</label>
                            <input type="number" class="form-control" name="inputTotalChild" id="inputTotalChild"
                                value="{{ old('inputTotalChild') ?? 0 }}" placeholder="0" readonly>
                            @error('inputTotalChild')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputChildpercent">% Availability (Child)</label>
                            <input type="number" class="form-control" name="inputChildpercent" id="inputChildpercent"
                                value="{{ old('inputChildpercent') ?? 0 }}" placeholder="0" readonly>
                            @error('inputChildpercent')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                        <div class="form-group col-md-6">
                            <label for="inputMAdult">Adult</label>
                            <input type="number" class="form-control" name="inputMAdult" id="inputMAdult"
                                value="{{ old('inputMAdult') ?? 0 }}" placeholder="0" onchange="muac_adult()">
                            @error('inputMAdult')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputMNonFAdult">Defective/Non-functional</label>
                            <input type="number" class="form-control" name="inputMNonFAdult" id="inputMNonFAdult"
                                value="{{ old('inputMNonFAdult') ?? 0 }}" placeholder="0" onchange="muac_adult()">
                            @error('inputMNonFAdult')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTotalAdult">Total (Adult)</label>
                            <input type="number" class="form-control" name="inputTotalAdult" id="inputTotalAdult"
                                value="{{ old('inputTotalAdult') ?? 0 }}" placeholder="0" readonly>
                            @error('inputTotalAdult')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="inputAdultpercent">% Availability (Adult)</label>
                            <input type="number" class="form-control" name="inputAdultpercent" id="inputAdultpercent"
                                value="{{ old('inputAdultpercent') ?? 0 }}" placeholder="0" readonly>
                            @error('inputAdultpercent')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="formHB">
                        <div class="form-group col-md-12">
                            <label for="inputMRemarks">Remarks</label>
                            <input type="text" class="form-control" name="inputMRemarks" id="inputMRemarks"
                                value="{{ old('inputMRemarks') ?? ''}}" placeholder="Remarks">
                            @error('inputMRemarks')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div style="display:flex;">
                    <div class="form-group col-md-8" style="display:flex;">
                        <div class="form-group col-md-12">
                            <button type="button" id="updateButton" name="addEquipmentInventory"
                                class="btn btn-outline-primary" style="margin-right:15px;" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Update Equipment Inventory
                            </button>
                            <button type="button" id="deleteButton" name="deleteEquipmentInventory"
                                class="btn btn-outline-primary" data-toggle="modal" data-target="#deleteModal">
                                Delete Equipment Inventory
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- alert Modal -->
@include('Modal.Submit')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                <div>
                    <lord-icon src="https://cdn.lordicon.com/hjbrplwk.json" trigger="loop"
                        colors="primary:#646e78,secondary:#ee6d66,tertiary:#ebe6ef,quaternary:#3a3347"
                        style="width:150px;height:150px">
                    </lord-icon>
                </div>
                <div class="bold" style="font-size: 25px;color:gray">
                    Are you sure?
                </div>
                <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                    Do you really want to delete these record? This process cannot be undone.
                </div>
                <div>
                    <button type="button" style="margin-right:5px" class="bold btn btn-secondary"
                        data-dismiss="modal">CANCEL</button>
                    <button type="button" id='delete' class="bold btn btn-danger"
                        style="background-color:#ee6d66!important">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<script>
$(document).ready(function() {

    $('#updateButton').on('click', function() {
        $('#form').attr('action', "{{ route('BSequipmentInventory.update') }}");
        $('#methodField').val('PUT');
    });

    $('#deleteButton').on('click', function() {
        $('#form').attr('action', "{{ route('BSequipmentInventory.delete') }}");
        $('#methodField').val('DELETE');
    });

    $('#submit').on('click', function() {
        $('#form').submit();
    });

    $('#delete').on('click', function() {
        $('#form').submit();
    });

    const oldValues = {
        region: '{{ old("inputRegion") }}',
        province: '{{ old("inputProvince") }}',
        city: '{{ old("inputCM") }}'
    };

    const routes = {
        getRegions: '{{ route("location.regions.get") }}',
        getProvinces: '{{ route("location.provinces.get") }}',
        getCitiesAndMunicipalities: '{{ route("location.citiesAndMunicipalities.get") }}',
        getBarangays: '{{ route("location.barangays.get") }}',
        getCitiesAndMunicipalitiesInventory: '{{ route("BSequipmentInventory.CMInventory.get") }}'
    };

    const dropdowns = {
        region: $('#region-dropdown'),
        province: $('#province-dropdown'),
        city: $('#city-dropdown'),
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

    const fetchDataAndPopulate = (url, params, dropdown, valueKey, textKey, placeholder, oldValue =
        '') => {
        $.get(url, params)
            .done(function(data) {
                if (!data || data.length === 0) {
                    clearAndDisableDropdown(dropdown, placeholder);
                    return;
                }
                populateDropdown(dropdown, data, valueKey, textKey, placeholder);

                dropdown.val(oldValue).change();
                if (dropdown.val() !== oldValue) {
                    dropdown.val('').change(); // Reset to default select
                }
            })
            .fail(function() {
                alert(`Failed to fetch ${placeholder.toLowerCase()}.`);
            });
    };

    $.get(routes.getRegions)
        .done(function(data) {
            clearAndDisableDropdown(dropdowns.province, 'Province');
            clearAndDisableDropdown(dropdowns.city, 'City/Municipality');
            populateDropdown(dropdowns.region, data, 'reg_code', 'name', 'Region');

            if (oldValues.region) {
                dropdowns.region.val(oldValues.region).change();
            }
        })
        .fail(function() {
            alert('Failed to fetch regions.');
        });

    dropdowns.region.change(function() {
        const regionCode = $(this).val();
        const ncrRegionCode = '13';

        clearAndDisableDropdown(dropdowns.province, 'Province');

        if (!regionCode) return;

        if (regionCode === ncrRegionCode) {
            fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                reg_code: regionCode
            }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
            return;
        }

        fetchDataAndPopulate(routes.getProvinces, {
            reg_code: regionCode
        }, dropdowns.province, 'prov_code', 'name', 'Province', oldValues.province);

        fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
            reg_code: regionCode,
            excludeProvincialAreas: true
        }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
    });

    dropdowns.province.change(function() {
        const provinceCode = $(this).val();
        if (!provinceCode) return;

        fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
            prov_code: provinceCode
        }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
    });

    dropdowns.city.change(function() {
        const citymunCode = $(this).val();
        if (!citymunCode) return;

        $.get(routes.getCitiesAndMunicipalitiesInventory, {
                citymun_code: citymunCode
            })
            .done(function(data) {
                if (!data || data.length === 0) return;

                data.citiesAndMunicipalities.forEach((data) => {
                    $('#inputtotalBarangay').val(data.total_barangay).change();
                    $('#inputWHB').val(data.wooden_hb).change();
                    $('#inputNonWHB').val(data.non_wooden_hb).change();
                    $('#inputHBNonF').val(data.defective_hb).change();
                    $('#inputTotalHB').val(data.total_hb).change();
                    $('#inputHBpercent').val(data.availability_hb).change();
                    $('#inputSteelRules').val(data.steel_rules).change();
                    $('#inputMicrotoise').val(data.microtoise).change();
                    $('#inputInfantometer').val(data.infantometer).change();
                    $('#inputHBRemarks').val(data.remarks_hb).change();
                    $('#inputWSHanging').val(data.hanging_type).change();
                    $('#inputWSNonF').val(data.defective_ws).change();
                    $('#inputTotalWS').val(data.total_ws).change();
                    $('#inputWSpercent').val(data.availability_ws).change();
                    $('#inputInfantScale').val(data.infat_scale).change();
                    $('#inputBeamBalance').val(data.beam_balance).change();
                    $('#inputWSRemarks').val(data.remarks_ws).change();
                    $('#inputMChild').val(data.child).change();
                    $('#inputMNonFChild').val(data.defective_muac_child).change();
                    $('#inputTotalChild').val(data.total_muac_child).change();
                    $('#inputChildpercent').val(data.availability_muac_child).change();
                    $('#inputMAdult').val(data.adults).change();
                    $('#inputMNonFAdult').val(data.defective_muac_adults).change();
                    $('#inputTotalAdult').val(data.total_muac_adults).change();
                    $('#inputAdultpercent').val(data.availability_muac_adults).change();
                    $('#inputMRemarks').val(data.remarks_muac).change();
                });
            })
            .fail(function() {
                alert(`Failed to fetch Cities and Municipalities Inventory.`);
            });
    });
});
</script>