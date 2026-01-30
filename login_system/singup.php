<?php
ob_start();
session_start();
include_once('./_inc/config.php');

$tbluser = 'user_log';
$user_email = null;
$uleveldis = null;
$province = null;
$ministry = null;
if (isset($_SESSION["me_accss_level"])) {
    $user_email = $_SESSION['me_user_email'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $divi_offce2 = $_SESSION["me_offce2"];
} else {
    
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Meetme Access Login System</title>
        <!--<link rel="stylesheet" href="../index_lib/css/main.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="libs/awesome-functions.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/signup.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript" src="js/forgot.js"></script>



        <script type="text/javascript">

            $(document).ready(function($) {
                $('.Screen').hide();
                //Show Signup_Screen

//                $('.Signup_Screen').show();
                $('.Signup_Screen').show();
                $(".ScreenMenu").click(function() {
                    //clear all old error messages
                    bs.ClearError();
                    $('.Screen').hide();
                    var MenuID = $(this).attr('menuid');
                    if (MenuID == "Login") {
                        $('.Login_Screen').show();
                    } else if (MenuID == "ForgotPassword") {
                        $('.ForgotPassword_Screen').show();
                    } else if (MenuID == "Signup") {
                        $('.Signup_Screen').show();
                    } else if (MenuID == "compn") {
                        $('.compn_Screen').show();
                    } else if (MenuID == "exit") {
                        $('.Signup_Screen').hide();
                    }
                    //console.log(MenuID);
                });
            });</script>
    </head>
    <body style="background: #000000">


        <div class="container"> 
            <div class="MsgAlert"></div>


            <!--===================================== Sign Up Screen - Start =========================-->
            <!--[Sign Up Screen - Start]-->		
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen Signup_Screen" style="display:none;margin-top:50px;">
                <!--[Panel - Start]-->   
                <div class="panel panel-info">
                    <!--[Panel Heading - Start]-->  
                    <div class="panel-heading" style="background: Blue;">
                        <a href="../index.php"><div class="panel-title" style="color: #ffffff;">MeetMe  Sign Up</div></a>
                        <div style="float:right; font-size: 85%; position: relative; top:-20px">
                            <a class="ScreenMenu" menuid="Login"  style="color: #ffffff; font-size: 14px;" href="#login">Log In</a>
                        </div>
                    </div>  
                    <!--[Panel Heading - End]-->  

                    <!--[Panel Body - Start]-->  
                    <div class="panel-body" >


                        <!--[Sign Up Form - Start]-->
                        <form  class="form-horizontal Signup_Form" role="form"   >
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
                        </form>
                        <!--[Sign Up Form - End]-->
                    </div>
                    <!--[Panel Body - Start]-->  
                </div>
                <!--[Panel - End]-->  
            </div>
            <!--[Sign Up Screen - End]-->
            <!--===================================== Sign Up Screen - end =========================-->	

            <!--===================================== Login Screen - Start =========================-->	
            <!--[Login Screen - Start]-->
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen Login_Screen" style="display:none1;margin-top:25px;">
                <!--[Panel - Start]-->   
                <div class="panel panel-info" >
                    <!--[Panel Heading - Start]-->  
                    <div class="panel-heading "style="background: Blue;">
                        <div class="panel-title"style="color: #ffffff;">Login</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px;">
                            <a class="ScreenMenu" style="color: #ffffff;" menuid="ForgotPassword"  href="#ForgotPassword">Forgot Password</a>
                        </div>
                    </div>  

                    <!--[Panel Heading - End]-->  

                    <!--[Panel Body - Start]-->  
                    <div class="panel-body" >
                        <div style="display:none" class="alert alert-danger LoginAlert">
                            <p style="color: #ffffff;">Error:</p>
                        </div>

                        <!--[Sign Up Form - Start]-->
                        <form  class="form-horizontal Login_Form" role="form"   >
                            <!--[Login Email - Start]-->
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control Login_Form Login_Email" placeholder="Email Address" value="nimal.weerasena@gmail.com">
                                </div>
                            </div>         
                            <!--[Login Email - End]-->

                            <!--[Sign Up Password - Start]-->
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control Login_Form Login_Password"  placeholder="Password" value="weeranimal">
                                </div>
                            </div>
                            <!--[Sign Up Password - End]-->

                            <!--[Sign Up Button - Start]-->
                            <div class="form-group">                                                      
                                <div class="col-md-offset-3 col-md-9">
                                    <button  type="button" class="btn btn-info Login_Btn" style="background: Blue;"> Login</button>
                                </div>
                            </div>
                            <!--[Login Button - End]-->

                            <div class="form-group">
                                <div class="col-md-12 control"> 
                                    <div style="border-top: 1px; solid:#888; padding-top:15px; font-size:85%">
                                        Don't have an account??? <a class="ScreenMenu" menuid="Signup"  href="#Signup" > Sign Up Here</a>
                                    </div>

                                </div>
                            </div> 
                        </form>
                        <!--[Login Form - End]-->
                    </div>
                    <!--[Panel Body - Start]-->  
                </div>
                <!--[Panel - End]-->  
            </div>
            <!--===================================== Login Screen - end =========================-->	 

            <!--[Login Screen - End]-->

            <!--===================================== Forgot Password Screen - Start =========================-->	
            <!--[Forgot Password Screen - Start]-->
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen ForgotPassword_Screen" style="display:none1;margin-top:50px;">
                <!--[Panel - Start]-->   
                <div class="panel panel-info">
                    <!--[Panel Heading - Start]-->  
                    <div class="panel-heading "style="background: Blue;">
                        <div class="panel-title"style="color: #ffffff;">Forgot Password</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            <a class="ScreenMenu" style="color: #ffffff;"menuid="Login"  href="#Login">Login</a>
                        </div>
                    </div>  
                    <!--[Panel Heading - End]-->  

                    <!--[Panel Body - Start]-->  
                    <div class="panel-body" >
                        <div style="display:none" class="alert alert-danger ForgotPasswordAlert">
                            <p style="color: #ffffff;">Error:</p>
                        </div>

                        <!--[Sign Up Form - Start]-->
                        <form  class="form-horizontal ForgotPassword_Form" role="form"   >
                            <!--[Login Email - Start]-->
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control ForgotPassword_Frm ForgotPassword_Email" placeholder="Email Address">
                                </div>
                            </div>         
                            <!--[Login Email - End]--> 


                            <!--[Sign Up Button - Start]-->
                            <div class="form-group">                                                      
                                <div class="col-md-offset-3 col-md-9">
                                    <button  type="button" class="btn btn-info ForgotPassword_Btn" style="background: Blue;"> Forgot Password</button>
                                </div>
                            </div>
                            <!--[Login Button - End]-->

                            <!--                            <div class="form-group">
                                                            <div class="col-md-12 control"> 
                                                                <div style="border-top: 1px; solid:#888; padding-top:15px; font-size:85%">
                                                                    Don't have an account??? <a class="ScreenMenu" menuid="Signup"  href="#Signup" > Sign Up Here</a>
                                                                </div>
                                                            </div>
                                                        </div> -->
                        </form>
                        <!--[Login Form - End]-->
                    </div>
                    <!--[Panel Body - Start]-->  
                </div>
                <!--[Panel - End]-->  
            </div>
            <!--[Forgot Password Screen - End]-->	
            <!--===================================== Forgot Password Screen - end =========================-->
            <!--===================================== compn Screen - end =========================-->
            <!--[Sign Up Screen - Start]-->		
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen compn_Screen" style="display:none;margin-top:50px;">
                <!--[Panel - Start]-->   
                <div class="panel panel-info">
                    <!--[Panel Heading - Start]-->  
                    <div class="panel-heading "style="background: Blue;">
                        <div class="panel-title" style="color: #ffffff">Create Complain</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            <a class="ScreenMenu" style="color: #ffffff" menuid="Login"  href="#">exit</a>
                        </div>
                    </div>  
                    <!--[Panel Heading - End]-->  

                    <!--[Panel Body - Start]-->  
                    <div class="panel-body" >
                        <div style="display:none" class="alert alert-danger Signup_Alert">
                            <p style="color: #ffffff">Error:</p>
                        </div>

                        <!--[Sign Up Form - Start]-->
                        <form  class="form-horizontal compn_Form" role="form"   >
                            <!--[Sign Up User Name - Start]-->
                            <div class="form-group">
                                <label for="username" class="col-md-3 control-label">Latitude</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control Signup_Frm cmpl_Latitude" placeholder="Latitude">
                                </div>
                            </div>
                            <!--[Sign Up User Name - End]-->

                            <!--[Sign Up User ID - Start]-->
                            <div class="form-group">
                                <label for="userid" class="col-md-3 control-label">Longitude </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control Signup_Frm cmpl_Longitude" placeholder="Longitude">
                                </div>
                            </div>
                            <!--[Sign Up User ID - End]-->

                            <!--[Sign Up Password - Start]-->
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control Signup_Frm cmpl_Name"  placeholder="Name">
                                </div>
                            </div>
                            <!--[Sign Up Password - End]-->

                            <!--[Sign Up Email - Start]-->
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Mobile/Whatsapp</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control Signup_Frm cmpl_Contact" placeholder="Mobile/Whatsapp">
                                </div>
                            </div>         
                            <!--[Sign Up Email - Start]-->
                            <div class="form-group">
                                <label for="cmpln" class="col-md-3 control-label">Complain</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control Signup_Frm cmpl_Cmplin" placeholder="Complain">
                                </div>
                            </div>         
                            <!--[Sign Up Email - End]-->

                            <!--[Sign Up Button - Start]-->
                            <div class="form-group">  						                                        
                                <div class="col-md-offset-3 col-md-9">
                                    <button  type="button" class="btn btn-info compn_Btn"> Save changes</button>
                                </div>
                            </div>
                            <!--[Sign Up Button - End]-->
                        </form>
                        <!--[Sign Up Form - End]-->
                    </div>
                    <!--[Panel Body - Start]-->  
                </div>
                <!--[Panel - End]-->  
            </div>
            <!--[Sign Up Screen - End]-->
            <!--===================================== complain Screen - end =========================-->	
        </div>	

        <style>
            .item-title {
                font-size: 2.4rem;
                line-height: 1.5;
                margin-top: 0;
                margin-bottom: 2.4rem;
            }
        </style>

        <script>
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("getpro").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "../getform/province.php", true);
            xmlhttp.send();
        </script>
        <script>
//            var xmlhttp = new XMLHttpRequest();
//            xmlhttp.onreadystatechange = function() {
//                if (this.readyState == 4 && this.status == 200) {
//                    document.getElementById("getmin").innerHTML = this.responseText;
//                }
//            };
//            xmlhttp.open("GET", "../getform/getministry.php", true);
//            xmlhttp.send();

        </script>
        <script>
//            var xmlhttp = new XMLHttpRequest();
//            xmlhttp.onreadystatechange = function() {
//                if (this.readyState == 4 && this.status == 200) {
//                    document.getElementById("getdept").innerHTML = this.responseText;
//                }
//            };
//            xmlhttp.open("GET", "../getform/getdepartment.php", true);
//            xmlhttp.send();
        </script>
        <script>
//            var xmlhttp = new XMLHttpRequest();
//            xmlhttp.onreadystatechange = function() {
//                if (this.readyState == 4 && this.status == 200) {
//                    document.getElementById("getzonalo").innerHTML = this.responseText;
//                }
//            };
//            xmlhttp.open("GET", "../getform/getzonaloffice.php", true);
//            xmlhttp.send();
        </script>

        <script>
            function clk_proid() {
                var shopro_province_id = document.getElementById("Signup_province_s").value;
                document.getElementById("Signup_province").value = shopro_province_id;

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("getmin").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getform/getministry.php?q=" + shopro_province_id, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function clk_minid() {
                var shopro_min_id = document.getElementById("Signup_min_s").value;
                document.getElementById("Signup_min").value = shopro_min_id;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("getdept").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getform/getdepartment.php?q=" + shopro_min_id, true);
                xmlhttp.send();
                
//                ==================zonal================
var shopro_dept_id = document.getElementById("Signup_dept_s").value;
                document.getElementById("Signup_dept").value = shopro_dept_id;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("getzonalo").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getform/getzonaloffice.php?q=" + shopro_dept_id, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function clk_deptid() {
                var shopro_dept_id = document.getElementById("Signup_dept_s").value;
                document.getElementById("Signup_dept").value = shopro_dept_id;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("getzonalo").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getform/getzonaloffice.php?q=" + shopro_dept_id, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function clk_divid() {
                var shopro_province_id = document.getElementById("Signup_zonal_s").value;
                document.getElementById("Signup_zonal").value = shopro_province_id;
            }
        </script>
    </body>
</html>
