<?php
ob_start();
session_start();
include_once('../login_system/_inc/config.php');
$qmini = null;
$user_email = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$divi_offce2 = null;

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
<div class="input-group input-search">
<select type="text" class="form-control Signup_Frm pro_zonal" id="pro_zonal"name="pro_zonal"placeholder="Zonal Office" onclick="clk_divid()">
 <option value=''>-Non-</option>
    <?php
    if (isset($_SESSION["me_accss_level"])) {
        $sql = null;
        if ($uleveldis == '1269_mt') {
            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce` ORDER BY `zonal_name` ";
        } else if ($uleveldis == '1548_sa') {
            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce`WHERE `province_code` =  '$province' AND `min_id` =  '$ministry' ORDER BY `zonal_name` ";
        } else if ($uleveldis == '1658_pa') {
            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce`WHERE `province_code` =  '$province' AND `min_id` =  '$ministry'  AND `dept_id` =  '$district_offce' ORDER BY `zonal_name`";
        } else if ($uleveldis == '2753_ps') {
            $sql = "SELECT `znal_id`, `zonal_name` FROM `tbl_zonal_offce`WHERE `province_code` =  '$province' AND `min_id` =  '$ministry'  AND `dept_id` =  '$district_offce' AND `znal_id` =  '$divi_offce'ORDER BY `zonal_name`";
        }
        if ($db->getresultset($sql)) {
            $result = $db->getresultset($sql);
            while ($erow2 = $result->fetch_assoc()) {
                ?>
                <option value=<?php echo $erow2["znal_id"]; ?> ><?php echo $erow2["znal_id"]; ?> - <?php echo $erow2["zonal_name"]; ?></option>
                <?php
            }
        }
    }
    ?>
</select>
    </div>
 <input hidden id="inpudivid"name="inpudivid"></input>
