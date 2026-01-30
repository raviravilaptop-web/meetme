<?php
ob_start();
//session_start();
include_once('./login_system/_inc/config.php');
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];

}
$currentdate = date("Y/m/d");
$date = date_create($currentdate);
//echo date_format($date,"Y/m/d H:i:s");
$crntdate = date_format($date, "Y-m-d");


if ($uleveldis == '1269_mt') {
$sqld = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE `sensecode` = '1'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE `sensecode` = '2'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE `sensecode` = '3'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE `sensecode` = '4'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE `sensecode` = '5'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}else if ($uleveldis == '1548_sa') {
    $sqld = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND`sensecode` = '1'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND`sensecode` = '2'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND`sensecode` = '3'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND`sensecode` = '4'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND`sensecode` = '5'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}else if ($uleveldis == '1658_pa') {
    $sqld = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND`sensecode` = '1'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND`sensecode` = '2'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND`sensecode` = '3'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND`sensecode` = '4'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
    }

$sqld = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND`sensecode` = '5'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}else if ($uleveldis == '2753_ps') {
    $sqld = "SELECT count(`sensecode`) AS code1 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND `sensecode` = '1'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code1 = $erow2['code1'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code2 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND `sensecode` = '2'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code2 = $erow2['code2'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code3 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND `sensecode` = '3'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code3 = $erow2['code3'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code4 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND `sensecode` = '4'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code4 = $erow2['code4'];
    }
}

$sqld = "SELECT count(`sensecode`) AS code5 FROM `me_client_sense` WHERE  `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND `sensecode` = '5'AND date(`sysdate`) =  '$crntdate'";
if ($db->getresultset($sqld)) {
    $result = $db->getresultset($sqld);
    while ($erow2 = $result->fetch_assoc()) {
        $code5 = $erow2['code5'];
    }
}
}

$chart_arrays = array($code5, $code4, $code3, $code2, $code1);
?>
                 