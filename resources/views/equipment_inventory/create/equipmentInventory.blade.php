@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Equipment Inventory',
'activePage' => 'EquipmentInventoryIndex',
'activeNav' => '',
])

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css').time()}}" >
<script src="{{ asset('assets/js/joboy.js') }}"></script>

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("Equipment Inventory")}}</h5>
            </div>
        </div>
        <form action="{{ route('equipmentInventory.store') }}" method="POST">
        @csrf
            <hr>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputPSGC">PSGC</label>
                    <input type="text" class="form-control" name="inputPSGC" id="inputPSGC" placeholder="PSGC" readonly value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRegion">Region</label>
                    <input type="text" class="form-control" name="inputRegion" id="inputRegion" placeholder="Region" readonly value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputProvince">Province</label>
                    <input type="text" class="form-control" name="inputProvince" id="inputProvince" placeholder="Province" readonly value="1">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCM">City/Municipality</label>
                    <input type="text" class="form-control"name="inputCM" id="inputCM" placeholder="City/Municipality" readonly value="1">
                </div>
            </div>
            <hr>
            <div class="form-group col-md-4" id="totalBarangay" style="display:flex; border-right:1px solid;">
                <div class="form-group col-md-6">
                    <label for="inputtotalBarangay">Total No. of Barangay</label>
                    <input type="number" class="form-control" name="inputtotalBarangay" id="inputtotalBarangay" placeholder='0' onchange="totalHB()">
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
                        <input type="number" class="form-control" name="inputWHB" id="inputWHB" placeholder="0" onchange="totalHB()">
                        <label for="inputNonWHB">Non-wooden HB</label>
                        <input type="number" class="form-control" name="inputNonWHB" id="inputNonWHB" placeholder="0" onchange="totalHB()">
                        <label for="inputHBNonF">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputHBNonF" id="inputHBNonF" placeholder="0" onchange="totalHB()">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalHB">Total HB</label>
                        <input type="number" class="form-control" name="inputTotalHB" id="inputTotalHB" placeholder="0" readonly>
                        <label for="inputHBpercent">HB% Availability</label>
                        <input type="number" class="form-control" name="inputHBpercent" id="inputHBpercent" placeholder="0" readonly>
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-4">
                        <label for="inputSteelRules">Steel Rules</label>
                        <input type="number" class="form-control" name="inputSteelRules" id="inputSteelRules" placeholder="0" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputMicrotoise">Microtoise</label>
                        <input type="number" class="form-control" name="inputMicrotoise" id="inputMicrotoise" placeholder="0" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputInfantometer">Infantometer</label>
                        <input type="number" class="form-control" name="inputInfantometer" id="inputInfantometer" placeholder="0" >
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB">
                    <div class="form-group col-md-12">
                        <label for="inputHBRemarks">Remarks</label>
                        <input type="text" class="form-control" name="inputHBRemarks" id="inputHBRemarks" placeholder="Remarks" >
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
                        <input type="number" class="form-control" name="inputWSHanging" id="inputWSHanging" placeholder="0" onchange="totalWS()">
                        <label for="inputWSNonF">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputWSNonF" id="inputWSNonF" placeholder="0" onchange="totalWS()">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalWS">Total WS</label>
                        <input type="text" class="form-control" name="inputTotalWS" id="inputTotalWS" placeholder="0" readonly>
                        <label for="inputWSpercent">WS% Availability</label>
                        <input type="text" class="form-control" name="inputWSpercent" id="inputWSpercent" placeholder="0" readonly>
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-6">
                        <label for="inputInfantScale">Infant Scale</label>
                        <input type="text" class="form-control" name="inputInfantScale" id="inputInfantScale" placeholder="0" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputBeamBalance">Beam Balance</label>
                        <input type="text" class="form-control" name="inputBeamBalance" id="inputBeamBalance" placeholder="0" >
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB">
                    <div class="form-group col-md-12">
                        <label for="inputWSRemarks">Remarks</label>
                        <input type="text" class="form-control" name="inputWSRemarks" id="inputWSRemarks" placeholder="Remarks" >
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
                        <input type="number" class="form-control" name="inputMChild" id="inputMChild" placeholder="0" onchange="muac_child()">
                        <label for="inputMNonFChild">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputMNonFChild" id="inputMNonFChild" placeholder="0" onchange="muac_child()">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalChild">Total (Child)</label>
                        <input type="number" class="form-control" name="inputTotalChild" id="inputTotalChild" placeholder="0" readonly>
                        <label for="inputChildpercent">% Availability (Child)</label>
                        <input type="number" class="form-control" name="inputChildpercent" id="inputChildpercent" placeholder="0" readonly>
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-6">
                        <label for="inputMAdult">Adult</label>
                        <input type="number" class="form-control" name="inputMAdult" id="inputMAdult" placeholder="0" onchange="muac_adult()">
                        <label for="inputMNonFAdult">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputMNonFAdult" id="inputMNonFAdult" placeholder="0" onchange="muac_adult()">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalAdult">Total (Adult)</label>
                        <input type="number" class="form-control" name="inputTotalAdult" id="inputTotalAdult" placeholder="0" readonly>
                        <label for="inputAdultpercent">% Availability (Adult)</label>
                        <input type="number" class="form-control" name="inputAdultpercent" id="inputAdultpercent" placeholder="0" readonly>
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB">
                    <div class="form-group col-md-12">
                        <label for="inputMRemarks">Remarks</label>
                        <input type="text" class="form-control" name="inputMRemarks" id="inputMRemarks" placeholder="Remarks" >
                    </div>
                </div>
            </div>
            <hr>
            <!-- <div class="form-group col-md-12" style="display:flex;">
                <div class="form-group col-md-2">
                    <label for="inputEISubtotal">Subtotal</label>
                    <input type="number" class="form-control" id="inputEISubtotal" value="0" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEIGrandTotal">Grand Total</label>
                    <input type="number" class="form-control" id="inputEIGrandTotal" value="0" disabled>
                </div>
            </div> -->
            <div class="form-group col-md-12" style="display:flex;">
                <button type="submit" name="addEquipmentInventory" class="btn btn-outline-primary">Add Equipment Inventory</button>
            </div>
        </form>
    </div>
</div>
@endsection