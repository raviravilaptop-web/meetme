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
   <select type="text" class="form-control Signup_Frm pro_dept_id" id="pro_dept_id" name="pro_dept_id"placeholder="Departments"onclick="clk_deptid()" >
        <option value=''>-Non-</option>
            <?php

            if (isset($_SESSION["me_accss_level"])) {
                $sql = null;
                if ($uleveldis == '1269_mt') {
                    $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`  ORDER BY `dept_name` ";
                } else if ($uleveldis == '1548_sa') {
                    $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department` WHERE `province_code` =  '$province' AND `min_id` =  '$ministry' ORDER BY `dept_name` ";
                } else if ($uleveldis == '1658_pa') {
                    $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`WHERE `province_code` =  '$province' AND `min_id` =  '$ministry' AND `dept_id` =  '$district_offce' ORDER BY `dept_name`";
                } else if ($uleveldis == '2753_ps') {
                    $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`WHERE `province_code` =  '$province' AND `min_id` =  '$ministry' AND `dept_id` =  '$district_offce'  ORDER BY `dept_name`";
                }
                if ($db->getresultset($sql)) {
                    $result = $db->getresultset($sql);
                    while ($erow2 = $result->fetch_assoc()) {
                        ?>
                        <option value=<?php echo $erow2["dept_id"]; ?> > <?php echo $erow2["dept_id"]; ?>-<?php echo $erow2["dept_name"]; ?></option>
                        <?php
                    }
                }
            }
            ?>
        </select>
</div> 
 <input hidden id="inpudeptid"name="inpudeptid"></input>