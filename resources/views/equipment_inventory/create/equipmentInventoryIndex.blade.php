<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/diether.css') }}">
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
th, td {
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
'activePage' => 'EquipmentInventory',
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
                    <a class="btn btn-outline-primary" href="{{route('BSequipmentInventory.create')}}">Add Equipments</a>
                </div>
            </div>
        </div>
        <form action="#" method="POST">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputPSGC">Region</label>
                    <select id="loadRegion1" class="form-control" name="inputRegion">
                        <option selected>Region</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPSGC">Province</label>
                    <select id="loadProvince1" class="form-control" name="inputProvince">
                        <option selected>Province</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCM">City/Municipality</label>
                    <select id="loadCity1" class="form-control" name="inputCity">
                        <option selected>City/Municipality</option>
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
        <div class="form-row">
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
                        <tbody>
                            <tr>
                                <td><b>{{$equipmentInventory->psgccode_id}}</b></td>
                                <td><b>{{$equipmentInventory->municipal_id}}</b></td>
                                <td><b>{{$equipmentInventory->totalBarangay}}</b></td>
                                <td>{{$equipmentInventory->woodenHB}}</td>
                                <td>{{$equipmentInventory->nonWoodenHB}}</td>
                                <td>{{$equipmentInventory->defectiveHB}}</td>
                                <td>{{$equipmentInventory->totalHB}}</td>
                                <td>{{$equipmentInventory->availabilityHB}}</td>
                                <td>{{$equipmentInventory->steelRules}}</td>
                                <td>{{$equipmentInventory->microtoise}}</td>
                                <td>{{$equipmentInventory->infantometer}}</td>
                                <td>{{$equipmentInventory->remarksHB}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td><b></b></td>
                                <td><b>Grand Total</b></td>
                                <td><b>{{$totalBarangay}}</b></td>
                                <td><b>{{$woodenHB}}</b></td>
                                <td><b>{{$nonWoodenHB}}</b></td>
                                <td><b>{{$defectiveHB}}</b></td>
                                <td><b>{{$totalHB}}</b></td>
                                <td><b>{{$availabilityHB}}</b></td>
                                <td><b>{{$steelRules}}</b></td>
                                <td><b>{{$microtoise}}</b></td>
                                <td><b>{{$infantometer}}</b></td>
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
                                <td><b>{{$totalBarangay}}</b></td>
                                <td><b>{{$hangingType}}</b></td>
                                <td><b>{{$defectiveWS}}</b></td>
                                <td><b>{{$totalWS}}</b></td>
                                <td><b>{{$availabilityWS}}</b></td>
                                <td><b>{{$infatScale}}</b></td>
                                <td><b>{{$beamBalance}}</b></td>
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
                                <td><b>{{$totalBarangay}}</b></td>
                                <td><b>{{$child}}</b></td>
                                <td><b>{{$defectiveMUAC_child}}</b></td>
                                <td><b>{{$totalMUAC_Child}}</b></td>
                                <td><b>{{$availabilityMUAC_child}}</b></td>
                                <td><b>{{$adults}}</b></td>
                                <td><b>{{$defectiveMUAC_adults}}</b></td>
                                <td><b>{{$totalMUAC_adults}}</b></td>
                                <td><b>{{$availabilityMUAC_adults}}</b></td>
                                <td><b></b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row row-12">

        </div>
    </div>
</div>
@endsection