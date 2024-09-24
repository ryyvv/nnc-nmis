

<style>

 

.details-control::before {
    /* content: '\f063';  */
    font-family: FontAwesome;
    cursor: pointer;
}

 .details-control::after {
    content: '\f063'; 
    font-family: FontAwesome;
    cursor: pointer;
}


.shown .details-control::after {
    content: '\f062';
    /* FontAwesome minus icon */
    font-family: FontAwesome;
    color: green;
}
 
</style>

@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' =>  'sidebar-mini ',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('now') . "/img/background1.png",
])

@section('content')  
<div class="content" style="margin-top:50px;padding:2%">
    <!-- optional Card -->
  
        @if( Auth::check() && auth()->user()->otherrole == 1 )
          @include('users.CentralAdmin')
        @elseif( Auth::check() && auth()->user()->otherrole == 2 )
          @include('users.CentralOfficer')
        @elseif( Auth::check() && auth()->user()->otherrole == 3 )
          @include('users.CentralStaff')
        @elseif( Auth::check() && auth()->user()->otherrole == 4 )
          @include('users.RegionalOfficer')
        @elseif( Auth::check() && auth()->user()->otherrole == 5 )
          @include('users.RegionalStaff')
        @elseif( Auth::check() && auth()->user()->otherrole == 6 )
          @include('users.ProvincialOfficer')
        @elseif( Auth::check() && auth()->user()->otherrole == 7 )
          @include('users.ProvincialStaff')
        @elseif( Auth::check() && auth()->user()->otherrole == 8 )
          @include('users.MunicipalOfficer')
        @elseif( Auth::check() && auth()->user()->otherrole == 9 )
          @include('users.MunicipalStaff')
    
        @elseif( Auth::check() && auth()->user()->otherrole == 10 )
          @include('users.barangayscholar') 
        @endif
        
 
</div>


@endsection