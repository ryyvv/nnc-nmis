@extends('layouts.BSapp', [
'namePage' => 'Dashboard',
'class' => 'sidebar-mini ',
'activePage' => 'dashboard',
'backgroundImage' => asset('now') . "/img/background1.png",
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
  <div class="card" style="border-radius:10px;">
    <div class="card-header">
      <p>Barangay Scholar Dashboard</p>
    </div>
  </div>
</div>
@endsection