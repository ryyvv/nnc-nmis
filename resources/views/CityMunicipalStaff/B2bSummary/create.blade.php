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
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'B-2b Summary',
'activePage' => 'B2bSummary',
'activeNav' => 'MELLPI PRO For LGU',
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
    <div style="display:flex;align-items:center">
      <a href="{{route('B2bSummary.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
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
          <div class="row-6"> 
            <table  width="100%" class="table table-striped">
              <thead style="background-color:#508D4E;">
                <tr>
                  <th scope="col" class="tableheader">Elements</th>
                  <th scope="col"  class="tableheader">Performance</th>
                  <th scope="col"  class="tableheader">Rating</th>
                </tr>
              </thead>
                <tbody style="padding-bottom:20px!important;">
                 <tr>
                  <td  colspan="3" class="bold">CHANGES IN THE NUTRITIONAL STATUS IN THE BARANGAY</td> 
                </tr>
                <tr>
                  <td>1. Prevalence of underweight 0-59 months children.</td>
                  <td style="text-align:center;" id="Pd2a">{{$row->rating6a}}</td>
                  <td style="text-align:center;" id="Prd2a">0.00</td>
                  <input type="hidden" name="Pd2aCR" id="Pd2aCR" >
                </tr>
                <tr> 
                  <td>2. Prevalence of stunted 0-59 months children.</td>
                  <td style="text-align:center;" id="Pd2b">{{$row->rating6b}}</td>
                  <td style="text-align:center;" id="Prd2b">0.00</td>
                  <input type="hidden" name="Pd2bCR" id="Pd2bCR" >
                </tr>
                <tr>
                  <td>3. Prevalence of wasted 0-59 months children</td>
                  <td style="text-align:center;" id="Pd2c">{{$row->rating6c}}</td>
                  <td style="text-align:center;" id="Prd2c">0.00</td>
                  <input type="hidden" name="Pd2cCR" id="Pd2cCR" >
                </tr>
                <tr>
                  <td>4. Prevalence of overweight and obesity among children 0-59 months children</td>
                  <td style="text-align:center;" id="Pd2d">{{$row->rating6d}}</td>
                  <td style="text-align:center;" id="Prd2d">0.00</td>
                  <input type="hidden" name="Pd2dCR" id="Pd2dCR" >
                </tr>
                <tr>
                  <td>5. Prevalence of wasted school-age children </td>
                  <td style="text-align:center;" id="Pd2e">{{$row->rating6e}}</td>
                  <td style="text-align:center;" id="Prd2e">0.00</td>
                  <input type="hidden" name="Pd2eCR" id="Pd2eCR" >
                </tr>
                <tr>
                  <td>6. Prevalence of overweight and obesity school-age children </td>
                  <td style="text-align:center;" id="Pd2f">{{$row->rating6f}}</td>
                  <td style="text-align:center;" id="Prd2f">0.00</td>
                  <input type="hidden" name="Pd2fCR" id="Pd2fCR" >
                </tr>

                <tr>
                  <td>7. Prevalence of nutritionally at-risk pregnant women </td>
                  <td style="text-align:center;" id="Pd2g">{{$row->rating6f}}</td>
                  <td style="text-align:center;" id="Prd2g">0.00</td>
                  <input type="hidden" name="Pd2gCR" id="Pd2gCR" >
                </tr>

                <tr>
                  <td>8. Operation Timbang Plus Coverage</td>
                  <td style="text-align:center;" id="Pd2h">{{$row->rating6h}}</td>
                  <td style="text-align:center;" id="Prd2h">0.00</td>
                  <input type="hidden" name="Pd2hCR" id="Pd2hCR" >
                </tr> 
                <tr>
                  <td > </td>
                    <td class="bold"  style="text-align:center;" >PERFORMANCE RATING</td>
                    <td class="bold"  style="text-align:center;"  id="Pd2TCR" >0.00</td> 
                    <input type="hidden" name="Pd2T2CR" id="Pd2T2CR" >
                  </tr>
                  <tr>
                    <td colspan="3" > </td> 
                  </tr>

              </tbody>
            </table>
          </div>
 
          <div> 
            
            <div class="row" style="margin-top:50px" >
            <canvas id="myRadarChartB2bSummary"></canvas>
            </div>

            <div class="row" style="padding-left:20%;padding-right:20%;margin-top:50px">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td scope="col" class="center bold" style="font-size:15px">ELEMENTS</td>
                    <td scope="col" class="center bold" style="font-size:15px">TARGET RATING</td>
                    <td scope="col" class="center bold" style="font-size:15px">PERFORMANCE RATING</td> 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="font-size:15px">1. Prevalence of underweight 0-59 months children </td>
                    <td style="font-size:15px" class="center" >100.00</td>
                    <td style="font-size:15px" class="center"  id="Prd2aa">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">2. Prevalence of stunted 0-59 months children </td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"  id="Prd2bb">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">3. Prevalence of wasted 0-59 months children</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"  id="Prd2cc">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">4. Prevalence of overweight and obesity among children 0-59 months children  </td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"  id="Prd2dd">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">5. Prevalence of wasted school-age children </td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center" id="Prd2ee" >0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">6. Prevalence of overweight and obesity school-age children </td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center" id="Prd2ff">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">7. Prevalence of nutritionally at-risk pregnant women</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center" id="Prd2gg" >0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">8. Operation Timbang Plus Coverage</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"id="Prd2hh" >0.00</td> 
                  </tr>
                  
                </tbody>
                <tfoot>
                  <tr>
                    <td style="font-size:15px" class="bold">TOTAL RATING</td>
                    <td style="font-size:15px" class="bold center"> 100.00</td>
                    <td style="font-size:15px" class="bold center" id="Pd2TCRR"> 0.00 </td> 
                    <input type="hidden" name="OverallTCRF" id="OverallTCRF" >
                  </tr> 
                </tfoot>
              </table>
            </div>

            <div class="row" style="padding-left:20%;padding-right:20%;margin-top:50px">
                <label for="">Remarks</label>
                <textarea name="remarks" style="width:100%;height:250px;border:1px solid gray;border-radius:8px;padding:8px" placeholder="Optional"  ></textarea>
            </div>
          </div>


          <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
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
      B2bSummaryFN(); 
    });
 
</script>

<!-- alert Modal -->
@include('Modal.Draft')

<!-- alert Modal -->
@include('Modal.Submit')


@endsection