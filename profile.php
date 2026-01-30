<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');

$userName = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$insName = null;
$address = null;
$sqld = null;

$c_contact1 = null;
$c_whatap1 = null;
$refcode1 = null;
$c_nic1 = null;
$refcode1 = null;
$c_ldecript1 = null;
$minname = null;
$dept_name = null;
$zonal_name = null;
$c_cname1 = null;
$c_sysdate = null;


if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $userName = $_SESSION['me_user_name'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $username = $_SESSION['me_user_email'];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
}


if (isset($_POST['profile_serchid'])) {
    if (0 == strcmp($_POST['profile_serchid'], 'Profile_serchid')) {
        $profile_nicn = trim($_POST['profile_nicn']);

        if ($uleveldis == '1269_mt') {
            $sqld = "SELECT  `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `c_nic` =  '$profile_nicn'  ORDER BY `c_nic` ";
        } else if ($uleveldis == '1548_sa') {
            $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `c_nic` =  '$profile_nicn'   ORDER BY `c_nic` ";
        } else if ($uleveldis == '1658_pa') {
            $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'  AND `c_nic` =  '$profile_nicn'   ORDER BY `c_nic` ";
        } else if ($uleveldis == '2753_ps') {
            $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce'  AND `c_nic` =  '$profile_nicn'   ORDER BY `c_nic` ";
        }


        $RecData = $db->select($sqld);
//No records found
        if (!$RecData) {
//    $Result = array('status' => 'error',
//        'Msg' => 'No match NIC No',
//    );
//    echo json_encode($Result);
//    exit();
            ?>
            <script> alert("No match NIC No")</script>
            <?php
        } elseif ($RecData) {
            $refcode1 = $RecData[0]['refcode'];
            $c_nic1 = $RecData[0]['c_nic'];
            $c_cname1 = $RecData[0]['c_cname'];
            $c_contact1 = $RecData[0]['c_contact'];
            $c_whatap1 = $RecData[0]['c_whatap'];
            $c_ldecript1 = $RecData[0]['c_ldecript'];
            $c_meetpsn = $RecData[0]['c_meetpsn'];
            $c_sysdate = $RecData[0]['sysdate'];
            $ministry = $RecData[0]['ministry'];
            $district_offce = $RecData[0]['district_offce'];
            $divi_offce = $RecData[0]['divi_offce'];

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
        }
    }
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
                                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
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





                            <!-- ============================================================== -->
                            <!-- influencer profile  -->
                            <!-- ============================================================== -->


                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card influencer-profile-data">
                                        <div class="card-body">

                                            <div class=" col-sm-4 ">
                                                <form  class="input-group input-search" method="POST"  action="">
                                                    <input class="form-control " id ="profile_nicn" name ="profile_nicn"type="text" placeholder="NIC No"><span class="input-group-btn">
                                                        <button  class="btn btn-secondary"  id="profile_serchid" name="profile_serchid"value="Profile_serchid" type="submit"><i class="fas fa-search"></i></button></span>
                                                </form>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-2 col-lg-6 col-md-2 col-sm-2 col-12">
                                                    <div class="text-center">
                                                        <div class="header-logo">
                                                            <br><a class="site-logo" href="dashboard.php">
                                                                <i class="fa fa-file fa-fw fa-5x " style="color: #990099"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                                    <div class="user-avatar-info">
                                                        <div class="m-b-20">
                                                            <div class="user-avatar-name">
                                                                <h2 class="mb-1"id="dashName"><?php echo $c_cname1 ?></h2>

                                                            </div>
                                                            <div class="rating-star  d-inline-block">
                                                                <i class="fa fa-fw fa-star"></i>
                                                                <i class="fa fa-fw fa-star"></i>
                                                                <i class="fa fa-fw fa-star"></i>
                                                                <i class="fa fa-fw fa-star"></i>
                                                                <i class="fa fa-fw fa-star"></i>
                                                                <p class="d-inline-block text-dark">14 Reviews </p>
                                                            </div>
                                                        </div>
                                                        <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                                        <div class="user-avatar-address">
                                                            <p class="mb-2"><i class="fa fa-map-marker-alt mr-1  text-primary"></i>Contact: <a id="hi_contct"><?php echo $c_contact1 ?></a>
                                                                <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Whatapp: <a id="hi_whatsapp"><?php echo $c_whatap1 ?></a></span>
                                                                <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Visit Date:<a id="hi_vdate"><?php echo $c_sysdate ?> </a></span>
                                                                <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">NIC:<a id="hi_inc"><?php echo $c_nic1 ?> </a></span>
                                                                <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Reference No:<a id="hi_ref"><?php echo $refcode1 ?></a></span>
                                                            </p>

                                                            <div class="border-bottom pb-0">
                                                                <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Reason: </p>
                                                                <p class="d-inline-block " id="lhi_reason"style="margin-top: 0px; margin-bottom: 0px"><?php echo $c_ldecript1 ?></p><br>
                                                                <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Ministry: </p>
                                                                <p class="d-inline-block " id="hi_minis"style="margin-top: 0px; margin-bottom: 0px"><?php echo $minname ?></p><br>
                                                                <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Department: </p>
                                                                <p class="d-inline-block " id="hi_deptname"style="margin-top: 0px; margin-bottom: 0px"><?php echo $dept_name ?></p><br>
                                                                <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Zonal Office: </p>
                                                                <p class="d-inline-block " id="hi_zonename"style="margin-top: 0px; margin-bottom: 0px"><?php echo $zonal_name ?></p>
                                                                <a href="./chart.php" class="badge badge-light mr-1">Chart view</a>
                                                                <!--<a href="#" class="badge badge-light mr-1">Fitness</a> <a href="#" class="badge badge-light mr-1">Life Style</a> <a href="#" class="badge badge-light">Gym</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
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
                                                                <th scope="col">sdestcrip</th>
                                                                <th hidden scope="col">ldestcrip</th>
                                                                <th scope="col">meet Person</th>
                                                                <th scope="col">sysdate</th>
                                                                <th  scope="col">province</th>
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
                                                                            <td hidden style = "text-align: left;"><?php echo $c_ldecript ?></td>
                                                                            <td style = "text-align: left;"><?php echo $headName ?></td>
                                                                            <td style = "text-align: left;"><?php echo $sysdate ?></td>
                                                                            <td  style = "text-align: left;"><?php echo $p_name ?></td>
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



                <script>
    var table = document.getElementById('tblprofile');
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function()
        {
            document.getElementById("hi_ref").innerHTML = this.cells[0].innerHTML;
            document.getElementById("dashName").innerHTML = this.cells[2].innerHTML;
            document.getElementById("hi_contct").innerHTML = this.cells[3].innerHTML;
            document.getElementById("hi_whatsapp").innerHTML = this.cells[4].innerHTML;
            document.getElementById("hi_vdate").innerHTML = this.cells[8].innerHTML;
            document.getElementById("lhi_reason").innerHTML = this.cells[6].innerHTML;
            document.getElementById("hi_minis").innerHTML = this.cells[10].innerHTML;
            document.getElementById("hi_deptname").innerHTML = this.cells[11].innerHTML;
            document.getElementById("hi_zonename").innerHTML = this.cells[12].innerHTML;

        };
    }
                </script>   


                </body>

                </html>
