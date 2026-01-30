<?php

$min_idr = ($_GET['q']);

ob_start();
session_start();
include_once('../login_system/_inc/config.php');
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

$min_name = null;
$addresss = null;
$head_of_min = null;
$head_vote = null;
$contact = null;

$RecData = $db->select("SELECT * FROM `tbl_min` WHERE `min_ID` = '$min_idr'");
//No records found
if (!$RecData) {
    $Result = array('status' => 'error',
        'Msg' => 'No Selected Ministry ID Found',
    );
    echo json_encode($Result);
    exit();
} elseif ($RecData) {
    $min_ID = $RecData[0]['min_ID'];
    $min_name = $RecData[0]['min_name'];
    $addresss = $RecData[0]['address'];
    $head_of_min = $RecData[0]['head_of_min'];
    $head_vote = $RecData[0]['head_vote'];
    $contact = $RecData[0]['contact'];
}
?>
<input hidden=""class="" id="min_id_rtv" type="text"  value="<?php echo $min_ID?>" >
<input hidden=""class="" id="min_name_rtv" type="text"  value="<?php echo $min_name?>" >
<input hidden="" class="" id="min_addresss_rtv" type="text"  value="<?php echo $addresss?>" >
<input hidden="" class="" id="min_head_of_min_rtv" type="text"  value="<?php echo $head_of_min?>" >
<input hidden="" class="" id="min_head_vote_rtv" type="text"  value="<?php echo $head_vote?>" >
<input hidden="" class="" id="min_contact_rtv" type="text"  value="<?php echo $contact?>" >




