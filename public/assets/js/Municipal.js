function openApproved(id) {
    profileId = id; // Store the ID
    $('#ApprovedModal').modal('show'); // Show the modal
}

function openDeclined(id) {
    profileId = id; // Store the ID
    $('#DeclinedModal').modal('show'); // Show the modal
}


 
function confirmApproved(){

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
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 500); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
           
            },
            error: function(xhr) {
                alert('Error data : ' + xhr.responseText);
            }
        });
        $('#ApprovedModal').modal('hide'); // Hide the modal
    }
};

function confirmDeclined(){

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
            url:  "lguProfile/declined"  , // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function(result) {
                setTimeout(function() {
                    window.location.reload(); // Reload the page after a delay
                }, 500); // Delay before reload (2 seconds)
                $('#successAlert').removeClass('d-none').fadeIn(); // Show success alert
            
            },
            error: function(xhr) {
                alert('Error declined data: ' + xhr.responseText);
            }
        });
        $('#openDeclined').modal('hide'); // Hide the modal
    }
};