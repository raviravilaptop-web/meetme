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

$currentdate = date("Y/m/d");
$date = date_create($currentdate);
//echo date_format($date,"Y/m/d H:i:s");
$crntdate = date_format($date, "Y-m-d");

$min_name = null;
$addresss = null;
$head_of_min = null;
$head_vote = null;
$contact = null;

$RecData = $db->select("SELECT * FROM `me_client` WHERE `c_nic` = '$client_NIC'");
//No records found
if (!$RecData) {
    $Result = array('status' => 'error',
        'Msg' => 'No Selected Client Details',
    );
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
  <section id="todayview" >
                                <div class="row">
                                    <!-- ============================================================== -->
                                    <!-- basic table  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <h3 class="card-header">Previous Visits</h3>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered first"id = "tbldashbd">
                                                        <thead>
                                                            <tr>
                                                                <th>sno#</th>
                                                                <th>NIC#</th>
                                                                <th>Name</th>
                                                                <th>Contact</th>
                                                                <th>whatsapp</th>
                                                                <th>short Descript</th>
                                                                <th hidden >Long Descript</th>
                                                                <th>Meet person</th>
                                                                <th>Date</th>
                                                                <th>sense </th>
                                                                <th>refCode </th>
                                                                <th hidden >Province </th>
                                                                <th hidden >Ministry Office </th>
                                                                <th hidden >Depart Office </th>
                                                                <th hidden >Zonal offi </th>
                                                                <th hidden >Meet person id</th>



                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $sqld = null;
                                                            if ($uleveldis == '1269_mt') {
                                                                $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id` FROM `me_client` WHERE c_nic =  '$client_NIC' AND date(`sysdate`) <>  '$crntdate' ORDER BY `c_nic` ";
                                                            } else if ($uleveldis == '1548_sa') {
                                                                $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND c_nic =  '$client_NIC' AND date(`sysdate`) <>  '$crntdate'  ORDER BY `c_nic` ";
                                                            } else if ($uleveldis == '1658_pa') {
                                                                $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce' AND c_nic =  '$client_NIC' AND date(`sysdate`) <>  '$crntdate' ORDER BY `c_nic` ";
                                                            } else if ($uleveldis == '2753_ps') {
                                                                $sqld = "SELECT `c_sno`, `c_nic`, `c_cname`, `c_contact`, `c_whatap`, `c_sdecript`, `c_ldecript`, `c_meetpsn`, `sysdate`, `refcode`, `province`, `ministry`, `district_offce`, `divi_offce`, `divi_offce2`, `user_id`  FROM `me_client`WHERE `province` =  '$province' AND `ministry` =  '$ministry' AND `district_offce` =  '$district_offce'AND `divi_offce` =  '$divi_offce' AND c_nic =  '$client_NIC' AND date(`sysdate`) <>  '$crntdate' ORDER BY `c_nic` ";
                                                            }
                                                            if ($db->getresultset($sqld)) {
                                                                $result = $db->getresultset($sqld);
                                                                while ($erow2 = $result->fetch_assoc()) {
                                                                    $c_sno = $erow2["c_sno"];
                                                                    $c_nic = $erow2["c_nic"];
                                                                    $c_cname = $erow2["c_cname"];
                                                                    $c_contact = $erow2["c_contact"];
                                                                    $c_whatap = $erow2["c_whatap"];
                                                                    $c_sdecript = $erow2["c_sdecript"];
                                                                    $c_ldecript = $erow2["c_ldecript"];
                                                                    $c_meetpsn = $erow2["c_meetpsn"];
                                                                    $sysdate = $erow2["sysdate"];
                                                                    $refcode = $erow2["refcode"];
                                                                    $province = $erow2["province"];
                                                                    $ministry = $erow2["ministry"];
                                                                    $district_offce = $erow2["district_offce"];
                                                                    $divi_offce = $erow2["divi_offce"];
                                                                    $divi_offce2 = $erow2["divi_offce2"];




                                                                    // get institution name
                                                                    $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$c_meetpsn' ";
                                                                    $RecData = $db->select($sqlgetmpeson);
                                                                       if ($RecData) {
                                                                         $headName = $RecData[0]['inst_meetpson'];
                                                                    } else {
                                                                        $headName = '0';
                                                                    }
                             
                                                                    // get sense Code

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
                                                                        <th style ="text-align: left;" ><?php echo $c_sno ?> </th>
                                                                        <th style ="text-align: left;" ><?php echo $c_nic ?> </th>
                                                                        <td style ="text-align: left;"><?php echo $c_cname ?></td>
                                                                        <td style ="text-align: left;"><?php echo $c_contact ?></td>
                                                                        <td style ="text-align: left;"><?php echo $c_whatap ?></td>
                                                                        <td style = "text-align: left;"><?php echo $c_sdecript ?></td>
                                                                        <td hidden style = "text-align: left;"><?php echo $c_ldecript ?></td>
                                                                        <td style = "text-align: left;"><?php echo $headName ?></td>
                                                                        <td style = "text-align: center;"><?php echo $sysdate ?></td>
                                                                        <td style = "text-align: center;"><a href="#secnse_sec" class="btn-wishlist m-r-10 ScreenMenu" menuid="sencemnu" ><i class="fa fa-fw fa-star" style="color: <?php echo $sencecolor ?>;"></i></a><?php echo $sensecode ?></td>
                                                                        <td style = "text-align: center;"><?php echo $refcode ?></td>
                                                                        <td  hidden style = "text-align: center;"><?php echo $province ?></td>
                                                                        <td  hidden style = "text-align: center;"><?php echo $minname ?></td>
                                                                        <td  hidden style = "text-align: center;"><?php echo $dept_name ?></td>
                                                                        <td  hidden style = "text-align: center;"><?php echo $zonal_name ?></td>
                                                                        <td hidden  style = "text-align: center;"><?php echo $headName ?></td>



                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end basic table  -->
                                    <!-- ============================================================== -->
                                </div>
                            </section>