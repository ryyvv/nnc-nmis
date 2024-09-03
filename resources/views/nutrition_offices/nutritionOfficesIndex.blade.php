<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="{{ asset('js/diether.js') }}"></script>

<style>
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
'namePage' => 'Nutrition Offices',
'activePage' => 'NutritionOfficesIndex',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("Nutrition Offices")}}</h5>
                <div>
                    <a class="btn btn-outline-primary" href="{{route('BSnutritionOffices.create')}}">Nutrition Offices</a>
                </div>
            </div>
        </div>
        <div class="row row-12" style="overflow-x: scroll;">
            <table id="nutriOfficeTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td><b>10-digit PSGC</b></td>
                        <td><b>Geographic Level</b></td>
                        <td><b>Region</b></td>
                        <td><b>Province</b></td>
                        <td><b>City/Mun</b></td>
                        <td><b>Income Class</b></td>
                        <td><b>Nutrition Office</b></td>
                        <td><b>Separate Nutrition Budget</b></td>
                        <td><b>Under What Office</b></td>
                        <td><b>P/CNAO Position</b></td>
                        <td><b>P/CNAO Job Title</b></td>
                        <td><b>P/CNAO Employment Status</b></td>
                        <td><b>P/CNAO Salary Grade</b></td>
                        <td><b>More than 1 P/CNAO</b></td>
                        <td><b>D/CNPC Position</b></td>
                        <td><b>D/CNPC Job Title</b></td>
                        <td><b>D/CNPC Employment Status</b></td>
                        <td><b>D/CNPC Salary Grade</b></td>
                        <td><b>More than 1 D/CNPC</b></td>
                        <td><b>Number of Technical Support Staff</b></td>
                        <td><b>Number of Administrative Support Staff</b></td>
                    </tr>
                </thead>
                @foreach ($NutriOffice as $nutriOffice)
                <tbody>
                    <tr>
                        <td><b>{{$nutriOffice->psgcs_code}}</b></td>
                        <td><b>{{$nutriOffice->geoLevel}}</b></td>
                        <td><b>{{$nutriOffice->regions_name}}</b></td>
                        <td><b>{{$nutriOffice->province_name}}</b></td>
                        <td><b>{{$nutriOffice->municipal_id}}</b></td>
                        <td><b>{{$nutriOffice->income_class}}</b></td>
                        <td>{{$nutriOffice->nutritionOffice}}</td>
                        <td>{{$nutriOffice->separateNutritionBudget}}</td>
                        <td>{{$nutriOffice->underWhatOffice}}</td>
                        <td>{{$nutriOffice->pcnao_position}}</td>
                        <td>{{$nutriOffice->pcnao_jobTitle}}</td>
                        <td>{{$nutriOffice->pcnao_emplStat}}</td>
                        <td>{{$nutriOffice->pcnao_salaryGrade}}</td>
                        <td>{{$nutriOffice->pcnao_moreThanOne}}</td>
                        <td>{{$nutriOffice->dcnpc_position}}</td>
                        <td>{{$nutriOffice->dcnpc_jobTitle}}</td>
                        <td>{{$nutriOffice->dcnpc_emplStat}}</td>
                        <td>{{$nutriOffice->dcnpc_salaryGrade}}</td>
                        <td>{{$nutriOffice->dcnpc_moreThanOne}}</td>
                        <td>{{$nutriOffice->numTechSupp}}</td>
                        <td>{{$nutriOffice->numAdminSupp}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection