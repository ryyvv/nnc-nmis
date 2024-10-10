




<!-- s -->
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


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
'class' => 'sidebar-mini ',
'namePage' => 'MELLPI PRO For LGU Profile',
'activePage' => 'LGUReport',
'activeNav' => '',
])


@section('content')
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
                    <table class="display" id="lguReport" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th class="tableheader">Area</th>
                                <th class="tableheader">Date Monitoring</th>
                                <th class="tableheader">Period Covered</th>
                                <!-- <th class="tableheader">Status</th> -->
                                <th class="tableheader">Form/s Uploaded</th>
                                <th class="tableheader"></th>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    //Fetch Report function LGU report
    function format(d) {

        let dateMonitoringLabel;
        if (d.count === 9) {
            dateMonitoringLabel = '<span class="statusApproved cursor">For Review</span>';
        } else {
            dateMonitoringLabel = '<span class="statusPending cursor">Ongoing</span>';
        }


        //LGUStatus
        let LGUStatus;
        let lguLabel;
        let LGUname;
        if (d.repLGU) { // Check if the value is not empty, null, or undefined
            let dataApprovedlgu = 'Invalid Date';
            let lName = `${d.lguFirstname} ${d.lguMiddlename} ${d.lguLastname}`;

            if (!isNaN(Date.parse(d.lgudate))) {
                let date = new Date(d.lgudate);
                let adate = new Date(d.lgudate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedlgu = date.toLocaleDateString('en-US', options);
            }
            lguLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            LGUStatus = dataApprovedlgu;
            LGUname = lName;
        } else { 
            LGUname = '<span class="statusNA cursor">N/A</span>';
            LGUStatus = '<span class="statusNA cursor">N/A</span>';
            lguLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //VisionMissionStatus
        let VisionMissionStatus;
        let VisionMissionLabel;
        let VisionMissionname;
        if (d.repVM) { // Check if the value is not empty, null, or undefined

            let dataApprovedvm = 'Invalid Date';
            let vName = `${d.vmFirstname} ${d.vmMiddlename} ${d.vmLastname}`;

            if (!isNaN(Date.parse(d.vmdate))) {
                let date = new Date(d.vmdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedvm = date.toLocaleDateString('en-US', options);
            }
            VisionMissionLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            VisionMissionStatus = dataApprovedvm;
            VisionMissionname = vName;
        } else {
            VisionMissionname = '<span class="statusNA cursor">N/A</span>';
            VisionMissionStatus = '<span class="statusNA cursor">N/A</span>';
            VisionMissionLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //NutritionPoliciesStatus 
        let NutritionPoliciesStatus;
        let NutritionPoliciesLabel;
        let NutritionPoliciesname;
        if (d.repNP) { // Check if the value is not empty, null, or undefined

            let dataApprovednp = 'Invalid Date';
            let npName = `${d.npFirstname} ${d.npMiddlename} ${d.npLastname}`;

            if (!isNaN(Date.parse(d.npdate))) {
                let date = new Date(d.npdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovednp = date.toLocaleDateString('en-US', options);
            }

            NutritionPoliciesLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            NutritionPoliciesStatus = dataApprovednp;
            NutritionPoliciesname = npName;
        } else {
            NutritionPoliciesname = '<span class="statusNA cursor">N/A</span>';
            NutritionPoliciesStatus = '<span class="statusNA cursor">N/A</span>';
            NutritionPoliciesLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //GovernanceStatus
        let GovernanceStatus;
        let GovernanceLabel;
        let Governancename;
        if (d.repGov) { // Check if the value is not empty, null, or undefined

            let dataApprovedgov = 'Invalid Date';
            let govName = `${d.govFirstname} ${d.govMiddlename} ${d.govLastname}`;
            if (!isNaN(Date.parse(d.govdate))) {
                let date = new Date(d.govdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedgov = date.toLocaleDateString('en-US', options);
            }

            GovernanceLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            GovernanceStatus = dataApprovedgov;
            Governancename = govName;
        } else {
            Governancename = '<span class="statusNA cursor">N/A</span>';
            GovernanceStatus = '<span class="statusNA cursor">N/A</span>';
            GovernanceLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //LNCStatus
        let LNCStatus;
        let LNCLabel;
        let LNCname;
        if (d.replnc) { // Check if the value is not empty, null, or undefined
            console.log('LNC Id', d.LNCdate);
            let dataApprovedlnc = 'Invalid Date';
            let lncName = `${d.lncFirstname} ${d.lncMiddlename} ${d.lncLastname}`;
            if (!isNaN(Date.parse(d.LNCdate))) {
                let date = new Date(d.LNCdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedlnc = date.toLocaleDateString('en-US', options);
            }
            
            LNCLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            LNCStatus =  dataApprovedlnc;
            LNCname = lncName;
        } else {
            LNCname = '<span class="statusNA cursor">N/A</span>';
            LNCStatus = '<span class="statusNA cursor">N/A</span>';
            LNCLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //NutritionServiceStatus 
        let NutritionServiceStatus;
        let NutritionServiceLabel;
        let NutritionServicename;
        if (d.repNS) { // Check if the value is not empty, null, or undefined


            let dataApprovedns = 'Invalid Date';
            let nsName = `${d.nsFirstname} ${d.nsMiddlename} ${d.nsLastname}`;
            if (!isNaN(Date.parse(d.nsdate))) {
                let date = new Date(d.nsdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedns = date.toLocaleDateString('en-US', options);
            }
            NutritionServiceLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            NutritionServiceStatus = dataApprovedns;
            NutritionServicename = nsName;
        } else {
            NutritionServicename = '<span class="statusNA cursor">N/A</span>';
            NutritionServiceStatus = '<span class="statusNA cursor">N/A</span>';
            NutritionServiceLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //ChangeNutritionServiceStatus 
        let B1Status;
        let B1Label;
        let B1name;
        if (d.repB1) { // Check if the value is not empty, null, or undefined

            let dataApprovedchangens = 'Invalid Date';
            let b1Name = `${d.b1Firstname} ${d.b1Middlename} ${d.b1Lastname}`;
            if (!isNaN(Date.parse(d.b1date))) {
                let date = new Date(d.cnsdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedchangens = date.toLocaleDateString('en-US', options);
            }
            B1Label = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            B1Status = dataApprovedchangens;
            B1name = b1Name;
        } else {
            B1name = '<span class="statusNA cursor">N/A</span>';
            B1Status = '<span class="statusNA cursor">N/A</span>';
            B1Label = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }


        //ChangeNutritionServiceStatus 
        let B2Status;
        let B2Label;
        let B2name;
        if (d.repB2) { // Chec`k if the value is not empty, null, or undefined

            let dataApprovedchangens = 'Invalid Date';
            let B2Name = `${d.b2Firstname} ${d.b2Middlename} ${d.b2Lastname}`;
            if (!isNaN(Date.parse(d.b2date))) {
                let date = new Date(d.b2date);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApprovedchangens = date.toLocaleDateString('en-US', options);
            }
            B2Label = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            B2Status = dataApprovedchangens;
            B2name = B2Name;
        } else {
            B2name = '<span class="statusNA cursor">N/A</span>';
            B2Status = '<span class="statusNA cursor">N/A</span>';
            B2Label = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }

        //DiscussionQuestionServiceStatus 
        let B4Status;
        let B4Label;
        let B4name;
        if (d.repDQ) { // Check if the value is not empty, null, or undefined

            let dataApproveddq = 'Invalid Date';
            let dqName = `${d.dqFirstname} ${d.dqMiddlename} ${d.dqLastname}`;
            if (!isNaN(Date.parse(d.dqdate))) {
                let date = new Date(d.dqdate);
                let options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                dataApproveddq = date.toLocaleDateString('en-US', options);
            }

            B4Label = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
            B4Status = dataApproveddq;
            B4name = dqName;
        } else {
            B4name = '<span class="statusNA cursor">N/A</span>';
            B4Status = '<span class="statusNA cursor">N/A</span>';
            B4Label = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
        }


        let lgustatusLabel;
        switch (d.status) {
            case 0:
                statusLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Ongoing</span>';
                break;
            case 1:
                statusLabel = '<span class="statusPending cursor" title="For Review">Uploaded</span>';
                break;
            default:
                statusLabel = '<span class="statusUnknown cursor" title="Unknown Status">Unknown</span>';
                break;
        }

        var nestedTableHtml = `
            <div class="nested-table">
                <table class="display nested table flex" style="align-items:center; width:100%;">
                <thead class="thead-light">
                        <tr >
                            <th class="bold table2ndth">Forms</th>
                            <th class="bold table2ndth">Personnel Involved</th>
                            <th class="bold table2ndth">Date Created</th>
            
                            <th class="bold table2ndth">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center table2ndtd" >LGU Profile</td>
                            <td class="center table2ndtd">${LGUname}</td>
                            <td class="center table2ndtd">${LGUStatus}</td>
                         
                            <td class="center table2ndtd">${lguLabel}</td>
                        </tr>
                        <tr>
                            <td class="center table2ndtd">VIsion Mission</td>
                            <td class="center table2ndtd">${VisionMissionname}</td>
                            <td class="center table2ndtd">${VisionMissionStatus}</td>
                            
                            <td class="center table2ndtd">${VisionMissionLabel}</td>
                        </tr> 
                        <tr>
                            <td class="center table2ndtd">Nutrition Policies</td>
                            <td class="center table2ndtd">${NutritionPoliciesname}</td>
                            <td class="center table2ndtd">${NutritionPoliciesStatus}</td>
                           
                            <td class="center table2ndtd">${NutritionPoliciesLabel}</td>
                        </tr>
                        <tr>
                            <td class="center table2ndtd">Governance</td>
                            <td class="center table2ndtd">${Governancename}</td>
                            <td class="center table2ndtd">${GovernanceStatus}</td>
                           
                            <td class="center table2ndtd">${GovernanceLabel}</td>
                        </tr> 
                        <tr>
                        <td class="center table2ndtd">LNC Management</td>
                        <td class="center table2ndtd">${LNCname}</td>
                        <td class="center table2ndtd">${LNCStatus}</td>
                       
                        <td class="center table2ndtd">${LNCLabel}</td>
                        </tr> 
                        <tr>
                        <td class="center table2ndtd">Nutrition Service</td>
                        <td class="center table2ndtd">${NutritionServicename}</td>
                         <td class="center table2ndtd">${NutritionServiceStatus}</td>
                         
                        <td class="center table2ndtd">${NutritionServiceLabel}</td>
                        </tr> 
                        <tr>
                        <td class="center table2ndtd">Change in Nutrition Service</td>
                         <td class="center table2ndtd">${ChangeNutritionServicename}</td>
                        <td class="center table2ndtd">${ChangeNutritionServiceStatus}</td>
 
                        <td class="center table2ndtd">${ChangeNutritionServiceLabel}</td>
                    </tr> 
                    <tr>
                        <td class="center table2ndtd">B-2b Summary</td>
                         <td class="center table2ndtd">${ChangeNutritionServicename}</td>
                        <td class="center table2ndtd">${ChangeNutritionServiceStatus}</td>
 
                        <td class="center table2ndtd">${ChangeNutritionServiceLabel}</td>
                    </tr> 
                    <tr>
                        <td class="center table2ndtd">Discussion Question</td>
                        <td class="center table2ndtd">${DiscussionQuestionServicename}</td>
                         <td class="center table2ndtd">${DiscussionQuestionServiceStatus}</td>
                   
                        <td class="center table2ndtd">${DiscussionQuestionServiceLabel}</td>
                    </tr> 
                    <tr>
                        <td class="center table2ndtd">B-4 Summary</td>
                         <td class="center table2ndtd">${ChangeNutritionServicename}</td>
                        <td class="center table2ndtd">${ChangeNutritionServiceStatus}</td>
 
                        <td class="center table2ndtd">${ChangeNutritionServiceLabel}</td>
                    </tr> 
                    <tr>
                        <td class="center table2ndtd">Budget (AIP)</td>
                        <td class="center table2ndtd">${ChangeNutritionServicename}</td>
                        <td class="center table2ndtd">${ChangeNutritionServiceStatus}</td>
 
                        <td class="center table2ndtd">${ChangeNutritionServiceLabel}</td>
                    </tr> 
                    </tbody>
                </table>
            </div>
        `;

        return (
            '<dl>' +
            '<dd>' + nestedTableHtml + '</dd>' +
            '</dl>'
        );
    }

    function lguReportFN() {
        // Check if the DataTable is already initialized
        if ($.fn.DataTable.isDataTable('#lguReport')) {
            // Destroy the existing DataTable before reinitializing
            $('#lguReport').DataTable().clear().destroy(); 
        }

        let table = new DataTable('#lguReport', {
            ajax: {
                url: "https://nnc-nmis.moodlearners.com/CityMunicipalStaff/lguProfile/fetchreport",
                type: 'GET',
                dataSrc: 'data',
            },
            columns: [{
                    data: "name",
                    render: function(data, type, row) {
                        // Example of adding a suffix
                        return `${data}`;
                    }
                },
                {
                    data: "repdateM",
                    render: function(data, type, row) {
                        var date = new Date(data);
                        var options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        return date.toLocaleDateString('en-PH', options);
                    }
                },
                {
                    data: "repperiodC",
                    render: function(data, type, row) {
                        // Example of adding a suffix
                        return `${data}`;
                    }
                },
              
                {
                    data: ["repStatus", "repCount","count"],
                    orderable: false,
                    render: function(data, type, row) {
                        let repStatus = row.repStatus; // Access the status field from the row
                        let repCount = row.repCount; // Access the count field from the row
                        let statusCount = row.count; 
                        // return data ? data : 'No Office';
                        if (repCount >= 1 && repCount <= 11) {
                            let cout = `<span class="statusCounts cursor" style="margin-left:3px" title="Added to LGU Report">${repCount}/9</span>`;
                            let stat = '<span class=" statusPending cursor" style="margin-left:3px" title="For Review">Ongoing</span>';
                            return `${cout} ${stat}`;
                        } else {
                            let cout =  `<span class="statusCounts cursor" style="margin-left:3px" title="Added to LGU Report">${repCount}/9</span>`;
                            let stat = '<span class="statusApproved cursor" style="margin-left:3px" title="Added to LGU Report">Completed</span>';
                            return `${cout}  ${stat}`;
                        }
                        
                    
                    }

                },
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: ''
                },

            ],
            order: [
                [1, 'asc']
            ]
        });

        function toggleRow(row) {
            let tr = row.node();
            
            // Check if the row is already shown
            if (row.child.isShown()) {
                row.child.hide();
                $(tr).removeClass('shown');
            } else {
                // Hide any other expanded rows
                $('#lguReport tbody tr.shown').each(function() {
                    let openRow = table.row(this);
                    openRow.child.hide();
                    $(this).removeClass('shown');
                });

                // Show the current row
                row.child(format(row.data())).show();
                $(tr).addClass('shown');
            }
        }

        $('#lguReport tbody').on('click', 'td.dt-control', function() {
            let tr = $(this).closest('tr');
            let row = table.row(tr);
            
            toggleRow(row);
        });

    }

        $(document).ready(function() {
            lguReportFN();
        })
</script>
@endsection