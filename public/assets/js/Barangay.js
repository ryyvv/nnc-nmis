$(function () {
    // Submit LGU Profile
    $('#submit').on('click', function (e) {
        document.getElementById('status').value = 1;
        document.getElementById('formrequest').value = 'submit';    
        $('#form').submit();
    });

    // Draft LGU Profile
    $('#draft').on('click', function (e) { 
        document.getElementById('status').value = 2;
        document.getElementById('formrequest').value = 'draft';
        $('#form').submit();
    });


});

// dynamic View/edit
function view( url, id, action){
    window.location.href = url + '/' + id+ '/'+ action;
   
}
$(function() {
    // Submit LGU Profile
    $('#nutritionService-submit').on('click', function(e) {
        document.getElementById('status').value = 1;
        $('#nutritionService-form').submit();
        console.log('clicked!Submit');
    });

    // Draft LGU Profile
    $('#nutritionService-draft').on('click', function(e) {
        document.getElementById('status').value = 2;
        $('#nutritionService-form').submit();
        console.log('clicked!draft');
    });
});

function openModal(id, url) {
    profileId = id; 
    $('#deleteModal').modal('show'); // Show the modal
}






// Delete LGUProfile
function confirmDeleteLGU(){    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "lguprofile/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function(result) {
                    // Insert the alert HTML into your page
                    $('#deleteAlert').prepend(`
                    <div id="success-alert" style="background-color:#d1fad7!important;border: 2px solid #109121!important;border-radius:5px" class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex" style="align-items:center!important">
                            <lord-icon src="https://cdn.lordicon.com/guqkthkk.json" trigger="loop" delay="2000" colors="primary:#109121" style="width:25px;height:25px">
                            </lord-icon>
                            <label style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:8px" for="">Success! </label><span style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:5px">Data deleted successfully.</span>
                        </div>
                        <button type="button" class="close" style="color:gray!important " data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    `);
    
                    // Auto close alert after 5 seconds
                    setTimeout(function() {
                        $('#success-alert').fadeOut('slow'); 
                    }, 2000); // 5000 milliseconds = 5 seconds
    
                    // Reload the page after a delay
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000); // Delay before reload (2 seconds)
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

// Delete confirmDeleteVM
function confirmDeleteVM(){

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
                    // Insert the alert HTML into your page
                    $('#deleteAlert').prepend(`
                    <div id="success-alert" style="background-color:#d1fad7!important;border: 2px solid #109121!important;border-radius:5px" class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex" style="align-items:center!important">
                            <lord-icon src="https://cdn.lordicon.com/guqkthkk.json" trigger="loop" delay="2000" colors="primary:#109121" style="width:25px;height:25px">
                            </lord-icon>
                            <label style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:8px" for="">Success! </label><span style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:5px">Data deleted successfully.</span>
                        </div>
                        <button type="button" class="close" style="color:gray!important " data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    `);
    
                    // Auto close alert after 5 seconds
                    setTimeout(function() {
                        $('#success-alert').fadeOut('slow'); 
                    }, 2000); // 5000 milliseconds = 5 seconds
    
                    // Reload the page after a delay
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000); // Delay before reload (2 seconds)
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

// Delete confirmDeleteVM
function confirmDeleteNP(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // console.log(profileId);
    if (profileId) { // Check if profileId has been set
        $.ajax({
            url: "nutritionpolicies/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: 'POST',
            success: function(result) {
                    // Insert the alert HTML into your page
                    $('#deleteAlert').prepend(`
                    <div id="success-alert" style="background-color:#d1fad7!important;border: 2px solid #109121!important;border-radius:5px" class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex" style="align-items:center!important">
                            <lord-icon src="https://cdn.lordicon.com/guqkthkk.json" trigger="loop" delay="2000" colors="primary:#109121" style="width:25px;height:25px">
                            </lord-icon>
                            <label style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:8px" for="">Success! </label><span style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:5px">Data deleted successfully.</span>
                        </div>
                        <button type="button" class="close" style="color:gray!important " data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    `);
    
                    // Auto close alert after 5 seconds
                    setTimeout(function() {
                        $('#success-alert').fadeOut('slow'); 
                    }, 2000); // 5000 milliseconds = 5 seconds
    
                    // Reload the page after a delay
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000); // Delay before reload (2 seconds)
               
            },
            error: function(xhr) {
                alert('Error deleting profile: ' + xhr.responseText);
            }
        });
        $('#deleteModal').modal('hide'); // Hide the modal
    }
};

 