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
'namePage' => 'B-1b Summary',
'activePage' => 'B1bSummary',
'activeNav' => 'MELLPI PRO For LGU',
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
    <div style="display:flex;align-items:center">
      <a href="{{route('B1bSummary.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
      <h4 style="margin-top:18px;font-weight:bold">MELLPI Pro FORM B 1b: SUMMARY OF BARANGAY NUTRITION MONITORING</h4>
    </div>

    @include('layouts.page_template.crud_alert_message')

    <div style="padding:25px">
      <form action="{{ route('B1bSummary.store') }}" method="POST" id="form">
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
                  <td  colspan="3" class="bold">DIMENSION 1: VISSION AND  MISSION</td> 
                </tr>
                <tr>
                  <td  >1a. Presence and knowledge of vision-mission statements</td>
                  <td style="text-align:center;" id="Pd1a">{{$row->rating1a}}</td>
                  <td style="text-align:center;" id="Prd1a">0.00</td>
                  <input type="hidden" name="Pd1aCR" id="Pd1aCR" >
                </tr>
                <tr> 
                  <td  >1b. Presence of nutrition-related concerns in the barangay development plan of mission statement</td>
                  <td style="text-align:center;" id="Pd1b">{{$row->rating1b}}</td>
                  <td style="text-align:center;" id="Prd1b">0.00</td>
                  <input type="hidden" name="Pd1bCR" id="Pd1bCR" >
                </tr>
                <tr>
                  <td  >1c. Presence of nutrition-related concerns in the Annual Investment Program (AIP)</td>
                  <td style="text-align:center;" id="Pd1c">{{$row->rating1c}}</td>
                  <td style="text-align:center;" id="Prd1c">0.00</td>
                  <input type="hidden" name="Pd1cCR" id="Pd1cCR" >
                </tr>
                <tr>
                  <td > </td>
                    <td class="bold"  style="text-align:center;" >PERFORMANCE RATING</td>
                    <td class="bold"  style="text-align:center;"  id="Pd1TCR" >$3.50</td> 
                  <input type="hidden" name="Pd1T2CR" id="Pd1T2CR" >
                  </tr>
                  <tr>
                    <td colspan="3"></td> 
                  </tr>
               </tbody>
 

                <tbody style="padding-bottom:20px!important;">
                 <tr>
                  <td  colspan="3" class="bold">DIMENSION 2: NUTRITION LAWS AND POLICIES</td> 
                </tr>
                <tr>
                  <td>2a. Adoption, implementation and monitoring of local nutrition plan.</td>
                  <td style="text-align:center;" id="Pd2a">{{$row->rating2a}}</td>
                  <td style="text-align:center;" id="Prd2a">0.00</td>
                  <input type="hidden" name="Pd2aCR" id="Pd2aCR" >
                </tr>
                <tr> 
                  <td>2b. RA 11148 Kalusugan at Nutrisyon ng Mag-Nanay Act of 2018.</td>
                  <td style="text-align:center;" id="Pd2b">{{$row->rating2b}}</td>
                  <td style="text-align:center;" id="Prd2b">0.00</td>
                  <input type="hidden" name="Pd2bCR" id="Pd2bCR" >
                </tr>
                <tr>
                  <td>2c. RA 11037 Masustansyang Pagkain para sa Batang Pilipino</td>
                  <td style="text-align:center;" id="Pd2c">{{$row->rating2c}}</td>
                  <td style="text-align:center;" id="Prd2c">0.00</td>
                  <input type="hidden" name="Pd2cCR" id="Pd2cCR" >
                </tr>
                <tr>
                  <td>2d. EO 51 National Code of Marketing of Breastfeeding Substitutes, Breastmilk Supplements and related products</td>
                  <td style="text-align:center;" id="Pd2d">{{$row->rating2d}}</td>
                  <td style="text-align:center;" id="Prd2d">0.00</td>
                  <input type="hidden" name="Pd2dCR" id="Pd2dCR" >
                </tr>
                <tr>
                  <td>2e. RA 10028 Expanded Breastfeeding Promotion Act </td>
                  <td style="text-align:center;" id="Pd2e">{{$row->rating2e}}</td>
                  <td style="text-align:center;" id="Prd2e">0.00</td>
                  <input type="hidden" name="Pd2eCR" id="Pd2eCR" >
                </tr>
                <tr>
                  <td>2f. RA 8172 An Act for Salt Iodization Nationwide</td>
                  <td style="text-align:center;" id="Pd2f">{{$row->rating2f}}</td>
                  <td style="text-align:center;" id="Prd2f">0.00</td>
                  <input type="hidden" name="Pd2fCR" id="Pd2fCR" >
                </tr>

                <tr>
                  <td>2g. RA 8976 Philippine Food Fortification Act</td>
                  <td style="text-align:center;" id="Pd2g">{{$row->rating2f}}</td>
                  <td style="text-align:center;" id="Prd2g">0.00</td>
                  <input type="hidden" name="Pd2gCR" id="Pd2gCR" >
                </tr>

                <tr>
                  <td>2h. NNC GB Resolution No. 1 S. 2017 Approving and Adopting the Philippine Plan of Action 2017-2022</td>
                  <td style="text-align:center;" id="Pd2h">{{$row->rating2h}}</td>
                  <td style="text-align:center;" id="Prd2h">0.00</td>
                  <input type="hidden" name="Pd2hCR" id="Pd2hCR" >
                </tr>
                <tr>
                  <td>2i. NNC GB Resolutions Nos.<BR>                                                             
                       <span style="margin-left:35px"> 1)</span> 3 S.2012: Approving the Guidelines on the Fabrication, Verification, and Maintenance of Wooden Height Boards  <BR>    
                       <span style="margin-left:35px">2)</span>3 S.2018: Approving the Guidelines on the Selection of Non-Wood Height and Length Measuring Tool</td>
                  <td style="text-align:center;" id="Pd2i">{{$row->rating2i}}</td>
                  <td style="text-align:center;" id="Prd2i">0.00</td>
                  <input type="hidden" name="Pd2iCR" id="Pd2iCR" >
                </tr>
                <tr>
                  <td>2j. NNC GB Resolution No. 2 S. 2012 Approving the Revised Implementing Guidelines on OPT Plus</td>
                  <td style="text-align:center;" id="Pd2j">{{$row->rating2j}}</td>
                  <td style="text-align:center;" id="Prd2j">0.00</td>
                  <input type="hidden" name="Pd2jCR" id="Pd2jCR" >
                </tr>
                <tr>
                  <td>2k. NNC Governing Board Resolution No.6 series of 2012: Adoption of the 2012 Nutritional Guidelines for Filipinos</td>
                  <td style="text-align:center;" id="Pd2k">{{$row->rating2k}}</td>
                  <td style="text-align:center;" id="Prd2k">0.00</td>
                  <input type="hidden" name="Pd2kCR" id="Pd2kCR" >
                </tr>
                <tr>
                  <td>2l. NNC Governing Board Resolution No. 2 series of 2009: Adopting the National Policy on Nutrition Management in Emergencies and Disasters</td>
                  <td style="text-align:center;" id="Pd2l">{{$row->rating2l}}</td>
                  <td style="text-align:center;" id="Prd2l">0.00</td>
                  <input type="hidden" name="Pd2lCR" id="Pd2lCR" >
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


              <tbody style="padding-bottom:20px!important;">
                 <tr>
                  <td  colspan="3" class="bold">DIMENSION 3: GOVERNANCE AND ORGANIZATIONAL STRUCTURE</td> 
                </tr>
                <tr>
                  <td  >3a. Presence of Barangay Nutrition Committee</td>
                  <td style="text-align:center;" id="Pd3a">{{$row->rating3a}}</td>
                  <td style="text-align:center;" id="Prd3a">0.00</td>
                  <input type="hidden" name="Pd3aCR" id="Pd3aCR" >
                </tr>
                <tr> 
                  <td  >3b. Presence of Nutrition Office and Personnel</td>
                  <td style="text-align:center;" id="Pd3b">{{$row->rating3b}}</td>
                  <td style="text-align:center;" id="Prd3b">0.00</td>
                  <input type="hidden" name="Pd3bCR" id="Pd3bCR" >
                </tr>
                <tr>
                  <td  >3c. Decision-making and leadership of the Barangay Nutrition Committee</td>
                  <td style="text-align:center;" id="Pd3c">{{$row->rating3c}}</td>
                  <td style="text-align:center;" id="Prd3c">0.00</td>
                  <input type="hidden" name="Pd3cCR" id="Pd3cCR" >
                </tr>
                <tr>
                  <td > </td>
                    <td class="bold"  style="text-align:center;" >PERFORMANCE RATING</td>
                    <td class="bold"  style="text-align:center;"  id="Pd3TCR" >0.00</td> 
                    <input type="hidden" name="Pd3T2CR" id="Pd3T2CR" >
                  </tr>
                  <tr>
                    <td colspan="3" > </td> 
                  </tr>
               </tbody>


              <tbody style="padding-bottom:20px!important;">
                 <tr>
                  <td  colspan="3" class="bold">DIMENSION 4: LOCAL NUTRITION COMMITTEE MANAGEMENT FUNCTIONS</td> 
                </tr>
                <tr>
                  <td>4a. Nutrition Assessment</td>
                  <td style="text-align:center;" id="Pd4a">{{$row->rating4a}}</td>
                  <td style="text-align:center;" id="Prd4a">0.00</td>
                  <input type="hidden" name="Pd4aCR" id="Pd4aCR" >
                </tr>
                <tr> 
                  <td>4b. Planning</td>
                  <td style="text-align:center;" id="Pd4b">{{$row->rating4b}}</td>
                  <td style="text-align:center;" id="Prd4b">0.00</td>
                  <input type="hidden" name="Pd4bCR" id="Pd4bCR" >
                </tr>
                <tr>
                  <td>4c. Decision-making and leadership of the Barangay Nutrition Committee</td>
                  <td style="text-align:center;" id="Pd4c">{{$row->rating4c}}</td>
                  <td style="text-align:center;" id="Prd4c">0.00</td>
                  <input type="hidden" name="Pd4cCR" id="Pd4cCR" >
                </tr>
                <tr>
                  <td>4d. Service Delivery</td>
                  <td style="text-align:center;" id="Pd4d">{{$row->rating4d}}</td>
                  <td style="text-align:center;" id="Prd4d">0.00</td>
                  <input type="hidden" name="Pd4dCR" id="Pd4dCR" >
                </tr>
                <tr>
                  <td>4e. Monitoring and Evaluation</td>
                  <td style="text-align:center;" id="Pd4e">{{$row->rating4e}}</td>
                  <td style="text-align:center;" id="Prd4e">0.00</td>
                  <input type="hidden" name="Pd4eCR" id="Pd4eCR" >
                </tr>
                <tr>
                  <td>4f. Capacity Building</td>
                  <td style="text-align:center;" id="Pd4f">{{$row->rating4f}}</td>
                  <td style="text-align:center;" id="Prd4f">0.00</td>
                  <input type="hidden" name="Pd4fCR" id="Pd4fCR" >
                </tr>
                <tr>
                  <td > </td>
                    <td class="bold"  style="text-align:center;" >PERFORMANCE RATING</td>
                    <td class="bold"  style="text-align:center;"  id="Pd4TCR" >0.00</td> 
                    <input type="hidden" name="Pd4T2CR" id="Pd4T2CR" >
                  </tr>
                  <tr>
                    <td colspan="3" > </td> 
                  </tr>
               </tbody>

               <tbody style="padding-bottom:20px!important;">
                 <tr>
                  <td  colspan="3" class="bold">DIMENSION 5: NUTRITION INTERVENTIONS/SERVICES</td> 
                </tr>
                <tr>
                  <td>5a. Infant and Young Child Feeding</td>
                  <td style="text-align:center;" id="Pd5a">{{$row->rating5aa}}</td>
                  <td style="text-align:center;" id="Prd5a">0.00</td>
                  <input type="hidden" name="Pd5aCR" id="Pd5aCR" >
                </tr>
                <tr> 
                  <td>5b. Philippine Integrated Management of Acute Malnutrition</td>
                  <td style="text-align:center;" id="Pd5b">{{$row->rating5b}}</td>
                  <td style="text-align:center;" id="Prd5b">0.00</td>
                  <input type="hidden" name="Pd5bCR" id="Pd5bCR" >
                </tr>
                <tr>
                  <td>5c. National Dietary Supplementation Program</td>
                  <td style="text-align:center;" id="Pd5c">{{$row->rating5ca}}</td>
                  <td style="text-align:center;" id="Prd5c">0.00</td>
                  <input type="hidden" name="Pd5cCR" id="Pd5cCR" >
                </tr>
                <tr>
                  <td>5d. National Nutrition Promotion Program for Behavior Change</td>
                  <td style="text-align:center;" id="Pd5d">{{$row->rating5da}}</td>
                  <td style="text-align:center;" id="Prd5d">0.00</td>
                  <input type="hidden" name="Pd5dCR" id="Pd5dCR" >
                </tr>
                <tr>
                  <td>5e. Micronutrient Supplementation</td>
                  <td style="text-align:center;" id="Pd5e">{{$row->rating5ea}}</td>
                  <td style="text-align:center;" id="Prd5e">0.00</td>
                  <input type="hidden" name="Pd5eCR" id="Pd5eCR" >
                </tr>
                <tr>
                  <td>5f. Mandatory Food Fortification</td>
                  <td style="text-align:center;" id="Pd5f">{{$row->rating5fa}}</td>
                  <td style="text-align:center;" id="Prd5f">0.00</td>
                  <input type="hidden" name="Pd5fCR" id="Pd5fCR" >
                </tr>
                <tr>
                  <td>5g. Nutrition in Emergencies Program</td>
                  <td style="text-align:center;" id="Pd5g">{{$row->rating5ga}}</td>
                  <td style="text-align:center;" id="Prd5g">0.00</td>
                  <input type="hidden" name="Pd5gCR" id="Pd5gCR" >
                </tr>
                <tr>
                  <td>5h. Overweight and Obesity Management and Prevention Program</td>
                  <td style="text-align:center;" id="Pd5h">{{$row->rating5ha}}</td>
                  <td style="text-align:center;" id="Prd5h">0.00</td>
                  <input type="hidden" name="Pd5gCR" id="Pd5gCR" >
                </tr>
                <tr>
                  <td>5i. Nutrition-Sensitive Programs</td>
                  <td style="text-align:center;" id="Pd5i">{{$row->rating5ia}}</td>
                  <td style="text-align:center;" id="Prd5i">0.00</td>
                  <input type="hidden" name="Pd5iCR" id="Pd5iCR" >
                </tr>
                <tr>
                  <td > </td>
                    <td class="bold"  style="text-align:center;" >PERFORMANCE RATING</td>
                    <td class="bold"  style="text-align:center;"  id="Pd5TCR" >0.00</td> 
                    <input type="hidden" name="Pd5T2CR" id="Pd5T2CR" >
                  </tr>
                  <tr>
                    <td colspan="3" > </td> 
                  </tr>
               </tbody>
              
            </table>
          </div>
 
          <div> 
            
            <div class="row" style="margin-top:50px" >
            <canvas id="radialChart"></canvas>
            </div>

            <div class="row" style="padding-left:20%;padding-right:20%;margin-top:20px">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td scope="col" class="center bold" style="font-size:15px">DIMENSION</td>
                    <td scope="col" class="center bold" style="font-size:15px">TARGET RATING</td>
                    <td scope="col" class="center bold" style="font-size:15px">PERFORMANCE RATING</td> 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="font-size:15px">1. Vision and Mission </td>
                    <td style="font-size:15px" class="center" >100.00</td>
                    <td style="font-size:15px" class="center"  id="d1Totalrating">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">2. Nutrition Laws and Policies</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"  id="d2Totalrating">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">3. Governance and Organizational Structure</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"  id="d3Totalrating">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">4. Local Nutrition Committee Management Functions</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center"  id="d4Totalrating">0.00</td> 
                  </tr>
                  <tr>
                    <td style="font-size:15px">5. Nutrition Intervention/Services</td>
                    <td style="font-size:15px" class="center">100.00</td>
                    <td style="font-size:15px" class="center" id="d5Totalrating" >0.00</td> 
                  </tr>
                  
                </tbody>
                <tfoot>
                  <tr>
                    <td style="font-size:15px" class="bold">TOTAL RATING</td>
                    <td style="font-size:15px" class="bold center"> 100.00</td>
                    <td style="font-size:15px" class="bold center" id="OverallTCR"> 0.00 </td> 
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
      B1bSummaryFN(); 
    });
 
</script>

<!-- alert Modal -->
@include('Modal.Draft')

<!-- alert Modal -->
@include('Modal.Submit')


@endsection