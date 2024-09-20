// const { document } = require("postcss");

// Equipment Inventory
function totalHB() {
    const inputWHB = document.getElementById("inputWHB").value;
    const inputNonWHB = document.getElementById("inputNonWHB").value;
    const inputHBNonF = document.getElementById("inputHBNonF").value;
    const inputtotalBarangay =
        document.getElementById("inputtotalBarangay").value;

    const inputWHB_num = parseFloat(inputWHB);
    const inputNonWHB_num = parseFloat(inputNonWHB);
    const inputHBNonF_num = parseFloat(inputHBNonF);

    if (
        !isNaN(inputWHB_num) &&
        !isNaN(inputNonWHB_num) &&
        !isNaN(inputHBNonF_num)
    ) {
        const sum = inputWHB_num + inputNonWHB_num;
        const difference = sum - inputHBNonF_num;

        var sums = (document.getElementById("inputTotalHB").value = difference);
        console.log("sums:", sums);
    } else {
        document.getElementById("inputTotalHB").value = "";
    }

    availabilityHB(sums, inputtotalBarangay);
}
function availabilityHB(sums, inputtotalBarangay) {
    console.log("sums:", sums);
    console.log("inputtotalBarangay:", inputtotalBarangay);

    const availabilityHBquotient = sums / inputtotalBarangay;
    console.log("availabilityHBquotient:", availabilityHBquotient);

    const availabilityHBproduct = availabilityHBquotient * 100;
    console.log("availabilityHBproduct:", availabilityHBproduct);

    var avail = (document.getElementById("inputHBpercent").value =
        availabilityHBproduct.toFixed(2));
    console.log("avail:", avail);
}

function totalWS() {
    const inputWSHanging = document.getElementById("inputWSHanging").value;
    const inputWSNonF = document.getElementById("inputWSNonF").value;
    const inputtotalBarangay =
        document.getElementById("inputtotalBarangay").value;

    const inputWSHanging_num = parseFloat(inputWSHanging);
    const inputWSNonF_num = parseFloat(inputWSNonF);

    if (!isNaN(inputWSHanging_num) && !isNaN(inputWSNonF_num)) {
        const difference = inputWSHanging_num - inputWSNonF_num;

        var totalWS = (document.getElementById("inputTotalWS").value =
            difference);
        console.log("totalWS:", totalWS);
    } else {
        document.getElementById("inputTotalWS").value = "";
    }

    availabilityWS(totalWS, inputtotalBarangay);
}
function availabilityWS(totalWS, inputtotalBarangay) {
    const availabilityWSquotient = totalWS / inputtotalBarangay;
    const availabilityWSproduct = availabilityWSquotient * 100;

    var availWS = (document.getElementById("inputWSpercent").value =
        availabilityWSproduct.toFixed(2));
    console.log("availWS:", availWS);
}

function muac_child() {
    const inputMChild = document.getElementById("inputMChild").value;
    const inputMNonFChild = document.getElementById("inputMNonFChild").value;
    const inputtotalBarangay =
        document.getElementById("inputtotalBarangay").value;

    const inputMChild_num = parseFloat(inputMChild);
    const inputMNonFChild_num = parseFloat(inputMNonFChild);

    if (!isNaN(inputMChild_num) && !isNaN(inputMNonFChild_num)) {
        const difference = inputMChild_num - inputMNonFChild_num;

        var totalChild = (document.getElementById("inputTotalChild").value =
            difference);
        console.log("totalChild", totalChild);
    } else {
        document.getElementById("inputTotalChild").value = "";
    }

    availabilityChild(totalChild, inputtotalBarangay);
}
function availabilityChild(totalChild, inputtotalBarangay) {
    const availabilityChildquotient = totalChild / inputtotalBarangay;
    const availabilityChildproduct = availabilityChildquotient * 100;

    var avail_C = (document.getElementById("inputChildpercent").value =
        availabilityChildproduct.toFixed(2));
    console.log("avail_C:", avail_C);
}

