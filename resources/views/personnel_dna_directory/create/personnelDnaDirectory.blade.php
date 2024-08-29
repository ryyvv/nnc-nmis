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
            </div>
        </div>
        <hr>
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
                    <form action="{{ route('CMSpersonnelDnaDirectory.storeNAO') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">PSGC</label>
                                <input type="text" class="form-control" name="inputPSGC" id="inputPSGC"
                                    placeholder="PSGC" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Region</label>
                                <!-- <select id="loadRegion1" class="form-control" name="inputRegionNAO">
                                    <option selected>Region</option>
                                </select> -->
                                <input type="number" id="loadRegion1" class="form-control" name="inputRegionNAO">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Province</label>
                                <!-- <select id="loadProvince1" class="form-control" name="inputProvinceNAO">
                                    <option selected>Province</option>
                                </select> -->
                                <input type="number" id="loadProvince1" class="form-control" name="inputProvinceNAO">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCM">City/Municipality</label>
                                <!-- <select id="loadCity1" class="form-control" name="inputCityNAO">
                                    <option selected>City/Municipality</option>
                                </select> -->
                                <input type="number" id="loadCity1" class="form-control" name="inputCityNAO">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-3" id="totalBarangay"
                            style="display:flex; border-right:1px solid;">
                            <div class="form-group col-md-12">
                                <label for="inputGovMayor">Name of Governor/Mayor</label>
                                <input type="text" class="form-control" name="inputGovMayor"
                                    id="inputGovMayor" placeholder="Name of Governor/Mayor">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo"><b>Basic Info</b></label>
                        </div>
                        <hr>
                        <div class="form-row" id="formBasicInfo">
                            <div class="form-group col-md-3">
                                <label for="inputLN">Last Name</label>
                                <input type="text" class="form-control" name="inputLN" id="inputLN"
                                    placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputFN">First Name</label>
                                <input type="text" class="form-control" name="inputFN" id="inputFN"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputMN">Middle Name</label>
                                <input type="text" class="form-control" name="inputMN" id="inputMN"
                                    placeholder="Middle Name">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputSuffix">Suffix</label>
                                <select id="inputSuffix" class="form-control" name="inputSuffix">
                                    <option value=" " selected>Choose...</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSex">Sex</label>
                                <select id="inputSex" class="form-control" name="inputSex">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCPNum">Cellphone Number</label>
                                <input type="tel" class="form-control" name="inputCPNum" id="inputCPNum" maxlength="11">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTPNum">Telephone Number</label>
                                <input type="tel" class="form-control" name="inputTPNum" id="inputTPNum">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNaoEmail">Email Adress</label>
                                <input type="email" class="form-control" name="inputNaoEmail" id="inputNaoEmail"
                                    placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNaoAddress">Address</label>
                                <input type="text" class="form-control" name="inputNaoAddress" id="inputNaoAddress"
                                    placeholder="Complete Address">
                            </div>
                        </div>
                        <div class="form-row" id="formBasicInfo">
                            <div class="form-group col-md-2">
                                <label for="inputBdate">Birthdate</label>
                                <input type="date" class="form-control" name="inputBdate" id="inputBdate">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputage">age</label>
                                <input type="number" class="form-control" name="inputage" id="inputage" placeholder="0"
                                    readonly>
                                <input type="hidden" class="form-control" name="inputCivilStatus" id="inputCivilStatus" value="N/A">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEB">Educational Background</label>
                                <select id="inputEB" class="form-control" name="inputEB">
                                    <option selected>Choose...</option>
                                    <option value="elem-undergrad">Elem-undergrad</option>
                                    <option value="elem-gard">Elem-gard</option>
                                    <option value="hs-undergrad">HS-undergrad</option>
                                    <option value="hs-grad">HS-grad</option>
                                    <option value="college-undergrad">college-undergrad</option>
                                    <option value="college-grad">College-grad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputDegree">Degree</label>
                                <input type="text" class="form-control" name="inputDegree" id="inputDegree"
                                    placeholder="Degree, course or years finished">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo"><b>NAO</b></label>
                        </div>
                        <hr>
                        <div style="display:flex;">
                            <div class="form-group col-md-6" id="formWS" style="display:flex; border-right:1px solid;">
                                <div class="form-group col-md-6">
                                    <label for="inputNoaType">Type of NAO</label>
                                    <select id="inputNoaType" class="form-control" name="inputNoaType">
                                        <option selected>Choose...</option>
                                        <option value="Provincial Nutrition Action Officer">Provincial Nutrition Action Officer</option>
                                        <option value="City Nutrition Action Officer">City Nutrition Action Officer</option>
                                        <option value="Municipal Nutrition Action Officer">Municipal Nutrition Action Officer</option>
                                    </select>
                                    <label for="inputNoaDesignationType">Type of Designation</label>
                                    <select id="inputNoaDesignationType" class="form-control"
                                        name="inputNoaDesignationType">
                                        <option selected>Choose...</option>
                                        <option value="Full time">Full time</option>
                                        <option value="Full time designate">Full time designate</option>
                                        <option value="Part time designate">Part time designate</option>
                                    </select>
                                    <label for="inputNoaDateDesignation">Date of Designation</label>
                                    <input type="date" class="form-control" name="inputNoaDateDesignation"
                                        id="inputNoaDateDesignation" placeholder="Office Position/Title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNoaAppointment">Type of Appointment</label>
                                    <select id="inputNoaAppointment" class="form-control" name="inputNoaAppointment">
                                        <option selected>Choose...</option>
                                        <option value="Plantilla">Plantilla</option>
                                        <option value="COS">COS</option>
                                        <option value="Job order">Job order</option>
                                    </select>
                                    <label for="inputNaoPosition">Office Position/Title</label>
                                    <select id="inputNaoPosition" class="form-control" name="inputNaoPosition">
                                        <option selected>Choose...</option>
                                    </select>
                                    <label for="inputNaoDepartment">Office/Department</label>
                                    <select id="inputNaoDepartment" class="form-control" name="inputNaoDepartment">
                                        <option selected>Choose...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="display:flex;">
                            <button type="submit" name="addPersonnelNao" class="btn btn-outline-primary">Add NAO</button>
                        </div>
                    </form>
                </div>
                <div class="tab-content" id="tab2">
                    <form action="{{ route('CMSpersonnelDnaDirectory.storeNPC') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">PSGC</label>
                                <input type="text" class="form-control" name="inputPSGC" id="inputPSGC"
                                    placeholder="PSGC" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Region</label>
                                <select id="loadRegion2" class="form-control" name="inputRegionNPC">
                                    <option selected>Region</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Province</label>
                                <select id="loadProvince2" class="form-control" name="inputProvinceNPC">
                                    <option selected>Province</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCM">City/Municipality</label>
                                <select id="loadCity2" class="form-control" name="inputCityNPC">
                                    <option selected>City/Municipality</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-3" id="totalBarangay"
                            style="display:flex; border-right:1px solid;">
                            <div class="form-group col-md-12">
                                <label for="inputGovMayor">Name of Governor/Mayor</label>
                                <input type="text" class="form-control" name="inputGovMayor"
                                    id="inputGovMayor" placeholder="Name of Governor/Mayor">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo"><b>Basic Info</b></label>
                        </div>
                        <hr>
                        <div class="form-row" id="formBasicInfo">
                            <div class="form-group col-md-3">
                                <label for="inputLN">Last Name</label>
                                <input type="text" class="form-control" name="inputLN" id="inputLN"
                                    placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputFN">First Name</label>
                                <input type="text" class="form-control" name="inputFN" id="inputFN"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputMN">Middle Name</label>
                                <input type="text" class="form-control" name="inputMN" id="inputMN"
                                    placeholder="Middle Name">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputSuffix">Suffix</label>
                                <select id="inputSuffix" class="form-control" name="inputSuffix">
                                    <option value=" " selected>Choose...</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSex">Sex</label>
                                <select id="inputSex" class="form-control" name="inputSex">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCPNum">Cellphone Number</label>
                                <input type="tel" class="form-control" name="inputCPNum" id="inputCPNum" maxlength="11">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTPNum">Telephone Number</label>
                                <input type="tel" class="form-control" name="inputTPNum" id="inputTPNum">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNaoEmail">Email Adress</label>
                                <input type="email" class="form-control" name="inputNaoEmail" id="inputNaoEmail"
                                    placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNaoAddress">Address</label>
                                <input type="text" class="form-control" name="inputNaoAddress" id="inputNaoAddress"
                                    placeholder="Complete Address">
                            </div>
                        </div>
                        <div class="form-row" id="formBasicInfo">
                            <div class="form-group col-md-2">
                                <label for="inputNpcBdate">Birthdate</label>
                                <input type="date" class="form-control" name="inputNpcBdate" id="inputNpcBdate"
                                    placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputNpcAge">age</label>
                                <input type="number" class="form-control" name="inputNpcAge" id="inputNpcAge" placeholder="0"
                                    readonly>
                                <input type="hidden" class="form-control" name="inputCivilStatus" id="inputCivilStatus" value="N/A">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEB">Educational Background</label>
                                <select id="inputEB" class="form-control" name="inputEB">
                                    <option selected>Choose...</option>
                                    <option value="elem-undergrad">Elem-undergrad</option>
                                    <option value="elem-gard">Elem-gard</option>
                                    <option value="hs-undergrad">HS-undergrad</option>
                                    <option value="hs-grad">HS-grad</option>
                                    <option value="college-undergrad">college-undergrad</option>
                                    <option value="college-grad">College-grad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputDegree">Degree</label>
                                <input type="text" class="form-control" name="inputDegree" id="inputProvince"
                                    placeholder="Degree, course or years finished">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo"><b>NPC</b></label>
                        </div>
                        <hr>
                        <div style="display:flex;">
                            <div class="form-group col-md-9" id="formWS" style="display:flex; border-right:1px solid;">
                                <div class="form-group col-md-4">
                                    <label for="inputNpcType">Type of NPC</label>
                                    <select id="inputNpcType" class="form-control" name="inputNpcType">
                                        <option selected>Choose...</option>
                                        <option value="Provincial Nutrition Action Officer">District Nutrition Program Coordinator</option>
                                        <option value="City Nutrition Action Officer">City Nutrition Program Coordinator</option>
                                        <option value="Municipal Nutrition Action Officer">Municipal Nutrition Program Coordinator</option>
                                    </select>
                                    <label for="inputNpcDesignationType">Type of Designation</label>
                                    <select id="inputNpcDesignationType" class="form-control"
                                        name="inputNpcDesignationType">
                                        <option selected>Choose...</option>
                                        <option value="Full time">Full time</option>
                                        <option value="Full time designate">Full time designate</option>
                                        <option value="Part time designate">Part time designate</option>
                                    </select>
                                    <label for="inputNpcDateDesignation">Date of Designation</label>
                                    <input type="date" class="form-control" name="inputNpcDateDesignation"
                                        id="inputNpcDateDesignation" placeholder="Office Position/Title">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputNpcAppointment">Type of Appointment</label>
                                    <select id="inputNpcAppointment" class="form-control" name="inputNpcAppointment">
                                        <option selected>Choose...</option>
                                        <option value="Plantilla">Plantilla</option>
                                        <option value="COS">COS</option>
                                        <option value="Job order">Job order</option>
                                    </select>
                                    <label for="inputNpcPosition">Office Position/Title</label>
                                    <select id="inputNpcPosition" class="form-control" name="inputNpcPosition">
                                        <option selected>Choose...</option>
                                    </select>
                                    <label for="inputNpcDepartment">Office/Department</label>
                                    <select id="inputNpcDepartment" class="form-control" name="inputNpcDepartment">
                                        <option selected>Choose...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputNpcDCNPCAPMembership">DCNPCAP Membership</label>
                                    <select id="inputNpcDCNPCAPMembership" class="form-control" name="inputNpcDCNPCAPMembership">
                                        <option selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <label for="inputNpcDCNPCAPPosition">DCNPCAP Position (if officer)</label>
                                    <select id="inputNpcDCNPCAPPosition" class="form-control" name="inputNpcDCNPCAPPosition">
                                        <option selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <label for="inputNpcDCNPCAPOfficer">National or Regional (DCNPCAP Officer)</label>
                                    <select id="inputNpcDCNPCAPOfficer" class="form-control" name="inputNpcDCNPCAPOfficer">
                                        <option selected>Choose...</option>
                                        <option value="National">National</option>
                                        <option value="Regional">Regional</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="display:flex;">
                            <button type="submit" name="addPersonnelPNC" class="btn btn-outline-primary">Add NPC</button>
                        </div>
                    </form>
                </div>
                <div class="tab-content" id="tab3">
                <form action="{{ route('CMSpersonnelDnaDirectory.storeBNS') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">PSGC</label>
                                <input type="text" class="form-control" name="inputPSGC" id="inputPSGC"
                                    placeholder="PSGC" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Region</label>
                                <select id="loadRegion3" class="form-control" name="inputRegionBNS">
                                    <option selected>Region</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPSGC">Province</label>
                                <select id="loadProvince3" class="form-control" name="inputProvinceBNS">
                                    <option selected>Province</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCM">City/Municipality</label>
                                <select id="loadCity3" class="form-control" name="inputCityBNS">
                                    <option selected>City/Municipality</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-3" id="totalBarangay"
                            style="display:flex; border-right:1px solid;">
                            <div class="form-group col-md-12">
                                <label for="inputBarangay">Barangay</label>
                                <input type="text" class="form-control" name="inputBarangay"
                                    id="inputBarangay" placeholder="Barangay">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo"><b>Basic Info</b></label>
                        </div>
                        <hr>
                        <div class="form-row" id="formBasicInfo">
                            <div class="form-group col-md-3">
                                <label for="inputIdNum">ID Number</label>
                                <input type="number" class="form-control" name="inputIdNum" id="inputIdNum"
                                    placeholder="ID Number" maxlength="10">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputLN">Last Name</label>
                                <input type="text" class="form-control" name="inputLN" id="inputLN"
                                    placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputFN">First Name</label>
                                <input type="text" class="form-control" name="inputFN" id="inputFN"
                                    placeholder="First Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputMN">Middle Name</label>
                                <input type="text" class="form-control" name="inputMN" id="inputMN"
                                    placeholder="Middle Name">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputSuffix">Suffix</label>
                                <select id="inputSuffix" class="form-control" name="inputSuffix">
                                    <option value=" " selected>Choose...</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSex">Sex</label>
                                <select id="inputSex" class="form-control" name="inputSex">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCPNum">Cellphone Number</label>
                                <input type="tel" class="form-control" name="inputCPNum" id="inputCPNum" maxlength="11">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTPNum">Telephone Number</label>
                                <input type="tel" class="form-control" name="inputTPNum" id="inputTPNum">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputBnsEmail">Email Adress</label>
                                <input type="email" class="form-control" name="inputBnsEmail" id="inputBnsEmail"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row" id="formBasicInfo">
                            <div class="form-group col-md-3">
                                <label for="inputBnsAddress">Address</label>
                                <input type="text" class="form-control" name="inputBnsAddress" id="inputBnsAddress"
                                    placeholder="Complete Address">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputBnsBdate">Birthdate</label>
                                <input type="date" class="form-control" name="inputBnsBdate" id="inputBnsBdate"
                                    placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputBnsAge">age</label>
                                <input type="number" class="form-control" name="inputBnsAge" id="inputBnsAge" placeholder="0"
                                    readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEB">Educational Background</label>
                                <select id="inputEB" class="form-control" name="inputEB">
                                    <option selected>Choose...</option>
                                    <option value="elem-undergrad">Elem-undergrad</option>
                                    <option value="elem-gard">Elem-gard</option>
                                    <option value="hs-undergrad">HS-undergrad</option>
                                    <option value="hs-grad">HS-grad</option>
                                    <option value="college-undergrad">college-undergrad</option>
                                    <option value="college-grad">College-grad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputDegree">Degree</label>
                                <input type="text" class="form-control" name="inputDegree" id="inputDegree"
                                    placeholder="Degree, course or years finished">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCivilStat">Civil status</label>
                                <select id="inputCivilStat" class="form-control" name="inputCivilStat">
                                    <option selected>Choose...</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo"><b>BNS</b></label>
                        </div>
                        <hr>
                        <div style="display:flex;">
                            <div class="form-group col-md-6" id="formWS" style="display:flex; border-right:1px solid;">
                                <div class="form-group col-md-6">
                                    <label for="inputBnsEmploymentStat">Status of Employment</label>
                                    <select id="inputBnsEmploymentStat" class="form-control" name="inputBnsEmploymentStat">
                                        <option selected>Choose...</option>
                                    </select>
                                    <label for="inputBnsBeneficiary">Beneficiary Name</label>
                                    <input type="text" class="form-control" name="inputBnsBeneficiary" id="inputBnsBeneficiary" placeholder="Beneficiary Name">
                                    <label for="inputBnsRelationship">Relationship</label>
                                    <select id="inputBnsRelationship" class="form-control" name="inputBnsRelationship">
                                        <option selected>Choose...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsActiveFrom">Period of active from</label>
                                    <input type="date" class="form-control" name="inputBnsActiveFrom" id="inputBnsActiveFrom">
                                    <label for="inputBnsActiveTo">Period of active to</label>
                                    <input type="date" class="form-control" name="inputBnsActiveTo" id="inputBnsActiveTo">
                                    <label for="inputBnsLastUpdate">Last update</label>
                                    <input type="date" class="form-control" name="inputBnsLastUpdate" id="inputBnsLastUpdate">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsStatus">BNS Status</label>
                                    <select id="inputBnsStatus" class="form-control" name="inputBnsStatus">
                                        <option selected>Choose...</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="display:flex;">
                            <button type="submit" name="addPersonnelPNC" class="btn btn-outline-primary">Add BNS</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script>
    $(document).ready(function() {
        function loadRegions() {
            $.ajax({
                url: '{{ route("regions.get") }}',
                method: 'GET',
                success: function(response) {
                    let regionSelect = $('#loadRegion');
                    regionSelect.find('option:not(:first)').remove();
                    response.forEach(function(region) {
                        regionSelect.append(new Option(region.region, region.id));
                    });
                },
                error: function(xhr, status, error) {
                    alert('Error loading regions');
                }
            });
        }
        function loadProvincesByRegion(regionId) {
            $.ajax({
                url: '{{ url("provinces") }}/' + regionId,
                method: 'GET',
                success: function(response) {
                    let provinceSelect = $('#loadProvince');
                    provinceSelect.find('option:not(:first)').remove();
                    response.forEach(function(province) {
                        provinceSelect.append(new Option(province.province, province.provcode));
                    });
                },
                error: function(xhr, status, error) {
                    alert('Error loading provinces');
                }
            });
        }
        function loadCitiesByProvince(provcode) {
            $.ajax({
                url: '{{ url("cities") }}/' + provcode,
                method: 'GET',
                success: function(response) {
                    let citySelect = $('#loadCity');
                    citySelect.find('option:not(:first)').remove();
                    response.forEach(function(city) {
                        citySelect.append(new Option(city.cityname, city.id));
                    });
                },
                error: function(xhr, status, error) {
                    alert('Error loading cities');
                }
            });
        }
        loadRegions();
        $('#loadRegion').change(function() {
            let selectedRegionId = $(this).val();
            if (selectedRegionId) {
                loadProvincesByRegion(selectedRegionId);
                $('#loadCity').find('option:not(:first)').remove();
            } else {
                $('#loadProvince').find('option:not(:first)').remove();
                $('#loadCity').find('option:not(:first)').remove();
            }
        });
        $('#loadProvince').change(function() {
            let selectedProvcode = $(this).val();
            if (selectedProvcode) {
                loadCitiesByProvince(selectedProvcode);
            } else {
                $('#loadCity').find('option:not(:first)').remove();
            }
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
    function loadRegions(regionSelectId) {
        $.ajax({
            url: '{{ route("personneldnadirectory.regions.get") }}',
            method: 'GET',
            success: function(response) {
                console.log('Regions:', response);
                let regionSelect = $(regionSelectId);
                regionSelect.find('option:not(:first)').remove();
                response.forEach(function(region) {
                    regionSelect.append(new Option(region.region, region.id));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error loading regions:', xhr.responseText);
                alert('Error loading regions');
            }
        });
    }

    function loadProvincesByRegion(regionId, provinceSelectId) {
        console.log('Loading provinces for region:', regionId);
        $.ajax({
            url: '{{ url("personneldnadirectory/provinces") }}/' + regionId,
            method: 'GET',
            success: function(response) {
                console.log('Provinces:', response);
                let provinceSelect = $(provinceSelectId);
                provinceSelect.find('option:not(:first)').remove();
                response.forEach(function(province) {
                    provinceSelect.append(new Option(province.province, province.provcode));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error loading provinces:', xhr.responseText);
                alert('Error loading provinces');
            }
        });
    }

    function loadCitiesByProvince(provcode, citySelectId) {
        console.log('Loading cities for province code:', provcode);
        $.ajax({
            url: '{{ url("personneldnadirectory/cities") }}/' + provcode,
            method: 'GET',
            success: function(response) {
                console.log('Cities:', response);
                let citySelect = $(citySelectId);
                citySelect.find('option:not(:first)').remove();
                response.forEach(function(city) {
                    citySelect.append(new Option(city.cityname, city.id));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error loading cities:', xhr.responseText);
                alert('Error loading cities');
            }
        });
    }

    function setupDropdowns(regionSelectId, provinceSelectId, citySelectId) {
        loadRegions(regionSelectId);

        $(regionSelectId).change(function() {
            let selectedRegionId = $(this).val();
            console.log('Region changed to:', selectedRegionId);
            if (selectedRegionId) {
                loadProvincesByRegion(selectedRegionId, provinceSelectId);
                $(citySelectId).find('option:not(:first)').remove();
            } else {
                $(provinceSelectId).find('option:not(:first)').remove();
                $(citySelectId).find('option:not(:first)').remove();
            }
        });

        $(provinceSelectId).change(function() {
            let selectedProvcode = $(this).val();
            console.log('Province changed to:', selectedProvcode);
            if (selectedProvcode) {
                loadCitiesByProvince(selectedProvcode, citySelectId);
            } else {
                $(citySelectId).find('option:not(:first)').remove();
            }
        });
    }

    // Setup for each set of dropdowns
    setupDropdowns('#loadRegion1', '#loadProvince1', '#loadCity1');
    setupDropdowns('#loadRegion2', '#loadProvince2', '#loadCity2');
    setupDropdowns('#loadRegion3', '#loadProvince3', '#loadCity3');
});
        
</script>