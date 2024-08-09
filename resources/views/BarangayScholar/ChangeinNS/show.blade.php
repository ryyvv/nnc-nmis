<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
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
'namePage' => 'Change Nutrition Status',
'activePage' => 'changeNS',
'activeNav' => '',
])



@section('content')

<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
    <div style="display:flex;align-items:center">
            <a href="{{route('changeNS.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
            <h4 style="margin-top:18px;font-weight:bold">MELLPI Pro FORM B 2a: CHANGES IN THE NUTRITIONAL STATUS IN THE BARANGAY</h4>
        </div> 

 

        <div>
   
                 <!-- header -->
                 @include('layouts.page_template.location_header')
                <!-- endheader -->
                

                <div class="row table-responsive" style="display:flex;padding:10px;">
                    <table class="table table-striped table-hover">
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
                            <tr>
                                <td class="fontA bold">1</td>
                                <td class="fontA">Prevalence of
                                    underweight children
                                    0-59 months</td>
                                <td class="fontA">Prevalence is within very high level of public health significance (>15%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within high level of public health significance (10 to < 15%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the middle to upper limit of medium level of public health significance (7.5 to < 10%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the lower limit of medium public health significance (5 to < 7.5%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the low level of public health significance (< 5%) in the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan Operation Timbang Report (Previous and current years)</td>
                                <td class="fontA"> 
                                    <select id="loadProvince1" class="form-control" name="rating6a">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6a', $row->rating6a) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6a', $row->rating6a) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6a', $row->rating6a) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6a', $row->rating6a) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6a', $row->rating6a) == '5' ? 'selected' : '' }}>5</option>  
                                    </select>
                                    @error('rating6a')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6a">{{ old('remarks6a', $row->remarks6a) }}</textarea>
                                    @error('remarks6a')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="fontA bold">2</td>
                                <td class="fontA">Prevalence of
                                    stunted children
                                    0-59 months</td>
                                <td class="fontA">Prevalence is within very high level of public health significance (>30%) in the year evaluated</td>

                                <td class="fontA">Prevalence is within high level of public health significance (20 to < 30%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the middle to upper limit of medium level of public health significance (15 to < 20%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the lower limit of medium public health significance (10 to < 15%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the low level of public health significance (< 10%) in the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Operation Timbang Report (Previous and current years)</td>
                                <td class="fontA"><select id="loadProvince1" class="form-control" name="rating6b">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6a', $row->rating6a) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6a', $row->rating6a) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6a', $row->rating6a) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6a', $row->rating6a) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6a', $row->rating6a) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6b')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;"
                                     class="form-control" name="remarks6b"> {{ old('remarks6a', $row->remarks6a) }}</textarea>
                                    @error('remarks6b')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="fontA bold">3</td>
                                <td class="fontA">Prevalence of
                                    stunted children
                                    0-59 months</td>
                                <td class="fontA">Prevalence is within very high level of public health significance (>30%) in the year evaluated</td>

                                <td class="fontA">Prevalence is within high level of public health significance (20 to < 30%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the middle to upper limit of medium level of public health significance (15 to < 20%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the lower limit of medium public health significance (10 to < 15%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the low level of public health significance (< 10%) in the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Operation Timbang Report (Previous and current years)</td>
                                <td class="fontA"><select id="loadProvince1" class="form-control" name="rating6c">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6a', $row->rating6a) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6a', $row->rating6a) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6a', $row->rating6a) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6a', $row->rating6a) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6a', $row->rating6a) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6c')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6c"> {{ old('remarks6a', $row->remarks6a) }}</textarea>
                                    @error('remarks6c')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

        
                            <tr>
                                <td class="fontA bold">4</td>
                                <td class="fontA">Prevalence of
                                    overweight and obese children
                                    0-59 months</td>
                                <td class="fontA">Prevalence is within very high level of public health significance (>15%) in the year evaluated</td>

                                <td class="fontA">Prevalence is within high level of public health significance (10 to < 15%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the middle to upper limit of medium level of public health significance (7.5 to < 10%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the lower limit of medium public health significance (5 to < 7.5%) in the year evaluated</td>
                                <td class="fontA">Prevalence is within the low level of public health significance (< 5%) in the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Operation Timbang Report (Previous and current years)</td>
                                <td class="fontA">
                                    <select id="loadProvince1" class="form-control" name="rating6d">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6a', $row->rating6a) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6a', $row->rating6a) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6a', $row->rating6a) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6a', $row->rating6a) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6a', $row->rating6a) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6d')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6d"> {{ old('remarks6a', $row->remarks6a) }}</textarea>
                                    @error('remarks6d')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="fontA bold">5</td>
                                <td class="fontA">Prevalence of
                                    wasted school children</td>
                                <td class="fontA">Increased prevalence from previous year and the year evaluated</td>

                                <td class="fontA">No change in prevalence from previous year and the year evaluated</td>
                                <td class="fontA">Decreased prevalence from previous year and the year evaluated</td>
                                <td class="fontA">Sustained decrease or prevalence maintained within medium public health significance (< 10%) from two years prior to the year evaluated</td>
                                <td class="fontA">Maintenance of the prevalence of malnutrition to lower than public health significance (< 5%) from two years prior to the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Operation Timbang Report (Previous and current years)</td>
                                <td class="fontA">
                                    <select id="loadProvince1" class="form-control" name="rating6e">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6e', $row->rating6e) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6e', $row->rating6e) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6e', $row->rating6e) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6e', $row->rating6e) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6e', $row->rating6e) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6e')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6e">{{ old('remarks6e', $row->remarks6e) }}</textarea>
                                    @error('remarks6e')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>


                            <tr>
                                <td class="fontA bold">6</td>
                                <td class="fontA">Prevalence of
                                    overweight and obese school children</td>
                                <td class="fontA">Increased prevalence from previous year and the year evaluated</td>

                                <td class="fontA">No change in prevalence from previous year and the year evaluated</td>
                                <td class="fontA">Decreased prevalence from previous year and the year evaluated</td>
                                <td class="fontA">Sustained decrease or prevalence maintained within medium public health significance (< 10%) from two years prior to the year evaluated</td>
                                <td class="fontA">Maintenance of the prevalence of malnutrition to lower than public health significance (< 5%) from two years prior to the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    School Weighing Report (Previous and current years)</td>
                                <td class="fontA">
                                    <select id="loadProvince1" class="form-control" name="rating6f">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6f', $row->rating6f) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6f', $row->rating6f) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6f', $row->rating6f) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6f', $row->rating6f) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6f', $row->rating6f) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6g')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6f">{{ old('remarks6f', $row->remarks6f) }}</textarea>
                                    @error('remarks6f')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="fontA bold">7</td>
                                <td class="fontA">Prevalence of
                                    nutritionally at-risk pregnant women</td>
                                <td class="fontA">Increased prevalence from previous year and the year evaluated</td>

                                <td class="fontA">No change in prevalence from previous year and the year evaluated</td>
                                <td class="fontA">Decreased prevalence from previous year and the year evaluated</td>
                                <td class="fontA">Sustained decrease or prevalence maintained within medium public health significance (< 10%) from two years prior to the year evaluated</td>
                                <td class="fontA">Maintenance of the prevalence of malnutrition to lower than public health significance (< 5%) from two years prior to the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action Plan
                                    Prenatal records
                                    Barangay Health Station reports</td>
                                <td class="fontA">
                                    <select id="loadProvince1" class="form-control" name="rating6g">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6g', $row->rating6g) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6g', $row->rating6g) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6g', $row->rating6g) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6g', $row->rating6g) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6g', $row->rating6g) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6g')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6g">{{ old('remarks6g', $row->remarks6g) }}</textarea>
                                    @error('remarks6g')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="fontA bold">8</td>
                                <td class="fontA">Operation Timbang Plus Coverage</td>
                                <td class="fontA">Operation Timbang Plus coverage is < 60% in the year evaluated</td>

                                <td class="fontA">Operation Timbang Plus coverage is < 80% or>110% in the year evaluated </td>
                                <td class="fontA">Operation Timbang Plus coverage is at least 80% in the year evaluated</td>
                                <td class="fontA">Operation Timbang Plus coverage is at least 90% in the year evaluated</td>
                                <td class="fontA">Operation Timbang Plus coverage is at 100 - 110% in the year evaluated</td>
                                <td class="fontA">Barangay Nutrition Action PlanOperation Timbang Report (Previous and current years)</td>
                                <td class="fontA">
                                    <select id="loadProvince1" class="form-control" name="rating6h">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('rating6h', $row->rating6h) == '1' ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ old('rating6h', $row->rating6h) == '2' ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ old('rating6h', $row->rating6h) == '3' ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ old('rating6h', $row->rating6h) == '4' ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ old('rating6h', $row->rating6h) == '5' ? 'selected' : '' }}>5</option> 
                                    </select>
                                    @error('rating6h')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <textarea style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" 
                                    class="form-control" name="remarks6h">{{ old('remarks6h', $row->remarks6h) }}</textarea>
                                    @error('remarks6h')
                                    <div class="text-danger">{{ $message  }}</div>
                                    @enderror
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        </div>
 
    </div>
</div>
</div>
 


@endsection