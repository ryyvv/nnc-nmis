<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">

<style>
.form-section {
    display: none;
}

.form-section.current {
    display: inline;
}

.striped-rows .row:nth-child(odd) {
    background-color: #f2f2f2;
}

.col-sm {
    margin: auto;
    padding: 1rem 1rem;
}

.row .form-control {
    border-color: #bebebe !important;
    border: 1px solid;
    border-radius: 5px;
}
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Budget AIP',
'activePage' => 'budgetAIP',
'activeNav' => '',
])


@section('content')

<div class="panel-header panel-header-sm"></div>

<div class="content" style="padding:2%">
    <div class="card">
        <h4>MELLPI PRO FORM B: BARANGAY PROFILE SHEET</h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form   method="POST">
                @csrf

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">
                <!-- header -->
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <input type="text" class="form-control" name="municipal_id"
                            value="{{auth()->user()->city_municipal }}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>
                        <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}">
                        <input type="hidden" class="form-control" name="region_id" value="{{auth()->user()->Region}}">
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Date of Monitoring:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dateMonitoring">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCovereda">
                    </div> 
                </div>
                <!-- endheader -->
                <br>
                <div class="row" style="overflow-y:scroll">
                    <table class="table table-bordered">
                        <thead style="font-size:16px;align-items:center;font-weight:bold">
                            <tr>
                                <td rowspan="2">AIP Ref. Code</td>
                                <td rowspan="2">Program/Project/Activity Description</td>
                                <td rowspan="2">Implementing Agency</td>
                                <td colspan="2">Schedule of Implementation</td>
                                <td rowspan="2">Expected Output</td>
                                <td rowspan="2">Sources of Funds</td>
                                <td colspan="4">Amount (P'000)</td>
                                <td colspan="3">Governance and Organizational</td>
                                <td rowspan="2">Nutrition Typology Code</td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>Completion Date</td>
                                <td>Personal Services</td>
                                <td>MOOE</td>
                                <td>Capital Outlay</td>
                                <td>Total</td>
                                <td>Structure</td>
                                <td>Nutrition-sensitive (Indirect)</td>
                                <td>Enabling Mechanisms</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:300px!important">(1)</td>
                                <td style="width:300px!important">(2)</td>
                                <td style="width:300px!important">(3)</td>
                                <td style="width:300px!important">(4)</td>
                                <td style="width:300px!important">(5)</td>
                                <td style="width:300px!important">(6)</td>
                                <td style="width:300px!important">(7)</td>
                                <td style="width:300px!important">(8)</td>
                                <td style="width:300px!important">(9)</td>
                                <td style="width:300px!important">(10)</td>
                                <td style="width:300px!important">(11)</td>
                                <td style="width:300px!important">(12)</td>
                                <td style="width:300px!important">(13)</td>
                                <td style="width:300px!important">(14)</td>
                                <td style="width:300px!important">(15)</td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea style="width:100px!important"></textarea>
                                </td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating1a">
                                        <option>Select</option>
                                        <option value="Local">Local</option>
                                        <option value="Provincial Goverment">Provincial Goverment</option>
                                        <option value="National">National</option>
                                        <option value="External">External</option>
                                        <option value="City/Municipality">City/Municipality</option>
                                    </select>
                                </td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>

                    

                            <tr>
                                <td colspan="7"><b>TOTAL (Barangay)</b></td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL (City/Municipality)</b></td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL (Provincial Government)</b></td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL ( National)</b></td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL (External)</b></td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL SOCIAL SERVICES SECTOR</b></td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                                <td>sdsdsdsdsd</td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection