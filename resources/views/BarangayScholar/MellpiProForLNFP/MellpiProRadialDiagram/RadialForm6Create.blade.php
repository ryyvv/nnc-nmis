<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<!-- <script src="https://cdn.lordicon.com/lordicon.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                <div style="display: flex; align-items:center;">
                        <a href="{{route('MellpiProRadialIndex.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <h4>CREATE MELLPI PRO FOR LNFP FORM 6 and 7:</h4>
                    </div>
                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                    <form action="{{ route('lnfpUpdateform7', $form6->id) }}" id="form" method="post">
                            @csrf

                            @if($form6)

                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("MELLPI PRO FORM 6a: RADIAL DIEAGRAM FOR PROVINCIAL NUTRITION ACTION OFFICER MONITORING")}}</h5>
                                <label for="period">For the period: </label>
                                <select name="forTheperiod" id="forTheperiod" class="inputHeaderPeriod">
                                    <option selected>{{ $form6->periodCovereda }}</option>
                                    <?php
                                    // $currentYear = date('Y');
                                    // $startYear = 1900;
                                    // $endYear = $currentYear;
                                    // for ($year = $startYear; $year <= $endYear; $year++) {
                                    //     echo "<option value=\"$year\">$year</option>";
                                    // }
                                    ?>
                                </select>
                            </center><br> -->

                            <div style="display:flex">
                            <div class="form-group col">
                                <label for="nameOf"> HEADER:<span style="color:red">*</span> </label>
                                <select id="header" class="form-control" name="header">
                                    <option value="" > Select </option>
                                    @foreach ($availableForms as $formKey => $formName)
                                        <option value="{{ $formKey }}" <?php echo $form6->header6 == $formKey ? 'selected':'' ?> >{{ $formName }}</option>
                                    @endforeach
                                </select>
                                @error('header')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            
                            </div>
                            <br />

                            <div class="formHeader">
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="nameOf">Name of PNAO:</label>
                                        <h5> {{$form6->nameofPnao}}</h5>
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">For the Period:</label>
                                        <h5>{{$form6->periodCovereda}}</h5>
                                        
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label for="address">Area of Assignment:</label>
                                        <h5>{{ $form6->address }}</h5>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="bday">Date of Monitoring:<span style="color:red">*</span></label>
                                        <h5>{{\Carbon\Carbon::parse($form6->dateMonitoring)->format('F j Y');}}</h5>
                                    </div>
                                </div>
                            </div>
                            <br />
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
                                                        <center>PERFORMANCE RATING(%)</center>
                                                    </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <input type="hidden" id="dataRating" value="{{$form5_rating}}">
                                            @foreach($form5_rating as $rating)
                                                <tr>
                                                    <td class="col-md-2">
                                                        <center><b>{{$rating->column1}}</b></center>
                                                    </td>
                                                    <td class="col-md-6">
                                                    <h6>{{ $rating->column2 }}</h6>
                                                    </td>
                                                    <td class="col-md-2"><span><center>100%</center></span></td>
                                                    <input type="hidden" class="form6InputA" id="rating{{ $rating->column1 }}" value="{{$rating->rate}}" >
                                                    
                                                    <!-- TOTAL -->

                                                    <td class="col-md-2" id="inputContainer">
                                                        <input type="text" class="form6Input user-input" data-id="rating{{ $rating->column1 }}" value="" readonly>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="col-md-2">&nbsp;</td>
                                                <td class="col-md-6">&nbsp;</td>
                                                <td class="col-md-2"><span><center><b>MELLPI PRO SCORE</b></center></span></td>
                                                <td class="col-md-2"><input type="text" class="form6Input" id="form6InputScore" value="" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br />
                            <br />
                            <div>
                            <center>
                                <h5 class="title">{{__("Diagram for Changes in Nutritional Status")}}</h5>
                            </center>
                            </div>



                            @php
                                // Ensure $ratingCount is available and valid
                                $ratingCount = $ratingCount ?? 0; // Default to 0 if not set

                                // Perform calculations for performance data
                                $performanceData = $graph_rating->map(function($rating) use ($ratingCount) {
                                    // Prevent division by zero
                                    $value = $rating->graph_rating > 0 ? ($rating->graph_rating / 5 )  * 100 : 0;
                                    return number_format($value, 1, '.', '');
                                })->toArray();

                                // Convert titles to an array
                                $labels = $graph_rating->pluck('title')->toArray();
                            @endphp

                            <div id="chart-data" 
                                 data-labels='@json($labels)' 
                                 data-performance='@json($performanceData)'>
                            </div>



                            <canvas id="myRadarChart"></canvas>
                           
                                       


                        <!-- </form> -->
                        <br />
                        
                            <div class="form-row">
                                <div class="col-md-12">
                                    <center>
                                        <h5 class="title">{{__("MELLPI PRO FORM 7b : DISCUSSION QUESTION FOR LEARNING AND ACTION")}}</h5>
                                    </center>

                                    <input type="hidden" name="lnfp_lgu_id" value="{{$form6->lnfp_lgu_id}}">
                                    <input type="hidden" value="" name="status" id="status">
                                    <input type="hidden" value="draft" name="formrequest" id="formrequest" />
                                    <input type="hidden" value="{{ $form6->id }}" name="id" id="id" />

                                    <table id="form7Discussion" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="col-md-2">
                                                    <center><b>Parameters</b></center>
                                                </td>
                                                <td class="col-md-2">
                                                    <center><b>Accomplishments of the PNAO</b></center>
                                                </td>
                                                <td class="col-md-2">
                                                    <center><b>Good practices related to the Accomplishments of the PNAO</b></center>
                                                </td>
                                                <td class="col-md-2">
                                                    <center><b>Issues and challenges encountered</b></center>
                                                </td>
                                                <td class="col-md-2">
                                                    <center><b>Actions taken by PNOA to address issues and challenges</b></center>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <!-- @foreach($form5_rating as $key => $rating)
                                            <tr>
                                                <td><b>{{ $rating->column2 }}</b></td>
                                                <td><textarea type="text" class="form7Input" name="Accomplish[{{ $key }}]" id="AccomplishA" placeholder="Enter your text here...">{{ $form6->accomplishmentA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPrac[{{ $key }}]" id="GoodPracA" placeholder="Enter your text here...">{{ $form6->goodPracA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="Issues[{{ $key }}]" id="IssuesA" placeholder="Enter your text here...">{{ $form6->issuesA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="Actions[{{ $key }}]" id="ActionsA" placeholder="Enter your text here...">{{ $form6->actionsA }}</textarea></td>
                                                <input type="hidden" name="seven_id[{{ $key }}]" value="{{ $rating->column2 }}" />
                                                <input type="hidden" name="seven_c_id[{{ $key }}]" />
                                            </tr>
                                        @endforeach -->

                                            <tr>
                                                <td><b>A. Coordination</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishA" id="AccomplishA" placeholder="Enter your text here...">{{ $form6->accomplishmentA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracA" id="GoodPracA" placeholder="Enter your text here...">{{ $form6->goodPracA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesA" id="IssuesA" placeholder="Enter your text here...">{{ $form6->issuesA }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsA" id="ActionsA" placeholder="Enter your text here...">{{ $form6->actionsA }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>B. Orientation, Advocacy and Promotion</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishB" id="AccomplishB" placeholder="Enter your text here...">{{ $form6->accomplishmentB }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracB" id="GoodPracB" placeholder="Enter your text here...">{{ $form6->goodPracB }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesB" id="IssuesB" placeholder="Enter your text here...">{{ $form6->issuesB }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsB" id="ActionsB" placeholder="Enter your text here...">{{ $form6->actionsB }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>C. Planning</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishC" id="AccomplishC" placeholder="Enter your text here...">{{ $form6->accomplishmentC }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracC" id="GoodPracC" placeholder="Enter your text here...">{{ $form6->goodPracC }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesC" id="IssuesC" placeholder="Enter your text here...">{{ $form6->issuesC }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsC" id="ActionsC" placeholder="Enter your text here...">{{ $form6->actionsC }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>D. Implementation</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishD" id="AccomplishD" placeholder="Enter your text here...">{{ $form6->accomplishmentD }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracD" id="GoodPracD" placeholder="Enter your text here...">{{ $form6->goodPracD }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesD" id="IssuesD" placeholder="Enter your text here...">{{ $form6->issuesD }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsD" id="ActionsD" placeholder="Enter your text here...">{{ $form6->actionsD }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>E. Monitoring and Evaluation</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishE" id="AccomplishE" placeholder="Enter your text here...">{{ $form6->accomplishmentE }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracE" id="GoodPracE" placeholder="Enter your text here...">{{ $form6->goodPracE }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesE" id="IssuesE" placeholder="Enter your text here...">{{ $form6->issuesE }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsE" id="ActionsE" placeholder="Enter your text here...">{{ $form6->actionsE }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>F. Resource Generation</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishF" id="AccomplishF" placeholder="Enter your text here...">{{ $form6->accomplishmentF }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracF" id="GoodPracF" placeholder="Enter your text here...">{{ $form6->goodPracF }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesF" id="IssuesF" placeholder="Enter your text here...">{{ $form6->issuesF }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsF" id="ActionsF" placeholder="Enter your text here...">{{ $form6->actionsF }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>G. Capacity Development</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishG" id="AccomplishG" placeholder="Enter your text here...">{{ $form6->accomplishmentG }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracG" id="GoodPracG" placeholder="Enter your text here...">{{ $form6->goodPracG }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesG" id="IssuesG" placeholder="Enter your text here...">{{ $form6->issuesG }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsG" id="ActionsG" placeholder="Enter your text here...">{{ $form6->actionsG }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>H. Documentation and record-keeping</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishH" id="AccomplishH" placeholder="Enter your text here...">{{ $form6->accomplishmentH }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracH" id="GoodPracH" placeholder="Enter your text here...">{{ $form6->goodPracH }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesH" id="IssuesH" placeholder="Enter your text here...">{{ $form6->issuesH }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsH" id="ActionsH" placeholder="Enter your text here...">{{ $form6->actionsH }}</textarea></td>
                                            </tr>
                                            <tr>
                                                <td><b>I. Selection and Recruitment of BNS</b></td>
                                                <td><textarea type="text" class="form7Input" name="AccomplishI" id="AccomplishI" placeholder="Enter your text here...">{{ $form6->accomplishmentI }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="GoodPracI" id="GoodPracI" placeholder="Enter your text here...">{{ $form6->goodPracI }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="IssuesI" id="IssuesI" placeholder="Enter your text here...">{{ $form6->issuesI }}</textarea></td>
                                                <td><textarea type="text" class="form7Input" name="ActionsI" id="ActionsI" placeholder="Enter your text here...">{{ $form6->actionsI }}</textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                                            Save as Draft
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Next Form
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                            @endif
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Retrieve the JSON data from the hidden input field
        const columnData = JSON.parse($('#dataRating').val());
   
        // Pass the data to the computePR function
        computePR(columnData);  
        radialDiagram();
    });
 
</script>

@include('Modal.Draft');
@include('Modal.Submit');



@endsection