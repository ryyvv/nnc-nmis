<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/diether.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/joboy.js') }}"></script>

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
                <div style="display: flex; align-items: baseline; margin-bottom:15px;">
                    <a href="{{ route('lncFunctionality.index') }}" style="margin-right: 15px;">
                        <i class="now-ui-icons arrows-1_minimal-left" style="font-size: 18px; font-weight: bold;"></i>
                    </a>
                    <h5 class="title" style="margin: 0; line-height: 1;">{{ __("Create LNC CHECKLIST") }}</h5>
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

        <div class="row table-responsive" style="display:flex;padding:10px;">
            <table class="table table-hover/" style="overflow-x:auto">
                <thead style="background-color:#508D4E;">
                    <th class="tableheader" style="text-align: left;">Key Activities</th>
                    <th class="tableheader" style="text-align: left;">Indicator</th>
                    <th class="tableheader" style="text-align: left;">Status</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="bold">CD - Capacity Development</td>
                        <td>a. Members if local nutrition committee trained/completed training on Nutrition Program
                            management</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputCD" id="inputCD"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputCD')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror

                        </td>
                    </tr>

                    <!-- PP -->
                    <tr>
                        <td class="bold">PP - Program Planning</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <!-- PP1 -->
                    <tr>
                        <td rowspan="2">1. Organization/Re-Organization/Strengthening of PNC</td>
                        <td>a. Meetings regularly held at least once every quarter presided by the mayor or designated
                            representative</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP1A" id="inputPP1A"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP1A')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>b. Minutes of meetings documented</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP1B" id="inputPP1B"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP1B')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- PP2 -->
                    <tr>
                        <td rowspan="2">2. Conduct of Nutritional Assessment </td>
                        <td>a. OPT & school weighing report updated</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP2A" id="inputPP2A"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP2A')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>b. Nutrition situation report prepared</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP2B" id="inputPP2B"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP2B')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- PP3 -->
                    <tr>
                        <td rowspan="2">3. Formulation of Nutrition Action Plan</td>
                        <td>a. NAP integrated into the Local Development Plan with budget</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP3A" id="inputPP3A"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP3A')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>b. NAP integrated into the Annual Investment Plan</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP3B" id="inputPP3B"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP3B')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- PP4 -->
                    <tr>
                        <td rowspan="2">4. Resource Generation and Mobilization</td>
                        <td>a. Funds allocated and expended for nutrition and related activities from annual budget</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP4A" id="inputPP4A"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP4A')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>b. NAP integrated into the Annual Investment Plan</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputPP4B" id="inputPP4B"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputPP4B')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- NSD -->
                    <tr>
                        <td class="bold">NSD - Service Delivery</td>
                        <td>a. Targeted groups provided with nutrition and related interventions</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputNSD" id="inputNSD"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputNSD')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- ME -->
                    <tr>
                        <td class="bold">ME - Monitoring and Evaluation</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <!-- ME -->
                    <tr>
                        <td rowspan="3">&nbsp;</td>
                        <td>a. Monitoring visits conducted and documented at least twice a year</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputME1" id="inputME1"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputME1')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>b. Quarterly monitoring report prepared and submitted to Provincial Nutrition Office</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputME2" id="inputME2"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputME2')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>c. Program Implementation Review (PIR) conducted at least once a year with documentation and
                            submitted to Provincial Nutrition Office</td>
                        <td>
                            <input class="indicator" type="checkbox" name="inputME3" id="inputME3"
                                style="width: 24px; height: 24px; accent-color: #59987e;" value="1">
                            @error('inputME3')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td class="bold">SUMMARY</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <!-- Total -->
                    <tr>
                        <td class="bold">Total</td>
                        <td>&nbsp;</td>
                        <td class="bold">
                            <input type="number" class="form-control" name="inputTotal" id="inputTotal" value="0"
                                readonly>
                            @error('inputTotal')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- Functionality -->
                    <tr>
                        <td class="bold">Functinality</td>
                        <td>&nbsp;</td>
                        <td class="bold">
                            <input type="text" class="form-control" name="inputFunctionality" id="inputFunctionality"
                                placeholder="" readonly>
                            @error('inputFunctionality')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="display:flex;">
                <button type="submit" name="addChecklist" class="btn btn-primary">Add
                    Checklist</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
$(document).ready(function() {

    function calculateIndicatorTotal() {
        let total = 0;

        $('.indicator:checked').each(function() {
            total += parseInt($(this).val() || 0);
        });

        $('#inputTotal').val(total);
        updateFunctionality(total);
    }

    function updateFunctionality(total) {
        let functionalityStatus = "";

        if (total === 12) {
            functionalityStatus = "Fully Functional";
        } else if (total >= 10) {
            functionalityStatus = "Substantially Functional";
        } else if (total >= 8) {
            functionalityStatus = "Partially Functional";
        } else {
            functionalityStatus = "Non-functional";
        }

        $('#inputFunctionality').val(functionalityStatus);
    }


    $('.indicator').on('change', function() {
        calculateIndicatorTotal();
    });

    calculateIndicatorTotal();
});
</script>