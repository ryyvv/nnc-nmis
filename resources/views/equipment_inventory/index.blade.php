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
                    <a class="btn btn-outline-primary" href="{{route('CMSequipmentInventory.create')}}">Add
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

                        @foreach ($EquipmentInventory as $equipmentInventory)
                        <tbody id="city-details">
                        </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td><b></b></td>
                                <td><b>Grand Total</b></td>
                                <td><b>{{ $grandTotal['totalBarangay'] }}</b></td>
                                <td><b>{{ $grandTotal['woodenHB'] }}</b></td>
                                <td><b>{{ $grandTotal['nonWoodenHB'] }}</b></td>
                                <td><b>{{ $grandTotal['defectiveHB'] }}</b></td>
                                <td><b>{{ $grandTotal['totalHB'] }}</b></td>
                                <td><b>{{ $grandTotal['availabilityHB'] }}</b></td>
                                <td><b>{{ $grandTotal['steelRules'] }}</b></td>
                                <td><b>{{ $grandTotal['microtoise'] }}</b></td>
                                <td><b>{{ $grandTotal['infantometer'] }}</b></td>
                                <td><b></b></td>
                            </tr>
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
                        <tbody>
                            @foreach ($EquipmentInventory as $equipmentInventory)
                            <tr>
                                <td><b>{{$equipmentInventory->psgccode_id}}</b></td>
                                <td><b>{{$equipmentInventory->municipal_id}}</b></td>
                                <td><b>{{$equipmentInventory->totalBarangay}}</b></td>
                                <td>{{$equipmentInventory->hangingType}}</td>
                                <td>{{$equipmentInventory->defectiveWS}}</td>
                                <td>{{$equipmentInventory->totalWS}}</td>
                                <td>{{$equipmentInventory->availabilityWS}}</td>
                                <td>{{$equipmentInventory->infatScale}}</td>
                                <td>{{$equipmentInventory->beamBalance}}</td>
                                <td>{{$equipmentInventory->remarksWS}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><b></b></td>
                                <td><b>Grand Total</b></td>
                                <td><b>{{ $grandTotal['totalBarangay'] }}</b></td>
                                <td><b>{{ $grandTotal['hangingType'] }}</b></td>
                                <td><b>{{ $grandTotal['defectiveWS'] }}</b></td>
                                <td><b>{{ $grandTotal['totalWS'] }}</b></td>
                                <td><b>{{ $grandTotal['availabilityWS'] }}</b></td>
                                <td><b>{{ $grandTotal['infatScale'] }}</b></td>
                                <td><b>{{ $grandTotal['beamBalance'] }}</b></td>
                                <td><b></b></td>
                            </tr>
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

                        <tbody>
                            @foreach ($EquipmentInventory as $equipmentInventory)
                            <tr>
                                <td><b>{{$equipmentInventory->psgccode_id}}</b></td>
                                <td><b>{{$equipmentInventory->municipal_id}}</b></td>
                                <td><b>{{$equipmentInventory->totalBarangay}}</b></td>
                                <td>{{$equipmentInventory->child}}</td>
                                <td>{{$equipmentInventory->defectiveMUAC_child}}</td>
                                <td>{{$equipmentInventory->totalMUAC_Child}}</td>
                                <td>{{$equipmentInventory->availabilityMUAC_child}}</td>
                                <td>{{$equipmentInventory->adults}}</td>
                                <td>{{$equipmentInventory->defectiveMUAC_adults}}</td>
                                <td>{{$equipmentInventory->totalMUAC_adults}}</td>
                                <td>{{$equipmentInventory->availabilityMUAC_adults}}</td>
                                <td>{{$equipmentInventory->remarksMUAC}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><b></b></td>
                                <td><b>Grand Total</b></td>
                                <td><b>{{ $grandTotal['totalBarangay'] }}</b></td>
                                <td><b>{{ $grandTotal['child'] }}</b></td>
                                <td><b>{{ $grandTotal['defectiveMUAC_child'] }}</b></td>
                                <td><b>{{ $grandTotal['totalMUAC_Child'] }}</b></td>
                                <td><b>{{ $grandTotal['availabilityMUAC_child'] }}</b></td>
                                <td><b>{{ $grandTotal['adults'] }}</b></td>
                                <td><b>{{ $grandTotal['defectiveMUAC_adults'] }}</b></td>
                                <td><b>{{ $grandTotal['totalMUAC_adults'] }}</b></td>
                                <td><b>{{ $grandTotal['availabilityMUAC_adults'] }}</b></td>
                                <td><b></b></td>
                            </tr>
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
    // Populate regions dropdown
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


    // Handle region selection
    $('#region-dropdown').change(function() {
        let regionCode = $(this).val().trim().toString();
        let ncrRegionCode = '13';

        // Reset and disable province and city dropdowns
        $('#province-dropdown').empty().append(
            '<option value="" disabled selected>Select Province</option>').prop('disabled', true);
        $('#city-dropdown').empty().append(
            '<option value="" disabled selected>Select City/Municipality</option>').prop('disabled',
            true);

        if (regionCode) {
            if (regionCode === ncrRegionCode) {
                // Fetch cities/municipalities for NCR
                $.get('cities-and-municipalities-ncr/' + regionCode)
                    .done(function(data) {
                        if (data.length) {
                            let cityDropdown = $('#city-dropdown');
                            cityDropdown.empty().append(
                                '<option value="" disabled selected>Select City/Municipality</option>'
                            );
                            data.forEach(function(city) {
                                cityDropdown.append('<option value="' + city.psgc_code +
                                    '">' + city.name + '</option>');
                            });
                            cityDropdown.prop('disabled', false);
                        }
                    })
                    .fail(function() {
                        alert('Failed to fetch cities/municipalities for NCR.');
                    });
            } else {
                // Fetch provinces
                $.get('provinces/' + regionCode)
                    .done(function(data) {
                        if (data.length) {
                            let provinceDropdown = $('#province-dropdown');
                            provinceDropdown.empty().append(
                                '<option value="" disabled selected>Select Province</option>');
                            data.forEach(function(province) {
                                provinceDropdown.append('<option value="' + province
                                    .prov_code + '">' + province.name + '</option>');
                            });
                            provinceDropdown.prop('disabled', false);
                        }
                    })
                    .fail(function() {
                        alert('Failed to fetch provinces.');
                    });
            }
        }

        if (regionCode) {
            if (regionCode === ncrRegionCode) {

            } else {
                // Fetch provinces
                $.get('provinces/' + regionCode)
                    .done(function(data) {
                        if (data.length) {
                            let provinceDropdown = $('#province-dropdown');
                            provinceDropdown.empty().append(
                                '<option value="" disabled selected>Select Province</option>');
                            data.forEach(function(province) {
                                provinceDropdown.append('<option value="' + province
                                    .prov_code + '">' + province.name + '</option>');
                            });
                            provinceDropdown.prop('disabled', false);
                        }
                    })
                    .fail(function() {
                        alert('Failed to fetch provinces.');
                    });
            }
        }



    });

    // Handle province selection
    $('#province-dropdown').change(function() {
        let provinceCode = $(this).val();
        if (provinceCode) {
            $.get('cities-and-municipalities/' + provinceCode)
                .done(function(data) {
                    if (data.length) {
                        let cityDropdown = $('#city-dropdown');
                        cityDropdown.empty().append(
                            '<option value="" disabled selected>Select City/Municipality</option>'
                        );
                        data.forEach(function(city) {
                            cityDropdown.append('<option value="' + city.psgc_code + '">' +
                                city.name + '</option>');
                        });
                        cityDropdown.prop('disabled', false);
                    }
                })
                .fail(function() {
                    alert('Failed to fetch cities/municipalities.');
                });
        }

        // if (provinceCode) {
        //     $.get('cities-and-municipalities-inventory/' + provinceCode)
        //         .done(function(data) {
        //             if (data.length) {
        //                 let cityDetails = $('#city-details');
        //                 cityDetails.empty();
        //                 data.forEach(function(city) {
        //                     cityDetails.append(
        //                         `<tr>
        //                         <td><b>${city.psgc_code}</b></td>
        //                         <td><b>${city.name}</b></td>
        //                         <td><b>${city.total_barangay}</b></td>
        //                         <td><b>${city.wooden_hb}</b></td>
        //                         <td><b>${city.non_wooden_hb}</b></td>
        //                         <td><b>${city.defective_hb}</b></td>
        //                         <td><b>${city.total_hb}</b></td>
        //                         <td><b>${city.availability_hb}</b></td>
        //                         <td><b>${city.steel_rules}</b></td>
        //                         <td><b>${city.microtoise}</b></td>
        //                         <td><b>${city.infantometer}</b></td>
        //                         <td><b>${city.remarks_hb}</b></td>
        //                     </tr>`
        //                     );
        //                 });
        //             } else {

        //                 $('#city-details').empty();
        //             }
        //         })
        //         .fail(function() {
        //             alert('Failed to fetch city details.');
        //         });
        // } else {
        //     $('#city-details').empty();
        // }
    });

    // Handle city selection
    // $('#city-dropdown').change(function() {
    //     let psgcCode = $(this).val();
    //     console.log(psgcCode)
    //     if (psgcCode) {
    //         $.get('city-inventory/' + psgcCode)
    //             .done(function(data) {
    //                 console.log(data);
    //                 if (data.length) {
    //                     let cityDetails = $('#city-details');
    //                     data.forEach(function(city) {
    //                         cityDetails.append(
    //                             `<tr>
    //                             <td><b>${city.psgc_code}</b></td>
    //                             <td><b>${city.name}</b></td>
    //                             <td><b>${city.total_barangay}</b></td>
    //                             <td><b>${city.wooden_hb}</b></td>
    //                             <td><b>${city.non_wooden_hb}</b></td>
    //                             <td><b>${city.defective_hb}</b></td>
    //                             <td><b>${city.total_hb}</b></td>
    //                             <td><b>${city.availability_hb}</b></td>
    //                             <td><b>${city.steel_rules}</b></td>
    //                             <td><b>${city.microtoise}</b></td>
    //                             <td><b>${city.infantometer}</b></td>
    //                             <td><b>${city.remarks_hb}</b></td>
    //                         </tr>`
    //                         );
    //                     });
    //                 } else {

    //                     $('#city-details').empty();
    //                 }
    //             })
    //             .fail(function() {
    //                 alert('Failed to fetch city details.');
    //             });
    //     } else {
    //         $('#city-details').empty();
    //     }
    // });

});
</script>