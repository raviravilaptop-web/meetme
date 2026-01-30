<?php
ob_start();
session_start();
include_once('../login_system/_inc/config.php');
$qprovi = null;
$user_email = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$divi_offce2 = null;
$shopro_province_id  = ($_GET['q']);

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
    <label for="sabhawa" class="col-md-3 control-label">Ministries</label>
    <div class="col-md-9">
        <select type="text" class="form-control Signup_Frm Signup_min_s" id="Signup_min_s"placeholder="Ministry"onclick="clk_minid()" >
            <option value='' >--Non--</option>
            <?php
           
            if (isset($_SESSION["me_accss_level"])) {


                $sql = null;
                 if ($uleveldis == '1269_mt') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` =  '$shopro_province_id' ORDER BY `min_name` ";
                } else if ($uleveldis == '1548_sa') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` =  '$province' AND `min_ID` =  '$ministry'ORDER BY `min_name` ";
                } else if ($uleveldis == '1658_pa') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min`WHERE `province_Code` =  '$province' AND `min_ID` =  '$ministry'  ORDER BY `min_name`";
                } else if ($uleveldis == '2753_ps') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min`WHERE `province_Code` =  '$province' AND `min_ID` =  '$ministry'   ORDER BY `min_name`";
                }
                if ($db->getresultset($sql)) {
                    $result = $db->getresultset($sql);
                    while ($erow2 = $result->fetch_assoc()) {
                        ?>
                        <option value=<?php echo $erow2["min_ID"]; ?> ><?php echo $erow2["min_ID"]; ?> -<?php echo $erow2["min_name"]; ?></option>
                        <?php
                    }
                }
            }
            ?>
        </select>
        <input hidden class="Signup_Frm Signup_min" id="Signup_min"name="Signup_min" value="null"></input>
    </div>
</div>