function muac_adult() {
    const inputMAdult = document.getElementById("inputMAdult").value;
    const inputMNonFAdult = document.getElementById("inputMNonFAdult").value;
    const inputtotalBarangay =
        document.getElementById("inputtotalBarangay").value;

    const inputMAdult_num = parseFloat(inputMAdult);
    const inputMNonFAdult_num = parseFloat(inputMNonFAdult);

    if (!isNaN(inputMAdult_num) && !isNaN(inputMNonFAdult_num)) {
        const difference = inputMAdult_num - inputMNonFAdult_num;

        var totalAdult = (document.getElementById("inputTotalAdult").value =
            difference);
        console.log("totalAdult:", totalAdult);
    } else {
        document.getElementById("inputTotalAdult").value = "";
    }
    availabilityAdult(totalAdult, inputtotalBarangay);
}
function availabilityAdult(totalAdult, inputtotalBarangay) {
    const availabilityAdultquotient = totalAdult / inputtotalBarangay;
    const availabilityAdultproduct = availabilityAdultquotient * 100;

    var avail_A = (document.getElementById("inputAdultpercent").value =
        availabilityAdultproduct.toFixed(2));
    console.log(avail_A);
}

// COMPUTE AVARAGE FOR Infant and Young Child Feeding
// function calculateAverage() {
//     const ratingSelects = document.querySelectorAll('.rating1');
//     let total = 0;
//     let count = 0;

//     ratingSelects.forEach(select => {
//         const rating = parseFloat(select.value);
//         if (!isNaN(rating)) {
//             total += rating;
//             count++;
//         }
//     });

//     const average = count ? (total / count).toFixed(2) : 0;
//     document.getElementById('young_child_feeding_average').textContent = average;
//     document.getElementById('young_child_feeding_average2').value = average;
// }

// document.addEventListener('DOMContentLoaded', () => {
//     const ratingSelects = document.querySelectorAll('.rating1');
//     ratingSelects.forEach(select => {
//         select.addEventListener('change', calculateAverage);
//     });
// });

function calculateAverage(className, averageTextId, averageInputId) {
    const ratingSelects = document.querySelectorAll(`.${className}`);
    let total = 0;
    let count = 0;

    ratingSelects.forEach((select) => {
        const rating = parseFloat(select.value);
        if (!isNaN(rating)) {
            total += rating;
            count++;
        }
    });

    const average = count ? (total / count).toFixed(2) : 0;
    document.getElementById(averageTextId).textContent = average;
    document.getElementById(averageInputId).value = average;
}

document.addEventListener("DOMContentLoaded", () => {
    const setups = [
        {
            className: "rating1",
            averageTextId: "young_child_feeding_average",
            averageInputId: "young_child_feeding_average2",
        },
        {
            className: "rating2",
            averageTextId: "acute_malnutrition_average",
            averageInputId: "acute_malnutrition_average2",
        },
        {
            className: "rating3",
            averageTextId: "national_dietary_average",
            averageInputId: "national_dietary_average2",
        },
        {
            className: "rating4",
            averageTextId: "behavioral_change_average",
            averageInputId: "behavioral_change_average2",
        },
        {
            className: "rating5",
            averageTextId: "micro_supplement_average",
            averageInputId: "micro_supplement_average2",
        },
        {
            className: "rating6",
            averageTextId: "mandatory_food_average",
            averageInputId: "mandatory_food_average2",
        },
        {
            className: "rating7",
            averageTextId: "emergencies_program_average",
            averageInputId: "emergencies_program_average2",
        },
        {
            className: "rating8",
            averageTextId: "prevention_program_average",
            averageInputId: "prevention_program_average2",
        },
        {
            className: "rating9",
            averageTextId: "nutri_sensitive_average",
            averageInputId: "nutri_sensitive_average2",
        },
    ];

    setups.forEach((setup) => {
        const ratingSelects = document.querySelectorAll(`.${setup.className}`);
        ratingSelects.forEach((select) => {
            select.addEventListener("change", () => {
                calculateAverage(
                    setup.className,
                    setup.averageTextId,
                    setup.averageInputId,
                );
            });
        });
    });
});

