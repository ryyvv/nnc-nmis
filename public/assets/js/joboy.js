
new DataTable('#myTable');


let profileId;

// Function for LGU Profile Year field
$(document).ready(function() {
   
    $('#periodCovereda').change(function() {
        let selectedPeriod = $(this).val();
        document.getElementById('currentYear').innerText = selectedPeriod;
        document.getElementById('currentYearMinus1').innerText = selectedPeriod-1;
        document.getElementById('currentYearMinus2').innerText = selectedPeriod-2;

    });


});

$(function() {
    // Submit LGU Profile
    $('#lgu-submit').on('click', function(e) {
        document.getElementById('status').value = 1;
        $('#lgu-profile-form').submit();
    });

    // Draft LGU Profile
    $('#lgu-draft').on('click', function(e) {
        document.getElementById('status').value = 2;
        $('#lgu-profile-form').submit();
    });

    // $('#lgu-submit-edit').on('click', function(e) {
    //     document.getElementById('status').value = 1;
    //     $('#lgu-profile-form-edit').submit();
    // });

    // // Draft LGU Profile
    // $('#lgu-draft-edit').on('click', function(e) {
    //     document.getElementById('status').value = 2;
    //     $('#lgu-profile-form-edit').submit();
    // });

});




// Submit Edit function Mellpi Pro For LGU
function myFunction(id){
    window.location.href = "lguprofile/"+ id +"/edit";

}

// Submit show function Mellpi Pro For LGU
function LGUmyFunction(id){
    window.location.href = "lguprofile/"+id;
}

/////////

// Submit Edit function Mellpi Pro For LNFP
function myFunctionLNFP(id){
    window.location.href = "lguLnfpEdit/"+ id;

}

// Submit show function Mellpi Pro For LGU
function LNFPmyFunction(id){
    window.location.href = "lguLnfpEdit/"+id;
}

//Delete Entry
function LNFPopenModal(id) {
    LNFPid = id; // Store the ID
    $('#deleteModal').modal('show'); // Show the modal
}
// function LNFPopenModal(element) {
//     var id = element.getAttribute('data-id');
//     var form = document.getElementById('deleteForm');
//     var action = "{{ route('lguLnfpDeleteForm5a', ':id') }}";
//     form.action = action.replace(':id', id); // Update the form action with the correct ID
//     $('#deleteModal').modal('show'); // Show the modal
// }
 /////


//Delete Entry

function openModal(id) {
    profileId = id; // Store the ID
    $('#deleteModal').modal('show'); // Show the modal
}


// Mellpi Pro For LGU  delete
function confirmDelete(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "lguprofile/" + profileId + "/delete", // Ensure the URL is correct
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
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

//Mellpi Pro for LNFP Delete
function confirmDeleteLNFP(){

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
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};


