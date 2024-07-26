<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 8 Action Sheet',
'activePage' => 'mellpi_pro_form8',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif

                    <div>
                        <form action="#" method="post">
                            @csrf

                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("MELLPI PRO FORM 8a: ACTION SHEET TO IMPROVE PERFORMANCE")}}</h5>
                                <label for="period">For the period: </label>
                                <select name="forTheperiod" id="forTheperiod" class="inputHeaderPeriod">
                                    <?php
                                    $currentYear = date('Y');
                                    $startYear = 1900;
                                    $endYear = $currentYear;
                                    for ($year = $startYear; $year <= $endYear; $year++) {
                                        echo "<option value=\"$year\">$year</option>";
                                    }
                                    ?>
                                    <option selected><?php echo $currentYear ?></option>
                                </select>
                            </center><br>

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO: </label>
                                        <input class="inputHeader" required type="text" name="nameOf" id="nameOf">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment: </label>
                                        <input class="inputHeader" required type="text" name="areaAssign" id="areaAssign">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Monitoring: </label>
                                        <input class="form-control" type="date" name="dateMonitor" id="dateMonitor" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <table id="lnfp_form8A" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-4"><b>
                                                        <center>Parameters</center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Recommendation for the PNAO</center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Recommendation for the Local Nutrition Committee</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Performance of Nutrition Program Management Functions</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="A. Coordination" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="B. Orientation, Promotion and Advocacy" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="C. Planning" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="D. Implementation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="E. Monitoring and Evaluation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="F. Resource Generation" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="G. Capacity Development" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputS" value="H. Documentation and record-keeping" readonly></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input"></textarea></td>
                                                <td class="col-md-4"><textarea type="text" class="form8Input" ></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <table id="lnfp_form8B" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-4"><b>
                                                        <center>Name of Team Member</center>
                                                    </b></td>
                                                <td class="col-md-4"><b>
                                                        <center>Designation and Office</center>
                                                    </b></td>
                                                <td class="col-md-4" colspan="2"><b>
                                                        <center>Signature / Date</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM1"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice1"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="sigDate1"></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM2"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice2"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="sigDate2"></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="nameTM3"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="desigOffice3"></td>
                                                <td class="col-md-4"><input type="text" class="form8InputB" name="sigDate3"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection