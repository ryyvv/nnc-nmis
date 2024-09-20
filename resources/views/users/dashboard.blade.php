<style>
.dt-control::before {
    /* content: '\f067'; FontAwesome plus icon */
    font-family: FontAwesome;
    cursor: pointer;
}

.shown .dt-control::before {
    content: '\f068';
    /* FontAwesome minus icon */
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
          <!-- @include('users.MunicipalStaff') -->
           
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <!-- <a href="{{route('formsb.index')}}"> -->
                <h5 class="title">{{__("Mellpi Pro for LGU Profile Report")}}</h5>
                <!-- </a> -->

            </div>

            <!-- alerts -->
            @include('layouts.page_template.crud_alert_message')


            <div class="content" style="margin:30px;">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                <div class="row-12">
                    <table class="display" id="lnfpReport" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th class="tableheader">Area</th>
                                <th class="tableheader">Date Monitoring</th>
                                <th class="tableheader">Period Covered</th>
                                <th class="tableheader">Status</th>
                                <th class="tableheader">Form/s Uploaded</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ApprovedModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This data will be added to Mellpi Pro for the LGU Report.
            </div>
            <div class="modal-footer">
                <button type="button" class="bold btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="bold btn btn-primary" onclick="confirmApproved()">Proceed</button>
            </div>
        </div>
    </div>
</div>
 
        @elseif( Auth::check() && auth()->user()->otherrole == 10 )
          @include('users.barangayscholar') 
        @endif
        
 
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
@endsection