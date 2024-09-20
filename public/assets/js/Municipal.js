function openApproved(id) {
  profileId = id; // Store the ID
  $('#approved').modal('show'); // Show the modal
}

function openDeclined(id) {
  profileId = id; // Store the ID
  $('#warning').modal('show'); // Show the modal
}


function confirmApproved() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  if (typeof profileId === 'undefined') {
    alert('Profile ID is not set');
    return;
  }

  // console.log(profileId);
  if (profileId) { // Check if profileId has been set
    $.ajax({
      url: "lguProfile/approved", // Ensure the URL is correct
      data: { id: profileId },
      type: 'POST',
      success: function (result) {
        setTimeout(function () {
          window.location.reload(); // Reload the page after a delay
        }, 500); // Delay before reload (2 seconds)
        $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert


      },
      error: function (xhr) {
        alert('Error data : ' + xhr.responseText);
      }
    });
    $('#ApprovedModal').modal('hide'); // Hide the modal
  }
};

function confirmDeclined() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  if (typeof profileId === 'undefined') {
    alert('Profile ID is not set');
    return;
  }

  // console.log(profileId);
  if (profileId) { // Check if profileId has been set
    $.ajax({
      url: "lguProfile/declined", // Ensure the URL is correct
      data: { id: profileId },
      type: 'POST',
      success: function (result) {
        setTimeout(function () {
          window.location.reload(); // Reload the page after a delay
        }, 500); // Delay before reload (2 seconds)
        $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert

      },
      error: function (xhr) {
        alert('Error declined data: ' + xhr.responseText);
      }
    });
    $('#openDeclined').modal('hide'); // Hide the modal
  }
};


