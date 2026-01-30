<!DOCTYPE html><?php
ob_start();
session_start();

if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
         $uleveldis = $_SESSION["me_accss_level"];
    $username = $_SESSION['me_user_email'];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
    $instID = $_SESSION["insid"];
}
//=======================================1 chart=============================================
include_once('./login_system/_inc/config.php');
$code2 = null;



    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '1'GROUP BY `meeto_id`";
    if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '2' GROUP BY `meeto_id`";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE   `inst_id` = '$instID' AND `sensecode` = '3'GROUP BY `meeto_id`";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '4'GROUP BY `meeto_id`";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '5'GROUP BY `meeto_id`";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
$sqldc = "SELECT `inst_meetpson` FROM `head_inst` AS mp  INNER JOIN me_client_sense AS mcs ON mp.`sno` = mcs.`meeto_id` WHERE mcs.inst_id = '67'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $inst_meetpson = $erow2['inst_meetpson'];
    }
}
}


     
          $sensevalue = array('{x:'.$inst_meetpson.', 5:'.$code5.', 4:'. $code4.', 3:'. $code3.', 2:'.$code2.', 1:'.$code1.'}');  
echo json_encode($sensevalue);

$data5 = [];
 $scolect = [];
// Query to get category-wise sales per month
 for ($x = 1; $x <= 5; $x++) {
$sql = "SELECT meeto_id as x,  `sensecode`,  count(sensecode) AS s5 FROM me_client_sense WHERE `inst_id` = '67'AND `sensecode` =  $x GROUP BY `meeto_id`";
if ($db->getresultset($sql)) {
    $result = $db->getresultset($sql);
    while ($erow2 = $result->fetch_assoc()) {
        $data5[] = ($erow2);
    }
}
}
//$scolect = array('"nimal",'.' 5:'.$code5.', 4:'. $code4.', 3:'. $code3.', 2:'.$code2.', 1:'.$code1);  

// Send JSON data
//echo json_encode($scolect);
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

<canvas id="stackedChart" width="400" height="200"></canvas>

<script>
    // Fetch data from PHP
    fetch('personal_chart_A_1.php')
        .then(response => response.json())
        .then(data => {
            // Process data
            const labels = [...new Set(data.map(item => item.month))]; // Get unique months
            const categories = [...new Set(data.map(item => item.category))]; // Get unique categories

            // Prepare datasets for Chart.js
            const datasets = categories.map(category => {
                return {
                    label: category,
                    data: labels.map(month => {
                        const record = data.find(item => item.month === month && item.category === category);
                        return record ? record.total_sales : 0;
                    }),
                    backgroundColor: getRandomColor(),
                    borderWidth: 1
                };
            });

            // Chart.js configuration
            const ctx = document.getElementById('stackedChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' }
                    },
                    scales: {
                        x: { stacked: true },
                        y: { stacked: true }
                    }
                }
            });
        });

    // Function to generate random colors for datasets
    function getRandomColor() {
        return `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`;
    }
</script>

<!--                  <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>-->
                    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
                    <!--<script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>-->
                    <script src="assets/libs/js/main-js.js"></script>

</body>
</html>

