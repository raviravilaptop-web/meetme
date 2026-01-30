<?php
ob_start();
session_start();
include_once('./login_system/_inc/config.php');
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $username = $_SESSION['me_user_email'];
}

$tbluser = 'user_log';
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
   <script src="./login_system/libs/awesome-functions.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="./login_system/js/addclient.js"></script>


        <script type="text/javascript">

            $(document).ready(function($) {
                $('.Screen').hide();
                //Show Signup_Screen

//                $('.Signup_Screen').show();
                $('.addclientScreen').show();

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
                    }
                    //console.log(MenuID);
                });
            });
        </script>
    </head>
    <body style="background: #000000">


        <div class="container"> 
            <div class="MsgAlert"></div>

   
           <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 Screen addclientScreen" style="display:none;margin-top:50px;margin-left: 10px; margin-right: 10px; "> 
                                                <!--[Panel - Start]-->   
                                                <div class="panel panel-info">
                                                    <!--[Panel Heading - Start]-->  
                                                    <div class="panel-heading">
                                                        <div class="panel-title"> <img src="./icons/placerping.png" alt="image"> Create new Place</div>
                                                        <div style="float:right; font-size: 100%; position: relative; top:-20px">
                                                            <a class=" ScreenMenu" menuid="exit"  href="#">exit</a>
                                                        </div>
                                                    </div>  
                                                    <!--[Panel Heading - End]-->  

                                                    <!--[Panel Body - Start]-->  
                                                    <div class="panel-body" >
                                                        <div style="display:none" class="alert alert-danger Signup_Alert">
                                                            <p>Error:</p>
                                                        </div>
                                                        <form  class="form-horizontal adclient_Form" role="form"   >

                                                            <div class="form-group row">
                                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">NIC No</label>
                                                                <div class="col-12 col-sm-8 col-lg-8">
                                                                    <input class="form-control adclient_Form nicn" data-parsley-type="digits" type="text" placeholder="NIC No"  value="692333888V">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                                                <div class="col-12 col-sm-8 col-lg-8">
                                                                    <input class="form-control adclient_Form cname" data-parsley-type="digits" type="text"  placeholder="Name" value="nimal" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                                                <div class="col-12 col-sm-8 col-lg-4">
                                                                    <input class="form-control adclient_Form contact"  data-parsley-type="digits" type="text" placeholder="Contact"value="0702744481">
                                                                </div>
                                                                <div class="col-12 col-sm-8 col-lg-4">
                                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                                        <input type="text" class="form-control adclient_Form whatap" data-parsley-type="digits" type="text" placeholder="Contact"value="1">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Short Description</label>
                                                                <div class="col-12 col-sm-8 col-lg-8">
                                                                    <input class="form-control adclient_Form sdecript"  data-parsley-type="digits" type="text"placeholder="Short Description"value="short" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Long Description</label>
                                                                <div class="col-12 col-sm-8 col-lg-8">
                                                                    <textarea class="form-control adclient_Form ldecript"  data-parsley-type="digits" type="text"  placeholder="Long Description"  >long</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="input-select" class="col-12 col-sm-3 col-form-label text-sm-right">Meet person</label>
                                                                <div class="col-12 col-sm-8 col-lg-8">
                                                                    <select class="form-control adclient_Form meetpsn" >
                                                                        <option value="Example1">Choose Example1</option>
                                                                        <option value="Choose Example2">Choose Example2</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row text-right">
                                                                <div class="col col-sm-10 col-lg-11 offset-sm-1 offset-lg-0">
                                                                    <button type="button" class="btn btn-info addclient_Btn">Submit</button>
                                                                    <button class="btn btn-info">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>  
                                            <!--===================================== Create New Placer - end =========================-->
	

            <

    	
        </div>	

        <style>
            .item-title {
  font-size: 2.4rem;
  line-height: 1.5;
  margin-top: 0;
  margin-bottom: 2.4rem;
}
        </style>
    </body>
</html>