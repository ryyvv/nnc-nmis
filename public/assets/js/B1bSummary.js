// function radialDiagramB1bSummary(Data) {
//     const labels = JSON.parse($('#chart-dataB1Summary').attr('data-labels'));
//     const performanceData = JSON.parse($('##chart-dataB1Summary').attr('data-performance'));

//     const ctx = document.getElementById('myRadarChartB1bSummary').getContext('2d');

//     const data = {
//         labels: labels, // Use dynamic labels from data
//         datasets: [{
//             label: 'TARGET RATING',
//             data: [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100], // Example static data, replace if needed
//             fill: true,
//             backgroundColor: 'rgba(54, 162, 235, 0.2)',
//             borderColor: 'rgb(54, 162, 235)',
//             pointBackgroundColor: 'rgb(54, 162, 235)',
//             pointBorderColor: '#fff',
//             pointHoverBackgroundColor: '#fff',
//             pointHoverBorderColor: 'rgb(54, 162, 235)'
//         }, {
//             label: 'PERFORMANCE RATING',
//             data: performanceData,
//             fill: true,
//             backgroundColor: 'rgba(255, 99, 132, 0.2)',
//             borderColor: 'rgb(255, 99, 132)',
//             pointBackgroundColor: 'rgb(255, 99, 132)',
//             pointBorderColor: '#fff',
//             pointHoverBackgroundColor: '#fff',
//             pointHoverBorderColor: 'rgb(255, 99, 132)'
//         }]
//     };

//     const options = {
//         scale: {
//             angleLines: {
//                 display: true
//             },
//             ticks: {
//                 suggestedMin: 0,
//                 suggestedMax: 120,
//                 stepSize: 20,
//                 callback: function (value) {
//                     return value + '%'; // Add percentage symbol to ticks
//                 }
//             }
//         },
//         plugins: {
//             legend: {
//                 display: true,
//                 position: 'right'
//             }
//         },
//         title: {
//             display: true,
//             text: 'Provincial Nutrition Action Officer Monitoring Radial Diagram'
//         }
//     };

//     const myRadarChartB1bSummary = new Chart(ctx, {
//         type: 'radar',
//         data: data,
//         options: options
//     });
// }

function createRadialChart(performanceData) {
    const labels =  ['Vision Mission', 'Nutrition Policies','Governance','LNC Management', 'Nutrition Services'];
    // const performanceData = JSON.parse($('#chart-data').attr('data-performance'));

    const ctx = document.getElementById('radialChart').getContext('2d');

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

    const myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: data,
        options: options
    });
}

var performanceRatings = [];

