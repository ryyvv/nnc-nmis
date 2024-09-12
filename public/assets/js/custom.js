// Computation for Interview Actual Score

    // Function to update subtotal
    function updateSubtotal() {
        let actualScore1 = parseFloat(document.getElementById('actualScore1').value) || 0;
        let actualScore2 = parseFloat(document.getElementById('actualScore2').value) || 0;
        let actualScore3 = parseFloat(document.getElementById('actualScore3').value) || 0;

        let subtotal = actualScore1 + actualScore2 + actualScore3;
        document.getElementById('subASTot').value = subtotal;
    }

    // Add event listeners to all score selects
    // $('#actualScore1, #actualScore2, #actualScore3').change(updateSubtotal);


// FORM 6 Computation
function computePR(){

    let totalAverage = 0; // Initialize total average
    let count = 8; //Initialize Count
    // Calculate individual averages for A, C, D, E, F, H
    ['form6InputA', 'form6InputC', 'form6InputD', 'form6InputE', 'form6InputF', 'form6InputH'].forEach((id) => {
        let rating = parseFloat(document.getElementById(id).value) || 0;
        let average = (rating / 5) * 100;
        document.getElementById(id.replace('Input', 'InputAve')).value = average;
        totalAverage += average; // Add to total
        // count++;
    });

    // Calculate average for BB and B
    let sumB = ['form6InputBB', 'form6InputB'].reduce((total, id) => total + (parseFloat(document.getElementById(id).value) || 0), 0);
    let aveB = (sumB / 10) * 100;
    document.getElementById('form6InputAveB').value = aveB;
    totalAverage += aveB; // Add to total
    // count++;

    // Calculate average for GG and G
    let sumG = ['form6InputGG', 'form6InputG'].reduce((total, id) => total + (parseFloat(document.getElementById(id).value) || 0), 0);
    let aveG = (sumG / 10) * 100;
    document.getElementById('form6InputAveG').value = aveG;
    totalAverage += aveG; // Add to total
    // count++;

    let points = totalAverage / 8;

    document.getElementById('form6InputScore').value = points;

}

// OverAllScore Computation
function OverAllScore(){

    let totalAverage = 0; // Initialize total average
    let count = 8; //Initialize Count
    // Calculate individual averages for A, C, D, E, F, H
    ['ratingA', 'ratingC', 'ratingD', 'ratingE', 'ratingF', 'ratingH'].forEach((id) => {
        let rating = parseFloat(document.getElementById(id).value) || 0;
        let average = (rating / 5) * 100;
        totalAverage += average; // Add to total
        // count++;
    });

    // Calculate average for BB and B
    let sumB = ['ratingBB', 'ratingB'].reduce((total, id) => total + (parseFloat(document.getElementById(id).value) || 0), 0);
    let aveB = (sumB / 10) * 100;
    totalAverage += aveB; // Add to total
    // count++;

    // Calculate average for GG and G
    let sumG = ['ratingGG', 'ratingG'].reduce((total, id) => total + (parseFloat(document.getElementById(id).value) || 0), 0);
    let aveG = (sumG / 10) * 100;
    totalAverage += aveG; // Add to total
    // count++;

    // Computation for Mellpi Pro
    let points = totalAverage / 8;
    let scoreP1AS = ( points * 0.8);

    document.getElementById('pointsP1AS').value = points;
    document.getElementById('scoreP1AS').value = scoreP1AS;


    // Computation for Interview
    let intPoints = document.getElementById('intSubtotal').value;
    let intWeight = (( intPoints / 20) * 0.2) * 100;
    document.getElementById('formOverallInput').value = intWeight.toFixed(1);

    // Computation for total
    let totalS =  scoreP1AS + intWeight; 
    document.getElementById('totalScoreAS').value = totalS;

}


function updateDisplayBasedOnHeader(header) {
    // Reset all blocks to default hidden state
    let blocks = ['numYrBlock', 'dateDesigBlock', 'dateAppointBlock', 'pro_activitiesBlock', 'assign_taskBlock', 'secondedBlock', 'profActBlock'];
    blocks.forEach(block => document.getElementById(block).style.display = 'none');

    // Set specific configurations based on the header value
    if (header === 'NAO') {
        document.getElementById('numYr').innerHTML = 'Number of years as NAO';
        document.getElementById('numYrBlock').style.display = 'block';
        document.getElementById('dateDesigBlock').style.display = 'block';
        document.getElementById('pro_activitiesBlock').style.display = 'block';
        document.getElementById('province').style.display = 'block';
    } else if (header === 'DNPC') {
        document.getElementById('numYr').innerHTML = 'Number of years as DNPC';
        document.getElementById('numYrBlock').style.display = 'block';
        document.getElementById('dateAppointBlock').style.display = 'block';
        document.getElementById('assign_taskBlock').style.display = 'block';
        document.getElementById('province').style.display = 'none';
    } else if (header === 'CMNPC') {
        document.getElementById('numYr').innerHTML = 'Number of years as CMNPC';
        document.getElementById('numYrBlock').style.display = 'block';
        document.getElementById('dateAppointBlock').style.display = 'block';
        document.getElementById('province').style.display = 'block';
    } else if (header === 'BNS') {
        document.getElementById('numYr').innerHTML = 'Number of years as BNS';
        document.getElementById('numYrBlock').style.display = 'block';
        document.getElementById('dateAppointBlock').style.display = 'block';
        document.getElementById('province').style.display = 'none';
    } else if (header === 'PNAO') {
        document.getElementById('province').style.display = 'none';
    }

}


document.getElementById('header').addEventListener('change', function() {
    let header = this.value;
    updateDisplayBasedOnHeader(header);
});

// Check for saved header value on page load
document.addEventListener('DOMContentLoaded', function() {
    let savedHeader = document.getElementById('header').value; // Retrieve the saved header value, for example, from a hidden input field, or localStorage
    if (savedHeader) {
        updateDisplayBasedOnHeader(savedHeader);
    }
});







new DataTable('#InterviewFormmyTable');
