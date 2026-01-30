<?php

ob_start();

include_once('./login_system/_inc/config.php');
//include_once './perf_chart/perf_chart.php';
$insName = null;
$address = null;
$shopro_province_id = null;
$pro_min_id = null;
$pro_dept_id = null;
$pro_zonal = null;
$fromDate = null;
$sqldc = null;
$headName = null;
$minname = null;
$dept_name = null;
$zonal_name = null;
 $setwehechart = []; 
 $getwehechart = []; 
 $wehechart = null;
 $uleveldis = null;
 $sensettl = null;
 $code1 = null;
 $code2= null;
 $code3 = null;
 $code4 = null;
 $code5 = null;


if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $username = $_SESSION['me_user_email'];
    $user_email = $_SESSION['me_user_email'];
    $leveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
     $uleveldis = $_SESSION["me_accss_level"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
}
$currentdate = date("Y/m/d");
$date = date_create($currentdate);
//echo date_format($date,"Y/m/d H:i:s");
$crntdate = date_format($date, "Y-m-d");

if (isset($_POST['showpro_btn'])) {
    if (0 == strcmp($_POST['showpro_btn'], 'Showpro_btn')) {
        
          if (isset($_POST['inpuproid']) && !empty($_POST['inpuproid'])) {
                $shopro_province_id = trim($_POST['inpuproid']);
            }
            if (isset($_POST['inpuminid']) && !empty($_POST['inpuminid'])) {
                $pro_min_id = $_POST['inpuminid'];
            }
            if (isset($_POST['inpudeptid']) && !empty($_POST['inpudeptid'])) {
                $pro_dept_id = $_POST['inpudeptid'];
            }
            if (isset($_POST['inpudivid']) && !empty($_POST['inpudivid'])) {
                $pro_zonal = $_POST['inpudivid'];
            }
            if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
                $fromDate = $_POST['fromDate'];
            }
            if (isset($_POST['toDate']) && !empty($_POST['toDate'])) {
                $toDate = $_POST['toDate'];
            }

     $fromDate = $_POST['fromDate'];
        $date = date_create($fromDate);
//echo date_format($date,"Y/m/d H:i:s");
        $getfromdate = date_format($date, "Y-m-d");
        
          $toDate = $_POST['toDate'];
        $date = date_create($toDate);
//echo date_format($date,"Y/m/d H:i:s");
        $gettodate = date_format($date, "Y-m-d");

    

        if (isset($_POST['inpuproid']) && !empty($_POST['inpuproid'])) {
            $getwehechart[] = "province ='$shopro_province_id'";
        }
        if (isset($_POST['inpuminid']) && !empty($_POST['inpuminid'])) {
            $getwehechart[] = "ministry ='$pro_min_id'";
        }
        if (isset($_POST['inpudeptid']) && !empty($_POST['inpudeptid'])) {
            $getwehechart[] = "district_offce ='$pro_dept_id'";
        }
        if (isset($_POST['inpudivid']) && !empty($_POST['inpudivid'])) {
            $getwehechart[] = "divi_offce ='$pro_zonal'";
        }
        if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
            $getwehechart[] = "date(sysdate) BETWEEN '$getfromdate' AND '$gettodate'";
        }
        $wehechart = count($getwehechart) ? implode(' AND ', $getwehechart) : '';


        //========================================chart ==============================================




if ($uleveldis == '1269_mt') {
$sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '1'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) { 
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}

}else if ($uleveldis == '1548_sa') {
    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '1'";
    if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}


$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}


$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}


$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
}else if ($uleveldis == '1658_pa') {
    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '1'";
 if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
    }
    }

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
}else if ($uleveldis == '2753_ps') {
    $sqldc = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '1'";
    if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE  $wehechart AND `sensecode` = '2'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE   $wehechart AND `sensecode` = '3'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '4'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}
}

$sqldc = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE $wehechart AND `sensecode` = '5'";
if(isset($sqldc)){
if ($db->getresultset($sqldc)) {
    $result = $db->getresultset($sqldc);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}
}
$setwehechart = array($code5, $code4, $code3, $code2, $code1);
$sensettl = ($code5+$code4+$code3+$code2+$code1);
        }
        }
     ?>
