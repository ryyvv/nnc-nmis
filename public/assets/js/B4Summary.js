
function createRadialChartB4bSummaryD1D5(performanceData) {
    
    const labels =  ['Vision Mission', 'Nutrition Policies','Governance','LNC Management', 'Nutrition Services'];

    const ctx = document.getElementById('myRadarChartB2bSummary').getContext('2d');

    const data = {
        labels: labels, // Use dynamic labels from data
        datasets: [{
            label: 'TARGET RATING',
            data: [100, 100, 100, 100, 100], // Example static data, replace if needed
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
        }, {
            label: 'PERFORMANCE RATING',
            data: performanceData,
            fill: true,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointBackgroundColor: 'rgb(255, 99, 132)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 99, 132)'
        }]
    };

    const options = {
        layout: {
            padding: {
                top: 0,     // Remove top padding
                left: 0,    // Remove left padding
                right: 0,   // Remove right padding
                bottom: 0   // Remove bottom padding
            }
        },
        scale: {
            angleLines: {
                display: true
            },
            ticks: {
                suggestedMin: 0,
                suggestedMax: 120,
                stepSize: 20,
                callback: function(value) {
                    return value + '%'; // Add percentage symbol to ticks
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'right'
            }
        },
        title: {
            display: true,
            text: 'B-1c Diagram for Barangay Nutrition Monitoring',
            font: {
                size: 40 // Set the desired font size here
            }
        }
    };

    const myRadarChart  = new Chart(ctx, {
        type: 'radar',
        data: data,
        options: options
    });
}


function createRadialChartB4bSummaryD6(performanceData) {
    // const labels =  [
    //     '1. Prevalence of underweight 0-59 months children', 
    //     '2. Prevalence of stunted 0-59 months children',
    //     '3. Prevalence of wasted 0-59 months children',
    //     '4. Prevalence of overweight and obesity among children 0-59 months children', 
    //     '5. Prevalence of wasted school-age children ',
    //     '6. Prevalence of overweight and obesity school-age children',
    //     '7. Prevalence of nutritionally at-risk pregnant women',
    //     '8. Operation Timbang Plus Coverage',
    // ];

    const labels =  [
        '1. Prevalence of under...', 
        '2. Prevalence of stunte...',
        '3. Prevalence of wasted ...',
        '4. Prevalence of overwe...', 
        '5. Prevalence of wasted...',
        '6. Prevalence of overwei...',
        '7. Prevalence of nutriti...',
        '8. Operation Timbang Plu...',
    ];

    const d6ctx = document.getElementById('myRadarChartB4bSummaryd6').getContext('2d');

   

    const data = {
        labels: labels, // Use dynamic labels from data
        datasets: [{
            label: 'TARGET RATING',
            data: [100, 100, 100, 100, 100 , 100, 100, 100, 100], // Example static data, replace if needed
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
        }, {
            label: 'PERFORMANCE RATING',
            data: performanceData,
            fill: true,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointBackgroundColor: 'rgb(255, 99, 132)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 99, 132)'
        }]
    };

    const options = {
        layout: {
            padding: {
                top: 0,     // Remove top padding
                left: 0,    // Remove left padding
                right: 0,   // Remove right padding
                bottom: 0   // Remove bottom padding
            }
        },
        scale: {
            angleLines: {
                display: true
            },
            ticks: {
                suggestedMin: 0,
                suggestedMax: 120,
                stepSize: 20,
                callback: function(value) {
                    return value + '%'; // Add percentage symbol to ticks
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'right'
            }
        },
        title: {
            display: true,
            text: 'B-1c Diagram for Barangay Nutrition Monitoring',
            font: {
                size: 40 // Set the desired font size here
            }
        }
    };

    const myRadarChart  = new Chart(d6ctx, {
        type: 'radar',
        data: data,
        options: options
    });
}


var performanceRatingsD1D5 = [];
var performanceRatingsD6= [];

function B4SummaryFND1D5() {

    // Function to calculate the ratings dynamically
    function calculateRatings(selector) {
        // Get the value from the element using jQuery
        var value = parseFloat($(selector).text()) || 0;
        // Perform the calculation: divide by 5, then multiply by 100
        var total = (value / 5) * 100;
        // Return the calculated total
        return total;
    }

    var Prd2a = calculateRatings('#Pd2a');
    var Prd2b = calculateRatings('#Pd2b');
    var Prd2c = calculateRatings('#Pd2c');
    var Prd2d = calculateRatings('#Pd2d');
    var Prd2e = calculateRatings('#Pd2e');
    var Prd2f = calculateRatings('#Pd2f');
    var Prd2g = calculateRatings('#Pd2g');
    var Prd2h = calculateRatings('#Pd2h');


    $('#Prd2a').text(Prd2a.toFixed(2));
    $('#Prd2b').text(Prd2b.toFixed(2));
    $('#Prd2c').text(Prd2c.toFixed(2));
    $('#Prd2d').text(Prd2d.toFixed(2));
    $('#Prd2e').text(Prd2e.toFixed(2));
    $('#Prd2f').text(Prd2f.toFixed(2));
    $('#Prd2g').text(Prd2g.toFixed(2));
    $('#Prd2h').text(Prd2h.toFixed(2));

    $('#Prd2aa').text(Prd2a.toFixed(2));
    $('#Prd2bb').text(Prd2b.toFixed(2));
    $('#Prd2cc').text(Prd2c.toFixed(2));
    $('#Prd2dd').text(Prd2d.toFixed(2));
    $('#Prd2ee').text(Prd2e.toFixed(2));
    $('#Prd2ff').text(Prd2f.toFixed(2));
    $('#Prd2gg').text(Prd2g.toFixed(2));
    $('#Prd2hh').text(Prd2h.toFixed(2));

    $('#Pd2aCR').val(Prd2a.toFixed(2));
    $('#Pd2bCR').val(Prd2b.toFixed(2));
    $('#Pd2cCR').val(Prd2c.toFixed(2));
    $('#Pd2dCR').val(Prd2d.toFixed(2));
    $('#Pd2eCR').val(Prd2e.toFixed(2));
    $('#Pd2fCR').val(Prd2f.toFixed(2));
    $('#Pd2gCR').val(Prd2g.toFixed(2));
    $('#Pd2hCR').val(Prd2h.toFixed(2));


    var Prd2Average = parseFloat(((Prd2a + Prd2b + Prd2c + Prd2d + Prd2e + Prd2f + Prd2g + Prd2h )  / 8).toFixed(2));
    $('#Pd2TCR').text(Prd2Average);
    $('#Pd2TCRR').text(Prd2Average);

    $('#OverallTCR').text(Prd2Average);
    $('#OverallTCRF').val(Prd2Average);

    var performanceRatingsD1D5 = [Prd2a , Prd2b , Prd2c , Prd2d , Prd2e , Prd2f , Prd2g , Prd2h];
    createRadialChartB4bSummaryD1D5(performanceRatingsD1D5)
} 

function B4SummaryFND6() {

    // Function to calculate the ratings dynamically
    function calculateRatings(selector) {
        // Get the value from the element using jQuery
        var value = parseFloat($(selector).text()) || 0;
        // Perform the calculation: divide by 5, then multiply by 100
        var total = (value / 5) * 100;
        // Return the calculated total
        return total;
    }

    var Prd2a = calculateRatings('#Pd2a');
    var Prd2b = calculateRatings('#Pd2b');
    var Prd2c = calculateRatings('#Pd2c');
    var Prd2d = calculateRatings('#Pd2d');
    var Prd2e = calculateRatings('#Pd2e');
    var Prd2f = calculateRatings('#Pd2f');
    var Prd2g = calculateRatings('#Pd2g');
    var Prd2h = calculateRatings('#Pd2h');


 
    $('#Prd2a').text(Prd2a.toFixed(2));
    $('#Prd2b').text(Prd2b.toFixed(2));
    $('#Prd2c').text(Prd2c.toFixed(2));
    $('#Prd2d').text(Prd2d.toFixed(2));
    $('#Prd2e').text(Prd2e.toFixed(2));
    $('#Prd2f').text(Prd2f.toFixed(2));
    $('#Prd2g').text(Prd2g.toFixed(2));
    $('#Prd2h').text(Prd2h.toFixed(2));

    $('#Prd2aa').text(Prd2a.toFixed(2));
    $('#Prd2bb').text(Prd2b.toFixed(2));
    $('#Prd2cc').text(Prd2c.toFixed(2));
    $('#Prd2dd').text(Prd2d.toFixed(2));
    $('#Prd2ee').text(Prd2e.toFixed(2));
    $('#Prd2ff').text(Prd2f.toFixed(2));
    $('#Prd2gg').text(Prd2g.toFixed(2));
    $('#Prd2hh').text(Prd2h.toFixed(2));

    $('#Pd2aCR').val(Prd2a.toFixed(2));
    $('#Pd2bCR').val(Prd2b.toFixed(2));
    $('#Pd2cCR').val(Prd2c.toFixed(2));
    $('#Pd2dCR').val(Prd2d.toFixed(2));
    $('#Pd2eCR').val(Prd2e.toFixed(2));
    $('#Pd2fCR').val(Prd2f.toFixed(2));
    $('#Pd2gCR').val(Prd2g.toFixed(2));
    $('#Pd2hCR').val(Prd2h.toFixed(2));


    var Prd2Average = parseFloat(((Prd2a + Prd2b + Prd2c + Prd2d + Prd2e + Prd2f + Prd2g + Prd2h )  / 8).toFixed(2));
    $('#Pd2TCR').text(Prd2Average);
    $('#Pd2TCRR').text(Prd2Average);

    $('#OverallTCR').text(Prd2Average);
    $('#OverallTCRF').val(Prd2Average);

    var performanceRatingsD6 = [Prd2a , Prd2b , Prd2c , Prd2d , Prd2e , Prd2f , Prd2g , Prd2h];
    createRadialChartB4bSummaryD6(performanceRatingsD6)
} 


function B4SummaryFN() {
     
    var d1 = parseFloat($('#D1').text()) || 0;
    var d2 = parseFloat($('#D2').text()) || 0;
    var d3 = parseFloat($('#D3').text()) || 0;
    var d4 = parseFloat($('#D4').text()) || 0;
    var d5 = parseFloat($('#D5').text()) || 0;
    var d6 = parseFloat($('#D6').text()) || 0;

    // Calculate the total using the provided equation
    var average = parseFloat((d1 + d2 + d3 + d4 + d5) / 5);
    var total1 = parseFloat(average* 0.6);
    var total2 =  parseFloat(total1  + d6);
    var total3 =  parseFloat(total2 *0.4);

    $('#grandTotal').text(total3.toFixed(2));
    $('#grand4Total').val(total3.toFixed(2));

    return total;
}
 