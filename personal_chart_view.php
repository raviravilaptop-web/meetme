<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');
//include_once './perf_chart/perf_chart.php';
$insName = null;
$address = null;
$address = null;

$addName = [];


if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
         $uleveldis = $_SESSION["me_accss_level"];
    $username = $_SESSION['me_user_email'];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
    $instID = $_SESSION["insid"];
}
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Roboto+Slab:wght@100..900&family=Tilt+Warp&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/libs/css/style.css">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">

        <!-- chart -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <!--<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">-->
            <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">

        <!-- Template Main CSS File -->
        <link href="assets/css/style_1.css" rel="stylesheet">
        <title>MeetMe</title>
    </head>

    <body>


        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <?php
            include './header.php';
            ?>
            <?php
            include './slider.php';
            ?>

            <?php

            
            

if ($uleveldis == '1269_mt') {
$sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '1'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) { 
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}

}else if ($uleveldis == '1548_sa') {
    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '1'";
    if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}


$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}


$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}


$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
}else if ($uleveldis == '1658_pa') {
    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '1'";
 if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
    }
    }

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
}else if ($uleveldis == '2753_ps') {
    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '1'";
    if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE  `inst_id` = '$instID' AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE   `inst_id` = '$instID' AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE `inst_id` = '$instID' AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
}

$setwehechart = array($code5, $code4, $code3, $code2, $code1);
$sensettl = ($code5+$code4+$code3+$code2+$code1);
   
            $sqldc = "SELECT `inst_meetpson` FROM `head_inst` WHERE `inst_id` = '$instID'";
            if (isset($sqldc)) {
                if ($db->getresultset($sqldc)) {
                    $result = $db->getresultset($sqldc);
                    while ($erow2 = $result->fetch_assoc()) {
                        $getwehechart[] = $erow2['inst_meetpson'];
                     
                    }
                }
            }
               $personName = count($getwehechart) ? implode(',', $getwehechart) : '';
     
            
          $sensevalue = ('"nimal",'.' 5:'.$code5.', 4:'. $code4.', 3:'. $code3.', 2:'.$code2.', 1:'.$code1);  
          $sensevalue1 = ('nimal'.', 5:'.$code5.', 4:'. $code4.', 3:'. $code3.', 2:'.$code2.', 1:'.$code1);  
          $sensevalue2 = ('amal'.', 5:'.$code5.', 4:'. $code4.', 3:'. $code3.', 2:'.$code2.', 1:'.$code1);  
          $sensevalue3 = ('kamal'.', 5:'.$code5.', 4:'. $code4.', 3:'. $code3.', 2:'.$code2.', 1:'.$code1);  
          $addnamearay  = array($sensevalue1, $sensevalue2, $sensevalue3);
//          $addName  = count($sensevalue) ? implode(',', $sensevalue) : '';
          
         
          
      ?>
      
      
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">

                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="hedename"><?php echo $insName ?></h2>
                                    <h5 class="hedename" style="line-height: 0.0;"><?php echo $address ?></h5>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="./index.php" class="breadcrumb-link">Home</a></li>
                                                <li class="breadcrumb-item"><a href="./dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Chart View</li>
                                            </ol>
        
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="ecommerce-widget">
              <div class="row">

                        <!-- ============================================================== -->
                        <!-- donut chart  -->
                        <!-- ============================================================== -->
                         <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Donut Chart </h5>
                                <div class="card-body">
                                    <div id="morris_donut1"></div>
                                </div>
                            </div>
                        </div>
               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Donut Chart </h5>
                                <div class="card-body">
                                    <div id="morris_donut"></div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Donut Chart </h5>
                                <div class="card-body">
                                    <div id="morris_donut"></div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end donut chart  -->
                        <!-- ============================================================== -->
                    </div>
                        </div>
                    </div>


                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <?php
                    include './footer.php';
                    ?>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    
    <script>
    
            if ($('#morris_donut').length) {
            Morris.Donut({
                element: 'morris_donut1',
                data: [
                    { value: 70, label: 'foo' },
                    { value: 15, label: 'bar' },
                    { value: 10, label: 'baz' },
                    { value: 5, label: 'A really really long label' }
                ],
             
                labelColor: '#2e2f39',
                   gridTextSize: '14px',
                colors: [
                     "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750"
                               
                ],

                formatter: function(x) { return x + "%" },
                  resize: true
            });
        }</script>
                    </body>
                    </html>

