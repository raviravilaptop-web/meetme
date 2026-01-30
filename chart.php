<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');
            include_once './perf_chart/perf_chart.php';
$insName = null;
$address = null;
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $username = $_SESSION['me_user_email'];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
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

        <!-- chart -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <!--<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">-->

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
                                <!-- basic table  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <h5 class="card-header">Today Customer Emotional Feedback </h5>
                                            <a href="./dashboard.php"> <div class="card-body">
                                                <canvas id="chartjs_pie"></canvas>
                                                </div></a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>


                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <?php
                    include './footer.php';
                    ?>
                    <!-- ============================================================== -->
                    <!-- end footer -->
                    <!-- ============================================================== -->
                    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                    <!-- bootstap bundle js -->
                    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                    <!-- slimscroll js -->
                    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
                    <!-- main js -->
                    <script src="assets/libs/js/main-js.js"></script>
                    <!-- chart chartist js -->
                    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
                    <!-- sparkline js -->
                    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
                    <!-- morris js -->
                    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
                    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
                    <!-- chart c3 js -->
                    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
                    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
                    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
                    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
                    <!-- dashboard js -->
                    <script src="assets/libs/js/dashboard-influencer.js"></script>
                    <style>
                        .hedename {
                            font-family: "Tilt Warp", serif;
                            font-optical-sizing: auto;
                            font-weight: 500;
                            font-style: normal;
                            font-variation-settings:
                                "XROT" 2,
                                "YROT" 0;
                            color: #026cc8; 

                        }
                    </style>
<!--                  <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>-->
                    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
                    <!--<script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>-->
                    <script src="assets/libs/js/main-js.js"></script>


                    </body>
                    
                    <script>
                        if ($('#chartjs_pie').length) {
                            var ctx = document.getElementById("chartjs_pie").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["5", "4", "3", "2", "1"],
                                    datasets: [{
                                            backgroundColor: [
                                                "#33ff00",
                                                "#99ff00",
                                                "#cccc00",
                                                "#f67f12",
                                                "#f60016"
                                            ],
                   //                            data: [12, 19, 3, 17, 28]
                                            data: <?php echo json_encode($chart_arrays); ?>
                                        }]
                                },
                                options: {
                                    legend: {
                                        display: true,
                                        position: 'bottom',
                                        labels: {
                                            fontColor: '#71748d',
                                            fontFamily: 'Circular Std Book',
                                            fontSize: 14,
                                        }
                                    },
                                }
                            });
                        }
                    </script>
                    </html>

