@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'profile',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm">
</div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__(" Edit User Profile")}}</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('BSprofile.update', Auth()->user()->id) }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('alerts.success')
             
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("First name")}}</label>
                                    <input type="text" name="Firstname" class="form-control"
                                        value="{{ old('Firstname', auth()->user()->Firstname) }}">
                                    @include('alerts.feedback', ['field' => 'Firstname'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("Middle name")}}</label>
                                    <input type="text" name="Middlename" class="form-control"
                                        value="{{ old('Middlename', auth()->user()->Middlename) }}">
                                    @include('alerts.feedback', ['field' => 'Middlename'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("Last name")}}</label>
                                    <input type="text" name="Lastname" class="form-control"
                                        value="{{ old('Lastname', auth()->user()->Lastname) }}">
                                    @include('alerts.feedback', ['field' => 'Lastname'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("Region")}}</label>
                                    <input type="text" name="Region" class="form-control"
                                        value="{{ old('Region', auth()->user()->Region) }}">
                                    @include('alerts.feedback', ['field' => 'Region'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("Province")}}</label>
                                    <input type="text" name="Province" class="form-control"
                                        value="{{ old('Province', auth()->user()->Province) }}">
                                    @include('alerts.feedback', ['field' => 'Province'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("city/municipal")}}</label>
                                    <input type="text" name="city_municipal" class="form-control"
                                        value="{{ old('city_municipal', auth()->user()->city_municipal) }}">
                                    @include('alerts.feedback', ['field' => 'city_municipal'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("city/barangay")}}</label>
                                    <input type="text" name="barangay" class="form-control"
                                        value="{{ old('barangay', auth()->user()->barangay) }}">
                                    @include('alerts.feedback', ['field' => 'barangay'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("Agency/Office/LGU")}}</label>
                                    <input type="text" name="agency_office_lgu" class="form-control"
                                        value="{{ old('agency_office_lgu', auth()->user()->agency_office_lgu) }}">
                                    @include('alerts.feedback', ['field' => 'agency_office_lgu'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>{{__("Division/Unit")}}</label>
                                    <input type="text" name="Division_unit" class="form-control"
                                        value="{{ old('Division_unit', auth()->user()->Division_unit) }}">
                                    @include('alerts.feedback', ['field' => 'Division_unit'])
                                </div>
                            </div>
                        </div>

                     

                     
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                        </div>
                        <hr class="half-rule" />
                    </form>
                </div>
                <div class="card-header">
                    <h5 class="title">{{__("Edit User Account")}}</h5>
                </div>



                <div class="card-body">
                    <form method="post" action="{{ route('BSprofile.password',Auth()->user()->id) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        @include('alerts.success', ['key' => 'password_status'])
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email', auth()->user()->email) }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{__(" Current Password")}}</label>
                                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="old_password" placeholder="{{ __('Current Password') }}" type="password"
                                        required>
                                    @include('alerts.feedback', ['field' => 'old_password'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{__(" New password")}}</label>
                                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('New Password') }}" type="password" name="password" required>
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label>{{__(" Confirm New Password")}}</label>
                                    <input class="form-control" placeholder="{{ __('Confirm New Password') }}"
                                        type="password" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-primary btn-round ">{{__('Change Password')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- profile Pic -->
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                            <h5 class="title">{{ auth()->user()->name }}</h5>
                        </a>
                        <p class="description">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="button-container">
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-facebook-square"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                        <i class="fab fa-google-plus-square"></i>
                    </button>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection