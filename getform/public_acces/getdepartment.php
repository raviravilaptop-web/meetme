<?php
ob_start();
session_start();
include_once('../../login_system/_inc/config.php');
$qmini = null;
$user_email = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$divi_offce2 = null;
$shopro_min_id  = ($_GET['q']);

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
<div class="form-group">
    <label for="sabhawa" class="col-md-3 control-label">Departments</label>
    <div class="col-md-9">
        <select type="text" class="form-control Signup_Frm Signup_dept_s" id="Signup_dept_s" placeholder="Departments"onclick="clk_deptid()">
<option value='' >--Non--</option>
            <?php

            if (isset($_SESSION["me_accss_level"])) {
                $sql = null;
                    $sql = "SELECT `dept_id`, `dept_name` FROM `tbl_department`WHERE `province_code` =  '$province' AND `min_id` =  '$shopro_min_id'ORDER BY `dept_name`";
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
        <input hidden class="Signup_Frm Signup_dept" id="Signup_dept"name="Signup_dept" value="null"></input>
    </div>
</div>
