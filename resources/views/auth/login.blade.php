@extends('layouts.app', [
'namePage' => 'NMIS',
'class' => 'login-page sidebar-mini ',
'activePage' => 'login',
'backgroundImage' => asset('assets') . "/img/background1.png",
])

@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-12 ml-auto mr-auto">
            <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-9">
                                <p class="text-lead text-light mt-3 mb-0">
                                    @include('alerts.migrations_check')
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 ml-auto mr-auto">
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card card-login card-plain bg-white border" style="border-radius:40px;">
                    <div class="card-header ">
                        <div class="logo-container" style="width:150px; margin:2rem auto;">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}" style="border-radius:40px; background:#e6e6e6;">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons users_circle-08 text-dark"></i>
                                </div>
                            </span>
                            <input class="form-control text-dark {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div class="input-group no-border form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}" style="border-radius:40px; background:#e6e6e6; margin-bottom:5px;">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons objects_key-25 text-dark"></i></i>
                                </div>
                            </div>
                            <input placeholder="Password" class="form-control text-dark {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" required>
                        </div>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="card-footer ">
                        <div class="pull-left">
                            <h6>
                                <a href="{{ route('register') }}" class="link footer-link text-dark">{{ __('Create Account') }}</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="{{ route('password.request') }}" class="link footer-link text-dark">{{ __('Forgot Password?') }}</a>
                            </h6>
                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3">{{ __('Get Started') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection

@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush