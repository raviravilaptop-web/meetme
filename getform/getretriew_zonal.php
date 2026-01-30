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

$RecData = $db->select("SELECT * FROM `tbl_zonal_offce` WHERE `znal_id` = '$min_idr'");
//No records found
if (!$RecData) {
    $Result = array('status' => 'error',
        'Msg' => 'No Selected Ministry ID Found',
    );
    echo json_encode($Result);
    exit();
} elseif ($RecData) {
    $znal_id= $RecData[0]['znal_id'];
    $zonal_name = $RecData[0]['zonal_name'];
    $address = $RecData[0]['address'];
    $head_of_zonaloff = $RecData[0]['head_of_zonaloff'];
    $head_vote = $RecData[0]['head_vote'];
    $contact = $RecData[0]['contact'];

}
?>
<input  class="" id="zonal_id_rtv" type="text"  value="<?php echo $znal_id?>" >
<input hidden class="" id="zonal_name_rtv" type="text"  value="<?php echo $zonal_name?>" >
<input hidden  class="" id="zonal_addresss_rtv" type="text"  value="<?php echo $address?>" >
<input hidden  class="" id="zonal_head_of_min_rtv" type="text"  value="<?php echo $head_of_zonaloff?>" >
<input hidden  class="" id="zonal_head_vote_rtv" type="text"  value="<?php echo $head_vote?>" >
<input hidden  class="" id="dzonal_contact_rtv" type="text"  value="<?php echo $contact?>" >




