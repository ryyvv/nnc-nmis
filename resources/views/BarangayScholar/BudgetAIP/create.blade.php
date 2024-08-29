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
                <div class="row" style="padding-left:20px;padding-right:20px;overflow-y:scroll">
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
                                <td>
                                    <input readonly class="inputstyleNone" type="text" name="SSPSbarangay" id="SSPSbarangay"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSMObarangay" id="SSMObarangay"  value="SSMObarangay"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSCPbarangay" id="SSCPbarangay"  value="SSCPbarangayValue2"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSTLbarangay" id="SSTLbarangay"  value="SSTLbarangay"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSSbarangay" id="SSSbarangay"  value="SSSbarangay"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNbarangay" id="SSNbarangay"  value="SSNbarangay"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSEMbarangay" id="SSEMbarangay"  value="SSEMbarangay"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTCbarangay" id="SSNTCbarangay"  value="SSNTCbarangay"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"><b>TOTAL (City/Municipality)</b></td>
                                <td>
                                    <input readonly class="inputstyleNone" type="text" name="SSPSmunicipal" id="SSPSmunicipal"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSMOmunicipal" id="SSMOmunicipal"  value="SSMOmunicipal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSCPmunicipal" id="SSCPmunicipal"  value="SSCPmunicipalValue2"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSTLmunicipal" id="SSTLmunicipal"  value="SSTLmunicipal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSSmunicipal" id="SSSmunicipal"  value="SSSmunicipal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNmunicipal" id="SSNmunicipal"  value="SSNmunicipal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSEMmunicipal" id="SSEMmunicipal"  value="SSEMmunicipal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTCmunicipal" id="SSNTCmunicipal"  value="SSNTCmunicipal"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"><b>TOTAL (Provincial Government)</b></td>
                                <td>
                                    <input readonly class="inputstyleNone" type="text" name="SSPSprovincial" id="SSPSprovincial"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSMOprovincial" id="SSMOprovincial"  value="SSMOprovincial"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSCPprovincial" id="SSCPprovincial"  value="SSCPprovincialValue2"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSTLprovincial" id="SSTLprovincial"  value="SSTLprovincial"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSSprovincial" id="SSSprovincial"  value="SSSprovincial"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNprovincial" id="SSNprovincial"  value="SSNprovincial"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSEMprovincial" id="SSEMprovincial"  value="SSEMprovincial"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTCprovincial" id="SSNTCprovincial"  value="SSNTCprovincial"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"><b>TOTAL ( National)</b></td>
                                <td>
                                    <input readonly class="inputstyleNone" type="text" name="SSPSnational" id="SSPSnational"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSMOnational" id="SSMOnational"  value="SSMOnational"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSCPnational" id="SSCPnational"  value="SSCPnationalValue2"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSTLnational" id="SSTLnational"  value="SSTLnational"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSSnational" id="SSSnational"  value="SSSnational"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNnational" id="SSNnational"  value="SSNnational"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSEMnational" id="SSEMnational"  value="SSEMnational"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTCnational" id="SSNTCnational"  value="SSNTCnational"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"><b>TOTAL (External)</b></td>
                                <td>
                                    <input readonly class="inputstyleNone" type="text" name="SSPSexternal" id="SSPSexternal"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSMOexternal" id="SSMOexternal"  value="SSMOexternal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSCPexternal" id="SSCPexternal"  value="SSCPexternalValue2"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSTLexternal" id="SSTLexternal"  value="SSTLexternal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSSexternal" id="SSSexternal"  value="SSSexternal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNexternal" id="SSNexternal"  value="SSNexternal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSEMexternal" id="SSEMexternal"  value="SSEMexternal"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTCexternal" id="SSNTCexternal"  value="SSNTCexternal"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"><b>TOTAL SOCIAL SERVICES SECTOR</b></td>
                                <td>
                                    <input readonly class="inputstyleNone" type="text" name="SSPSTSSS" id="SSPSTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSMOTSSS" id="SSMOTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSCPTSSS" id="SSCPTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSTLTSSS" id="SSTLTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSSTSSS" id="SSSTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTSSS" id="SSNTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSEMTSSS" id="SSEMTSSS"  value="0"/>
                                </td>
                                <td>
                                <input readonly class="inputstyleNone" type="text" name="SSNTCTSSS" id="SSNTCTSSS"  value="0"/>
                                </td>
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
                        <h5 class="modal-title bold" style="color:#508D4E" id="exampleModalLabel">Add Record to Social Services</h5>
                        <div style="margin-left:280px;text-align:center">
                            <label  id="pageIndicator" class="bold text-center" style="border-radius:5px;background-color:#d1f3fa;color:#16a9c7;padding:10px;margin:0px;text-align:center"></label>
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
                        <button  id="addToTable" class="bold btn btn-primary ml-auto p-2 bd-highlight">Add to table</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title bold" style="color:#508D4E" id="exampleModalLabel">Edit Row Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:350px">
                <div id="editModalContent"></div>
            </div>
            <div class="d-flex bd-highlight mb-3" style="margin-right:20px;margin-left:20px;">
                <button class="bold btn btn-primary" id="prevPageEdit">Previous</button>
                <button class="bold  btn btn-primary" id="nextPageEdit">Next</button>
                <button type="button" id="saveChanges" class="btn btn-primary bold  ml-auto p-2 bd-highlight">Save changes</button>
            </div>
        </div>
    </div>
</div>
        
 
@endsection