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
'namePage' => 'Discussion Question',
'activePage' => 'discussionquestion',
'activeNav' => 'MELLPI PRO For LGU', 
])


@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important"> 
    <div style="display:flex;align-items:center">
      <a href="{{route('CMSdiscussionquestion.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
      <h4 style="margin-top:18px;font-weight:bold">MELLPI PRO FORM B-3: DISCUSSION QUESTIONS FOR LEARNING AND ACTION</h4>
    </div>

        @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif

        <div>
 
                <input type="hidden" name="status" id="status" > 
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <!-- header -->
                @include('layouts.page_template.location_header')
                <!-- endheader -->
                <br>
                <br>
         
              
        
                <div>
                    <!--tablehearder -->
                    <div class="row-12" style="display:flex;background-color:#508D4E;padding:10px;border-radius:5px;">
                        <div class="justify-content-center">
                            <p class="white fontA"  for="exampleFormControlInput1"></p>
                        </div>
                        <div class="col justify-content-center">
                            <p class="white fontA" for="exampleFormControlInput1"><b>Dimensions</b></p>
                        </div>
                        <div class="col " style="padding:0px!important">
                            <p class="white fontA" for="exampleFormControlInput1"><b>What are the good practices
                                    done/initiated?</b></p>
                        </div>
                        <div class="col">
                            <p class="white fontA" for="exampleFormControlInput1"><b>What are the issues and problems and
                                    why?</b></p>
                        </div>
                        <div class="col">
                            <p class="white fontA" for="exampleFormControlInput1"><b>What local initiatives have been done?</b></p>
                        </div>
                        <div class="col">
                            <p class="white fontA" for="exampleFormControlInput1"><b>What are the immediate actions for
                                    improvement?</b></p>
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
                            <p class="fontA" for="exampleFormControlInput1">
                                Vision and Mission
                            </p>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7aa" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7aa', $row->practice7aa) }}</textarea>
                                @error('practice7aa')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ab" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ab', $row->practice7ab) }}</textarea>
                                @error('practice7ab')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ac" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ad', $row->practice7ad) }}</textarea>
                                @error('practice7ac')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ad" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ad', $row->practice7ad) }}</textarea>
                                @error('practice7ad')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <!-- 2 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>2</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <p for="exampleFormControlInput1">
                                Nutrition Laws and Policies
                            </p>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ba" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ba', $row->practice7ba) }}</textarea>
                                @error('practice7ba')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7bb" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7bb', $row->practice7bb) }}</textarea>
                                @error('practice7bb')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7bc" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7bc', $row->practice7bc) }}</textarea>
                                @error('practice7bc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7bd" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7bd', $row->practice7bd) }}</textarea>
                                @error('practice7bd')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <!-- 3 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>3</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <p for="exampleFormControlInput1">
                                Governance and Organizational
                                Structure
                            </p>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ca" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ca', $row->practice7ca) }}</textarea>
                                @error('practice7ca')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7cb" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7cb', $row->practice7cb) }}</textarea>
                                @error('practice7cb')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7cc" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7cc', $row->practice7cc) }}</textarea>
                                @error('practice7cc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7cd" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7cd', $row->practice7cd) }}</textarea>
                                @error('practice7cd')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <!-- 4 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>4</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <p for="exampleFormControlInput1">
                                Local Nutrition Committee
                                Management Functions
                            </p>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7da" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7da', $row->practice7da) }}</textarea>
                                @error('practice7da')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7db" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7db', $row->practice7db) }}</textarea>
                                @error('practice7db')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7dc" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7dc', $row->practice7dc) }}</textarea>
                                @error('practice7dc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7dd" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7dd', $row->practice7dd) }}</textarea>
                                @error('practice7dd')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <!-- 5 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>5</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <p for="exampleFormControlInput1">
                                Nutrition Interventions/ Services
                            </p>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ea" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ea', $row->practice7ea) }}</textarea>
                                @error('practice7ea')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7eb" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7eb', $row->practice7eb) }}</textarea>
                                @error('practice7eb')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ec" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ec', $row->practice7ec) }}</textarea>
                                @error('practice7ec')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7ed" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7ed', $row->practice7ed) }}</textarea>
                                @error('practice7ed')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <!-- 6 -->
                    <br>
                    <div class="row-12" style="display:flex;">
                        <div class="justify-content-center" style="margin-left:10px">
                            <label for="exampleFormControlInput1"><b>6</b></label>
                        </div>
                        <div class="col justify-content-center" style="padding-right:0px">
                            <p for="exampleFormControlInput1">
                                Changes in Nutritional Status in
                                the Local Government Unit
                            </p>
                        </div>

                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fa" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fa', $row->practice7fa) }}</textarea>
                                @error('practice7fa')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fb" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fb', $row->practice7fb) }}</textarea>
                                @error('practice7fb')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fc" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fc', $row->practice7fc) }}</textarea>
                                @error('practice7fc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col" style="padding-left:0px!important">
                            <textarea type="text" name="practice7fd" placeholder="Your remarks"
                                style="border-radius: 5px;border:1px solid lightgray;font-size:12px;width:inherit;max-height:120px;height:120px;padding:7px">{{ old('practice7fd', $row->practice7fd) }}</textarea>
                                @error('practice7fd')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                </div>


 
        </div>
    </div>
</div>
</div>
 


@endsection