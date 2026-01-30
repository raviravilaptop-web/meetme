<?php

//--->get app url > start
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



include_once('_inc/config.php');
$tbluser = 'user_log';
//define('tbluser', 'order_customer'); 
//=======================================sinup =======================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "signup") {
    //get variables
    $username = $db->CleanDBData($_POST["user_name"]);
    $useremail = $db->CleanDBData($_POST["user_email"]);
    $userphone = $db->CleanDBData($_POST["user_phone"]);
    $useraddress = $db->CleanDBData($_POST["user_address"]);
    $useroffce_type = $db->CleanDBData($_POST["user_offce_type"]);
    $useraccss_level = $db->CleanDBData($_POST["user_accss_level"]);
    $userprovince = $db->CleanDBData($_POST["user_province"]);
    $ministry = $db->CleanDBData($_POST["user_min"]);
    $userdept = $db->CleanDBData($_POST["user_dept"]);
    $userzonal = $db->CleanDBData($_POST["user_zonal"]);
//if (isset($_POST["user_min"]) && !empty($_POST["user_min"])) { $ministry = $db->CleanDBData($_POST["user_min"]);}
//if (isset($_POST["user_dept"]) && !empty($_POST["user_dept"])) { $userdept = $db->CleanDBData($_POST["user_dept"]);}
//if (isset($_POST["user_zonal"]) && !empty($_POST["user_zonal"])) { $userzonal = $db->CleanDBData($_POST["user_zonal"]);}
    $userid = $db->CleanDBData($_POST["user_id"]);
    $userpassword = $db->CleanDBData($_POST["user_password"]);
    $RecCheck_ID = $db->Select("select * from $tbluser where user_id='$userid' ");
    $RecCheck_Email = $db->Select("select * from $tbluser where user_email='$useremail' ");


    if ($RecCheck_ID > 1) {
        $Result = array(
            'status' => "error",
            'error_code' => "user_id",
            'msg' => "user id taken",
        );
        echo json_encode($Result);
        exit();
    } else if ($RecCheck_Email > 1) {
        $Result = array(
            'status' => "error",
            'error_code' => "user_email",
            'msg' => "user email taken",
        );
        echo json_encode($Result);
        exit();
    } else if ($RecCheck_ID < 1 and $RecCheck_Email < 1) {
        $HashPassword = hash('sha512', $userpassword);
        $Code = hash('sha512', $userid . $useremail . rand(5, 25) . microtime() . uniqid());
        $insert_arrays = array(
            'user_id' => $userid,
            'user_name' => $username,
            'user_email' => $useremail,
            'phone' => $userphone,
            'address' => $useraddress,
            'offce_type' => $useroffce_type,
            'accss_level' => $useraccss_level,
            'province' => $userprovince,
            'ministry' => $ministry,
            'district_offce' => $userdept,
            'divi_offce' => $userzonal,
            'divi_offce2' => "null",
              'user_status' => "pending",
            'code' => $Code,
            'user_password' => $HashPassword,
            
          
        );

        //if ran successfully it will reture last insert id, else 0 for error
        $q = $db->insert('user_log', $insert_arrays);


        //send email to user
        $headers = "From: " . FromName . "<" . FromEmail . ">";
        $ToEmail = $useremail;
        $Subject = "My subject";
        $FullLink = APPURL . "/confirm.php?code=" . $Code;
        $BodyContent = "Hello " . $username;
        $BodyContent .= "<p>You recently opened an account at <b>{CompanyName}</b>. Please click the following link to activate your account immediately</p>";
        $BodyContent .= '<a href="' . $FullLink . '" target="_parent" >Confirmation link </a>';

        $Result = array(
            'status' => "success",
            'msg' => "User Account has been Created Successfully",
            'url' => $FullLink,
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result);
        exit();
    }
}


//=========================================================login=================================================
if (isset($_POST['call_type']) && $_POST['call_type'] == "login") {

    //CleanDBData prevents mysql injections  
    $userpasswd = $db->CleanDBData($_POST['user_password']);
    $useremail = $db->CleanDBData($_POST['user_email']);
    $hash_userpasswd = hash('sha512', $userpasswd);
    $RecData = $db->select("Select * FROM $tbluser WHERE user_email='$useremail' and user_password='$hash_userpasswd' ");
    //No records found
    if (!$RecData) {
        $Result = array('status' => 'error',
            'Msg' => 'No Email Address Found',
        );
        echo json_encode($Result);
        exit();
    } elseif ($RecData) {
        $ActivationStatus = $RecData[0]['user_status'];
        $UserEmail = $RecData[0]["user_email"];
        $UserID = $RecData[0]["user_id"];
        $UserName = $RecData[0]["user_name"];
        $Useraddress = $RecData[0]["address"];
        $Userofficetype = $RecData[0]["offce_type"];
        $Useraccsslevel = $RecData[0]["accss_level"];
        $Userprovince = $RecData[0]["province"];
        $ministry = $RecData[0]["ministry"];
        $district_offce = $RecData[0]["district_offce"];
        $divi_offce = $RecData[0]["divi_offce"];
        $divi_offce2 = $RecData[0]["divi_offce2"];
        $user_status= $RecData[0]["user_status"];
        $user_acess = $RecData[0]["access"];

        if ($ActivationStatus == 'active') {
            //session_start(); 
            session_start();
            ob_start();
            $_SESSION['me_user_email'] = $UserEmail;
            $_SESSION['me_user_id'] = $UserID;
            $_SESSION['me_user_name'] = $UserName;
            $_SESSION["me_address"] = $Useraddress;
            $_SESSION["me_officetype"] = $Userofficetype;
            $_SESSION["me_accss_level"] = $Useraccsslevel;
            $_SESSION["me_province"] = $Userprovince;
            $_SESSION["me_ministry"] = $ministry;
            $_SESSION["me_district_offce"] = $district_offce;
            $_SESSION["me_offce"] = $divi_offce;
            $_SESSION["me_offce2"] = $divi_offce2;
            $_SESSION["me_status"] = $user_status;
            $_SESSION["me_access"] = $user_acess;



            $Result = array('status' => 'success',
                'URL' => APPURL . '/' . DownloadPageURL,
                'RecData' => $RecData,
            );
            echo json_encode($Result);
            exit();
        }
    }
}
?>