// Computation for Summary 1a
function updatePerformanceRating() {
    let total = 0;
    let count = 0;

    ["5a", "5b", "5c", "5d", "5e", "5f", "5g", "5h", "5i"].forEach((suffix) => {
        var lncRating = parseFloat(
            document.getElementById(`performance-level-${suffix}`).innerText,
        );
        const performanceRating = ((lncRating / 5) * 100).toFixed(2);

        if (!isNaN(performanceRating)) {
            total += parseFloat(performanceRating); // Use performanceRating here
            count++;
        }

        document.getElementById(`current-rating-${suffix}`).innerText =
            performanceRating;
    });

    const average = count ? (total / count).toFixed(2) : 0;
    document.getElementById("performance-rating5").innerText = average;
}

document.addEventListener("DOMContentLoaded", function () {
    updatePerformanceRating();
});

// personnel Directory tabs
document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tab");
    const contents = document.querySelectorAll(".tab-content");

    // Function to deactivate all tabs and contents
    function deactivateAll() {
        tabs.forEach((tab) => tab.classList.remove("active"));
        contents.forEach((content) => content.classList.remove("active"));
    }

    // Function to activate the clicked tab and corresponding content
    function activateTab(tab) {
        const targetContentId = tab.getAttribute("data-tab");
        const targetContent = document.getElementById(targetContentId);

        tab.classList.add("active");
        targetContent.classList.add("active");
    }

    // Initialize by activating the first tab
    if (tabs.length > 0) {
        activateTab(tabs[0]);
    }

    // Add click event listeners to each tab
    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            deactivateAll();
            activateTab(tab);
        });
    });
});

// calculate age for NAO
document.getElementById("inputBdate").addEventListener("change", function () {
    let birthdate = this.value;
    let age = calculateAge(birthdate);

    var ages = (document.getElementById("inputage").value = age);
    console.log("ages: ", ages);
});

function calculateAge(birthdate) {
    let birthDate = new Date(birthdate);
    let today = new Date();

    let age = today.getFullYear() - birthDate.getFullYear();

    let monthDifference = today.getMonth() - birthDate.getMonth();
    if (
        monthDifference < 0 ||
        (monthDifference === 0 && today.getDate() < birthDate.getDate())
    ) {
        age--;
    }

    return age;
}

// Calculate age for NPC
document
    .getElementById("inputNpcBdate")
    .addEventListener("change", function () {
        let birthdate = this.value;
        let age = calculateAge(birthdate);

        var ages = (document.getElementById("inputNpcAge").value = age);
        console.log("ages: ", ages);
    });

function calculateAge(birthdate) {
    let birthDate = new Date(birthdate);
    let today = new Date();

    let age = today.getFullYear() - birthDate.getFullYear();

    let monthDifference = today.getMonth() - birthDate.getMonth();
    if (
        monthDifference < 0 ||
        (monthDifference === 0 && today.getDate() < birthDate.getDate())
    ) {
        age--;
    }

    return age;
}

// Calculate age for BNS
document
    .getElementById("inputBnsBdate")
    .addEventListener("change", function () {
        let birthdate = this.value;
        let age = calculateAge(birthdate);

        var ages = (document.getElementById("inputBnsAge").value = age);
        console.log("ages: ", ages);
    });

function calculateAge(birthdate) {
    let birthDate = new Date(birthdate);
    let today = new Date();

    let age = today.getFullYear() - birthDate.getFullYear();

    let monthDifference = today.getMonth() - birthDate.getMonth();
    if (
        monthDifference < 0 ||
        (monthDifference === 0 && today.getDate() < birthDate.getDate())
    ) {
        age--;
    }

    return age;
}

