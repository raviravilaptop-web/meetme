<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');
include_once './perf_chart/overview_chart.php';
$insName = null;
$address = null;
$shopro_province_id = null;
$pro_min_id = null;
$pro_dept_id = null;
$pro_zonal = null;
$fromDate = null;
$c_meetpsn = null;
$headName = null;
$refcode = null;
$c_sno = null;
$c_nic = null;
$c_cname = null;
$c_contact = null;
$c_whatap = null;
$c_sdecript = null;
$c_ldecript = null;
$sysdate = null;




if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $username = $_SESSION['me_user_email'];
    $user_email = $_SESSION['me_user_email'];
    $leveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
          $instID = $_SESSION["insid"];
    
}
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Roboto+Slab:wght@100..900&family=Tilt+Warp&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
        <title>MeetMe</title>

        <!-- forms -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./login_system/libs/awesome-functions.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="./login_system/js/addclient.js"></script>

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
            include_once './getform/getoverviewinfo.php';
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
                                    <h2 class="hedename"><?php echo $insName ?> </h2>
                                    <h5 class="hedename" style="line-height: 0.0;"><?php echo $address ?></h5>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="./index.php" class="breadcrumb-link">Home</a></li>
                                                <li class="breadcrumb-item"><a href="./dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Over View</li>
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
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card influencer-profile-data">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div class="text-center">
                                                        <div class="header-logo">
                                                            <a class="site-logo" href="dashboard.php">
                                                                <i class="fa fa-address-card fa-fw fa-5x " style="color: #990099"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                                    <div class="user-avatar-info">
                                                        <div class="m-b-20">
                                                            <div class="user-avatar-name">
                                                                <h2 class="mb-1"><?php echo $insName ?></h2>
                                                            </div>
                                                            <div class="rating-star  d-inline-block">

                                                                <p class="d-inline-block text-dark"><?php echo $address ?></p>
                                                            </div>
                                                        </div>
                                                        <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                                        <div class="user-avatar-address">
                                                            <div class="border-bottom pb-0">
                                                                <p class="d-inline-block text-dark" style="margin-top: 0px; margin-bottom: 0px">Ministry: </p>
                                                                <p class="d-inline-block " id="hi_minis" style="margin-top: 0px; margin-bottom: 0px"><?php echo $minname ?></p><br>
                                                                <p class="d-inline-block text-dark" style="margin-top: 0px; margin-bottom: 0px">Department: </p>
                                                                <p class="d-inline-block " id="hi_deptname" style="margin-top: 0px; margin-bottom: 0px"><?php echo $dept_name ?></p><br>
                                                                <p class="d-inline-block text-dark" style="margin-top: 0px; margin-bottom: 0px">Zonal Office: </p>
                                                                <p class="d-inline-block " id="hi_zonename" style="margin-top: 0px; margin-bottom: 0px"><?php echo $zonal_name ?></p>
                                                           

                                                                <!--<a href="#" class="badge badge-light mr-1">Fitness</a> <a href="#" class="badge badge-light mr-1">Life Style</a> <a href="#" class="badge badge-light">Gym</a>-->
                                                            </div>

                                                            <div class="mt-3">
                                                                <!--<a href="#" class="badge badge-light mr-1">Fitness</a> <a href="#" class="badge badge-light mr-1">Life Style</a> <a href="#" class="badge badge-light">Gym</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top user-social-box">
                                            <h4 class="mb-1">Searching</h4>
                                            <form  class="form-horizontal" method="POST" >
                                                <div class="user-social-media d-xl-inline-block" style="width: 350px"> <label >From Date</label><input class="form-control  fromDate" id="fromDate"name="fromDate"data-parsley-type="digits" type="date"  placeholder="From" ></div>
                                                <div class="user-social-media d-xl-inline-block" style="width: 350px">  <label >To Date</label> <input class="form-control  toDate" id="toDate" name="toDate"type="date"  placeholder="To" ></div>
                                                <?php
                                                if ($uleveldis == '1269_mt') {
                                                    echo " <div class='user-social-media d-xl-inline-block'style='width: 350px'>  <label >Province</label><div id ='getprovince'></div></div>" .
                                                    "<div class='user-social-media d-xl-inline-block' style='width: 350px'>  <label >Ministry</label><div id ='getmin'></div></div>" .
                                                    "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Department</label><div id='getdept'></div></div>" .
                                                    "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Division Office</label><div id='getzonalo'></div></div>";
                                                } else if ($uleveldis == '1548_sa') {
                                                    echo "<div class='user-social-media d-xl-inline-block' style='width: 350px'>  <label >Ministry</label><div id ='getmin'></div></div>" .
                                                    "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Department</label><div id='getdept'></div></div>" .
                                                    "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Office</label><div id='getzonalo'></div></div>";
                                                } else if ($uleveldis == '1658_pa') {
                                                    echo "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Department</label><div id='getdept'></div></div>" .
                                                    "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Office</label><div id='getzonalo'></div></div>";
                                                } else if ($uleveldis == '2753_ps') {
                                                    echo "<div class='user-social-media d-xl-inline-block' style='width: 350px'> <label >Office</label><div id='getzonalo'></div></div>";
                                                }
                                                ?>
                                                <div class="user-social-media d-xl-inline-block" style="width: 125px">    <button type="submit" id="showpro_btn"name="showpro_btn" value="Showpro_btn"class="form-control btn btn-secondary">Show</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="offset-xl-1 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">

                                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                                            <div class="card ">
                                                <h5 class="card-header">Overview Customer Emotional Feedback </h5>
                                                <a href="./dashboard.php"> <div class="card-body">
                                                        <canvas id="chartjs_pie"></canvas>
                                                    </div></a>
                                            </div>
                                        </div>



                                        <div class="offset-xl-1 col-md-3 mb-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="d-flex justify-content-between align-items-center mb-0">
                                                        <span class="text-muted">Sense Statistics</span>
                                                        <span class="text-muted offset-xl-4">Total </span> <span class="badge badge-secondary badge-pill"> <?php echo $sensettl ?></span>
                                                    </h4>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group mb-4">
                                                        <li class="list-group-item-light d-flex justify-content-between">
                                                            <div class="product-colors3 border-bottom" id="senseradio">
                                                                <input type="radio" class="radio radio_1" id="radio_1" name="group"  />
                                                                <label for="radio_1"></label>
                                                            </div>
                                                            <span class="text-muted"><?php echo $code5 ?></span>
                                                        </li>
                                                        <li class="list-group-item-light  d-flex justify-content-between">
                                                            <div class="product-colors3 border-bottom" id="senseradio">
                                                                <input type="radio" class="radio radio_2" id="radio_2" name="group"  />
                                                                <label for="radio_2"></label>
                                                            </div>
                                                            <span class="text-muted"><?php echo $code4 ?></span>
                                                        </li>
                                                        <li class="list-group-item-light  d-flex justify-content-between">
                                                            <div class="product-colors3 border-bottom" id="senseradio">
                                                                <input type="radio" class="radio radio_3" id="radio_3" name="group" />
                                                                <label for="radio_3"></label>
                                                            </div>
                                                            <span class="text-muted"><?php echo $code3 ?></span>
                                                        </li>
                                                        <li class="list-group-item-light  d-flex justify-content-between">
                                                            <div class="product-colors3 border-bottom" id="senseradio">
                                                                <input type="radio" class="radio radio_4" id="radio_4" name="group" />
                                                                <label for="radio_4"></label>
                                                            </div>
                                                            <span class="text-muted"><?php echo $code2 ?></span>
                                                        </li>
                                                        <li class="list-group-item-light  d-flex justify-content-between">
                                                            <div class="product-colors3 border-bottom" id="senseradio">
                                                                <input type="radio" class="radio radio_5" id="radio_5" name="group" />
                                                                <label for="radio_5"></label>
                                                            </div>
                                                            <span class="text-muted"><?php echo $code1 ?></span>
                                                        </li>
                                                    </ul>
                                                    <!--                                                            <li class="list-group-item d-flex justify-content-between bg-light">
                                                                                                                    <div class="text-success">
                                                                                                                        <h6 class="my-0">Promo code</h6>
                                                                                                                        <small>EXAMPLECODE</small>
                                                                                                                    </div>
                                                                                                                    <span class="text-success">-$5</span>
                                                                                                                </li>-->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <style>
                                .product-colors3 label {
                                    display: inline-block;
                                    width: 30px;
                                    height: 30px;
                                    border-radius: 40%;
                                    transition: all .2s ease-in-out;
                                    animation-timing-function: ease-in-out;
                                    animation-iteration-count: infinite;
                                    animation-duration: 1.6s;
                                    animation-name: dot-anim;
                                }
                            </style>



                            <!-- ============================================================== -->
                            <!-- influencer profile  -->
                            <!-- ============================================================== -->


                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card influencer-profile-data">



                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h4 class="card-header">Visiting History</h4>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Ref No</th>
                                                                        <th hidden scope="col">NIC</th>
                                                                        <th hidden scope="col">Name </th>
                                                                        <th hidden scope="col">contact</th>
                                                                        <th  hidden scope="col">whatsapp</th>
                                                                        <th scope="col">Description</th>
                                                                        <th scope="col">Institution</th>
                                                                        <th hidden scope="col">ldestcrip</th>
                                                                        <th scope="col">meet Person</th>
                                                                        <th scope="col">sysdate</th>
                                                                        <th hidden scope="col">province</th>
                                                                        <th  scope="col">ministry</th>
                                                                        <th  scope="col">Department</th>
                                                                        <th  scope="col">divi office</th>
                                                                        <th  scope="col">sense</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if (isset($sqld)) {
                                                                        if ($db->getresultset($sqld)) {
                                                                            $result = $db->getresultset($sqld);
                                                                            while ($erow2 = $result->fetch_assoc()) {
                                                                                $refcode = $erow2["refcode"];
                                                                                $c_nic = $erow2["c_nic"];
                                                                                $c_cname = $erow2["c_cname"];
                                                                                $c_contact = $erow2["c_contact"];
                                                                                $c_whatap = $erow2["c_whatap"];
                                                                                $c_sdecript = $erow2["c_sdecript"];
                                                                                $c_ldecript = $erow2["c_ldecript"];
                                                                                $c_meetpsn = $erow2["c_meetpsn"];
                                                                                $sysdate = $erow2["sysdate"];
                                                                                $province = $erow2["province"];
                                                                                $ministry = $erow2["ministry"];
                                                                                $district_offce = $erow2["district_offce"];
                                                                                $divi_offce = $erow2["divi_offce"];
                                                                                $work_inst = $erow2["work_inst"];

                                                                                // get institution name
                                                                                $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$c_meetpsn' ";
                                                      
                                                                                $RecData = $db->select($sqlgetmpeson);
                                                                                if (!$RecData) {
                                                                                    $Result = array('status' => 'error',
                                                                                        'Msg' => 'No name Found in Meet person List',
                                                                                    );
                                                                                    echo json_encode($Result);
                                                                                    exit();
                                                                                } elseif ($RecData) {
                                                                                    $headName = $RecData[0]['inst_meetpson'];
                                                                                }
                                                                                // get sense Code
                                                                                $sencecolor = null;
                                                                                $sqlsensecolor = "SELECT sensecode FROM `me_client_sense` WHERE  `refcode` ='$refcode' ";
                                                                                $RecData = $db->select($sqlsensecolor);
                                                                                if ($RecData) {
                                                                                    $sensecode = $RecData[0]['sensecode'];
                                                                                } else {
                                                                                    $sensecode = '0';
                                                                                }
                                                                                // get Province name
                                                                                $sencecolor = null;
                                                                                $sqlsensecolor = "SELECT `p_name` FROM `province` WHERE `p_code` ='$province' ";
                                                                                $RecData = $db->select($sqlsensecolor);
                                                                                if ($RecData) {
                                                                                    $p_name = $RecData[0]['p_name'];
                                                                                } else {
                                                                                    $p_name = null;
                                                                                }
                                                                                // get department name name
                                                                                // get ministry name
                                                                                $sencecolor = null;
                                                                                $sqlsensecolor = "SELECT `min_name` FROM `tbl_min` WHERE `min_ID` ='$ministry' ";
                                                                                $RecData = $db->select($sqlsensecolor);
                                                                                if ($RecData) {
                                                                                    $minname = $RecData[0]['min_name'];
                                                                                } else {
                                                                                    $minname = null;
                                                                                }
                                                                                // get department name name
                                                                                $sencecolor = null;
                                                                                $sqlsensecolor = "SELECT `dept_name` FROM `tbl_department` WHERE `dept_id` ='$district_offce' ";
                                                                                $RecData = $db->select($sqlsensecolor);
                                                                                if ($RecData) {
                                                                                    $dept_name = $RecData[0]['dept_name'];
                                                                                } else {
                                                                                    $dept_name = null;
                                                                                }
                                                                                // get Zone officet name name
                                                                                $sencecolor = null;
                                                                                $sqlsensecolor = "SELECT`zonal_name` FROM `tbl_zonal_offce` WHERE `znal_id` ='$divi_offce' ";
                                                                                $RecData = $db->select($sqlsensecolor);
                                                                                if ($RecData) {
                                                                                    $zonal_name = $RecData[0]['zonal_name'];
                                                                                } else {
                                                                                    $zonal_name = null;
                                                                                }

                                                                                if ($sensecode == '5') {
                                                                                    $sencecolor = "#33ff00";
                                                                                } else if ($sensecode == '4') {
                                                                                    $sencecolor = "#99ff00";
                                                                                } else if ($sensecode == '3') {
                                                                                    $sencecolor = "#cccc00";
                                                                                } else if ($sensecode == '2') {
                                                                                    $sencecolor = "#f67f12";
                                                                                } else if ($sensecode == '1') {
                                                                                    $sencecolor = "#f60016";
                                                                                } else {
                                                                                    $sencecolor = "#111111";
                                                                                }
                                                                                ?>
                                                                                <tr>
                                                                                    <td style = "text-align: left;"><?php echo $refcode ?></td>
                                                                                    <td hidden  style = "text-align: left;"><?php echo $c_nic ?></td>
                                                                                    <td hidden style = "text-align: left;"><?php echo $c_cname ?></td>
                                                                                    <td hidden style = "text-align: left;"><?php echo $c_contact ?></td>
                                                                                    <td hidden style = "text-align: left;"><?php echo $c_whatap ?></td>
                                                                                    <td style = "text-align: left;"><?php echo $c_sdecript ?></td>
                                                                                    <td style = "text-align: left;"><?php echo $work_inst; ?></td>
                                                                                    <td hidden style = "text-align: left;"><?php echo $c_ldecript ?></td>
                                                                                    <td style = "text-align: left;"><?php echo $headName ?></td>
                                                                                    <td style = "text-align: left;"><?php echo $sysdate ?></td>
                                                                                    <td hidden style = "text-align: left;"><?php echo $p_name ?></td>
                                                                                    <td  style = "text-align: left;"><?php echo $minname ?></td>
                                                                                    <td  style = "text-align: left;"><?php echo $dept_name ?></td>
                                                                                    <td  style = "text-align: left;"><?php echo $zonal_name ?></td>
                                                                                    <td style = "text-align: center;"><a href="#secnse_sec" class="btn-wishlist m-r-10 ScreenMenu" menuid="sencemnu" ><i class="fa fa-fw fa-star" style="color: <?php echo $sencecolor ?>;"></i></a><?php echo $sensecode ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ============================================================== -->
                                            <!-- end data table  -->
                                            <!-- ============================================================== -->
                                        </div>




                                    </div>
                                </div>

                                <!-- ============================================================== -->
                                <!-- end influencer profile  -->
                                <!-- ============================================================== -->

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
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
            <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
            <script src="assets/libs/js/main-js.js"></script>
            <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
            <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
            <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
            <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
            <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
            <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
            <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
            <script src="assets/libs/js/dashboard-ecommerce.js"></script>

            <script src="assets/libs/js/dashboard-influencer.js"></script>
            <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>







<!--    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="./assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="./assets/vendor/multi-select/js/jquery.multi-select.js"></script>-->
            <script src="./assets/libs/js/main-js.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="./assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
            <script src="./assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
            <script src="./assets/vendor/datatables/js/data-table.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
            <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
            <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
            <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


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

            <style>
                .influencer-profile-data .user-social-media {
                    padding: 8px 16px;
                    text-align: center;
                    border-right: 1px solid #e6e6f2;
                </style>   

                <script>

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getprovince").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/province_1.php", true);
                    xmlhttp.send();

                </script>
                <script>
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getmin").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/getministry_1.php", true);
                    xmlhttp.send();
                </script>

                <script>
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getdept").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/getdepartment_1.php", true);
                    xmlhttp.send();
                </script>
                <script>
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getzonalo").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/getzonaloffice_1.php", true);
                    xmlhttp.send();

                </script>

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
                                        data: <?php echo json_encode($setwehechart); ?>
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
                <script>

                    if ($('#morris_stacked').length) {
                        // Use Morris.Bar
                        Morris.Bar({
                            element: 'morris_stacked',
                            data: [
                                {x: '2011 Q1', y: 3, z: 2, a: 3},
                                //                    { x: '2011 Q2', y: 2, z: null, a: 1 },
                                //                    { x: '2011 Q3', y: 0, z: 2, a: 4 },
                                //                    { x: '2011 Q4', y: 2, z: 4, a: 3 }
                            ],
                            xkey: 'x',
                            ykeys: ['y', 'z', 'a'],
                            labels: ['Y', 'Z', 'A'],
                            stacked: true,
                            barColors: ['#5969ff', '#ff407b', '#25d5f2'],
                            resize: true,
                            gridTextSize: '14px'
                        });
                    }</script>

                <script>
                    function clk_proid() {
                        var shopro_province_id = document.getElementById("shopro_province_id").value;
                        document.getElementById("inpuproid").value = shopro_province_id;
                    }
                </script>
                <script>
                    function clk_minid() {
                        var shopro_province_id = document.getElementById("pro_min_id").value;
                        document.getElementById("inpuminid").value = shopro_province_id;

                    }
                </script>
                <script>
                    function clk_deptid() {
                        var shopro_province_id = document.getElementById("pro_dept_id").value;
                        document.getElementById("inpudeptid").value = shopro_province_id;

                    }
                </script>
                <script>
                    function clk_divid() {
                        var shopro_province_id = document.getElementById("pro_zonal").value;
                        document.getElementById("inpudivid").value = shopro_province_id;

                    }
                </script>

        </body>

    </html>
