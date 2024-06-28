<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">

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

@extends('layouts.BSapp', [
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'profile',
'activeNav' => '',
])


@section('content')

<div class="panel-header panel-header-sm"></div>
<div class="content" style="padding:2%">
    <div class="card">
        <h4>MELLPI PRO FORM B: BARANGAY PROFILE SHEET</h4>
        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
            <form action="{{ route('visionmission.store') }}" method="POST">
                @csrf

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="dateCreated" value="05/19/2024">
                <input type="hidden" name="dateUpdates" value="05/19/2024">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <!-- header -->
                <div style="display:flex">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Barangay:</label>
                        <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Municipality/City:</label>
                        <input type="text" class="form-control" name="municipal_id"
                            value="{{auth()->user()->city_municipal }}">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Province:</label>
                        <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}">
                        <input type="hidden" class="form-control" name="region_id" value="{{auth()->user()->Region}}">
                    </div>

                </div>
                <br>
                <div style="display:flex">

                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Date of Monitoring:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dateMonitoring">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCovereda">
                    </div>
                    <div class="form-group col">
                        <label for="exampleFormControlInput1">Period Covered:</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" data-date-format="mm-yyyy"
                            name="periodCoveredb">
                    </div>
                </div>
                <!-- endheader -->
                <br>
                <br>
                <div>
                    <!--tablehearder -->
                    <div class="row-12" style="display:flex;background-color:#F5F5F5;padding:10px;border-radius:5px;">
                        <div class="justify-content-center">
                            <label for="exampleFormControlInput1"></label>
                        </div>
                        <div class="col justify-content-center">
                            <label for="exampleFormControlInput1"><b>Dimensions</b></label>
                        </div>
                        <div class="col " style="padding:0px!important">
                            <label for="exampleFormControlInput1"><b>What are the good practices
                                    done/initiated?</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>What are the issues and problems and
                                    why?</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>What local initiatives have been done?</b></label>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1"><b>What are the immediate actions for
                                    improvement?</b></label>
                        </div>
                    </div>
                    <!-- endtablehearder -->

                    <!-- 1 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>1</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                                Vision and Mission
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                    </div>

                    <!-- 2 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>2</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                                Nutrition Laws and Policies
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                    </div>

                    <!-- 3 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>3</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Governance and Organizational
                            Structure
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                    </div>

                    <!-- 4 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>4</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Local Nutrition Committee
                            Management Functions
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                    </div>

                    <!-- 5 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>5</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Nutrition Interventions/ Services
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                    </div>

                    <!-- 6 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>6</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <label for="exampleFormControlInput1">
                            Changes in Nutritional Status in
                            the Local Government Unit
                            </label>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="remarks1a" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px"></textarea>
                        </div>
                    </div>

                </div>


                <div class="row" style="margin-top:30px;margin-right:20px;justify-content: flex-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection