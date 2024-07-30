<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">

<style>
    .divChart {
        width: 50%;
    }

    ;
</style>

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

                            @if($form6)

                            <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("MELLPI PRO FORM 6a: RADIAL DIEAGRAM FOR PROVINCIAL NUTRITION ACTION OFFICER MONITORING")}}</h5>
                                <label for="period">For the period: </label>
                                <select name="forTheperiod" id="forTheperiod" class="inputHeaderPeriod">
                                    <option selected>{{ $form6->forThePeriod }}</option>
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
                                        <input class="inputHeader" required type="text" name="nameOf" id="nameOf" value="{{ $form6->nameofPnao }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment: </label>
                                        <input class="inputHeader" required type="text" name="areaAssign" id="areaAssign" value="{{ $form6->provDeploy }}">
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
                                                <td colspan="2" class="col-md-8"><b>
                                                        <center>NUTRITION PROGRAM MANAGEMENT FUNCTIONS</center>
                                                    </b></td>
                                                <td class="col-md-2"><b>
                                                        <center>TARGET RATING</center>
                                                    </b></td>
                                                <td class="col-md-2"><b>
                                                        <center>PERFORMANCE RATING</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>A</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Coordination" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingA / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>B</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Orientation, Promotion and Advocacy" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingB / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>C</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Planning" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingC / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>D</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Implementation" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingD / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>E</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Monitoring and Evaluation" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingE / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>F</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Resource Generation" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingF / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>G</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Capacity Development" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingG / 5) * 100 }}%" readonly></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center>H</center>
                                                </td>
                                                <td class="col-md-6"><input type="text" class="form6InputS" value="Documentation and record-keeping" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="100%" readonly></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" value="{{ ($form6->ratingH / 5) * 100 }}%" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="divChart">
                                <canvas id="myRadarChart" width="400" height="400"></canvas>
                                <script>
                                    const ctx = document.getElementById('myRadarChart').getContext('2d');

                                    const data = {
                                        labels: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'],
                                        datasets: [{
                                                label: 'TARGET RATING',
                                                data: [100, 100, 100, 100, 100, 100, 100, 100],
                                                fill: true,
                                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                borderColor: 'rgb(54, 162, 235)',
                                                pointBackgroundColor: 'rgb(54, 162, 235)',
                                                pointBorderColor: '#fff',
                                                pointHoverBackgroundColor: '#fff',
                                                pointHoverBorderColor: 'rgb(54, 162, 235)'
                                            },
                                            {
                                                label: 'PERFORMANCE RATING',
                                                data: [
                                                    "{{ ($form6->ratingA / 5) * 100 }}",
                                                    "{{ ($form6->ratingB / 5) * 100 }}",
                                                    "{{ ($form6->ratingC / 5) * 100 }}",
                                                    "{{ ($form6->ratingD / 5) * 100 }}",
                                                    "{{ ($form6->ratingE / 5) * 100 }}",
                                                    "{{ ($form6->ratingF / 5) * 100 }}",
                                                    "{{ ($form6->ratingG / 5) * 100 }}",
                                                    "{{ ($form6->ratingH / 5) * 100 }}"
                                                ],
                                                fill: true,
                                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                borderColor: 'rgb(255, 99, 132)',
                                                pointBackgroundColor: 'rgb(255, 99, 132)',
                                                pointBorderColor: '#fff',
                                                pointHoverBackgroundColor: '#fff',
                                                pointHoverBorderColor: 'rgb(255, 99, 132)'
                                            }
                                        ]
                                    };

                                    const options = {
                                        scale: {
                                            angleLines: {
                                                display: true
                                            },
                                            ticks: {
                                                suggestedMin: 0,
                                                suggestedMax: 120,
                                                stepSize: 20,
                                                callback: function(value) {
                                                    return value + '%'; // Add percentage symbol to ticks
                                                }
                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: true,
                                                position: 'right'
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Provincial Nutrition Action Officer Monitoring Radial Diagram'
                                        }
                                    };

                                    const myRadarChart = new Chart(ctx, {
                                        type: 'radar',
                                        data: data,
                                        options: options
                                    });
                                </script>
                            </div>
                        </form>
                        <form action="{{ route('lnfpUpdateform7', $form6->form5_id) }}" id="lnfp-form7-edit" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <center>
                                        <h5 class="title">{{__("MELLPI PRO FORM 7b : DISCUSSION QUESTION FOR LEARNING AND ACTION")}}</h5>
                                    </center>
                                    <table id="form7Discussion" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td>Parameters</td>
                                                <td>Accomplishments of the PNAO</td>
                                                <td>Good practices related to the Accomplishments of the PNAO</td>
                                                <td>Issues and challenges encountered</td>
                                                <td>Actions taken by PNOA to address issues and challenges</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>A. Coordination</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishA" id="AccomplishA">{{ $form6->accomplishmentA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracA" id="GoodPracA">{{ $form6->goodPracA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesA" id="IssuesA">{{ $form6->issuesA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsA" id="ActionsA">{{ $form6->actionsA }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>B. Orientation, Advocacy and Promotion</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishB" id="AccomplishB">{{ $form6->accomplishmentB }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracB" id="GoodPracB">{{ $form6->goodPracB }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesB" id="IssuesB">{{ $form6->issuesB }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsB" id="ActionsB">{{ $form6->actionsB }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>C. Planning</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishC" id="AccomplishC">{{ $form6->accomplishmentC }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracC" id="GoodPracC">{{ $form6->goodPracC }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesC" id="IssuesC">{{ $form6->issuesC }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsC" id="ActionsC">{{ $form6->actionsC }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>D. Implementation</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishD" id="AccomplishD">{{ $form6->accomplishmentD }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracD" id="GoodPracD">{{ $form6->goodPracD }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesD" id="IssuesD">{{ $form6->issuesD }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsD" id="ActionsD">{{ $form6->actionsD }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>E. Monitoring and Evaluation</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishE" id="AccomplishE">{{ $form6->accomplishmentE }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracE" id="GoodPracE">{{ $form6->goodPracE }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesE" id="IssuesE">{{ $form6->issuesE }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsE" id="ActionsE">{{ $form6->actionsE }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>F. Resource Generation</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishF" id="AccomplishF">{{ $form6->accomplishmentF }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracF" id="GoodPracF">{{ $form6->goodPracF }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesF" id="IssuesF">{{ $form6->issuesF }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsF" id="ActionsF">{{ $form6->actionsF }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>G. Capacity Development</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishG" id="AccomplishG">{{ $form6->accomplishmentG }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracG" id="GoodPracG">{{ $form6->goodPracG }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesG" id="IssuesG">{{ $form6->issuesG }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsG" id="ActionsG">{{ $form6->actionsG }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>H. Documentation and record-keeping</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishH" id="AccomplishH">{{ $form6->accomplishmentH }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracH" id="GoodPracH">{{ $form6->goodPracH }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesH" id="IssuesH">{{ $form6->issuesH }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsH" id="ActionsH">{{ $form6->actionsH }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td>I. Selection and Recruitment of BNS</td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishI" id="AccomplishI">{{ $form6->accomplishmentI }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracI" id="GoodPracI">{{ $form6->goodPracI }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesI" id="IssuesI">{{ $form6->issuesI }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsI" id="ActionsI">{{ $form6->actionsI }}</textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalUpdate">Save</button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Are you sure you want to submit DISCUSSION QUESTION FOR LEARNING AND ACTION?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" id="lgu-draft" class="btn btn-primary" name="action" value="updateResponse">Yes</button>
                                        </div>
                                    </div>
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