//Separate Budget Amount Input tag enabled/disabled
function enabledSeparateBudgetInput() {
    document
        .getElementById("InputSeparateBudget")
        .addEventListener("change", function () {
            var InputSeparatAmount = document.getElementById(
                "InputSeparateBudgetAmount",
            );
            var label = document.getElementById("labelAmount");
            if (this.value === "yes") {
                // InputSeparatAmount.disabled = false;
                InputSeparatAmount.readOnly = false;
                InputSeparatAmount.hidden = false;
                label.hidden = false;
            } else {
                // InputSeparatAmount.disabled = true;
                InputSeparatAmount.readOnly = true;
                InputSeparatAmount.hidden = true;
                label.hidden = true;
            }
        });
    if (document.getElementById("InputSeparateBudget").value === "yes") {
        document.getElementById("InputSeparateBudgetAmount").readOnly = false;
        document.getElementById("InputSeparateBudgetAmount").hidden = false;
        document.getElementById("labelAmount").hidden = false;
    }
    console.log("Script loaded and event listener added.");
}

//other office
function otherNutritionOffice() {
    document
        .getElementById("InputOffice")
        .addEventListener("change", function () {
            var selectInput = document.getElementById("InputOtherOffice");
            var labelOtherOffice = document.getElementById("labelOtherOffice");
            if (this.value === "others") {
                // selectInput.disabled = false;
                selectInput.readOnly = false;
                selectInput.hidden = false;
                labelOtherOffice.hidden = false;
            } else {
                // selectInput.disabled = true;
                selectInput.readOnly = true;
                selectInput.hidden = true;
                labelOtherOffice.hidden = true;
            }
        });
    if (document.getElementById("InputOffice").value === "others") {
        document.getElementById("InputOtherOffice").readOnly = false;
        document.getElementById("InputOtherOffice").hidden = false;
        document.getElementById("labelOtherOffice").hidden = false;
    }
    console.log("Script loaded and event listener added.");
}

//p/c/mnao
function otherEmploymentStat() {
    document
        .getElementById("InputPC_MNAO_EmpStat")
        .addEventListener("change", function () {
            var selectInput = document.getElementById("InputPC_OtherEmpStat");
            var labelOtherEmploymentStat = document.getElementById(
                "labelOtherEmploymentStat",
            );
            if (this.value === "others") {
                // selectInput.disabled = false;
                selectInput.readOnly = false;
                selectInput.hidden = false;
                labelOtherEmploymentStat.hidden = false;
            } else {
                // selectInput.disabled = true;
                selectInput.readOnly = true;
                selectInput.hidden = true;
                labelOtherEmploymentStat.hidden = true;
            }
        });
    if (document.getElementById("InputPC_MNAO_EmpStat").value === "others") {
        document.getElementById("InputPC_OtherEmpStat").readOnly = false;
        document.getElementById("InputPC_OtherEmpStat").hidden = false;
        document.getElementById("labelOtherEmploymentStat").hidden = false;
    }
    console.log("Script loaded and event listener added.");
}
function IfYesMoreThanOne() {
    document
        .getElementById("InputMorePC_MNAO")
        .addEventListener("change", function () {
            var InputSeparatAmount = document.getElementById(
                "InputMoreYesPC_MNAO",
            );
            var label = document.getElementById("labelIfYesMoreThanOne");
            if (this.value === "yes") {
                // InputSeparatAmount.disabled = false;
                InputSeparatAmount.readOnly = false;
                InputSeparatAmount.hidden = false;
                label.hidden = false;
            } else {
                // InputSeparatAmount.disabled = true;
                InputSeparatAmount.readOnly = true;
                InputSeparatAmount.hidden = true;
                label.hidden = true;
            }
        });
    if (document.getElementById("InputMorePC_MNAO").value === "yes") {
        document.getElementById("InputMoreYesPC_MNAO").readOnly = false;
        document.getElementById("InputMoreYesPC_MNAO").hidden = false;
        document.getElementById("labelIfYesMoreThanOne").hidden = false;
    }
    console.log("Script loaded and event listener added.");
}

