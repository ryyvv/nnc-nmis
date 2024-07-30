<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
<script src="{{ asset('assets') }}/js/MellpiProLGUBarangay.js"></script>

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
'namePage' => 'Nutrition Service',
'activePage' => 'nutritionservice',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">

        <div style="display:flex;align-items:center">
            <a href="{{route('nutritionservice.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <div style="padding:25px">
            <form action="{{ route('nutritionservice.store') }}" id="nutritionService-form" method="POST" >
                @csrf

                <input type="hidden" name="status" value="1" id='status'>
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <!-- header -->
                @include('layouts.page_template.location_header')
                <!-- endheader -->

                <br>
                <br>
                <div class="row table-responsive" style="display:flex;padding:10px;">
                    <table class="table table-striped table-hover" style="overflow-x:auto">
                        <thead style="background-color:#508D4E;">
                            <th class="text-center">&nbsp;</th>
                            <th class="tableheader">Elements</th>
                            <th colspan="5" class="tableheader">Performance Level</th>
                            <th class="tableheader">Document Source</th>
                            <th class="tableheader">Rating</th>
                            <th class="tableheader">Remarks</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="bold text-center">1</td>
                                <td class="bold text-center">2</td>
                                <td class="bold text-center">3</td>
                                <td class="bold text-center">4</td>
                                <td class="bold text-center">5</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>

                            <!-- content -->
                            <tr>
                                <td class="bold">5a</td>
                                <td  colspan="9"><b>Infant and Young Child Feeding</b><br>Community-based health and nutrition support strengthening</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td> 1. Functional
                                            breastfeeding
                                            support group</td>
                                <td> Breastfeeding support group established in the barangay with written
                                            agreement of its establishment and directory of members</td>
                                <td > Breastfeeding
                                            support group
                                            oriented on Infant
                                            and Young Child
                                            Feeding and Milk Code and provided guidance in the conduct of peer
                                            counselling and referral</td>
                                <td > Breastfeeding
                                            support group
                                            conducted
                                            activities such as
                                            peer counseling,
                                            sharing of
                                            experience and
                                            assistance in
                                            breastfeeding and
                                            complementary
                                            feeding for
                                            pregnant and
                                            lactating mothers</td>
                                <td>  Breastfeeding
                                            support group
                                            conducted
                                            activities in Level 3 and maintains a list of lactating mothers
                                            and status of breastfeeding and/or complementary feeding includin
                                            information on those with breastfeeding or complementary feeding challenge</td>
                                <td  > Breastfeeding
                                            support group
                                            conducted activities
                                            and maintains a list of lactating mothers and status of breastfeeding
                                            and/or complementary feeding and conducts follow through activities until
                                            the lactating mother have ransitioned from exclusive breastfeeding to
                                            continued breastfeeding with complementary feeding</td>
                                <td>Written agreement on
                                    estbalishment of
                                    Breastfeeding Support 
                                    Group
                                    Directory of members
                                    Documentation of activities
                                    Masterlist of lactating
                                    mothers with breastfeeding
                                    and complementary
                                    feeding status</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5aa">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('loadProvince1')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                                <td> 
                                    <textarea  name="remarks5aa" placeholder="Your remarks" class="form-control"></textarea> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td  colspan="9"><b>Establishment of breastfeeding places in barangay facilities</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td> 2. Lactation stations established in barangay facilities such as Barangay Health Stations, multi-purpose hall and in public schools</td>
                                <td>The barangay has one lactation station but not maintained</td>
                                <td >The barangay has one lactation station accessible to the public and well-maintained</td>
                                <td> The barangay has one lactation station accessible to the public, well-maintained and has accessible handwashing facility, comfortable seats and proper ventilation</td>
                                <td>The barangay has one lactation station as described in level 3 and maintains a logbook of users</td>
                                <td>The barangay has more than one lactation station as described in level 3 and maintains a logbook of users</td>
                                <td>
                                (By ocular inspection) Documentation report Lactation station logbook of users</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ab">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td> 
                                    <textarea  name="remarks5ab" placeholder="Your remarks" class="form-control"></textarea> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td  colspan="9"><b>Promotion of compliance to the Milk Code</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td> 3. Activities conducted to promote compliance to Executive Order 51, Milk Code</td>
                                <td>The barangay have Milk Code materials posted in the Barangay Health Station</td>
                                <td >The Barangay Health Station is compliant to the Milk Code</td>
                                <td> The Barangay Health Station includes the Milk Code in its Infant and Young Child Feeding classes for pregnant and lactating mothers</td>
                                <td>The Barangay issued a resolution in support of the Milk Code including regular inspection of Barangay Health Station/s</td>
                                <td>Members of the Barangay Nutrition Committee conduct inspection in the Barangay Health Stations at least twice a year to ensure compliance of health workers and clients in the public health facility</td>
                                <td>Milk code materials Ocular inspection of the Barangay Health Station IYCF classes learning materials Resolution Documentation Report</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ac">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td> 
                                    <textarea  name="remarks5ac" placeholder="Your remarks" class="form-control"></textarea> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="bold">5b</td>
                                <td  colspan="9"><b>Philippine Integrated Management of Acute Malnutrition</b>
                                <br>Provision of services for Severe Acute Malnutrition (SAM) and Moderate Acute Malnutrition (MAM)</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>4. Referral of severely and moderately acute malnourished children to Barangay Health Stations and/or Rural Health Units</td>
                                <td>The LGU only maintains a master list of children with severe and moderate acute malnutrition</td>
                                <td>Barangay conducts active case finding of SAM and MAM cases</td>
                                <td>Barangay conducts active case finding of SAM and MAM cases and refers cases to the appropriate facility for PIMAM</td>
                                <td>Barangay conducts active case finding of SAM and MAM cases, refers cases to the appropriate facility for PIMAM and monitors the progress of the SAM and MAM cases enrolled but not reported monthly</td>
                                <td>Barangay conducts active case finding of SAM and MAM cases, refers cases to the appropriate facility for PIMAM and monitors the progress of the SAM and MAM cases enrolled and reports monthly</td>
                                <td>Masterlist of children with SAM Referral forms</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ba">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ba" placeholder="Your remarks" class="form-control"></textarea> </td>
                            </tr>

                            <tr>
                                <td class="bold">5c</td>
                                <td  colspan="9"><b>National Dietary Supplementation Program</b><br>Dietary supplementation of pregnant women</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>5. Nutritionally-at- risk pregnant women enrolled/covered in the dietary supplementation program</td>
                                <td>The barangay monitors the nutritional status of all pregnant women</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers less than 90% of the target pregnant women for 90 days</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers at least 90% of the target pregnant women for 90 days</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers more than 90% of the target pregnant women for 90 days days</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers 100% of the target pregnant women for 90 days</td>
                                <td>Barangay Nutrition Action Plan Accomplishment/ Documentation reports NDSP Reports</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ca">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ca" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td  colspan="9"><b>Dietary supplementation of infants and young children 6-23 months</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>6. Infants and young children 6-23 months old enrolled in the dietary supplementation program</td>
                                <td>The barangay monitors the nutritional status of all infants and young children 6-23 months</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers less than 90% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers at least 90% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers more than 90% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td>The barangay implements/ coordinates the dietary supplementation program and covers more than 100% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td>Barangay Nutrition Action Plan Accomplishment/ documentation report Masterlist of children 6-23 months</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5cb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5cb" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td  colspan="9"><b>Dietary supplementation of children in child development centers and supervised neighborhood play</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>7. Children in child development centers and supervised neighborhood play provided with dietary supplementation</td>
                                <td>Child Development Worker (CDW) provides updates on the Supplementary Feeding in Day Care Centers and Supervised Neighborhood Play during the Barangay Nutrition Committee meeting/s</td>
                                <td>CDW shares consolidated data to the Barangay Nutrition Committee and used for the preparation of the nutrition situation in the area</td>
                                <td>BNC uses the data on the nutritional status of children in child development centers and supervised neighborhood play for the identification of PAPs for preschool-age children in the local nutrition action plan to complement the supplementary feeding program</td>
                                <td>BNC implements the PAPs and monitors the progress in improving the nutritional status of children in child development centers and supervised neighborhood play</td>
                                <td>BNC assesses the effectiveness and efficiency of the PAPs formulated to complement the supplementary feeding program in child development centers and supervised neighborhood play and provides recommendations to improve implementation of PAPs</td>
                                <td>Minutes of meeting Nutrition Situation Local Nutrition Action Plan Supplementary Feeding Report Plan Implementation Report</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5cc">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5cc" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td  colspan="9"><b>Dietary supplementation of wasted school children</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>8. Support to the School-based Feeding Program (SBFP) targeting children from Kinder to Grade VI who are wasted</td>
                                <td>Barangay Nutrition Committee member from DepED provides updates on the School-based Feeding Program during the Barangay Nutrition Committee meeting</td>
                                <td>BNC member from DepED shares consolidated data to the Barangay Nutrition Committee and used for the preparation of the nutrition situation in the area</td>
                                <td>The progress of implementation is shared by the school and discussed by the BNC to identify areas where BNC can provide assistance</td>
                                <td>The barangay provides assistance as agreed with the school</td>
                                <td>The barangay utilizes the data shared in the assessment and formulation of activities in the BNAP for school age children</td>
                                <td>School-based feeding program report Documentation report Minutes of BNC meeting Barangay Nutrition Action Plan</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5cd">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5cd" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td class="bold">5d</td>
                                <td  colspan="9"><b> National Nutrition Promotion Program for Behavior Change</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>9. Nutrition promotion activities for behavior change conducted for population groups</td>
                                <td>Nutrition promotion activities targeting children conducted</td>
                                <td>Nutrition promotion activities targeting children and adolescents conducted</td>
                                <td>Nutrition promotion activities targeting children and adolescents and pregnant and lactating women conducted</td>
                                <td>Nutrition promotion activities targeting children and adolescents, pregnant and lactating women and senior citizens and PWDs conducted</td>
                                <td>Nutrition promotion activities targeting children and adolescents, pregnant and lactating women, senior citizens and PWDs and other population groups/ sectors conducted</td>
                                <td>Barangay Nutrition Action Plan Documentation reports IEC materials Sectoral accomplishments                                </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5da">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5da" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <!-- <tr>
                                <td class="bold">&nbsp;</td>
                                <td  colspan="9">&nbsp;</td>
                            </tr> -->

                            <tr>
                                <td>&nbsp;</td>
                                <td>10. Nutrition promotion for behavior change activities for the public conducted</td>
                                <td>Activities in celebration of the National Nutrition Month and conducted by the barangay with participation from at least one sector</td>
                                <td>Activities in celebration of National Nutrition Month conducted by the LGU with participation of at least two sectors</td>
                                <td>Activities in celebration of National Nutrition Month conducted by the barangay with participation of at least three sectors</td>
                                <td>Activities in celebration of National Nutrition Month and to promote the Nutritional Guidelines for Filipinos conducted by the barangay with participation of at least three sectors</td>
                                <td>Activities in celebration of National Nutrition Month and to promote the Nutritional Guidelines for Filipinos conducted by the barangay with participation of more than three sectors</td>
                                <td>Barangay Nutrition Action Plan Documentation reports IEC materials                             </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5db">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5db" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td class="bold">5e</td>
                                <td  colspan="9"><b>Micronutrient Supplementation</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>11. Pregnant women provided with iron-folic acid</td>
                                <td>Iron-folic acid was prescribed to pregnant women but not provided</td>
                                <td>Pregnant women were provided with iron-folic acid covering less than 90% of the target</td>
                                <td>Pregnant women were provided with iron-folic acid covering at least 90% of the target for 180 days</td>
                                <td>Pregnant women were provided with iron-folic acid covering more than 90% of the target for 180 days</td>
                                <td>Pregnant women were provided with iron-folic acid covering 100% of the target for 180 days</td>
                                <td>FHSIS Report Masterlist of pregnant mothers who received iron-folic acid                           </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ea">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ea" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>12. Vitamin A provided to children 6-11 months old</td>
                                <td>Vitamin A was prescribed to children 6-11 months but not provided</td>
                                <td>One dose of vitamin A provided to less than 90% of children 6-11 months old</td>
                                <td>One dose of vitamin A provided to at least 90% of children 6-11 months old</td>
                                <td>One dose of vitamin A provided to at least 90% of children 6-11 months old</td>
                                <td>One dose of vitamin A provided to 100% of children 6-11 months old</td>
                                <td>FHSIS Report Masterlist of children 6-11 months who received Vitamin A                           </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5eb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5eb" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>13. Vitamin A capsules provided to children 12-59 months old</td>
                                <td>Vitamin A was prescribed to children 12-59 months old but not provided</td>
                                <td>Two doses of vitamin A provided to less than 90% of children 12-59 months old</td>
                                <td>Two doses of vitamin A provided to at least 90% of children 12-59 months old</td>
                                <td>Two doses of vitamin A provided more than 90% of children 12-59 months old</td>
                                <td>Two doses of vitamin A provided 100% of children 12-59 months old</td>
                                <td>FHSIS Report Masterlist of children 12-59 months who received Vitamin A                 </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ec">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ec" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>14. Micronutrient powder provided to young children 6-23 months old</td>
                                <td>Micronutrient powder was prescribed to young children 6-23 months old but not provided</td>
                                <td>Micronutrient powder provided to young children 6-23 months old but covers less than 90% of the target</td>
                                <td>Micronutrient powder provided to young children 6-23 months old and covers at least 90% of the target</td>
                                <td>Micronutrient powder provided to young children 6-23 months old and covers more than 90% of the target</td>
                                <td>Micronutrient powder provided to young children 6-23 months old and covers 100% of the target</td>
                                <td>FHSIS Report Masterlist of children 6-23 months who received MNP             </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ed">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ed" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>15. Weekly provision of iron-folic acid tablets to adolescent female learners in public schools through Weekly Iron Folic Acid (WIFA) Supplementation Program</td>
                                <td>Iron-folic acid tablets prescribed to adolescent female learners in public schools but not provided</td>
                                <td>Iron-folic acid tablets provided weekly to less than 100% of adolescent female learner in public schools with parents consent</td>
                                <td>Iron-folic acid tablets provided weekly to 100% of adolescent female learners in public schools with parents consent for two cycles</td>
                                <td>Iron-folic acid tablets provided weekly to 100% of adolescent female learners in public schools with parents consent for two cycles and information on the benefits of WIFA disseminated among parents</td>
                                <td>Iron-folic acid tablets provided weekly to 100% of adolescent female learners in public schools for two cycles with parents' consent, information on the benefits of WIFA disseminated among parents and updates shared to Barangay Nutrition Committee</td>
                                <td>School-based Weekly Iron Folic Acid Supplementation Report Minutes of meeting</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ee">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ee" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>16. Weekly Iron Folic Acid (WIFA) provided to adolescent females in Grade 7 to 10 from private schools, out-of-school adolescent females and women aged 10-49 years not covered by WIFA in public schools</td>
                                <td>Iron-folic acid tablets prescribed to adolescent females outside the public school system but not provided</td>
                                <td>Iron-folic acid tablets provided weekly to less than 90% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td>Iron-folic acid tablets provided weekly to at least 90% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td>Iron-folic acid tablets provided weekly to more than 90% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td>Iron-folic acid tablets provided weekly to 100% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td>FHSIS Report Masterlist of adolescents who received WIFA from Barangay Health Station</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5ef">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5ef" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td class="bold">5f</td>
                                <td  colspan="9"><b>Micronutrient Supplementation</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>17. Retail outlets selling iodized salt</td>
                                <td>The LGU monitors retail outlets selling table salt</td>
                                <td>Less than 90% of retail outlets selling iodized salt</td>
                                <td>At least 90% of the retail outlets selling iodized salt</td>
                                <td>At least 90% of the retail stores selling adequately iodized salt</td>
                                <td>More than 90% of retail stores selling adequately iodized salt</td>
                                <td>Barangay Nutrition Action Plan Master list of retail outlets selling iodized salt </td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5fa">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5fa" placeholder="Your remarks" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>18. Bakery owners using vitamin A fortified flour</td>
                                <td>The LGU monitors the type of flour bakeries use</td>
                                <td>Less than 90% of the bakery owners are using vitamin A fortified flour in baked products</td>
                                <td>At least 90% of the bakery owners are using vitamin A fortified flour in baked products</td>
                                <td>More than 90% of bakery owners are using vitamin A fortified flour in baked products</td>
                                <td>100% of bakery owners are using vitamin A fortified flour in baked products</td>
                                <td>Barangay Nutrition Action Plan Master list of bakeries using fortified flour</td>
                                <td style="width:40px!important"> 
                                    <select id="loadProvince1" class="form-control" name="rating5fb">
                                    <option>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></td>
                                <td><textarea  name="remarks5fb" placeholder="Your remarks" class="form-control"></textarea></td>
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
        <button type="submit" id="nutritionService-submit" class="btn btn-primary">Yes</button>
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
        <button type="submit" id="nutritionService-draft" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection