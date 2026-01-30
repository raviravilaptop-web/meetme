<?php
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
$sense5[] = null;
$sense4[]  = null;
$sense3[]  = null;
$sense2[]  = null;
$sense1[]  = null;
//=======================================1 chart=============================================
include_once('./login_system/_inc/config.php');


$sqldc = "SELECT `inst_meetpson`,mcs.`meeto_id`  FROM `head_inst` AS mp  INNER JOIN me_client_sense AS mcs ON mp.`sno` = mcs.`meeto_id` WHERE mcs.inst_id = '67' GROUP BY mcs.`meeto_id` ";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $inst_meetpson[] = $erow2['inst_meetpson'];
    }
}
}

$sqld5 = "SELECT count(`sensecode`) AS sense5 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '5' GROUP BY `meeto_id`";
if ($db->getresultset($sqld5)) {
    $result = $db->getresultset($sqld5);
    while ($erow2 = $result->fetch_assoc()) {
        $sense5[] = $erow2['sense5'];
    }
    }

        echo "sense5 = ";
        echo json_encode($sense5);
$sqld4 = "SELECT count(`sensecode`) AS sense4 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '4' GROUP BY `meeto_id`";
if ($db->getresultset($sqld4)) {
    $result = $db->getresultset($sqld4);
    while ($erow2 = $result->fetch_assoc()) {
        $sense4[] = $erow2['sense4'];
    }
        }
  echo "sense4 = ";
     echo json_encode($sense4);
     
$sqld3 = "SELECT count(`sensecode`) AS sense3 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '3' GROUP BY `meeto_id`";
if ($db->getresultset($sqld3)) {
    $result = $db->getresultset($sqld3);
    while ($erow2 = $result->fetch_assoc()) {
        $sense3[] = $erow2['sense3'];
    }
}
  echo "sense3 = ";
      echo json_encode($sense3);

$sqld2 = "SELECT count(`sensecode`) AS sense2 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '2' GROUP BY `meeto_id`";
if ($db->getresultset($sqld2)) {
    $result = $db->getresultset($sqld2);
    while ($erow2 = $result->fetch_assoc()) {
        $sense2[] = $erow2['sense2'];
        
    }
}
  echo "sense2 = ";
        echo json_encode($sense2);

$sqld1 = "SELECT count(`sensecode`) AS sense1 FROM `me_client_sense` WHERE `inst_id` = '67' AND `sensecode` = '1' GROUP BY `meeto_id`";
if ($db->getresultset($sqld1)) {
    $result = $db->getresultset($sqld1);
    while ($erow2 = $result->fetch_assoc()) {
        $sense1[] = $erow2['sense1'];
    }
}
  echo "sense1 = ";
          echo json_encode($sense1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    
</head>
<body>

         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Stacked Bar Chart</h5>
                            <div class="card-body">
                                <div class="ct-chart-scatter-bar ct-golden-section"></div>
                            </div>
                        </div>
                    </div>



   <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!--<script src="assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>-->
    <script src="assets/libs/js/main-js.js"></script>

    <script>
            if ($('.ct-chart-scatter-bar').length) {
            new Chartist.Bar('.ct-chart-scatter-bar', {
                labels: <?php echo json_encode($inst_meetpson);?>,
                series: [
                    <?php echo json_encode($sense5);?>,
                    <?php echo json_encode($sense4);?>,
                      <?php echo json_encode($sense3);?>,
                      <?php echo json_encode($sense2);?>,
                      <?php echo json_encode($sense1);?>
                ]
//                       series: [
//                    [800000, 1200000, 1400000, 1300000],
//                    [200000, 400000, null, 300000],
//                    [100000, 200000, 400000, 600000]
//                ]
            }, {
                stackBars: true,
                     barColors: ['#33ff00', '#99ff00', '#25d5f2', '#f67f12', '#f60016'],
                axisY: {
                    
                }
            }).on('draw', function(data) {
                if (data.type === 'bar') {
                    data.element.attr({
                        style: 'stroke-width: 30px'
                    });
                }
            });
        }
        </script>
</body>
</html>
