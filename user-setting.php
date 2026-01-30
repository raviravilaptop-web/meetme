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
    $UserID = $_SESSION['me_user_id'];
    $uleveldis = $_SESSION["me_accss_level"];
    $user_status = $_SESSION["me_status"];
    $user_acess = $_SESSION["me_access"];
}

$userdetails = null;
$$userdetails = "SELECT `id`, `user_id`, `user_name`, `user_email`, `user_password`, `phone`, `address`, `offce_type`, `accss_level`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_status`, `code`, `rec_dttm`, `access` FROM `user_log` WHERE `user_id` ='$UserID' ";
$RecData = $db->select($$userdetails);
if (!$RecData) {
    $Result = array('status' => 'error',
        'Msg' => 'No User Information Found',
    );
    echo json_encode($Result);
    exit();
} elseif ($RecData) {
    $user_id = $RecData[0]['user_id'];
    $user_name = $RecData[0]['user_name'];
    $user_email = $RecData[0]['user_email'];
    $phone = $RecData[0]['phone'];
    $address = $RecData[0]['address'];
    $offce_type = $RecData[0]['offce_type'];
    $accss_level = $RecData[0]['accss_level'];
    $ministry = $RecData[0]['ministry'];
    $district_offce = $RecData[0]['district_offce'];
    $divi_offce = $RecData[0]['divi_offce'];
}
$ministry = null;
$ministry = "SELECT `min_name` FROM `tbl_min` WHERE `min_ID` ='$ministry' ";
$RecData = $db->select($ministry);
if ($RecData) {
    $minname = $RecData[0]['min_name'];
} else {
    $minname = null;
}
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
        <script type="text/javascript" src="./login_system/js/signup.js"></script>
        <script type="text/javascript" src="./login_system/js/addclient.js"></script>
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
                <div class="influence-profile">
                    <div class="container-fluid dashboard-content ">
                        <!-- ============================================================== -->
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
                                                <li class="breadcrumb-item active" aria-current="page">User Setting</li>
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
                        <!-- content -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- profile -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- card profile -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="user-avatar text-center d-block">
                                            <img src="./images/icons/user.png" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        </div>
                                        <div class="text-center">
                                            <h2 class="font-24 mb-0"><?php echo $user_name ?></h2>
                                            <p><?php echo $address ?></p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Contact Information</h3>
                                        <div class="">
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $user_email ?></li>
                                                <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $phone ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--                                <div class="card-body border-top">
                                                                        <h3 class="font-16">Rating</h3>
                                                                        <h1 class="mb-0">4.8</h1>
                                                                        <div class="rating-star">
                                                                            <i class="fa fa-fw fa-star"></i>
                                                                            <i class="fa fa-fw fa-star"></i>
                                                                            <i class="fa fa-fw fa-star"></i>
                                                                            <i class="fa fa-fw fa-star"></i>
                                                                            <i class="fa fa-fw fa-star"></i>
                                                                            <p class="d-inline-block text-dark">14 Reviews </p>
                                                                        </div>
                                                                    </div>-->
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Work Station</h3>
                                        <div class="">
                                            <ul class="mb-0 list-unstyled">
                                                <li class="mb-1"><a href="#"><i class="fab fa-fw fa-home-square mr-1 facebook-color"></i><?php echo $insName ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Ministry</h3>
                                        <div class="">
                                            <ul class="mb-0 list-unstyled">
                                                <li class="mb-1"><a href="#"><i class="fab fa-fw fa-home-square mr-1 facebook-color"></i><?php echo $minname ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="font-16">Category</h3>
                                        <div>
                                            <a href="#">AccessType: <?php echo $offce_type ?></a><br>
                                            <?php
                                            if ($accss_level == "1269_mt") {
                                                $al = "Province Admin";
                                            } else if ($accss_level == "1548_sa") {
                                                $al = "Ministry Admin";
                                            } else if ($accss_level == "1658_pa") {
                                                $al = "Department Admin";
                                            } else if ($accss_level == "2753_ps") {
                                                $al = "User";
                                            }
                                            ?>         
                                            <a href="#">Access Level: <?php echo $al ?></a><br>
                                            <a href="#">user Id: <?php echo $UserID ?></a><br>
                                            <a href="#">user Status: <?php echo $user_status ?></a><br>
                                            <a href="#">user Access: <?php echo $user_acess ?></a>

                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end card profile -->
                                <!-- ============================================================== -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- end profile -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- campaign data -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- campaign tab one -->
                                <!-- ============================================================== -->
                                <div class="influence-profile-content pills-regular">
                                    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">General Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Change Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <?php if ($uleveldis == '1269_mt') { ?>
                                                <!--<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-singup" role="tab" aria-controls="pills-singup" aria-selected="false">Sing UP</a>-->
                                            <?php } ?>
                                        </li>
                                        <li class="nav-item">
                                            <!--<a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Send Messages</a>-->
                                        </li>
                                    </ul>

                                    <!--=======================================user Update start===================================================-->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                            <section id="changepass">
                                            <div class="card">
                                                <!--[Panel - Start]-->   
                                                <div class="panel panel-info">
                                                    <!--[Panel Heading - Start]-->  
                                                    <div class="panel-heading"style="background: Blue;">
                                                        <div class="panel-title" style="color: #ffffff;">  <i class="fas fa-fw fa-user mr-2"></i>User Information</div>
                                                        <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                            <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                        </div>
                                                    </div>  
                                                    <!--[Panel Heading - End]-->  

                                                    <!--[Panel Body - Start]-->  
                                                    <div class="panel-body" >


                                                        <!--[Sign Up Form - Start]-->
                                                        <form  class="form-horizontal SignupUpdate_Form" role="form"   >
                                                            <!--[Sign Up User Name - Start]-->
                                                            <div class="form-group">
                                                                <label for="username" class="col-md-3 control-label">Name</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control SignupUpdate_Form Signup_UserName" placeholder="Name" value="<?php echo $user_name ?>">
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up User Name - End]-->

                                                            <!--[Sign Up User ID - Start]-->
                                                            <div class="form-group">
                                                                <label hidden for="userid" class="col-md-3 control-label">User ID</label>
                                                                <div class="col-md-9">
                                                                    <input hidden type="text" class="form-control SignupUpdate_Form Signup_UserID" placeholder="User ID" value="<?php echo $user_id ?>">
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up User ID - End]-->

                                                            <!--[Sign Up Email - Start]-->
                                                            <div class="form-group">
                                                                <label for="email" class="col-md-3 control-label">Email</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control SignupUpdate_Form Signup_Email" placeholder="Email Address" value="<?php echo $user_email ?>">
                                                                </div>
                                                            </div>         
                                                            <!--[Sign Up Email - End]-->

                                                            <!--[Sign Up Email - Start]-->
                                                            <div class="form-group">
                                                                <label for="phone" class="col-md-3 control-label">Phone</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control SignupUpdate_Form Signup_phone" placeholder="Phone" value="<?php echo $phone ?>">
                                                                </div>
                                                            </div>         
                                                            <!--[Sign Up Email - End]-->

                                                            <!--[Sign Up Email - Start]-->
                                                            <div class="form-group">
                                                                <label for="address" class="col-md-3 control-label">Address</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control SignupUpdate_Form Signup_address" placeholder="Address" value="<?php echo $address ?>">
                                                                </div>
                                                            </div>         
                                                            <div style="display:none" class="alert alert-danger Signup_Alert">
                                                                <p>Error:</p>
                                                            </div>
                                                            <!--[Sign Up Button - Start]-->
                                                            <div class="form-group">  						                                        
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button  type="button" class="btn btn-info Signupupdate_Btn"style="background: Blue;"> Update</button>
                                                                    <a class="ScreenMenu" menuid="exit" href="./dashboard.php"  >  <button type="button"class="btn btn-info " style="background: Blue;"> Cancel</button>
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up Button - End]-->
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
</section>
                                        <!--=======================================user Update end===============================================-->


                                        <!--=======================================change Password  start===================================================-->

                                        <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                            <section id="changepass">
                                                <div class="card">
                                                    <!--[Panel - Start]-->   
                                                    <div class="panel panel-info">
                                                        <!--[Panel Heading - Start]-->  
                                                        <div class="panel-heading"style="background: Blue;">
                                                            <div class="panel-title" style="color: #ffffff;"> <i class="fas fa-fw fa-key mr-2"></i> Change Password</div>
                                                            <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                                <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                            </div>
                                                        </div>  
                                                        <!--[Panel Heading - End]-->  

                                                        <!--[Panel Body - Start]-->  
                                                        <div class="panel-body" >

                                                            <form  class="form-horizontal changepass_Form" role="form"   >



                                                                <div class="form-group row">
                                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Current Password</label>
                                                                    <div class="col-12 col-sm-8 col-lg-6">
                                                                        <input class="form-control changepass_Form cpassword" id="cpassword"data-parsley-type="digits" type="password"  placeholder="Current Password" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">New password</label>
                                                                    <div class="col-12 col-sm-8 col-lg-8">
                                                                        <input class="form-control changepass_Form newpasswrd" id="newpasswrd"data-parsley-type="digits" type="password"  placeholder="New password" >
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Re Type Password</label>
                                                                    <div class="col-12 col-sm-8 col-lg-4">
                                                                        <input class="form-control changepass_Form renewpasswrd"  id="renewpasswrd"data-parsley-type="digits" type="password" placeholder="Re Type Password">
                                                                    </div>
                                                                </div>
                                                                <div style="display:none" class="alert alert-danger Signup_Alert">
                                                                    <p>Error:</p>
                                                                </div>
                                                                <div class="form-group row text-right">
                                                                    <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                                        <button type="button" class="btn btn-info changepass_Btn" style="background: Blue;">Update</button>
                                                                        <button class="btn btn-info" style="background: Blue;" menuid="exit"> <a class=" ScreenMenu " style="color: #ffffff;"  menuid="exit"  href="#">Cancel</a></button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div> 
                                            </section>
                                        </div>
                                        <!--===============================================change Password end ============================================-->

                                        <!--=======================================singup  start===================================================-->

                                        <div class="tab-pane fade" id="pills-singup" role="tabpanel" aria-labelledby="pills-packages-tab">
                                            <section id="changepass">
                                                <div class="card">
                                                    <!--[Panel - Start]-->   
                                                    <div class="panel panel-info">
                                                        <!--[Panel Heading - Start]-->  
                                                        <div class="panel-heading"style="background: Blue;">
                                                            <div class="panel-title" style="color: #ffffff;"> <i class="fas fa-fw fa-key mr-2"></i> User Singup Setting</div>
                                                            <div style="float:right; font-size: 100%; position: relative; top:-25px; right: 20px; ">
                                                                <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                            </div>
                                                        </div>  
                                                        <!--[Panel Heading - End]-->  

                                                        <!--[Panel Body - Start]-->  
                                                        <div class="panel-body" >

                                                            <div class=" col-sm-4 ">
                                                                <form  class="input-group input-search">
                                                                    <input class="form-control " id ="profile_nicn" name ="profile_nicn"type="text" placeholder="NIC No"><span class="input-group-btn">
                                                                        <button  class="btn btn-secondary"  id="profile_serchid" name="profile_serchid"value="Profile_serchid" type="button"><i class="fas fa-search"></i></button></span>
                                                                </form>
                                                            </div>

                                                            <!--[Sign Up User Name - Start]-->
                                                            <div class="form-group">
                                                                <label for="username" class="col-md-3 control-label">Name</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control Signup_Frm Signup_UserName" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up User Name - End]-->

                                                            <!--[Sign Up User ID - Start]-->
                                                            <div class="form-group">
                                                                <label for="userid" class="col-md-3 control-label">User ID</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control Signup_Frm Signup_UserID" placeholder="User ID">
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up User ID - End]-->

                                                            <!--[Sign Up Email - Start]-->
                                                            <div class="form-group">
                                                                <label for="email" class="col-md-3 control-label">Email</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control Signup_Frm Signup_Email" placeholder="Email Address">
                                                                </div>
                                                            </div>         
                                                            <!--[Sign Up Email - End]-->

                                                            <!--[Sign Up Email - Start]-->
                                                            <div class="form-group">
                                                                <label for="phone" class="col-md-3 control-label">Phone</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control Signup_Frm Signup_phone" placeholder="Phone">
                                                                </div>
                                                            </div>         
                                                            <!--[Sign Up Email - End]-->

                                                            <!--[Sign Up Email - Start]-->
                                                            <div class="form-group">
                                                                <label for="address" class="col-md-3 control-label">Address</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control Signup_Frm Signup_address" placeholder="Address">
                                                                </div>
                                                            </div>         
                                                            <!--[Sign Up Email - End]-->
                                                            <hr>
                                                            <b> <h4 >Access Level</h4></b>
                                                            <hr>

                                                            <!--[Sign officetype - Start]-->
                                                            <div class="form-group">
                                                                <label for="accss_type" class="col-md-3 control-label">Office Type</label>
                                                                <div class="col-md-9">
                                                                    <select type="text" class="form-control Signup_Frm Signup_offce_type" placeholder="Office Type">
                                                                        <?php
                                                                        if (isset($_SESSION["me_accss_level"])) {
                                                                            if ($uleveldis == '1269_mt') {
                                                                                ?>
                                                                                <option value="meetme" >Province</option>
                                                                                <option value="min" >Ministry Office</option>
                                                                                <option value="dept" >Department office</option>
                                                                                <option value="zoffce" >Zonal Office </option>
                                                                                <?php
                                                                            } else if ($uleveldis == '1548_sa') {
                                                                                ?>
                                                                                <option value="min" >Ministry Office</option>
                                                                                <option value="dept" >Department office</option>
                                                                                <option value="zoffce" >Zonal Office </option>
                                                                                <?php
                                                                            } else if ($uleveldis == '1658_pa') {
                                                                                ?>
                                                                                <option value="dept" >Department office </option>
                                                                                <option value="zoffce" >Zonal Office </option>

                                                                                <?php
                                                                            } else if ($uleveldis == '2753_ps') {
                                                                                ?>
                                                                                <option value="zoffce" >Zonal Office </option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>         
                                                            <!--[Sign Up access - End]-->
                                                            <!--[Sign access - Start]-->
                                                            <div class="form-group">
                                                                <label for="accss_level" class="col-md-3 control-label">Access Level</label>
                                                                <div class="col-md-9">
                                                                    <select type="text" class="form-control Signup_Frm Signup_accss_level" placeholder="Access Level">
                                                                        <?php
                                                                        if (isset($_SESSION["me_accss_level"])) {
                                                                            if ($uleveldis == '1269_mt') {
                                                                                ?>
                                                                                <option value="1269_mt" >Province Admin</option>
                                                                                <option value="1548_sa" >Ministry Admin </option>
                                                                                <option value="1658_pa" >Department Admin </option>
                                                                                <option value="2753_ps" >User </option>
                                                                                <?php
                                                                            } else if ($uleveldis == '1548_sa') {
                                                                                ?>
                                                                                <option value="1548_sa" >Ministry Admin </option>
                                                                                <option value="1658_pa" >Department Admin </option>
                                                                                <option value="2753_ps" >User </option>
                                                                                <?php
                                                                            } else if ($uleveldis == '1658_pa') {
                                                                                ?>
                                                                                <option value="1658_pa" >Department Admin </option>
                                                                                <option value="2753_ps" >User </option>

                                                                                <?php
                                                                            } else if ($uleveldis == '2753_ps') {
                                                                                ?>
                                                                                <option value="2753_ps" >User </option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>         
                                                            <?php
                                                            if ($uleveldis == '1269_mt') {
                                                                echo "<div id ='getpro'></div>" .
                                                                "<div id ='getmin'></div>" .
                                                                "<div id='getdept'></div>" .
                                                                "<div id='getzonalo'></div>";
                                                            } else if ($uleveldis == '1548_sa') {
                                                                echo "<div id ='getpro'></div>" .
                                                                "<div id ='getmin'></div>" .
                                                                "<div id='getdept'></div>" .
                                                                "<div id='getzonalo'></div>";
                                                            } else if ($uleveldis == '1658_pa') {
                                                                echo "<div id ='getpro'></div>" .
                                                                "<div id ='getmin'></div>" .
                                                                "<div id='getdept'></div>" .
                                                                "<div id='getzonalo'></div>";
                                                            } else if ($uleveldis == '2753_ps') {
                                                                echo "<div id ='getpro'></div>" .
                                                                "<div id ='getmin'></div>" .
                                                                "<div id='getdept'></div>" .
                                                                "<div id='getzonalo'></div>";
                                                            }
                                                            ?>
                                                            <!--[Sign Up Password - Start]-->
                                                            <div class="form-group">
                                                                <label for="password" class="col-md-3 control-label">Password</label>
                                                                <div class="col-md-9">
                                                                    <input type="password" class="form-control Signup_Frm Signup_Password"  placeholder="Password">
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up Password - End]-->
                                                            <div style="display:none" class="alert alert-danger Signup_Alert">
                                                                <p>Error:</p>
                                                            </div>
                                                            <!--[Sign Up Button - Start]-->
                                                            <div class="form-group">  						                                        
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button  type="button" class="btn btn-info Signup_Btn"style="background: Blue;"> Sign Up</button>
                                                                    <a class="ScreenMenu" menuid="exit" href="../dashboard.php"  >  <button type="button"class="btn btn-info " style="background: Blue;"> Cancel</button>
                                                                </div>
                                                            </div>
                                                            <!--[Sign Up Button - End]-->


                                                        </div>
                                                    </div>
                                                </div> 
                                            </section>
                                        </div>
                                        <!--===============================================singup end ============================================-->



                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end campaign tab one -->
                                <!-- ============================================================== -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign data -->
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

                <script>
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getpro").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/province.php", true);
                    xmlhttp.send();
                </script>
                <script>

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getmin").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/getministry.php", true);
                    xmlhttp.send();

                </script>
                <script>
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getdept").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/getdepartment.php", true);
                    xmlhttp.send();
                </script>
                <script>
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("getzonalo").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "./getform/getzonaloffice.php", true);
                    xmlhttp.send();
                </script>

                <script>
                    function clk_proid() {
                        var shopro_province_id = document.getElementById("Signup_province_s").value;
                        document.getElementById("Signup_province").value = shopro_province_id;
                    }
                </script>
                <script>
                    function clk_minid() {
                        var shopro_province_id = document.getElementById("Signup_min_s").value;
                        document.getElementById("Signup_min").value = shopro_province_id;
                    }
                </script>
                <script>
                    function clk_deptid() {
                        var shopro_province_id = document.getElementById("Signup_dept_s").value;
                        document.getElementById("Signup_dept").value = shopro_province_id;
                    }
                </script>
                <script>
                    function clk_divid() {
                        var shopro_province_id = document.getElementById("Signup_zonal_s").value;
                        document.getElementById("Signup_zonal").value = shopro_province_id;
                    }
                </script>


                <script>
                    $(document).ready(function($) {
                        $(document).on('click', '.min_name', function(e) {
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
                            }
                        });
                    });
                </script>


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
                </body>


                </html>

