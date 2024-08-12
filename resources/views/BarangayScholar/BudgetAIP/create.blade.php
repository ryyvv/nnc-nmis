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
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content')

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important"> 
        <h4>MELLPI PRO FORM B: BARANGAY PROFILE SHEET</h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <!-- Social -->
        <div>
            <form   method="POST">
                @csrf
 
                <br>
                <div class="row" style="overflow-y:scroll">
                    <table class="table table-bordered">
                        <thead style="font-size:16px;align-items:center;font-weight:bold">
                            <tr>
                                <td rowspan="2" class="fontA">AIP Ref. Code</td>
                                <td rowspan="2" class="fontA">Program/Project/Activity Description</td>
                                <td rowspan="2" class="fontA">Implementing Agency</td>
                                <td colspan="2" class="fontA">Schedule of Implementation</td>
                                <td rowspan="2" class="fontA">Expected Output</td>
                                <td rowspan="2" class="fontA">Sources of Funds</td>
                                <td colspan="4" class="fontA">Amount (P'000)</td>
                                <td colspan="3" class="fontA">Governance and Organizational</td>
                                <td rowspan="2" class="fontA">Nutrition Typology Code</td>
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
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
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
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                            </tr>

                    

                            <tr>
                                <td colspan="7"><b>TOTAL (Barangay)</b></td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL (City/Municipality)</b></td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL (Provincial Government)</b></td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL ( National)</b></td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>TOTAL (External)</b></td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
                                <td>sdsdadadadadasdasdasdasdasdsadasdsadasdasdasdasdasdasddsdsdsd</td>
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

        <!-- Economic -->
        <div>
            <form   method="POST">
                @csrf
 
         
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

        <!-- others -->
        <div>
            <form   method="POST">
                @csrf
 
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