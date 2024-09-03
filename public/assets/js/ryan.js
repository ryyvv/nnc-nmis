

$(function () {
    // Submit LGU Profile
    $('#lgu-submit').on('click', function (e) {
        document.getElementById('status').value = 1;
        $('#lgu-profile-form').submit();
    });

    // Draft LGU Profile
    $('#lgu-draft').on('click', function (e) {
        document.getElementById('status').value = 2;
        $('#lgu-profile-form').submit();
    });
});

// View FormA
function formAfunction(root, id, list) {
    window.location.href = root + '/' + id + '/' + list;
}

// View FormB
function formBfunction(list, idb) {
    window.location.href = list + '/' + idb;
}


// Submit Edit function Mellpi Pro For LGU
function editlgu(id, url, action){
    window.location.href = 'lguprofile/' + id+ '/edit';
}


//Delete Entry
function LNFPopenModal(id) {
    $('#deleteModal').modal('show'); // Show the modal
}


//Delete Entry

function openModal(id) {
    profileId = id; // Store the ID
    $('#deleteModal').modal('show'); // Show the modal
}

function openModalLNFP(id) {
    profileId = id; // Store the ID
    $('#deleteModal').modal('show'); // Show the modal
}


// Mellpi Pro For LGU  delete
function confirmDelete(url, action) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: url + "/" + profileId, // Ensure the URL is correct
            type: 'GET',
            success: function (result) {
                setTimeout(function () {
                    window.location.reload(); // Reload the page after a delay
                }, 2000); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert

            },
            error: function (xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal

    }
};

//Mellpi Pro for LNFP Delete
function confirmDeleteLNFP() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "lguLnfpDeleteProfile", // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function (result) {
                setTimeout(function () {
                    window.location.reload(); // Reload the page after a delay
                }, 2000); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert

            },
            error: function (xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};


new DataTable('#formbuilderA');
new DataTable('#formbuilderB');
new DataTable('#formbuilderC'); 
new DataTable('#myTableQC');
// document.addEventListener('DOMContentLoaded', (event) => {
//     // Wait for 2 seconds and then submit the form
//     setTimeout(() => {
//         document.getElementById('hiddenButton').click();
//     }, 2000);
// });
function downloadPDF(id) {
    var html = document.getElementById('downloadable').innerHTML; 
    //var sourceValue = $('#downloadable').val();
    $('#htmlContent').val(html);
    function copyInputValueAndSubmit() {
  
        $('#hiddenButton').click();
    }
    setTimeout(copyInputValueAndSubmit);
}

// Password Section
$(document).ready(function () {
    $('#togglePassword').on('change', function() {
        var passwordInput = $('#password');
        var confirmpasswordInput = $('#password_confirmation');
        if ($(this).is(':checked')) {
            passwordInput.attr('type', 'text');
            confirmpasswordInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
            confirmpasswordInput.attr('type', 'password');
        }
    });

    $('#customSwitch1').on('change', function() {
        if ($(this).is(':checked')) {
            $('#updateAccountStatusBtn').removeAttr('disabled');
            $('#userrole').removeAttr('disabled');
            $('#userdesignation').removeAttr('disabled');
            $('#userrequest').removeAttr('disabled');
        } else {
            $('#updateAccountStatusBtn').attr('disabled', 'disabled');
            $('#userrole').attr('disabled', 'disabled');
            $('#userdesignation').attr('disabled', 'disabled');
            $('#userrequest').attr('disabled', 'disabled');
        }
    });

    $('#userrequest').on('change', function() {
        var requestValue = $(this).val();

        if(requestValue == 1){
            $('#userstatus').removeAttr('disabled');
            $('#userstatus').val('1');
            $('#hiddenuserstatus').val('1');
        }else {
            $('#hiddenuserstatus').val('2');
            $('#userstatus').val('2');
            $('#userstatus').attr('disabled', 'disabled');
        }
    });

    $('#userstatus').on('change', function() {
        var requestValuestatus = $(this).val();

        if(requestValuestatus == 1){
            $('#hiddenuserstatus').val('1');
        }else {
            $('#hiddenuserstatus').val('2');
        }
    });

    // $('#customSwitch2').on('change', function() {
    //     if ($(this).is(':checked')) {
    //         // $('#updatePasswordBtn').removeAttr('disabled');
    //         $('#password').removeAttr('disabled');
    //         $('#password_confirmation').removeAttr('disabled');

    //         if ($('#password').val().trim() !== '' && $('#password_confirmation').val().trim() !== '') {
    //             $('#updatePasswordBtn').removeAttr('disabled');
    //         } else {
    //           $('#updatePasswordBtn').attr('disabled', 'disabled');
    //         }
    //     } else {
    //         $('#password').attr('disabled', 'disabled');
    //         $('#password_confirmation').attr('disabled', 'disabled');
    //     }
    // });


    $('#customSwitch2').on('change', function() {
        if ($(this).is(':checked')) {
            // Enable the fields when the switch is checked
            $('#password').removeAttr('disabled');
            $('#password_confirmation').removeAttr('disabled');
    
            // Check if the fields have non-empty values
            updateUpdateButtonState();
        } else {
            // Disable the fields and the button when the switch is unchecked
            $('#password').attr('disabled', 'disabled');
            $('#password_confirmation').attr('disabled', 'disabled');
            $('#updatePasswordBtn').attr('disabled', 'disabled');
        }
    });
    
    // Function to update the state of the update button based on field values
    function updateUpdateButtonState() {
        if ($('#password').val().trim() !== '' && $('#password_confirmation').val().trim() !== '') {
            $('#updatePasswordBtn').removeAttr('disabled');
        } else {
            $('#updatePasswordBtn').attr('disabled', 'disabled');
        }
    }
    
    // Also check the button state when the input values change
    $('#password, #password_confirmation').on('input', function() {
        if ($('#customSwitch2').is(':checked')) {
            updateUpdateButtonState();
        }
    });
    
});
