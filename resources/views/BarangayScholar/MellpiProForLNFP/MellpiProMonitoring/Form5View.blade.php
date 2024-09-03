<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form5a.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/common.css') }}">
<script src="https://cdn.lordicon.com/lordicon.js"></script> -->
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 5 Monitoring',
'activePage' => 'mellpi_pro_form5',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; align-items:center;">
                        <a href="{{route('MellpiProMonitoringIndex.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <h4>VIEW MELLPI PRO FOR LNFP FORM 5a:</h4>
                    </div>

                    <!-- @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif -->
                    <!-- alert -->
                    @include('layouts.page_template.crud_alert_message')

                    <div>
                   
                          

                            <div style="display:flex">
                            <div class="form-group col">
                                <label for="nameOf"> HEADER: </label>
                                <select class="form-control" name="header" id="header">
                                    <option>Select</option>
                                    <!-- For provincial staff -->
                                    @if( auth()->user()->role == 7 )
                                    <option value="5a">MELLPI PRO FORM 5a: PROVINCIAL NUTRITION ACTION OFFICER MONITORING</option>
                                    <!-- For City Municipal staff -->
                                    @elseif( auth()->user()->role == 7 || auth()->user()->role == 9 )
                                    <option value="5b">MELLPI PRO FORM 5b: CITY/MUNICIPAL NUTRITION ACTION OFFICER MONITORING</option>
                                    <option value="5c1">MELLPI PRO FORM 5c.1: DISTRICT NUTRITION PROGRAM COORDINATOR MONITORING</option>
                                    <option value="5c2">MELLPI PRO FORM 5c.2: CITY/MUNICIPAL NUTRITION PROGRAM COORDINATOR MONITORING</option>
                                    <!-- For barangay staff -->
                                    @elseif( auth()->user()->role == 7 || auth()->user()->role == 10 )
                                    <option value="MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING" selected >MELLPI PRO FORM 5d: BARANGAY NUTRITION SCHOLAR MONITORING</option>
                                    @endif
                                </select>
                            </div>
                            
                            </div>
                            <br />
                           
                           
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="nameOf">Name of PNAO: </label>
                                    <input class="form-control" type="text" name="nameOf" id="nameOf" value="{{ $row->nameofPnao }}">
                                    @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="address">Address: </label>
                                    <input class="form-control" type="text" name="address" id="address" value="{{ $row->address }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="numYr">Number of Years PNAO: </label>
                                    <input class="form-control" type="number" name="numYr" id="numYr" placeholder="0" min="1" max="100" value="{{ $row->numYearPnao }}">
                                    @error('numYr')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="fulltime">Full time: </label>
                                    <select class="form-control" name="fulltime" id="fulltime">
                                            <option {{ old('fulltime', $row->fulltime) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Yes" {{ old('fulltime', $row->fulltime) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('fulltime', $row->fulltime) == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('fulltime')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="profAct">With continuing professional Activities?: </label>
                                    <select class="form-control" name="profAct" id="profAct">
                                            <option {{ old('profAct', $row->profAct) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Yes" {{ old('profAct', $row->profAct) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('profAct', $row->profAct) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('profAct')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                   
                                </div>
                                <div class="form-group col">
                                        <label for="bday">Birthday: </label>
                                        <input class="form-control" type="date" name="bday" id="bday" value="{{ $row->bdate }}">
                                        @error('bday')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="sex">Sex: </label>
                                    <select class="form-control" name="sex" id="sex">
                                            <option {{ old('sex', $row->sex) == '' ? 'selected' : '' }}>Select</option>
                                            <option value="Male" {{ old('sex', $row->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('sex', $row->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('sex')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col">
                                        <label for="dateDesig">Date of Designation: </label>
                                        <input class="form-control" type="date" name="dateDesig" id="dateDesig" value="{{ $row->dateDesignation }}">
                                        @error('dateDesig')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="seconded">Seconded from the Office of: </label>
                                    <input class="form-control" type="text" name="seconded" id="seconded" value="{{ $row->secondedOffice }}">
                                    @error('seconded')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="form-group col">
                                <label for="periodCovereda">For Period:</label>
                                <select class="form-control" id="periodCovereda" name="periodCovereda" required>
                                    <option value="">Select</option>
                                        <?php foreach ($years as $year) : ?>
                                            <option value="{{ $year }}" <?php echo old('periodCovereda') == $year || $row->periodCovereda == $year ? 'selected' : '' ?>>
                                                {{ $year }}
                                            </option>
                                        <?php endforeach; ?>
                                </select>
                                @error('periodCovereda')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label>Capacity development activities attended in the previous year: </label>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">1</label>
                                        <input class="form-control" type="text" id="devAct" name="num1" value="{{ $row->devActnum1 }}">
                                        @error('num1')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">2</label>
                                        <input class="form-control" type="text" id="devAct" name="num2" value="{{ $row->devActnum2 }}">
                                        @error('num2')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">3</label>
                                        <input class="form-control" type="text" id="devAct" name="num3" value="{{ $row->devActnum3 }}">
                                        @error('num3')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col">&nbsp;</div>
                            </div>


                            <div class="form5">
                                <!-- endtablehearder -->
                                <div class="row" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">

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
                                                @foreach ($form5a as $form5a)
                                                <tr>

                                                    <td>{{$form5a->column1}}</td>
                                                    <td>{{$form5a->column2}}</td>
                                                    <td>{{$form5a->column3}}</td>
                                                    <td>{{$form5a->column4}}</td>
                                                    <td>{{$form5a->column5}}</td>
                                                    <td>{{$form5a->column6}}</td>
                                                    <td>{{$form5a->column7}}</td>
                                                    <td>{{$form5a->column8}}</td>
                                                    <td>

                                                    
                                                            <select id="loadProvince1" class="form-control" name="{{$form5a->rating}}">
                                                                <!-- <option value="">Select</option> -->
                                                                <option value="">Select</option>
                                                                <option value="1" {{ old($form5a->rating, $row->{$form5a->rating}) == 1 ? 'selected' : '' }}>1</option>
                                                                <option value="2" {{ old($form5a->rating, $row->{$form5a->rating}) == 2 ? 'selected' : '' }}>2</option>
                                                                <option value="3" {{ old($form5a->rating, $row->{$form5a->rating})== 3 ? 'selected' : '' }}>3</option>
                                                                <option value="4" {{ old($form5a->rating, $row->{$form5a->rating}) == 4 ? 'selected' : '' }}>4</option>
                                                                <option value="5" {{ old($form5a->rating, $row->{$form5a->rating}) == 5 ? 'selected' : '' }}>5</option>
                                                            </select>
                                                            @error($form5a->rating)  
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                    </td>
                                                    <td><textarea name="{{ $form5a->remarks }}" placeholder="Your remarks" class="form-control">{{ $row->{$form5a->remarks} }}</textarea></td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>

                
                       
                    
                            <div class="d-flex bd-highlight mb-3">
                              <div class="mr-auto p-2 bd-highlight">
                                <a href="{{ route('lguLnfpViewProfile', $row->lnfp_lgu_id) }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Previous LGU Profile</a></div>
                              <div class="p-2 bd-highlight">
                                @if( $row->form7_status == 2 )
                                <a href="{{ route('lguLnfpEditForm6', $row->form7_id ) }}"> Next Form 6 and 7 <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div> 
                                @else
                                <a href="{{ route('lguLnfpViewForm6', $row->form7_id ) }}"> Next Form 6 and 7 <i class="fa fa-arrow-right" aria-hidden="true"></i></a> </div> 
                                @endif
                            </div>


                      
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

