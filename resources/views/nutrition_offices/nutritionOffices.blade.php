@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Nutrition Offices',
'activePage' => 'NutritionOfficesIndex',
'activeNav' => '',
])

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("Nutrition Offices")}}</h5>
            </div>
        </div>
        <div class="form-row">
            <div id="tab-contents" class="col-md-12">
                <div class="tab-content" id="tab1">
                    <form action="{{ route('nutritionOffices.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputPSGC">PSGC</label>
                                <input type="text" class="form-control" name="inputPSGC" id="inputPSGC"
                                    placeholder="PSGC">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputGeoLevel">Geographic Level</label>
                                <select class="form-control" name="inputGeoLevel" id="inputGeoLevel">
                                    <option selected>Select...</option>
                                    <option value="Reg">Region</option>
                                    <option value="Prov">Province</option>
                                    <option value="HUG">Highly Urbanized City (HUC)</option>
                                    <option value="ICC">Independent Component City (ICC)</option>
                                    <option value="CC">Component City (CC)</option>
                                    <option value="Mun">Municipality</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputRegion">Region</label>
                                <!-- <input type="text" class="form-control" name="inputRegion" id="inputRegion"
                                    placeholder="Region"> -->
                                <select class="form-control" name="inputRegion" id="inputRegion">
                                    <option selected>Select...</option>
                                    @foreach ($Regs as $regs)
                                    <option value="{{ $regs->id }}">{{ $regs->region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputProvince">Province</label>
                                <!-- <input type="text" class="form-control" name="inputProvince" id="inputProvince"
                                    placeholder="Province"> -->
                                <select class="form-control" name="inputProvince" id="inputProvince">
                                    <option selected>Select...</option>
                                @foreach ($Prov as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCM">City/Municipality</label>
                                <!-- <input type="text" class="form-control" name="inputCM" id="inputCM"
                                    placeholder="City/Municipality"> -->
                                <select class="form-control" name="inputCM" id="inputCM">
                                    <option selected>Select...</option>
                                @foreach ($Mun as $mun)
                                    <option value="{{ $mun->id }}">{{ $mun->municipal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputIncomeClass">Income Class</label>
                                <select class="form-control" name="inputIncomeClass" id="inputIncomeClass">
                                    <option selected>Select...</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="5th">5th</option>
                                    <option value="6th">6th</option>
                                </select>
                            </div>

                        </div>
                        <hr>
                        <div style="display: flex;">
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputNutriOfice">Nutrition Office</label>
                                    <select class="form-control" name="InputNutriOfice" id="InputNutriOfice">
                                        <option selected>Select...</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputSeparateBudget">Separate Budget for Nutrition</label>
                                    <select class="form-control" name="InputSeparateBudget" id="InputSeparateBudget" onchange="enabledSeparateBudgetInput()">
                                        <option selected>Select...</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <label for="InputSeparateBudgetAmount" id="labelAmount" hidden>Amount</label>
                                    <input type="number" class="form-control" name="InputSeparateBudgetAmount"
                                        id="InputSeparateBudgetAmount" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputOffice">Under What Office</label>
                                    <select class="form-control" name="InputOffice" id="InputOffice" onchange="otherNutritionOffice()">
                                        <option selected>Select...</option>
                                        <option value="Health">Health</option>
                                        <option value="Nutrition">Nutrition</option>
                                        <option value="lce">LCE</option>
                                        <option value="agriculture">Agriculture</option>
                                        <option value="social welfare">Social Welfare</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <label for="InputOtherOffice" id="labelOtherOffice" hidden>If Others</label>
                                    <input type="text" class="form-control" name="InputOtherOffice"
                                        id="InputOtherOffice" readonly hidden placeholder="Enter Other Office">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo">P/C/MNAO</label>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputPC_MNAO_Position">Position</label>
                                    <select class="form-control" name="InputPC_MNAO_Position"
                                        id="InputPC_MNAO_Position">
                                        <option selected>Select...</option>
                                        <option value="designate">Designate</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="both">Both</option>
                                        <option value="volunteer">Volunteer</option>
                                    </select>
                                    <label for="InputPC_MNAO_JobTitle">Job Title</label>
                                    <input type="text" class="form-control" name="InputPC_MNAO_JobTitle"
                                        id="InputPC_MNAO_JobTitle">
                                    <!-- <select class="form-control" name="InputPC_MNAO_JobTitle" id="InputPC_MNAO_JobTitle">
                                        <option selected>Select...</option>
                                        <option value="designate">Designate</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="both">Both</option>
                                        <option value="volunteer">Volunteer</option>
                                    </select> -->
                                    <label for="InputPC_MNAO_SalaryGrade">Salary Grade</label>
                                    <input type="number" class="form-control" name="InputPC_MNAO_SalaryGrade"
                                        id="InputPC_MNAO_SalaryGrade">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputPC_MNAO_EmpStat">Employment Status</label>
                                    <select class="form-control" name="InputPC_MNAO_EmpStat" id="InputPC_MNAO_EmpStat" onchange="otherEmploymentStat()">
                                        <option selected>Select...</option>
                                        <option value="permanent">Permanent</option>
                                        <option value="casual">Casual</option>
                                        <option value="job order">Job Order</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <label for="InputPC_OtherEmpStat" id="labelOtherEmploymentStat" hidden>If Others</label>
                                    <input type="text" class="form-control" name="InputPC_OtherEmpStat"
                                        id="InputPC_OtherEmpStat" readonly hidden placeholder="Enter Other P/C/MNAO Employment Status">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputMorePC_MNAO">More than one P/C/MNAO</label>
                                    <select class="form-control" name="InputMorePC_MNAO" id="InputMorePC_MNAO" onchange="IfYesMoreThanOne()">
                                        <option selected>Select...</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <label for="InputMoreYesPC_MNAO" id="labelIfYesMoreThanOne" hidden>If Yes</label>
                                    <input type="number" class="form-control" name="InputMoreYesPC_MNAO"
                                        id="InputMoreYesPC_MNAO" readonly hidden>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="formBasicInfo">D/CNPC</label>
                        </div>
                        <div style="display: flex;">
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputDCNPC_Position">Position</label>
                                    <select class="form-control" name="InputDCNPC_Position"
                                        id="InputDCNPC_Position">
                                        <option selected>Select...</option>
                                        <option value="designate">Designate</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="both">Both</option>
                                        <option value="volunteer">Volunteer</option>
                                    </select>
                                    <label for="InputDCNPC_JobTitle">Job Title</label>
                                    <input type="text" class="form-control" name="InputDCNPC_JobTitle"
                                        id="InputDCNPC_JobTitle">
                                    <!-- <select class="form-control" name="InputDCNPC_JobTitle" id="InputDCNPC_JobTitle">
                                        <option selected>Select...</option>
                                        <option value="designate">Designate</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="both">Both</option>
                                        <option value="volunteer">Volunteer</option>
                                    </select> -->
                                    <label for="InputDCNPC_SalaryGrade">Salary Grade</label>
                                    <input type="number" class="form-control" name="InputDCNPC_SalaryGrade"
                                        id="InputDCNPC_SalaryGrade">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputD_CNPC_EmpStat">Employment Status</label>
                                    <select class="form-control" name="InputD_CNPC_EmpStat" id="InputD_CNPC_EmpStat" onchange="otherEmploymentStat_DCNPC()">
                                        <option selected>Select...</option>
                                        <option value="permanent">Permanent</option>
                                        <option value="casual">Casual</option>
                                        <option value="job order">Job Order</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <label for="InputDCNPC_OtherEmpStat" id="labelDCNPC_OtherEmpStat" hidden>Others Employment Status</label>
                                    <input type="text" class="form-control" name="InputDCNPC_OtherEmpStat"
                                        id="InputDCNPC_OtherEmpStat" readonly hidden placeholder="Enter D/CNPC Other Employment Status">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputMoreDCNPC_MNAO">More than one D/CNPC</label>
                                    <select class="form-control" name="InputMoreDCNPC_MNAO" id="InputMoreDCNPC_MNAO" onchange="IfYesMoreThanOneDCNPC()">
                                        <option selected>Select...</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <label for="InputMoreYesDCNPC_MNAO" id="labelIfYesMoreThanOneDCNPC" hidden>If Yes</label>
                                    <input type="number" class="form-control" name="InputMoreYesDCNPC_MNAO"
                                        id="InputMoreYesDCNPC_MNAO" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <label for="InputDCNPC_NumOfTech">Number of Technical Support Staff</label>
                                    <input type="number" class="form-control" name="InputDCNPC_NumOfTech"
                                        id="InputDCNPC_NumOfTech">
                                    <label for="InputMoreYesDCNPC_NumOfAdmin">Number of Administrative Support Staff</label>
                                    <input type="number" class="form-control" name="InputMoreYesDCNPC_NumOfAdmin"
                                        id="InputMoreYesDCNPC_NumOfAdmin">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-md-12" style="display:flex;">
                            <button type="submit" name="addNutrition" class="btn btn-outline-primary">Add Nutrition
                                Offices</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
