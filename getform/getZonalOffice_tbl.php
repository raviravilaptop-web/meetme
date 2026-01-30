<?php
ob_start();
//session_start();
//include_once('../login_system/_inc/config.php');
$user_email = null;
$userName = null;
$uleveldis = null;
$province = null;
$ministry = null;
$district_offce = null;
$divi_offce = null;
$divi_offce2 = null;
$officetype = null;
$insName = null;
$address = null;
if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $userName = $_SESSION['me_user_name'];
    $user_email = $_SESSION['me_user_email'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
    $district_offce = $_SESSION["me_district_offce"];
    $divi_offce = $_SESSION["me_offce"];
    $divi_offce2 = $_SESSION["me_offce2"];
    $officetype = $_SESSION["me_officetype"];
    $insName = $_SESSION["insName"];
    $address = $_SESSION["address"];
}
?>

<div class="ecommerce-widget">
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Zonal Office List</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id = "tblzonallbl">
                            <thead>
                                <tr>
                                    <th>Ministry ID</th>
                                    <th>Department ID</th>
                                    <th>Zonal Office ID</th>
                                    <th>Office Name</th>
                                    <th>Address</th>
                                    <th>Head of Department</th>
                                    <th>Paying Vote</th>
                                    <th>contact</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sqld = null;
                                  if ($uleveldis == '1269_mt') {
                                    $sqld = "SELECT `sno`, `znal_id`, `Province_code`, `min_id`, `dept_id`, `zonal_name`, `address`, `head_of_zonaloff`, `head_vote`, `contact` FROM `tbl_zonal_offce`";
                                }else if ($uleveldis == '1548_sa') {
                                    $sqld = "SELECT `sno`, `znal_id`, `Province_code`, `min_id`, `dept_id`, `zonal_name`, `address`, `head_of_zonaloff`, `head_vote`, `contact` FROM `tbl_zonal_offce` WHERE `province_code` = '$province'";
                                } else if ($uleveldis == '1658_pa') {
                                    $sqld = "SELECT `sno`, `znal_id`, `Province_code`, `min_id`, `dept_id`, `zonal_name`, `address`, `head_of_zonaloff`, `head_vote`, `contact` FROM `tbl_zonal_offce` WHERE `province_code` = '$province' AND  `min_id` =  '$ministry'AND  `dept_id` =  '$district_offce'";
                                } else if ($uleveldis == '2753_ps') {
                                    $sqld = "SELECT `sno`, `znal_id`, `Province_code`, `min_id`, `dept_id`, `zonal_name`, `address`, `head_of_zonaloff`, `head_vote`, `contact` FROM `tbl_zonal_offce` WHERE `province_code` = '$province' AND  `min_id` =  '$ministry'AND  `dept_id` =  '$district_offce' AND `znal_id` =  '$divi_offce'";
                                }
 

                                    if ($db->getresultset($sqld)) {
                                        $result = $db->getresultset($sqld);
                                        while ($erow2 = $result->fetch_assoc()) {
                                            $min_id = $erow2["min_id"];
                                            $dept_id = $erow2["dept_id"];
                                            $znal_id = $erow2["znal_id"];
                                            $zonal_name = $erow2["zonal_name"];
                                            $address= $erow2["address"];
                                            $head_of_zonaloff = $erow2["head_of_zonaloff"];
                                            $head_vote = $erow2["head_vote"];
                                            $contact = $erow2["contact"];
                                       ?>
                                        <tr>
                                            <th style ="text-align: left;" ><?php echo $min_id ?> </th>
                                            <td style ="text-align: left;"><?php echo $dept_id ?></td>
                                            <td style ="text-align: left;"><?php echo $znal_id ?></td>
                                            <td style ="text-align: left;"><?php echo $zonal_name ?></td>
                                            <td style ="text-align: left;"><?php echo $address ?></td>
                                            <td style = "text-align: left;"><?php echo $head_of_zonaloff ?></td>
                                            <td style = "text-align: left;"><?php echo $head_vote ?></td>
                                            <td style = "text-align: center;"><?php echo $contact ?></td>
                                        </tr>
                                        <?php
                                    }
                                    }
                  
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Ministry ID</th>
                                    <th>Department ID</th>
                                    <th>Zonal Office ID</th>
                                    <th>Office Name</th>
                                    <th>Address</th>
                                    <th>Head of Department</th>
                                    <th>Paying Vote</th>
                                    <th>contact</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
</div>