function B1bSummaryFN() {

    // Function to calculate the ratings dynamically
    function calculateRatings(selector) {
        // Get the value from the element using jQuery
        var value = parseFloat($(selector).text()) || 0;
        // Perform the calculation: divide by 5, then multiply by 100
        var total = (value / 5) * 100;
        // Return the calculated total
        return total;
    }



    var Prd1a = calculateRatings('#Pd1a');
    var Prd1b = calculateRatings('#Pd1b');
    var Prd1c = calculateRatings('#Pd1c');

    var Prd2a = calculateRatings('#Pd2a');
    var Prd2b = calculateRatings('#Pd2b');
    var Prd2c = calculateRatings('#Pd2c');
    var Prd2d = calculateRatings('#Pd2d');
    var Prd2e = calculateRatings('#Pd2e');
    var Prd2f = calculateRatings('#Pd2f');
    var Prd2g = calculateRatings('#Pd2g');
    var Prd2h = calculateRatings('#Pd2h');
    var Prd2i = calculateRatings('#Pd2i');
    var Prd2j = calculateRatings('#Pd2j');
    var Prd2k = calculateRatings('#Pd2k');
    var Prd2l = calculateRatings('#Pd2l');

    var Prd3a = calculateRatings('#Pd3a');
    var Prd3b = calculateRatings('#Pd3b');
    var Prd3c = calculateRatings('#Pd3c');

    var Prd4a = calculateRatings('#Pd4a');
    var Prd4b = calculateRatings('#Pd4b');
    var Prd4c = calculateRatings('#Pd4c');
    var Prd4d = calculateRatings('#Pd4d');
    var Prd4e = calculateRatings('#Pd4e');
    var Prd4f = calculateRatings('#Pd4f');

    var Prd5a = calculateRatings('#Pd5a');
    var Prd5b = calculateRatings('#Pd5b');
    var Prd5c = calculateRatings('#Pd5c');
    var Prd5d = calculateRatings('#Pd5d');
    var Prd5e = calculateRatings('#Pd5e');
    var Prd5f = calculateRatings('#Pd5f');
    var Prd5g = calculateRatings('#Pd5g');
    var Prd5h = calculateRatings('#Pd5h');
    var Prd5i = calculateRatings('#Pd5i');

    $('#Prd1a').text(Prd1a.toFixed(2));
    $('#Prd1b').text(Prd1b.toFixed(2));
    $('#Prd1c').text(Prd1c.toFixed(2));

    $('#Pd1aCR').val(Prd1a.toFixed(2));
    $('#Pd1bCR').val(Prd1b.toFixed(2));
    $('#Pd1cCR').val(Prd1c.toFixed(2));


    $('#Prd2a').text(Prd2a.toFixed(2));
    $('#Prd2b').text(Prd2b.toFixed(2));
    $('#Prd2c').text(Prd2c.toFixed(2));
    $('#Prd2d').text(Prd2d.toFixed(2));
    $('#Prd2e').text(Prd2e.toFixed(2));
    $('#Prd2f').text(Prd2f.toFixed(2));
    $('#Prd2g').text(Prd2g.toFixed(2));
    $('#Prd2h').text(Prd2h.toFixed(2));
    $('#Prd2i').text(Prd2i.toFixed(2));
    $('#Prd2j').text(Prd2j.toFixed(2));
    $('#Prd2k').text(Prd2k.toFixed(2));
    $('#Prd2l').text(Prd2l.toFixed(2));

    $('#Pd2aCR').val(Prd2a.toFixed(2));
    $('#Pd2bCR').val(Prd2b.toFixed(2));
    $('#Pd2cCR').val(Prd2c.toFixed(2));
    $('#Pd2dCR').val(Prd2d.toFixed(2));
    $('#Pd2eCR').val(Prd2e.toFixed(2));
    $('#Pd2fCR').val(Prd2f.toFixed(2));
    $('#Pd2gCR').val(Prd2g.toFixed(2));
    $('#Pd2hCR').val(Prd2h.toFixed(2));
    $('#Pd2iCR').val(Prd2i.toFixed(2));
    $('#Pd2jCR').val(Prd2j.toFixed(2));
    $('#Pd2kCR').val(Prd2k.toFixed(2));
    $('#Pd2lCR').val(Prd2l.toFixed(2));

    $('#Prd3a').text(Prd3a.toFixed(2));
    $('#Prd3b').text(Prd3b.toFixed(2));
    $('#Prd3c').text(Prd3c.toFixed(2));

    $('#Pd3aCR').val(Prd3a.toFixed(2));
    $('#Pd3bCR').val(Prd3b.toFixed(2));
    $('#Pd3cCR').val(Prd3c.toFixed(2));

    $('#Prd4a').text(Prd4a.toFixed(2));
    $('#Prd4b').text(Prd4b.toFixed(2));
    $('#Prd4c').text(Prd4c.toFixed(2));
    $('#Prd4d').text(Prd4d.toFixed(2));
    $('#Prd4e').text(Prd4e.toFixed(2));
    $('#Prd4f').text(Prd4f.toFixed(2));

    $('#Pd4aCR').val(Prd4a.toFixed(2));
    $('#Pd4bCR').val(Prd4b.toFixed(2));
    $('#Pd4cCR').val(Prd4c.toFixed(2));
    $('#Pd4dCR').val(Prd4d.toFixed(2));
    $('#Pd4eCR').val(Prd4e.toFixed(2));
    $('#Pd4fCR').val(Prd4f.toFixed(2));


    $('#Prd5a').text(Prd5a.toFixed(2));
    $('#Prd5b').text(Prd5b.toFixed(2));
    $('#Prd5c').text(Prd5c.toFixed(2));
    $('#Prd5d').text(Prd5d.toFixed(2));
    $('#Prd5e').text(Prd5e.toFixed(2));
    $('#Prd5f').text(Prd5f.toFixed(2));
    $('#Prd5g').text(Prd5g.toFixed(2));
    $('#Prd5h').text(Prd5h.toFixed(2));
    $('#Prd5i').text(Prd5i.toFixed(2));

    $('#Pd5aCR').val(Prd5a.toFixed(2));
    $('#Pd5bCR').val(Prd5b.toFixed(2));
    $('#Pd5cCR').val(Prd5c.toFixed(2));
    $('#Pd5dCR').val(Prd5d.toFixed(2));
    $('#Pd5eCR').val(Prd5e.toFixed(2));
    $('#Pd5fCR').val(Prd5f.toFixed(2));
    $('#Pd5gCR').val(Prd5g.toFixed(2));
    $('#Pd5hCR').val(Prd5h.toFixed(2));
    $('#Pd5iCR').val(Prd5i.toFixed(2));



    // Calculate averages for each product
    var Prd1Average = parseFloat(((Prd1a + Prd1b + Prd1c) / 3).toFixed(2));
    $('#Pd1TCR').text(Prd1Average);
    $('#d1Totalrating').text(Prd1Average);
    $('#Pd1T2CR').val(Prd1Average);

    var Prd2Average = parseFloat(((Prd2a + Prd2b + Prd2c + Prd2d + Prd2e + Prd2f + Prd2g) / 7).toFixed(2));
    $('#Pd2TCR').text(Prd2Average);
    $('#d2Totalrating').text(Prd2Average);
    $('#Pd2T2CR').val(Prd2Average);

    var Prd3Average = parseFloat(((Prd3a + Prd3b + Prd3c) / 3).toFixed(2));
    $('#Pd3TCR').text(Prd3Average);
    $('#d3Totalrating').text(Prd3Average);
    $('#Pd3T2CR').val(Prd3Average);

    var Prd4Average = parseFloat(((Prd4a + Prd4b + Prd4c + Prd4d + Prd4e + Prd4f) / 6).toFixed(2));
    $('#Pd4TCR').text(Prd4Average);
    $('#d4Totalrating').text(Prd4Average);
    $('#Pd4T2CR').val(Prd4Average);

    var Prd5Average = parseFloat(((Prd5a + Prd5b + Prd5c + Prd5d + Prd5e + Prd5f + Prd5g + Prd5h + Prd5i) / 9).toFixed(2));
    $('#Pd5TCR').text(Prd5Average);
    $('#d5Totalrating').text(Prd5Average);
    $('#Pd5T2CR').val(Prd5Average);

    // Calculate overall average
    var OverAllAve = ((Prd1Average + Prd2Average + Prd3Average + Prd4Average + Prd5Average) / 5).toFixed(2);
    $('#OverallTCR').text(OverAllAve);
    $('#OverallTCRF').val(OverAllAve);


    var performanceRatings = [Prd1Average, Prd2Average, Prd3Average, Prd4Average, Prd5Average];
    createRadialChart(performanceRatings)
} 
 