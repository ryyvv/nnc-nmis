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
                                    <label for="nameOf"> HEADER:</label>
                                    <select id="header" class="form-control" name="header">
                                        @foreach ($availableForms as $formKey => $formName)
                                            <option value="{{ $formKey }}" <?php echo $row->header == $formKey ? 'selected':'' ?> >{{ $formName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                            </div>
                            <br />
                           
                           
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="nameOf" id="nameOf">Name  </label>
                                    <input class="form-control" type="text" name="nameOf" id="nameOf" value="{{ old('nameOf',$row->nameofPnao) }}">
                                    @error('nameOf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="address">Address: </label>
                                    <input class="form-control" type="text" name="address" id="address" value="{{ old('address',$row->address) }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <!-- For Barangay Level -->
                                @if( auth()->user()->otherrole == 9 )
                                <div class="form-group col">
                                    <label for="address">Province of Deployment: </label>
                                    <select name="municipal_id2" class="form-control" style="font-weight:bolder!important;color:black" disabled>
                                        @foreach($cities_municipalities as $city_municipality)
                                        <option value="{{ $city_municipality->citymun_code }}"
                                            {{ $row->address === $city_municipality->citymun_code ? 'selected' : '' }}>
                                            {{ $city_municipality->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- For Municipality Level -->
                                @elseif( auth()->user()->otherrole == 10 )
                                <div class="form-group col">
                                    <label for="education">Educational Attainment: </label>
                                    <input class="form-control" type="text" name="education" id="education" value="{{ old('education', $row->education) }}">
                                    @error('education')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                @endif

                            </div>

                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="sex">Sex: </label>
                                    <select class="form-control" name="sex" id="sex">
                                            <option {{ old('sex', $row->sex) == '' ? 'selected' : '' }} value="">Select</option>
                                            <option value="Male" {{ old('sex', $row->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('sex', $row->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('sex')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col" id="dateDesigBlock" style="display: none;">
                                        <label for="dateDesig">Date of Designation: </label>
                                        <input class="form-control" type="date" name="dateDesig" id="dateDesig" value="{{ old('dateDesig',$row->dateDesignation) }}">
                                        @error('dateDesig')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col" id="dateAppointBlock" style="display: block;">
                                        <label for="dateAppoint">Date of Appointment: </label>
                                        <input class="form-control" type="date" name="dateAppoint" id="dateAppoint" value="{{ old('dateAppoint', $row->dateappointment) }}">
                                        @error('dateAppoint')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col" id="pro_activitiesBlock" style="display: none;">
                                        <label for="profAct">With continuing professional activities? </label>
                                        <input class="form-control" type="text" name="profAct" id="profAct" value="{{ old('profAct', $row->profAct) }}">
                                        @error('profAct')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>


                            <div style="display:flex">
                                <div class="form-group col" id="numYrBlock" style="display: none;">
                                    <!-- This is dynamic -->
                                    <label for="numYr" id="numYr"> </label> 
                                    <input class="form-control" type="number" name="numYr" id="numYr" placeholder="0" min="1" max="100" value="{{ old('numYr',$row->numYearPnao) }}">
                                    @error('numYr')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="fulltime">Full time: </label>
                                    <select class="form-control" name="fulltime" id="fulltime">
                                            <option {{ old('fulltime', $row->fulltime) == '' ? 'selected' : '' }} value="">Select</option>
                                            <option value="Yes" {{ old('fulltime', $row->fulltime) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('fulltime', $row->fulltime) == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('fulltime')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col" id="profActBlock" style="display: block;" >
                                    <label for="profAct">With continuing professional Activities?: </label>
                                    <select class="form-control" name="profAct" id="profAct">
                                            <option {{ old('profAct', $row->profAct) == '' ? 'selected' : '' }} value="">Select</option>
                                            <option value="Yes" {{ old('profAct', $row->profAct) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('profAct', $row->profAct) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('profAct')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                   
                                </div>
                                <div class="form-group col">
                                        <label for="bday">Birthday: </label>
                                        <input class="form-control" type="date" name="bday" id="bday" value="{{ old('bday',$row->bdate) }}">
                                        @error('bday')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                           
                            <div style="display:flex">
                                <div class="form-group col" id="secondedBlock" style="display:block" >
                                    <label for="seconded">Seconded from the Office of: </label>
                                    <input class="form-control" type="text" name="seconded" id="seconded" value="{{ old('seconded',$row->secondedOffice) }}">
                                    @error('seconded')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                                <div class="form-group col">
                                <label for="periodCovereda">For Period:</label>
                                <select class="form-control" id="periodCovereda" name="periodCovereda" required>
                                    <option value="" value="">Select</option>
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
                            
                            <!-- Barangay Level -->
                            @if( auth()->user()->otherrole == 10 )
                            <div style="display:flex">
                                <div class="form-group col" id="brgy_serviceBlock" style="display: block;" >
                                    <label for="brgy_service">Graduated from a 5-day training on nutrition assessment and nutrition-related topics before barangay service: </label>
                                    <select class="form-control" name="brgy_service" id="brgy_service">
                                            <option value="">Select</option>
                                            <option value="Yes" {{ old('brgy_service', $row->brgy_service) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('brgy_service', $row->brgy_service) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('brgy_service')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                   
                                </div>
                                <div class="form-group col">
                                        <label for="cont_education">Completed a 5-day BNS continuing education </label>
                                        <select class="form-control" name="cont_education" id="cont_education">
                                            <option value="">Select</option>
                                            <option value="Yes" {{ old('cont_education', $row->cont_education) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ old('cont_education', $row->cont_education) == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('cont_education')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            @endif

                            <div style="display:flex">
                                <div class="form-group col">
                                    <label>Capacity development activities attended in the previous year: </label>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">1</label>
                                        <input class="form-control" type="text" id="devAct" name="num1" value="{{ old('num1',$row->devActnum1) }}">
                                        @error('num1')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">2</label>
                                        <input class="form-control" type="text" id="devAct" name="num2" value="{{ old('num2',$row->devActnum2) }}">
                                        @error('num2')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">3</label>
                                        <input class="form-control" type="text" id="devAct" name="num3" value="{{ old('num3',$row->devActnum3) }}">
                                        @error('num3')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col" id="assign_taskBlock" style="display: none;" > 
                                    <label>Assigned tasks: </label>
                                    <br />
                                     <span><input type="radio" name="assign_task" <?= $row->assign_task == 'BNS supervisor' ? 'selected':'' ?> value="BNS supervisor">&nbsp;&nbsp;BNS supervisor</span>
                                     <br />
                                     <span><input type="radio" name="assign_task" <?= $row->assign_task == 'Technical assistance' ? 'selected':'' ?>  value="Technical assistance">&nbsp;&nbsp;Technical assistance</span>
                                     <br />
                                     <span><input type="radio" name="assign_task" <?= $row->assign_task == 'Review of BNS reports and report preparation' ? 'selected':'' ?> value="Review of BNS reports and report preparation">&nbsp;&nbsp;Review of BNS reports and report preparation</span>
                                     <br />
                                     <span><input type="radio" name="assign_task" <?= $row->assign_task == 'All of the above' ? 'selected':'' ?> value="All of the above">&nbsp;&nbsp;All of the above</span>
                                </div>
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

