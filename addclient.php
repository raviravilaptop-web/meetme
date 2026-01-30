<?php
ob_start();
session_start();

include_once('./login_system/_inc/config.php');
$user_email = null;
$userName = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$divi_offce2 = null;
$officetype = null;
$insName = null;
$address = null;
$instID = null;
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $userName = $_SESSION['me_user_name'];
    $user_email = $_SESSION['me_user_email'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $divi_offce2 = $_SESSION["me_offce2"];
    $officetype = $_SESSION["me_officetype"];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
    $instID = $_SESSION["insid"];
    $UserID = $_SESSION['me_user_id'];

}

$tbluser = 'user_log';
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="./assets/libs/css/style.css">
        <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="./assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
        <link rel="stylesheet" href="./assets/vendor/inputmask/css/inputmask.css" />

        <title>Meetme </title>
        <!--<link rel="stylesheet" href="../index_lib/css/main.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./login_system/libs/awesome-functions.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="./login_system/js/addclient.js"></script>


        <script type="text/javascript">
            $(document).ready(function($) {
                //Show Signup_Screen
                $('.addclientScreen').show();
                $(".ScreenMenu").click(function() {
                    //clear all old error messages
                    bs.ClearError();
                    $('.Screen').hide();
                    var MenuID = $(this).attr('menuid');
                    if (MenuID == "exit") {
                        $('.Login_Screen').hide();
                    } else if (MenuID == "ForgotPassword") {
                        $('.ForgotPassword_Screen').show();
                    } else if (MenuID == "Signup") {
                        $('.Signup_Screen').show();
                    } else if (MenuID == "compn") {
                        $('.compn_Screen').show();
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

            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <?php
            include './header.php';
            ?>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <?php
            include './slider.php';
            ?>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-9">
                            <!-- ============================================================== -->
                            <!-- pageheader  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                    <h2 class="hedename"><?php echo $insName ?> </h2>
                                    <h5 class="hedename" style="line-height: 0.0;"><?php echo $address ?></h5>

                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <div class="page-breadcrumb">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="./index.php" class="breadcrumb-link">Home</a></li>
                                                        <li class="breadcrumb-item"><a href="./dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page"><a href="./addclient.php" class="breadcrumb-link">Add Client</a></li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>


                            <!--========================================================== Create  new Client - start ================================================================-->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen addclientScreen" style="display:none;margin-top: 0px; margin-left: 0px; margin-right: 0px; "> 
                                        <!--[Panel - Start]-->   
                                        <div class="panel panel-info">
                                            <!--[Panel Heading - Start]-->  
                                            <div class="panel-heading"style="background: Blue;">
                                                <div class="panel-title" style="color: #ffffff;"> <img src="./images/icons/addclient.png" alt="image"width="30px"height="30px"> Add New Client</div>
                                                <div style="float:right; font-size: 100%; position: relative; top:-20px">
                                                    <a class=" ScreenMenu " style="color: #ffffff;" menuid="exit"  href="#">Exit</a>
                                                </div>
                                            </div>  
                                            <!--[Panel Heading - End]-->  

                                            <!--[Panel Body - Start]-->  
                                            <div class="panel-body" >

                                                <form  class="form-horizontal adclient_Form" role="form"   >

                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">NIC No</label>

                                                        <div class="col-12 col-sm-8 col-lg-8">
                                                            <div class="input-group input-search">
                                                                <input class="form-control adclient_Form nicn" id ="nicn" type="text" placeholder="NIC No"><span class="input-group-btn">
                                                                    <button class="btn btn-secondary adclient_Form serchid"  id="serchid" type="button"><i class="fas fa-search"></i></button></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                                        <div class="col-12 col-sm-8 col-lg-8">
                                                            <input class="form-control adclient_Form cname"id ="cname" data-parsley-type="digits" type="text"  placeholder="Name" value="" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                                        <div class="col-12 col-sm-8 col-lg-4">
                                                            <input class="form-control adclient_Form contact" id ="contact" data-parsley-type="digits" type="text" placeholder="Contact"value="">
                                                        </div>
                                                        <div class="col-12 col-sm-8 col-lg-4">
                                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">whatsapp</label>
                                                            <div class="col-12 col-sm-8 col-lg-8">
                                                                <select class="form-control adclient_Form whatsapp" id ="whatsapp" >
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Short Description</label>
                                                        <div class="col-12 col-sm-8 col-lg-8">
                                                            <input  list="sd" class="form-control adclient_Form sdecript" id ="sdecript" data-parsley-type="digits" type="text"placeholder="Short Description">
                                                            <datalist id="sd">
                                                                <?php
                                                                if (isset($_SESSION["me_accss_level"])) {
                                                                    $sql = null;
                                                                    $sql = "SELECT DISTINCT(`c_sdecript`) AS sdisc FROM `me_client` WHERE `user_id`= $UserID";
                                                                    if ($db->getresultset($sql)) {
                                                                        $result = $db->getresultset($sql);
                                                                        while ($erow2 = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <option ><?php echo $erow2["sdisc"]; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Long Description</label>
                                                        <div class="col-12 col-sm-8 col-lg-8">
                                                            <textarea class="form-control adclient_Form ldecript" id ="ldecript"  data-parsley-type="digits" type="text"  rows="4" cols="50" placeholder="Long Description"  ></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="input-select" class="col-12 col-sm-3 col-form-label text-sm-right">Meet person </label>
                                                        <div class="col-12 col-sm-8 col-lg-5">
                                                            <select type="text" class="form-control adclient_Form meetpsn" id="meetpsn"placeholder="Province">
                                                                <?php
                                                                if (isset($_SESSION["me_accss_level"])) {
                                                                    $sql = null;
                                                                    $sql = "SELECT `sno`, `inst_id`, `inst_meetpson`, `inst_design`, `contact`, `inst_user`, `inst_sysdate` FROM `head_inst` WHERE inst_id = '$instID'";
                                                                    if ($db->getresultset($sql)) {
                                                                        $result = $db->getresultset($sql);
                                                                        while ($erow2 = $result->fetch_assoc()) {
                                                                            ?>
                                                                            <option value=<?php echo $erow2["sno"]; ?> ><?php echo $erow2["inst_meetpson"]; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-8 col-lg-3">
                                                            <a href="./institute.php?q=addmeetperson" ><button type="button" class="btn btn-sm addpersonlist_Btn" style="background: #00ff66low;">Add New Meet person</button></a>
                                                        </div>
                                                    </div>
                                                    <div style="display:none" class="alert alert-danger Signup_Alert">
                                                        <p>Error:</p>
                                                    </div>
                                                    <div class="form-group row text-right">
                                                        <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                            <button type="button" class="btn btn-info addclient_Btn" style="background: Blue;">Submit</button>
                                                            <button class="btn btn-info" style="background: Blue;" menuid="exit"> <a class=" ScreenMenu " style="color: #ffffff;"  menuid="exit"  href="#">Cancel</a></button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                </div>  
                            </div>  
                        </div>  
                        <!--===================================== Create Client- end =========================-->


                        <div class="col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="sidebar-nav-fixed">
                                <ul class="list-unstyled">
                                    <li><a href="#overview" class="active">Overview</a></li>
                                    <li><a href="./institute.php?q=addmeetperson">Meet Person</a></li>
                                    <div class="card">
                                        <h5 class="card-header">Previous Visits</h5>
                                        <div class="card-body">
                                            <div class="table-responsive ">
                                                <div id ="retriew_addclient"></div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <?php
                        include './footer.php';
                        ?>

                        <!-- ============================================================== -->
                        <!-- end main wrapper -->
                        <!-- ============================================================== -->
                        <!-- Optional JavaScript -->
                        <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
                        <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                        <script src="./assets/vendor/slimscroll/jquery.slimscroll.js"></script>
                        <script src="./assets/vendor/parsley/parsley.js"></script>
                        <script src="./assets/libs/js/main-js.js"></script>

                        <script src="assets/js/main.js"></script>
                        <script>
            $(function(e) {
                "use strict";
                $(".date-inputmask").inputmask("dd/mm/yyyy"),
                        $(".phone-inputmask").inputmask("(999) 999-9999"),
                        $(".international-inputmask").inputmask("+9(999)999-9999"),
                        $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
                        $(".purchase-inputmask").inputmask("aaaa 9999-****"),
                        $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
                        $(".ssn-inputmask").inputmask("999-99-9999"),
                        $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
                        $(".currency-inputmask").inputmask("$9999"),
                        $(".percentage-inputmask").inputmask("99%"),
                        $(".decimal-inputmask").inputmask({
                    alias: "decimal",
                    radixPoint: "."
                }),
                $(".email-inputmask").inputmask({
                    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                    greedy: !1,
                    onBeforePaste: function(n, a) {
                        return (e = e.toLowerCase()).replace("mailto:", "")
                    },
                    definitions: {
                        "*": {
                            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                            cardinality: 1,
                            casing: "lower"
                        }
                    }
                })
            });
                        </script>

                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>

                        <script>
                            $(document).ready(function($) {
                                $(document).on('click', '.serchid', function(e) {

                                    var str = document.getElementById("nicn").value;

                                    bs.ClearError();
                                    if (frm.IsEmpty(str)) {
                                        //                                        alert("Please enter Correct ID")
                                        //Show alert
                                    }

                                    if (str == "") {
                                        document.getElementById("retriew_addclient").innerHTML = "";
                                        return;
                                    } else {

                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("retriew_addclient").innerHTML = this.responseText;
                                            }
                                        };
                                        // document.getElementById("refcode").value = str;
                                        xmlhttp.open("GET", "./getform/getaddclient.php?q=" + str, true);
                                        xmlhttp.send();
                                        document.getElementById("cname").value = document.getElementById("cname_rtv").value;
                                        document.getElementById("contact").value = document.getElementById("contact_rtv").value;
                                        document.getElementById("whatsapp").value = document.getElementById("whatsapp_rtv").value;
                                        document.getElementById("sdecript").value = document.getElementById("sdecript_rtv").value;
                                        document.getElementById("ldecript").value = document.getElementById("ldecript_rtv").value;
                                        document.getElementById("meetpsn").value = document.getElementById("meetpsn_rtv").value;
                                    }
                                });
                            });
                        </script>
                        <script>
                            $(document).ready(function($) {
                                $(document).on('click', '.cname', function(e) {

                                    var str = document.getElementById("nicn").value;

                                    bs.ClearError();
                                    if (frm.IsEmpty(str)) {
                                        //                                        alert("Please enter Correct ID")
                                        //Show alert
                                    }

                                    if (str == "") {
                                        document.getElementById("retriew_addclient").innerHTML = "";
                                        return;
                                    } else {

                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("retriew_addclient").innerHTML = this.responseText;
                                            }
                                        };
                                        // document.getElementById("refcode").value = str;
                                        xmlhttp.open("GET", "./getform/getaddclient.php?q=" + str, true);
                                        xmlhttp.send();


                                        document.getElementById("cname").value = document.getElementById("cname_rtv").value;
                                        document.getElementById("contact").value = document.getElementById("contact_rtv").value;
                                        document.getElementById("whatsapp").value = document.getElementById("whatsapp_rtv").value;
                                        document.getElementById("sdecript").value = document.getElementById("sdecript_rtv").value;
                                        document.getElementById("ldecript").value = document.getElementById("ldecript_rtv").value;
                                        document.getElementById("meetpsn").value = document.getElementById("meetpsn_rtv").value;



                                    }
                                });
                            });
                        </script>

                        </body>

                        </html>