//d/cnpc
function otherEmploymentStat_DCNPC() {
    document
        .getElementById("InputD_CNPC_EmpStat")
        .addEventListener("change", function () {
            var selectInput = document.getElementById(
                "InputDCNPC_OtherEmpStat",
            );
            var labelDCNPC_OtherEmpStat = document.getElementById(
                "labelDCNPC_OtherEmpStat",
            );
            if (this.value === "others") {
                // selectInput.disabled = false;
                selectInput.readOnly = false;
                selectInput.hidden = false;
                labelDCNPC_OtherEmpStat.hidden = false;
            } else {
                // selectInput.disabled = true;
                selectInput.readOnly = true;
                selectInput.hidden = true;
                labelDCNPC_OtherEmpStat.hidden = true;
            }
        });
    if (document.getElementById("InputD_CNPC_EmpStat").value === "others") {
        document.getElementById("InputDCNPC_OtherEmpStat").readOnly = false;
        document.getElementById("InputDCNPC_OtherEmpStat").hidden = false;
        document.getElementById("labelDCNPC_OtherEmpStat").hidden = false;
    }
    console.log("Script loaded and event listener added.");
}
function IfYesMoreThanOneDCNPC() {
    document
        .getElementById("InputMoreDCNPC_MNAO")
        .addEventListener("change", function () {
            var Input = document.getElementById("InputMoreYesDCNPC_MNAO");
            var label = document.getElementById("labelIfYesMoreThanOneDCNPC");
            if (this.value === "yes") {
                // InputSeparatAmount.disabled = false;
                Input.readOnly = false;
                Input.hidden = false;
                label.hidden = false;
            } else {
                // InputSeparatAmount.disabled = true;
                Input.readOnly = true;
                Input.hidden = true;
                label.hidden = true;
            }
        });
    if (document.getElementById("InputMoreDCNPC_MNAO").value === "yes") {
        document.getElementById("InputMoreYesDCNPC_MNAO").readOnly = false;
        document.getElementById("InputMoreYesDCNPC_MNAO").hidden = false;
        document.getElementById("labelIfYesMoreThanOneDCNPC").hidden = false;
    }
    console.log("Script loaded and event listener added.");
}

//LNFP Form
// function toggleReadonly() {
//     var textareas = document.querySelectorAll('.performance, .elements');
//     var button2 = document.getElementById('saveForm');
//     var labels = document.querySelectorAll('.labelsForm');
//     var button = document.getElementById('editForm');
//     var anyReadonly = Array.from(textareas).some(textarea => textarea.hasAttribute('readonly'));

//     textareas.forEach(function(textarea) {
//         if (anyReadonly) {
//             textarea.removeAttribute('readonly');
//         } else {
//             textarea.setAttribute('readonly', true);
//         }
//     });

//     if (anyReadonly) {
//         button.setAttribute('hidden', true);
//         button2.removeAttribute('hidden');
//         labels.forEach(function(label) {
//             label.removeAttribute('hidden');
//         });
//         button.textContent = "Save All"; // Optional: change button text
//     } else {
//         button.removeAttribute('hidden');
//         button2.setAttribute('hidden', true);
//         labels.forEach(function(label) {
//             label.setAttribute('hidden', true);
//         });
//         button.textContent = "Edit Contents"; // Optional: change button text back
//     }
// }

