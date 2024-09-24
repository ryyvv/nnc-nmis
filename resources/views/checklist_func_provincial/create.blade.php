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
            <table class="table table-striped table-hover/" style="overflow-x:auto">
                <thead style="background-color:#508D4E;">
                    <th class="tableheader" style="text-align: left;">Indicator</th>
                    <th class="tableheader" style="text-align: left;">Description</th>
                    <th class="tableheader" style="text-align: left;">Status</th>
                </thead>
                <tbody>
                    <!-- CD -->
                    <tr>
                        <td class="bold">CD - Capacity Development</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>CD</td>
                        <td>Members of local nutrition committee trained/ completed training on Nutrition Program
                            Management</td>
                        <td>
                            <select id="inputCD" class="form-control indicator-status" name="inputCD">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
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
                        <td colspan="1" class="bold">PP1</td>
                        <td colspan="2" class="bold">Re/Organization/ Strengthening of
                            PNC/CNC</td>
                    </tr>
                    <tr>
                        <td>PP1A</td>
                        <td>Meetings regularly held at least once every quarter presided by the LCE or
                            designated representative</td>
                        <td>
                            <select id="inputPP1A" class="form-control indicator-status" name="inputPP1A">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP1A')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>PP1B</td>
                        <td>Minutes of meetings documented and filed</td>
                        <td>
                            <select id="inputPP1B" class="form-control indicator-status" name="inputPP1B">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP1B')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- PP2 -->
                    <tr>
                        <td colspan="1" class="bold">PP2</td>
                        <td colspan="2" class="bold">Conduct of Nutritional Assessment</td>
                    </tr>
                    <tr>
                        <td>PP2A</td>
                        <td>OPT Plus & school weighing report updated</td>
                        <td>
                            <select id="inputPP2A" class="form-control indicator-status" name="inputPP2A">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP2A')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>PP2B </td>
                        <td>Nutrition situation report prepared</td>
                        <td>
                            <select id="inputPP2B" class="form-control indicator-status" name="inputPP2B">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP2B')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- PP3 -->
                    <tr>
                        <td colspan="1" class="bold">PP3</td>
                        <td colspan="2" class="bold">Formulation of nutrition action
                            plan</td>
                    </tr>
                    <tr>
                        <td>PP3A</td>
                        <td>NAP integrated into the local development plan with budget</td>
                        <td>
                            <select id="inputPP3A" class="form-control indicator-status" name="inputPP3A">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP3A')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>PP3B</td>
                        <td>NAP integrated into the Annual Investment Plan</td>
                        <td>
                            <select id="inputPP3B" class="form-control indicator-status" name="inputPP3B">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP3B')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <!-- PP4 -->
                    <tr>
                        <td colspan="1" class="bold">PP4</td>
                        <td colspan="2" class="bold">Resource Generation and
                            Mobilization</td>
                    </tr>
                    <tr>
                        <td>PP4A</td>
                        <td>Funds allocated and expended for nutrition and related activities from annual budget</td>
                        <td>
                            <select id="inputPP4A" class="form-control indicator-status" name="inputPP4A">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputPP4A')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>

                    <!-- NSD -->
                    <tr>
                        <td class="bold">NSD - Delivery of nutrition and related services</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>NSD</td>
                        <td>Targeted groups provided with nutrition and related interventions</td>
                        <td>
                            <select id="inputNSD" class="form-control indicator-status" name="inputNSD">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
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
                    <tr>
                        <td>ME1</td>
                        <td>Monitoring visits conducted and documented at least twice a year</td>
                        <td>
                            <select id="inputME1" class="form-control indicator-status" name="inputME1s">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputME1')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>ME2</td>
                        <td>Quarterly monitoring report prepared and submitted to NNC regional office</td>
                        <td>
                            <select id="inputME2" class="form-control indicator-status" name="inputME2">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputME2')
                            <div class="text-danger">{{ $message  }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>ME3</td>
                        <td>Program Implementation Review conducted at least once a year with documentation and
                            submitted to NNC regional office</td>
                        <td>
                            <select id="inputME3" class="form-control indicator-status" name="inputME3">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                            </select>
                            @error('inputME3')
                            <div class="text-danger">{{ $message  }}</div>
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

        $('.indicator-status').each(function() {
            let selectedValue = $(this).val();
            total += selectedValue ? parseInt(selectedValue) : 0;
        });

        $('#inputTotal').val(total);

        updateFunctionality(total);
    }

    function updateFunctionality(total) {
        let functionalityStatus = "";

        switch (true) {
            case (total >= 12):
                functionalityStatus = "Fully Functional";
                break;
            case (total >= 10):
                functionalityStatus = "Substantially Functional";
                break;
            case (total >= 8):
                functionalityStatus = "Partially Functional";
                break;
            default:
                functionalityStatus = "Non-functional";
        }

        $('#inputFunctionality').val(functionalityStatus);
    }


    $('.indicator-status').on('change click', function() {
        calculateIndicatorTotal();
    });

    calculateIndicatorTotal();
});
</script>