//Fetch Report function LGU report
$(document).ready(function () {



  function format(d) {
 
    let dateMonitoringLabel;
    if (d.count === 9) {
      dateMonitoringLabel = '<span class="statusApproved cursor">For Review</span>';
    }else { 
      dateMonitoringLabel = '<span class="statusPending cursor">Ongoing</span>';
    }

 
    //LGUStatus
    let LGUStatus;
    let lguLabel; 
    let LGUname;
    if (d.repLGU) { // Check if the value is not empty, null, or undefined
      let dataApprovedlgu = 'Invalid Date';
      let lName = `${d.Firstname} ${d.Middlename} ${d.Lastname}`;
  
      if (!isNaN(Date.parse(d.lgudate))) {
        let date = new Date(d.lgudate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovedlgu = date.toLocaleDateString('en-US', options);
      }

      lguLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      LGUStatus = dataApprovedlgu;
      LGUname = lName;
    } else {
      LGUStatus = '<span class="statusNA cursor">N/A</span>';
      lguLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }
 
    //VisionMissionStatus
    let VisionMissionStatus;
    let VisionMissionLabel;
    let VisionMissionname;
    if (d.repVM) { // Check if the value is not empty, null, or undefined

      let dataApprovedvm = 'Invalid Date';
      let vName = `${d.Firstname} ${d.Middlename} ${d.Lastname}`;

      if (!isNaN(Date.parse(d.vmdate))) {
        let date = new Date(d.vmdate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovedvm = date.toLocaleDateString('en-US', options);
      }
      VisionMissionLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      VisionMissionStatus = dataApprovedvm;
      VisionMissionname = vName;
    } else {
      VisionMissionStatus = '<span class="statusNA cursor">N/A</span>';
      VisionMissionLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }

    //NutritionPoliciesStatus 
    let NutritionPoliciesStatus;
    let NutritionPoliciesLabel;
    let NutritionPoliciesname;
    if (d.mellpiprobarangaynationalpolicies_id) { // Check if the value is not empty, null, or undefined

      let dataApprovednp = 'Invalid Date';
      let npName = `${d.Firstname} ${d.Middlename} ${d.Lastname}`;

      if (!isNaN(Date.parse(d.vmapproveddate))) {
        let date = new Date(d.vmapproveddate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovednp = date.toLocaleDateString('en-US', options);
      }

      NutritionPoliciesLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      NutritionPoliciesStatus = dataApprovednp;
      NutritionPoliciesname = npName;
    } else {
      NutritionPoliciesStatus = '<span class="statusNA cursor">N/A</span>';
      NutritionPoliciesLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }

    //GovernanceStatus
    let GovernanceStatus;
    let GovernanceLabel;
    let Governancename;
    if (d.mplgubrgygovernance_id) { // Check if the value is not empty, null, or undefined

      let dataApprovedgov = 'Invalid Date';
      let govName = `${d.Firstname} ${d.Middlename} ${d.Lastname}`;
      if (!isNaN(Date.parse(d.governanceapproveddate))) {
        let date = new Date(d.governanceapproveddate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovedgov = date.toLocaleDateString('en-US', options);
      }

      GovernanceLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      GovernanceStatus = dataApprovedgov;
      Governancename = govName;
    } else {
      GovernanceStatus = '<span class="statusNA cursor">N/A</span>';
      GovernanceLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }

    //LNCStatus
    let LNCStatus;
    let LNCLabel;
    let LNCLabel;
    if (d.mplgubrgylncmanagement_id) { // Check if the value is not empty, null, or undefined
      console.log('LNC Id', d.mplgubrgylncmanagement_id);
      let dataApprovedlnc = 'Invalid Date';
      let govName = `${d.Firstname} ${d.Middlename} ${d.Lastname}`;
      if (!isNaN(Date.parse(d.lncapproveddate))) {
        let date = new Date(d.lncapproveddate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovedlnc = date.toLocaleDateString('en-US', options);
      }
      LNCLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
      LNCStatus = '<span class="statusNA cursor" title="For Review">N/A</span>';
    } else {
      LNCStatus = '<span class="statusNA cursor">N/A</span>';
      LNCLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }

    //NutritionServiceStatus 
    let NutritionServiceStatus;
    let NutritionServiceLabel;
    if (d.mplgubrgynutritionservice_id) { // Check if the value is not empty, null, or undefined


      let dataApprovedns = 'Invalid Date';
      if (!isNaN(Date.parse(d.nsapproveddate))) {
        let date = new Date(d.nsapproveddate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovedns = date.toLocaleDateString('en-US', options);
      }
      NutritionServiceLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      NutritionServiceStatus = dataApprovedns;
    } else {
      NutritionServiceStatus = '<span class="statusNA cursor">N/A</span>';
      NutritionServiceLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }

    //ChangeNutritionServiceStatus 
    let ChangeNutritionServiceStatus;
    let ChangeNutritionServiceLabel;
    if (d.mplgubrgychangeNS_id) { // Check if the value is not empty, null, or undefined

      let dataApprovedchangens = 'Invalid Date';
      if (!isNaN(Date.parse(d.changensapproveddate))) {
        let date = new Date(d.changensapproveddate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApprovedchangens = date.toLocaleDateString('en-US', options);
      }
      ChangeNutritionServiceLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      ChangeNutritionServiceStatus = dataApprovedchangens;
    } else {
      ChangeNutritionServiceStatus = '<span class="statusNA cursor">N/A</span>';
      ChangeNutritionServiceLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
    }

    //DiscussionQuestionServiceStatus 
    let DiscussionQuestionServiceStatus;
    let DiscussionQuestionServiceLabel;
    if (d.mplgubrgydiscussionquestion_id) { // Check if the value is not empty, null, or undefined

      let dataApproveddq = 'Invalid Date';
      if (!isNaN(Date.parse(d.budgetapproveddate))) {
        let date = new Date(d.budgetapproveddate);
        let options = { year: 'numeric', month: 'long', day: 'numeric' };
        dataApproveddq = date.toLocaleDateString('en-US', options);
      }

      DiscussionQuestionServiceLabel = '<span class="statusApproved cursor" title="Added to LGU Report">Uploaded</span>';
      DiscussionQuestionServiceStatus = dataApproveddq;
    } else {

      DiscussionQuestionServiceStatus = '<span class="statusNA cursor">N/A</span>';
      DiscussionQuestionServiceLabel = '<span class="statusPending cursor" title="Added to LGU Report">Waiting</span>';
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
                        <th class="bold table2ndth">Date Approved</th>
                        <th class="bold table2ndth">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="center table2ndtd" >LGU Profile</td>
                        <td class="center table2ndtd">${LGUname}</td>
                        <td class="center table2ndtd">${LGUStatus}</td>
                        <td class="center table2ndtd">N/A</td>
                        <td class="center table2ndtd">${lguLabel}</td>
                    </tr>
                    <tr>
                        <td class="center table2ndtd">VIsion Mission</td>
                        <td class="center table2ndtd">${VisionMissionname}</td>
                        <td class="center table2ndtd">${VisionMissionStatus}</td>
                        <td class="center table2ndtd"> </td>
                        <td class="center table2ndtd">${VisionMissionLabel}</td>
                    </tr> 
                    <tr>
                        <td class="center table2ndtd">Nutrition Policies</td>
                        <td class="center table2ndtd">${NutritionPoliciesStatus}</td>
                        <td class="center table2ndtd"> </td>
                        <td class="center table2ndtd">N/A</td>
                        <td class="center table2ndtd">${NutritionPoliciesLabel}</td>
                    </tr>
                    <tr>
                        <td class="center table2ndtd">Governance</td>
                        <td class="center table2ndtd">${GovernanceStatus}</td>
                        <td class="center table2ndtd"> </td>
                        <td class="center table2ndtd">N/A</td>
                        <td class="center table2ndtd">${GovernanceLabel}</td>
                    </tr> 
                    <tr>
                      <td class="center table2ndtd">LNC Management</td>
                      <td class="center table2ndtd">${LNCStatus}</td>
                      <td class="center table2ndtd"> </td>
                      <td class="center table2ndtd">N/A</td>
                      <td class="center table2ndtd">${LNCLabel}</td>
                    </tr> 
                    <tr>
                      <td class="center table2ndtd">Nutrition Service</td>
                      <td class="center table2ndtd">${NutritionServiceStatus}</td>
                      <td class="center table2ndtd"> </td>
                      <td class="center table2ndtd">N/A</td>
                      <td class="center table2ndtd">${NutritionServiceLabel}</td>
                    </tr> 
                    <tr>
                      <td class="center table2ndtd">Change in Nutrition Service</td>
                      <td class="center table2ndtd">${ChangeNutritionServiceStatus}</td>
                      <td class="center table2ndtd"> </td>
                      <td class="center table2ndtd">N/A</td>
                      <td class="center table2ndtd">${ChangeNutritionServiceLabel}</td>
                  </tr> 
                  <tr>
                    <td class="center table2ndtd">Discussion Question</td>
                    <td class="center table2ndtd">${DiscussionQuestionServiceStatus}</td>
                    <td class="center table2ndtd"> </td>
                    <td class="center table2ndtd">N/A</td>
                    <td class="center table2ndtd">${DiscussionQuestionServiceLabel}</td>
                  </tr> 
                  <tr>
                    <td class="center table2ndtd">Budget (AIP)</td>
                    <td class="center table2ndtd"> </td>
                    <td class="center table2ndtd"> </td>
                    <td class="center table2ndtd">N/A</td>
                    <td class="center table2ndtd"></td>
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

  let table = new DataTable('#lguReport', {
    ajax: {
      url: "https://nnc-nmis.moodlearners.com/BarangayScholar/lguProfile/fetchreport",
      type: 'GET',
      dataSrc: 'data',
    },
    columns: [


      {
        data: "name",
        render: function (data, type, row) {
          // Example of adding a suffix
          return `${data}`;
        }
      },
      {
        data: "repdateM",
        render: function (data, type, row) {
          var date = new Date(data); 
          var options = { year: 'numeric', month: 'long', day: 'numeric' };
          return date.toLocaleDateString('en-PH', options);
        }
      },
      {
        data: "repperiodC",
        render: function (data, type, row) {
          // Example of adding a suffix
          return `${data}`;
        }
      },
      {
        data: "count ",
        render: function (data, type, row) {
          if (data == 1) {
            return ' <span class="statusPending cursor" title="For Review">Ongoing</span>';
          } else {
            return '<span class="statusApproved cursor" title="Added to LGU Report">APPROVED</span>';
          }
        }
      },
      {
        data: ["repStatus", "repCount"],
        orderable: false,
        render: function (data, type, row) {
          let repStatus = row.repStatus; // Access the status field from the row
          let repCount = row.repCount;   // Access the count field from the row
          // return data ? data : 'No Office';
          if (repStatus >= 1 | repStatus <= 9) {
            return `${repCount}` + '/9';
          } else {
            return '<span class="statusApproved cursor" title="Added to LGU Report">Submit report</span>';
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
    order: [[1, 'asc']]
  });

  $('#lguReport tbody').on('click', 'td.dt-control', function () {
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
