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
                <div style="display: flex; align-items: baseline; margin-bottom:15px;">
                    <a href="{{ route('BSpersonnel.index') }}" style="margin-right: 15px;">
                        <i class="now-ui-icons arrows-1_minimal-left" style="font-size: 18px; font-weight: bold;"></i>
                    </a>
                    <h5 class="title" style="margin: 0; line-height: 1;">{{ __("Create Personnel DNA Directory") }}</h5>
                </div>
            </div>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')
        <div style="padding:0px 15px 15px 15px;">
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
                        <form action="{{ route('BSpersonnel.storeNAO') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputNaoPSGC">PSGC</label>
                                    <input type="text" class="form-control" name="inputNaoPSGC" id="inputNaoPSGC"
                                        placeholder="PSGC" readonly>
                                    @error('inputNaoPSGC')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoRegion">Region</label>
                                    <select id="region-dropdown-Nao" class="form-control" name="inputNaoRegion">
                                        <option value="">Select Region</option>
                                    </select>
                                    @error('inputNaoRegion')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoProvince">Province</label>
                                    <select id="province-dropdown-Nao" disabled class="form-control"
                                        name="inputNaoProvince">
                                        <option selected>Select Province</option>
                                    </select>
                                    @error('inputNaoProvince')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoCM">City/Municipality</label>
                                    <select id="city-dropdown-Nao" disabled class="form-control" name="inputNaoCM">
                                        <option selected>Select City/Municipality</option>
                                    </select>
                                    @error('inputNaoCM')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div>
                                <label for="formBasicInfo"><b>Basic Info</b></label>
                            </div>
                            <hr>
                            <div class="form-row" id="formBasicInfo">
                                <div class="form-group col-md-3">
                                    <label for="inputNaoLN">Last Name</label>
                                    <input type="text" class="form-control" name="inputNaoLN" id="inputNaoLN"
                                        value="{{ old('inputNaoLN') }}" placeholder="Last Name">
                                    @error('inputNaoLN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoFN">First Name</label>
                                    <input type="text" class="form-control" name="inputNaoFN" id="inputNaoFN"
                                        value="{{ old('inputNaoFN') }}" placeholder="First Name">
                                    @error('inputNaoFN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoMN">Middle Name</label>
                                    <input type="text" class="form-control" name="inputNaoMN" id="inputNaoMN"
                                        value="{{ old('inputNaoMN') }}" placeholder="Middle Name">
                                    @error('inputNaoMN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputNaoSuffix">Suffix</label>
                                    <select id="inputNaoSuffix" class="form-control" name="inputNaoSuffix">
                                        <option value="" {{ old('inputNaoSuffix') == '' ? 'selected' : '' }}>Choose...
                                        </option>
                                        <option value="Jr" {{ old('inputNaoSuffix') == 'Jr' ? 'selected' : '' }}>Jr
                                        </option>
                                        <option value="Sr" {{ old('inputNaoSuffix') == 'Sr' ? 'selected' : '' }}>Sr
                                        </option>
                                        <option value="I" {{ old('inputNaoSuffix') == 'I' ? 'selected' : '' }}>I
                                        </option>
                                        <option value="II" {{ old('inputNaoSuffix') == 'II' ? 'selected' : '' }}>II
                                        </option>
                                        <option value="III" {{ old('inputNaoSuffix') == 'III' ? 'selected' : '' }}>III
                                        </option>
                                    </select>
                                    @error('inputNaoSuffix')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputNaoSex">Sex</label>
                                    <select id="inputNaoSex" class="form-control" name="inputNaoSex">
                                        <option value="" {{ old('inputNaoSex') == '' ? 'selected' : '' }}>Choose...
                                        </option>
                                        <option value="Male" {{ old('inputNaoSex') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('inputNaoSex') == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                    @error('inputNaoSex')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoCPNum">Cellphone Number</label>
                                    <input type="tel" class="form-control" name="inputNaoCPNum" id="inputNaoCPNum"
                                        maxlength="11" value="{{ old('inputNaoCPNum') }}">
                                    @error('inputNaoCPNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoTPNum">Telephone Number</label>
                                    <input type="tel" class="form-control" name="inputNaoTPNum" id="inputNaoTPNum"
                                        value="{{ old('inputNaoTPNum') }}">
                                    @error('inputNaoTPNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoEmail">Email Address</label>
                                    <input type="email" class="form-control" name="inputNaoEmail" id="inputNaoEmail"
                                        placeholder="Email" value="{{ old('inputNaoEmail') }}">
                                    @error('inputNaoEmail')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoAddress">Address</label>
                                    <input type="text" class="form-control" name="inputNaoAddress" id="inputNaoAddress"
                                        placeholder="Complete Address" value="{{ old('inputNaoAddress') }}">
                                    @error('inputNaoAddress')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row" id="formBasicInfo">
                                <div class="form-group col-md-2">
                                    <label for="inputNaoBdate">Birthdate</label>
                                    <input type="date" class="form-control" name="inputNaoBdate" id="inputNaoBdate"
                                        value="{{ old('inputNaoBdate') }}">
                                    @error('inputNaoBdate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputNaoAge">Age</label>
                                    <input type="number" class="form-control" name="inputNaoAge" id="inputNaoAge"
                                        placeholder="0" readonly value="{{ old('inputNaoAge') }}">
                                    @error('inputNaoAge')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" class="form-control" name="inputNaoCivilStatus"
                                        id="inputNaoCivilStatus" value="{{ old('inputNaoCivilStatus', 'N/A') }}">
                                    @error('inputNaoCivilStatus')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoEB">Educational Background</label>
                                    <select id="inputNaoEB" class="form-control" name="inputNaoEB">
                                        <option value="" {{ old('inputNaoEB') == '' ? 'selected' : '' }}>Choose...
                                        </option>
                                        <option value="elem-undergrad"
                                            {{ old('inputNaoEB') == 'elem-undergrad' ? 'selected' : '' }}>Elem-undergrad
                                        </option>
                                        <option value="elem-gard"
                                            {{ old('inputNaoEB') == 'elem-gard' ? 'selected' : '' }}>
                                            Elem-grad</option>
                                        <option value="hs-undergrad"
                                            {{ old('inputNaoEB') == 'hs-undergrad' ? 'selected' : '' }}>HS-undergrad
                                        </option>
                                        <option value="hs-grad" {{ old('inputNaoEB') == 'hs-grad' ? 'selected' : '' }}>
                                            HS-grad
                                        </option>
                                        <option value="college-undergrad"
                                            {{ old('inputNaoEB') == 'college-undergrad' ? 'selected' : '' }}>
                                            College-undergrad
                                        </option>
                                        <option value="college-grad"
                                            {{ old('inputNaoEB') == 'college-grad' ? 'selected' : '' }}>College-grad
                                        </option>
                                    </select>
                                    @error('inputNaoEB')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNaoDegree">Degree</label>
                                    <input type="text" class="form-control" name="inputNaoDegree" id="inputNaoDegree"
                                        placeholder="Degree, course or years finished"
                                        value="{{ old('inputNaoDegree') }}">
                                    @error('inputNaoDegree')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div>
                                <label for="formBasicInfo"><b>NAO</b></label>
                            </div>
                            <hr>
                            <div style="display:flex;">
                                <div class="form-group col-md-6" id="formWS"
                                    style="display:flex; border-right:1px solid;">
                                    <div class="form-group col-md-6">
                                        <label for="inputNaoType">Type of NAO</label>
                                        <select id="inputNaoType" class="form-control" name="inputNaoType">
                                            <option value="" {{ old('inputNaoType') == '' ? 'selected' : '' }}>Choose...
                                            </option>
                                            <option value="Provincial Nutrition Action Officer"
                                                {{ old('inputNaoType') == 'Provincial Nutrition Action Officer' ? 'selected' : '' }}>
                                                Provincial Nutrition Action Officer</option>
                                            <option value="City Nutrition Action Officer"
                                                {{ old('inputNaoType') == 'City Nutrition Action Officer' ? 'selected' : '' }}>
                                                City Nutrition Action Officer</option>
                                            <option value="Municipal Nutrition Action Officer"
                                                {{ old('inputNaoType') == 'Municipal Nutrition Action Officer' ? 'selected' : '' }}>
                                                Municipal Nutrition Action Officer</option>
                                        </select>
                                        @error('inputNaoType')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNaoDesignationType">Type of Designation</label>
                                        <select id="inputNaoDesignationType" class="form-control"
                                            name="inputNaoDesignationType">
                                            <option value=""
                                                {{ old('inputNaoDesignationType') == '' ? 'selected' : '' }}>
                                                Choose...</option>
                                            <option value="Full time"
                                                {{ old('inputNaoDesignationType') == 'Full time' ? 'selected' : '' }}>
                                                Full
                                                time</option>
                                            <option value="Full time designate"
                                                {{ old('inputNaoDesignationType') == 'Full time designate' ? 'selected' : '' }}>
                                                Full time designate</option>
                                            <option value="Part time designate"
                                                {{ old('inputNaoDesignationType') == 'Part time designate' ? 'selected' : '' }}>
                                                Part time designate</option>
                                        </select>
                                        @error('inputNaoDesignationType')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNaoDateDesignation">Date of Designation</label>
                                        <input type="date" class="form-control" name="inputNaoDateDesignation"
                                            id="inputNaoDateDesignation" value="{{ old('inputNaoDateDesignation') }}">
                                        @error('inputNaoDateDesignation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputNaoAppointment">Type of Appointment</label>
                                        <select id="inputNaoAppointment" class="form-control"
                                            name="inputNaoAppointment">
                                            <option value="" {{ old('inputNaoAppointment') == '' ? 'selected' : '' }}>
                                                Choose...</option>
                                            <option value="Plantilla"
                                                {{ old('inputNaoAppointment') == 'Plantilla' ? 'selected' : '' }}>
                                                Plantilla
                                            </option>
                                            <option value="COS"
                                                {{ old('inputNaoAppointment') == 'COS' ? 'selected' : '' }}>
                                                COS</option>
                                            <option value="Job order"
                                                {{ old('inputNaoAppointment') == 'Job order' ? 'selected' : '' }}>Job
                                                order
                                            </option>
                                        </select>
                                        @error('inputNaoAppointment')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNaoPosition">Office Position/Title</label>
                                        <select id="inputNaoPosition" class="form-control" name="inputNaoPosition">
                                            <option value="" {{ old('inputNaoPosition') == '' ? 'selected' : '' }}>
                                                Choose...
                                            </option>
                                            <option value="Position 1"
                                                {{ old('inputNaoPosition') == 'Position 1' ? 'selected' : '' }}>Position
                                                1
                                            </option>
                                            <option value="Position 2"
                                                {{ old('inputNaoPosition') == 'Position 2' ? 'selected' : '' }}>
                                                Position 2</option>
                                            <option value="Position 3"
                                                {{ old('inputNaoPosition') == 'Position 3' ? 'selected' : '' }}>Position
                                                3
                                            </option>
                                        </select>
                                        @error('inputNaoPosition')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNaoDepartment">Office/Department</label>
                                        <select id="inputNaoDepartment" class="form-control" name="inputNaoDepartment">
                                            <option value="" {{ old('inputNaoDepartment') == '' ? 'selected' : '' }}>
                                                Choose...</option>
                                            <option value="Department 1"
                                                {{ old('inputNaoDepartment') == 'Department 1' ? 'selected' : '' }}>
                                                Department
                                                1
                                            </option>
                                            <option value="Department 2"
                                                {{ old('inputNaoDepartment') == 'Department 2' ? 'selected' : '' }}>
                                                Department 2</option>
                                            <option value="Department 3"
                                                {{ old('inputNaoDepartment') == 'Department 3' ? 'selected' : '' }}>
                                                Department
                                                3
                                            </option>
                                        </select>
                                        @error('inputNaoDepartment')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div style="display:flex;">
                                <button type="submit" name="addPersonnelNao" class="btn btn-outline-primary">Add
                                    NAO</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-content" id="tab2">
                        <form action="{{ route('BSpersonnel.storeNPC') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputNpcPSGC">PSGC</label>
                                    <input type="text" class="form-control" name="inputNpcPSGC" id="inputNpcPSGC"
                                        placeholder="PSGC" readonly>
                                    @error('inputNpcPSGC')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcRegion">Region</label>
                                    <select id="region-dropdown-Npc" class="form-control" name="inputNpcRegion">
                                        <option value="">Select Region</option>
                                    </select>
                                    @error('inputNpcRegion')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcProvince">Province</label>
                                    <select id="province-dropdown-Npc" disabled class="form-control"
                                        name="inputNpcProvince">
                                        <option selected>Select Province</option>
                                    </select>
                                    @error('inputNpcProvince')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcCM">City/Municipality</label>
                                    <select id="city-dropdown-Npc" disabled class="form-control" name="inputNpcCM">
                                        <option selected>Select City/Municipality</option>
                                    </select>
                                    @error('inputNpcCM')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-md-3" id="totalBarangay"
                                style="display:flex; border-right:1px solid;">
                                <div class="form-group col-md-12">
                                    <label for="inputNpcGovMayor">Name of Governor/Mayor</label>
                                    <input type="text" class="form-control" name="inputNpcGovMayor"
                                        id="inputNpcGovMayor" placeholder="Name of Governor/Mayor"
                                        value="{{ old('inputNpcGovMayor') }}">
                                    @error('inputNpcGovMayor')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div>
                                <label for="formBasicInfo"><b>Basic Info</b></label>
                            </div>
                            <hr>
                            <div class="form-row" id="formBasicInfo">
                                <div class="form-group col-md-3">
                                    <label for="inputNpcLN">Last Name</label>
                                    <input type="text" class="form-control" name="inputNpcLN" id="inputNpcLN"
                                        placeholder="Last Name" value="{{ old('inputNpcLN') }}">
                                    @error('inputNpcLN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcFN">First Name</label>
                                    <input type="text" class="form-control" name="inputNpcFN" id="inputNpcFN"
                                        placeholder="First Name" value="{{ old('inputNpcFN') }}">
                                    @error('inputNpcFN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcMN">Middle Name</label>
                                    <input type="text" class="form-control" name="inputNpcMN" id="inputNpcMN"
                                        placeholder="Middle Name" value="{{ old('inputNpcMN') }}">
                                    @error('inputNpcMN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputNpcSuffix">Suffix</label>
                                    <select id="inputNpcSuffix" class="form-control" name="inputNpcSuffix">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Jr" {{ old('inputNpcSuffix') == 'Jr' ? 'selected' : '' }}>Jr
                                        </option>
                                        <option value="Sr" {{ old('inputNpcSuffix') == 'Sr' ? 'selected' : '' }}>Sr
                                        </option>
                                        <option value="I" {{ old('inputNpcSuffix') == 'I' ? 'selected' : '' }}>I
                                        </option>
                                        <option value="II" {{ old('inputNpcSuffix') == 'II' ? 'selected' : '' }}>II
                                        </option>
                                        <option value="III" {{ old('inputNpcSuffix') == 'III' ? 'selected' : '' }}>III
                                        </option>
                                    </select>
                                    @error('inputNpcSuffix')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputNpcSex">Sex</label>
                                    <select id="inputNpcSex" class="form-control" name="inputNpcSex">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Male" {{ old('inputNpcSex') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('inputNpcSex') == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                    @error('inputNpcSex')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcCPNum">Cellphone Number</label>
                                    <input type="tel" class="form-control" name="inputNpcCPNum" id="inputNpcCPNum"
                                        maxlength="11" value="{{ old('inputNpcCPNum') }}">
                                    @error('inputNpcCPNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcTPNum">Telephone Number</label>
                                    <input type="tel" class="form-control" name="inputNpcTPNum" id="inputNpcTPNum"
                                        value="{{ old('inputNpcTPNum') }}">
                                    @error('inputNpcTPNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcEmail">Email Address</label>
                                    <input type="email" class="form-control" name="inputNpcEmail" id="inputNpcEmail"
                                        placeholder="Email" value="{{ old('inputNpcEmail') }}">
                                    @error('inputNpcEmail')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcAddress">Address</label>
                                    <input type="text" class="form-control" name="inputNpcAddress" id="inputNpcAddress"
                                        placeholder="Complete Address" value="{{ old('inputNpcAddress') }}">
                                    @error('inputNpcAddress')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row" id="formBasicInfo">
                                <div class="form-group col-md-2">
                                    <label for="inputNpcBdate">Birthdate</label>
                                    <input type="date" class="form-control" name="inputNpcBdate" id="inputNpcBdate"
                                        value="{{ old('inputNpcBdate') }}">
                                    @error('inputNpcBdate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputNpcAge">Age</label>
                                    <input type="number" class="form-control" name="inputNpcAge" id="inputNpcAge"
                                        placeholder="0" readonly value="{{ old('inputNpcAge') }}">
                                    @error('inputNpcAge')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" class="form-control" name="inputNpcCivilStatus"
                                        id="inputNpcCivilStatus" value="{{ old('inputNpcCivilStatus', 'N/A') }}">
                                    @error('inputNpcCivilStatus')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcEB">Educational Background</label>
                                    <select id="inputNpcEB" class="form-control" name="inputNpcEB">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="elem-undergrad"
                                            {{ old('inputNpcEB') == 'elem-undergrad' ? 'selected' : '' }}>Elem-undergrad
                                        </option>
                                        <option value="elem-grad"
                                            {{ old('inputNpcEB') == 'elem-grad' ? 'selected' : '' }}>
                                            Elem-grad</option>
                                        <option value="hs-undergrad"
                                            {{ old('inputNpcEB') == 'hs-undergrad' ? 'selected' : '' }}>HS-undergrad
                                        </option>
                                        <option value="hs-grad" {{ old('inputNpcEB') == 'hs-grad' ? 'selected' : '' }}>
                                            HS-grad</option>
                                        <option value="college-undergrad"
                                            {{ old('inputNpcEB') == 'college-undergrad' ? 'selected' : '' }}>
                                            College-undergrad</option>
                                        <option value="college-grad"
                                            {{ old('inputNpcEB') == 'college-grad' ? 'selected' : '' }}>College-grad
                                        </option>
                                    </select>
                                    @error('inputNpcEB')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputNpcDegree">Degree</label>
                                    <input type="text" class="form-control" name="inputNpcDegree" id="inputNpcDegree"
                                        placeholder="Degree, course or years finished"
                                        value="{{ old('inputNpcDegree') }}">
                                    @error('inputNpcDegree')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div>
                                <label for="formBasicInfo"><b>NPC</b></label>
                            </div>
                            <hr>
                            <div style="display:flex;">
                                <div class="form-group col-md-9" id="formWS"
                                    style="display:flex; border-right:1px solid;">
                                    <div class="form-group col-md-4">
                                        <label for="inputNpcType">Type of NPC</label>
                                        <select id="inputNpcType" class="form-control" name="inputNpcType">
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Provincial Nutrition Action Officer"
                                                {{ old('inputNpcType') == 'Provincial Nutrition Action Officer' ? 'selected' : '' }}>
                                                District Nutrition Program Coordinator</option>
                                            <option value="City Nutrition Action Officer"
                                                {{ old('inputNpcType') == 'City Nutrition Action Officer' ? 'selected' : '' }}>
                                                City Nutrition Program Coordinator</option>
                                            <option value="Municipal Nutrition Action Officer"
                                                {{ old('inputNpcType') == 'Municipal Nutrition Action Officer' ? 'selected' : '' }}>
                                                Municipal Nutrition Program Coordinator</option>
                                        </select>
                                        @error('inputNpcType')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNpcDesignationType">Type of Designation</label>
                                        <select id="inputNpcDesignationType" class="form-control"
                                            name="inputNpcDesignationType">
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Full time"
                                                {{ old('inputNpcDesignationType') == 'Full time' ? 'selected' : '' }}>
                                                Full
                                                time</option>
                                            <option value="Full time designate"
                                                {{ old('inputNpcDesignationType') == 'Full time designate' ? 'selected' : '' }}>
                                                Full time designate</option>
                                            <option value="Part time designate"
                                                {{ old('inputNpcDesignationType') == 'Part time designate' ? 'selected' : '' }}>
                                                Part time designate</option>
                                        </select>
                                        @error('inputNpcDesignationType')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNpcDateDesignation">Date of Designation</label>
                                        <input type="date" class="form-control" name="inputNpcDateDesignation"
                                            id="inputNpcDateDesignation" value="{{ old('inputNpcDateDesignation') }}">
                                        @error('inputNpcDateDesignation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputNpcAppointment">Type of Appointment</label>
                                        <select id="inputNpcAppointment" class="form-control"
                                            name="inputNpcAppointment">
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Plantilla"
                                                {{ old('inputNpcAppointment') == 'Plantilla' ? 'selected' : '' }}>
                                                Plantilla
                                            </option>
                                            <option value="COS"
                                                {{ old('inputNpcAppointment') == 'COS' ? 'selected' : '' }}>
                                                COS</option>
                                            <option value="Job order"
                                                {{ old('inputNpcAppointment') == 'Job order' ? 'selected' : '' }}>Job
                                                order
                                            </option>
                                        </select>
                                        @error('inputNpcAppointment')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="inputNpcPosition">Office Position/Title</label>
                                        <select id="inputNpcPosition" class="form-control" name="inputNpcPosition">
                                            <option value="" selected>Choose...</option>
                                            <option value="Position 1"
                                                {{ old('inputNpcPosition') == 'Position 1' ? 'selected' : '' }}>Position
                                                1
                                            </option>
                                            <option value="Position 2"
                                                {{ old('inputNpcPosition') == 'Position 2' ? 'selected' : '' }}>Position
                                                2
                                            </option>
                                            <option value="Position 3"
                                                {{ old('inputNpcPosition') == 'Position 3' ? 'selected' : '' }}>Position
                                                3
                                            </option>
                                        </select>
                                        @error('inputNpcPosition')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNpcDepartment">Office/Department</label>
                                        <select id="inputNpcDepartment" class="form-control" name="inputNpcDepartment">
                                            <option value="" selected>Choose...</option>
                                            <option value="Department 1"
                                                {{ old('inputNpcDepartment') == 'Department 1' ? 'selected' : '' }}>
                                                Department 1</option>
                                            <option value="Department 2"
                                                {{ old('inputNpcDepartment') == 'Department 2' ? 'selected' : '' }}>
                                                Department 2</option>
                                            <option value="Department 3"
                                                {{ old('inputNpcDepartment') == 'Department 3' ? 'selected' : '' }}>
                                                Department 3</option>
                                        </select>
                                        @error('inputNpcDepartment')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputNpcDCNPCAPMembership">DCNPCAP Membership</label>
                                        <select id="inputNpcDCNPCAPMembership" class="form-control"
                                            name="inputNpcDCNPCAPMembership">
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Yes"
                                                {{ old('inputNpcDCNPCAPMembership') == 'Yes' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="No"
                                                {{ old('inputNpcDCNPCAPMembership') == 'No' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                        @error('inputNpcDCNPCAPMembership')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNpcDCNPCAPPosition">DCNPCAP Position (if officer)</label>
                                        <select id="inputNpcDCNPCAPPosition" class="form-control"
                                            name="inputNpcDCNPCAPPosition">
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Yes"
                                                {{ old('inputNpcDCNPCAPPosition') == 'Yes' ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="No"
                                                {{ old('inputNpcDCNPCAPPosition') == 'No' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                        @error('inputNpcDCNPCAPPosition')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputNpcDCNPCAPOfficer">National or Regional (DCNPCAP
                                            Officer)</label>
                                        <select id="inputNpcDCNPCAPOfficer" class="form-control"
                                            name="inputNpcDCNPCAPOfficer">
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="National"
                                                {{ old('inputNpcDCNPCAPOfficer') == 'National' ? 'selected' : '' }}>
                                                National
                                            </option>
                                            <option value="Regional"
                                                {{ old('inputNpcDCNPCAPOfficer') == 'Regional' ? 'selected' : '' }}>
                                                Regional
                                            </option>
                                        </select>
                                        @error('inputNpcDCNPCAPOfficer')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div style="display:flex;">
                                <button type="submit" name="addPersonnelPNC" class="btn btn-outline-primary">Add
                                    NPC</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-content" id="tab3">
                        <form action="{{ route('BSpersonnel.storeBNS') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputBnsPSGC">PSGC</label>
                                    <input type="text" class="form-control" name="inputBnsPSGC" id="inputBnsPSGC"
                                        placeholder="PSGC" readonly>
                                    @error('inputBnsPSGC')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsRegion">Region</label>
                                    <select id="region-dropdown-Bns" class="form-control" name="inputBnsRegion">
                                        <option value="">Select Region</option>
                                    </select>
                                    @error('inputBnsRegion')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsProvince">Province</label>
                                    <select id="province-dropdown-Bns" disabled class="form-control"
                                        name="inputBnsProvince">
                                        <option selected>Select Province</option>
                                    </select>
                                    @error('inputBnsProvince')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsCM">City/Municipality</label>
                                    <select id="city-dropdown-Bns" disabled class="form-control" name="inputBnsCM">
                                        <option selected>Select City/Municipality</option>
                                    </select>
                                    @error('inputBnsCM')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-md-3" id="totalBarangay"
                                style="display:flex; border-right:1px solid;">
                                <div class="form-group col-md-12">
                                    <label for="inputBnsBarangay">Barangay</label>
                                    <select id="barangay-dropdown-Bns" disabled class="form-control"
                                        name="inputBnsBarangay">
                                        <option selected>Select City/Municipality</option>
                                    </select>
                                    @error('inputBnsBarangay')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div>
                                <label for="formBasicInfo"><b>Basic Info</b></label>
                            </div>
                            <hr>
                            <div class="form-row" id="formBasicInfo">
                                <div class="form-group col-md-3">
                                    <label for="inputBnsIdNum">ID Number</label>
                                    <input type="number" class="form-control" name="inputBnsIdNum" id="inputBnsIdNum"
                                        placeholder="ID Number" maxlength="10" value="{{ old('inputBnsIdNum') }}">
                                    @error('inputBnsIdNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsIdName">Name on ID</label>
                                    <input type="text" class="form-control" name="inputBnsIdName" id="inputBnsIdName"
                                        placeholder="Name on ID" value="{{ old('inputBnsIdName') }}">
                                    @error('inputBnsIdName')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsLN">Last Name</label>
                                    <input type="text" class="form-control" name="inputBnsLN" id="inputBnsLN"
                                        placeholder="Last Name" value="{{ old('inputBnsLN') }}">
                                    @error('inputBnsLN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsFN">First Name</label>
                                    <input type="text" class="form-control" name="inputBnsFN" id="inputBnsFN"
                                        placeholder="First Name" value="{{ old('inputBnsFN') }}">
                                    @error('inputBnsFN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsMN">Middle Name</label>
                                    <input type="text" class="form-control" name="inputBnsMN" id="inputBnsMN"
                                        placeholder="Middle Name" value="{{ old('inputBnsMN') }}">
                                    @error('inputBnsMN')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputBnsSuffix">Suffix</label>
                                    <select id="inputBnsSuffix" class="form-control" name="inputBnsSuffix">
                                        <option value="" disabled {{ old('inputBnsSuffix') == '' ? 'selected' : '' }}>
                                            Choose...</option>
                                        <option value="Jr" {{ old('inputBnsSuffix') == 'Jr' ? 'selected' : '' }}>Jr
                                        </option>
                                        <option value="Sr" {{ old('inputBnsSuffix') == 'Sr' ? 'selected' : '' }}>Sr
                                        </option>
                                        <option value="I" {{ old('inputBnsSuffix') == 'I' ? 'selected' : '' }}>I
                                        </option>
                                        <option value="II" {{ old('inputBnsSuffix') == 'II' ? 'selected' : '' }}>II
                                        </option>
                                        <option value="III" {{ old('inputBnsSuffix') == 'III' ? 'selected' : '' }}>III
                                        </option>
                                    </select>
                                    @error('inputBnsSuffix')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputBnsSex">Sex</label>
                                    <select id="inputBnsSex" class="form-control" name="inputBnsSex">
                                        <option value="" disabled {{ old('inputBnsSex') == '' ? 'selected' : '' }}>
                                            Choose...
                                        </option>
                                        <option value="Male" {{ old('inputBnsSex') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('inputBnsSex') == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                    @error('inputBnsSex')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsCPNum">Cellphone Number</label>
                                    <input type="tel" class="form-control" name="inputBnsCPNum" id="inputBnsCPNum"
                                        maxlength="11" value="{{ old('inputBnsCPNum') }}">
                                    @error('inputBnsCPNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsTPNum">Telephone Number</label>
                                    <input type="tel" class="form-control" name="inputBnsTPNum" id="inputBnsTPNum"
                                        value="{{ old('inputBnsTPNum') }}">
                                    @error('inputBnsTPNum')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsEmail">Email Address</label>
                                    <input type="email" class="form-control" name="inputBnsEmail" id="inputBnsEmail"
                                        placeholder="Email" value="{{ old('inputBnsEmail') }}">
                                    @error('inputBnsEmail')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row" id="formBasicInfo">
                                <div class="form-group col-md-3">
                                    <label for="inputBnsAddress">Address</label>
                                    <input type="text" class="form-control" name="inputBnsAddress" id="inputBnsAddress"
                                        placeholder="Complete Address" value="{{ old('inputBnsAddress') }}">
                                    @error('inputBnsAddress')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputBnsBdate">Birthdate</label>
                                    <input type="date" class="form-control" name="inputBnsBdate" id="inputBnsBdate"
                                        value="{{ old('inputBnsBdate') }}">
                                    @error('inputBnsBdate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputBnsAge">Age</label>
                                    <input type="number" class="form-control" name="inputBnsAge" id="inputBnsAge"
                                        placeholder="0" readonly value="{{ old('inputBnsAge') }}">
                                    @error('inputBnsAge')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsEB">Educational Background</label>
                                    <select id="inputBnsEB" class="form-control" name="inputBnsEB">
                                        <option value="" disabled {{ old('inputBnsEB') == '' ? 'selected' : '' }}>
                                            Choose...
                                        </option>
                                        <option value="elem-undergrad"
                                            {{ old('inputBnsEB') == 'elem-undergrad' ? 'selected' : '' }}>Elem-undergrad
                                        </option>
                                        <option value="elem-grad"
                                            {{ old('inputBnsEB') == 'elem-grad' ? 'selected' : '' }}>
                                            Elem-grad</option>
                                        <option value="hs-undergrad"
                                            {{ old('inputBnsEB') == 'hs-undergrad' ? 'selected' : '' }}>HS-undergrad
                                        </option>
                                        <option value="hs-grad" {{ old('inputBnsEB') == 'hs-grad' ? 'selected' : '' }}>
                                            HS-grad</option>
                                        <option value="college-undergrad"
                                            {{ old('inputBnsEB') == 'college-undergrad' ? 'selected' : '' }}>
                                            College-undergrad</option>
                                        <option value="college-grad"
                                            {{ old('inputBnsEB') == 'college-grad' ? 'selected' : '' }}>College-grad
                                        </option>
                                    </select>
                                    @error('inputBnsEB')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsDegree">Degree</label>
                                    <input type="text" class="form-control" name="inputBnsDegree" id="inputBnsDegree"
                                        placeholder="Degree, course or years finished"
                                        value="{{ old('inputBnsDegree') }}">
                                    @error('inputBnsDegree')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputBnsCivilStat">Civil Status</label>
                                    <select id="inputBnsCivilStat" class="form-control" name="inputBnsCivilStat">
                                        <option value="" disabled
                                            {{ old('inputBnsCivilStat') == '' ? 'selected' : '' }}>
                                            Choose...</option>
                                        <option value="single"
                                            {{ old('inputBnsCivilStat') == 'single' ? 'selected' : '' }}>
                                            Single</option>
                                        <option value="married"
                                            {{ old('inputBnsCivilStat') == 'married' ? 'selected' : '' }}>Married
                                        </option>
                                        <option value="separated"
                                            {{ old('inputBnsCivilStat') == 'separated' ? 'selected' : '' }}>Separated
                                        </option>
                                        <option value="widowed"
                                            {{ old('inputBnsCivilStat') == 'widowed' ? 'selected' : '' }}>Widowed
                                        </option>
                                    </select>
                                    @error('inputBnsCivilStat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div>
                                <label for="formBasicInfo"><b>BNS</b></label>
                            </div>
                            <hr>
                            <div style="display:flex;">
                                <div class="form-group col-md-6" id="formWS"
                                    style="display:flex; border-right:1px solid;">
                                    <div class="form-group col-md-6">
                                        <label for="inputBnsEmploymentStat">Status of Employment</label>
                                        <select id="inputBnsEmploymentStat" class="form-control"
                                            name="inputBnsEmploymentStat">
                                            <option value=""
                                                {{ old('inputBnsEmploymentStat') == '' ? 'selected' : '' }}>
                                                Choose...
                                            </option>
                                            <option value="Employed"
                                                {{ old('inputBnsEmploymentStat') == 'Employed' ? 'selected' : '' }}>
                                                Employed
                                            </option>
                                            <option value="Unemployed"
                                                {{ old('inputBnsEmploymentStat') == 'Unemployed' ? 'selected' : '' }}>
                                                Unemployed</option>
                                            <option value="Retired"
                                                {{ old('inputBnsEmploymentStat') == 'Retired' ? 'selected' : '' }}>
                                                Retired
                                            </option>
                                        </select>
                                        @error('inputBnsEmploymentStat')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputBnsBeneficiary">Beneficiary Name</label>
                                        <input type="text" class="form-control" name="inputBnsBeneficiary"
                                            id="inputBnsBeneficiary" placeholder="Beneficiary Name"
                                            value="{{ old('inputBnsBeneficiary') }}">
                                        @error('inputBnsBeneficiary')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputBnsRelationship">Relationship</label>
                                        <select id="inputBnsRelationship" class="form-control"
                                            name="inputBnsRelationship">
                                            <option value="" {{ old('inputBnsRelationship') == '' ? 'selected' : '' }}>
                                                Choose...</option>
                                            <option value="Spouse"
                                                {{ old('inputBnsRelationship') == 'Spouse' ? 'selected' : '' }}>Spouse
                                            </option>
                                            <option value="Child"
                                                {{ old('inputBnsRelationship') == 'Child' ? 'selected' : '' }}>Child
                                            </option>
                                            <option value="Sibling"
                                                {{ old('inputBnsRelationship') == 'Sibling' ? 'selected' : '' }}>Sibling
                                            </option>
                                        </select>
                                        @error('inputBnsRelationship')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputBnsActiveFrom">Period of Active From</label>
                                        <input type="date" class="form-control" name="inputBnsActiveFrom"
                                            id="inputBnsActiveFrom" value="{{ old('inputBnsActiveFrom') }}">
                                        @error('inputBnsActiveFrom')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputBnsActiveTo">Period of Active To</label>
                                        <input type="date" class="form-control" name="inputBnsActiveTo"
                                            id="inputBnsActiveTo" value="{{ old('inputBnsActiveTo') }}">
                                        @error('inputBnsActiveTo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="inputBnsLastUpdate">Last Update</label>
                                        <input type="date" class="form-control" name="inputBnsLastUpdate"
                                            id="inputBnsLastUpdate" value="{{ old('inputBnsLastUpdate') }}">
                                        @error('inputBnsLastUpdate')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputBnsStatus">BNS Status</label>
                                        <select id="inputBnsStatus" class="form-control" name="inputBnsStatus">
                                            <option value="" disabled
                                                {{ old('inputBnsStatus') == '' ? 'selected' : '' }}>
                                                Choose...</option>
                                            <option value="Active"
                                                {{ old('inputBnsStatus') == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="Inactive"
                                                {{ old('inputBnsStatus') == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('inputBnsStatus')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div style="display:flex;">
                                <button type="submit" name="addPersonnelPNC" class="btn btn-outline-primary">Add
                                    BNS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
$(document).ready(function() {
    const tabIdCache = [];

    function getLocationData(tabId) {

        if (tabIdCache.includes(tabId)) return;
        tabIdCache.push(tabId);

        const oldValueMap = {
            tab1: {
                region: '{{ old("inputNaoRegion") }}',
                province: '{{ old("inputNaoProvince") }}',
                city: '{{ old("inputNaoCM") }}'
            },
            tab2: {
                region: '{{ old("inputNpcRegion") }}',
                province: '{{ old("inputNpcProvince") }}',
                city: '{{ old("inputNpcCM") }}'
            },
            tab3: {
                region: '{{ old("inputBnsRegion") }}',
                province: '{{ old("inputBnsProvince") }}',
                city: '{{ old("inputBnsCM") }}',
                barangay: '{{ old("inputBnsBarangay") }}'
            }
        };

        const dropdownMap = {
            tab1: {
                region: $('#region-dropdown-Nao'),
                province: $('#province-dropdown-Nao'),
                city: $('#city-dropdown-Nao')
            },
            tab2: {
                region: $('#region-dropdown-Npc'),
                province: $('#province-dropdown-Npc'),
                city: $('#city-dropdown-Npc')
            },
            tab3: {
                region: $('#region-dropdown-Bns'),
                province: $('#province-dropdown-Bns'),
                city: $('#city-dropdown-Bns'),
                barangay: $('#barangay-dropdown-Bns')
            }
        };

        const readonlyMap = {
            tab1: $('#inputNaoPSGC'),
            tab2: $('#inputNpcPSGC'),
            tab3: $('#inputBnsPSGC')
        };

        const birthdateMap = {
            tab1: $('#inputNaoBdate'),
            tab2: $('#inputNpcBdate'),
            tab3: $('#inputBnsBdate')
        };

        const ageMap = {
            tab1: $('#inputNaoAge'),
            tab2: $('#inputNpcAge'),
            tab3: $('#inputBnsAge')
        };


        const oldValues = oldValueMap[tabId];
        const dropdowns = dropdownMap[tabId];
        const readonly = readonlyMap[tabId];
        const birthdateInput = birthdateMap[tabId];
        const ageInput = ageMap[tabId];

        birthdateInput.on('change', function() {
            let birthdate = this.value;
            let age = calculateAge(birthdate);

            ageInput.val(age);
            console.log("Age for " + tabId + ": ", age);
        });

        function calculateAge(birthdate) {
            let birthDate = new Date(birthdate);
            let today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDifference = today.getMonth() - birthDate.getMonth();

            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        }

        const routes = {
            getRegions: '{{ route("location.regions.get") }}',
            getProvinces: '{{ route("location.provinces.get") }}',
            getCitiesAndMunicipalities: '{{ route("location.citiesAndMunicipalities.get") }}',
            getBarangays: '{{ route("location.barangays.get") }}',
            getCitiesAndMunicipalitiesInventory: '{{ route("BSequipmentInventory.CMInventory.get") }}'
        };


        const clearAndDisableDropdown = (dropdown, placeholder) => {
            dropdown.empty().append(
                    `<option value="" disabled selected>Select ${placeholder}</option>`)
                .prop('disabled', true);
        };

        const populateDropdown = (dropdown, data, valueKey, textKey, placeholder) => {
            dropdown.empty().append(
                `<option value="" disabled selected>Select ${placeholder}</option>`);
            data.forEach(item => {
                dropdown.append(
                    `<option value="${item[valueKey]}">${item[textKey]}</option>`);
            });
            dropdown.prop('disabled', false);
        };

        const fetchDataAndPopulate = (url, params, dropdown, valueKey, textKey, placeholder, oldValue =
            '') => {
            $.get(url, params)
                .done(function(data) {
                    if (!data || data.length === 0) {
                        clearAndDisableDropdown(dropdown, placeholder);
                        return;
                    }
                    populateDropdown(dropdown, data, valueKey, textKey, placeholder);

                    dropdown.val(oldValue).change();
                    if (dropdown.val() !== oldValue) {
                        dropdown.val('').change(); // Reset to default select
                    }
                })
                .fail(function() {
                    alert(`Failed to fetch ${placeholder.toLowerCase()}.`);
                });
        };

        $.get(routes.getRegions)
            .done(function(data) {
                clearAndDisableDropdown(dropdowns.province, 'Province');
                clearAndDisableDropdown(dropdowns.city, 'City/Municipality');
                populateDropdown(dropdowns.region, data, 'reg_code', 'name', 'Region');

                if (oldValues.region) {
                    dropdowns.region.val(oldValues.region).change();
                }
            })
            .fail(function() {
                alert('Failed to fetch regions.');
            });

        dropdowns.region.change(function() {
            const regionCode = $(this).val();
            const ncrRegionCode = '13';

            clearAndDisableDropdown(dropdowns.province, 'Province');

            if (!regionCode) return;

            if (regionCode === ncrRegionCode) {
                fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                    reg_code: regionCode
                }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
                return;
            }

            fetchDataAndPopulate(routes.getProvinces, {
                reg_code: regionCode
            }, dropdowns.province, 'prov_code', 'name', 'Province', oldValues.province);
            fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                reg_code: regionCode,
                excludeProvincialAreas: true
            }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
        });

        dropdowns.province.change(function() {
            const provinceCode = $(this).val();
            if (!provinceCode) return;

            fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                prov_code: provinceCode
            }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
        });

        dropdowns.city.change(function() {
            const citymunCode = $(this).val();
            if (!citymunCode) return;
            // if (!dropdowns.barangay) {
            //     readonly.val(citymunCode + '000').change();
            // }

            readonly.val(citymunCode + '000').change();

            fetchDataAndPopulate(routes.getBarangays, {
                citymun_code: citymunCode
            }, dropdowns.barangay, 'name', 'name', 'Barangay', oldValues.barangay);
        });

        if (dropdowns.barangay) {
            dropdowns.barangay.change(function() {
                const psgc_code = $(this).val();
                if (!psgc_code) return;
            });
        }
    }

    function setActiveTab(tabId) {
        getLocationData(tabId);
        $('.tab').removeClass('active');
        $('.tab-content').removeClass('active');

        $('[data-tab="' + tabId + '"]').addClass('active');
        $('#' + tabId).addClass('active');

    }

    setActiveTab('{{ session("activeTab", "tab1") }}');

    $('.tab').on('click', function() {
        const tabId = $(this).data('tab');
        setActiveTab(tabId);
    });

});
</script>