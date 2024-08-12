<head>
        <!-- Other head content -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    </head>

    @extends('layouts.app', [
    'namePage' => 'NMIS',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/background1.png",
    ])

    @section('content')
    <div class="content">
        <div style="margin-left:15%!important;margin-right:15%!important">
            <!-- <div class="row-lg-12 d-flex" > -->

            <div class="col-md-12 d-flex" style="padding-left:0px">
                <div class="card card-signup text-center">

                    <div class="card-body d-flex ">
                        <div class="col-5">
                            <div class="row">
                                <img src="/assets/img/logo.png" alt="NNC logo" height="250px" width="250px">
                            </div>
                            <div class="row">
                                <label for="">National Nutrition Council 1</label>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Register') }}</h4>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!--userinfo -->

                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- address/location -->
                                <div>
                                    <div class="d-flex">
                                        <!-- Region -->
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px; margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="Region" required>
                                                <option value="">Select your Region</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif

                                        <!-- Province -->
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px;">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="Province" required>
                                                <option value="">Select your Province</option>
                                                <!-- Add your options here -->
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="d-flex">
                                        <!-- Municipal -->
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px;margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="city_municipal" required>
                                                <option value="">Select your City/Municipal</option>
                                                <!-- Add your options here -->
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif

                                        <!-- Barangay -->
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px; ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="city_municipal" required>
                                                <option value="">Select your Barangay</option>
                                                <!-- Add your options here -->
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- workstation/designation -->
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Agency/Office/Unit') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Division Unit ') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px; ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- user email and password -->
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif


                                    <!-- password -->
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px; margin-right:15px">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="password" name="password" required autofocus>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                    <!-- Confirm-password -->
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="password"
                                            name="password_confirmation" required>
                                    </div>
                                    <!-- @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif -->

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="bold btn btn-primary btn-round btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-md-5" style="padding-right:0px;" >
                    <div class="card card-signup text-center">
                        <img src="/assets/img/logo.png" alt="NNC logo" height="250px" width="250px">
                    </div>
                </div> -->
            <!-- <div class="col-md-7 " style="padding-left:0px" >
                    <div class="card card-signup text-center">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Register') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                       
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons users_circle-08 text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
 
                                <div>
                                    <div class="d-flex">
                                       
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px; margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="Region" required>
                                                <option value="">Select your Region</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif

              
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px;">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="Province" required>
                                                <option value="">Select your Province</option>
                                    
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="d-flex"> 
                                  
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px;margin-right:15px  ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="city_municipal" required>
                                                <option value="">Select your City/Municipal</option>
                           
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif
 
                                        <div class="input-group form-control-lg {{ $errors->has('dropdown') ? 'has-danger' : '' }}" style="border-radius: 40px; ">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text" style="border-top-left-radius: 40px; border-bottom-left-radius: 40px;">
                                                    <i class="now-ui-icons location_pin text-dark"></i>
                                                </div>
                                            </span>
                                            <select class="form-control text-dark {{ $errors->has('dropdown') ? 'is-invalid' : '' }}" style="border-top-right-radius: 40px; border-bottom-right-radius: 40px;" name="city_municipal" required>
                                                <option value="">Select your Barangay</option>
                                            
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('dropdown'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('dropdown') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
 
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Agency/Office/Unit') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Division Unit ') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px; ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons business_badge text-dark"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Designation') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                               
                                <div>
                                    <div class="input-group  form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="email" name="email" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif


                               
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px; margin-right:15px">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control text-dark {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="password" name="password" required autofocus>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                            
                                    <div class="input-group  form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px;  ">
                                        <span class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </div>
                                        </span>
                                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" style="border-top-right-radius:40px;border-bottom-right-radius:40px;" type="password"
                                            name="password_confirmation" required>
                                    </div>
                    

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="bold btn btn-primary btn-round btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>   -->
            <!-- </div>  -->
            @include('layouts.footer')
            @endsection

            @push('js')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    function loadRegions(regionSelectId) {
                        $.ajax({
                            url: '{{ route("regions.get") }}',
                            method: 'GET',
                            success: function(response) {
                                console.log('Regions:', response);
                                let regionSelect = $(regionSelectId);
                                regionSelect.find('option:not(:first)').remove();
                                response.forEach(function(region) {
                                    regionSelect.append(new Option(region.region, region.id));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading regions:', xhr.responseText);
                                alert('Error loading regions');
                            }
                        });
                    }

                    function loadProvincesByRegion(regionId, provinceSelectId) {
                        console.log('Loading provinces for region:', regionId);
                        $.ajax({
                            url: '{{ url("provinces") }}/' + regionId,
                            method: 'GET',
                            success: function(response) {
                                console.log('Provinces:', response);
                                let provinceSelect = $(provinceSelectId);
                                provinceSelect.find('option:not(:first)').remove();
                                response.forEach(function(province) {
                                    provinceSelect.append(new Option(province.province, province.provcode));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading provinces:', xhr.responseText);
                                alert('Error loading provinces');
                            }
                        });
                    }

                    function loadCitiesByProvince(provcode, citySelectId) {
                        console.log('Loading cities for province code:', provcode);
                        $.ajax({
                            url: '{{ url("cities") }}/' + provcode,
                            method: 'GET',
                            success: function(response) {
                                console.log('Cities:', response);
                                let citySelect = $(citySelectId);
                                citySelect.find('option:not(:first)').remove();
                                response.forEach(function(city) {
                                    citySelect.append(new Option(city.cityname, city.provcode));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading cities:', xhr.responseText);
                                alert('Error loading cities');
                            }
                        });
                    }

                    function loadBarangaysByCity(cityId, barangaySelectId) {
                        console.log('Loading barangays for city:', cityId);
                        $.ajax({
                            url: '{{ url("barangays") }}/' + cityId,
                            method: 'GET',
                            success: function(response) {
                                console.log('Barangays:', response);
                                let barangaySelect = $(barangaySelectId);
                                barangaySelect.find('option:not(:first)').remove();
                                response.forEach(function(barangay) {
                                    barangaySelect.append(new Option(barangay.barangay, barangay.id));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading barangays:', xhr.responseText);
                                alert('Error loading barangays');
                            }
                        });
                    }

                    function setupDropdowns(regionSelectId, provinceSelectId, citySelectId, barangaySelectId) {
                        loadRegions(regionSelectId);

                        $(regionSelectId).change(function() {
                            let selectedRegionId = $(this).val();
                            console.log('Region changed to:', selectedRegionId);
                            if (selectedRegionId) {
                                loadProvincesByRegion(selectedRegionId, provinceSelectId);
                                $(citySelectId).find('option:not(:first)').remove();
                                $(barangaySelectId).find('option:not(:first)').remove();
                            } else {
                                $(provinceSelectId).find('option:not(:first)').remove();
                                $(citySelectId).find('option:not(:first)').remove();
                                $(barangaySelectId).find('option:not(:first)').remove();
                            }
                        });

                        $(provinceSelectId).change(function() {
                            let selectedProvcode = $(this).val();
                            console.log('Province changed to:', selectedProvcode);
                            if (selectedProvcode) {
                                loadCitiesByProvince(selectedProvcode, citySelectId);
                                $(barangaySelectId).find('option:not(:first)').remove();
                            } else {
                                $(citySelectId).find('option:not(:first)').remove();
                                $(barangaySelectId).find('option:not(:first)').remove();
                            }
                        });

                        $(citySelectId).change(function() {
                            let selectedCityId = $(this).val();
                            console.log('City changed to:', selectedCityId);
                            if (selectedCityId) {
                                loadBarangaysByCity(selectedCityId, barangaySelectId);
                            } else {
                                $(barangaySelectId).find('option:not(:first)').remove();
                            }
                        });
                    }

                    // Setup for each set of dropdowns
                    setupDropdowns('#regionSelect', '#provinceSelect', '#citySelect', '#barangaySelect');
                });

                $(document).ready(function() {
                    demo.checkFullPageBackgroundImage();
                });
            </script>
            @endpush