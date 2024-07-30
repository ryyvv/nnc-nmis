<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" style="background-color:#02932A !important">
  <div class="container-fluid">
    <div class="navbar-wrapper">
    <a class="navbar-brand" href="https://nnc-nmis.moodlearners.com/" style="font-weight:bold;font-size:20px;color:white!important">{{ $namePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('requestportal.view') }}" style="color:white!important"  class="nav-link">
          <i class="now-ui-icons files_paper  bold-icon"></i>{{ __("Request Portal") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="#"  style="color:white!important" class="nav-link">
            <i class="now-ui-icons design_app bold-icon"></i> {{ __("Homepage") }}
          </a> 
        </li>
        <li class="nav-item">
          <a href="{{ route('guest') }}"  style="color:white!important" class="nav-link">
            <i  class="now-ui-icons design_app  bold-icon"></i> {{ __("Dashboards") }}
          </a> 
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}"  style="color:white!important" class="nav-link">
            <i class="now-ui-icons tech_mobile bold-icon"></i> {{ __("Register") }}
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" style="color:white!important" class="nav-link">
            <i class="now-ui-icons users_circle-08 bold-icon"></i> {{ __("Login") }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
