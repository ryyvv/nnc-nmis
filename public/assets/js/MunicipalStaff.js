
$(document).ready(function() {

//   if ($.fn.DataTable.isDataTable('#lnfpReport')) {
//     $('#lnfpReport').DataTable().destroy();  // Destroy existing table instance
// }
  
    var table = $('#lnfpReport').DataTable({
        // processing: true,
        // serverSide: true,
        ajax: {
                url: "https://nnc-nmis.moodlearners.com/CMSDashboard/fetchreport",
                type: 'GET',
                dataSrc: 'data',
              }, // Fetch data from server
        columns: [
    
            { data: 'lnfp_officer', name: 'lnfp_officer' },
            { data: 'evaluating', name: 'evaluating'},
            { data: 'created_at', 
                render: function(data){
                  return  formatDate(data);
                } 
              },
              { data: 'updated_at', 
                render: function(data){
                  return  formatDate(data);
                } 
              },
            { 
              data: 'status',
                render: function (data) {
                    if (data == 3) {
                        return `
                            <div class="d-flex" style="display:inline-block;text-align:center;border: 2px solid #28a745;padding:4px;border-radius:15px;">
                                <div style="border-radius:15px; border: 2px solid #28a745; background-color: #28a745; padding: 2px;margin-right:5px">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/guqkthkk.json"
                                        trigger="hover"
                                        colors="primary:#ffffff"
                                        style="width:15px;height:15px">
                                    </lord-icon>
                                </div>
                                <div class="bold" style="font-size:15px;text-align:center;margin-right:8px;color:#28a745">
                                    For Approval
                                </div>
                            </div>
                        `;
                    } else {
                        return `
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
                        `;
                    }
                }
             },
             {
                className: 'details-control',  // Expandable row button
                orderable: false,
                data: null,
                defaultContent: ''  // Empty button for expansion
            },   
            //  {  data: 'status', name: '' }  
        ]
    });

    // Event listener for opening and closing details
    $('#lnfpReport tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Hide any other expanded rows
                $('#lnfpReport tbody tr.shown').each(function() {
                    let openRow = table.row(this);
                    openRow.child.hide();
                    $(this).removeClass('shown');
                });

                // Show the current row
                row.child(format(row.data())).show();
                $(tr).addClass('shown');
        }
    });

    // Function to format the expandable row content
    function format(d) {

        var status_form5 = getStatusHtml(d.form5_status);
        var status_form7 = getStatusHtml(d.form7_status);
        var status_form8 = getStatusHtml(d.form8_status);
        var status_interview = getStatusHtml(d.formInt_status);
        var status_overall = getStatusHtml(d.formScore_status);

    // Create the table structure
    return `
         <div class="nested-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Form</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Form 5</td>
                        <td>${ formatDate( d.update_form5 ) || 'N/A' }</td>
                        <td>${ status_form5 || 'N/A'}</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Form 6 and 7</td>
                         <td>${ formatDate(d.update_form7) || 'N/A' }</td>
                        <td>${ status_form7 || 'N/A'}</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Form 8</td>
                         <td>${ formatDate( d.update_form8 ) || 'N/A' }</td>
                        <td>${ status_form8 || 'N/A'}</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Interview</td>
                        <td>${ formatDate(d.update_formInt) || 'N/A' }</td>
                        <td>${ status_interview|| 'N/A'}</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Overall Score</td>
                        <td>${ formatDate( d.update_formScore ) || 'N/A' }</td>
                        <td>${ status_overall || 'N/A'}</td>
                        <td>N/A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    `;
    }

  });


  function formatDate(dateString) {

    if (!dateString) {
        return 'N/A';  // Handle empty or falsy values
    }

    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const date = new Date(dateString);

    // Ensure valid date before formatting
    return isNaN(date.getTime()) ? 'Invalid Date' : date.toLocaleDateString(undefined, options);
}

function getStatusHtml(status) {
    if (status == 3  || status == 1) {
        return '<a href="#" class="badge badge-info">Done</a>';
    } else if ( status == 2) {
        return '<a href="#" class="badge badge-warning">Ongoing</a>';
    } else {
        return '<a href="#" class="badge badge-secondary">Not yet started</a>';
    }
}







