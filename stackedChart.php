<?php
// Database connection
$servername = "localhost";
$username = "nimal";
$password = "Weeranimal@1";
$dbname = "cliet_meet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqitest = "SELECT
            `meeto_id`,
            (CASE WHEN `sensecode` = '5' THEN COUNT(`sno`) ELSE 0 END) AS X_value5,
            (CASE WHEN `sensecode` = '4' THEN COUNT(`sno`) ELSE 0 END) AS Y_value4,
              (CASE WHEN `sensecode` = '3' THEN COUNT(`sno`) ELSE 0 END) AS Y_value3,
                  (CASE WHEN `sensecode` = '2' THEN COUNT(`sno`) ELSE 0 END) AS Y_value2,
                     (CASE WHEN `sensecode` = '1' THEN COUNT(`sno`) ELSE 0 END) AS Y_value1
        FROM me_client_sense
        GROUP BY `meeto_id`,`sensecode`";

// SQL query to get data for the stacked bar chart
$sql = "SELECT
            category,
            sum(CASE WHEN subcategory = 'X' THEN value ELSE 0 END) AS X_value,
            sum(CASE WHEN subcategory = 'Y' THEN value ELSE 0 END) AS Y_value,
            sum(CASE WHEN subcategory = 'D' THEN value ELSE 0 END) AS D_value,
            sum(CASE WHEN subcategory = 'E' THEN value ELSE 0 END) AS E_value
        FROM sales_data
        GROUP BY category";
$result = $conn->query($sql);

// Prepare the data for Chart.js
$categories = [];
$X_values = [];
$Y_values = [];
$D_values = [];
$E_values = [];

while ($row = $result->fetch_assoc()) {
    $categories[] = $row['category'];
    $X_values[] = $row['X_value'];
    $Y_values[] = $row['Y_value'];
    $D_values[] = $row['D_value'];
    $E_values[] = $row['E_value'];
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stacked Bar Chart</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>

        <canvas id="stackedBarChart" width="20" height="10"></canvas>

        <script>
// Access the array elements
var passedArray =    <?php echo json_encode($categories); ?>
     
// Display the array elements
for(var i = 0; i < passedArray.length; i++){
    document.write(passedArray[i]);
}
            

        </script>
        <script>

            
                    var ctx = document.getElementById('stackedBarChart').getContext('2d');
                    var stackedBarChart = new Chart(ctx, {
                    type: 'bar',

                                        data: {
                                            labels: <?php echo json_encode($categories); ?>,  // Categories on x-axis
                                            datasets: [{
                                                label: 'X',
                                                data: <?php echo json_encode($X_values); ?>,  // X values
                                                backgroundColor: '#FF5733',  // Color for X
                                            }, {
                                                label: 'Y',
                                                data: <?php echo json_encode($Y_values); ?>,  // Y values
                                                backgroundColor: '#33FF57',  // Color for Y
                                            }, {
                                                label: 'D',
                                                data: <?php echo json_encode($D_values); ?>,  // Y values
                                                backgroundColor: '#cccc00',  // Color for Y
                                            }, {
                                                label: 'E',
                                                data: <?php echo json_encode($E_values); ?>,  // Y values
                                                backgroundColor: '#f67f12',  // Color for Y
                                            }]
                                        },
                            options: {
                            scales: {
                            x: {
                            stacked: true
                            },
                                    y: {
                                    stacked: true
                                    }
                            }
                            }
                    });
        </script>

    </body>
</html>
