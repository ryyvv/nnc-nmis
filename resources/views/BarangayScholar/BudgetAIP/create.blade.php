<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script>

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

    .tablep tbody td {
        width: 1000px;
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


        <div>
            <form method="POST">
                @csrf

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">

                <br>
                <div class="row" style="padding-left:50px;padding-right:30px;overflow-y:scroll">
                    <table id="dataTable" class="tablep table table-bordered">
                        <thead style="font-size:16px;align-items:center;font-weight:bold">
                            <tr style="text-align:center;text-align:center">

                                <td rowspan="2" class="nowrap ">&nbsp;</td>
                                <td rowspan="2" class="nowrap ">AIP Ref. Code</td>
                                <td rowspan="2" class="nowrap">Program/Project/Activity Description</td>
                                <td rowspan="2" class="nowrap">Implementing Agency</td>
                                <td colspan="2" class="nowrap">Schedule of Implementation</td>
                                <td rowspan="2" class="nowrap">Expected Output</td>
                                <td rowspan="2" class="nowrap">Sources of Funds</td>
                                <td colspan="4" class="nowrap">Amount (P'000)</td>
                                <td colspan="3" class="nowrap">Governance and Organizational</td>
                                <td rowspan="2" class="nowrap">Nutrition Typology Code</td>
                            </tr>
                            <tr style="text-align:center">
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
                            <tr style="text-align:center">
                                <td> <lord-icon
                                        type="button" data-toggle="modal" data-target="#exampleModal"
                                        src="https://cdn.lordicon.com/ftndcppj.json"
                                        trigger="in"
                                        colors="primary:#ffffff,secondary:#109121"
                                        style="width:40px;height:40px">
                                    </lord-icon>
                                </td>
                                <td>(1)</td>
                                <td>(2)</td>
                                <td>(3)</td>
                                <td>(4)</td>
                                <td>(5)</td>
                                <td>(6)</td>
                                <td>(7)</td>
                                <td>(8)</td>
                                <td>(9)</td>
                                <td>(10)</td>
                                <td>(11)</td>
                                <td>(12)</td>
                                <td>(13)</td>
                                <td>(14)</td>
                                <td>(15)</td>
                            </tr>
                        </thead>


                        <tbody>


                            <tr id="spacing">
                                <td colspan="8">
                                    <b>TOTAL (Barangay)</b>
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
                                <td colspan="8"><b>TOTAL (City/Municipality)</b></td>
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
                                <td colspan="8"><b>TOTAL (Provincial Government)</b></td>
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
                                <td colspan="8"><b>TOTAL ( National)</b></td>
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
                                <td colspan="8"><b>TOTAL (External)</b></td>
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
                                <td colspan="8"><b>TOTAL SOCIAL SERVICES SECTOR</b></td>
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

<!-- Modal HTML -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bold" style="color:#508D4E" id="exampleModalLabel">Add Record for Social Services</h5>
                <div style="margin-left:280px;text-align:center">
                    <label id="pageIndicator" class="bold text-center" style="border-radius:5px;background-color:#d1f3fa;color:#16a9c7;padding:10px;margin:0px;text-align:center"></label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:350px">
                <div id="modalContent">
                </div>
            </div>

            <div class="d-flex bd-highlight mb-3" style="margin-right:20px;margin-left:20px;">
                <button class="bold btn btn-primary" id="prevPage">Previous</button>
                <button class="bold  btn btn-primary" id="nextPage">Next</button>
                <button id="addToTable" class="bold btn btn-primary ml-auto p-2 bd-highlight">Add to table</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bold" style="color:#508D4E" id="exampleModalLabel">Edit Record for Social Services</h5>
                <div style="margin-left:280px;text-align:center">
                    <label id="pageIndicator" class="bold text-center" style="border-radius:5px;background-color:#d1f3fa;color:#16a9c7;padding:10px;margin:0px;text-align:center"></label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:350px">
                <div id="editModalContent"></div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
            <div class="modal-footer">
                <button class="bold btn btn-primary" id="prevPageEdit">Previous</button>
                <button class="bold  btn btn-primary" id="nextPageEdit">Next</button>
                <button id="addToTable" class="bold btn btn-primary ml-auto p-2 bd-highlight">Add to table</button>
            </div>

        </div>
    </div>
</div>

</div>

@endsection