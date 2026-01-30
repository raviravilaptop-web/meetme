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
$instID = null;
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
     $instID = $_SESSION["insid"];
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
                        <table class="table table-striped table-bordered first" id = "tblmeetperson">
                            <thead>
                                <tr>
                                    <th>Meet Person ID</th>
                                    <th>institution ID</th>
                                    <th>Meet Person Name</th>
                                    <th>Designation</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sqld = null;
                  
                                    $sqld = "SELECT `sno`, `inst_id`, `inst_meetpson`, `inst_design`, `contact`, `inst_user`, `inst_sysdate` FROM `head_inst` WHERE `inst_id` = '$instID'";
 
                                    if ($db->getresultset($sqld)) {
                                        $result = $db->getresultset($sqld);
                                        while ($erow2 = $result->fetch_assoc()) {
                                            $perid = $erow2["sno"];
                                            $inst_id = $erow2["inst_id"];
                                            $inst_meetpson = $erow2["inst_meetpson"];
                                            $inst_design = $erow2["inst_design"];
                                            $contact= $erow2["contact"];
          
                                       ?>
                                        <tr>
                                            <th style ="text-align: left;" ><?php echo $perid ?> </th>
                                            <td style ="text-align: left;"><?php echo $inst_id ?></td>
                                            <td style ="text-align: left;"><?php echo $inst_meetpson ?></td>
                                            <td style ="text-align: left;"><?php echo $inst_design ?></td>
                                            <td style ="text-align: left;"><?php echo $contact ?></td>
           
                                        </tr>
                                        <?php
                                    }
                                    }
                  
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Meet Person ID</th>
                                    <th>institution ID</th>
                                    <th>Meet Person Name</th>
                                    <th>Designation</th>
                                    <th>Contact</th>
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
