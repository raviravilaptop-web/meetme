<?php
ob_start();
session_start();

$client_NIC = ($_GET['q']);

include_once('../login_system/_inc/config.php');
$insName = null;
$address = null;

if (!isset($_SESSION['me_user_name'])) {
    header("Location:./index.php");
} else {
    $username = $_SESSION['me_user_email'];
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

$min_name = null;
$addresss = null;
$head_of_min = null;
$head_vote = null;
$contact = null;

$RecData = $db->select("SELECT * FROM `me_client` WHERE `c_nic` = '$client_NIC'");
//No records found
if (!$RecData) {
    $Result =  'No Selected Client Details';
    echo json_encode($Result);
    exit();
} elseif ($RecData) {
    $c_nic = $RecData[0]['c_nic'];
    $c_cname = $RecData[0]['c_cname'];
    $c_contacts = $RecData[0]['c_contact'];
    $c_whatap = $RecData[0]['c_whatap'];
    $c_sdecript = $RecData[0]['c_sdecript'];
    $c_ldecript = $RecData[0]['c_ldecript'];
    $c_meetpsn = $RecData[0]['c_meetpsn'];
}
?>
 <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
<input hidden class="" id="cname_rtv" type="text"  value="<?php echo $c_cname ?>" >
<input hidden  class="" id="contact_rtv" type="text"  value="<?php echo $c_contacts ?>" >
<input  hidden class="" id="whatsapp_rtv" type="text"  value="<?php echo $c_whatap ?>" >
<input  hidden class="" id="sdecript_rtv" type="text"  value="<?php echo $c_sdecript ?>" >
<input hidden  class="" id="ldecript_rtv" type="text"  value="<?php echo $c_ldecript ?>" >
<input   hidden class="" id="meetpsn_rtv" type="text"  value="<?php echo $c_meetpsn ?>" >


<!-- ============================================================== -->
<!-- sidenavbar -->
<!-- ============================================================== -->


<table class="table table-striped table-bordered first" id="previustbl">
    <thead>
        <tr>
            <th hidden scope="col">nic No</th>
            <th scope="col">Ref No</th>
            <th scope="col">Date</th>
            <th scope="col">Meet Person</th>
            <th scope="col">sense</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqld = null;
        if ($uleveldis == '1269_mt') {
            $sqld = "SELECT  `c_nic`,`refcode`,`c_meetpsn`, `sysdate`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id` FROM `me_client`WHERE `c_nic` =  '$c_nic'  ORDER BY `c_nic` ";
        } else if ($uleveldis == '1548_sa') {
            $sqld = "SELECT `c_nic`,`refcode`,`c_meetpsn`, `sysdate`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `c_nic` =  '$c_nic'   ORDER BY `c_nic` ";
        } else if ($uleveldis == '1658_pa') {
            $sqld = "SELECT `c_nic`,`refcode`,`c_meetpsn`, `sysdate`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`   FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'  AND `c_nic` =  '$c_nic'   ORDER BY `c_nic` ";
        } else if ($uleveldis == '2753_ps') {
            $sqld = "SELECT `c_nic`,`refcode`,`c_meetpsn`, `sysdate`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`   FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce'  AND `c_nic` =  '$c_nic'   ORDER BY `c_nic` ";
        }
        
        
        if ($db->getresultset($sqld)) {
            $result = $db->getresultset($sqld);
            while ($erow2 = $result->fetch_assoc()) {
                $c_nic = $erow2["c_nic"];
                $refcode = $erow2["refcode"];
                  $sysdate = $erow2["sysdate"];
                $c_meetpsn = $erow2["c_meetpsn"];
              

//                                                                $province = $erow2["province"];
//                                                                $ministry = $erow2["ministry"];
//                                                                $district_offce = $erow2["district_offce"];
//                                                                $divi_offce = $erow2["divi_offce"];
//                                                                $divi_offce2 = $erow2["divi_offce2"];
                // get institution name
                $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$c_meetpsn' ";
                $RecData = $db->select($sqlgetmpeson);
                if (!$RecData) {
                    $Result = array('status' => 'error',
                        'Msg' => 'No name Found in Meet person List',
                    );
                    echo json_encode($Result);
                    exit();
                } elseif ($RecData) {
                    $headName = $RecData[0]['inst_meetpson'];
                }
                // get sense Code
                $sencecolor = null;
                $sqlsensecolor = "SELECT sensecode FROM `me_client_sense` WHERE  `refcode` ='$refcode' ";
                $RecData = $db->select($sqlsensecolor);
                if ($RecData) {
                    $sensecode = $RecData[0]['sensecode'];
                } else {
                    $sensecode = '0';
                }
                // get ministry name
                $sencecolor = null;
                $sqlsensecolor = "SELECT `min_name` FROM `tbl_min` WHERE `min_ID` ='$ministry' ";
                $RecData = $db->select($sqlsensecolor);
                if ($RecData) {
                    $minname = $RecData[0]['min_name'];
                } else {
                    $minname = null;
                }
                // get department name name
                $sencecolor = null;
                $sqlsensecolor = "SELECT `dept_name` FROM `tbl_department` WHERE `dept_id` ='$district_offce' ";
                $RecData = $db->select($sqlsensecolor);
                if ($RecData) {
                    $dept_name = $RecData[0]['dept_name'];
                } else {
                    $dept_name = null;
                }
                // get Zone officet name name
                $sencecolor = null;
                $sqlsensecolor = "SELECT`zonal_name` FROM `tbl_zonal_offce` WHERE `znal_id` ='$divi_offce' ";
                $RecData = $db->select($sqlsensecolor);
                if ($RecData) {
                    $zonal_name = $RecData[0]['zonal_name'];
                } else {
                    $zonal_name = null;
                }

                if ($sensecode == '5') {
                    $sencecolor = "#33ff00";
                } else if ($sensecode == '4') {
                    $sencecolor = "#99ff00";
                } else if ($sensecode == '3') {
                    $sencecolor = "#cccc00";
                } else if ($sensecode == '2') {
                    $sencecolor = "#f67f12";
                } else if ($sensecode == '1') {
                    $sencecolor = "#f60016";
                } else {
                    $sencecolor = "#111111";
                }
                ?>
                <tr>

                    <td hidden style = "text-align: center;"><?php echo $c_nic ?></td>
                    <td style = "text-align: center;"><?php echo $refcode ?></td>
                    <td style = "text-align: left;"><?php echo $sysdate ?></td>
                    <td style = "text-align: center;"><?php echo $headName ?></td>
                    <td style = "text-align: center;"><a href="#secnse_sec" class="btn-wishlist m-r-10 ScreenMenu" menuid="sencemnu" ><i class="fa fa-fw fa-star" style="color: <?php echo $sencecolor ?>;"></i></a><?php echo $sensecode ?></td>

                <!--                                                                    <td style = "text-align: center;"><?php echo $province ?></td>
                <td style = "text-align: center;"><?php echo $minname ?></td>
                <td style = "text-align: center;"><?php echo $dept_name ?></td>
                <td style = "text-align: center;"><?php echo $zonal_name ?></td>-->



                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>

<!-- ============================================================== -->
<!-- end sidenavbar -->
<!-- ============================================================== -->




