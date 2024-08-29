$(function () {
    // Submit LGU Profile
    $("#submit").on("click", function (e) {
        document.getElementById("status").value = 1;
        document.getElementById("formrequest").value = "submit";
        $("#form").submit();
    });

    $("#savechanges").on("click", function (e) {
        $("#formuserstatusupdate").submit();
    });

    $("#updatePasswordSubmit").on("click", function (e) {
        $("#formuserpasswordupdate").submit();
    });



    // Draft LGU Profile
    $("#draft").on("click", function (e) {
        document.getElementById("status").value = 2;
        document.getElementById("formrequest").value = "draft";
        $("#form").submit();
    });

    // warning
    // AprrovedDocument
});

$(function () {
    // 1. display a modal like form and it will add the data to row
    // 2. append the data to new row
    // Other: Calculate the value each row per column  (automaetic)

    let table1 = 1;
    $("#table1").on("click", function () {
        $("#recordtable1-container").append(`
        <div class="record">
            <input type="text" name="data[${recordIndex}][field1]" placeholder="Field 1">
            <input type="text" name="data[${recordIndex}][field2]" placeholder="Field 2">
            <!-- Add more fields as needed -->
        </div>
    `);
    });
});

// dynamic View/edit
function view(url, id, action) {
    window.location.href = url + "/" + id + "/" + action;
}

$(function () {
    // Submit LGU Profile
    $("#nutritionService-submit").on("click", function (e) {
        document.getElementById("status").value = 1;
        $("#nutritionService-form").submit();
        console.log("clicked!Submit");
    });

    // Draft LGU Profile
    $("#nutritionService-draft").on("click", function (e) {
        document.getElementById("status").value = 2;
        $("#nutritionService-form").submit();
        console.log("clicked!draft");
    });
});

function openModal(id, url) {
    profileId = id;
    $("#deleteModal").modal("show"); // Show the modal
}

// Delete LGUProfile
function confirmDeleteLGU() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "lguprofile/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteVM() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "visionmission/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteNP() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "nutritionpolicies/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteGov() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "governance/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteLNC() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "lncmanagement/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteNS() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "nutritionservice/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteChangeNS() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "changeNS/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteVM
function confirmDeleteDQ() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "discussionquestion/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

