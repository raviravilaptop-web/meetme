<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');
include_once './perf_chart/perf_chart.php';

$user_email = null;
$UserName = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$divi_offce2 = null;
$officetype = null;
$insName = null;
$address = null;
$headName = null;
$c_meetpsn = null;
$instID = null;
$tcount = null;
$sencecolor = null;
$sensecode = null;
$mcountt = null;
$min_refcode = null;

$c_nic1 = null;
$c_cname1 = null;
$c_contact1 = null;
$c_whatap1 = null;
$c_sdecript1 = null;
$c_ldecript1 = null;
$c_meetpsn1 = null;
$sysdate1 = null;
$refcode1 = null;
$ministry1 = null;
$district1_offce = null;
$divi_offce1 = null;
$senseCode1 = null;
$minname = null;
$dept_name = null;
$zonal_name = null;



$currentdate = date("Y/m/d");
$date = date_create($currentdate);
//echo date_format($date,"Y/m/d H:i:s");
$crntdate = date_format($date, "Y-m-d");

$date2 = date("h:i:sa");
$current_time = date_create($date2);


if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $UserName = $_SESSION['me_user_name'];
    $user_email = $_SESSION['me_user_email'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $divi_offce2 = $_SESSION["me_offce2"];
    $officetype = $_SESSION["me_officetype"];
    $UserID = $_SESSION['me_user_id'];
 
    if ($officetype == 'meetme') {
        $sqlgetname = "SELECT p_name,p_adds,p_code  FROM `province` WHERE `p_code` ='$province'";
    } else if ($officetype == 'min') {
        $sqlgetname = "SELECT min_name,address,min_ID  FROM `tbl_min` WHERE `min_ID` ='$ministry'";
    } else if ($officetype == 'dept') {
        $sqlgetname = "SELECT dept_name,address,dept_id FROM `tbl_department` WHERE `dept_id` ='$district_offce'";
    } else if ($officetype == 'zoffce') {
        $sqlgetname = "SELECT zonal_name,address,znal_id FROM `tbl_zonal_offce` WHERE `znal_id` ='$divi_offce'";
    }

    $RecData = $db->select($sqlgetname);

    //No records found
    if (!$RecData) {
        $Result = array('status' => 'error',
            'Msg' => 'No Data Found in Department List',
        );
        echo json_encode($Result);
        exit();
    } elseif ($RecData) {
        if ($officetype == 'meetme') {
            $_SESSION["insName"] = $RecData[0]['p_name'];
            $_SESSION["address"] = $RecData[0]['p_adds'];
            $_SESSION["insid"] = $RecData[0]['p_code'];
        } else if ($officetype == 'min') {
            $_SESSION["insName"] = $RecData[0]['min_name'];
            $_SESSION["address"] = $RecData[0]['address'];
            $_SESSION["insid"] = $RecData[0]['min_ID'];
        } else if ($officetype == 'dept') {
            $_SESSION["insName"] = $RecData[0]['dept_name'];
            $_SESSION["address"] = $RecData[0]['address'];
            $_SESSION["insid"] = $RecData[0]['dept_id'];
        } else if ($officetype == 'zoffce') {
            $_SESSION["insName"] = $RecData[0]['zonal_name'];
            $_SESSION["address"] = $RecData[0]['address'];
            $_SESSION["insid"] = $RecData[0]['znal_id'];
        }

        $insName = $_SESSION["insName"];
        $address = $_SESSION["address"];
        $instID = $_SESSION["insid"];
    }
}

//today record
$sqldc = null;
if ($uleveldis == '1269_mt') {
    $sqldc = "SELECT count(`c_sno`) AS ccount   FROM `me_client` WHERE date(`sysdate`) =  '$crntdate' ORDER BY `c_nic` ";
} else if ($uleveldis == '1548_sa') {
    $sqldc = "SELECT count(`c_sno`) AS ccount    FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND date(`sysdate`) =  '$crntdate'  ORDER BY `c_nic` ";
} else if ($uleveldis == '1658_pa') {
    $sqldc = "SELECT count(`c_sno`) AS ccount  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND date(`sysdate`) =  '$crntdate' ORDER BY `c_nic` ";
} else if ($uleveldis == '2753_ps') {
    $sqldc = "SELECT count(`c_sno`) AS ccount  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND date(`sysdate`) =  '$crntdate' ORDER BY `c_nic` ";
}
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $tcount = $erow2["ccount"];
    }
}
//month record
$sqldcm = null;
if ($uleveldis == '1269_mt') {
    $sqldcm = "SELECT count(`c_sno`) AS ccountm   FROM `me_client` WHERE MONTH(`sysdate`) =  MONTH('$crntdate') ORDER BY `c_nic` ";
} else if ($uleveldis == '1548_sa') {
    $sqldcm = "SELECT count(`c_sno`) AS ccountm    FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND MONTH(`sysdate`) =  MONTH('$crntdate') ORDER BY `c_nic` ";
} else if ($uleveldis == '1658_pa') {
    $sqldcm = "SELECT count(`c_sno`) AS ccountm  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND MONTH(`sysdate`) =  MONTH('$crntdate') ORDER BY `c_nic` ";
} else if ($uleveldis == '2753_ps') {
    $sqldcm = "SELECT count(`c_sno`) AS ccountm  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND MONTH(`sysdate`) =  MONTH('$crntdate') ORDER BY `c_nic` ";
}

if ($db->getresultset($sqldcm)) {
    $resultm = $db->getresultset($sqldcm);
    while ($erowm = $resultm->fetch_assoc()) {
        $mcount = $erowm["ccountm"];
    }
}
//month record
$sqldcmt = null;
if ($uleveldis == '1269_mt') {
    $sqldcmt = "SELECT TIME(MIN(sysdate))AS ccountmt,refcode  FROM me_client   WHERE  date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
} else if ($uleveldis == '1548_sa') {
    $sqldcmt = "SELECT TIME(MIN(sysdate))AS ccountmt,refcode  FROM me_client   WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
} else if ($uleveldis == '1658_pa') {
    $sqldcmt = "SELECT TIME(MIN(sysdate))AS ccountmt,refcode  FROM me_client   WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
} else if ($uleveldis == '2753_ps') {
    $sqldcmt = "SELECT TIME(MIN(sysdate))AS ccountmt,refcode  FROM me_client   WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
}

if ($db->getresultset($sqldcmt)) {
    $resultmt = $db->getresultset($sqldcmt);
    while ($erowmt = $resultmt->fetch_assoc()) {
        $date1 = $erowmt["ccountmt"];
        $min_refcode = $erowmt["refcode"];
        $client_time = date_create($date1);
        $diff = date_diff($current_time, $client_time);
        $mcountt = $diff->format("%h : %i : %s");
    }
}
//Displa Dashboad
$sqldcmtdisplay = null;
if ($uleveldis == '1269_mt') {
    $sqldcmtdisplay = "SELECT `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`, `senseCode`  FROM me_client   WHERE  date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
} else if ($uleveldis == '1548_sa') {
    $sqldcmtdisplay = "SELECT `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`,`c_meetpsn`, `sysdate`, `refcode`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`, `senseCode` FROM me_client   WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
} else if ($uleveldis == '1658_pa') {
    $sqldcmtdisplay = "SELECT `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`,`c_meetpsn`, `sysdate`, `refcode`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`, `senseCode`  FROM me_client   WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
} else if ($uleveldis == '2753_ps') {
    $sqldcmtdisplay = "SELECT `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`,`c_meetpsn`, `sysdate`, `refcode`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`, `senseCode`  FROM me_client   WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND date(sysdate) =  '$crntdate' AND senseCode = '0' GROUP BY CAST(sysdate AS date)";
}

if ($db->getresultset($sqldcmtdisplay)) {
    $resultmt = $db->getresultset($sqldcmtdisplay);
    while ($erowmt = $resultmt->fetch_assoc()) {
        $c_nic1 = $erowmt["c_nic"];
        $c_cname1 = $erowmt["c_cname"];
        $c_contact1 = $erowmt["c_contact"];
        $c_whatap1 = $erowmt["c_whatap"];
        $c_ldecript1 = $erowmt["c_ldecript"];
        $c_meetpsn1 = $erowmt["c_meetpsn"];
        $sysdate1 = $erowmt["sysdate"];
        $refcode1 = $erowmt["refcode"];
        $ministry1 = $erowmt["ministry"];
        $district1_offce = $erowmt["district_offce"];
        $divi_offce1 = $erowmt["divi_offce"];
        $senseCode1 = $erowmt["senseCode"];


        // get institution name
        $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$c_meetpsn1' ";
        $RecData = $db->select($sqlgetmpeson);
        if ($RecData) {
            $headName = $RecData[0]['inst_meetpson'];
        } else {
            $headName = null;
        }



        // get sense Code
        $sqlsensecolor = "SELECT sensecode FROM `me_client_sense` WHERE  `refcode` ='$refcode1' ";
        $RecData = $db->select($sqlsensecolor);
        if ($RecData) {
            $sensecode = $RecData[0]['sensecode'];
        } else {
            $sensecode = '0';
        }

        // get ministry name
        $sencecolor = null;
        $sqlsensecolor = "SELECT `min_name` FROM `tbl_min` WHERE `min_ID` ='$ministry1' ";
        $RecData = $db->select($sqlsensecolor);
        if ($RecData) {
            $minname = $RecData[0]['min_name'];
        } else {
            $minname = null;
        }

        // get department name name
        $sencecolor = null;
        $sqlsensecolor = "SELECT `dept_name` FROM `tbl_department` WHERE `dept_id` ='$district1_offce' ";
        $RecData = $db->select($sqlsensecolor);
        if ($RecData) {
            $dept_name = $RecData[0]['dept_name'];
        } else {
            $dept_name = null;
        }

        // get Zone officet name name
        $sencecolor = null;
        $sqlsensecolor = "SELECT`zonal_name` FROM `tbl_zonal_offce` WHERE `znal_id` ='$divi_offce1' ";
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
    }
}
include_once './counter/log_reg.php';
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
        <!--chart-->
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">

        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">



        <script type="text/javascript">

            $(document).ready(function($) {
                $('.Screen').hide();
                //Show Signup_Screen
//                                  $('.Login_Screen').show();
                $(".ScreenMenu").click(function() {
                    //clear all old error messages
                    bs.ClearError();
                    $('.Screen').hide();
                    var MenuID = $(this).attr('menuid');
                    if (MenuID == "msgfom") {
                        $('.msg_Screen').show();
                    } else if (MenuID == "Login") {
                        $('.Login_Screen').show();
                    } else if (MenuID == "exit") {
                        $('.Screen').hide();
                    } else if (MenuID == "sencemnu") {
                        $('.sense_Screen').show();
                    } else if (MenuID == "overviewcrt") {
                        $('.chartoverview_Screen').show();
                    } else if (MenuID == "meetpsncrt") {
                        $('.meetpsn_Screen').show();
                    }
                    //console.log(MenuID);
                });
            });
        </script>



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
                                    <h2 class="hedename"><?php echo $insName ?> </h2>
                                    <h5 class="hedename" style="line-height: 0.0;"><?php echo $address ?>  </h5>


                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <div class="page-breadcrumb">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="./index.php" class="breadcrumb-link">Home</a></li>
                                                        <li class="breadcrumb-item"><a href="./dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Last Visits</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>


<?php
$today = date("j, n, Y");
$sysdate2 = 'date("Y/m/d")';
$date2 = date($sysdate2);

//                        echo $date2;
function sysmdate2() {
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = time();

    $date_time = date("Y-m-d", $timestamp);
    //   echo "Current date and local time on this server is $date_time";
    //    $date = new DateTime($source);
    //   $up_f_apintDate = $date->format('Y-m-d'); // 31-07-2012
    return $date_time;
}
?>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="ecommerce-widget">






                            <!-- ============================================================== -->
                            <!-- card influencer one -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Today Total Visits</h5>
                                                <h2 class="mb-0"> <?php echo $tcount ?></h2>
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                <a class="smoothscroll" href="#todayview" > <i class="fa fa-calendar  fa-fw fa-sm text-info"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">This Month Visits</h5>
                                                <h3 class="mb-0"><?php echo $mcount ?> </h3> 
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                <a class="smoothscroll" href="./profile.php" > <i class="fa fa-moon fa-fw fa-sm text-info"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-2 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted"style="margin-bottom: 0px;">Max Waiting Time </h5> 
                                                <h4 class="mb-0" style="margin-top: 0px;"><?php echo $mcountt ?> </h4>
                                                <h6 class="mb-0" style="margin-bottom: 0px; margin-top: 0px;">Reff: <?php echo $min_refcode ?></h6> 
                                            </div>
                                            <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                                <a class="smoothscroll" href="#" > <i class="fa fa-clock fa-fw fa-sm text-info"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">Today Sense Performance </h5>
                                            </div>

                                            <div class="product-colors2 border-bottom" id="senseradio">
                                                <input type="radio" class="radio radio_1" id="radio_1" name="group" value="5" />
                                                <label for="radio_1"></label>
                                                <a><?php echo $code5 ?></a>
                                                <input type="radio" class="radio radio_2" id="radio_2" name="group"value="4"  />
                                                <label for="radio_2"></label>
                                                <a><?php echo $code4 ?></a>
                                                <input type="radio" class="radio radio_3" id="radio_3" name="group"value="3"  />
                                                <label for="radio_3"></label>
                                                <a><?php echo $code3 ?></a>
                                                <input type="radio" class="radio radio_4" id="radio_4" name="group" value="2" />
                                                <label for="radio_4"></label>
                                                <a><?php echo $code2 ?></a>
                                                <input type="radio" class="radio radio_5" id="radio_5" name="group"value="1"  />
                                                <label for="radio_5"></label>
                                                <a><?php echo $code1 ?></a>
                                            </div>

                                        </div> 
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- ============================================================== -->
                        <!-- end card influencer one -->
                        <!-- ============================================================== -->


                        <!-- ============================================================== -->
                        <!-- card influencer one -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="user-avatar float-xl-left pr-4 float-none">
                                                    <img src="assets/images/meeting.png" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                                </div>
                                                <div class="pl-xl-3">
                                                    <div class="m-b-0">
                                                        <div class="user-avatar-name d-inline-block">
                                                            <h2 class="font-24 m-b-10" id="dashName"><?php echo $c_cname1 ?></h2>
                                                        </div>
                                                    </div>
                                                    <div class="user-avatar-address">
                                                        <p class="mb-2"><i class="fa fa-map-marker-alt mr-2  text-primary"></i>Contact: <a id="dashcontct"><?php echo $c_contact1 ?></a>
                                                            <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Whatapp: <a id="dashwhatsapp"><?php echo $c_whatap1 ?></a></span>
                                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Visit Date:<a id="dashvdate"><?php echo $sysdate1 ?> </a></span>
                                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4">Reference No:<a id="dashref"> <?php echo $refcode1 ?></a></span>
                                                        </p>
                                                        <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Reason: </p>
                                                        <p class="d-inline-block" id="longdesc"style="margin-top: 0px; margin-bottom: 0px"><?php echo $c_ldecript1 ?></p><br>
                                                        <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Meet Person: </p>
                                                        <p class="d-inline-block" id="meetper"style="margin-top: 0px; margin-bottom: 0px"><?php echo $headName ?></p><br>
                                                        <p class="d-inline-block text-dark" style="margin-top: 0px; margin-bottom: 0px">Ministry: </p>
                                                        <p class="d-inline-block " id="disminname" style="margin-top: 0px; margin-bottom: 0px"><?php echo $minname ?></p><br>
                                                        <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px">Department: </p>
                                                        <p class="d-inline-block " id="disdeptname"style="margin-top: 0px; margin-bottom: 0px"><?php echo $dept_name ?></p><br>
                                                        <p class="d-inline-block text-dark"style="margin-top: 0px; margin-bottom: 0px"Zonal Office: </p>
                                                        <p class="d-inline-block " id="diszonename"style="margin-top: 0px; margin-bottom: 0px"><?php echo $zonal_name ?></p>
                                                        <!--<a href="#" class="badge badge-light mr-1">Fitness</a> <a href="#" class="badge badge-light mr-1">Life Style</a> <a href="#" class="badge badge-light">Gym</a>-->

                                                        <div class="mt-3">
                                                            <a href="./profile.php" class="mr-1 badge badge-light">Client Profile  </a>  <!--<a href="#" class="mr-1 badge badge-light">Life Style</a> <a href="#" class="mr-1 badge badge-light">Life Style</a>-->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="float-xl-right float-none mt-xl-0 mt-4">
                                                    <h2 class="font-24 m-b-10" id="dashid"><?php echo $c_nic1 ?></h2>
                                                    <a href="#secnse_sec"  id="displastar" ></a>
                                                    <a class="nav-link btn btn-brand ScreenMenu" menuid="msgfom" href="#ministry_sec"  style="margin-top:  10px">Send Messages</a>
                                                    <p class="text-dark"style="text-align: center;"> Send Message to Selected office </p>
                                                    <!--<a href="#" class="btn btn-secondary">Send Messages</a>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-top user-social-box">
<!--                                        <div class="user-social-media d-xl-inline-block "><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 medium-color"> <i class="fab fa-medium"></i></span><span>291</span></div>
                                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>1291</span></div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header text-muted">Today Performance</h5>
                                    <a  class="ScreenMenu" menuid="overviewcrt"> <div class="card-body">
                                            <canvas id="chartjs_pie"></canvas>
                                        </div><a/>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end card influencer one -->
                        <!-- ============================================================== -->



                        <section id="secnse_sec" > </section>
                        <section id="ministry_sec" > </section>
                        <!--===================================== message Screen - Start =========================-->	
                        <div class="row">
                            <div class="col-md-12 col-md-offset-3 col-sm-8  Screen msg_Screen" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                <div class="card">
                                    <!--[Panel - Start]-->   
                                    <div class="panel panel-info">
                                        <!--[Panel Heading - Start]-->  
                                        <div class="panel-heading"style="background: Blue;">
                                            <div class="panel-title" style="color: #ffffff;"> <i class="fa fa-envelope-square  fa-fw fa-sm text-info"></i> Send Messages</div>
                                            <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                            </div>
                                        </div>  
                                        <!--[Panel Heading - End]-->  

                                        <!--[Panel Body - Start]-->  
                                        <div class="panel-body" >

                                            <form  class="form-horizontal msg_Form" role="form"   >
                                                <div class="row">
                                                    <div class="offset-xl-1 col-xl-9  col-lg-12 col-md-12 col-sm-12 col-12 p-4">
                                                        <div class="form-group">
                                                            <label for="name">Send To..</label>
                                                        </div>
                                                        <div id ='getmin'></div>
                                                        <div id='getdept'></div>
                                                        <div id='getzonalo'></div>

                                                        <div class="form-group">
                                                            <label for="name">Selected Institution ID</label>
                                                            <input type="text" class="form-control msg_Form siid" id="siid" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Reference No</label>
                                                            <input type="text" class="form-control  msg_Form refNo" id="refNo" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Your Name</label>
                                                            <input type="text" class="form-control  msg_Form name" id="name" placeholder="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">Contact No</label>
                                                            <input type="email" class="form-control msg_Form contact" id="contact" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="subject">Subject</label>
                                                            <input type="text" class="form-control msg_Form subject" id="subject" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="messages">Message</label>
                                                            <textarea class="form-control msg_Form messages" id="messages" rows="3"></textarea>
                                                        </div>
                                                        <div style="display:none" class="alert alert-danger Signup_Alert">
                                                            <p>Error:</p>
                                                        </div>
                                                        <button type="button" class="btn btn-primary message_btn ">Send Message</button>
                                                        <a type="button"class="btn btn-primary   ScreenMenu" menuid="exit"  href="#">Exit</a>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--[Panel - End]-->  
                            <!--===================================== message Screen - end =========================-->	 
                            <!--===================================== chart Overview - Start =========================-->	


                            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12  Screen chartoverview_Screen" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                <div class="card">
                                    <!--[Panel - Start]-->   
                                    <div class=" panel panel-info">
                                        <!--[Panel Heading - Start]-->  
                                        <div class="panel-heading"style="background: Blue;">
                                            <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Today Customer Emotional Feedback</div>
                                            <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                            </div>
                                        </div>  
                                        <!--[Panel Heading - End]-->  

                                        <h5 class="card-header">Today Customer Emotional Feedback </h5>
                                        <a href="./dashboard.php"> <div class="card-body">
                                                <canvas id="chartjs_pie2"></canvas>
                                            </div></a>

                                    </div>
                                </div>
                            </div>

                            <!--===================================== chart Overview- end =========================-->	 
                            <!--===================================== chart meet person - Start =========================-->	


                            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12  Screen meetpsn_Screen" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                <div class="card">
                                    <div class=" panel panel-info">
                                        <!--[Panel Heading - Start]-->  
                                        <div class="panel-heading"style="background: Blue;">
                                            <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Today Customer Emotional Feedback</div>
                                            <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                            </div>
                                        </div>  

                                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">

                                            <h5 class="card-header">Stacked Bars </h5>
                                            <div class="card-body">
                                                <div id="morris_stacked"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--===================================== chart meet person- end =========================-->	 

                            <style>
                                .circle {
                                    width: 60px;
                                    height: 60px;
                                    line-height: 500px;
                                    border-radius: 50%;
                                    font-size: 50px;
                                    color: #000000;
                                    text-align: center;
                                    background: #d7d7df
                                }
                            </style>


                            <!--=====================================  sense- Start =========================-->	


                            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12   Screen sense_Screen" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                <div class="card">
                                    <!--[Panel - Start]-->   
                                    <div class="panel panel-info">
                                        <!--[Panel Heading - Start]-->  
                                        <div class="panel-heading"style="background: Blue;">
                                            <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Create sense</div>
                                            <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                            </div>
                                        </div>  
                                        <!--[Panel Heading - End]-->  

                                        <!--[Panel Body - Start]-->  
                                        <div class="panel-body" >

                                            <form class="form-horizontal sense_Form" role="form"   >

                                                <div class="row">
                                                    <div class="offset-xl-1 col-xl-9  col-lg-12 col-md-12 col-sm-12 col-12 p-4">
                                                        <div class="form-group">
                                                            <div class="m-b-0">
                                                                <div class="user-avatar-name d-inline-block">
                                                                    <h2 class="font-24 m-b-10" id="dashName2">Name</h2>
                                                                </div>
                                                            </div>

                                                            <input hidden type="text" class="form-control sense_Form sense_id " id="sense_id">
                                                            <input hidden type="text" class="form-control sense_Form sense_refCode " id="sense_refCode">
                                                            <input hidden type="text" class="form-control sense_Form sense_nic " id="sense_nic" >
                                                            <input hidden type="text" class="form-control sense_Form meetp_id " id="meetp_id" >
                                                            <input  class="form-control sense_Form sense_selectCode circle" id="sense_selectCode" >



                                                            <div class="product-colors border-bottom" id="senseradio">
                                                                <h4>Select sense</h4>
                                                                <input type="radio" class="radio radio_1" id="radio_1" name="group" value="5" />
                                                                <label for="radio_1"></label>
                                                                <a>5</a>

                                                                <input type="radio" class="radio radio_2" id="radio_2" name="group"value="4"  />
                                                                <label for="radio_2"></label>
                                                                <a>4</a>
                                                                <input type="radio" class="radio radio_3" id="radio_3" name="group"value="3"  />
                                                                <label for="radio_3"></label>
                                                                <a>3</a>
                                                                <input type="radio" class="radio radio_4" id="radio_4" name="group" value="2" />
                                                                <label for="radio_4"></label>
                                                                <a>2</a>
                                                                <input type="radio" class="radio radio_5" id="radio_5" name="group"value="1"  />
                                                                <label for="radio_5"></label>
                                                                <a>1</a>
                                                            </div>
                                                        </div>
                                                        <div style="display:none" class="alert alert-danger Signup_Alert">
                                                            <p>Error:</p>
                                                        </div>
                                                        <button type="button" class="btn btn-primary btn_sense">Submit</button>
                                                        <a type="button"class="btn btn-primary   ScreenMenu" menuid="exit"  href="#">Exit</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--[Panel - End]-->  
                            <!--=====================================  sense - end =========================-->	 

                            <section id="todayview" >
                                <div class="row">
                                    <!-- ============================================================== -->
                                    <!-- basic table  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <h3 class="card-header">Today List</h3>
                                            <div class="card-body">
                                                  <div class="table-responsive">
                                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>sno#</th>
                                                                <th>NIC#</th>
                                                                <th>Name</th>
                                                                <th>Contact</th>
                                                                <th>whatsapp</th>
                                                                <th>short Descript</th>
                                                                <th hidden >Long Descript</th>
                                                                <th>Meet person</th>
                                                                <th>Date</th>
                                                                <th>sense </th>
                                                                <th>refCode </th>
                                                                <th  >Institute </th>
                                                                <th hidden >Province </th>
                                                                <th hidden >Ministry Office </th>
                                                                <th  hidden>Depart Office </th>
                                                                <th hidden >Zonal offi </th>
                                                                <th  >meetprsn_ID</th>



                                                            </tr>
                                                        </thead>
                                                        <tbody>

<?php
$sqld = null;
if ($uleveldis == '1269_mt') {
    $sqld = "SELECT * FROM `me_client` WHERE date(`sysdate`) =  '$crntdate' ORDER BY `c_nic` "; 
} else if ($uleveldis == '1548_sa') {
    $sqld = "SELECT *  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `work_inst` =  '$instID' AND date(`sysdate`) =  '$crntdate'  ORDER BY `c_nic` ";
} else if ($uleveldis == '1658_pa') {
    $sqld = "SELECT *  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND `work_inst` =  '$instID'  AND date(`sysdate`) =  '$crntdate' ORDER BY `c_nic` ";
} else if ($uleveldis == '2753_ps') {
    $sqld = "SELECT *  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND `work_inst` =  '$instID'  AND date(`sysdate`) =  '$crntdate' ORDER BY `c_nic` ";
}

if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $c_sno = $erow2["c_sno"];
        $c_nic = $erow2["c_nic"];
        $c_cname = $erow2["c_cname"];
        $c_contact = $erow2["c_contact"];
        $c_whatap = $erow2["c_whatap"];
        $c_sdecript = $erow2["c_sdecript"];
        $c_ldecript = $erow2["c_ldecript"];
        $c_meetpsn = $erow2["c_meetpsn"];
        $sysdate = $erow2["sysdate"];
        $refcode = $erow2["refcode"];
        $province = $erow2["province"];
        $ministry = $erow2["ministry"];
        $district_offce = $erow2["district_offce"];
        $divi_offce = $erow2["divi_offce"];
        $divi_offce2 = $erow2["divi_offce2"];
        $work_inst = $erow2["work_inst"];




        // get work institute
        $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$work_inst' ";
        $RecData = $db->select($sqlgetmpeson);
        if ($RecData) {
            $headName = $RecData[0]['inst_meetpson'];
        } else {
            $headName = '0';
        }
        // get institution name
        $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$c_meetpsn' ";
        $RecData = $db->select($sqlgetmpeson);
        if ($RecData) {
            $headName = $RecData[0]['inst_meetpson'];
        } else {
            $headName = '0';
        }


        // get sense Code
        $sqlsensecolor = "SELECT sensecode FROM `me_client_sense` WHERE  `refcode` ='$refcode' ";
        $RecData = $db->select($sqlsensecolor);
        if ($RecData) {
            $sensecode = $RecData[0]['sensecode'];
        } else {
            $sensecode = '0';
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
        // get Province name
        $sencecolor = null;
        $sqlsensecolor = "SELECT `p_name` FROM `province` WHERE `p_code` ='$province' ";
        $RecData = $db->select($sqlsensecolor);
        if ($RecData) {
            $proname = $RecData[0]['p_name'];
        } else {
            $proname = null;
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
                                                                        <th style ="text-align: left;" ><?php echo $c_sno ?> </th>
                                                                        <th style ="text-align: left;" ><?php echo $c_nic ?> </th>
                                                                        <td style ="text-align: left;"><?php echo $c_cname ?></td>
                                                                        <td style ="text-align: left;"><?php echo $c_contact ?></td>
                                                                        <td style ="text-align: left;"><?php echo $c_whatap ?></td>
                                                                        <td style = "text-align: left;"><?php echo $c_sdecript ?></td>
                                                                        <td hidden style = "text-align: left;"><?php echo $c_ldecript ?></td>
                                                                        <td style = "text-align: left;"><?php echo $headName ?></td>
                                                                        <td style = "text-align: center;"><?php echo $sysdate ?></td>
                                                                        <td style = "text-align: center;"><a href="#secnse_sec" class="btn-wishlist m-r-10 ScreenMenu" menuid="sencemnu" ><i class="fa fa-fw fa-star" style="color: <?php echo $sencecolor ?>;"></i></a><?php echo $sensecode ?></td>
                                                                        <td style = "text-align: center;"><?php echo $refcode ?></td>
                                                                        <td style = "text-align: center;" style="min-width:50px"><?php echo $insName ?></td>
                                                                        <td   hidden style = "text-align: center;"><?php echo $proname ?></td>
                                                                        <td  hidden  style = "text-align: center;"><?php echo $minname ?></td>
                                                                        <td  hidden  style = "text-align: center;"><?php echo $dept_name ?></td>
                                                                        <td  hidden  style = "text-align: center;"><?php echo $zonal_name ?></td>
                                                                        <td   style = "text-align: center;"><?php echo $c_meetpsn ?></td>
                                                                    </tr>
        <?php
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
                                    <!-- end basic table  -->
                                    <!-- ============================================================== -->
                                </div>
                            </section>

                            <div id="pre_vistl"></div>
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



                <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
                <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
                <script src="assets/vendor/datatables/js/data-table.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
                <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
                <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
                <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

                <!--chart-->
<!--      <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>-->
                <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
                <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
                <script src="assets/vendor/charts/morris-bundle/Morrisjs.js"></script>
                <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
                <script src="assets/libs/js/main-js.js"></script>



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
            $(document).ready(function($) {
                $(document).on('click', '#radio_1', function(e) {
                    document.getElementById("sense_selectCode").value = document.getElementById("radio_1").value;

                    var inputVal = document.getElementById("sense_selectCode");
                    inputVal.style.backgroundColor = "#33ff00";


                });
            });

            $(document).ready(function($) {
                $(document).on('click', '#radio_2', function(e) {
                    document.getElementById("sense_selectCode").value = document.getElementById("radio_2").value;

                    var inputVal = document.getElementById("sense_selectCode");
                    inputVal.style.backgroundColor = "#99ff00";
                });
            });

            $(document).ready(function($) {
                $(document).on('click', '#radio_3', function(e) {
                    document.getElementById("sense_selectCode").value = document.getElementById("radio_3").value;
                    var inputVal = document.getElementById("sense_selectCode");
                    inputVal.style.backgroundColor = "#cccc00"
                });
            });

            $(document).ready(function($) {
                $(document).on('click', '#radio_4', function(e) {
                    document.getElementById("sense_selectCode").value = document.getElementById("radio_4").value;
                    var inputVal = document.getElementById("sense_selectCode");
                    inputVal.style.backgroundColor = "#f67f12"
                });
            });
            $(document).ready(function($) {
                $(document).on('click', '#radio_5', function(e) {
                    document.getElementById("sense_selectCode").value = document.getElementById("radio_5").value;
                    var inputVal = document.getElementById("sense_selectCode");
                    inputVal.style.backgroundColor = "#f60016"
                });
            });
                </script>
                <script>
                    if ($('#chartjs_pie').length) {
                        var ctx = document.getElementById("chartjs_pie").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
//                                    labels: ["5", "4", "3", "2", "1"],
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
                <script>
                    var table = document.getElementById('example');
                    for (var i = 1; i < table.rows.length; i++) {
                        table.rows[i].onclick = function()
                        {
                            var str = this.cells[1].innerHTML;
                            document.getElementById("sense_id").value = this.cells[0].innerHTML;
                            document.getElementById("sense_nic").value = this.cells[1].innerHTML;
                            document.getElementById("dashid").innerHTML = this.cells[1].innerHTML;
                            document.getElementById("dashName").innerHTML = this.cells[2].innerHTML;
                            document.getElementById("dashName2").innerHTML = (this.cells[2].innerHTML + ' - (' + this.cells[1].innerHTML + ')');
                            document.getElementById("dashcontct").innerHTML = this.cells[3].innerHTML
                            document.getElementById("dashwhatsapp").innerHTML = this.cells[4].innerHTML;
                            document.getElementById("longdesc").innerHTML = this.cells[6].innerHTML;
                            document.getElementById("meetper").innerHTML = this.cells[7].innerHTML;
                            document.getElementById("dashvdate").innerHTML = this.cells[8].innerHTML;
                            document.getElementById("displastar").innerHTML = this.cells[9].innerHTML;
                            document.getElementById("sense_refCode").value = this.cells[10].innerHTML;
                            document.getElementById("dashref").innerHTML = this.cells[10].innerHTML;
                            document.getElementById("disminname").innerHTML = this.cells[12].innerHTML;
                            document.getElementById("disdeptname").innerHTML = this.cells[13].innerHTML;
                            document.getElementById("diszonename").innerHTML = this.cells[14].innerHTML;
                            document.getElementById("meetp_id").value = this.cells[15].innerHTML;
                            bs.ClearError();
                            if (frm.IsEmpty(str)) {
                            }

                            if (str == "") {
                                document.getElementById("pre_vistl").innerHTML = "";
                                return;
                            } else {

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("pre_vistl").innerHTML = this.responseText;
                                    }
                                };
                                // document.getElementById("refcode").value = str;
                                xmlhttp.open("GET", "./getform/getpre_vist.php?q=" + str, true);
                                xmlhttp.send();
                            }
                        };
                    }
                </script>


                <script>
                    if ($('#chartjs_pie2').length) {
                        var ctx = document.getElementById("chartjs_pie2").getContext('2d');
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


                <script>

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getmin").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/public_acces/getministry.php", true);
                    xmlhttp.send();

                </script>

                <script>
//                        var xmlhttp = new XMLHttpRequest();
//                        xmlhttp.onreadystatechange = function() {
//                            if (this.readyState == 4 && this.status == 200) {
//                                document.getElementById("getdept").innerHTML = this.responseText;
//                            }
//                        };
//                        xmlhttp.open("GET", "./getform/public_acces/getdepartment.php", true);
//                        xmlhttp.send();
                </script>

                <script>
//                    var xmlhttp = new XMLHttpRequest();
//                    xmlhttp.onreadystatechange = function() {
//                        if (this.readyState == 4 && this.status == 200) {
//                            document.getElementById("getzonalo").innerHTML = this.responseText;
//                        }
//                    };
//                    xmlhttp.open("GET", "./getform/public_acces/getzonaloffice.php", true);
//                    xmlhttp.send();
                </script>

                <script>
                    function clk_minid() {
                        var shopro_min_id = document.getElementById("Signup_min_s").value;
                        document.getElementById("Signup_min").value = shopro_min_id;
                        document.getElementById("siid").value = shopro_min_id;
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("getdept").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET", "./getform/public_acces/getdepartment.php?q=" + shopro_min_id, true);
                        xmlhttp.send();
                    }
                </script>

                <script>
                    function clk_deptid() {
                        var shopro_dept_id = document.getElementById("Signup_dept_s").value;
                        document.getElementById("Signup_dept").value = shopro_dept_id;
                        document.getElementById("siid").value = shopro_dept_id;
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("getzonalo").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET", "./getform/public_acces/getzonaloffice.php?q=" + shopro_dept_id, true);
                        xmlhttp.send();
                    }
                </script>
                <script>
                    function clk_divid() {
                        var shopro_zone_id = document.getElementById("Signup_zonal_s").value;
                        if (shopro_zone_id === null) {

                        } else {
                            document.getElementById("Signup_zonal").value = shopro_zone_id;
                            document.getElementById("siid").value = shopro_zone_id;
                        }
                    }
                </script>


                </body>

                </html>