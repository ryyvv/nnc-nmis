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
'namePage' => 'LNC Functionality Checklist',
'activePage' => 'lncFunction',
'activeNav' => '',
])

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("LNC Functionality Checklist")}}</h5>
                <div>
                    <a class="btn btn-outline-primary" href="{{route('lncFunctionality.create')}}">Add Checklist</a>
                </div>
            </div>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <form action="#" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputGeographic">Geographic Level </label>
                    <select id="geographic-dropdown" class="form-control" name="inputGeographic">
                        <option value="">Select Geographic Level</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRegion">Region</label>
                    <select id="region-dropdown" class="form-control" name="inputRegion">
                        <option value="">Select Region</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputProvince">Province</label>
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
                <div class="tab" data-tab="tab1">LNC</div>
            </div>
        </div>

        <div class="row row-12">
            <div id="tab-contents" class="col-md-12">
                <div class="tab-content" id="tab1">
                    <div style="overflow-x: scroll;">
                        <table id="equipInventoryTable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td><b>10-digit PSGC</b></td>
                                    <td><b>Geographic Level</b></td>
                                    <td><b>Name</b></td>
                                    <td><b>CD</b></td>
                                    <td><b>PP1A</b></td>
                                    <td><b>PP1B</b></td>
                                    <td><b>PP2A</b></td>
                                    <td><b>PP2B</b></td>
                                    <td><b>PP3A</b></td>
                                    <td><b>PP3B</b></td>
                                    <td><b>PP4A</b></td>
                                    <td><b>NSD</b></td>
                                    <td><b>ME1</b></td>
                                    <td><b>ME2</b></td>
                                    <td><b>ME3</b></td>
                                    <td><b>Total</b></td>
                                    <td><b>Functionality</b></td>
                                </tr>
                            </thead>
                            <tbody id="hb-city-details">
                            </tbody>
                            <tfoot id="hb-totals">
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- <script>
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
        region: '{{ old("inputRegion") }}',
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

    const fetchDataAndPopulate = (url, params, dropdown, valueKey, textKey, placeholder) => {
        $.get(url, params)
            .done(data => {
                if (!data || data.length === 0) {
                    clearAndDisableDropdown(dropdown, placeholder);
                    return;
                }
                populateDropdown(dropdown, data, valueKey, textKey, placeholder);
            })
            .fail(() => {
                alert(`Failed to fetch ${placeholder.toLowerCase()}.`);
            });
    };

    fetchDataAndPopulate(routes.getRegions, {}, dropdowns.region, 'reg_code', 'name', 'Region');

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
            }, dropdowns.city, 'psgc_code', 'name', 'City/Municipality');
            $.get(routes.getInventory, {
                reg_code: regionCode
            }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
            return;
        }

        fetchDataAndPopulate(routes.getProvinces, {
            reg_code: regionCode
        }, dropdowns.province, 'prov_code', 'name', 'Province');
        fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
            reg_code: regionCode,
            excludeProvincialAreas: true
        }, dropdowns.city, 'psgc_code', 'name', 'City/Municipality');

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
        }, dropdowns.city, 'psgc_code', 'name', 'City/Municipality');

        // Fetch inventory details
        $.get(routes.getInventory, {
            prov_code: provinceCode
        }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
    });

    // City selection
    dropdowns.city.change(function() {
        const psgcCode = $(this).val();
        if (!psgcCode) return;

        // Fetch inventory details
        $.get(routes.getInventory, {
            psgc_code: psgcCode
        }).done(handleTableData).fail(() => alert('Failed to fetch city details.'));
    });
});
</script> -->