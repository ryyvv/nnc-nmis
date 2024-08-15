
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form> 
<div>
    @include('layouts.navbars.navs.authuserReview')
    @yield('content')
</div>