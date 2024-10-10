<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'B-2b Summary',
'activePage' => 'B2bSummary',
'activeNav' => 'MELLPI PRO For LGU',
])

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
         
                    <h5 class="title">{{__("List of FORM B-2B: SUMMARY OF CHANGES IN THE NUTRITIONAL STATUS IN THE BARANGAY")}}</h5>
             
            </div>


            <div class="content"  id="deleteAlert"  style="margin:30px;">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

               

                <div class="row-12">
                    <table class="display" id="B2bSummary" width="100%">
                        <thead style="background-color:#508D4E;"> 
                            <tr>
                                <th scope="col" class="tableheader" >#</th>
                                <th scope="col-4" class="tableheader">Date Monitoring</th>
                                <th scope="col" class="tableheader">Period Covered</th>
                                <th scope="col-2" class="tableheader">Status</th>
                                <th scope="col" class="tableheader">Action</th> 
                            </tr>
                        </thead>
                        <tbody>

                            <?php $num = 1; ?>
                            @foreach($rawdata as $rawdata)
                                    <tr>
                                        <td>{{$num}}</td>
                                        <td>{{$rawdata->dateMonitoring}}</td>
                                        <td>{{$rawdata->periodCovereda}}</td>
                                        <td>
                                            @if( $rawdata->mplgubrgychangeNS_id != null )
                                            <span class="statusApproved">Change in Nutrition Status Data Completed</span>
                                            @elseif( $rawdata->status == 1 )
                                            <span class="statusPending">Ongoing Data for Form Change in Nutrition Status</span>
                                            @endif

                                            @if( $rawdata->b2bSummaryStatus == null  )
                                                <span class="statusPending">waiting</span>
                                            @elseif($rawdata->b2bSummaryStatus == 0 )
                                            <span class="statusEntry">Form submitted</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <!-- Save and submit -->
                                                    @if( $rawdata->b2bSummaryStatus == null )
                                                    <i class="fa fa-eye fa-lg cursor" style="color:gray;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                    <i onclick="view('B2bSummary','{{ $rawdata->id }}','create')" class="fa fa-file fa-lg cursor" style="color:74c476;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Create Summary for D1-D5"></i>
                                                
                                                    <!-- new -->
                                                    @elseif($rawdata->b2bSummaryStatus == 0 )
                                                    <i onclick="view('B2bSummary','{{ $rawdata->id }}','show')"  class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                                    <i  class="fa fa-file fa-lg cursor" style="color:gray;margin-right:10px"  data-toggle="tooltip" data-placement="top" title="Already Submitted"></i>
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>  
                                      
                                    </tr>
                                    <?php $num++; ?>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    function lguB2bSummaryFN() {
        // Check if the DataTable is already initialized
        if ($.fn.DataTable.isDataTable('#B2bSummary')) {
            // Destroy the existing DataTable before reinitializing
            $('#B2bSummary').DataTable().clear().destroy(); 
        }
    }

    $(document).ready(function() {
        lguB2bSummaryFN();
    })

</script> -->

  
@include('Modal.DeleteVM')
@endsection