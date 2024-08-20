<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
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
'namePage' => 'Vision Mission',
'activePage' => 'VISION',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">

            <div class="d-flex justify-content-end center" style="padding-right:20px; ">

                <form action="{{route('CMSvisionmission.download',$row->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="htmlContent" id="htmlContent">
                    <button type="submit" id="hiddenButton" style="display: none;"></button>
                </form>

                <div style="display:absolute;" onclick="downloadPDF('{{$row->id}}')">
                    <i class="fa fa-file-pdf-o fa-lg cursor " style="color:red;margin-right:7px;" aria-hidden="true"></i>
                    <label class="download">Download file</label>
                </div>


            </div>

            <div id="downloadable">
                <div style="display:flex;align-items:center">
                    <a href="#">
                        <h5 class="title" style="margin:0px">FORM B: BARANGAY PROFILE SHEET</h5>
                    </a>
                </div>

                <div style="margin-right:15px">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a style="font-family: Arial, sans-serif;font-style:italic" href="{{route('CMSLGUprofile.index')}}">Mellpi Pro for LGU Profile</a></li>
                            <li class="breadcrumb-item active" style="font-style:italic" aria-current="page">Form B: Barangay Profile Sheet -
                                <?php echo auth()->user()->barangay ?>
                            </li>
                        </ol>
                    </nav>
                </div>


                <div style="margin-top:30px">

                @include('layouts.page_template.location_header')

                    <div class="row table-responsive" style="display:flex;padding:10px;">
                        <table class="table table-striped table-hover">
                            <thead style="background-color:#508D4E;">
                                <th class="text-center">&nbsp;</th>
                                <th class="tableheader"><b>Elements</b></th>
                                <th colspan="5" class="tableheader"><b>Performance Level<b></th>
                                <th class="tableheader"><b>Document Source</b></th>
                                <th class="tableheader" style="padding-left:20px;padding-right:20px"><b>Rating</b></th>
                                <th class="tableheader"><b>Remarks</b></th>
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
                                <tr>
                                    <td  class="fontA bold">1a</td>
                                    <td  class="fontA">Presence and knowledge of vision mission statement</td>
                                    <td  class="fontA">A vision mission statement for nutrition was formulated but not reflected in the Barangay Nutrition Action Plan</td>
                                    <td  class="fontA">A vision mission statement for nutrition was formulated and reflected in the Barangay Nutrition Action Plan</td>
                                    <td  class="fontA">The vision mission statement for nutrition program exists and disseminated to BNC members</td>
                                    <td  class="fontA">The vision mission statement for nutrition program exists and disseminated to BNC members and other stakeholders</td>
                                    <td  class="fontA">The vision mission statement for nutrition program exists and to BNC members, stakeholders and to the rest of the community</td>
                                    <td  class="fontA"> Barangay Nutrition Action Plan Minutes of Meeting Documentation of dissemination</td>
                                    <td  class="fontA"> <select id="loadProvince1" class="form-control" name="rating1a">
                                            <option>Select</option>
                                            <option value="1" {{ old('rating1a', $row->rating1a) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating1a', $row->rating1a) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating1a', $row->rating1a) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating1a', $row->rating1a) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating1a', $row->rating1a) == '5' ? 'selected' : '' }}>5</option>
                                        </select></td>
                                    <td><textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks1a">{{ old('remarks1a', $row->remarks1a) }}</textarea></td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">1b</td>
                                    <td class="fontA">Presence of nutrition-related concerns in the Barangay Development Plan</td>
                                    <td class="fontA">Nutrition-related PAP is integrated in one of the sectoral plans in the Barangay Development Plan</td>
                                    <td class="fontA">Nutrition-related PAP are integrated in at least two of the sectoral plans in the Barangay Development Plan</td>
                                    <td class="fontA">PPAN-related PAP are integrated in at least three of the sectoral plans in the Barangay Development Plan</td>
                                    <td class="fontA">Nutrition-related objectives are included in at least three of the sectoral plans </td>
                                    <td class="fontA">Nutrition outcomes included in the overall success indicators of the Barangay Development Plan</td>
                                    <td class="fontA">Barangay Development Plan</td>
                                    <td class="fontA"><select id="loadProvince1" class="form-control" name="rating1b">
                                            <option value="1" {{ old('rating1b', $row->rating1b) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating1b', $row->rating1b) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating1b', $row->rating1b) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating1b', $row->rating1b) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating1b', $row->rating1b) == '5' ? 'selected' : '' }}>5</option>
                                        </select></td>
                                    <td>
                                        <textarea class="form-control" style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks1b"> {{ old('remarks1b', $row->remarks1b) }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fontA bold">1c</td>
                                    <td class="fontA">Presence of nutrition-related concerns in the Annual Investment Program</td>
                                    <td class="fontA">At least one nutrition-related PAP integrated in the Annual Investment Program</td>
                                    <td class="fontA">At least two nutrition-related PAP integrated in the Annual Investment Program</td>
                                    <td class="fontA">At least three PPAN-related PAP integrated in the Annual Investment Program</td>
                                    <td class="fontA">At least four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program </td>
                                    <td class="fontA">More than four PPAN-related PAP and/or PS for nutrition integrated in the Annual Investment Program</td>
                                    <td class="fontA">Annual Investment Program</td>
                                    <td class="fontA">
                                        <select id="loadProvince1" class="form-control" name="rating1c">
                                            <option>Select</option>
                                            <option value="1" {{ old('rating1c', $row->rating1c) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating1c', $row->rating1c) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating1c', $row->rating1c) == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating1c', $row->rating1c) == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating1c', $row->rating1c) == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea class="form-control"  style="width:inherit;height:300px;max-height:1050px!important;line-height:1.5;" name="remarks1c">{{ old('remarks1c', $row->remarks1c) }}</textarea>
                                </tr>
 

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection