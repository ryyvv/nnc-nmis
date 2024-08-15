<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" > -->
<nav class="navbar bg-body-tertiary navbar-expand-lg navbar-absolute">
   <div class="container-fluid">
    <div class="navbar-wrapper" style="color:black">  
       <p style="font-size:28px!important;color:#508D4E;font-size:bolder;cursor:pointer"><b>NMIS</b></p>
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
            <a class="dropdown-item" style="font-weight:bolder" href="{{ route('profile.edit') }}">My profile</a>
            <a class="dropdown-item" style="font-weight:bolder"href="{{ route('profile.edit') }}">Edit password</a>
            <a class="dropdown-item" style="font-weight:bolder" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
 