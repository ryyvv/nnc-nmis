
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
<div class="card-header">
      <div class="d-flex justify-content-end center" style="padding-right:20px; ">
                <form action="{{route('lncmanagement.download',$row->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="htmlContent" id="htmlContent">
                    <button type="submit" id="hiddenButton" style="display: none;"></button>
                </form>

                <div style="display:absolute;" onclick="downloadPDF('{{$row->id}}')">
                    <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i>
                    <label class="download">Download file</label>
                </div>
        </div>
 

        @include('layouts.page_template.crud_alert_message')
            <div id="downloadable"> 
                <div style="display:flex;align-items:center">
                        <a href="#">
                            <h5 class="title" style="margin:0px">FORM B: BARANGAY PROFILE SHEET</h5>
                        </a>
                </div>

                <div style="margin-right:15px">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic" href="{{route('BSLGUprofile.index')}}">Mellpi Pro for LGU Profile</a></li>
                                <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Form B: Barangay Profile Sheet -
                                    <?php echo auth()->user()->barangay ?>
                                </li>
                            </ol>
                        </nav>
                </div>
                
                <div style="padding:25px">
            <form action="{{ route('nutritionservice.store') }}" id="form" method="POST">
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
                            <th class="tableheader" style="padding-left:20px;padding-right:20px">Rating</th>
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
                                <td colspan="9"><b>Infant and Young Child Feeding</b><br>Community-based health and nutrition support strengthening</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA"> 1. Functional
                                    breastfeeding
                                    support group</td>
                                <td class="fontA"> Breastfeeding support group established in the barangay with written
                                    agreement of its establishment and directory of members</td>
                                <td class="fontA"> Breastfeeding
                                    support group
                                    oriented on Infant
                                    and Young Child
                                    Feeding and Milk Code and provided guidance in the conduct of peer
                                    counselling and referral</td>
                                <td class="fontA"> Breastfeeding
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
                                <td class="fontA"> Breastfeeding
                                    support group
                                    conducted
                                    activities in Level 3 and maintains a list of lactating mothers
                                    and status of breastfeeding and/or complementary feeding includin
                                    information on those with breastfeeding or complementary feeding challenge</td>
                                <td class="fontA"> Breastfeeding
                                    support group
                                    conducted activities
                                    and maintains a list of lactating mothers and status of breastfeeding
                                    and/or complementary feeding and conducts follow through activities until
                                    the lactating mother have ransitioned from exclusive breastfeeding to
                                    continued breastfeeding with complementary feeding</td>
                                <td class="fontA">Written agreement on
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
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5aa', $row->rating5aa) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5aa', $row->rating5aa) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5aa', $row->rating5aa) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5aa', $row->rating5aa) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5aa', $row->rating5aa) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5aa')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5aa" placeholder="Your remarks" class="form-control"> {{ old('remarks5aa', $row->remarks5aa) }}</textarea>
                                    @error('remarks5aa')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td colspan="9"><b>Establishment of breastfeeding places in barangay facilities</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA"> 2. Lactation stations established in barangay facilities such as Barangay Health Stations, multi-purpose hall and in public schools</td>
                                <td class="fontA">The barangay has one lactation station but not maintained</td>
                                <td class="fontA">The barangay has one lactation station accessible to the public and well-maintained</td>
                                <td class="fontA"> The barangay has one lactation station accessible to the public, well-maintained and has accessible handwashing facility, comfortable seats and proper ventilation</td>
                                <td class="fontA">The barangay has one lactation station as described in level 3 and maintains a logbook of users</td>
                                <td class="fontA">The barangay has more than one lactation station as described in level 3 and maintains a logbook of users</td>
                                <td class="fontA">
                                    (By ocular inspection) Documentation report Lactation station logbook of users</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ab">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ab', $row->rating5ab) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ab', $row->rating5ab) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ab', $row->rating5ab) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ab', $row->rating5ab) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ab', $row->rating5ab) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ab')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ab" placeholder="Your remarks" class="form-control">{{ old('remarks5ab', $row->remarks5ab) }}</textarea>
                                    @error('remarks5ab')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>
                           

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td colspan="9"><b>Promotion of compliance to the Milk Code</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA"> 3. Activities conducted to promote compliance to Executive Order 51, Milk Code</td>
                                <td class="fontA">The barangay have Milk Code materials posted in the Barangay Health Station</td>
                                <td class="fontA">The Barangay Health Station is compliant to the Milk Code</td>
                                <td class="fontA"> The Barangay Health Station includes the Milk Code in its Infant and Young Child Feeding classes for pregnant and lactating mothers</td>
                                <td class="fontA">The Barangay issued a resolution in support of the Milk Code including regular inspection of Barangay Health Station/s</td>
                                <td class="fontA">Members of the Barangay Nutrition Committee conduct inspection in the Barangay Health Stations at least twice a year to ensure compliance of health workers and clients in the public health facility</td>
                                <td class="fontA">Milk code materials Ocular inspection of the Barangay Health Station IYCF classes learning materials Resolution Documentation Report</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ac">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ac', $row->rating5ac) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ac', $row->rating5ac) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ac', $row->rating5ac) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ac', $row->rating5ac) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ac', $row->rating5ac) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ac')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ac" placeholder="Your remarks" class="form-control">{{ old('remarks5ac', $row->remarks5ac) }}</textarea>
                                    @error('remarks5ac')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5b</td>
                                <td colspan="9"><b>Philippine Integrated Management of Acute Malnutrition</b>
                                    <br>Provision of services for Severe Acute Malnutrition (SAM) and Moderate Acute Malnutrition (MAM)
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">4. Referral of severely and moderately acute malnourished children to Barangay Health Stations and/or Rural Health Units</td>
                                <td class="fontA">The LGU only maintains a master list of children with severe and moderate acute malnutrition</td>
                                <td class="fontA">Barangay conducts active case finding of SAM and MAM cases</td>
                                <td class="fontA">Barangay conducts active case finding of SAM and MAM cases and refers cases to the appropriate facility for PIMAM</td>
                                <td class="fontA">Barangay conducts active case finding of SAM and MAM cases, refers cases to the appropriate facility for PIMAM and monitors the progress of the SAM and MAM cases enrolled but not reported monthly</td>
                                <td class="fontA">Barangay conducts active case finding of SAM and MAM cases, refers cases to the appropriate facility for PIMAM and monitors the progress of the SAM and MAM cases enrolled and reports monthly</td>
                                <td class="fontA">Masterlist of children with SAM Referral forms</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5b">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5b', $row->rating5b) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5b', $row->rating5b) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5b', $row->rating5b) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5b', $row->rating5b) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5b', $row->rating5b) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5b')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5b" placeholder="Your remarks" class="form-control">{{ old('remarks5b', $row->remarks5b) }}</textarea>
                                    @error('remarks5b')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5c</td>
                                <td colspan="9"><b>National Dietary Supplementation Program</b><br>Dietary supplementation of pregnant women</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">5. Nutritionally-at- risk pregnant women enrolled/covered in the dietary supplementation program</td>
                                <td class="fontA">The barangay monitors the nutritional status of all pregnant women</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers less than 90% of the target pregnant women for 90 days</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers at least 90% of the target pregnant women for 90 days</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers more than 90% of the target pregnant women for 90 days days</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers 100% of the target pregnant women for 90 days</td>
                                <td class="fontA">Barangay Nutrition Action Plan Accomplishment/ Documentation reports NDSP Reports</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ca">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ca', $row->rating5ca) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ca', $row->rating5ca) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ca', $row->rating5ca) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ca', $row->rating5ca) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ca', $row->rating5ca) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ca')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ca" placeholder="Your remarks" class="form-control">{{ old('remarks5ca', $row->remarks5ca) }}</textarea>
                                    @error('remarks5ca')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td colspan="9"><b>Dietary supplementation of infants and young children 6-23 months</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">6. Infants and young children 6-23 months old enrolled in the dietary supplementation program</td>
                                <td class="fontA">The barangay monitors the nutritional status of all infants and young children 6-23 months</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers less than 90% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers at least 90% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers more than 90% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td class="fontA">The barangay implements/ coordinates the dietary supplementation program and covers more than 100% of all infants and young children 6-23 months for 90 - 120 days</td>
                                <td class="fontA">Barangay Nutrition Action Plan Accomplishment/ documentation report Masterlist of children 6-23 months</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5cb">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5cb', $row->rating5cb) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5cb', $row->rating5cb) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5cb', $row->rating5cb) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5cb', $row->rating5cb) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5cb', $row->rating5cb) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5cb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5cb" placeholder="Your remarks" class="form-control">{{ old('remarks5cb', $row->remarks5cb) }}</textarea>
                                    @error('remarks5cb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td colspan="9"><b>Dietary supplementation of children in child development centers and supervised neighborhood play</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">7. Children in child development centers and supervised neighborhood play provided with dietary supplementation</td>
                                <td class="fontA">Child Development Worker (CDW) provides updates on the Supplementary Feeding in Day Care Centers and Supervised Neighborhood Play during the Barangay Nutrition Committee meeting/s</td>
                                <td class="fontA">CDW shares consolidated data to the Barangay Nutrition Committee and used for the preparation of the nutrition situation in the area</td>
                                <td class="fontA">BNC uses the data on the nutritional status of children in child development centers and supervised neighborhood play for the identification of PAPs for preschool-age children in the local nutrition action plan to complement the supplementary feeding program</td>
                                <td class="fontA">BNC implements the PAPs and monitors the progress in improving the nutritional status of children in child development centers and supervised neighborhood play</td>
                                <td class="fontA">BNC assesses the effectiveness and efficiency of the PAPs formulated to complement the supplementary feeding program in child development centers and supervised neighborhood play and provides recommendations to improve implementation of PAPs</td>
                                <td class="fontA">Minutes of meeting Nutrition Situation Local Nutrition Action Plan Supplementary Feeding Report Plan Implementation Report</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5cc">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5cc', $row->rating5cc) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5cc', $row->rating5cc) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5cc', $row->rating5cc) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5cc', $row->rating5cc) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5cc', $row->rating5cc) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5cc')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5cc" placeholder="Your remarks" class="form-control">{{ old('remarks5cc', $row->remarks5cc) }}</textarea>
                                    @error('remarks5cc')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">&nbsp;</td>
                                <td colspan="9"><b>Dietary supplementation of wasted school children</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">8. Support to the School-based Feeding Program (SBFP) targeting children from Kinder to Grade VI who are wasted</td>
                                <td class="fontA">Barangay Nutrition Committee member from DepED provides updates on the School-based Feeding Program during the Barangay Nutrition Committee meeting</td>
                                <td class="fontA">BNC member from DepED shares consolidated data to the Barangay Nutrition Committee and used for the preparation of the nutrition situation in the area</td>
                                <td class="fontA">The progress of implementation is shared by the school and discussed by the BNC to identify areas where BNC can provide assistance</td>
                                <td class="fontA">The barangay provides assistance as agreed with the school</td>
                                <td class="fontA">The barangay utilizes the data shared in the assessment and formulation of activities in the BNAP for school age children</td>
                                <td class="fontA">School-based feeding program report Documentation report Minutes of BNC meeting Barangay Nutrition Action Plan</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5cd">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5cd', $row->rating5cd) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5cd', $row->rating5cd) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5cd', $row->rating5cd) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5cd', $row->rating5cd) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5cd', $row->rating5cd) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5cd')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5cd" placeholder="Your remarks" class="form-control">{{ old('remarks5cd', $row->remarks5cd) }}</textarea>
                                    @error('remarks5cd')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5d</td>
                                <td colspan="9"><b> National Nutrition Promotion Program for Behavior Change</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">9. Nutrition promotion activities for behavior change conducted for population groups</td>
                                <td class="fontA">Nutrition promotion activities targeting children conducted</td>
                                <td class="fontA">Nutrition promotion activities targeting children and adolescents conducted</td>
                                <td class="fontA">Nutrition promotion activities targeting children and adolescents and pregnant and lactating women conducted</td>
                                <td class="fontA">Nutrition promotion activities targeting children and adolescents, pregnant and lactating women and senior citizens and PWDs conducted</td>
                                <td class="fontA">Nutrition promotion activities targeting children and adolescents, pregnant and lactating women, senior citizens and PWDs and other population groups/ sectors conducted</td>
                                <td class="fontA">Barangay Nutrition Action Plan Documentation reports IEC materials Sectoral accomplishments </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5da">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5da', $row->rating5da) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5da', $row->rating5da) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5da', $row->rating5da) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5da', $row->rating5da) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5da', $row->rating5da) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5da')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5da" placeholder="Your remarks" class="form-control">{{ old('remarks5da', $row->remarks5da) }}</textarea>
                                    @error('remarks5da')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>


                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">10. Nutrition promotion for behavior change activities for the public conducted</td>
                                <td class="fontA">Activities in celebration of the National Nutrition Month and conducted by the barangay with participation from at least one sector</td>
                                <td class="fontA">Activities in celebration of National Nutrition Month conducted by the LGU with participation of at least two sectors</td>
                                <td class="fontA">Activities in celebration of National Nutrition Month conducted by the barangay with participation of at least three sectors</td>
                                <td class="fontA">Activities in celebration of National Nutrition Month and to promote the Nutritional Guidelines for Filipinos conducted by the barangay with participation of at least three sectors</td>
                                <td class="fontA">Activities in celebration of National Nutrition Month and to promote the Nutritional Guidelines for Filipinos conducted by the barangay with participation of more than three sectors</td>
                                <td class="fontA">Barangay Nutrition Action Plan Documentation reports IEC materials </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5db">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5db', $row->rating5db) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5db', $row->rating5db) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5db', $row->rating5db) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5db', $row->rating5db) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5db', $row->rating5db) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5db')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5db" placeholder="Your remarks" class="form-control">{{ old('remarks5db', $row->remarks5db) }}</textarea>
                                    @error('remarks5db')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5e</td>
                                <td colspan="9"><b>Micronutrient Supplementation</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">11. Pregnant women provided with iron-folic acid</td>
                                <td class="fontA">Iron-folic acid was prescribed to pregnant women but not provided</td>
                                <td class="fontA">Pregnant women were provided with iron-folic acid covering less than 90% of the target</td>
                                <td class="fontA">Pregnant women were provided with iron-folic acid covering at least 90% of the target for 180 days</td>
                                <td class="fontA">Pregnant women were provided with iron-folic acid covering more than 90% of the target for 180 days</td>
                                <td class="fontA">Pregnant women were provided with iron-folic acid covering 100% of the target for 180 days</td>
                                <td class="fontA">FHSIS Report Masterlist of pregnant mothers who received iron-folic acid </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ea">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ea', $row->rating5ea) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ea', $row->rating5ea) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ea', $row->rating5ea) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ea', $row->rating5ea) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ea', $row->rating5ea) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ea')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ea" placeholder="Your remarks" class="form-control">{{ old('remarks5ea', $row->remarks5ea) }}</textarea>
                                    @error('remarks5ea')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">12. Vitamin A provided to children 6-11 months old</td>
                                <td class="fontA">Vitamin A was prescribed to children 6-11 months but not provided</td>
                                <td class="fontA">One dose of vitamin A provided to less than 90% of children 6-11 months old</td>
                                <td class="fontA">One dose of vitamin A provided to at least 90% of children 6-11 months old</td>
                                <td class="fontA">One dose of vitamin A provided to at least 90% of children 6-11 months old</td>
                                <td class="fontA">One dose of vitamin A provided to 100% of children 6-11 months old</td>
                                <td class="fontA">FHSIS Report Masterlist of children 6-11 months who received Vitamin A </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5eb">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5eb', $row->rating5eb) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5eb', $row->rating5eb) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5eb', $row->rating5eb) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5eb', $row->rating5eb) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5eb', $row->rating5eb) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5eb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5eb" placeholder="Your remarks" class="form-control">{{ old('remarks5eb', $row->remarks5eb) }}</textarea>
                                    @error('remarks5eb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">13. Vitamin A capsules provided to children 12-59 months old</td>
                                <td class="fontA">Vitamin A was prescribed to children 12-59 months old but not provided</td>
                                <td class="fontA">Two doses of vitamin A provided to less than 90% of children 12-59 months old</td>
                                <td class="fontA">Two doses of vitamin A provided to at least 90% of children 12-59 months old</td>
                                <td class="fontA">Two doses of vitamin A provided more than 90% of children 12-59 months old</td>
                                <td class="fontA">Two doses of vitamin A provided 100% of children 12-59 months old</td>
                                <td class="fontA">FHSIS Report Masterlist of children 12-59 months who received Vitamin A </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ec">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ec', $row->rating5ec) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ec', $row->rating5ec) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ec', $row->rating5ec) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ec', $row->rating5ec) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ec', $row->rating5ec) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ec')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ec" placeholder="Your remarks" class="form-control">{{ old('remarks5ec', $row->remarks5ec) }}</textarea>
                                    @error('remarks5ec')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">14. Micronutrient powder provided to young children 6-23 months old</td>
                                <td class="fontA">Micronutrient powder was prescribed to young children 6-23 months old but not provided</td>
                                <td class="fontA">Micronutrient powder provided to young children 6-23 months old but covers less than 90% of the target</td>
                                <td class="fontA">Micronutrient powder provided to young children 6-23 months old and covers at least 90% of the target</td>
                                <td class="fontA">Micronutrient powder provided to young children 6-23 months old and covers more than 90% of the target</td>
                                <td class="fontA">Micronutrient powder provided to young children 6-23 months old and covers 100% of the target</td>
                                <td class="fontA">FHSIS Report Masterlist of children 6-23 months who received MNP </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ed">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ed', $row->rating5ed) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ed', $row->rating5ed) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ed', $row->rating5ed) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ed', $row->rating5ed) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ed', $row->rating5ed) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ed')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ed" placeholder="Your remarks" class="form-control">{{ old('remarks5ed', $row->remarks5ed) }}</textarea>
                                    @error('remarks5ed')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">15. Weekly provision of iron-folic acid tablets to adolescent female learners in public schools through Weekly Iron Folic Acid (WIFA) Supplementation Program</td>
                                <td class="fontA">Iron-folic acid tablets prescribed to adolescent female learners in public schools but not provided</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to less than 100% of adolescent female learner in public schools with parents consent</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to 100% of adolescent female learners in public schools with parents consent for two cycles</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to 100% of adolescent female learners in public schools with parents consent for two cycles and information on the benefits of WIFA disseminated among parents</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to 100% of adolescent female learners in public schools for two cycles with parents' consent, information on the benefits of WIFA disseminated among parents and updates shared to Barangay Nutrition Committee</td>
                                <td class="fontA">School-based Weekly Iron Folic Acid Supplementation Report Minutes of meeting</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ee">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ee', $row->rating5ee) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ee', $row->rating5ee) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ee', $row->rating5ee) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ee', $row->rating5ee) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ee', $row->rating5ee) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ee')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ee" placeholder="Your remarks" class="form-control">{{ old('remarks5ee', $row->remarks5ee) }}</textarea>
                                    @error('remarks5ee')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">16. Weekly Iron Folic Acid (WIFA) provided to adolescent females in Grade 7 to 10 from private schools, out-of-school adolescent females and women aged 10-49 years not covered by WIFA in public schools</td>
                                <td class="fontA">Iron-folic acid tablets prescribed to adolescent females outside the public school system but not provided</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to less than 90% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to at least 90% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to more than 90% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td class="fontA">Iron-folic acid tablets provided weekly to 100% of adolescent females outside the public school through Barangay Health Stations</td>
                                <td class="fontA">FHSIS Report Masterlist of adolescents who received WIFA from Barangay Health Station</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ef">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ef', $row->rating5ef) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ef', $row->rating5ef) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ef', $row->rating5ef) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ef', $row->rating5ef) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ef', $row->rating5ef) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ef')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ef" placeholder="Your remarks" class="form-control">{{ old('remarks5ef', $row->remarks5ef) }}</textarea>
                                    @error('remarks5ef')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5f</td>
                                <td colspan="9"><b>Micronutrient Supplementation</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">17. Retail outlets selling iodized salt</td>
                                <td class="fontA">The LGU monitors retail outlets selling table salt</td>
                                <td class="fontA">Less than 90% of retail outlets selling iodized salt</td>
                                <td class="fontA">At least 90% of the retail outlets selling iodized salt</td>
                                <td class="fontA">At least 90% of the retail stores selling adequately iodized salt</td>
                                <td class="fontA">More than 90% of retail stores selling adequately iodized salt</td>
                                <td class="fontA">Barangay Nutrition Action Plan Master list of retail outlets selling iodized salt </td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5fa">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5fa', $row->rating5fa) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5fa', $row->rating5fa) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5fa', $row->rating5fa) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5fa', $row->rating5fa) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5fa', $row->rating5fa) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5fa')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5fa" placeholder="Your remarks" class="form-control">{{ old('remarks5fa', $row->remarks5fa) }}</textarea>
                                    @error('remarks5fa')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">18. Bakery owners using vitamin A fortified flour</td>
                                <td class="fontA">The LGU monitors the type of flour bakeries use</td>
                                <td class="fontA">Less than 90% of the bakery owners are using vitamin A fortified flour in baked products</td>
                                <td class="fontA">At least 90% of the bakery owners are using vitamin A fortified flour in baked products</td>
                                <td class="fontA">More than 90% of bakery owners are using vitamin A fortified flour in baked products</td>
                                <td class="fontA">100% of bakery owners are using vitamin A fortified flour in baked products</td>
                                <td class="fontA">Barangay Nutrition Action Plan Master list of bakeries using fortified flour</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5fb">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5fb', $row->rating5fb) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5fb', $row->rating5fb) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5fb', $row->rating5fb) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5fb', $row->rating5fb) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5fb', $row->rating5fb) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5fb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5fb" placeholder="Your remarks" class="form-control">{{ old('remarks5fb', $row->remarks5fb) }}</textarea>
                                    @error('remarks5fb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">19. Retail stores selling vitamin A fortified cooking oil </td>
                                <td class="fontA">The LGU monitors retail stores selling cooking oil</td>
                                <td class="fontA">Less than 90% of
                                    the retail stores
                                    selling vitamin A
                                    fortified cooking oil</td>
                                <td class="fontA">At least 90% of the retail stores selling vitamin A fortified cooking oil</td>
                                <td class="fontA">More than 90% of
                                    the retail stores
                                    selling vitamin A
                                    fortified cooking oil</td>
                                <td class="fontA">100% of the retail
                                    stores selling vitamin A fortified cooking oil</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Master list of markets selling vitamin A fortified cooking oil</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5fc">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5fc', $row->rating5fc) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5fc', $row->rating5fc) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5fc', $row->rating5fc) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5fc', $row->rating5fc) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5fc', $row->rating5fc) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5fc')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5fc" placeholder="Your remarks" class="form-control">{{ old('remarks5fc', $row->remarks5fc) }}</textarea>
                                    @error('remarks5fc')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5g</td>
                                <td colspan="9"><b>Nutrition in Emergencies Program</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">20. NiEm Plan
                                    integration in the
                                    DRRM-H plan and
                                    Local DRRM Plan</td>
                                <td class="fontA">The LGU monitors retail stores selling cooking oil</td>
                                <td class="fontA">NiEm activities
                                    identified but not
                                    integrated in the
                                    Barangay Nutrition Action Plan</td>
                                <td class="fontA">NiEm activities
                                    identified and
                                    integrated to the
                                    Barangay Nutrition Action Plan but not integrated to the Barangay DRRMC</td>
                                <td class="fontA">NiEm activities
                                    identified and
                                    integrated to the
                                    Barangay Nutrition Action Plan and
                                    Barangay DRRMC</td>
                                <td class="fontA">NiEm activities
                                    identified and
                                    integrated to the
                                    Barangay Nutrition Action Plan and
                                    Barangay DRRMC
                                    are implemented</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Barangay DRRMC</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ga">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ga', $row->rating5ga) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ga', $row->rating5ga) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ga', $row->rating5ga) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ga', $row->rating5ga) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ga', $row->rating5ga) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ga')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ga" placeholder="Your remarks" class="form-control">{{ old('remarks5ga', $row->remarks5ga) }}</textarea>
                                    @error('remarks5ga')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="bold">5h</td>
                                <td colspan="9"><b>Overweight and Obesity Management and Prevention Program</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">21. Activities
                                    promoting healthy
                                    diets and active
                                    lifestyle for
                                    preschool children
                                    conducted</td>
                                <td class="fontA">Information
                                    dissemination on
                                    Pinggang Pinoy and active lifestyle for preschool children conducted</td>
                                <td class="fontA">Information
                                    dissemination and other activities conducted to promote Pinggang Pinoy and active lifestyle </td>
                                <td class="fontA">Information
                                    dissemination,
                                    distribution of IEC materials and other activities to promote Pinggang Pinoy and active lifestyle implemented and covered at least 50% of preschool children</td>
                                <td class="fontA">Information
                                    dissemination,
                                    distribution of IEC materials and conduct of other activities to promote Pinggang Pinoy and active lifestyle implemented and covered more than 50% of preschool children</td>
                                <td class="fontA">In addition to the
                                    parameters in Level
                                    4, the LGU
                                    formulated policies in support of promotion of healthy diets and active lifestyle and maintains safe and open spaces and play areas for children</td>
                                <td class="fontA">Documentation report
                                    IEC materials
                                    Resolution
                                    Ocular inspection of safe, open spaces and play areas for children</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ha">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ha', $row->rating5ha) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ha', $row->rating5ha) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ha', $row->rating5ha) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ha', $row->rating5ha) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ha', $row->rating5ha) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ha')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ha" placeholder="Your remarks" class="form-control">{{ old('remarks5ha', $row->remarks5ha) }}</textarea>
                                    @error('remarks5ha')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">22. Activities
                                    promoting proper
                                    diet and healthy
                                    lifestyle for the
                                    general public
                                    conducted</td>
                                <td class="fontA">Information
                                    dissemination on
                                    Pinggan Pinoy and healthy lifestyle for the general public conducted</td>
                                <td class="fontA">Information
                                    dissemination and other activities conducted to promote Pinggang Pinoy and active lifestyle </td>
                                <td class="fontA">Information
                                    dissemination,
                                    distribution of IEC materials and other activities conducted to promote Pinggang Pinoy and active lifestyle</td>
                                <td class="fontA">In addition to the
                                    parameters in Level 3, promotion of proper diet and healthy lifestyle is supported by a policy</td>
                                <td class="fontA">In addition to the
                                    parameters in Level
                                    4, the LGU maintains safe open indoor/ outdoor spaces for physical activities</td>
                                <td class="fontA">Documentation report
                                    IEC materials
                                    Resolution
                                    Ocular inspection of safe spaces for indoor/outdoor physical activities</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5hb">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5hb', $row->rating5hb) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5hb', $row->rating5hb) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5hb', $row->rating5hb) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5hb', $row->rating5hb) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5hb', $row->rating5hb) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5hb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5hb" placeholder="Your remarks" class="form-control">{{ old('remarks5hb', $row->remarks5hb) }}</textarea>
                                    @error('remarks5hb')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>


                            <tr>
                                <td class="bold">5i</td>
                                <td colspan="9"><b>Nutrition-Sensitive Programs</b><br>NS Programs to increase income and improve economic access to food</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">23. Eligible
                                    households with
                                    nutritionally
                                    vulnerable or
                                    affected provided
                                    with seed capital/ material
                                    assistance for
                                    livelihood</td>
                                <td class="fontA">Less than 30% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of seed capital/
                                    material assistance
                                    for livelihood</td>
                                <td class="fontA">Less than 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of seed capital/ material assistance for livelihood </td>
                                <td class="fontA">At least 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of seed capital/ material assistance</td>
                                <td class="fontA">At least 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of seed capital/ material assistance and market-linkages</td>
                                <td class="fontA">More than 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in
                                    the provision of
                                    seed capital/
                                    material assistance
                                    and
                                    market-linkages</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Accomplishment/
                                    documentation report
                                    Master list of beneficiaries</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ia">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ia', $row->rating5ia) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ia', $row->rating5ia) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ia', $row->rating5ia) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ia', $row->rating5ia) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ia', $row->rating5ia) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ia')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ia" placeholder="Your remarks" class="form-control">{{ old('remarks5ia', $row->remarks5ia) }}</textarea>
                                    @error('remarks5ia')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>


                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">24. Eligible
                                    households with
                                    nutritionally
                                    vulnerable or
                                    affected provided
                                    with livelihood
                                    training</td>
                                <td class="fontA">Less than 30% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of livelihood training</td>
                                <td class="fontA">Less than 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of livelihood training</td>
                                <td class="fontA">At least 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of livelihood training</td>
                                <td class="fontA">At least 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in the provision of livelihood training and industry-linkages</td>
                                <td class="fontA">More than 50% of
                                    eligible households
                                    with nutritionally
                                    vulnerable or
                                    affected included in
                                    the provision of
                                    livelihood training and industry-linkages</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Accomplishment/
                                    documentation report
                                    Master list of beneficiaries</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ib">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ib', $row->rating5ib) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ib', $row->rating5ib) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ib', $row->rating5ib) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ib', $row->rating5ib) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ib', $row->rating5ib) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ib')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ib" placeholder="Your remarks" class="form-control">{{ old('remarks5ib', $row->remarks5ib) }}</textarea>
                                    @error('remarks5ib')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="9"><b>NS Programs to improve physical access to food</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">25. Gulayan sa
                                    Paaralan established and maintained in school</td>
                                <td class="fontA">Member of the
                                    Barangay Nutrition
                                    Committee from
                                    DepED provides
                                    updates on the
                                    Gulayan sa
                                    Paaralan Project
                                    during BNC
                                    meeting/s</td>
                                <td class="fontA">BNC member from
                                    DepED shares data to the local nutrition committee and used in the preparation of the nutrition situation </td>
                                <td class="fontA">BNC uses the
                                    data in
                                    identification of
                                    PAPs in the
                                    barangay nutrition
                                    action plan to
                                    complement the
                                    Gulayan sa
                                    Paaralan Project</td>
                                <td class="fontA">BNC implements
                                    the PAPs in the
                                    barangay nutrition
                                    action plan
                                    complementing the Gulayan sa Paaralan Project</td>
                                <td class="fontA">BNC conducts data
                                    monitoring of the
                                    status of the Gulayan sa Paaralan and determines possible assistance from the BNC if necessary</td>
                                <td class="fontA">Minutes of meeting
                                    Nutrition Situation
                                    Local Nutrition Action Plan
                                    Documentation Report</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ic">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ic', $row->rating5ic) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ic', $row->rating5ic) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ic', $row->rating5ic) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ic', $row->rating5ic) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ic', $row->rating5ic) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ic')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ic" placeholder="Your remarks" class="form-control">{{ old('remarks5ic', $row->remarks5ic) }}</textarea>
                                    @error('remarks5ic')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">26. Households with nutritionally
                                    vulnerable or
                                    affected provided
                                    with inputs for
                                    backyard vegetable
                                    gardening</td>
                                <td class="fontA">Barangay provides technical assistance to households in establishing backyard vegetable gardens</td>
                                <td class="fontA">Barangay provides
                                    technical assistance and inputs for establishing a backyard vegetable garden to less than 80% of households with nutritionally vulnerable or affected</td>
                                <td class="fontA">Barangay provides
                                    technical assistance and inputs for establishing a backyard vegetable garden to at least 80% of households with nutritionally vulnerable or affected </td>
                                <td class="fontA">Barangay provides
                                    technical assistance and inputs for establishing a backyard vegetable garden to more than 80% of households with nutritionally vulnerable or affected</td>
                                <td class="fontA">Barangay provides
                                    technical assistance, inputs for the backyard vegetable garden and conducts monitoring of the status of the gardens at least twice a year</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Documentation Report
                                    Master list of beneficiaries
                                    Monitoring report</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5id">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5id', $row->rating5id) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5id', $row->rating5id) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5id', $row->rating5id) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5id', $row->rating5id) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5id', $row->rating5id) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5id')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5id" placeholder="Your remarks" class="form-control">{{ old('remarks5id', $row->remarks5id) }}</textarea>
                                    @error('remarks5id')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>


                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="9"><b>NS Programs to improve access to safe drinking water and sanitary toilet facilities</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">27. Households have access to safe drinking water</td>
                                <td class="fontA">Barangay conducts data monitoring of the number of households with access to safe drinking water</td>
                                <td class="fontA">Barangay ensures
                                    that less than 90%
                                    of households
                                    have access to
                                    safe drinking water</td>
                                <td class="fontA">Barangay ensures
                                    that at least 90%
                                    of households
                                    have access to
                                    safe drinking water</td>
                                <td class="fontA">Barangay ensures
                                    that more than 90%
                                    of households
                                    have access to
                                    safe drinking water</td>
                                <td class="fontA">Barangay ensures
                                    that 100%
                                    of households
                                    have access to
                                    safe drinking water</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Documentation report
                                    Monitoring report
                                    OPT Plus Family Profile
                                    Masterlist of households with access to safe drinking water</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ie">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ie', $row->rating5ie) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ie', $row->rating5ie) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ie', $row->rating5ie) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ie', $row->rating5ie) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ie', $row->rating5ie) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ie')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ie" placeholder="Your remarks" class="form-control">{{ old('remarks5ie', $row->remarks5ie) }}</textarea>
                                    @error('remarks5ie')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">28. Households have access to sanitary toilet facilities</td>
                                <td class="fontA">Barangay conducts data monitoring of
                                    the number of households with access to sanitary
                                    toilet facilities</td>
                                <td class="fontA">Barangay ensures
                                    that less than 90% of households have access to
                                    sanitary toilet
                                    facilities</td>
                                <td class="fontA">Barangay ensures
                                    that at least 90% of households have access to
                                    sanitary toilet
                                    facilities</td>
                                <td class="fontA">Barangay ensures
                                    that more than 90% of households have access to
                                    sanitary toilet
                                    facilities</td>
                                <td class="fontA">Barangay ensures
                                    that 100% of households have access to
                                    sanitary toilet
                                    facilities</td>
                                <td class="fontA">Barangay Nutrition ActionPlan
                                    Documentation report
                                    Monitoring report
                                    OPT Plus Family Profile
                                    Masterlist of households with access to safe drinking water</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5if">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5if', $row->rating5if) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5if', $row->rating5if) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5if', $row->rating5if) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5if', $row->rating5if) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5if', $row->rating5if) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5if')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5if" placeholder="Your remarks" class="form-control">{{ old('remarks5if', $row->remarks5if) }}</textarea>
                                    @error('remarks5if')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">29. Schools provided
                                    with access to safe
                                    water, adequate
                                    toilets, handwashing
                                    facilities through the
                                    WASH in Schools
                                    (WinS) program</td>
                                <td class="fontA">Member of the
                                    Barangay Nutrition
                                    Committee from
                                    DepED provides
                                    updates on the
                                    WASH in Schools
                                    Program during
                                    BNC meeting/s</td>
                                <td class="fontA">Member of the
                                    Barangay Nutrition
                                    Committee from
                                    DepED shares data to the BNC and used in the preparation of the nutrition situation </td>
                                <td class="fontA">BNC uses the data
                                    in identification of PAPs in the Barangay Nutrition Action Plan to complement the WASH in Schools Program</td>
                                <td class="fontA">BNC conducts data monitoring of the access to safe drinking water, access to functional toilets and access to handwashing facilities in relation to the nutritional status of school children</td>
                                <td class="fontA">BNC conducts
                                    data monitoring of
                                    WASH in Schools
                                    and determines
                                    possible assistance
                                    from the BNC if
                                    necessary</td>
                                <td class="fontA">Minutes of meeting
                                    Nutrition Situation
                                    Barangay Nutrition Action Plan
                                    Monitoring Report</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ig">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ig', $row->rating5ig) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ig', $row->rating5ig) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ig', $row->rating5ig) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ig', $row->rating5ig) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ig', $row->rating5ig) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ig')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ig" placeholder="Your remarks" class="form-control">{{ old('remarks5ig', $row->remarks5ig) }}</textarea>
                                    @error('remarks5ig')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="9"><b>NS Programs to prevent teen-age pregnancy</b></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td class="fontA">30. Reproductive
                                    health programs for adolescents implemented</td>
                                <td class="fontA">Barangay conducts data monitoring of teenage pregnancies</td>
                                <td class="fontA">Barangay conducts data monitoring on teenage pregnancies and assists in the provision of services for adolescents (e.g. counseling) </td>
                                <td class="fontA">Barangay conducts data monitoring, assists in provision of services for adolescents and conducts information dissemination activities on reproductive health among adolescents</td>
                                <td class="fontA">In addition to the
                                    parameters in Level 3, the barangay also provides policy support for the
                                    Adolescent Health Development Program</td>

                                <td class="fontA">In addition to the
                                    parameters in Level
                                    4, the barangay also mobilized the Sangunianng Kabataan in cooperation with the Barangay Health Station to lead the activities for the Adolescent Health Development Program

                                </td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Monitoring Report
                                    Documentation Report
                                    Resolution</td>
                                <td class="fontA" style="width:40px!important">
                                    <select id="loadProvince1" class="form-control" name="rating5ih">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating5ih', $row->rating5ih) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating5ih', $row->rating5ih) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating5ih', $row->rating5ih) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating5ih', $row->rating5ih) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating5ih', $row->rating5ih) == '5' ? 'selected' : '' }}>5</option>
                                    </select>
                                    @error('rating5ih')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td><textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks5ih" placeholder="Your remarks" class="form-control">{{ old('remarks5ih', $row->remarks5ih) }}</textarea>
                                    @error('remarks5ih')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>


 
            </form>
        </div>  
            </div>
      </div>
    </div>
</div>
</div>

@endsection