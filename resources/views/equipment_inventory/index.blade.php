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
                    <select id="city-dropdown" disabled class="form-control" name="inputCity">
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
        if (!data) return;

        let hbCityDetails = $('#hb-city-details');
        let hbTotals = $('#hb-totals');
        let wsCityDetails = $('#ws-city-details');
        let wsTotals = $('#ws-totals');
        let muacCityDetails = $('#muac-city-details');
        let muacTotals = $('#muac-totals');

        hbCityDetails.empty()
        hbTotals.empty()
        wsCityDetails.empty()
        wsTotals.empty()
        muacCityDetails.empty()
        muacTotals.empty()

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
            let label = index === 0 ? "Sub Total" : "Grand Total";

            if ((provinceDropdown.val() || cityDropdown.val()) && index === 1) return;

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

    // Region dropdown
    $.get('{{ route("equipment.regions.get") }}')
        .done(function(data) {
            let regionDropdown = $('#region-dropdown');
            regionDropdown.empty().append('<option value="" disabled selected>Select Region</option>');
            data.forEach(function(region) {
                regionDropdown.append('<option value="' + region.reg_code + '">' + region.name +
                    '</option>');
            });
        })
        .fail(function() {
            alert('Failed to fetch regions.');
        });

    // Region selection
    $('#region-dropdown').change(function() {
        let regionCode = $(this).val();
        let ncrRegionCode = '13';

        $('#province-dropdown').empty().append(
            '<option value="" disabled selected>Select Province</option>').prop('disabled', true);
        $('#city-dropdown').empty().append(
            '<option value="" disabled selected>Select City/Municipality</option>').prop('disabled',
            true);

        if (!regionCode) return;

        if (regionCode === ncrRegionCode) {
            $.get('{{ route("equipment.citiesAndMunicipalities.get") }}', {
                    reg_code: regionCode
                })
                .done(function(data) {
                    if (!data) return;

                    let cityDropdown = $('#city-dropdown');
                    cityDropdown.empty().append(
                        '<option value="" disabled selected>Select City/Municipality</option>'
                    );
                    data.forEach(function(city) {
                        cityDropdown.append('<option value="' + city.psgc_code +
                            '">' + city.name + '</option>');
                    });
                    cityDropdown.prop('disabled', false);

                })
                .fail(function() {
                    alert('Failed to fetch cities/municipalities for NCR.');
                });
        } else {
            $.get('{{ route("equipment.provinces.get") }}', {
                    reg_code: regionCode
                })
                .done(function(data) {
                    if (!data) return;

                    let provinceDropdown = $('#province-dropdown');
                    provinceDropdown.empty().append(
                        '<option value="" disabled selected>Select Province</option>');
                    data.forEach(function(province) {
                        provinceDropdown.append('<option value="' + province
                            .prov_code + '">' + province.name + '</option>');
                    });
                    provinceDropdown.prop('disabled', false);
                })
                .fail(function() {
                    alert('Failed to fetch provinces.');
                });
        }

        $.get('{{ route("equipment.citiesAndMunicipalitiesInventory.get") }}', {
                reg_code: regionCode
            })
            .done(handleTableData)
            .fail(function() {
                alert('Failed to fetch city details.');
            });
    });

    // Province selection
    $('#province-dropdown').change(function() {
        let provinceCode = $(this).val();
        if (!provinceCode) return;

        $.get('{{ route("equipment.citiesAndMunicipalities.get") }}', {
                prov_code: provinceCode
            })
            .done(function(data) {
                if (!data) return;

                let cityDropdown = $('#city-dropdown');
                cityDropdown.empty().append(
                    '<option value="" disabled selected>Select City/Municipality</option>'
                );
                data.forEach(function(city) {
                    cityDropdown.append('<option value="' + city.psgc_code + '">' +
                        city.name + '</option>');
                });
                cityDropdown.prop('disabled', false);
            })
            .fail(function() {
                alert('Failed to fetch cities/municipalities.');
            });

        $.get('{{ route("equipment.citiesAndMunicipalitiesInventory.get") }}', {
                prov_code: provinceCode
            })
            .done(handleTableData)
            .fail(function() {
                alert('Failed to fetch city details.');
            });

    });

    // City selection
    $('#city-dropdown').change(function() {
        let psgcCode = $(this).val();
        if (!psgcCode) return;

        $.get('{{ route("equipment.citiesAndMunicipalitiesInventory.get") }}', {
                psgc_code: psgcCode
            })
            .done(handleTableData)
            .fail(function() {
                alert('Failed to fetch city details.');
            });
    });

});
</script>