// Delete confirmDeleteDQ
function confirmDeleteBudget() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // console.log(profileId);
    if (profileId) {
        // Check if profileId has been set
        $.ajax({
            url: "budgetAIP/delete", // Ensure the URL is correct
            data: { id: profileId },
            type: "POST",
            success: function (result) {
                // Insert the alert HTML into your page
                $("#deleteAlert").prepend(`
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
                setTimeout(function () {
                    $("#success-alert").fadeOut("slow");
                }, 2000); // 5000 milliseconds = 5 seconds

                // Reload the page after a delay
                setTimeout(function () {
                    window.location.reload();
                }, 3000); // Delay before reload (2 seconds)
            },
            error: function (xhr) {
                alert("Error deleting profile: " + xhr.responseText);
            },
        });
        $("#deleteModal").modal("hide"); // Hide the modal
    }
}

 

// Test2 Add row
$(document).ready(function () {

    function SocialcalculateRowTotal(row) {
        const SocialrowpersonelService = parseFloat(row.find('input[name="personel_service[]"]').val()) || 0;
        const  Socialrowmooe = parseFloat(row.find('input[name="mooe[]"]').val()) || 0;
        const  SocialrowcapitalOutlay = parseFloat(row.find('input[name="capital_outlay[]"]').val()) || 0;
        const  Socialrowtotal = SocialrowpersonelService + Socialrowmooe + SocialrowcapitalOutlay;

        row.find('input[name="total[]"]').val(Socialrowtotal.toFixed(2));
    }

    // Trigger calculation when any of the inputs are changed
    $("#dataTable").on("input", 'input[name="personel_service[]"], input[name="mooe[]"], input[name="capital_outlay[]"]', function () {
        const row = $(this).closest('tr');
        SocialcalculateRowTotal(row);
    });

    // If you need to recalculate all rows (e.g., after dynamically adding rows)
    function recalculateAllRows() {
        $("#dataTable tbody tr").each(function () {
            SocialcalculateRowTotal($(this));
        });
    }
 


    const content = [
        // page1
        '<div class="row">' +
            '<div class="col form-group">' +
                '<label class="bold label1" for="field1">AIP Ref. Code</label>' +
                '<input type="text" class="form-control" id="aipcode" name="aipcode" required>' +
            "</div>" +
            '<div class="col form-group">' +
                '<label class="bold label1" for="field2">Nutrition Typology Code</label>' +
                '<input type="text" class="form-control" id="nutrition_topology_code" name="nutrition_topology_code" required>' +
            "</div>" +
        "</div>" +
        '<div class="form-group">' +
            '<label class="bold label1" for="field2">Program/Project/Activity Description</label>' +
            '<textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px" name="program" id="program"></textarea>' +
        "</div>" +
        '<div class="form-group">' +
            '<label class="bold label1" for="field2">Implementing Agency</label>' +
            '<input type="text" class="form-control"name="implementing_agency" id="implementing_agency"></textarea>' +
        "</div>",

        // page2
            '<label class="bold label1" for="field2">Schedule of Implementation</label>' +
            '<div class="row">' +
                '<div class="col form-group">' +
                    '<span class="bold" style="font-size:12px;color:gray">Start Date</span>' +
                    '<input type="date" class="form-control" id="startdate" name="startdate" required>' +
                "</div>" +
                '<div class="col form-group">' +
                    '<span class="bold" style="font-size:12px;color:gray">Completion Date</span>' +
                    '<input type="date" class="form-control" id="completiondate" name="completiondate" required>' +
                "</div>" +
            "</div>" +
            '<div class="form-group">' +
                '<label class="bold label1" for="field2">Expected Output</label>' +
                '<textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px" name="expected_output" id="expected_output"></textarea>' +
            "</div>" +
            '<div class="form-group">' +
                    '<label class="bold label1" for="field2">Source of Funds</label>' +
                    '<select class="form-control" name="sourceoffund"  id="sourceoffund">'+
                    ' <option selected value="">Please select one</option>'+
                    '<option value="barangay" >local</option>'+
                    '<option value="provincial" >Provincial Government</option>'+
                    '<option value="national" >National</option>'+
                    '<option value="external" >External</option>'+
                    '<option value="municipal" >City/Municipal</option>'+
                '</select>'+
                "</div>" ,

        // page3
        "<label class='bold label1' for='field2'>Amount (P'000)</label>" +
            '<div class="col form-group">' +
            '<span class="bold" style="font-size:12px;color:gray">Personal Services</label>' +
            '<input type="text" class="form-control" id="personel_service" name="personel_service" required>' +
            "</div>" +
            '<div class="col form-group">' +
            '<span class="bold" style="font-size:12px;color:gray">MOOE</label>' +
            '<input type="text" class="form-control" id="mooe" name="mooe" required>' +
            "</div>" +
            '<div class="col form-group">' +
            '<span class="bold" style="font-size:12px;color:gray">Capital Outlay</label>' +
            '<input type="text" class="form-control" id="capital_outlay" name="capital_outlay" required>' +
            "</div>" + 
        "</div>",

        // page4
        "<div>" +
            '<label class="bold label1" for="field2">Governance and Organizational</label>' +
            '<div class="col form-group">' +
            '<span class="bold" style="font-size:12px;color:gray">Structure</label>' +
            '<input type="text" class="form-control" id="direct_nutrition_specific" name="direct_nutrition_specific" required>' +
            "</div>" +
            '<div class="col form-group">' +
            '<span class="bold" style="font-size:12px;color:gray">Nutrition-sensitive (Indirect)</label>' +
            '<input type="text" class="form-control" id="indirect_nutrition_specific" name="indirect_nutrition_specific" required>' +
            "</div>" +
            '<div class="col form-group">' +
            '<span class="bold" style="font-size:12px;color:gray">Enabling Mechanisms</label>' +
            '<input type="text" class="form-control" id="enabling_mechanism" name="enabling_mechanism" required>' +
            "</div>" +
        "</div>",
    ];


    // '<input type="text" class="form-control" id="sourceoffund" name="sourceoffund" required>' +

    let currentPage = 0;
    let formData = [];
    let editIndex = null;

    function saveFormData() {
        let pageData = {};

        if (currentPage === 0) {
            pageData = {
                aipcode: $("#aipcode").val() || "",
                nutrition_topology_code: $("#nutrition_topology_code").val() || "",
                program: $("#program").val() || "",
                implementing_agency: $("#implementing_agency").val() || "", 
            };
        } else if (currentPage === 1) {
            pageData = {
                startdate: $("#startdate").val() || "",
                completiondate: $("#completiondate").val() || "",
               expected_output: $("#expected_output").val() || "",
               sourceoffund: $("#sourceoffund").val() || "",
            };
        } else if (currentPage === 2) {
            pageData = {
                personel_service: $("#personel_service").val() || "",
                mooe: $("#mooe").val() || "",
                capital_outlay: $("#capital_outlay").val() || "", 
                total: $("#total").val() || "", 
            };
        } else if (currentPage === 3) {
            pageData = {
                direct_nutrition_specific:
                    $("#direct_nutrition_specific").val() || "",
                indirect_nutrition_specific:
                    $("#indirect_nutrition_specific").val() || "",
                enabling_mechanism: $("#enabling_mechanism").val() || "",
            };
        }

        formData[currentPage] = pageData;
    }

    function updateContent() {
        $("#modalContent").html(content[currentPage]); 

        // Populate fields with existing form data
        if (formData[currentPage]) {
            const data = formData[currentPage];
            $.each(data, function (key, value) {
                $(`#${key}`).val(value);
            });
        }

        $("#pageIndicator").text(
            `Page ${currentPage + 1} of ${content.length}`,
        );
        $("#prevPage").prop("disabled", currentPage === 0);
        $("#nextPage").prop("disabled", currentPage === content.length - 1);
    }

    $("#prevPage").on("click", function () {
        saveFormData();
        if (currentPage > 0) {
            currentPage--;
            updateContent();
        }
    });

    $("#nextPage").on("click", function () {
        saveFormData();
        if (currentPage < content.length - 1) {
            currentPage++;
            updateContent();
        }
    });

    $("#exampleModal").on("shown.bs.modal", function () {
        updateContent();
    });

    // function red() {
    //     alert('alert!');
    // }

    $("#addToTable").on("click", function () {
        saveFormData();

        let rowIndex = $("#dataTable tbody tr").length;
        let newRow = `<tr data-index="${rowIndex}">
            <td>
              <div class="d-flex">
              <i class="fa fa-edit fa-lg cursor editBtn" style="color:#FFB236;margin-right:10px" title="Edit Disabled"></i>
               <i class="fa fa-trash fa-lg cursor deleteBtn" style="color:RED;margin-right:10px" title="Delete "></i>
              <div> 
            </td>
            <td><input readonly class="inputstyleNone" type="text" name="aipcode[]" value="${formData[0]?.aipcode || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="program[]" value="${formData[0]?.program || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="implementing_agency[]" value="${formData[0]?.implementing_agency || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="startdate[]" value="${formData[1]?.startdate || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="completiondate[]" value="${formData[1]?.completiondate || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="expected_output[]" value="${formData[1]?.expected_output || ""}" required></td>
            <td>
                <select disabled class="inputstyleNone" type="text" name="sourceoffund[]">
                <option selected value="">Please select one</option>
                <option value="barangay" ${formData[1]?.sourceoffund === "Barangay" ? "selected" : ""}>Local</option>
                <option value="provincial" ${formData[1]?.sourceoffund === "provincial" ? "selected" : ""}>Provincial Government</option>
                <option value="national" ${formData[1]?.sourceoffund === "national" ? "selected" : ""}>National</option>
                <option value="external" ${formData[1]?.sourceoffund === "external" ? "selected" : ""}>External</option>
                <option value="municipal" ${formData[1]?.sourceoffund === "municipal" ? "selected" : ""}>City/Municipal</option>
                </select>
            </td>
            <td><input readonly class="inputstyleNone" type="text" name="personel_service[]" value="${formData[2]?.personel_service || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="mooe[]" value="${formData[2]?.mooe || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="capital_outlay[]" value="${formData[2]?.capital_outlay || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="total[]" value="${formData[2]?.total || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="direct_nutrition_specific[]" value="${formData[3]?.direct_nutrition_specific || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="indirect_nutrition_specific[]" value="${formData[3]?.indirect_nutrition_specific || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="enabling_mechanism[]" value="${formData[3]?.enabling_mechanism || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="nutrition_topology_code[]" value="${formData[0]?.nutrition_topology_code || ""}" required></td>
        </tr>`;

        // <td><input readonly class="inputstyleNone" type="text" name="sourceoffund[]" value="${formData[1]?.sourceoffund || ""}" required></td>
        $("#spacing").before(newRow);
        formData = [];
        $("#exampleModal").modal("hide");
        recalculateAllRows();
       
    });


    $("#dataTable").on("click", ".deleteBtn", function () {
        const $row = $(this).closest("tr");
        const index = $row.data("index");
        console.log("Delete row index:", index);

        // Remove row from the table
        $row.remove();
    });
 
    let editingRowIndexedit = null;
    let currentPageedit = 0;

    
    const pages = [
        // Page 1 content
        `<div class="row">
            <div class="col form-group">
                <label for="edit_aipcode" class="bold">AIP Ref. Code</label>
                <input type="text" class="form-control" id="edit_aipcode" required>
            </div>
            <div class="col form-group">
                <label for="edit_nutrition_topology_code" class="bold">Nutrition Typology Code</label>
                <input type="text" class="form-control" id="edit_nutrition_topology_code" required>
            </div>
        </div>
        <div class="form-group">
            <label for="edit_program" class="bold">Program/Project/Activity Description</label>
            <textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px"  id="edit_program"></textarea>
        </div>
        <div class="form-group">
            <label for="edit_implementing_agency" class="bold">Implementing Agency</label>
            <input type="text" class="form-control" id="edit_implementing_agency" required>
        </div>`,

        // Page2
        `<label class="bold label1" for="field2" class="bold">Schedule of Implementation</label>
            <div class="row">
                '<div class="col form-group">
                    <span class="bold" style="font-size:12px;color:gray">Start Date</span>
                    <input type="date" class="form-control" id="edit_startdate"  required>
                </div>
                <div class="col form-group">
                    <span class="bold" style="font-size:12px;color:gray">Completion Date</span>
                <input type="date" class="form-control" id="edit_completiondate" required>
                </div>
            </div>
            <div class="form-group"> 
             <label for="edit_implementing_agency" class="bold">Expected Output</label>
             <textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px"  id="edit_expected_output"></textarea>
            </div>
            <div class="form-group"> 
             <label for="edit_implementing_agency" class="bold">Source of Funds</label> 
                <select class="form-control" id="edit_sourceoffund"> 
                <option value="local">local</option>
                <option value="Provincial Government">Provincial Government</option>
                <option value="National">National</option>
                <option value="External">External</option>
                <option value="City/Municipal">City/Municipal</option>
            </select> 
            </div>
        </div>`,
        
        // Page 2 content
        `<label class='bold label1' for='field2'>Amount (P'000)</label>
        <div class="col form-group">
             <span class="bold" style="font-size:12px;color:gray">Personnel Service</span>
            <input type="text" class="form-control" id="edit_personel_service" required>
        </div>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">MOOE</span>
            <input type="text" class="form-control" id="edit_mooe" required>
        </div>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">Capital Outlay</span>
            <input type="text" class="form-control" id="edit_capital_outlay" required>
        </div>`,

        // Page 3 content
        `<label class='bold label1' for='field2'>Governance and Organizational</label>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">Direct Nutrition Specific</span>
            <input type="text" class="form-control" id="edit_direct_nutrition_specific" required>
        </div>
        <div class="col form-group">
         <span class="bold" style="font-size:12px;color:gray">Indirect Nutrition Specific</span>
            <input type="text" class="form-control" id="edit_indirect_nutrition_specific" required>
        </div>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">Enabling Mechanism</span>
            <input type="text" class="form-control" id="edit_enabling_mechanism" required>
        </div>`,
    ];


    let modalData = {
        aipcode: '',
        nutrition_topology_code: '',
        program: '',
        implementing_agency: '',
        startdate: '',
        completiondate: '',
        expected_output: '',
        sourceoffund: '',
        personel_service: '',
        mooe: '',
        capital_outlay: '',
        direct_nutrition_specific: '',
        indirect_nutrition_specific: '',
        enabling_mechanism: ''
    };

    function showEditModal(index) {
        editingRowIndexedit = index;
        updateEditModalContent();
        $("#editModal").modal("show");
    }

    function saveModalPageData() {
        modalData.aipcode = $("#edit_aipcode").val() || modalData.aipcode;
        modalData.nutrition_topology_code = $("#edit_nutrition_topology_code").val() || modalData.nutrition_topology_code;
        modalData.program = $("#edit_program").val() || modalData.program;
        modalData.implementing_agency = $("#edit_implementing_agency").val() || modalData.implementing_agency;
        modalData.startdate = $("#edit_startdate").val() || modalData.startdate;
        modalData.completiondate = $("#edit_completiondate").val() || modalData.completiondate;
        modalData.expected_output = $("#edit_expected_output").val() || modalData.expected_output;
        modalData.sourceoffund = $("#edit_sourceoffund").val() || modalData.sourceoffund;
        modalData.personel_service = $("#edit_personel_service").val() || modalData.personel_service;
        modalData.mooe = $("#edit_mooe").val() || modalData.mooe;
        modalData.capital_outlay = $("#edit_capital_outlay").val() || modalData.capital_outlay;
        modalData.total = $("#edit_total").val() || modalData.total;
        modalData.direct_nutrition_specific = $("#edit_direct_nutrition_specific").val() || modalData.direct_nutrition_specific;
        modalData.indirect_nutrition_specific = $("#edit_indirect_nutrition_specific").val() || modalData.indirect_nutrition_specific;
        modalData.enabling_mechanism = $("#edit_enabling_mechanism").val() || modalData.enabling_mechanism;
    }

    function updateEditModalContent() {
        $("#editModalContent").html(pages[currentPageedit]);

        // Populate fields with modal data
        $.each(modalData, function (key, value) {
            $(`#edit_${key}`).val(value);
        });

        $("#pageIndicatorEdit").text(`Page ${currentPageedit + 1} of ${pages.length}`);
        $("#prevPageEdit").prop("disabled", currentPageedit === 0);
        $("#nextPageEdit").prop("disabled", currentPageedit === pages.length - 1);
    }

    $("#dataTable").on("click", ".editBtn", function () {
        const index = $(this).closest("tr").data("index");

        // Load existing data into modalData for editing
        const row = $(`#dataTable tbody tr[data-index="${index}"]`);
        modalData = {
            aipcode: row.find('input[name="aipcode[]"]').val(),
            nutrition_topology_code: row.find('input[name="nutrition_topology_code[]"]').val(),
            program: row.find('input[name="program[]"]').val(),
            implementing_agency: row.find('input[name="implementing_agency[]"]').val(),
            startdate: row.find('input[name="startdate[]"]').val(),
            completiondate: row.find('input[name="completiondate[]"]').val(),
            expected_output: row.find('input[name="expected_output[]"]').val(),
            sourceoffund: row.find('input[name="sourceoffund[]"]').val(),
            personel_service: row.find('input[name="personel_service[]"]').val(),
            mooe: row.find('input[name="mooe[]"]').val(),
            capital_outlay: row.find('input[name="capital_outlay[]"]').val(),
            total: row.find('input[name="total[]"]').val(),
            direct_nutrition_specific: row.find('input[name="direct_nutrition_specific[]"]').val(),
            indirect_nutrition_specific: row.find('input[name="indirect_nutrition_specific[]"]').val(),
            enabling_mechanism: row.find('input[name="enabling_mechanism[]"]').val(),
        };

        showEditModal(index);
    });

    $("#prevPageEdit").click(function () {
        if (currentPageedit > 0) {
            saveModalPageData();
            currentPageedit--;
            updateEditModalContent();
        }
    });

    $("#nextPageEdit").click(function () {
        if (currentPageedit < pages.length - 1) {
            saveModalPageData();
            currentPageedit++;
            updateEditModalContent();
        }
    });

    $("#saveChanges").click(function () {
        saveModalPageData(); // Ensure the last page's data is saved

        const row = $(`#dataTable tbody tr[data-index="${editingRowIndexedit}"]`);
        $.each(modalData, function (key, value) {
            row.find(`input[name="${key}[]"]`).val(value);
        });

        $("#editModal").modal("hide");

        recalculateAllRows();
    });
});



