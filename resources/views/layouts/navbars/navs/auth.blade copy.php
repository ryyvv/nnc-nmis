<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" >
   <div class="container-fluid">
    <div class="navbar-wrapper" style="color:black"> 
      <!-- <a class="navbar-brand" href="#" style="font-size:35px!important;color:#508D4E;font-size:bolder;"><b>{{ $namePage }}</b></a> -->
       <p style="font-size:28px!important;color:#508D4E;font-size:bolder;"><b>{{ $namePage }}</b></p>
    </div>
 
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="border-radius:20px;border: 2px solid green" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="now-ui-icons users_single-02" style="color:green;font-weight:bolder"></i>
            <p>
              <span class="d-lg-none d-md-block">{{ __("Account") }}</span>
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" style="font-weight:bolder" href="{{ route('profile.edit') }}">{{ __("My profile") }}</a>
            <a class="dropdown-item" style="font-weight:bolder"href="{{ route('profile.edit') }}">{{ __("Edit profile") }}</a>
            <a class="dropdown-item" style="font-weight:bolder" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->