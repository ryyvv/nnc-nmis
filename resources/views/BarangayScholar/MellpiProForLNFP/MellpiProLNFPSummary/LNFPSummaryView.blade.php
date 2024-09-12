<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro for LNFP Summary',
'activePage' => 'mellpi_pro_summary',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __("Mellpi Pro for LNFP Summary") }}</h5>
                </div>
                <div class="card-body">
                 
                 <!-- alerts -->
                 @include('layouts.page_template.crud_alert_message')

                 <table class="display" id="myTable" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th scope="col" class="tableheader">#</th>
                                <th scope="col-2" class="tableheader">Name of Officer</th>
                                <th scope="col-4" class="tableheader">Name of Evaluating</th>
                                <th scope="col" class="tableheader">Date Created</th>
                                <th scope="col" class="tableheader">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($lnfpProfiles as $lnfp)
                         

                            <tr>
                                <td>&nbsp;</td>
                                <td>{{ $lnfp->firstname }} {{ $lnfp->middlename }} {{ $lnfp->lastname }}</td>
                                <td>{{ $lnfp->nameof }}</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>


                            @endforeach



                        </tbody>
                 </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
