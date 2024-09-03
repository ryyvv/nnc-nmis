$(function () {
    // Submit LGU Profile
    $("#submit").on("click", function (e) {
        document.getElementById("status").value = 1;
        document.getElementById("formrequest").value = "submit";
        $("#form").submit();
    });

    // Draft LGU Profile
    $("#draft").on("click", function (e) {
        document.getElementById("status").value = 2;
        document.getElementById("formrequest").value = "draft";
        $("#form").submit();
    });

    $("#savechanges").on("click", function (e) {
        $("#formuserstatusupdate").submit();
    });

    $("#updatePasswordSubmit").on("click", function (e) {
        $("#formuserpasswordupdate").submit();
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

    // If you need to recalculate all rows (e.g., after dynamically adding rows)
    function recalculateAllRows() {
        $("#dataTable tbody tr").each(function () {
            SocialcalculateRowTotal($(this));
        });

        updateCategoryTotals();

    }

    // Trigger calculation when any of the inputs are changed
    $("#dataTable").on("input", 'input[name="sourceoffund[]"], input[name="personel_service[]"], input[name="mooe[]"], input[name="capital_outlay[]"],  input[name="direct_nutrition_specific[]"],  input[name="indirect_nutrition_specific[]"], input[name="enabling_mechanism[]"]', function () {
        const row = $(this).closest('tr');
        SocialcalculateRowTotal(row);
        updateCategoryTotals(row);
    });

    function SocialcalculateRowTotal(row) {
        let subtotal = 0;
        const SocialrowpersonelService = parseFloat(row.find('input[name="personel_service[]"]').val()) || 0;
        const Socialrowmooe = parseFloat(row.find('input[name="mooe[]"]').val()) || 0;
        const SocialrowcapitalOutlay = parseFloat(row.find('input[name="capital_outlay[]"]').val()) || 0;
        const Socialrowtotal = SocialrowpersonelService + Socialrowmooe + SocialrowcapitalOutlay;

        row.find('input[name="total[]"]').val(Socialrowtotal.toFixed(2));
    }

    function updateCategoryTotals() {

        // Initialize the total variables
        let barangayPersonelServiceTotal = 0, barangayMOOE = 0, barangayCapitalOutlay = 0, barangaytotal = 0, barangayStructure = 0, barangayIN = 0, barangayEM = 0;
        let municipalPersonelServiceTotal = 0, municipalMOOE = 0, municipalCapitalOutlay = 0, municipaltotal = 0, municipalStructure = 0, municipalIN = 0, municipalEM = 0;
        let provincialPersonelServiceTotal = 0, provincialMOOE = 0, provincialCapitalOutlay = 0, provincialtotal = 0, provincialStructure = 0, provincialIN = 0, provincialEM = 0;
        let nationalPersonelServiceTotal = 0, nationalMOOE = 0, nationalCapitalOutlay = 0, nationaltotal = 0, nationalStructure = 0, nationalIN = 0, nationalEM = 0;
        let externalPersonelServiceTotal = 0, externalMOOE = 0, externalCapitalOutlay = 0, externaltotal = 0, externalStructure = 0, externalIN = 0, externalEM = 0;

        // Loop through each row in the table
        $("#dataTable tbody tr").each(function () {
            const category = $(this).find('select[name="sourceoffund[]"]').val();
            const personelservice = parseFloat($(this).find('input[name="personel_service[]"]').val()) || 0;
            const mooe = parseFloat($(this).find('input[name="mooe[]"]').val()) || 0;
            const capitaloutlay = parseFloat($(this).find('input[name="capital_outlay[]"]').val()) || 0;
            const total = parseFloat($(this).find('input[name="total[]"]').val()) || 0;
            const directnutritionspecific = parseFloat($(this).find('input[name="direct_nutrition_specific[]"]').val()) || 0;
            const indirectnutritionspecific = parseFloat($(this).find('input[name="indirect_nutrition_specific[]"]').val()) || 0;
            const enablingmechanism = parseFloat($(this).find('input[name="enabling_mechanism[]"]').val()) || 0;

            switch (category) {
                case "barangay":
                    barangayPersonelServiceTotal += personelservice;
                    barangayMOOE += mooe;
                    barangayCapitalOutlay += capitaloutlay;
                    barangaytotal += total;
                    barangayStructure += directnutritionspecific;
                    barangayIN += indirectnutritionspecific;
                    barangayEM += enablingmechanism;
                    break;
                case "municipal":
                    municipalPersonelServiceTotal += personelservice;
                    municipalMOOE += mooe;
                    municipalCapitalOutlay += capitaloutlay;
                    municipaltotal += total;
                    municipalStructure += directnutritionspecific;
                    municipalIN += indirectnutritionspecific;
                    municipalEM += enablingmechanism;
                    break;
                case "provincial":
                    provincialPersonelServiceTotal += personelservice;
                    provincialMOOE += mooe;
                    provincialCapitalOutlay += capitaloutlay;
                    provincialtotal += total;
                    provincialStructure += directnutritionspecific;
                    provincialIN += indirectnutritionspecific;
                    provincialEM += enablingmechanism;
                    break;
                case "national":
                    nationalPersonelServiceTotal += personelservice;
                    nationalMOOE += mooe;
                    nationalCapitalOutlay += capitaloutlay;
                    nationaltotal += total;
                    nationalStructure += directnutritionspecific;
                    nationalIN += indirectnutritionspecific;
                    nationalEM += enablingmechanism;
                    break;
                case "external":
                    externalPersonelServiceTotal += personelservice;
                    externalMOOE += mooe;
                    externalCapitalOutlay += capitaloutlay;
                    externaltotal += total;
                    externalStructure += directnutritionspecific;
                    externalIN += indirectnutritionspecific;
                    externalEM += enablingmechanism;
                    break;
                default:
                    break;
            }
        });

        // Set the calculated values in the form fields
        $("#SSPSbarangay").val(barangayPersonelServiceTotal.toFixed(2));
        $("#SSMObarangay").val(barangayMOOE.toFixed(2));
        $("#SSCPbarangay").val(barangayCapitalOutlay.toFixed(2));
        $("#SSTLbarangay").val(barangaytotal.toFixed(2));
        $("#SSSbarangay").val(barangayStructure.toFixed(2));
        $("#SSNbarangay").val(barangayIN.toFixed(2));
        $("#SSEMbarangay").val(barangayEM.toFixed(2));

        $("#SSPSmunicipal").val(municipalPersonelServiceTotal.toFixed(2));
        $("#SSMOmunicipal").val(municipalMOOE.toFixed(2));
        $("#SSCPmunicipal").val(municipalCapitalOutlay.toFixed(2));
        $("#SSTLmunicipal").val(municipaltotal.toFixed(2));
        $("#SSSmunicipal").val(municipalStructure.toFixed(2));
        $("#SSNmunicipal").val(municipalIN.toFixed(2));
        $("#SSEMmunicipal").val(municipalEM.toFixed(2));

        $("#SSPSprovincial").val(provincialPersonelServiceTotal.toFixed(2));
        $("#SSMOprovincial").val(provincialMOOE.toFixed(2));
        $("#SSCPprovincial").val(provincialCapitalOutlay.toFixed(2));
        $("#SSTLprovincial").val(provincialtotal.toFixed(2));
        $("#SSSprovincial").val(provincialStructure.toFixed(2));
        $("#SSNprovincial").val(provincialIN.toFixed(2));
        $("#SSEMprovincial").val(provincialEM.toFixed(2));

        $("#SSPSnational").val(nationalPersonelServiceTotal.toFixed(2));
        $("#SSMOnational").val(nationalMOOE.toFixed(2));
        $("#SSCPnational").val(nationalCapitalOutlay.toFixed(2));
        $("#SSTLnational").val(nationaltotal.toFixed(2));
        $("#SSSnational").val(nationalStructure.toFixed(2));
        $("#SSNnational").val(nationalIN.toFixed(2));
        $("#SSEMnational").val(nationalEM.toFixed(2));

        $("#SSPSexternal").val(externalPersonelServiceTotal.toFixed(2));
        $("#SSMOexternal").val(externalMOOE.toFixed(2));
        $("#SSCPexternal").val(externalCapitalOutlay.toFixed(2));
        $("#SSTLexternal").val(externaltotal.toFixed(2));
        $("#SSSexternal").val(externalStructure.toFixed(2));
        $("#SSNexternal").val(externalIN.toFixed(2));
        $("#SSEMexternal").val(externalEM.toFixed(2));

        // Calculate and set the grand total
        const SSPSGTval = barangayPersonelServiceTotal + municipalPersonelServiceTotal + provincialPersonelServiceTotal + nationalPersonelServiceTotal + externalPersonelServiceTotal;
        const SSMOGTval = barangayMOOE + municipalMOOE + provincialMOOE + nationalMOOE + externalMOOE;
        const SSCPGTval = barangayCapitalOutlay + municipalCapitalOutlay + provincialCapitalOutlay + nationalCapitalOutlay + externalCapitalOutlay;
        const SSTGTval = barangaytotal + municipaltotal + provincialtotal + nationaltotal + externaltotal;
        const SSSGTval = barangayStructure + municipalStructure + provincialStructure + nationalStructure + externalStructure;
        const SSNSGTval = barangayIN + municipalIN + provincialIN + nationalIN + externalIN;
        const SSEMGTval = barangayEM + municipalEM + provincialEM + nationalEM + externalEM;

        $("#SSPSGT").val(SSPSGTval.toFixed(2));
        $("#SSMOGT").val(SSMOGTval.toFixed(2));
        $("#SSCPGT").val(SSCPGTval.toFixed(2));
        $("#SSTGT").val(SSTGTval.toFixed(2));
        $("#SSSGT").val(SSSGTval.toFixed(2));
        $("#SSNSGT").val(SSNSGTval.toFixed(2));
        $("#SSEMGT").val(SSEMGTval.toFixed(2));


        //     let barangayIN = 0;
        //     let barangayMOOE = 0;
        //     let barangayCapitalOutlay = 0;
        //     let barangaytotal = 0;
        //     let barangayStructure = 0;
        //     let barangayIN = 0;
        //     let barangayEM = 0;

        //     let municipalPersonelServiceTotal = 0;
        //     let municipalMOOE = 0;
        //     let municipalCapitalOutlay = 0;
        //     let municipaltotal = 0;
        //     let municipalStructure = 0;
        //     let municipalIN = 0;
        //     let municipalEM = 0;

        //     let provincialPersonelServiceTotal = 0;
        //     let provincialMOOE = 0;
        //     let provincialCapitalOutlay = 0;
        //     let provincialtotal = 0;
        //     let provincialStructure = 0;
        //     let provincialIN = 0;
        //     let provincialEM = 0;

        //     let nationalPersonelServiceTotal = 0;
        //     let nationalMOOE = 0;
        //     let nationalCapitalOutlay = 0;
        //     let nationaltotal = 0;
        //     let nationalStructure = 0;
        //     let nationalIN = 0;
        //     let nationalEM = 0;


        //     let externalPersonelServiceTotal = 0;
        //     let externalMOOE = 0;
        //     let externalCapitalOutlay = 0;
        //     let externaltotal = 0;
        //     let externalStructure = 0;
        //     let externalIN = 0;
        //     let externalEM = 0;

        //     $("#dataTable tbody tr").each(function () {
        //         const category = $(this).find('select[name="sourceoffund[]"]').val();

        //         const personelservice = parseFloat($(this).find('input[name="personel_service[]"]').val()) || 0;
        //         const mooe = parseFloat($(this).find('input[name="mooe[]"]').val()) || 0;
        //         const capitaloutlay = parseFloat($(this).find('input[name="capital_outlay[]"]').val()) || 0; 
        //         const total = parseFloat($(this).find('input[name="total[]"]').val()) || 0;
        //         const directnutritionspecific = parseFloat($(this).find('input[name="direct_nutrition_specific[]"]').val()) || 0;
        //         const indirectnutritionspecific = parseFloat($(this).find('input[name="indirect_nutrition_specific[]"]').val()) || 0;
        //         const enablingmechanism  = parseFloat($(this).find('input[name="enabling_mechanism[]"]').val()) || 0;



        //         if (category === "barangay") {

        //             barangayPersonelServiceTotal += personelservice; 
        //             barangayMOOE += mooe;
        //             barangayCapitalOutlay += capitaloutlay;
        //             barangaytotal += total;
        //             barangayStructure +=  directnutritionspecific;
        //             barangayIN += indirectnutritionspecific;
        //             barangayEM += enablingmechanism;


        //         }else if(category === "municipal"){

        //             municipalPersonelServiceTotal += personelservice; 
        //             municipalMOOE += mooe;
        //             municipalCapitalOutlay += capitaloutlay;  
        //             municipaltotal += total; 
        //             municipalStructure +=  directnutritionspecific;
        //             municipalIN += indirectnutritionspecific;
        //             municipalEM += enablingmechanism;

        //         }else if(category === "provincial"){

        //             provincialPersonelServiceTotal += personelservice; 
        //             provincialMOOE += mooe;
        //             provincialCapitalOutlay += capitaloutlay;
        //             provincialtotal += total;
        //             provincialStructure += directnutritionspecific;
        //             provincialIN += indirectnutritionspecific;
        //             provincialEM += enablingmechanism;

        //         }
        //         else if(category === "national"){

        //             nationalPersonelServiceTotal += personelservice; 
        //             nationalMOOE += mooe;
        //             nationalCapitalOutlay += capitaloutlay;
        //             nationaltotal += total;
        //             nationalStructure += directnutritionspecific;
        //             nationalIN += indirectnutritionspecific;
        //             nationalEM += enablingmechanism;

        //         }
        //         else if(category === "external"){

        //             externalPersonelServiceTotal += personelservice; 
        //             externalMOOE += mooe;
        //             externalCapitalOutlay += capitaloutlay;
        //             externaltotal += total;
        //             externalStructure += directnutritionspecific;
        //             externalIN += indirectnutritionspecific;
        //             externalEM += enablingmechanism;

        //         }else {

        //         }

        //     });


        //     const bps = parseFloat($("#SSPSbarangay").val(barangayPersonelServiceTotal.toFixed(2)));
        //     $("#SSMObarangay").val(barangayMOOE.toFixed(2));
        //     $("#SSCPbarangay").val(barangayCapitalOutlay.toFixed(2));
        //     $("#SSTLbarangay").val(barangaytotal.toFixed(2));
        //     $("#SSSbarangay").val(barangayStructure.toFixed(2));
        //     $("#SSNbarangay").val(barangayIN.toFixed(2));
        //     $("#SSEMbarangay").val(barangayEM.toFixed(2)); 

        //    const  mps = parseFloat($("#SSPSmunicipal").val(municipalPersonelServiceTotal.toFixed(2)));
        //     $("#SSMOmunicipal").val(municipalMOOE.toFixed(2));
        //     $("#SSCPmunicipal").val(municipalCapitalOutlay.toFixed(2));
        //     $("#SSTLmunicipal").val(municipaltotal.toFixed(2));
        //     $("#SSSmunicipal").val(municipalStructure.toFixed(2));
        //     $("#SSNmunicipal").val(municipalIN.toFixed(2));
        //     $("#SSEMmunicipal").val(municipalEM.toFixed(2)); 

        //     const pps = parseFloat($("#SSPSprovincial").val(provincialPersonelServiceTotal.toFixed(2)));
        //     $("#SSMOprovincial").val(provincialMOOE.toFixed(2));
        //     $("#SSCPprovincial").val(provincialCapitalOutlay.toFixed(2));
        //     $("#SSTLprovincial").val(provincialtotal.toFixed(2));
        //     $("#SSSprovincial").val(provincialStructure.toFixed(2));
        //     $("#SSNprovincial").val(provincialIN.toFixed(2));
        //     $("#SSEMprovincial").val(provincialEM.toFixed(2)); 

        //     const nps = parseFloat($("#SSPSnational").val(nationalPersonelServiceTotal.toFixed(2)));
        //     $("#SSMOnational").val(nationalMOOE.toFixed(2));
        //     $("#SSCPnational").val(nationalCapitalOutlay.toFixed(2));
        //     $("#SSTLnational").val(nationaltotal.toFixed(2));
        //     $("#SSSnational").val(nationalStructure.toFixed(2));
        //     $("#SSNnational").val(nationalIN.toFixed(2));
        //     $("#SSEMnational").val(nationalEM.toFixed(2)); 

        //     const eps = parseFloat($("#SSPSexternal").val(externalPersonelServiceTotal.toFixed(2)));
        //     $("#SSMOexternal").val(externalMOOE.toFixed(2));
        //     $("#SSCPexternal").val(externalCapitalOutlay.toFixed(2));
        //     $("#SSTLexternal").val(externaltotal.toFixed(2));
        //     $("#SSSexternal").val(externalStructure.toFixed(2));
        //     $("#SSNexternal").val(externalIN.toFixed(2));
        //     $("#SSEMexternal").val(externalEM.toFixed(2));  

        // const SSPSGTval  = bps + mps + pps + nps  + eps;


        // $("#SSPSGT").val(SSPSGTval.toFixed(2));  

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
        '<select class="form-control" name="sourceoffund"  id="sourceoffund">' +
        ' <option  value="">Please select one</option>' +
        '<option value="barangay" >local</option>' +
        '<option value="provincial" >Provincial Government</option>' +
        '<option value="national" >National</option>' +
        '<option value="external" >External</option>' +
        '<option value="municipal" >City/Municipal</option>' +
        '</select>' +
        "</div>",

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
                
                <select  readonly class="inputstyleNone" type="text" name="sourceoffund[]">
                <option selected value="">Please select one</option>
                <option value="barangay" ${formData[1]?.sourceoffund === "barangay" ? "selected" : ""}>Local</option>
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
        recalculateAllRows();
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
// $(document).ready(function () {

//    //Function to calculate the total for a row
//    function SScalculateRowTotal(row) {

//         let SSpersonalService = parseFloat($(row).find('#personel_service').val()) || 0;
//         let SSMOOE = parseFloat($(row).find('#mooe').val()) || 0;
//         let SSCapitalOutlay = parseFloat($(row).find('#capital_outlay').val()) || 0;
//         let SSColumnSubtotal = (SSpersonalService+SSMOOE+SSCapitalOutlay);

//         let SSstructure  = parseFloat($(row).find('.amount').val()) || 0;
//         let SSnutritionSensitive  = parseFloat($(row).find('.amount').val()) || 0;
//         let SSEnablingMecanism  = parseFloat($(row).find('.amount').val()) || 0;


//         let category = $(row).find('#sourceoffund').val();
//         //let total = amount; // Assuming total is just the amount for now

//         // Update the subtotal based on the category
//         SSupdateCategorySubtotal(category ,SSpersonalService ,SSMOOE ,SSCapitalOutlay ,SSstructure ,SSnutritionSensitive ,SSEnablingMecanism );
//     }






//     // grantotalSS
//     function calculateGrandTotalSSbarangay() {
//         let grandTotal = 0;

//         // make it array

//         //SSPSbarangay
//         $('#SSPSbarangay').each(function(){
//             let value = parseFloat($(this).val()) || 0;
//             grandTotal += value;
//         });

//         //SSPSmunicipal
//         $('#SSPSmunicipal').each(function(){
//             let value = parseFloat($(this).val()) || 0;
//             grandTotal += value;
//         });

//         //SSPSprovincial
//         $('#SSPSprovincial').each(function(){
//             let value = parseFloat($(this).val()) || 0;
//             grandTotal += value;
//         });

//         //SSPSnational
//         $('#SSPSprovincial').each(function(){
//             let value = parseFloat($(this).val()) || 0;
//             grandTotal += value;
//         });

//         //SSPSexternal
//         $('#SSPSexternal').each(function(){
//             let value = parseFloat($(this).val()) || 0;
//             grandTotal += value;
//         });

//         $('#SSPSTSSS').val(grandTotal.toFixed(2));
//     };

//     $('#SSPSbarangay').on('change keyup', function() {
//         SScalculateRowTotal();
//     });

//     $('#SSPSmunicipal').on('change keyup', function() {
//         calculateGrandTotalSSbarangay();
//     });

//     $('#SSPSprovincial').on('change keyup', function() {
//         calculateGrandTotalSSbarangay();
//     });

//     $('#SSPSnational').on('change keyup', function() {
//         calculateGrandTotalSSbarangay();
//     });

//     $('#SSPSexternal').on('change keyup', function() {
//         calculateGrandTotalSSbarangay();
//     });


//     // Function to update the subtotal for a specific category
//     function SSupdateCategorySubtotal(category)  {
//         let subtotals = {

//             barangay:  0,
//             municipal: 0,
//             province:  0,
//             national:  0,
//             external:  0,
//         };

//          // Iterate through each row to calculate category subtotals
//          $('#dataTable tbody tr').each(function () {
//             let category = $(this).find('#category').val();
//             let rowTotal = parseFloat($(this).find('.row-total').val()) || 0;
//             subtotals[category] += rowTotal;
//         });

//         // Update the subtotal inputs
//         $('#localTotal').val(subtotals.local.toFixed(2));
//         $('#nationalTotal').val(subtotals.national.toFixed(2));
//         $('#externalTotal').val(subtotals.external.toFixed(2));
//     }


//     //Calculation for calculateGrandTotalSSbarangay
//     calculateGrandTotalSSbarangay();
//      // Initial calculation when the document is ready
//      $('#dataTable tbody tr').each(function () {
//         SScalculateRowTotal(this);
//     });
// });




// BudgetAIP SocialS
$(document).ready(function () {

    // //Function to calculate the total for a row
    // function SScalculateRowTotal(row) {

    //         let SSpersonalService = parseFloat($(row).find('#personel_service').val()) || 0;
    //         let SSMOOE = parseFloat($(row).find('#mooe').val()) || 0;
    //         let SSCapitalOutlay = parseFloat($(row).find('#capital_outlay').val()) || 0;
    //         let SSColumnSubtotal = (SSpersonalService+SSMOOE+SSCapitalOutlay);

    //         let SSstructure  = parseFloat($(row).find('.amount').val()) || 0;
    //         let SSnutritionSensitive  = parseFloat($(row).find('.amount').val()) || 0;
    //         let SSEnablingMecanism  = parseFloat($(row).find('.amount').val()) || 0;


    //         let category = $(row).find('#sourceoffund').val();

    //         if(category == 'local'){
    //             console.log('Local');
    //         }else  if(category == 'municipal'){
    //             console.log('Municipal');
    //         }else {
    //             console.log('error');
    //         }
    //     }






    // // grantotalSS
    // function calculateGrandTotalSSbarangay() {
    //     let grandTotal = 0;


    //     //SSPSbarangay
    //     $('#SSPSbarangay').each(function(){
    //         let value = parseFloat($(this).val()) || 0;
    //         grandTotal += value;
    //     });

    //     //SSPSmunicipal
    //     $('#SSPSmunicipal').each(function(){
    //         let value = parseFloat($(this).val()) || 0;
    //         grandTotal += value;
    //     });

    //     //SSPSprovincial
    //     $('#SSPSprovincial').each(function(){
    //         let value = parseFloat($(this).val()) || 0;
    //         grandTotal += value;
    //     });

    //     //SSPSnational
    //     $('#SSPSprovincial').each(function(){
    //         let value = parseFloat($(this).val()) || 0;
    //         grandTotal += value;
    //     });

    //     //SSPSexternal
    //     $('#SSPSexternal').each(function(){
    //         let value = parseFloat($(this).val()) || 0;
    //         grandTotal += value;
    //     });

    //     $('#SSPSTSSS').val(grandTotal.toFixed(2));
    // };

    // $('#SSPSbarangay').on('change keyup', function() {
    //     SScalculateRowTotal();
    // });

    // $('#SSPSmunicipal').on('change keyup', function() {
    //     calculateGrandTotalSSbarangay();
    // });

    // $('#SSPSprovincial').on('change keyup', function() {
    //     calculateGrandTotalSSbarangay();
    // });

    // $('#SSPSnational').on('change keyup', function() {
    //     calculateGrandTotalSSbarangay();
    // });

    // $('#SSPSexternal').on('change keyup', function() {
    //     calculateGrandTotalSSbarangay();
    // });

    // $('#dataTable').on('change', '#personel_service, #mooe, #capital_outlay', function() {
    //     let $row = $(this).closest('tr'); // Get the current row
    //     let rowIndex = $row.index() + 1; // Index for unique ID (1-based)

    //     // Construct unique IDs based on the row index
    //     let personel_service_id = `#personel_service_${rowIndex}`;
    //     let mooe_id = `#mooe_${rowIndex}`;
    //     let capital_outlay_id = `#capital_outlay_${rowIndex}`;
    //     let total_id = `#total_${rowIndex}`;

    //     let personel_service = parseFloat($(personel_service_id).val()) || 0;
    //     let mooe = parseFloat($(mooe_id).val()) || 0;
    //     let capital_outlay = parseFloat($(capital_outlay_id).val()) || 0;

    //     // Calculate the total for the current row
    //     let total = personel_service + mooe + capital_outlay;

    //     // Set the total value in the corresponding column
    //     $row.find('#total').val(total.toFixed(2));

    //     // Optional: You can sum the total of all rows here if needed
    //     calculateTotal();
    // });





    //Calculation for calculateGrandTotalSSbarangay
    // calculateGrandTotalSSbarangay();

});