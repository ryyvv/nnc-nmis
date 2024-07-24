
@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'profile',
'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
              <!-- profile Pic -->
        <div class="col-md-12">
            <div class="card card-user">
                <div class="image">
                    <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                            <h5 class="title">{{ auth()->user()->Firstname }} {{ auth()->user()->Middlename }}  {{ auth()->user()->Lastname  }}</h5>
                        </a>
                        <h4>Insert other personal  Info</h4>
                        <a href="{{route('CAprofile.edit', Auth()->user()->id)}}" class="btn btn-primary">Edit profile</a>
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