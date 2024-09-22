
let profileId;
let LNFP_form_id;

// Function for LGU Profile Year field
$(document).ready(function() {
   
    $('#periodCovereda').change(function() {
        let selectedPeriod = $(this).val();
        document.getElementById('currentYear').innerText = selectedPeriod;
        document.getElementById('currentYearMinus1').innerText = selectedPeriod-1;
        document.getElementById('currentYearMinus2').innerText = selectedPeriod-2;

        document.getElementById('currentYearb').innerText = selectedPeriod;
        document.getElementById('currentYearMinus1b').innerText = selectedPeriod-1;
        document.getElementById('currentYearMinus2b').innerText = selectedPeriod-2;

        document.getElementById('currentYearc').innerText = selectedPeriod;
        document.getElementById('currentYearMinus1c').innerText = selectedPeriod-1;
        document.getElementById('currentYearMinus2c').innerText = selectedPeriod-2;

        document.getElementById('currentYeard').innerText = selectedPeriod;
        document.getElementById('currentYearMinus1d').innerText = selectedPeriod-1;
        document.getElementById('currentYearMinus2d').innerText = selectedPeriod-2;

        document.getElementById('currentYeare').innerText = selectedPeriod;
        document.getElementById('currentYearMinus1e').innerText = selectedPeriod-1;
        document.getElementById('currentYearMinus2e').innerText = selectedPeriod-2;

    });


});



$(function() {
    // Submit LNFP Profile
    $('#lnfplgu-submit').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-profile-form').submit();
    });

    // Draft LNFP Profile
    $('#lnfplgu-draft').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-profile-form').submit();
    });
});
$(function() {
    // Submit LNFP Profile edit
    $('#lnfplgu-submit-with-id').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-profile-form-edit').submit();
    });

    // Draft LNFP Profile edit
    $('#lnfplgu-draft-with-id').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-profile-form-edit').submit();
    });

    //Form7
    $('#lnfp-form7-with-id').on('click', function(e) {
        $('#lnfp-form7-edit').submit();
    });

});

$(function() {
    // Submit LNFP Form 8
    $('#lnfpForm8-submit').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-form8-form').submit();
    });

    // Draft LNFP Form 8
    $('#lnfpForm8-draft').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-form8-form').submit();
    });
});
$(function() {
    // Submit LNFP Form 8
    $('#lnfpForm8-submit-with-id').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-form8-form').submit();
    });

    // Draft LNFP Form 8
    $('#lnfpForm8-draft-with-id').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-form8-form').submit();
    });
});

$(function() {
    // Submit LNFP Interview Form
    $('#lnfpInterviewForm-submit').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-interview-form').submit();
    });

    // Draft LNFP Interview Form
    $('#lnfpInterviewForm-draft').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-interview-form').submit();
    });
});
$(function() {
    // Submit LNFP Interview Form
    $('#lnfpInterviewForm-submit-with-id').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-interview-form').submit();
    });

    // Draft LNFP Interview Form
    $('#lnfpInterviewForm-draft-with-id').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-interview-form').submit();
    });
});

$(function() {
    // Submit LNFP Interview Form
    $('#lnfpInterviewForm-submit').on('click', function(e) {
        document.getElementsByName('submitStatus').value = 1;
        var actionSubmit = document.getElementById('action');
        actionSubmit.value = "submit";
        $('#lnfp-interview-form').submit();
    });

    // Draft LNFP Interview Form
    $('#lnfpInterviewForm-draft').on('click', function(e) {
        document.getElementsByName('DraftStatus').value = 2;
        var actionDraft = document.getElementById('action');
        actionDraft.value = "draft";
        $('#lnfp-interview-form').submit();
    });
});

// Submit Edit function Mellpi Pro For LGU
function myFunction(id, url, action){
    window.location.href = url + '/' + id+ '/edit';
}

// Submit show function Mellpi Pro For LGU
function LGUmyFunction(id){
    window.location.href = "lguprofile/"+id+"/show";
}

/////////

// Submit Edit function Mellpi Pro For LNFP
function myFunctionLNFP_lguprofile(id){
    window.location.href = "lguLnfpEditprofile/"+ id;

}


function myFunctionLNFP_Form5View(id){
    window.location.href = "lguForm5ViewForm/"+ id;

}


function myFunctionLNFP(id){
    window.location.href = "lguLnfpEdit/"+ id;

}
function myFunctionLNFP_addform(id){
    window.location.href = "lguForm5addForm/"+ id;
}
function myFunctionLNFP_form8(id){
    window.location.href = "lguLnfpEditForm8/"+ id;

}
function LNFPmyFunction_form8(id){
    window.location.href = "lguLnfpEditForm8/"+ id;

}
function myLNFPmyFunction_form8(id){
    window.location.href = "lguLnfpViewForm8/"+ id;

}


function myFunctionLNFP_InterviewForm(id){
    window.location.href = "lguLnfpEditInterview/"+ id;

}
function LNFPmyFunction_InterviewForm(id){
    window.location.href = "lguLnfpViewInterview/"+ id;

}

