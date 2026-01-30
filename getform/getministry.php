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

// පේළි අංක 13 නිවැරදි කිරීම: 'q' අගය ලැබී ඇත්දැයි පරීක්ෂා කිරීම
$shopro_province_id = (isset($_GET['q'])) ? $_GET['q'] : null;

if (isset($_SESSION["me_accss_level"])) {
    $user_email = $_SESSION['me_user_email'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $divi_offce2 = $_SESSION["me_offce2"];
}
?>
<div class="form-group">
    <label for="sabhawa" class="col-md-3 control-label">Ministries</label>
    <div class="col-md-9">
        <select class="form-control Signup_Frm Signup_min_s" id="Signup_min_s" placeholder="Ministry" onclick="clk_minid()" >
            <option value=''>--Non--</option>
            <?php
            if (isset($_SESSION["me_accss_level"]) && $shopro_province_id !== null) {

                $sql = null;
                // SQL Injection වලින් ආරක්ෂා වීමට අගය clean කර ගැනීම
                $safe_province_id = $db->CleanDBData($shopro_province_id);

                if ($uleveldis == '1269_mt') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` = '$safe_province_id' ORDER BY `min_name` ";
                } else if ($uleveldis == '1548_sa') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` = '$province' AND `min_ID` = '$ministry' ORDER BY `min_name` ";
                } else if ($uleveldis == '1658_pa') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` = '$province' AND `min_ID` = '$ministry' ORDER BY `min_name` ";
                } else if ($uleveldis == '2753_ps') {
                    $sql = "SELECT `min_ID`, `min_name` FROM `tbl_min` WHERE `province_Code` = '$province' AND `min_ID` = '$ministry' ORDER BY `min_name` ";
                }

                if ($sql !== null) {
                    $result = $db->getresultset($sql);
                    if ($result) {
                        while ($erow2 = $result->fetch_assoc()) {
                            // Value එකට quotes යෙදීම (HTML standard)
                            echo "<option value='". $erow2["min_ID"] ."'>" . $erow2["min_ID"] . " - " . $erow2["min_name"] . "</option>";
                        }
                    }
                }
            }
            ?>
        </select>
        <input type="hidden" class="Signup_Frm Signup_min" id="Signup_min" name="Signup_min" value="null">
    </div>
</div>
