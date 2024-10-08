<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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

  /* #myRadarChartB2bSummary,
  #myRadarChartB4bSummaryd6 {
    width: 100% !important;
    height: 400px !important;
  } */
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'B-4 Summary',
'activePage' => 'B4Summary',
'activeNav' => 'MELLPI PRO For LGU',
])



@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
    <div style="display:flex;align-items:center">
      <a href="{{route('B4Summary.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
      <h4 style="margin-top:18px;font-weight:bold">MELLPI Pro FORM B 2b: SUMMARY OF CHANGES IN THE NUTRITIONAL STATUS IN THE BARANGAY</h4>
    </div>

    @include('layouts.page_template.crud_alert_message')

    <div style="padding:25px">
      <form action="{{ route('B2bSummary.store') }}" method="POST" id="form">
        @csrf

        <input type="hidden" name="status" value="" id="status">
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <!-- header -->
        @include('layouts.page_template.location_header')

        <br>
        <br>
        <div>
          <!-- endtablehearder -->
          <div class="row  ">



          </div>
          <!-- <div class="row-12 d-flex" style="margin-top:20px">
            <div class="col">
              <canvas id="myRadarChartB2bSummary"></canvas>
            </div>
            <div class="col">
              <canvas id="myRadarChartB4bSummaryd6"></canvas>
            </div>
          </div> -->

          <div class="row">
            <canvas id="myRadarChartB2bSummary"></canvas>
          </div>
          <div>
          <canvas id="myRadarChartB4bSummaryd6"></canvas>
          </div>


          <div>
            <div class="row-12 d-flex" style="padding-left:10%;padding-right:10%;margin-top:50px">
              <label for="">Total Score: <span style="margin-left:10px"></span>  ([(</label>
              <p id="D1" class="bold" style="margin-left:5px;margin-right:5px;">{{$row->D1}}</p>
              <p id="D2" class="bold" style="margin-left:5px;margin-right:5px;">{{$row->D2}}</p>
              <p id="D3" class="bold" style="margin-left:5px;margin-right:5px;">{{$row->D3}}</p>
              <p id="D4" class="bold" style="margin-left:5px;margin-right:5px;">{{$row->D4}}</p>
              <p id="D5" class="bold" style="margin-left:5px;margin-right:5px;">{{$row->D5}}</p>
              <label> <span style="margin-left:10px"></span>  )   /5   ] *0.6 +  <span id="D6">{{$row->b2grandtotal}}</span> ) *0.4  =  <span id="grandTotal"></span></label>
              <input type="hidden" name="grand4Total" id="grand4Total">
            </div>

            <div class="row" style="padding-left:10%;padding-right:10%;margin-top:50px">
              <label for="">Major Findings (Use extra sheets if necessary):</label>
              <textarea name="remarks" style="width:100%;height:250px;border:1px solid gray;border-radius:8px;padding:8px" placeholder="Optional"></textarea>
            </div>

            <div class="row" style="padding-left:10%;padding-right:10%;margin-top:50px">
              <label for="">Recommendations (Use extra sheets if necessary)</label>
              <textarea name="remarks" style="width:100%;height:250px;border:1px solid gray;border-radius:8px;padding:8px" placeholder="Optional"></textarea>
            </div>
          </div>


          <div class="row" style="margin-top:30px;margin-right:8%;justify-content: flex-end">
            <!-- <button type="button" style="margin-right:6px" class="bold btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
              Save as Draft
            </button> -->
            <button type="button" class="bold btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              Save and Submit
            </button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {

    var phpData = JSON.parse('{!! addslashes(json_encode($row->grandtotal)) !!}');
    alert(phpData);

    B4SummaryFND1D5();
    B4SummaryFND6();
    B4SummaryFN();
    
  });
</script>

<!-- alert Modal -->
@include('Modal.Draft')

<!-- alert Modal -->
@include('Modal.Submit')


@endsection