function LNFPmyFunction_overallScore(id){
    window.location.href = "lguLnfpEditOverall/"+ id;

}

function myLNFPmyFunction_overallScore(id){
    window.location.href = "lguLnfpViewOverall/"+ id;

}

// Submit show function Mellpi Pro For LNFP
function LNFPmyFunction_lguprofile(id){
    window.location.href = "lguLnfpEditprofile/"+id;
}
function LNFPmyFunction(id){
    window.location.href = "lguLnfpEdit/"+id;
}
// form 6
function LNFPmyFunction_form6(id){
    window.location.href = "lguform6Edit/"+id;
}

function myLNFPmyFunction_form6(id){
    window.location.href = "lguform6View/"+id;
}


//Delete Entry for MellpiPro for LNFP
function LNFPopenModaLguProfilel(id) {
    LNFP_profile_id = id; // Store the ID
    $('#deleteModal_lguprofile').modal('show'); // Show the modal
}

// //Mellpi Pro for LNFP Delete
// function confirmDeleteLNFP_Lguprofile(){

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     // console.log(profileId);
//     if (LNFP_profile_id) { // Check if profileId has been set
//         $.ajax({
//             url: "lguLnfpDeleteProfile/" + LNFP_profile_id, // Ensure the URL is correct
//             type: 'GET',
//             success: function(result) {
//                 setTimeout(function() {
//                     window.location.reload(); // Reload the page after a delay
//                 }, 2000); // Delay before reload (2 seconds)
//                 $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
//             },
//             error: function(xhr) {
//                 alert('Error deleting profile: ' + xhr.responseText);
//             }
//         });
//         $('#deleteModal_lguprofile').modal('hide'); // Hide the modal
//     }
// };

// function LNFPopenModal(id) {
//     LNFP_form_id = id; // Store the ID
//     $('#deleteModal').modal('show'); // Show the modal
// }

// function confirmDeleteLNFP_form5() {
//     if (LNFP_form_id) { // Ensure the ID is set
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $.ajax({
//             url: "{{ route('lguLnfpDelete') }}", // Ensure this route is correctly defined in your routes file
//             data: { id: LNFP_form_id },
//             type: 'POST',
//             success: function(result) {
//                 setTimeout(function() {
//                     window.location.reload(); // Reload the page after a delay
//                 }, 2000); // Delay before reload (2 seconds)
//                 $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
//             },
//             error: function(xhr) {
//                 alert('Error deleting data: ' + xhr.responseText);
//             }
//         });
//         $('#deleteModal').modal('hide'); // Hide the modal
//     }
// };


function LNFPopenModal(id) {
    LNFP_form_id = id; // Store the ID
    $('#deleteModal').modal('show'); // Show the modal
}

function confirmDeleteLNFP_form5(id){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    // if (LNFP_form_id) { // Check if profileId has been set
        $.ajax({
            url: "lguLnfpDelete/", // Ensure the URL is correct
            data: { id: id },
            type: 'POST',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 2000); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting data: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    // }
};



function LNFPopenModal_form8(id) {
    LNFP_profile_id = id; // Store the ID
    $('#deleteModal_form8').modal('show'); // Show the modal
}

function confirmDeleteLNFP_Form8(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (LNFP_profile_id) { // Check if profileId has been set
        $.ajax({
            url: "lguLnfpDeleteForm8/" + LNFP_profile_id, // Ensure the URL is correct
            type: 'GET',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 2000); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal_form8').modal('hide'); // Hide the modal
    }
};



function LNFPopenModal_InterviewForm(id) {
    LNFP_profile_id = id; // Store the ID
    $('#deleteModal_InterviewForm').modal('show'); // Show the modal
}

function confirmDeleteLNFP_IntForm(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (LNFP_profile_id) { // Check if profileId has been set
        $.ajax({
            url: "lguLnfpDeleteInterview/" + LNFP_profile_id, // Ensure the URL is correct
            type: 'GET',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 2000); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal_InterviewForm').modal('hide'); // Hide the modal
    }
};



// Mellpi Pro For LGU  delete
function confirmDelete(url, action){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: url + "/" + profileId + "/" + action, // Ensure the URL is correct
            type: 'GET',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 500); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

// Mellpi Pro For Mission Vision
function confirmDeleteMission(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "visionmission/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 500); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

// Mellpi Pro For Governance
function confirmDeleteGovern(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "governance/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 500); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

// Mellpi Pro For Governance
function confirmDeleteLNC(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "lncmanagement/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 500); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};



// Form 5 Edit function
function myForm5Edit(id){
    window.location.href = "form5edit/"+ id;

}




new DataTable('#myTable');

//Mellpi Pro For LNFP
new DataTable('#form5myTable');
new DataTable('#LNFP_Profile_myTable');
new DataTable('#form6Table');
new DataTable('#form8myTable');
new DataTable('#InterviewFormmyTable');
new DataTable('#overallScoremyTable');
new DataTable('#nutriOffice');
new DataTable('#myTableLnfp');
new DataTable('#example1');
new DataTable('#lguReport');
// new DataTable('#lnfpReport');
new DataTable('#myTableForm5', {
    responsive: true
});