// BudgetAIP SocialS
$(document).ready(function () {

   //Function to calculate the total for a row
   function SScalculateRowTotal(row) {

        let SSpersonalService = parseFloat($(row).find('#personel_service').val()) || 0;
        let SSMOOE = parseFloat($(row).find('#mooe').val()) || 0;
        let SSCapitalOutlay = parseFloat($(row).find('#capital_outlay').val()) || 0;
        let SSColumnSubtotal = (SSpersonalService+SSMOOE+SSCapitalOutlay);

        let SSstructure  = parseFloat($(row).find('.amount').val()) || 0;
        let SSnutritionSensitive  = parseFloat($(row).find('.amount').val()) || 0;
        let SSEnablingMecanism  = parseFloat($(row).find('.amount').val()) || 0;


        let category = $(row).find('#sourceoffund').val();
        //let total = amount; // Assuming total is just the amount for now

        // Set the row total
        // $(row).find('#total').val(SSColumnSubtotal.toFixed(2));

        // Update the subtotal based on the category
        SSupdateCategorySubtotal(category ,SSpersonalService ,SSMOOE ,SSCapitalOutlay ,SSstructure ,SSnutritionSensitive ,SSEnablingMecanism );
    }
 





    // grantotalSS
    function calculateGrandTotalSSbarangay() {
        let grandTotal = 0;

        // make it array

        //SSPSbarangay
        $('#SSPSbarangay').each(function(){
            let value = parseFloat($(this).val()) || 0;
            grandTotal += value;
        });

        //SSPSmunicipal
        $('#SSPSmunicipal').each(function(){
            let value = parseFloat($(this).val()) || 0;
            grandTotal += value;
        });

        //SSPSprovincial
        $('#SSPSprovincial').each(function(){
            let value = parseFloat($(this).val()) || 0;
            grandTotal += value;
        });

        //SSPSnational
        $('#SSPSprovincial').each(function(){
            let value = parseFloat($(this).val()) || 0;
            grandTotal += value;
        });

        //SSPSexternal
        $('#SSPSexternal').each(function(){
            let value = parseFloat($(this).val()) || 0;
            grandTotal += value;
        });

        $('#SSPSTSSS').val(grandTotal.toFixed(2));
    };

    $('#SSPSbarangay').on('change keyup', function() {
        SScalculateRowTotal();
    });

    $('#SSPSmunicipal').on('change keyup', function() {
        calculateGrandTotalSSbarangay();
    });

    $('#SSPSprovincial').on('change keyup', function() {
        calculateGrandTotalSSbarangay();
    });

    $('#SSPSnational').on('change keyup', function() {
        calculateGrandTotalSSbarangay();
    });

    $('#SSPSexternal').on('change keyup', function() {
        calculateGrandTotalSSbarangay();
    });


    // Function to update the subtotal for a specific category
    function SSupdateCategorySubtotal(category) {
        let subtotals = {
            
            barangay:  0,
            municipal: 0,
            province:  0,
            national:  0,
            external:  0,
        };

         // Iterate through each row to calculate category subtotals
         $('#dataTable tbody tr').each(function () {
            let category = $(this).find('#category').val();
            let rowTotal = parseFloat($(this).find('.row-total').val()) || 0;
            subtotals[category] += rowTotal;
        });

        // Update the subtotal inputs
        $('#localTotal').val(subtotals.local.toFixed(2));
        $('#nationalTotal').val(subtotals.national.toFixed(2));
        $('#externalTotal').val(subtotals.external.toFixed(2));
    }


    //Calculation for calculateGrandTotalSSbarangay
    calculateGrandTotalSSbarangay();
     // Initial calculation when the document is ready
     $('#dataTable tbody tr').each(function () {
        SScalculateRowTotal(this);
    });
});