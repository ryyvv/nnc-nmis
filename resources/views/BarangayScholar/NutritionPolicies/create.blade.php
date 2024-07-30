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
'namePage' => 'Nutrition Policies',
'activePage' => 'NutritionPolicies',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content') 
<div class="content" style="margin-top:50px;padding:2%">
<div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
   
        <div style="display:flex;align-items:center">
            <a href="{{route('nutritionpolicies.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        </div>

        @include('layouts.page_template.crud_alert_message')
   
        <div style="padding:25px">
            <form action="{{ route('nutritionpolicies.store') }}" method="POST" id="lgu-profile-form">
                @csrf

                <input type="hidden" name="status" id="status">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                
                <!-- header -->
                @include('layouts.page_template.location_header')

                <br>
                <br>
                <div>
                    <!-- endtablehearder -->
                    <div class="row table-responsive" style="display:flex;padding:10px;">
                    <table class="table table-striped table-hover">
                        <thead style="background-color:#508D4E;"> 
                            <th>&nbsp;</th>
                            <th class="tableheader text-center"><b>Elements</b></th>
                            <th colspan="5"class="tableheader text-center"><b>Performance Level<b></th>
                            <th class="tableheader text-center"><b>Document Source</b></th> 
                            <th class="tableheader text-center"><b>Rating</b></th>
                            <th class="tableheader  text-center"><b>Remarks</b></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td  class="bold text-center">1</td>
                                <td  class="bold text-center">2</td>
                                <td  class="bold text-center">3</td>
                                <td  class="bold text-center">4</td>
                                <td  class="bold text-center" >5</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>2a</td>
                                <td>Adoption, implementation and monitoring of Barangay Nutrition Action Plan</td>
                                <td>Barangay Nutrition Action Plan formulated</td>
                                <td>The barangay passed a resolution adopting the Barangay Nutrition Action Plan</td>
                                <td>The barangay passed a resolution adopting the Barangay Nutrition Action Plans and allocating funds thereof</td>
                                <td>The PAPs in the Barangay Nutrition Action Plan are implemented and accomplishments are reported during BNC meetings once a year</td>
                                <td>The PAPs in the Barangay Nutrition Action Plan are implemented and accomplishments are reported during BNC meetings at least twice a year</td>
                                <td>Resolutions Barangay Nutrition Action Plan Approved Annual Budget PPAN Accomplishment Report Minutes of meeting</td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2a">
                                        <option>Select</option>
                                        <option value="">Choose...</option> 
                                        <option value="1" <?php echo ( old('rating2a') == '1' ? 'selected':'' )  ?> >1</option>
                                        <option value="2"  <?php echo ( old('rating2a') == '2' ? 'selected':'' )  ?> >2</option>
                                        <option value="3"  <?php echo ( old('rating2a') == '3' ? 'selected':'' )  ?> >3</option>
                                        <option value="4"  <?php echo ( old('rating2a') == '4' ? 'selected':'' )  ?> >4</option>
                                        <option value="4"  <?php echo ( old('rating2a') == '5' ? 'selected':'' )  ?> >5</option>
                                    </select>
                                </td>
                                <td>
                                <textarea name="remarks2a" class="form-control" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>2b</td>
                                <td>Republic Act 11037
                                    Masustansyang
                                    Pagkain Para sa
                                    Batang Pilipino
                                </td>
                                <td>The barangay
                                        maintains a printed/
                                        electronic copy of RA 11037
                                </td>
                                <td>  The law was discussed in one of the Barangay
                                        Nutrition Committee
                                        meetings within one year after it was enacted 
                                </td>
                                <td>The barangay maintained a copy of the resolution in the barangay hall</td>
                                <td>
                                The barangay
                                        implemented activities to disseminate provisions of the law to the general
                                        public
                                </td>
                                <td> Copy of the law
                                        Minutes of meetings
                                        Resolution
                                        Documentation of
                                        posting and/or
                                        dissemination
                                        activities
                                </td>
                                <td>Copy of the law Minutes of meetings Resolution
                                Documentation of posting and/or dissemination activities;</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating2b">
                                        <option>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                </select>
                                </td>
                                <td><textarea name="remarks2b" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td>2c</td>
                                <td>Presence of nutrition-related concerns in the
                                    Annual Investment Program
                                </td>
                                <td>
                                Republic Act 11037 Masustansyang Pagkain Para
                                        sa Batang Pilipino
                                </td>
                                <td>
                                The barangay has a
                                        resolution/ordinance/Executive Order and/or a line item in the Approved Annual
                                        Budget on EO 51 - related concerns
                                </td>
                                <td>The barangay conducted activities to promote
                                        compliance to EO 51
                                </td>
                                <td>The barangay conducted activities to promote
                                        and monitor compliance to EO 51 and reporting of results during BNC
                                        meetings
                                </td>
                                <td>Copy of the law Resolution/ Ordinance Barangay
                                        Nutrition Action Plan Approved Annual Budget Documentation of promotion and
                                        monitoring
                                </td>
                                <td>Annual Investment Program</td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating2c">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </td>
                                <td><textarea name="remarks2c" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td>2d</td>
                                <td>Adoption,
                                    implementation and monitoring of national/ sectoral
                                    nutrition policies
                                    <br><br>
                                    Executive Order 51: National Code of Marketing Breastmilk Substitutes, Breastmilk
                                    Supplements and Other Related Products
                                </td>
                                <td>
                                The barangay
                                        maintains a printed/
                                        electronic copy of EO 51
                                </td>
                                <td>
                                The barangay has a
                                        resolution/ ordinance/
                                        Executive Order and/or a line item in the Approved Annual Budget on EO 51 -
                                        related concerns
                                </td>
                                <td>The barangay
                                        conducted activities to promote compliance to EO 51
                                </td>
                                <td>The barangay
                                        conducted activities
                                        to monitor
                                        compliance to EO 51
                                </td>
                                <td>The barangay conducted activities to promote and monitor compliance to EO 51 and
                                        reporting of results during BNC meetings
                                </td>
                                <td>
                                    Copy of the law
                                    Resolution/ Ordinance
                                    Barangay Nutrition
                                    Action Plan
                                    Approved Annual
                                    Budget
                                    Documentation of
                                    promotion and monitoring
                                </td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating2d">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </td>
                                <td><textarea name="remarks2d" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td>2e</td>
                                <td>Republic Act 10028:
                                    Expanded
                                    Breastfeeding
                                    Promotion Act of
                                    2009
                                    <br><br>
                                    DILG Memorandum
                                    Circular 2011-54
                                    Implementation and
                                    Monitoring of the
                                    National
                                    Breastfeeding Policy
                                </td>
                                <td>
                                The barangay
                                        maintains a printed/
                                        electronic copy of RA 10028 and/or DILG MC 2011-54
                                </td>
                                <td>The barangay has a resolution/ ordinance and/or budget in the Approved Annual
                                        Budget on RA 10028 - related concerns
                                </td>
                                <td>The barangay
                                        conducted activities to promote
                                        compliance to the law
                                </td>
                                <td>The barangay
                                        conducted activities to monitor compliance to RA 10028
                                </td>
                                <td>
                                The barangay conducted
                                        activities to monitor
                                        compliance to RA 10028 and maintains an updated masterlist of establishments/
                                        offices with lactation stations
                                </td>
                                <td>
                                    Copy of the law
                                    Resolution/ Ordinance
                                    Barangay Nutrition
                                    Action Plan
                                    Approved Annual
                                    Budget
                                    Documentation of
                                    promotion and
                                    monitoring
                                    Masterlist of
                                    establishments/
                                    offices with
                                    lactation stations
                                </td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2e">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </td>
                                <td> <textarea class="form-control" name="remarks2e"></textarea></td>
                            </tr>
                            <tr>
                                <td>2f</td>
                                <td>Republic Act 8172: An Act for Salt Iodization Nationwide (ASIN Law)</td>
                                <td>The barangay
                                        maintains a printed/
                                        electronic copy of RA 8172
                                </td>
                                <td>The barangay has a
                                        resolution/ ordinance
                                        and/or budget in the Approved Annual Budget on RA 8172 - related
                                        concerns
                                </td>
                                <td>
                                The barangay
                                        conducted activities to promote compliance to the law
                                </td>
                                <td> The barangay
                                        conducted activities to monitor compliance to RA 8172
                                </td>
                                <td>
                                The barangay conducted activities to monitor
                                        compliance to RA 8172 and maintains an updated masterlist of retail stores
                                        selling iodized salt
                                </td>
                                <td>
                                    Copy of the law
                                    Resolution/ Ordinance
                                    Barangay Nutrition
                                    Action Plan
                                    Documentation of
                                    promotion and
                                    monitoring
                                    Masterlist of
                                    retail stores selling
                                    iodized salt
                                </td>
                                <td>
                                <select id="loadProvince1" class="form-control" name="rating2f">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                            </select>
                                </td>
                                <td><textarea class="form-control" name="remarks2f"></textarea></td>
                                
                            </tr>
                            <tr>
                                <td>2g</td>
                                <td>Republic Act 8976:
                                    Philippine Food
                                    Fortification Act</td>
                                <td>The barangay
                                        maintains a printed/
                                        electronic copy of RA 8976
                                </td>
                                <td>The barangay has a resolution/ ordinance and/or budget in the Approved Annual
                                        Budget on RA 8976 - related concerns
                                </td>
                                <td>
                                The barangay
                                        conducted activities to promote compliance to the law
                                </td>
                                <td>The barangay
                                        conducted activities to monitor compliance to RA 8976</td>
                                <td>  The barangay conducted
                                        activities to monitor
                                        compliance to RA 8976 and maintains an updated masterlist of retail stores
                                        selling fortified foods</td>
                                <td>Copy of the law
                                Resolution/ Ordinance
                                Barangay Nutrition
                                Action Plan
                                Approved Annual Budget
                                Documentation of
                                promotion and
                                monitoring
                                Masterlist of
                                retail stores selling
                                fortified foods
                                </td>
                                <td><select id="loadProvince1" class="form-control" name="rating2g">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select></td>
                                <td><textarea class="form-control" name="remarks2g"></textarea></td>
                            </tr>
                            <tr>
                                <td>2h</td>
                                <td>
                                    NNC Governing
                                    Board Resolution
                                    No.1 series of 2017:
                                    Approving and
                                    Adopting the
                                    Philippine Plan of
                                    Action for Nutrition
                                    2017-2022
                                    <br><br>
                                    DILG MC 2018-42
                                    Adoption and
                                    Implementation of
                                    PPAN 2017-2022
                                </td>
                                <td>The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution No. 1 S. 2017 and/or DILG MC 2018-42
                                </td>
                                <td>The activities in the
                                        Barangay Nutrition
                                        Action Plan are
                                        aligned with the
                                        priorities of the
                                        PPAN 2017-2022
                                </td>
                                <td>
                                The activities in the Barangay Nutrition Action Plan are aligned with the
                                        priorities of the PPAN 2017-2022 are allocated with budget based on the approved
                                        annual budget
                                </td>
                                <td>
                                The BNC monitors implementation of the PPAN priorities in the Barangay Nutrition
                                        Action Plan
                                </td>
                                <td>
                                The BNC discuss the result of monitoring and identify action lines to improve
                                        implementation of the PPAN priorities
                                </td>
                                <td> Resolutions
                                Ordinances
                                Barangay Nutrition
                                Action Plan
                                Approved Annual
                                Budget
                                Minutes of meeting
                                Minutes of meeting
                                Accomplishment/
                                Documentation
                                reports
                                </td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2h">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </td>
                                <td><textarea class="form-control" name="remarks2h"></textarea></td>
                            </tr>
                            <tr>
                                <td>2i</td>
                                <td>
                                    NNC Governing
                                    Board Resolutions
                                    Nos. #1 3 S.2012:
                                    Approving the
                                    Guidelines on the
                                    Fabrication,
                                    Verification, and
                                    Maintenance of
                                    Wooden Height
                                    Boards #2 3 S.2018:
                                    Approving the
                                    Guidelines on the
                                    Selection of
                                    Non-Wood Height
                                    and Length
                                    Measuring Tool
                                </td>
                                <td>
                                The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution
                                        No. 3 S. 2012 and No. 3 S. 2018
                                </td>
                                <td>
                                The barangay has any type of height and length measuring tools available in the
                                        barangay
                                </td>
                                <td>
                                The barangay uses the type of height and length measuring tools of wooden/
                                        non-wood material prescribed in the guidelines 
                                </td>
                                <td>
                                The barangay uses verified height and length measuring tools of wooden/ non-wood
                                        material prescribed in the guidelines
                                </td>
                                <td>
                                The barangay uses verified height and length measuring tools of wooden/ non-wood
                                        material as prescribed in the guidelines and allocates budget for maintenance/
                                        replacement of height and length measuirng tools as necessary
                                </td>
                                <td>
                                    Approved Annual
                                    Budget
                                    Local Nutrition
                                    Action Plan
                                    OPT Plus Report
                                </td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2i">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </td>
                                <td><textarea class="form-control" name="remarks2i"></textarea></td>
                            </tr>
                            <tr>
                                <td>2j</td>
                                <td>
                                    NNC Governing
                                    Board Resolution
                                    No.2 S.2012:
                                    Approving the
                                    Revised
                                    Implementing
                                    Guidelines on
                                    OPT Plus
                                </td>
                                <td>The LNC maintains a printed/ electronic copy of NNC GB Resolution No. 3
                                        S.2012</td>
                                <td>The barangay conducts OPT Plus but not in accordance to the guidelines on the
                                        ff: 
                                        <br><br>
                                        1. Use of proper
                                        measurement tools
                                        <br>
                                        2. At least 80% coverage
                                        <br>
                                        3. Timely submission
                                </td>
                                <td>The barangay conducts OPT Plus as provided in the guidelines:
                                        <br><br>
                                        1. Use of proper
                                        measurement tools
                                        <br>
                                        2. At least 80%
                                        coverage
                                        <br>
                                        3. Timely submission</td>
                                <td>
                                The barangay
                                        conducts OPT Plus as provided in the guidelines and uses E-OPT
                                </td>
                                <td>
                                The barangay conducts OPT Plus, utilizes the E-OPT tool and disseminates results
                                        during the BNC meetings
                                </td>
                                <td>
                                    OPT Plus
                                    Implementing
                                    Guidelines
                                    Barangay Nutrition
                                    Action Plan
                                    Consolidated OPT
                                    Plus Report
                                    Masterlist of
                                    malnourished children
                                    Minutes of meeting
                                </td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2j">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </td>
                                <td>
                                <textarea class="form-control" name="remarks2j"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>2k</td>
                                <td>
                                    NNC Governing
                                    Board Resolution No. 6 series of 2012: Adoption of the 2012 Nutritional Guidelines
                                    for Filipinos
                                </td>
                                <td>
                                    The barangay
                                    maintains a printed/
                                    electronic copy of NNC GB Resolution No. 6 S. 2012
                                </td>
                                <td>
                                    The barangay has a
                                    resolution, ordinance,
                                    Executive Order
                                    in support to the
                                    resolution
                                </td>
                                <td>
                                The barangay
                                        implemented at least one activity with multi-stakeholder participation to
                                        promote the NGF
                                </td>
                                <td>
                                The barangay
                                        conducted more than one activity to promote the NGF
                                </td>
                                <td>
                                The barangay conducted more than one activity to promote the NGF using more than
                                        one media/ platform
                                </td>
                                <td>
                                Resolutions
                                Ordinances
                                Executive Order
                                Approved Annual
                                Budget
                                Barangay Nutrition
                                Action Plan
                                Minutes of meeting
                                Accomplishment/
                                documentation
                                report
                                </td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2k">
                                        <option>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td>
                                <textarea class="form-control" name="remarks2k" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>2l</td>
                                <td>
                                NNC Governing
                                    Board Resolution No. 2 series of 2009: Adopting the National Policy on Nutrition
                                    Management in Emergencies and Disasters
                                </td>
                                <td>
                                The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution
                                        No. 2 S. 2009
                                </td>
                                <td>
                                The barangay designated
                                        the lead or focal point for Nutrition-in-Emergencies
                                </td>
                                <td>
                                The barangay has issued a resolution organizing the nutrition cluster in the
                                        area
                                </td>
                                <td>
                                Barangay Nutrition Cluster has been formed and planning has been initiated/
                                        completed
                                </td>
                                <td>
                                Barangay Nutrition
                                        Cluster has been
                                        formed and integrated
                                        with the BDRRMC with allocated budget
                                </td>
                                <td>
                                    Resolutions
                                    Ordinances
                                    Executive Order
                                    Barangay Nutrition
                                    Action Plan
                                    NIEM Plan
                                    Minutes of meeting
                                </td>
                                <td>
                                    <select id="loadProvince1" class="form-control" name="rating2l">
                                        <option>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td>
                                <textarea class="form-control" name="remarks2l"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                    <button type="button" class="bold btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterDraft">
                    Save as Draft
                    </button>
                    <button type="button" class="bold btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Save and Submit
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Submit-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to submit this form?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" id="lgu-submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Draft -->
<div class="modal fade" id="exampleModalCenterDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Save as Draft?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" id="lgu-draft" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

@endsection