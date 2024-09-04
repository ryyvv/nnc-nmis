<style>
  /*label color start*/
  .sidebar .nav p {
    color: #000;
  }

  .sidebar .nav p:hover {
    color: #64987e;
  }

  .sidebar .nav .active p:hover {
    color: #fff;
  }

  /* .sidebar .nav p:hover{
    color: #64987e;
  } */
  /*end */
  /*icon color start */
  /* .sidebar .nav i {
    color: #000;
  } */
  /*end */
  /*logo color start */
  .sidebar .logo-normal {
    color: #000 !important;
  }

  .sidebar .logo-normal:hover {
    color: #64987e !important;
  }

  /*end*/
</style>

<div class="sidebar" data-color="white">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | darkgreen | orange | red | yellow"
-->
  <div class="logo">
    <a href="#" class="simple-text logo-mini">
      <img src="{{ asset('assets') }}/img/logo.png">
    </a>
    <a href="#" class="simple-text logo-normal">
      {{ __('NMIS') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
    <li class="@if ($activePage == 'dashboard') active @endif">
          <a href="{{ route('dashboard.index') }}">
            <i class="now-ui-icons users_single-02"></i>
            <p> {{ __("Dashboard") }} </p>
          </a>
        </li>

        @if( Auth::check() && auth()->user()->otherrole == 1 )
          @include('layouts.navbars.CentralAdmin-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 2 )
          @include('layouts.navbars.CentralOfficer-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 3 )
          @include('layouts.navbars.CentralStaff-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 4 )
          @include('layouts.navbars.RegionalOfficer-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 5 )
          @include('layouts.navbars.RegionalStaff-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 6 )
          @include('layouts.navbars.ProvincialOfficer-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 7 )
          @include('layouts.navbars.ProvincialStaff-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 8 )
          @include('layouts.navbars.MunicipalOfficer-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 9 )
          @include('layouts.navbars.MunicipalStaff-sidebar')
        @elseif( Auth::check() && auth()->user()->otherrole == 10 )
          @include('layouts.navbars.barangayscholar-sidebar') 
        @endif
    </ul>
  </div>
</div>