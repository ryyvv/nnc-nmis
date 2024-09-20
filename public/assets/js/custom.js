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
function computePR(columnData){

    // const dataString = JSON.stringify(columnData, null, 2); 

    // const names = columnData.map(dataString => dataString.name);
    // console.log(names);

    let totalAverage = 0; // Initialize total average
    let count = 0;

    count = columnData.length;
    columnData.forEach(function(user) {
        // Find the input with the corresponding data-id attribute
        let average = (user.rate / 5) * 100;
        $('.user-input[data-id="rating' + user.column1 + '"]').val(parseFloat(average).toFixed(1));
        totalAverage += average;
        // count++;
    });

    total = totalAverage/count;

    document.getElementById('form6InputScore').value = parseFloat(total).toFixed(1);

}

// OverAllScore Computation
function OverAllScore(columnData){

    let totalAverage = 0; // Initialize total average
    count = columnData.length;
    columnData.forEach(function(user) {
        // Find the input with the corresponding data-id attribute
        let average = (user.rate / 5) * 100;
        totalAverage += average;
        // count++;
    });

    let points = totalAverage/count;
    let scoreP1AS = ( points * 0.8);
    
    document.getElementById('pointsP1AS').value = parseFloat(points).toFixed(1);
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
    let blocks = ['numYrBlock', 'dateDesigBlock', 'dateAppointBlock', 'pro_activitiesBlock', 'assign_taskBlock', 'secondedBlock'];
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
        // document.getElementById('province').style.display = 'none';
    } else if (header === 'PNAO') {
        document.getElementById('province').style.display = 'none';
    }

}


document.getElementById('header').addEventListener('change', function() {
    let header = this.value;
    updateDisplayBasedOnHeader(header);
    fetchData(header);
});

// Check for saved header value on page load
document.addEventListener('DOMContentLoaded', function() {
    let savedHeader = document.getElementById('header').value; // Retrieve the saved header value, for example, from a hidden input field, or localStorage
    if (savedHeader) {
        updateDisplayBasedOnHeader(savedHeader);
        fetchData(savedHeader);
    }
});


function radialDiagram(){
    const labels = JSON.parse($('#chart-data').attr('data-labels'));
    const performanceData = JSON.parse($('#chart-data').attr('data-performance'));

    const ctx = document.getElementById('myRadarChart').getContext('2d');

    const data = {
        labels: labels, // Use dynamic labels from data
        datasets: [{
            label: 'TARGET RATING',
            data: [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100], // Example static data, replace if needed
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
            text: 'Provincial Nutrition Action Officer Monitoring Radial Diagram'
        }
    };

    const myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: data,
        options: options
    });
}


function fetchData(header){
        // var selectedValue = $(this).val(); // Get selected value from dropdown
        var form5_id = $('#id').val;
       
       var valueMap = {
            'CMNAO': 2,
            'PNAO': 1,
            'BNS': 1,
            'DNPC': 3,
            'ROBNC': 4,
            'CMNPC': 5
        };

        selectedValue = valueMap[header] || header; 
    //    alert(selectedValue);
        // Retrieve and parse data from the element with ID 'dataform'
        var dataJson = document.getElementById('dataform').value;
        var data = JSON.parse(dataJson); // Convert JSON string to JavaScript object
        

        var tableBody = $('#datas');
        tableBody.empty(); // Clear previous data
        
        var initialRow = '<tr>';
        initialRow += '<td>&nbsp;</td>';
        initialRow += '<td>&nbsp;</td>';
        initialRow += '<td class="bold text-center">1</td>';
        initialRow += '<td class="bold text-center">2</td>';
        initialRow += '<td class="bold text-center">3</td>';
        initialRow += '<td class="bold text-center">4</td>';
        initialRow += '<td class="bold text-center">5</td>';
        initialRow += '<td>&nbsp;</td>';
        initialRow += '<td>&nbsp;</td>';
        initialRow += '<td>&nbsp;</td>';
        initialRow += '</tr>';
        tableBody.append(initialRow); 

        $.each(data, function(index, item) {
            
            // Check if the item belongs to the selected value
            if (item.belongTo === selectedValue  ) {
                    var remarks =  item.form_remarks === undefined ? '':item.form_remarks;
                    var row = '<tr>';

                // Only append the column1 data
                if (item.column1 !== undefined) {
                    row += '<td>' + item.column1 + '</td>'; // Display column1 data
                    row += '<td>' + item.column2 + '</td>';
                    row += '<td>' + item.column3 + '</td>';
                    row += '<td>' + item.column4 + '</td>';
                    row += '<td>' + item.column5 + '</td>';
                    row += '<td>' + item.column6 + '</td>';
                    row += '<td>' + item.column7 + '</td>';
                    row += '<td>' + item.column8 + '</td>';

                    row += '<td>';
                    row += '<select id="loadProvince' + index + '" class="form-control" name="ratings[' + index + ']">';
                    row += '<option value="">Select</option>';
                        for (var i = 1; i <= 5; i++) {
                            var selected = (item.rate == i) ? 'selected' : '';
                            row += '<option value="' + i + '" ' + selected + '>' + i + '</option>';
                        }
                    row += '</select>';
                    row += '</td>';
                    
                    row +='<input type="hidden" name="ratingname['+ index +']" value="'+ item.rating +'" />';
                    row +='<input type="hidden" name="content_id['+ index +']" value="'+ item.id +'" />';
                    row +='<td><textarea name="remarks['+ index +']" placeholder="Your remarks" class="textArea">'+ remarks +'</textarea></td>';
                }

                row += '</tr>';
             
            }
            tableBody.append(row); // Append the row to the table body
        });

    }





new DataTable('#InterviewFormmyTable');
