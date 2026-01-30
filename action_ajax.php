<?php

ob_start();
session_start();
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
$UserID = null;
$instID = null;
$meetpid = null;
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $UserID = $_SESSION['me_user_id'];
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
}

$currentdate = date("Y/m/d");
$date = date_create($currentdate);
//echo date_format($date,"Y/m/d H:i:s");
$crntdate = date_format($date, "Y-m-d");

$ssl = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] && $_SERVER["HTTPS"] != "off" ? true : false;
define("SSL_ENABLED", $ssl);
//define APPURL
$app_url = (SSL_ENABLED ? "https" : "http")
        . "://"
        . $_SERVER["SERVER_NAME"]
        . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
        . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
define("APPURL", $app_url);
//--->get app url > end



include_once('./login_system/_inc/config.php');


//=======================================addclient =======================================


if (isset($_POST['call_type']) && $_POST['call_type'] == "addclient") {
    if (isset($_SESSION["me_user_email"])) {

        $acnicn = $db->CleanDBData($_POST["acnicn"]);
        $accname = $db->CleanDBData($_POST["accname"]);
        $accontact = $db->CleanDBData($_POST["accontact"]);
        $acwhatap = $db->CleanDBData($_POST["acwhatap"]);
        $acsdecript = $db->CleanDBData($_POST["acsdecript"]);
        $acldecript = $db->CleanDBData($_POST["acldecript"]);
        $acmeetpsn = $db->CleanDBData($_POST["acmeetpsn"]);


        $randNumber1 = rand(10000, 99999);
        $randNumber2 = rand(10000, 99999);
        $randNumber3 = rand(10000, 99999);
        $refCode = (uniqid());

        $RecDataan = $db->select("Select * FROM me_client WHERE c_nic='$acnicn' AND `sysdate`like '$crntdate%' AND `work_inst` =  '$instID' ");
        if ($RecDataan > 0) {
            $FullLink = APPURL . "/addclient.php";
            $ConfirmLink1 = "<br> <a href= 'addclient.php'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Submit has been Already Exited .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else {
           

        $insert_arrays = array(
            'c_nic' => $acnicn,
            'c_cname' => $accname,
            'c_contact' => $accontact,
            'c_whatap' => $acwhatap,
            'c_sdecript' => $acsdecript,
            'c_ldecript' => $acldecript,
            'c_meetpsn' => $acmeetpsn,
            'refcode' => $refCode,
            'province' => $province,
            'ministry' => $ministry,
            'district_offce' => $district_offce,
            'divi_offce' => $divi_offce,
            'divi_offce2' => $divi_offce2,
            'user_id' => $UserID,
            'senseCode' => '0',
            'work_inst' => $instID,
        );

        $q = $db->insert('me_client', $insert_arrays);
        //send email to user
//        $headers = "From: " . FromName . "<" . FromEmail . ">";
//        $ToEmail = $acnicn;
//        $Subject = "My subject";
        $FullLink = APPURL . "/dashboard.php";
//        $BodyContent = "Hello " . $accname;
//        $BodyContent .= "<p>You recently opened an account at <b>{CompanyName}</b>. Please click the following link to activate your account immediately</p>";
//        $BodyContent .= '<a href="' . $FullLink . '" target="_parent" >Confirmed Ok </a>';

        $ConfirmLink1 = "<br> <a href= 'dashboard.php'> Confirmed Ok</a>";
        $Result = array(
            'status' => "success",
            'msg' => "Submit has been Completed .$ConfirmLink1",
            'url' => $FullLink,
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result);
        exit();
    }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}

//=======================================add ministry =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "addministry") {
    if (isset($_SESSION["me_user_email"])) {
        $minid = $db->CleanDBData($_POST["minid"]);
        $mnprov_code = $province;
        $minname = $db->CleanDBData($_POST["minname"]);
        $minaddress = $db->CleanDBData($_POST["minaddress"]);
        $minhedname = $db->CleanDBData($_POST["minhedname"]);
        $minvote = $db->CleanDBData($_POST["minvote"]);
        $mincontact = $db->CleanDBData($_POST["mincontact"]);
        $RecData = $db->select("Select * FROM tbl_min WHERE min_ID='$minid'");

        if ($RecData > 0) {
            $UpdateStatus = $db->qry("UPDATE `tbl_min` SET `min_name`='$minname', `address`='$minaddress', `head_of_min`='$minhedname', `head_vote`='$minvote', `contact`='$mincontact'  WHERE `min_ID`='$minid'");
            $FullLink = APPURL . "/institute.php?q=addministry";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=addministry'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else if ($RecData < 1) {

            $insert_arrays = array(
                'min_ID' => $minid,
                'province_Code' => $mnprov_code,
                'min_name' => $minname,
                'address' => $minaddress,
                'head_of_min' => $minhedname,
                'head_vote' => $minvote,
                'contact' => $mincontact,
            );

            $q = $db->insert('tbl_min', $insert_arrays);
            $FullLink = APPURL . "/institute.php?q=addministry";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=addministry'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Submit has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}
//=======================================add Department =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "adddeprtmnt") {
    if (isset($_SESSION["me_user_email"])) {
        $deptid = $db->CleanDBData($_POST["deptid"]);
        $mnprov_code = $province;
        $mn_id = $ministry;
        $deptname = $db->CleanDBData($_POST["deptname"]);
        $deptaddress = $db->CleanDBData($_POST["deptaddress"]);
        $depthedname = $db->CleanDBData($_POST["depthedname"]);
        $deptvote = $db->CleanDBData($_POST["deptvote"]);
        $deptcontact = $db->CleanDBData($_POST["deptcontact"]);

        $RecData = $db->select("Select * FROM tbl_department WHERE dept_id='$deptid'");

        if ($RecData > 0) {
            $UpdateStatus = $db->qry("UPDATE `tbl_department` SET  `dept_name`='$deptname', `address`='$deptaddress', `hesd_of_dept`='$depthedname', `head_vote`='$deptvote' , `contact`='$deptcontact'  WHERE `dept_id`='$deptid'");
            $FullLink = APPURL . "/institute.php?q=adddepartment";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=adddepartment'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else if ($RecData < 1) {

            $insert_arrays = array(
                'dept_id' => $deptid,
                'province_code' => $mnprov_code,
                'min_id' => $mn_id,
                'dept_name' => $deptname,
                'address' => $deptaddress,
                'head_of_min' => $depthedname,
                'head_vote' => $deptvote,
                'contact' => $deptcontact,
            );

            $q = $db->insert('tbl_department', $insert_arrays);
            $FullLink = APPURL . "/institute.php?q=adddepartment";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=adddepartment'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Submit has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}
//=======================================add Zonal Office =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "adddofficedept") {
    if (isset($_SESSION["me_user_email"])) {
        $zonalid = $db->CleanDBData($_POST["zonalid"]);
        $mnprov_code = $province;
        $mn_id = $ministry;
        $officename = $db->CleanDBData($_POST["officename"]);
        $officeaddress = $db->CleanDBData($_POST["officeaddress"]);
        $officehedname = $db->CleanDBData($_POST["officehedname"]);
        $officevote = $db->CleanDBData($_POST["officevote"]);
        $officecontact = $db->CleanDBData($_POST["officecontact"]);

        $RecData = $db->select("Select * FROM tbl_zonal_offce WHERE znal_id='$zonalid'");

        if ($RecData > 0) {
            $UpdateStatus = $db->qry("UPDATE `tbl_zonal_offce` SET `zonal_name`='$officename', `address`='$officeaddress', `head_of_zonaloff`='$officehedname', `head_vote`='$officevote' , `contact`='$officecontact'  WHERE `znal_id`='$zonalid'");
            $FullLink = APPURL . "/institute.php?q=addzonaloff";

            $ConfirmLink1 = "<br> <a href= 'institute.php?q=addzonaloff'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else if ($RecData < 1) {

            $insert_arrays = array(
                'znal_id' => $zonalid,
                'Province_code' => $province,
                'min_id' => $ministry,
                'dept_id' => $district_offce,
                'zonal_name' => $officename,
                'address' => $officeaddress,
                'head_of_zonaloff' => $officehedname,
                'head_vote' => $officevote,
                'contact' => $officecontact,
            );

            $q = $db->insert('tbl_zonal_offce', $insert_arrays);
            $FullLink = APPURL . "/institute.php?q=addzonaloff";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=addzonaloff'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Submit has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}
//=======================================add Meet Person =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "adddmeetperson") {
    if (isset($_SESSION["me_user_email"])) {
        $metins_id = $instID;
        $mnprov_code = $province;
        $mn_id = $ministry;
        $metperson_id = $db->CleanDBData($_POST["metperson_id"]);
        $meetname = $db->CleanDBData($_POST["meetname"]);
        $meetdesig = $db->CleanDBData($_POST["meetdesig"]);
        $meetcontact = $db->CleanDBData($_POST["meetcontact"]);


        $RecData = $db->select("Select * FROM head_inst WHERE sno='$metperson_id'");

        if ($RecData > 0) {
            $UpdateStatus = $db->qry("UPDATE `head_inst` SET `inst_id`='$metins_id', `inst_meetpson`='$meetname', `inst_design`='$meetdesig', `contact`='$meetcontact' , `inst_user`='$UserID'  WHERE sno='$metperson_id'");
            $FullLink = APPURL . "/institute.php?q=addmeetperson";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=addmeetperson'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else if ($RecData < 1) {

            $insert_arrays = array(
                'inst_id' => $metins_id,
                'inst_meetpson' => $meetname,
                'inst_design' => $meetdesig,
                'contact' => $meetcontact,
                'inst_user' => $UserID,
            );

            $q = $db->insert('head_inst', $insert_arrays);
            $FullLink = APPURL . "/institute.php?q=addmeetperson";
            $ConfirmLink1 = "<br> <a href= 'institute.php?q=addmeetperson'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Submit has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}


//=======================================add sense =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "adddsenser") {
    if (isset($_SESSION["me_user_email"])) {
        $senserefCode = $db->CleanDBData($_POST["senserefCode"]);
        $sensenic = $db->CleanDBData($_POST["sensenic"]);
        $senseselectCode = $db->CleanDBData($_POST["senseselectCode"]);
        $meetpid = $db->CleanDBData($_POST["meetpid"]);



        $RecData = $db->select("Select * FROM me_client_sense WHERE refcode='$senserefCode'");

        if ($RecData > 0) {
            $UpdateStatus = $db->qry("UPDATE `me_client_sense` SET `NIC`='$sensenic', `sensecode`='$senseselectCode', `status`='update' WHERE refcode='$senserefCode'");
            $UpdateStatus = $db->qry("UPDATE `me_client` SET `senseCode`='$senseselectCode'WHERE refcode='$senserefCode'");
            $FullLink = APPURL . "/dashboard.php?q=secnse_sec";
            $ConfirmLink1 = "<br> <a href= 'dashboard.php?q=secnse_sec'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else if ($RecData < 1) {

            $insert_arrays = array(
                'refcode' => $senserefCode,
                'NIC' => $sensenic,
                'sensecode' => $senseselectCode,
                'province' => $province,
                'ministry' => $ministry,
                'district_offce' => $district_offce,
                'divi_offce' => $divi_offce,
                'divi_offce2' => $divi_offce2,
                'user_id' => $UserID,
                'status' => 'add',
                'meeto_id' => $meetpid,
                'inst_id' => $instID,
            );

            $q = $db->insert('me_client_sense', $insert_arrays);
            $UpdateStatus = $db->qry("UPDATE `me_client` SET `senseCode`='$senseselectCode'WHERE refcode='$senserefCode'");
            $FullLink = APPURL . "/dashboard.php?q=secnse_sec";

            $ConfirmLink1 = "<br> <a href= 'dashboard.php?q=secnse_sec'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Submit has been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}

//=======================================sinupUpdate =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "signupupdate") {
    //get variables
    $username = $db->CleanDBData($_POST["user_name"]);
    $useremail = $db->CleanDBData($_POST["user_email"]);
    $userphone = $db->CleanDBData($_POST["user_phone"]);
    $useraddress = $db->CleanDBData($_POST["user_address"]);

    $RecCheck_ID = $db->select("select * from user_log where user_id ='$UserID'");

    if ($RecCheck_ID > 0) {
        $UpdateStatus = $db->qry("UPDATE `user_log` SET `user_name`='$username',`user_email`='$useremail',`phone`='$userphone',`address`='$useraddress' WHERE  user_id ='$UserID'");
        $FullLink = APPURL . "/user-setting.php";
        $ConfirmLink1 = "<br> <a href= 'user-setting.php'> Confirmed Ok</a>";
        $Result = array(
            'status' => "success",
            'msg' => "Update has Been Completed .$ConfirmLink1",
            'url' => $FullLink,
        );
        echo json_encode($Result);
        exit();
    }
}

//=======================================change password =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "changepass") {
    if (isset($_SESSION["me_user_email"])) {
        $cpassword = $db->CleanDBData($_POST["cpassword"]);
        $newpasswrd = $db->CleanDBData($_POST["newpasswrd"]);
        $renewpasswrd = $db->CleanDBData($_POST["renewpasswrd"]);

        $HashPassword = hash('sha512', $renewpasswrd);

        $RecData1 = $db->Select("select * from user_log where user_id='$UserID'  AND user_status = 'active'");
        $user_id = $RecData1[0]['user_id'];


        if ($RecData1 < 1) {
            //didn't find a record
            echo '<p>Looks like you do not have an account yet</p>';
            die();
        } else if ($RecData1 > 0) {
            $UpdateStatus = $db->qry("UPDATE `user_log` SET `user_password`='$HashPassword' WHERE user_id='$UserID'  AND user_status = 'active'");
            $FullLink = APPURL . "/user-setting.php?#changepass";
            $ConfirmLink1 = "<br> <a href= 'user-setting.php?#changepass'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has Been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    }
}

//=======================================send Message =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "sendmessage") {
    if (isset($_SESSION["me_user_email"])) {
        $m_siid = $db->CleanDBData($_POST["m_siid"]);
        $m_refNo = $db->CleanDBData($_POST["m_refNo"]);
        $m_name = $db->CleanDBData($_POST["m_name"]);
        $m_contact = $db->CleanDBData($_POST["m_contact"]);
        $m_subject = $db->CleanDBData($_POST["m_subject"]);
        $m_messages = $db->CleanDBData($_POST["m_messages"]);
        $RecDatam = $db->select("Select * FROM me_client WHERE refcode='$m_refNo'");
        //No records found
        if (!$RecDatam) {
            $Resultm = array('status' => 'error',
                'Msg' => 'No Reference No Found',
            );
            echo json_encode($Resultm);
            exit();
        } elseif ($RecDatam) {
            $RecData = $db->select("Select * FROM msg_alert WHERE date(sysdate)='$crntdate' AND m_refNo='$m_refNo'");

            if ($RecData > 0) {
                $UpdateStatus = $db->qry("UPDATE `msg_alert` SET `m_name`='$m_name', `m_contact`='$m_contact', `m_subject`='$m_subject' , `m_message`='$m_messages', `m_read`='0' WHERE m_refNo='$m_refNo'");
                $FullLink = APPURL . "/dashboard.php?q=secnse_sec";
                $ConfirmLink1 = "<br> <a href= 'dashboard.php?q=secnse_sec'> Confirmed Ok</a>";
                $Result = array(
                    'status' => "success",
                    'msg' => "Update has Been Completed .$ConfirmLink1",
                    'url' => $FullLink,
                );
                //mail($ToEmail,$subject,$txt,$headers);
                echo json_encode($Result);
                exit();
            } else if ($RecData < 1) {

                $insert_arrays = array(
                    'm_ins_id' => $m_siid,
                    'm_refNo' => $m_refNo,
                    'm_name' => $m_name,
                    'm_contact' => $m_contact,
                    'm_subject' => $m_subject,
                    'm_message' => $m_messages,
                    'm_read' => '0',
                );

                $q = $db->insert('msg_alert', $insert_arrays);
                $FullLink = APPURL . "/dashboard.php?q=secnse_sec";
                $ConfirmLink1 = "<br> <a href= 'dashboard.php?q=secnse_sec'> Confirmed Ok</a>";
                $Result = array(
                    'status' => "success",
                    'msg' => "Submit has Been Completed .$ConfirmLink1",
                    'url' => $FullLink,
                );
                //mail($ToEmail,$subject,$txt,$headers);
                echo json_encode($Result);
                exit();
            }
        }
    } else {
        echo "<script> alert('Please singup to the System'); </script>";
        $Result1 = array(
            'msg' => "Please singup to the System",
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result1);
        exit();
    }
}


//=======================================Message dlete =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "messagedlete") {
    if (isset($_SESSION["me_user_email"])) {
        $m_msgrefno = $db->CleanDBData($_POST["m_msgrefno"]);


        $RecData1 = $db->Select("SELECT * FROM `msg_alert` where m_refNo='$m_msgrefno'");



        if ($RecData1 < 1) {
            //didn't find a record
            //didn't find a record
            echo '<p>Looks like you do not have an account yet</p>';
            die();
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        } else if ($RecData1 > 0) {
            $UpdateStatus = $db->qry("UPDATE `msg_alert` SET `m_read`='1'WHERE  m_refNo='$m_msgrefno'");
            $FullLink = APPURL . "/dashboard.php";
            $ConfirmLink1 = "<br> <a href= 'dashboard.php'> Confirmed Ok</a>";
            $Result = array(
                'status' => "success",
                'msg' => "Update has Been Completed .$ConfirmLink1",
                'url' => $FullLink,
            );
            //mail($ToEmail,$subject,$txt,$headers);
            echo json_encode($Result);
            exit();
        }
    }
}