function toggleReadonly() {
    var textareas = document.querySelectorAll(".performance, .elements");
    var button2 = document.getElementById("saveForm");
    var labels = document.querySelectorAll(".labelsForm");
    var ratings = document.querySelectorAll('[name="ratingSelect"]');
    var remarks = document.querySelectorAll('[name="remarksTextarea"]');
    var button = document.getElementById("editForm");
    var labelRating = document.getElementById("labelRating");
    var labelRemark = document.getElementById("labelRemark");
    var anyReadonly = Array.from(textareas).some((textarea) =>
        textarea.hasAttribute("readonly"),
    );

    textareas.forEach(function (textarea) {
        if (anyReadonly) {
            textarea.removeAttribute("readonly");
            textarea.removeAttribute("hidden");
        } else {
            textarea.setAttribute("readonly", true);
            textarea.setAttribute("hidden", true);
        }
    });

    if (anyReadonly) {
        button.setAttribute("hidden", true);
        button2.removeAttribute("hidden");
        labels.forEach(function (label) {
            label.setAttribute("hidden", true);
        });
        ratings.forEach(function (rating) {
            rating.setAttribute("hidden", true);
        });
        remarks.forEach(function (remark) {
            remark.setAttribute("hidden", true);
        });
        labelRating.setAttribute("hidden", true);
        labelRemark.setAttribute("hidden", true);
        button.textContent = "Save All"; // Optional: change button text
    } else {
        button.removeAttribute("hidden");
        button2.setAttribute("hidden", true);
        labels.forEach(function (label) {
            label.removeAttribute("hidden");
        });
        ratings.forEach(function (rating) {
            rating.removeAttribute("hidden");
        });
        remarks.forEach(function (remark) {
            remark.removeAttribute("hidden");
        });
        labelRating.removeAttribute("hidden");
        labelRemark.removeAttribute("hidden");
        button.textContent = "Edit Contents"; // Optional: change button text back
    }
}

// function cancelForm() {
//     var cancel = document.getElementById('cancelForm');
//     var textareas = document.querySelectorAll('.performance, .elements');

//     var anyReadonly = Array.from(textareas).some(textarea => textarea.hasAttribute('readonly'));

//     textareas.forEach(function(textarea) {
//         if (anyReadonly) {
//             textarea.removeAttribute('readonly');
//             cancel.setAttribute('hidden', true);
//         } else {
//             textarea.setAttribute('hidden', true);
//             cancel.removeAttribute('hidden');
//         }
//     })
// }

function interviewSubTotal() {
    const as1 = parseInt(document.getElementById("actualScore1").value, 10);
    const as2 = parseInt(document.getElementById("actualScore2").value, 10);
    const as3 = parseInt(document.getElementById("actualScore3").value, 10);
    const as4 = parseInt(document.getElementById("actualScore4").value, 10);

    const sum = as1 + as2 + as3 + as4;

    document.getElementById("subASTot").value = sum;

    console.log(sum);
}

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("actualScore1")
        .addEventListener("change", interviewSubTotal);
    document
        .getElementById("actualScore2")
        .addEventListener("change", interviewSubTotal);
    document
        .getElementById("actualScore3")
        .addEventListener("change", interviewSubTotal);
    document
        .getElementById("actualScore4")
        .addEventListener("change", interviewSubTotal);

    interviewSubTotal();
});

function AsSubTotal() {
    const as1 = document.getElementById("actualScore1").value;
    const as2 = document.getElementById("actualScore2").value;
    const as3 = document.getElementById("actualScore3").value;
    const as4 = document.getElementById("actualScore4").value;

    const as1_num = parseFloat(as1);
    const as2_num = parseFloat(as2);
    const as3_num = parseFloat(as3);
    const as4_num = parseFloat(as4);

    if (
        !isNaN(as1_num) &&
        !isNaN(as2_num) &&
        !isNaN(as3_num) &&
        !isNaN(as4_num)
    ) {
        const sum = as1_num + as2_num + as3_num + as4_num;
        // const difference = sum - inputHBNonF_num;

        var total = (document.getElementById("subASTot").value = sum);
        console.log("total:", total);
    } else {
        document.getElementById("subASTot").value = "";
    }
}
