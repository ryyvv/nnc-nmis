@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 6 Monitoring',
'activePage' => 'mellpi_pro_form6',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{__("Mellpi Pro Form 6 Monitoring")}}</h5>
                    <a href="{{ route('MellpiProRadialCreate.create') }}" class="btn btn-primary">Create data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection