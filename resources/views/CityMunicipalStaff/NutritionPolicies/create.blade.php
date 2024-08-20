<script src="https://cdn.lordicon.com/lordicon.js"></script>
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
            <a href="{{route('CMSnutritionpolicies.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B 1a: BARANGAY NUTRITION MONITORING</h4>
        </div>

        @include('layouts.page_template.crud_alert_message')

        <div style="padding:25px">
            <form action="{{ route('CMSnutritionpolicies.store') }}" method="POST" id="form">
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
                                <th colspan="5" class="tableheader text-center"><b>Performance Level<b></th>
                                <th class="tableheader text-center"><b>Document Source</b></th>
                                <th class="tableheader text-center" style="padding-left:20px;padding-right:20px"><b>Rating</b></th>
                                <th class="tableheader  text-center"><b>Remarks</b></th>
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
                                <tr>
                                    <td  class="fontA bold">2a</td>
                                    <td  class="fontA">Adoption, implementation and monitoring of Barangay Nutrition Action Plan</td>
                                    <td  class="fontA">Barangay Nutrition Action Plan formulated</td>
                                    <td  class="fontA">The barangay passed a resolution adopting the Barangay Nutrition Action Plan</td>
                                    <td  class="fontA">The barangay passed a resolution adopting the Barangay Nutrition Action Plans and allocating funds thereof</td>
                                    <td  class="fontA">The PAPs in the Barangay Nutrition Action Plan are implemented and accomplishments are reported during BNC meetings once a year</td>
                                    <td  class="fontA">The PAPs in the Barangay Nutrition Action Plan are implemented and accomplishments are reported during BNC meetings at least twice a year</td>
                                    <td  class="fontA">Resolutions Barangay Nutrition Action Plan Approved Annual Budget PPAN Accomplishment Report Minutes of meeting</td>
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2a">
                                            <option value="">Select</option>
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2a') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2a') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2a') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2a') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2a') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>

                                        @error('rating2a')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea name="remarks2a" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control">{{ old('remarks2a') }}</textarea>
                                        @error('remarks2a')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2b</td>
                                    <td  class="fontA">Republic Act 11037
                                        Masustansyang
                                        Pagkain Para sa
                                        Batang Pilipino
                                    </td>
                                    <td  class="fontA">The barangay
                                        maintains a printed/
                                        electronic copy of RA 11037
                                    </td>
                                    <td  class="fontA"> The law was discussed in one of the Barangay
                                        Nutrition Committee
                                        meetings within one year after it was enacted
                                    </td>
                                    <td  class="fontA">The barangay maintained a copy of the resolution in the barangay hall</td>
                                    <td  class="fontA">
                                        The barangay
                                        implemented activities to disseminate provisions of the law to the general
                                        public
                                    </td>
                                    <td  class="fontA"> Copy of the law
                                        Minutes of meetings
                                        Resolution
                                        Documentation of
                                        posting and/or
                                        dissemination
                                        activities
                                    </td>
                                    <td  class="fontA">Copy of the law Minutes of meetings Resolution
                                        Documentation of posting and/or dissemination activities;</td>
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2b">
                                            <option value="">Select</option>
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2b') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2b') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2b') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2b') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2b') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2b')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea name="remarks2b" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control">{{ old('remarks2b') }}</textarea>
                                        @error('remarks2b')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2c</td>
                                    <td  class="fontA">Presence of nutrition-related concerns in the
                                        Annual Investment Program
                                    </td>
                                    <td  class="fontA">
                                        Republic Act 11037 Masustansyang Pagkain Para
                                        sa Batang Pilipino
                                    </td>
                                    <td  class="fontA">
                                        The barangay has a
                                        resolution/ordinance/Executive Order and/or a line item in the Approved Annual
                                        Budget on EO 51 - related concerns
                                    </td>
                                    <td  class="fontA">The barangay conducted activities to promote
                                        compliance to EO 51
                                    </td>
                                    <td  class="fontA">The barangay conducted activities to promote
                                        and monitor compliance to EO 51 and reporting of results during BNC
                                        meetings
                                    </td>
                                    <td  class="fontA">Copy of the law Resolution/ Ordinance Barangay
                                        Nutrition Action Plan Approved Annual Budget Documentation of promotion and
                                        monitoring
                                    </td>
                                    <td  class="fontA">Annual Investment Program</td>
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2c">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2c') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2c') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2c') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2c') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2c') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2c')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea name="remarks2c" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control">{{ old('remarks2c') }}</textarea>
                                        @error('remarks2c')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2d</td>
                                    <td  class="fontA">Adoption,
                                        implementation and monitoring of national/ sectoral
                                        nutrition policies
                                        <br><br>
                                        Executive Order 51: National Code of Marketing Breastmilk Substitutes, Breastmilk
                                        Supplements and Other Related Products
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of EO 51
                                    </td>
                                    <td  class="fontA">
                                        The barangay has a
                                        resolution/ ordinance/
                                        Executive Order and/or a line item in the Approved Annual Budget on EO 51 -
                                        related concerns
                                    </td>
                                    <td  class="fontA">The barangay
                                        conducted activities to promote compliance to EO 51
                                    </td>
                                    <td  class="fontA">The barangay
                                        conducted activities
                                        to monitor
                                        compliance to EO 51
                                    </td>
                                    <td  class="fontA">The barangay conducted activities to promote and monitor compliance to EO 51 and
                                        reporting of results during BNC meetings
                                    </td>
                                    <td  class="fontA">
                                        Copy of the law
                                        Resolution/ Ordinance
                                        Barangay Nutrition
                                        Action Plan
                                        Approved Annual
                                        Budget
                                        Documentation of
                                        promotion and monitoring
                                    </td>
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2d">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2d') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2d') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2d') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2d') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2d') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2d')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea name="remarks2d" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" class="form-control">{{ old('remarks2d') }}</textarea>
                                        @error('remarks2d')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2e</td>
                                    <td  class="fontA">Republic Act 10028:
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
                                    <td  class="fontA">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of RA 10028 and/or DILG MC 2011-54
                                    </td>
                                    <td  class="fontA">The barangay has a resolution/ ordinance and/or budget in the Approved Annual
                                        Budget on RA 10028 - related concerns
                                    </td>
                                    <td  class="fontA">The barangay
                                        conducted activities to promote
                                        compliance to the law
                                    </td>
                                    <td  class="fontA">The barangay
                                        conducted activities to monitor compliance to RA 10028
                                    </td>
                                    <td  class="fontA">
                                        The barangay conducted
                                        activities to monitor
                                        compliance to RA 10028 and maintains an updated masterlist of establishments/
                                        offices with lactation stations
                                    </td>
                                    <td  class="fontA">
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
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2e">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2e') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2e') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2e') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2e') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2e') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2e')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2e">{{ old('remarks2e') }}</textarea>
                                        @error('remarks2e')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2f</td>
                                    <td  class="fontA">Republic Act 8172: An Act for Salt Iodization Nationwide (ASIN Law)</td>
                                    <td  class="fontA">The barangay
                                        maintains a printed/
                                        electronic copy of RA 8172
                                    </td>
                                    <td  class="fontA">The barangay has a
                                        resolution/ ordinance
                                        and/or budget in the Approved Annual Budget on RA 8172 - related
                                        concerns
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        conducted activities to promote compliance to the law
                                    </td>
                                    <td  class="fontA"> The barangay
                                        conducted activities to monitor compliance to RA 8172
                                    </td>
                                    <td  class="fontA">
                                        The barangay conducted activities to monitor
                                        compliance to RA 8172 and maintains an updated masterlist of retail stores
                                        selling iodized salt
                                    </td>
                                    <td  class="fontA">
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
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2f">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2f') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2f') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2f') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2f') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2f') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2f')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2f">{{ old('remarks2f') }}</textarea>
                                        @error('remarks2f')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td  class="fontA bold">2g</td>
                                    <td  class="fontA">Republic Act 8976:
                                        Philippine Food
                                        Fortification Act</td>
                                    <td  class="fontA">The barangay
                                        maintains a printed/
                                        electronic copy of RA 8976
                                    </td>
                                    <td  class="fontA">The barangay has a resolution/ ordinance and/or budget in the Approved Annual
                                        Budget on RA 8976 - related concerns
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        conducted activities to promote compliance to the law
                                    </td>
                                    <td  class="fontA">The barangay
                                        conducted activities to monitor compliance to RA 8976</td>
                                    <td  class="fontA"> The barangay conducted
                                        activities to monitor
                                        compliance to RA 8976 and maintains an updated masterlist of retail stores
                                        selling fortified foods</td>
                                    <td  class="fontA">Copy of the law
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
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2g">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2g') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2g') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2g') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2g') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2g') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2g')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2g">{{ old('remarks2g') }}</textarea>
                                        @error('remarks2g')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2h</td>
                                    <td  class="fontA">
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
                                    <td  class="fontA">The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution No. 1 S. 2017 and/or DILG MC 2018-42
                                    </td>
                                    <td  class="fontA">The activities in the
                                        Barangay Nutrition
                                        Action Plan are
                                        aligned with the
                                        priorities of the
                                        PPAN 2017-2022
                                    </td>
                                    <td  class="fontA">
                                        The activities in the Barangay Nutrition Action Plan are aligned with the
                                        priorities of the PPAN 2017-2022 are allocated with budget based on the approved
                                        annual budget
                                    </td>
                                    <td  class="fontA">
                                        The BNC monitors implementation of the PPAN priorities in the Barangay Nutrition
                                        Action Plan
                                    </td>
                                    <td  class="fontA">
                                        The BNC discuss the result of monitoring and identify action lines to improve
                                        implementation of the PPAN priorities
                                    </td>
                                    <td  class="fontA"> Resolutions
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
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2h">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2h') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2h') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2h') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2h') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2h') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2h')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2h">{{ old('remarks2h') }}</textarea>
                                        @error('remarks2h')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2i</td>
                                    <td  class="fontA">
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
                                    <td  class="fontA">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution
                                        No. 3 S. 2012 and No. 3 S. 2018
                                    </td>
                                    <td  class="fontA">
                                        The barangay has any type of height and length measuring tools available in the
                                        barangay
                                    </td>
                                    <td  class="fontA">
                                        The barangay uses the type of height and length measuring tools of wooden/
                                        non-wood material prescribed in the guidelines
                                    </td>
                                    <td  class="fontA">
                                        The barangay uses verified height and length measuring tools of wooden/ non-wood
                                        material prescribed in the guidelines
                                    </td>
                                    <td  class="fontA">
                                        The barangay uses verified height and length measuring tools of wooden/ non-wood
                                        material as prescribed in the guidelines and allocates budget for maintenance/
                                        replacement of height and length measuirng tools as necessary
                                    </td>
                                    <td  class="fontA">
                                        Approved Annual
                                        Budget
                                        Local Nutrition
                                        Action Plan
                                        OPT Plus Report
                                    </td>
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2i">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2i') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2i') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2i') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2i') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2i') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2i')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2i">{{ old('remarks2i') }}</textarea>
                                        @error('remarks2i')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2j</td>
                                    <td  class="fontA">
                                        NNC Governing
                                        Board Resolution
                                        No.2 S.2012:
                                        Approving the
                                        Revised
                                        Implementing
                                        Guidelines on
                                        OPT Plus
                                    </td>
                                    <td  class="fontA">The LNC maintains a printed/ electronic copy of NNC GB Resolution No. 3
                                        S.2012</td>
                                    <td  class="fontA">The barangay conducts OPT Plus but not in accordance to the guidelines on the
                                        ff:
                                        <br><br>
                                        1. Use of proper
                                        measurement tools
                                        <br>
                                        2. At least 80% coverage
                                        <br>
                                        3. Timely submission
                                    </td>
                                    <td  class="fontA">The barangay conducts OPT Plus as provided in the guidelines:
                                        <br><br>
                                        1. Use of proper
                                        measurement tools
                                        <br>
                                        2. At least 80%
                                        coverage
                                        <br>
                                        3. Timely submission
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        conducts OPT Plus as provided in the guidelines and uses E-OPT
                                    </td>
                                    <td  class="fontA">
                                        The barangay conducts OPT Plus, utilizes the E-OPT tool and disseminates results
                                        during the BNC meetings
                                    </td>
                                    <td  class="fontA">
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
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2j">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2j') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2j') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2j') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2j') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2j') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2j')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2j">{{ old('remarks2j') }}</textarea>
                                        @error('remarks2j')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2k</td>
                                    <td  class="fontA">
                                        NNC Governing
                                        Board Resolution No. 6 series of 2012: Adoption of the 2012 Nutritional Guidelines
                                        for Filipinos
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution No. 6 S. 2012
                                    </td>
                                    <td  class="fontA">
                                        The barangay has a
                                        resolution, ordinance,
                                        Executive Order
                                        in support to the
                                        resolution
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        implemented at least one activity with multi-stakeholder participation to
                                        promote the NGF
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        conducted more than one activity to promote the NGF
                                    </td>
                                    <td  class="fontA">
                                        The barangay conducted more than one activity to promote the NGF using more than
                                        one media/ platform
                                    </td>
                                    <td  class="fontA">
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
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2k">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2k') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2k') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2k') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2k') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2k') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2k')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2k">{{ old('remarks2k') }}</textarea>
                                        @error('remarks2k')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="fontA bold">2l</td>
                                    <td  class="fontA">
                                        NNC Governing
                                        Board Resolution No. 2 series of 2009: Adopting the National Policy on Nutrition
                                        Management in Emergencies and Disasters
                                    </td>
                                    <td  class="fontA">
                                        The barangay
                                        maintains a printed/
                                        electronic copy of NNC GB Resolution
                                        No. 2 S. 2009
                                    </td>
                                    <td  class="fontA">
                                        The barangay designated
                                        the lead or focal point for Nutrition-in-Emergencies
                                    </td>
                                    <td  class="fontA">
                                        The barangay has issued a resolution organizing the nutrition cluster in the
                                        area
                                    </td>
                                    <td  class="fontA">
                                        Barangay Nutrition Cluster has been formed and planning has been initiated/
                                        completed
                                    </td>
                                    <td  class="fontA">
                                        Barangay Nutrition
                                        Cluster has been
                                        formed and integrated
                                        with the BDRRMC with allocated budget
                                    </td>
                                    <td  class="fontA">
                                        Resolutions
                                        Ordinances
                                        Executive Order
                                        Barangay Nutrition
                                        Action Plan
                                        NIEM Plan
                                        Minutes of meeting
                                    </td>
                                    <td  class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating2l">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php echo (old('rating2l') == '1' ? 'selected' : '')  ?>>1</option>
                                            <option value="2" <?php echo (old('rating2l') == '2' ? 'selected' : '')  ?>>2</option>
                                            <option value="3" <?php echo (old('rating2l') == '3' ? 'selected' : '')  ?>>3</option>
                                            <option value="4" <?php echo (old('rating2l') == '4' ? 'selected' : '')  ?>>4</option>
                                            <option value="4" <?php echo (old('rating2l') == '5' ? 'selected' : '')  ?>>5</option>
                                        </select>
                                        @error('rating2l')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks2l">{{ old('remarks2l') }}</textarea>
                                        @error('remarks2l')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                        <button type="button" class="bold btn btn-warning" style="margin-right:6px" data-toggle="modal" data-target="#exampleModalCenterDraft">
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

  <!-- alert Modal -->
@include('Modal.Draft')

<!-- alert Modal -->
@include('Modal.Submit')

@endsection