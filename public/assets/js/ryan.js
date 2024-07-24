

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

    // console.log(profileId);
    if (LNFPid) { // Check if profileId has been set
        $.ajax({
            url: "lguLnfpDelete/" + LNFPid, // Ensure the URL is correct
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


