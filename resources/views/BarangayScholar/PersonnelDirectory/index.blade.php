<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/diether.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
.tab {
    text-align: center;
    font-size: 11px;
    border: 1px solid green;
}

.tab.active {
    border-top: 1px solid green;
}

table {
    width: 100%;
    table-layout: auto;
    /* Adjusts column width based on content */
    border-collapse: collapse;
}

tr>td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
    white-space: nowrap;
    /* Prevents text from wrapping to a new line */
}
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Personnel Dna Directory',
'activePage' => 'PersonnelDnaDirectoryIndex',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("Personnel Directory")}}</h5>
                <div>
                    <a class="btn btn-outline-primary" href="{{route('BSpersonnel.create')}}">Add Personnel
                        DNA Directory</a>
                </div>
            </div>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')
        <div class="form-row" style="border-bottom: 1px solid #ddd;">
            <div id="tabs" class="d-flex mr-3">
                <div class="tab" data-tab="tab1">NAO</div>
                <div class="tab" data-tab="tab2">NPC</div>
                <div class="tab" data-tab="tab3">BNS</div>
            </div>
        </div>
        <div class="form-row">
            <div id="tab-contents" class="col-md-12">
                <div class="tab-content" id="tab1">
                    <form action="#" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Region</label>
                                <select id="region-dropdown" class="form-control" name="inputRegion">
                                    <option value="">Select Region</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Province</label>
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
                    <div style="overflow-x: scroll;">
                        <table id="naoTable" class="table table-striped table-bordered"
                            style="width: 100%; overflow-x: scroll;">
                            <thead>
                                <tr>
                                    <td><b>Name of Gov/Mayor</b></td>
                                    <td><b>Last Name</b></td>
                                    <td><b>First Name</b></td>
                                    <td><b>Middle Name</b></td>
                                    <td><b>Suffix</b></td>
                                    <td><b>Sex</b></td>

                                    <td><b>Cellphone Number</b></td>
                                    <td><b>Telephone Number</b></td>
                                    <td><b>Email Address</b></td>
                                    <td><b>Address</b></td>

                                    <td><b>Birthdate</b></td>
                                    <td><b>Age</b></td>
                                    <td><b>Educational Background</b></td>
                                    <td><b>Degree, course or year finished</b></td>

                                    <td><b>Type of NAO</b></td>
                                    <td><b>Type of Designation</b></td>
                                    <td><b>Date of Designation</b></td>
                                    <td><b>Type of Appointment</b></td>
                                    <td><b>Office Position</b></td>
                                    <td><b>Office / Department</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($naosPersonnel as $naoPersonnel)
                                <tr>
                                    @foreach ($naoPersonnel->NaoFuction as $naoFunction)
                                    <td>{{$naoFunction->nameGovMayor}}</td>
                                    <td>{{$naoPersonnel->lastname}}</td>
                                    <td>{{$naoPersonnel->firstname}}</td>
                                    <td>{{$naoPersonnel->middlename}}</td>
                                    <td>{{$naoPersonnel->suffix}}</td>
                                    <td>{{$naoPersonnel->sex}}</td>

                                    <td>{{$naoPersonnel->cellphonenumer}}</td>
                                    <td>{{$naoPersonnel->telephonenumber}}</td>
                                    <td>{{$naoPersonnel->email}}</td>
                                    <td>{{$naoPersonnel->address}}</td>

                                    <td>{{$naoPersonnel->birthdate}}</td>
                                    <td>{{$naoPersonnel->age}}</td>
                                    <td>{{$naoPersonnel->educationalbackground}}</td>
                                    <td>{{$naoPersonnel->degreeCourse}}</td>

                                    <td>{{$naoFunction->typenao}}</td>
                                    <td>{{$naoFunction->typedesignation}}</td>
                                    <td>{{$naoFunction->datedesignation}}</td>
                                    <td>{{$naoFunction->typeappointment}}</td>
                                    <td>{{$naoFunction->position}}</td>
                                    <td>{{$naoFunction->department}}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-content" id="tab2">
                    <form action="#" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Region</label>
                                <select id="loadRegion1" class="form-control" name="inputRegion">
                                    <option selected>Region</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Province</label>
                                <select id="loadProvince1" class="form-control" name="inputProvince">
                                    <option selected>Province</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCM">City/Municipality</label>
                                <select id="loadCity1" class="form-control" name="inputCity">
                                    <option selected>City/Municipality</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div tyle="overflow-x: scroll;">
                        <table id="npcTable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td><b>Name of Gov/Mayor</b></td>
                                    <td><b>Last Name</b></td>
                                    <td><b>First Name</b></td>
                                    <td><b>Middle Name</b></td>
                                    <td><b>Suffix</b></td>
                                    <td><b>Sex</b></td>

                                    <td><b>Cellphone Number</b></td>
                                    <td><b>Telephone Number</b></td>
                                    <td><b>Email Address</b></td>
                                    <td><b>Address</b></td>

                                    <td><b>Birthdate</b></td>
                                    <td><b>Age</b></td>
                                    <td><b>Educational Background</b></td>
                                    <td><b>Degree, course or year finished</b></td>

                                    <td>Type of NPC</td>
                                    <td>Type of Designation</td>
                                    <td>Date of DEsignation</td>
                                    <td>Type of Appointment</td>
                                    <td>Office Position / Title</td>
                                    <td>Office / Department</td>
                                    <td>DCNPCAP Membership</td>
                                    <td>DCNPCAP-position (if officer)</td>
                                    <td>National or Regional (DCNPCAP officer)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-content" id="tab3">
                    <form action="#" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Region</label>
                                <select id="loadRegion1" class="form-control" name="inputRegion">
                                    <option selected>Region</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Province</label>
                                <select id="loadProvince1" class="form-control" name="inputProvince">
                                    <option selected>Province</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCM">City/Municipality</label>
                                <select id="loadCity1" class="form-control" name="inputCity">
                                    <option selected>City/Municipality</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div style="overflow-x: scroll;">
                        <table id="bnsTable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>Barangay</td>
                                    <td>ID No.</td>
                                    <td><b>Last Name</b></td>
                                    <td><b>First Name</b></td>
                                    <td><b>Middle Name</b></td>
                                    <td><b>Suffix</b></td>
                                    <td><b>Name on ID</b></td>
                                    <td><b>Sex</b></td>
                                    <td><b>Birthdate</b></td>
                                    <td><b>Age</b></td>
                                    <td><b>Civil Status</b></td>
                                    <td><b>Educational Attainment</b></td>

                                    <td><b>Status of Employment</b></td>
                                    <td><b>Beneficiary Name</b></td>
                                    <td><b>Relationship</b></td>
                                    <td><b>Period of action service from</b></td>
                                    <td><b>Period of action service to</b></td>
                                    <td><b>Last Update</b></td>
                                    <td><b>BNS Status</b></td>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection