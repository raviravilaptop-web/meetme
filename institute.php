<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');
//include_once('./getform/getretriew_min.php');
//$isnd = new Institutedetails();
//$in = $isnd->getmindetails() ;
//echo $in;
$insName = null;
$address = null;
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $username = $_SESSION['me_user_email'];
    $user_email = $_SESSION['me_user_email'];
    $leveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $divi_offce2 = $_SESSION["me_offce2"];
    $officetype = $_SESSION["me_officetype"];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
}
$shoscreen = ($_GET['q']);
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Roboto+Slab:wght@100..900&family=Tilt+Warp&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

        <!--<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">-->
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <!--<link rel="stylesheet" href="assets/libs/css/style.css">-->
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

        <!--<link rel="stylesheet" href="../index_lib/css/main.css">-->
        <!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./login_system/libs/awesome-functions.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="./login_system/js/addclient.js"></script>
        <title>MeetMe</title>

        <script type="text/javascript">
            $(document).ready(function($) {
                //Show Signup_Screen
                $('.<?php echo $shoscreen; ?>').show();
                $(".ScreenMenu").click(function() {
                    //clear all old error messages
                    bs.ClearError();
                    $('.Screen').hide();
                    var MenuID = $(this).attr('menuid');
                    if (MenuID == "exit") {
                        $('.adddepartment').hide();
                    } else if (MenuID == "Showminis") {
                        $('.addministry').show();
                    } else if (MenuID == "Showdepartment") {
                        $('.adddepartment').show();
                    } else if (MenuID == "showzonaloff") {
                        $('.addzonaloff').show();
                    } else if (MenuID == "Showtble") {
                        $('.addtable').show();
                    } else if (MenuID == "showaddmeetperson") {
                        $('.addmeetperson').show();
                    }
                    //console.log(MenuID);

                });
            });
        </script>


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
                                            <div class="page-breadcrumb">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="./index.php" class="breadcrumb-link">Home</a></li>
                                                        <li class="breadcrumb-item"><a href="./dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Institutions</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- button  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body border-top">
                                        <h4>Institution Information</h4>
                                        <div class="btn-group btn-group-toggle" >
                                            <label class="active">
                                                <a  type="button" class="btn btn-primary ScreenMenu addtable" menuid="Showtble" href="#"> All</a>
                                            </label>
                                            <label class="">
                                                <a  type="button" class="btn btn-primary ScreenMenu addministry" menuid="Showminis"href="#"> Ministries</a>
                                                <!--<a class="nav-link btn btn-primary  " href="./ministries.php"><i class="fab fa-fw fa-wpforms"></i>Ministries </a>-->
                                            </label>
                                            <label class="">
                                                <a  type="button" class="btn btn-primary ScreenMenu adddepartment" menuid="Showdepartment" href="#"> Department</a>
                                                <!--<a class="nav-link btn btn-primary  " href="./department.php"><i class="fab fa-fw fa-wpforms"></i>Department Office </a>-->
                                            </label>
                                            <label class="">
                                                <a  type="button" class="btn btn-primary ScreenMenu addzonaloff" menuid="showzonaloff" href="#"> Zonal Office</a>
                                                 <!--<a class="nav-link btn btn-primary  " href="./zonal_office.php"><i class="fab fa-fw fa-wpforms"></i>Zonal Office </a>-->
                                            </label>
                                            <label class="">
                                                <a  type="button" class="btn btn-primary ScreenMenu addmeetperson" menuid="showaddmeetperson" href="#"> Meet Person</a>
                                                 <!--<a class="nav-link btn btn-primary  " href="./zonal_office.php"><i class="fab fa-fw fa-wpforms"></i>Zonal Office </a>-->
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end button  -->
                            <!-- ============================================================== -->

                        </div>
                        <div id ="retriew_min"></div>
                        <div id ="retriew_dept"></div>
                        <div id ="retriew_zonal"></div>


                        <!--========================================================== Create  Ministries - start ================================================================-->
                        <section id="ministry_sec" >
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen addministry" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                        <div class="card">
                                            <!--[Panel - Start]-->   
                                            <div class="panel panel-info">
                                                <!--[Panel Heading - Start]-->  
                                                <div class="panel-heading"style="background: Blue;">
                                                    <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Add /Edit Ministries</div>
                                                    <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                        <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                    </div>
                                                </div>  
                                                <!--[Panel Heading - End]-->  

                                                <!--[Panel Body - Start]-->  
                                                <div class="panel-body" >
                                        >
                                                    <form  class="form-horizontal addmin_Form" role="form"   >
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ministry Id</label>
                                                            <div class="col-12 col-sm-8 col-lg-6">

                                                                <select type="text" class="form-control addmin_Form min_id_select" id="min_id_select" onmouseout = "selectidmin()">
                                                                    <?php
                                                                    if (isset($_SESSION["me_accss_level"])) {
                                                                        $sql = null;
                                                                        if ($uleveldis == '1269_mt') {
                                                                            $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min`  ORDER BY `min_name` ";
                                                                        } else if ($uleveldis == '1548_sa') {
                                                                            $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` =  '$province' ORDER BY `min_name` ";
                                                                        } else if ($uleveldis == '1658_pa') {
                                                                            $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min`WHERE `province_Code` =  'null'  ORDER BY `min_name`";
                                                                        } else if ($uleveldis == '2753_ps') {
                                                                            $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min`WHERE `province_Code` =  'null'  ORDER BY `min_name`";
                                                                        }
                                                                        if ($db->getresultset($sql)) {
                                                                            $result = $db->getresultset($sql);
                                                                            while ($erow2 = $result->fetch_assoc()) {
                                                                                ?>
                                                                                <option value=<?php echo $erow2["min_ID"]; ?> ><?php echo $erow2["min_ID"]; ?> - <?php echo $erow2["min_name"]; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-12 col-sm-8 col-lg-2">
                                                                <input class="form-control addmin_Form min_id" id="min_id"data-parsley-type="digits" type="text" style="border: 0px" placeholder="Ministry ID"disabled><a href="#"><span  class="badge badge-secondary" onclick="newaddmin();">New</span> </a>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Ministry Name</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addmin_Form min_name" id="min_name"data-parsley-type="digits" type="text"  placeholder="Ministry Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name of Head</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addmin_Form min_hedname" id="min_hedname"data-parsley-type="digits" type="text"  placeholder="Name of Head" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addmin_Form min_address" id="min_address"data-parsley-type="digits" type="text"  placeholder="Address" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Vote</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addmin_Form min_vote" id="min_vote"data-parsley-type="digits" type="text"  placeholder="Vote" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                                            <div class="col-12 col-sm-8 col-lg-4">
                                                                <input class="form-control addmin_Form min_contact"  id="min_contact"data-parsley-type="digits" type="text" placeholder="Contact">
                                                            </div>
                                                        </div>
                                                                    <div style="display:none" class="alert alert-danger Signup_Alert">
                                                        <p>Error:</p>
                                                    </div
                                                        <div class="form-group row text-right">
                                                            <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                                <button type="button" class="btn btn-info addminis_Btn" style="background: Blue;">Submit</button>
                                                                <button class="btn btn-info" style="background: Blue;" menuid="exit"> <a class=" ScreenMenu " style="color: #ffffff;"  menuid="exit"  href="#">Cancel</a></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <?php
                                                include './getform/getmin_tbl.php';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>  
                        </section>
                        <!--===================================== Create Ministries - end =========================-->



                        <!--========================================================== Create  Department - start ================================================================-->
                        <section id="deprmt_sec" >
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen adddepartment" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                        <div class="card">
                                            <!--[Panel - Start]-->   
                                            <div class="panel panel-info">
                                                <!--[Panel Heading - Start]-->  
                                                <div class="panel-heading"style="background: Blue;">
                                                    <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Add /Edit Department</div>
                                                    <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                        <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                    </div>
                                                </div>  
                                                <!--[Panel Heading - End]-->  

                                                <!--[Panel Body - Start]-->  
                                                <div class="panel-body" >
                                       
                                                    <form  class="form-horizontal adddepr_Form" role="form"   >
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Department Id</label>
                                                            <div class="col-12 col-sm-8 col-lg-6">

                                                                <select type="text" class="form-control adddepr_Form dept_id_select" id="dept_id_select" onmouseout = "selectiddept()">
                                                                    <?php
                                                                    if (isset($_SESSION["me_accss_level"])) {
                                                                        $sql = null;
                                                                        if ($uleveldis == '1269_mt') {
                                                                            $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`  ORDER BY `dept_name` ";
                                                                        } else if ($uleveldis == '1548_sa') {
                                                                            $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department` WHERE `province_code` =  '$province' ORDER BY `dept_name` ";
                                                                        } else if ($uleveldis == '1658_pa') {
                                                                            $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`WHERE `province_code` = '$province' AND  `dept_id` =  '$district_offce' ORDER BY `dept_name`";
                                                                        } else if ($uleveldis == '2753_ps') {
                                                                            $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`WHERE `province_code` =  'null' ";
                                                                        }
                                                                        if ($db->getresultset($sql)) {
                                                                            $result = $db->getresultset($sql);
                                                                            while ($erow2 = $result->fetch_assoc()) {
                                                                                ?>
                                                                                <option value=<?php echo $erow2["dept_id"]; ?> ><?php echo $erow2["dept_id"]; ?> - <?php echo $erow2["dept_name"]; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    echo $sql;
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-12 col-sm-8 col-lg-2">
                                                                <input class=" form-control  adddepr_Form dept_id" id="dept_id" data-parsley-type="digits" type="text" style="border: 0px" placeholder="Department ID" disabled ><a href="#"><span class="badge badge-secondary" onclick="newadddept();">New</span></a>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Department Name</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control adddepr_Form dept_name" id="dept_name"data-parsley-type="digits" type="text"  placeholder="Department Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control adddepr_Form dept_address" id="dept_address"data-parsley-type="digits" type="text"  placeholder="Address" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name of Head</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control adddepr_Form dept_hedname" id="dept_hedname"data-parsley-type="digits" type="text"  placeholder="Name of Head" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Vote</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control adddepr_Form dept_vote" id="dept_vote"data-parsley-type="digits" type="text"  placeholder="Vote" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                                            <div class="col-12 col-sm-8 col-lg-4">
                                                                <input class="form-control adddepr_Form dept_contact"  id="dept_contact"data-parsley-type="digits" type="text" placeholder="Contact">
                                                            </div>
                                                        </div>
                                                                     <div style="display:none" class="alert alert-danger Signup_Alert">
                                                        <p>Error:</p>
                                                    </div>
                                                        <div class="form-group row text-right">
                                                            <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                                <button type="button" class="btn btn-info adddept_Btn" style="background: Blue;">Submit</button>
                                                                <button class="btn btn-info" style="background: Blue;" menuid="exit"> <a class=" ScreenMenu " style="color: #ffffff;"  menuid="exit"  href="#">Cancel</a></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    include './getform/getdepartment_tbl.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                        </section>
                        <!--===================================== Create Department - end =========================-->


                        <!--========================================================== Create  Zonal office - start ================================================================-->
                        <section id="Zonal_sec" >
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen addzonaloff" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                        <div class="card">
                                            <!--[Panel - Start]-->   
                                            <div class="panel panel-info">
                                                <!--[Panel Heading - Start]-->  
                                                <div class="panel-heading"style="background: Blue;">
                                                    <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Add /Edit Zonal Office</div>
                                                    <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                        <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                    </div>
                                                </div>  
                                                <!--[Panel Heading - End]-->  

                                                <!--[Panel Body - Start]-->  
                                                <div class="panel-body" >
                                          
                                                    <form  class="form-horizontal addoffice_Form" role="form"   >
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Zonal Office Id</label>
                                                            <div class="col-12 col-sm-8 col-lg-6">

                                                                <select type="text" class="form-control addoffice_Form zonal_id_select" id="zonal_id_select" onmouseout = "selectidzonal()">
                                                                    <?php
                                                                    if (isset($_SESSION["me_accss_level"])) {
                                                                        $sql = null;
                                                                        if ($uleveldis == '1269_mt') {
                                                                            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce`  ORDER BY `zonal_name` ";
                                                                        } else if ($uleveldis == '1548_sa') {
                                                                            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce` WHERE `Province_code` =  '$province' ORDER BY `zonal_name` ";
                                                                        } else if ($uleveldis == '1658_pa') {
                                                                            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce`WHERE `Province_code` =  '$province' AND `min_id` =  '$ministry'  AND `dept_id` =  '$district_offce' ORDER BY `zonal_name`";
                                                                        } else if ($uleveldis == '2753_ps') {
                                                                            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce`WHERE `Province_code` =  '$province' AND `min_id` =  '$ministry'  AND `dept_id` =  '$district_offce' AND `znal_id` =  '$divi_offce' ORDER BY `zonal_name`";
                                                                        }
                                                                        if ($db->getresultset($sql)) {
                                                                            $result = $db->getresultset($sql);
                                                                            while ($erow2 = $result->fetch_assoc()) {
                                                                                ?>
                                                                                <option value=<?php echo $erow2["znal_id"]; ?> ><?php echo $erow2["znal_id"]; ?> - <?php echo $erow2["zonal_name"]; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-8 col-lg-2">
                                                                <input class=" form-control  addoffice_Form zonal_id" id="zonal_id" data-parsley-type="digits" type="text" style="border: 0px" placeholder="Iffice ID" disabled><a href="#"><span class="badge badge-secondary" onclick="newaddzone();">New</span></a>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Zonal Office Name</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addoffice_Form office_name" id="office_name"data-parsley-type="digits" type="text"  placeholder="Office Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addoffice_Form office_address" id="office_address"data-parsley-type="digits" type="text"  placeholder="Address" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name of Head</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addoffice_Form office_hedname" id="office_hedname"data-parsley-type="digits" type="text"  placeholder="Name of Head" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Vote</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addoffice_Form office_vote" id="office_vote"data-parsley-type="digits" type="text"  placeholder="Vote" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                                            <div class="col-12 col-sm-8 col-lg-4">
                                                                <input class="form-control addoffice_Form office_contact"  id="office_contact"data-parsley-type="digits" type="text" placeholder="Contact">
                                                            </div>
                                                        </div>
                                                                  <div style="display:none" class="alert alert-danger Signup_Alert">
                                                        <p>Error:</p>
                                                    </div>
                                                        <div class="form-group row text-right">
                                                            <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                                <button type="button" class="btn btn-info addoffice_Btn" style="background: Blue;">Submit</button>
                                                                <button class="btn btn-info" style="background: Blue;" menuid="exit"> <a class=" ScreenMenu " style="color: #ffffff;"  menuid="exit"  href="#">Cancel</a></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    include './getform/getZonalOffice_tbl.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                        </section>
                        <!--===================================== Create Zonal office - end =========================-->
                        <!--========================================================== Create  meet Person - start ================================================================-->
                        <section id="Zonal_sec" >
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen addmeetperson" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                        <div class="card">
                                            <!--[Panel - Start]-->   
                                            <div class="panel panel-info">
                                                <!--[Panel Heading - Start]-->  
                                                <div class="panel-heading"style="background: Blue;">
                                                    <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> Add /Edit Meet Person</div>
                                                    <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                        <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                    </div>
                                                </div>  
                                                <!--[Panel Heading - End]-->  

                                                <!--[Panel Body - Start]-->  
                                                <div class="panel-body" >
                                
                                                    <form  class="form-horizontal addmtpon_Form" role="form"   >



                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name of person</label>
                                                            <div class="col-12 col-sm-8 col-lg-6">
                                                                <input class="form-control addmtpon_Form meet_name" id="meet_name"data-parsley-type="digits" type="text"  placeholder="Name of person" >
                                                            </div>
                                                            <div class="col-12 col-sm-8 col-lg-2">
                                                                <input class=" form-control  addmtpon_Form met_person_id" id="met_person_id" data-parsley-type="digits" type="text" style="border: 0px" placeholder="Meet person Id" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Designation</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <input class="form-control addmtpon_Form meet_desig" id="meet_desig"data-parsley-type="digits" type="text"  placeholder="Designation" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                                            <div class="col-12 col-sm-8 col-lg-4">
                                                                <input class="form-control addmtpon_Form meet_contact"  id="meet_contact"data-parsley-type="digits" type="text" placeholder="Contact">
                                                            </div>
                                                        </div>
                                                                            <div style="display:none" class="alert alert-danger Signup_Alert">
                                                        <p>Error:</p>
                                                    </div>
                                                        <div class="form-group row text-right">
                                                            <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                                <button type="button" class="btn btn-info addmtpson_Btn" style="background: Blue;">Submit</button>
                                                                <button class="btn btn-info" style="background: Blue;" menuid="exit"> <a class=" ScreenMenu " style="color: #ffffff;"  menuid="exit"  href="#">Cancel</a></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    include './getform/getmeetperson_tbl.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                        </section>
                        <!--===================================== Create meet Person - end =========================-->

                        <!--========================================================== Create  Institution Shoe - start ================================================================-->
                        <section id="allins_sec" >
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen addtable" style="display:none;margin-top:10px;margin-left: 10px; margin-right: 10px; "> 
                                        <div class="card">
                                            <!--[Panel - Start]-->   
                                            <div class="panel panel-info">
                                                <!--[Panel Heading - Start]-->  
                                                <div class="panel-heading"style="background: Blue;">
                                                    <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/insti.png" alt="image"width="30px"height="30px"> All Institutions</div>
                                                    <<div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                        <a class=" ScreenMenu " style="color: #ffffff;" menuid="exittbl"  href="#">Exit</a>
                                                    </div>
                                                </div>  
                                                <!--[Panel Heading - End]-->  

                                                <!--[Panel Body - Start]-->  
                                                <div class="panel-body" >
                                                    <div class="row">
                                                        <!-- ============================================================== -->
                                                        <!-- basic table  -->
                                                        <!-- ============================================================== -->
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <div class="card">
                                                                <!--<h5 class="card-header">Last Visits</h5>-->
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered first">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Mini-ID</th>
                                                                                    <th>Mini Name</th>
                                                                                    <th>Mini Address</th>
                                                                                    <th>Head Of Mini</th>
                                                                                    <th>Mini Vote</th>
                                                                                    <th>Mini contact</th>
                                                                                    <th>Dept  ID</th>
                                                                                    <th>Dept Name  </th>
                                                                                    <th>Dept  Address</th>
                                                                                    <th>Head of Dept</th>
                                                                                    <th>Dept Votes  </th>
                                                                                    <th>Dept Contact  </th>
                                                                                    <th>Zonal ID  </th>
                                                                                    <th>Zonal Name  </th>
                                                                                    <th>Zonal Address  </th>
                                                                                    <th>Head of Zonal Office  </th>
                                                                                    <th>Zonal Votes  </th>
                                                                                    <th>Zonal Contact  </th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php
                                                                                $sqld = null;

                                                                                $sqld = "SELECT M.min_ID,M.min_name,M.address,M.head_of_min,M.head_vote,M.contact,D.dept_id,D.dept_name,D.address,D.hesd_of_dept,D.head_vote,D.contact,Z.znal_id,Z.zonal_name,Z.address,Z.head_of_zonaloff,Z.head_vote,Z.contact FROM tbl_min AS M INNER JOIN tbl_department AS D ON M.min_ID = D.min_id LEFT JOIN tbl_zonal_offce as Z ON D.dept_id = Z.dept_id ORDER BY M.min_ID, D.dept_id, Z.znal_id;";



                                                                                if ($db->getresultset($sqld)) {
                                                                                    $result = $db->getresultset($sqld);
                                                                                    while ($erow2 = $result->fetch_assoc()) {
                                                                                        $min_ID = $erow2["min_ID"];
                                                                                        $min_name = $erow2["min_name"];
                                                                                        $address = $erow2["address"];
                                                                                        $head_of_min = $erow2["head_of_min"];
                                                                                        $head_vote = $erow2["head_vote"];
                                                                                        $contact = $erow2["contact"];
                                                                                        $dept_id = $erow2["dept_id"];
                                                                                        $dept_name = $erow2["dept_name"];
                                                                                        $dept_address = $erow2["address"];
                                                                                        $hesd_of_dept = $erow2["hesd_of_dept"];
                                                                                        $head_vote = $erow2["head_vote"];
                                                                                        $deptcontact = $erow2["contact"];
                                                                                        $znal_id = $erow2["znal_id"];
                                                                                        $zonal_name = $erow2["zonal_name"];
                                                                                        $zonal_iaddress = $erow2["address"];
                                                                                        $znal_of_zonaloff = $erow2["head_of_zonaloff"];
                                                                                        $znal_head_vote = $erow2["head_vote"];
                                                                                        $znal_contact = $erow2["contact"];
                                                                                        ?>
                                                                                        <tr>
                                                                                            <th style ="text-align: left;" ><?php echo $min_ID ?> </th>
                                                                                            <td style ="text-align: left;"><?php echo $min_name ?></td>
                                                                                            <td style ="text-align: left;"><?php echo $dept_name ?></td>
                                                                                            <td style ="text-align: left;"><?php echo $address ?></td>
                                                                                            <td style = "text-align: left;"><?php echo $head_of_min ?></td>
                                                                                            <td style = "text-align: left;"><?php echo $head_vote ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $dept_id ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $dept_name ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $dept_address ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $hesd_of_dept ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $head_vote ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $deptcontact ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $znal_id ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $zonal_name ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $zonal_iaddress ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $znal_of_zonaloff ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $znal_head_vote ?></td>
                                                                                            <td style = "text-align: center;"><?php echo $znal_contact ?></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>Mini-ID</th>
                                                                                    <th>Mini Name</th>
                                                                                    <th>Mini Address</th>
                                                                                    <th>Head Of Mini</th>
                                                                                    <th>Mini Vote</th>
                                                                                    <th>Mini contact</th>
                                                                                    <th>Dept  ID</th>
                                                                                    <th>Dept Name  </th>
                                                                                    <th>Dept  Address</th>
                                                                                    <th>Head of Dept</th>
                                                                                    <th>Dept Votes  </th>
                                                                                    <th>Dept Contact  </th>
                                                                                    <th>Zonal ID  </th>
                                                                                    <th>Zonal Name  </th>
                                                                                    <th>Zonal Address  </th>
                                                                                    <th>Head of Zonal Office  </th>
                                                                                    <th>Zonal Votes  </th>
                                                                                    <th>Zonal Contact  </th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ============================================================== -->
                                                        <!-- end basic table  -->
                                                        <!-- ============================================================== -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>  
                        </section>
                        <!--===================================== Create institution - end =========================-->



                        <!--<div id="min_tbl"></div>-->



                        <?php
                        include './footer.php';
                        ?>
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
                        <script src="assets/vendor/chart.js/chart.umd.js"></script>
                        <script src="assets/vendor/echarts/echarts.min.js"></script>
                        <script src="assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>


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
                                                                    var table = document.getElementById('tblmin');
                                                                    for (var i = 1; i < table.rows.length; i++) {
                                                                        table.rows[i].onclick = function()
                                                                        {
                                                                            document.getElementById("min_id_select").value = this.cells[0].innerHTML;
                                                                            document.getElementById("min_id").value = this.cells[0].innerHTML;
                                                                            document.getElementById("min_name").value = this.cells[2].innerHTML;
                                                                            document.getElementById("min_address").value = this.cells[3].innerHTML;
                                                                            document.getElementById("min_hedname").value = this.cells[4].innerHTML;
                                                                            document.getElementById("min_vote").value = this.cells[5].innerHTML;
                                                                            document.getElementById("min_contact").value = this.cells[6].innerHTML;
                                                                        };
                                                                    }
                        </script>                        
                        <script>
                            var table = document.getElementById('tbldept');
                            for (var i = 1; i < table.rows.length; i++) {
                                table.rows[i].onclick = function()
                                {
                                    document.getElementById("dept_id").value = this.cells[1].innerHTML;
                                    document.getElementById("dept_id_select").value = this.cells[1].innerHTML;
                                    document.getElementById("dept_name").value = this.cells[2].innerHTML;
                                    document.getElementById("dept_address").value = this.cells[3].innerHTML;
                                    document.getElementById("dept_hedname").value = this.cells[4].innerHTML;
                                    document.getElementById("dept_vote").value = this.cells[5].innerHTML;
                                    document.getElementById("dept_contact").value = this.cells[6].innerHTML;
                                };
                            }
                        </script>

                        <script>
                            var table = document.getElementById('tblzonallbl');
                            for (var i = 1; i < table.rows.length; i++) {
                                table.rows[i].onclick = function()
                                {
                                    document.getElementById("zonal_id").value = this.cells[2].innerHTML;
                                    document.getElementById("zonal_id_select").value = this.cells[2].innerHTML;
                                    document.getElementById("office_name").value = this.cells[3].innerHTML;
                                    document.getElementById("office_address").value = this.cells[4].innerHTML;
                                    document.getElementById("office_hedname").value = this.cells[5].innerHTML;
                                    document.getElementById("office_vote").value = this.cells[6].innerHTML;
                                    document.getElementById("office_contact").value = this.cells[7].innerHTML;
                                };
                            }
                        </script>


                        <script>
                            var table = document.getElementById('tblmeetperson');
                            for (var i = 1; i < table.rows.length; i++) {
                                table.rows[i].onclick = function()
                                {
                                    document.getElementById("met_person_id").value = this.cells[0].innerHTML;
                                    document.getElementById("meet_name").value = this.cells[2].innerHTML;
                                    document.getElementById("meet_desig").value = this.cells[3].innerHTML;
                                    document.getElementById("meet_contact").value = this.cells[4].innerHTML;

                                };
                            }
                        </script>
                        <script>
                            function selectidmin() {
                                var selectmnid = document.getElementById("min_id_select").value;
                                document.getElementById("min_id").value = selectmnid;

                            }

                        </script>

                        <script>
                            function selectiddept() {
                                var selectmnid = document.getElementById("dept_id_select").value;
                                document.getElementById("dept_id").value = selectmnid;

                            }
                        </script>

                        <script>
                            function selectidzonal() {
                                var selectmnid = document.getElementById("zonal_id_select").value;
                                document.getElementById("zonal_id").value = selectmnid;

                            }
                        </script>


                        <?php
                        if (isset($_SESSION["me_accss_level"])) {

                            if ($uleveldis == '1269_mt') {
                                echo " <script> function newaddmin() {"
                                . "$('#min_id').prop('disabled', false); "
                                . "$('#dept_id').prop('disabled', false); "
                                . "$('#zonal_id').prop('disabled', false); "
                                . "}</script>";
                                echo " <script> function newadddept() {"
                                . "$('#min_id').prop('disabled', false); "
                                . "$('#dept_id').prop('disabled', false); "
                                . "$('#zonal_id').prop('disabled', false); "
                                . "}</script>";
                                echo " <script> function newaddzone() {"
                                . "$('#min_id').prop('disabled', false); "
                                . "$('#dept_id').prop('disabled', false); "
                                . "$('#zonal_id').prop('disabled', false); "
                                . "}</script>";
                            }
                        }
                        ?>

                        <script>
                            $(document).ready(function($) {
                                //--->Enter key press - Start

                                //--->Enter key press - End

                                $(document).on('click', '.min_name', function(e) {

//        var str = $('.seachl_Id');
                                    var str = document.getElementById("min_id_select").value;

                                    bs.ClearError();
                                    if (frm.IsEmpty(str)) {
//                                        alert("Please enter Correct ID")
                                        //Show alert
                                    }

                                    if (str == "") {
                                        document.getElementById("retriew_min").innerHTML = "";
                                        return;
                                    } else {

                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("retriew_min").innerHTML = this.responseText;
                                            }
                                        };
                                        // document.getElementById("refcode").value = str;
                                        xmlhttp.open("GET", "./getform/getretriew_min.php?q=" + str, true);
                                        xmlhttp.send();

                                        document.getElementById("min_id").value = document.getElementById("min_id_rtv").value;
                                        document.getElementById("min_name").value = document.getElementById("min_name_rtv").value;
                                        document.getElementById("min_address").value = document.getElementById("min_addresss_rtv").value;
                                        document.getElementById("min_hedname").value = document.getElementById("min_head_of_min_rtv").value;
                                        document.getElementById("min_vote").value = document.getElementById("min_head_vote_rtv").value;
                                        document.getElementById("min_contact").value = document.getElementById("min_contact_rtv").value;


                                    }
                                });
                            });
                        </script>

                        <script>
                            $(document).ready(function($) {
                                //--->Enter key press - Start

                                //--->Enter key press - End

                                $(document).on('click', '.dept_name', function(e) {

                                    //        var str = $('.seachl_Id');
                                    var str = document.getElementById("dept_id_select").value;

                                    bs.ClearError();
                                    if (frm.IsEmpty(str)) {
                                        //                                        alert("Please enter Correct ID")
                                        //Show alert
                                    }

                                    if (str == "") {
                                        document.getElementById("retriew_dept").innerHTML = "";
                                        return;
                                    } else {

                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("retriew_dept").innerHTML = this.responseText;
                                            }
                                        };
                                        // document.getElementById("refcode").value = str;
                                        xmlhttp.open("GET", "./getform/getretriew_dep.php?q=" + str, true);
                                        xmlhttp.send();

                                        document.getElementById("dept_id").value = document.getElementById("dept_id_rtv").value;
                                        document.getElementById("dept_name").value = document.getElementById("dept_name_rtv").value;
                                        document.getElementById("dept_address").value = document.getElementById("dept_addresss_rtv").value;
                                        document.getElementById("dept_hedname").value = document.getElementById("dept_head_of_min_rtv").value;
                                        document.getElementById("dept_vote").value = document.getElementById("dept_head_vote_rtv").value;
                                        document.getElementById("dept_contact").value = document.getElementById("dept_contact_rtv").value;


                                    }
                                });
                            });
                        </script>
                        <script>
                            $(document).ready(function($) {
                                $(document).on('click', '.office_name', function(e) {

                                    var str = document.getElementById("zonal_id_select").value;

                                    bs.ClearError();
                                    if (frm.IsEmpty(str)) {
                                        //                                        alert("Please enter Correct ID")
                                        //Show alert
                                    }

                                    if (str == "") {
                                        document.getElementById("retriew_zonal").innerHTML = "";
                                        return;
                                    } else {

                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("retriew_zonal").innerHTML = this.responseText;
                                            }
                                        };
                                        // document.getElementById("refcode").value = str;
                                        xmlhttp.open("GET", "./getform/getretriew_zonal.php?q=" + str, true);
                                        xmlhttp.send();

//                                        document.getElementById("zonal_id").value = document.getElementById("zonal_id_rtv").value;
                                        document.getElementById("office_name").value = document.getElementById("zonal_name_rtv").value;
                                        document.getElementById("office_address").value = document.getElementById("zonal_addresss_rtv").value;
                                        document.getElementById("office_hedname").value = document.getElementById("zonal_head_of_min_rtv").value;
                                        document.getElementById("office_vote").value = document.getElementById("zonal_head_vote_rtv").value;
                                        document.getElementById("office_contact").value = document.getElementById("dzonal_contact_rtv").value;



                                    }
                                });
                            });
                        </script>



                        </body>

                        </html>

