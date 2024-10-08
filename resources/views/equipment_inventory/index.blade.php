<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/diether.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/joboy.js') }}"></script>

<style>
.tab {
    text-align: center;
    font-size: 11px;
    border: 1px solid green;
}

.tab.active {
    border-top: 1px solid green;
}

.mainHeader {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #000;
    padding: 8px;
    text-align: left;
}

thead th {
    background-color: #f2f2f2;
}
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Equipment Inventory',
'activePage' => 'EquipmentInventoryIndex',
'activeNav' => '',
])

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("Equipment Inventory")}}</h5>
                <div>
                    <a class="btn btn-outline-primary" href="{{route('BSequipmentInventory.create')}}">Add
                        Equipments</a>
                    <a class="btn btn-outline-primary" href="{{route('BSequipmentInventory.edit')}}">Edit
                        Equipments</a>
                </div>
            </div>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <form action="#" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputPSGC">Region</label>
                    <select id="region-dropdown" class="form-control" name="inputRegion">
                        <option value="">Select Region</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPSGC">Province</label>
                    <select id="province-dropdown" disabled class="form-control" name="inputProvince">
                        <option selected>Select Province</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCM">City/Municipality</label>
                    <select id="city-dropdown" disabled class="form-control" name="inputCM">
                        <option selected>Select City/Municipality</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="form-row" style="border-bottom: 1px solid #ddd;">
            <div id="tabs" class="d-flex mr-3">
                <div class="tab" data-tab="tab1">(HB)</div>
                <div class="tab" data-tab="tab2">(WS)</div>
                <div class="tab" data-tab="tab3">(MUAC)</div>
            </div>
        </div>

        <div class="row row-12">
            <div id="tab-contents" class="col-md-12">
                <div class="tab-content" id="tab1">
                    <table id="equipInventoryTable" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <td rowspan="3"><b>10-digit PSGC</b></td>
                                <td rowspan="3"><b>City/Municipality</b></td>
                                <td rowspan="3"><b>Total No. of Barangay</b></td>
                                <td colspan="8" class="mainHeader"><b>Height Board (HB)</b></td>
                                <td rowspan="3"><b>HB Remarks</b></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Wooden HB</td>
                                <td rowspan="2">Non-Wooden HB</td>
                                <td rowspan="2">Defective</td>
                                <td rowspan="2">Total HB</td>
                                <td rowspan="2">HB% Availability</td>
                                <td colspan="3" class="mainHeader">Others</td>
                            </tr>
                            <tr>
                                <td>Steel Rules</td>
                                <td>Microtoise</td>
                                <td>Infantometer</td>
                            </tr>
                        </thead>
                        <tbody id="hb-city-details">
                        </tbody>
                        <tfoot id="hb-totals">
                        </tfoot>
                    </table>
                </div>
                <div class="tab-content" id="tab2">
                    <table id="nutriTable" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <td rowspan="3"><b>10-digit PSGC</b></td>
                                <td rowspan="3"><b>City/Municipality</b></td>
                                <td rowspan="3"><b>Total No. of Barangay</b></td>
                                <td colspan="6" class="mainHeader"><b>Weighing Scale (WS)</b></td>
                                <td rowspan="3"><b>WS Remarks</b></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Hanging-type</td>
                                <td rowspan="2">Defective</td>
                                <td rowspan="2">Total WS</td>
                                <td rowspan="2">WS% Availability</td>
                                <td colspan="2" class="mainHeader">Others</td>
                            </tr>
                            <tr>
                                <td>Infant Scale</td>
                                <td>Beam Balance</td>
                            </tr>
                        </thead>
                        <tbody id="ws-city-details">
                        </tbody>
                        <tfoot id="ws-totals">
                        </tfoot>
                    </table>
                </div>
                <div class="tab-content" id="tab3">
                    <table id="nutriTable" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <td rowspan="2"><b>10-digit PSGC</b></td>
                                <td rowspan="2"><b>City/Municipality</b></td>
                                <td rowspan="2"><b>Total No. of Barangay</b></td>
                                <td colspan="8" class="mainHeader"><b>Mid-Upper Arm Circumference (MUAC) Tapes</b></td>
                                <td rowspan="2"><b>MUAC Remarks</b></td>
                            </tr>
                            <tr>
                                <td>Child</td>
                                <td>Defect</td>
                                <td>Total (Child)</td>
                                <td>% Availability (Child)</td>
                                <td>Adult</td>
                                <td>Defect</td>
                                <td>Total (Adult)</td>
                                <td>% Availability (Adult)</td>
                            </tr>
                        </thead>

                        <tbody id="muac-city-details">
                        </tbody>
                        <tfoot id="muac-totals">
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
$(document).ready(function() {
    function handleTableData(data) {
        let hbCityDetails = $('#hb-city-details').empty();
        let hbTotals = $('#hb-totals').empty();
        let wsCityDetails = $('#ws-city-details').empty();
        let wsTotals = $('#ws-totals').empty();
        let muacCityDetails = $('#muac-city-details').empty();
        let muacTotals = $('#muac-totals').empty();

        if (!data) return;


        data.citiesAndMunicipalities.forEach(function(city) {
            hbCityDetails.append(
                `<tr>
                <td><b>${city.psgc_code}</b></td>
                <td><b>${city.name}</b></td>
                <td><b>${city.total_barangay}</b></td>
                <td>${city.wooden_hb}</td>
                <td>${city.non_wooden_hb}</td>
                <td>${city.defective_hb}</td>
                <td>${city.total_hb}</td>
                <td>${city.availability_hb}</td>
                <td>${city.steel_rules}</td>
                <td>${city.microtoise}</td>
                <td>${city.infantometer}</td>
                <td>${city.remarks_hb || ''}</td>
                </tr>`
            );
            // TODO: UPDATE infat to infant_scale in db
            wsCityDetails.append(
                `<tr>
                <td><b>${city.psgc_code}</b></td>
                <td><b>${city.name}</b></td>
                <td><b>${city.total_barangay}</b></td>
                <td>${city.hanging_type}</td>
                <td>${city.defective_ws}</td>
                <td>${city.total_ws}</td>
                <td>${city.availability_ws}</td>
                <td>${city.infat_scale}</td> 
                <td>${city.beam_balance}</td>
                <td>${city.remarks_ws || ''}</td>
                </tr>`
            );

            muacCityDetails.append(
                `<tr>
                <td><b>${city.psgc_code}</b></td>
                <td><b>${city.name}</b></td>
                <td><b>${city.total_barangay}</b></td>
                <td>${city.child}</td>
                <td>${city.defective_muac_child}</td>
                <td>${city.total_muac_child}</td>
                <td>${city.availability_muac_child}</td>
                <td>${city.adults}</td>
                <td>${city.defective_muac_adults}</td>
                <td>${city.total_muac_adults}</td>
                <td>${city.availability_muac_adults}</td>
                <td>${city.remarks_muac || ''}</td>
                </tr>`
            );
        });

        data.totals.forEach(function(totals, index) {
            let provinceDropdown = $('#province-dropdown');
            let cityDropdown = $('#city-dropdown');
            const labelMap = {
                0: "City",
                1: "Municipality",
                2: "Sub Total",
                3: "Grand Total"
            }
            let label = labelMap[index];

            // Skip processing if the province or city dropdown
            if ((provinceDropdown.val() || cityDropdown.val()) && label === "Grand Total") return;

            if (!Object.values(totals).some(value => value)) return;

            hbTotals.append(
                `<tr>
                <td><b></b></td>
                <td><b>${label}</b></td>
                <td><b>${totals.total_barangays}</b></td>
                <td><b>${totals.wooden_hb}</b></td>
                <td><b>${totals.non_wooden_hb}</b></td>
                <td><b>${totals.defective_hb}</b></td>
                <td><b>${totals.total_hb}</b></td>
                <td><b>${totals.availability_hb}</b></td>
                <td><b>${totals.steel_rules}</b></td>
                <td><b>${totals.microtoise}</b></td>
                <td><b>${totals.infantometer}</b></td>
                <td><b></b></td>
                </tr>`
            );

            wsTotals.append(
                `<tr>
                <td><b></b></td>
                <td><b>${label}</b></td>
                <td><b>${totals.total_barangays}</b></td>
                <td><b>${totals.hanging_type}</b></td>
                <td><b>${totals.defective_ws}</b></td>
                <td><b>${totals.total_ws}</b></td>
                <td><b>${totals.availability_ws}</b></td>
                <td><b>${totals.infat_scale}</b></td>
                <td><b>${totals.beam_balance}</b></td>
                <td><b></b></td>
                </tr>`
            );

            muacTotals.append(
                `<tr>
                <td><b></b></td>
                <td><b>${label}</b></td>
                <td><b>${totals.total_barangays}</b></td>
                <td><b>${totals.child}</b></td>
                <td><b>${totals.defective_muac_child}</b></td>
                <td><b>${totals.total_muac_child}</b></td>
                <td><b>${totals.availability_muac_child}</b></td>
                <td><b>${totals.adults}</b></td>
                <td><b>${totals.defective_muac_adults}</b></td>
                <td><b>${totals.total_muac_adults}</b></td>
                <td><b>${totals.availability_muac_adults}</b></td>
                <td><b></b></td>
                </tr>`
            );
        });
    }

    const oldValues = {
        region: '{{ old("inputRegion", $regCode) }}',
        province: '{{ old("inputProvince") }}',
        city: '{{ old("inputCM") }}'
    };

    const routes = {
        getRegions: '{{ route("location.regions.get") }}',
        getProvinces: '{{ route("location.provinces.get") }}',
        getCitiesAndMunicipalities: '{{ route("location.citiesAndMunicipalities.get") }}',
        getInventory: '{{ route("BSequipmentInventory.CMInventory.get") }}'
    };

    const dropdowns = {
        region: $('#region-dropdown'),
        province: $('#province-dropdown'),
        city: $('#city-dropdown')
    };

    const clearAndDisableDropdown = (dropdown, placeholder) => {
        dropdown.empty().append(
            `<option value="" disabled selected>Select ${placeholder}</option>`
        ).prop('disabled', true);
    };

    const populateDropdown = (dropdown, data, valueKey, textKey, placeholder) => {
        dropdown.empty().append(
            `<option value="" disabled selected>Select ${placeholder}</option>`
        );
        data.forEach(item => {
            dropdown.append(
                `<option value="${item[valueKey]}">${item[textKey]}</option>`
            );
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

    fetchDataAndPopulate(routes.getRegions, {}, dropdowns.region, 'reg_code', 'name', 'Region', oldValues.region);

    // Region selection
    dropdowns.region.change(function() {
        const regionCode = $(this).val();
        const ncrRegionCode = '13';

        clearAndDisableDropdown(dropdowns.province, 'Province');
        clearAndDisableDropdown(dropdowns.city, 'City/Municipality');

        if (!regionCode) return;

        // Handle NCR region
        if (regionCode === ncrRegionCode) {
            fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                reg_code: regionCode
            }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
            $.get(routes.getInventory, {
                reg_code: regionCode
            }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
            return;
        }

        fetchDataAndPopulate(routes.getProvinces, {
            reg_code: regionCode
        }, dropdowns.province, 'prov_code', 'name', 'Province', oldValues.province);
        fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
            reg_code: regionCode,
            excludeProvincialAreas: true
        }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);

        // Fetch inventory details
        $.get(routes.getInventory, {
            reg_code: regionCode
        }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
    });

    // Province selection
    dropdowns.province.change(function() {
        const provinceCode = $(this).val();
        if (!provinceCode) return;

        fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
            prov_code: provinceCode
        }, dropdowns.city, 'psgc_code', 'name', 'City/Municipality', oldValues.city);

        // Fetch inventory details
        $.get(routes.getInventory, {
            prov_code: provinceCode
        }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
    });

    // City selection
    dropdowns.city.change(function() {
        const citymunCode = $(this).val();
        if (!citymunCode) return;

        // Fetch inventory details
        $.get(routes.getInventory, {
            citymun_code: citymunCode
        }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
    });
});
</script>