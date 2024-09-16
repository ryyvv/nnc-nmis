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
                                <th></th>
                                <th scope="col" class="tableheader">#</th>
                                <th scope="col" class="tableheader">Name of Officer</th>
                                <th scope="col" class="tableheader">Name of Evaluating</th>
                                <th scope="col" class="tableheader">Date Created</th>
                                <th scope="col" class="tableheader">Status</th>
                                <th scope="col" class="tableheader">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($lnfpProfiles as $lnfp)
                         

                            <tr>
                                <td class="dt-control"></td>
                                <td>&nbsp;</td>
                                <td>{{ $lnfp->firstname }} {{ $lnfp->middlename }} {{ $lnfp->lastname }}</td>
                                <td>{{ $lnfp->nameof }}</td>
                                <td>{{ \Carbon\Carbon::parse($lnfp->created_at)->format('F j, Y') }}</td>
                                <td>
                                    <div class="row">


                                        @if( $lnfp->status == 3 )
                                        <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #28a745;padding:4px;border-radius:15px; ">
                                            <div style="border-radius:15px; border: 2px solid #28a745; background-color: #28a745; padding: 2px;margin-right:5px">
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/guqkthkk.json"
                                                    trigger="hover"
                                                    colors="primary:#ffffff"
                                                    style="width:15px;height:15px">
                                                </lord-icon>
                                            </div>
                                            <div class="bold" style="font-size:15px;text-align:center;margin-right:8px;color:#28a745">For Approval</div>
                                        </div>
                                       
                                        <!-- <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #00b4d8;padding:4px;border-radius:15px; ">
                                            <div style="border-radius:15px; border: 2px solid white; background-color: #00b4d8; padding: 2px;margin-right:5px"> 
                                            <lord-icon
                                                src="https://cdn.lordicon.com/dupxuoaa.json"
                                                trigger="hover"
                                                colors="primary:#ffffff"
                                                style="width:20px;height:20px">
                                            </lord-icon>
                                            </div>
                                            <div class="bold" style="font-size:15px;text-align:center;margin-right:8px;color: #00b4d8;">Draft</div>
                                        </div> -->
                                        @elseif( $lnfp->status == 1 || $lnfp->status == 2 )
                                        <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #ffbe55;;padding:4px;border-radius:15px; ">
                                            <div style="border-radius:15px; background-color: #ffbe55;; padding: 2px;margin-right:5px"> 
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/qvyppzqz.json"
                                                    trigger="hover"
                                                    stroke="bold"
                                                    colors="primary:#ffffff,secondary:#ffffff"
                                                    style="width:20px;height:20px">
                                                </lord-icon>
                                            </div>
                                            <div class="bold" style="font-size:15px;text-align:center;margin-right:8px;color:#ffbe55;">Ongoing</div>
                                        </div>
                                        @endif

                                    </div> 

                                </td>
                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            @if($lnfp->status == 1 || $lnfp->status == 3 )
                                            <i onclick="myFunctionLNFP_lguprofile_View('{{ $lnfp->id }}')" class="fa fa-eye fa-lg cursor" style="color:#4bb5ff;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="View"></i>
                                            
                                            @elseif( $lnfp->status == 2 )
                                            <i onclick="myFunctionLNFP_lguprofile('{{ $lnfp->id  }}', 'lncmanagement', 'edit')" class="fa fa-edit fa-lg cursor" style="color:#FFB236;margin-right:10px" type="button" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                            <!-- <i onclick="openModalLNFP('{{ $lnfp->id }}')" class="fa fa-trash fa-lg cursor" style="color:red;margin-right:10px" title="Delete "></i> -->
                                            @endif
                                        
                                        </li>
                                    </ul>
                                </td>
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


<script type="text/javascript">
$(document).ready(function () {
    function format(d) {
        return `
        <div class="nested-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Form</th>
                        <th>Status</th>
                        <th>Date Approved</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Form 5</td>
                        <td>${d.form_5_status || 'N/A'}</td>
                        <td>${d.form_5_date_approved ? new Date(d.form_5_date_approved).toLocaleDateString('en-US') : 'N/A'}</td>
                        <td>${d.form_5_remarks || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td>Form 6 and 7</td>
                        <td>${d.form_6_7_status || 'N/A'}</td>
                        <td>${d.form_6_7_date_approved ? new Date(d.form_6_7_date_approved).toLocaleDateString('en-US') : 'N/A'}</td>
                        <td>${d.form_6_7_remarks || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td>Form 8</td>
                        <td>${d.form_8_status || 'N/A'}</td>
                        <td>${d.form_8_date_approved ? new Date(d.form_8_date_approved).toLocaleDateString('en-US') : 'N/A'}</td>
                        <td>${d.form_8_remarks || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td>Interview</td>
                        <td>${d.interview_status || 'N/A'}</td>
                        <td>${d.interview_date_approved ? new Date(d.interview_date_approved).toLocaleDateString('en-US') : 'N/A'}</td>
                        <td>${d.interview_remarks || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td>Overall Score</td>
                        <td>${d.overall_score_status || 'N/A'}</td>
                        <td>${d.overall_score_date_approved ? new Date(d.overall_score_date_approved).toLocaleDateString('en-US') : 'N/A'}</td>
                        <td>${d.overall_score_remarks || 'N/A'}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        `;
    }

    let table = new DataTable('#myTable', {
        ajax: {
            url: "https://nnc-nmis.moodlearners.com/lguProfile/fetchreport", 
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
            { data: null, className: 'dt-control', orderable: false, defaultContent: '' }, 
            { data: "officer_name" },
            { data: "evaluator_name" },
            { data: "created_at" },
            { data: "status", render: function (data, type, row) {
                return `<span class="badge badge-warning">${data}</span>`;
              }
            },
            {
              className: 'dt-control',
              orderable: false,
              data: null,
              defaultContent: ''
            },
        ],
        order: [[1, 'asc']]
    });

    // Toggle nested table
    $('#myTable tbody').on('click', 'td.dt-control', function () {
        let tr = $(this).closest('tr');
        let row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });
});
</script>
