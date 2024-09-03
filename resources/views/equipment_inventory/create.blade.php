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
                <h5 class="title">{{__("Equipment Inventory")}}</h5>
            </div>
        </div>
        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <form action="{{ route('BSequipmentInventory.store') }}" id="form" method="POST">
            @csrf
            <hr>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputPSGC">PSGC</label>
                    <!-- <input type="text" class="form-control" name="inputPSGC" id="inputPSGC"
                        placeholder="PSGC" readonly> -->
                    <input type="text" class="form-control" name="inputPSGC" id="inputPSGC" placeholder="PSGC">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPSGC">Region</label>
                    <!-- <select id="loadRegionEI" class="form-control" name="inputRegionNAO">
                        <option selected>Region</option>
                    </select> -->
                    <input type="text" id="loadRegionEI" class="form-control" name="inputRegion">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPSGC">Province</label>
                    <!-- <select id="loadProvinceEI" class="form-control" name="inputProvinceNAO">
                        <option selected>Province</option>
                    </select> -->
                    <input type="text" id="loadProvinceEI" class="form-control" name="inputProvince">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCM">City/Municipality</label>
                    <!-- <select id="loadCityEI" class="form-control" name="inputCityNAO">
                        <option selected>City/Municipality</option>
                    </select> -->
                    <input type="text" id="loadCityEI" class="form-control" name="inputCM">
                </div>
            </div>
            <hr>
            <div class="form-group col-md-4" id="totalBarangay" style="display:flex; border-right:1px solid;">
                <div class="form-group col-md-6">
                    <label for="inputtotalBarangay">Total No. of Barangay</label>
                    <input type="number" class="form-control" name="inputtotalBarangay" id="inputtotalBarangay"
                        value="{{ old('inputtotalBarangay') }}" placeholder='0' onchange="totalHB()">
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
                            value="{{ old('inputWHB') }}" placeholder="0" onchange="totalHB()">
                        @error('inputWHB')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputNonWHB">Non-wooden HB</label>
                        <input type="number" class="form-control" name="inputNonWHB" id="inputNonWHB"
                            value="{{ old('inputNonWHB') }}" placeholder="0" onchange="totalHB()">
                        @error('inputNonWHB')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputHBNonF">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputHBNonF" id="inputHBNonF"
                            value="{{ old('inputHBNonF') }}" placeholder="0" onchange="totalHB()">
                        @error('inputHBNonF')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalHB">Total HB</label>
                        <input type="number" class="form-control" name="inputTotalHB" id="inputTotalHB"
                            value="{{ old('inputTotalHB') }}" placeholder="0" readonly>
                        @error('inputTotalHB')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputHBpercent">HB% Availability</label>
                        <input type="number" class="form-control" name="inputHBpercent" id="inputHBpercent"
                            value="{{ old('inputHBpercent') }}" placeholder="0" readonly>
                        @error('inputHBpercent')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-4">
                        <label for="inputSteelRules">Steel Rules</label>
                        <input type="number" class="form-control" name="inputSteelRules" id="inputSteelRules"
                            value="{{ old('inputSteelRules') }}" placeholder="0">
                        @error('inputSteelRules')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputMicrotoise">Microtoise</label>
                        <input type="number" class="form-control" name="inputMicrotoise" id="inputMicrotoise"
                            value="{{ old('inputMicrotoise') }}" placeholder="0">
                        @error('inputMicrotoise')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputInfantometer">Infantometer</label>
                        <input type="number" class="form-control" name="inputInfantometer" id="inputInfantometer"
                            value="{{ old('inputInfantometer') }}" placeholder="0">
                        @error('inputInfantometer')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB">
                    <div class="form-group col-md-12">
                        <label for="inputHBRemarks">Remarks</label>
                        <input type="text" class="form-control" name="inputHBRemarks" id="inputHBRemarks"
                            value="{{ old('inputHBRemarks') }}" placeholder="Remarks">
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
                            value="{{ old('inputWSHanging') }}" placeholder="0" onchange="totalWS()">
                        @error('inputWSHanging')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputWSNonF">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputWSNonF" id="inputWSNonF"
                            value="{{ old('inputWSNonF') }}" placeholder="0" onchange="totalWS()">
                        @error('inputWSNonF')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalWS">Total WS</label>
                        <input type="text" class="form-control" name="inputTotalWS" id="inputTotalWS"
                            value="{{ old('inputTotalWS') }}" placeholder="0" readonly>
                        @error('inputTotalWS')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputWSpercent">WS% Availability</label>
                        <input type="text" class="form-control" name="inputWSpercent" id="inputWSpercent"
                            value="{{ old('inputWSpercent') }}" placeholder="0" readonly>
                        @error('inputWSpercent')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-6">
                        <label for="inputInfantScale">Infant Scale</label>
                        <input type="text" class="form-control" name="inputInfantScale" id="inputInfantScale"
                            value="{{ old('inputInfantScale') }}" placeholder="0">
                        @error('inputInfantScale')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputBeamBalance">Beam Balance</label>
                        <input type="text" class="form-control" name="inputBeamBalance" id="inputBeamBalance"
                            value="{{ old('inputBeamBalance') }}" placeholder="0">
                        @error('inputBeamBalance')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB">
                    <div class="form-group col-md-12">
                        <label for="inputWSRemarks">Remarks</label>
                        <input type="text" class="form-control" name="inputWSRemarks" id="inputWSRemarks"
                            value="{{ old('inputWSRemarks') }}" placeholder="Remarks">
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
                            value="{{ old('inputMChild') }}" placeholder="0" onchange="muac_child()">
                        @error('inputMChild')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputMNonFChild">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputMNonFChild" id="inputMNonFChild"
                            value="{{ old('inputMNonFChild') }}" placeholder="0" onchange="muac_child()">
                        @error('inputMNonFChild')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalChild">Total (Child)</label>
                        <input type="number" class="form-control" name="inputTotalChild" id="inputTotalChild"
                            value="{{ old('inputTotalChild') }}" placeholder="0" readonly>
                        @error('inputTotalChild')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputChildpercent">% Availability (Child)</label>
                        <input type="number" class="form-control" name="inputChildpercent" id="inputChildpercent"
                            value="{{ old('inputChildpercent') }}" placeholder="0" readonly>
                        @error('inputChildpercent')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB" style="display:flex; border-right:1px solid;">
                    <div class="form-group col-md-6">
                        <label for="inputMAdult">Adult</label>
                        <input type="number" class="form-control" name="inputMAdult" id="inputMAdult"
                            value="{{ old('inputMAdult') }}" placeholder="0" onchange="muac_adult()">
                        @error('inputMAdult')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputMNonFAdult">Defective/Non-functional</label>
                        <input type="number" class="form-control" name="inputMNonFAdult" id="inputMNonFAdult"
                            value="{{ old('inputMNonFAdult') }}" placeholder="0" onchange="muac_adult()">
                        @error('inputMNonFAdult')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTotalAdult">Total (Adult)</label>
                        <input type="number" class="form-control" name="inputTotalAdult" id="inputTotalAdult"
                            value="{{ old('inputTotalAdult') }}" placeholder="0" readonly>
                        @error('inputTotalAdult')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="inputAdultpercent">% Availability (Adult)</label>
                        <input type="number" class="form-control" name="inputAdultpercent" id="inputAdultpercent"
                            value="{{ old('inputAdultpercent') }}" placeholder="0" readonly>
                        @error('inputAdultpercent')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-4" id="formHB">
                    <div class="form-group col-md-12">
                        <label for="inputMRemarks">Remarks</label>
                        <input type="text" class="form-control" name="inputMRemarks" id="inputMRemarks"
                            value="{{ old('inputMRemarks') }}" placeholder="Remarks">
                        @error('inputMRemarks')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                <button type="button" name="addEquipmentInventory" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    Add Equipment Inventory
                </button>
            </div>
        </form>
    </div>
</div>
<!-- alert Modal -->
@include('Modal.Submit')

@endsection

<script>
$(document).ready(function() {
    $('#submit').on('click', function() {
        $('#form').submit();
    });
});
</script>