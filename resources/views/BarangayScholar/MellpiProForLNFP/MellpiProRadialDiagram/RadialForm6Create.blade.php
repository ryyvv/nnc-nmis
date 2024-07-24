<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 6 Monitoring',
'activePage' => 'mellpi_pro_form6',
'activeNav' => '',
])

@section('content')
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
                                <h5 class="title">{{__("MELLPI PRO FORM 6a: RADIAL DIEAGRAM FOR PROVINCIAL NUTRITION ACTION OFFICER MONITORING")}}</h5>
                                <label for="period">For the period: </label>
                                <select name="forTheperiod" id="forTheperiod" class="inputHeaderPeriod">
                                    <option selected>Select</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $startYear = 1900;
                                    $endYear = $currentYear;
                                    for ($year = $startYear; $year <= $endYear; $year++) {
                                        echo "<option value=\"$year\">$year</option>";
                                    }
                                    ?>
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
                                    <table id="equipInventoryTable" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td colspan="2" class="col-md-8"><b><center>NUTRITION PROGRAM MANAGEMENT FUNCTIONS</center></b></td>
                                                <td class="col-md-2"><b><center>TARGET RATING</center></b></td>
                                                <td class="col-md-2"><b><center>PERFORMANCE RATING</center></b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-2"><center>A</center></td>
                                                <td class="col-md-6"><input type="text" class="form6InputS"></td>
                                                <td class="col-md-2"><input type="text" class="form6Input"></td>
                                                <td class="col-md-2"><input type="text" class="form6Input"></td>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                console.log('Alert message found, hiding now');
                alertMessage.style.display = 'none';
            } else {
                console.log('Alert message not found');
            }
        }, 3000);
    });
</script>
<script src="{{ asset('assets/js/autoGenerateInput.js') }}"></script>
@endsection