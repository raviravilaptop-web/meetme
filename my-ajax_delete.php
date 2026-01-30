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



include_once('./login_system/_inc/config.php');
$tbluser = 'user_log'; 
//define('tbluser', 'order_customer'); 

//=======================================sinup =======================================


if (isset($_POST['call_type']) && $_POST['call_type'] == "signup") {
    //get variables
    $username = $db->CleanDBData($_POST["user_name"]);
    $userphone = $db->CleanDBData($_POST["user_phone"]);
    $useraddress = $db->CleanDBData($_POST["user_address"]);
    $useraccss_level = $db->CleanDBData($_POST["user_accss_level"]);
    $userprovince = $db->CleanDBData($_POST["user_province"]);
    $usersabhawa = $db->CleanDBData($_POST["user_sabhawa"]);
    $userid = $db->CleanDBData($_POST["user_id"]);
    $userpassword = $db->CleanDBData($_POST["user_password"]);
    $useremail = $db->CleanDBData($_POST["user_email"]);
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
            'phone' => $userphone,
            'address' => $useraddress,
            'accss_level' => $useraccss_level,
            'province' => $userprovince,
            'sabhawa' => $usersabhawa,
            'user_password' => $HashPassword,
            'user_email' => $useremail,
            'code' => $Code,
            'user_status' => "pending",
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
            'msg' => "email has been sent to you",
            'url' => $FullLink,
        );
        //mail($ToEmail,$subject,$txt,$headers);
        echo json_encode($Result);
        exit();
    }
}


