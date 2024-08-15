
@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' =>  'sidebar-mini ',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('now') . "/img/background1.png",
])
 
@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top:100px">
                    <div class="card-header bold" style="font-size:20px;color:#508D4E;" >Waiting for Approval</div>

                    <div class="card-body" style="font-size:14px">
                        Your account is waiting for our <span class="bold" style=" color:#508D4E"> administrator </span>approval.
                        <br />
                        Please check back later.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 

 