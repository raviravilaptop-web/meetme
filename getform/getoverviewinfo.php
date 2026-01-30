<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Roboto+Slab:wght@100..900&family=Tilt+Warp&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">


    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <title>MeetMe</title>
<head>

    <?php
    ob_start();

    include_once('./login_system/_inc/config.php');
//include_once './perf_chart/perf_chart.php';
    $insName = null;
    $address = null;
    $shopro_province_id = null;
    $pro_min_id = null;
    $pro_dept_id = null;
    $pro_zonal = null;
    $fromDate = null;
    $sqld = null;
    $sqldc = null;
    $headName = null;
    $minname = null;
    $dept_name = null;
    $zonal_name = null;
    $uleveldis = null;

    if (!isset($_SESSION['me_user_name'])) {
        header("Location:./index.php");
    } else {
        $username = $_SESSION['me_user_email'];
        $user_email = $_SESSION['me_user_email'];
        $leveldis = $_SESSION["me_accss_level"];
        $province = $_SESSION["me_province"];
        $ministry = $_SESSION["me_ministry"];
        $insName = $_SESSION["insName"];
        $address = $_SESSION["address"];
        $uleveldis = $_SESSION["me_accss_level"];
        $district_offce = $_SESSION["me_district_offce"];
        $divi_offce = $_SESSION["me_offce"];
               $instID = $_SESSION["insid"];
    }
    $currentdate = date("Y/m/d");
    $date = date_create($currentdate);
//echo date_format($date,"Y/m/d H:i:s");
    $crntdate = date_format($date, "Y-m-d");

    if (isset($_POST['showpro_btn'])) {
        if (0 == strcmp($_POST['showpro_btn'], 'Showpro_btn')) {

            if (isset($_POST['inpuproid']) && !empty($_POST['inpuproid'])) {
                $shopro_province_id = trim($_POST['inpuproid']);
            }
            if (isset($_POST['inpuminid']) && !empty($_POST['inpuminid'])) {
                $pro_min_id = $_POST['inpuminid'];
            }
            if (isset($_POST['inpudeptid']) && !empty($_POST['inpudeptid'])) {
                $pro_dept_id = $_POST['inpudeptid'];
            }
            if (isset($_POST['inpudivid']) && !empty($_POST['inpudivid'])) {
                $pro_zonal = $_POST['inpudivid'];
            }
            if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
                $fromDate = $_POST['fromDate'];
            }
            if (isset($_POST['toDate']) && !empty($_POST['toDate'])) {
                $toDate = $_POST['toDate'];
            }


            $fromDate = $_POST['fromDate'];
            $date = date_create($fromDate);
//echo date_format($date,"Y/m/d H:i:s");
            $getfromdate = date_format($date, "Y-m-d");

            $toDate = $_POST['toDate'];
            $date = date_create($toDate);
//echo date_format($date,"Y/m/d H:i:s");
            $gettodate = date_format($date, "Y-m-d");

//      ===================================1269_mt==================================

            if ($uleveldis == '1269_mt') {
                $where = [];
                $setwehe = null;
                if (isset($_POST['inpuproid']) && !empty($_POST['inpuproid'])) {
                    $where[] = "province ='$shopro_province_id'";
                }
                if (isset($_POST['inpuminid']) && !empty($_POST['inpuminid'])) {
                    $where[] = "ministry ='$pro_min_id'";
                }
                if (isset($_POST['inpudeptid']) && !empty($_POST['inpudeptid'])) {
                    $where[] = "district_offce ='$pro_dept_id'";
                }
                if (isset($_POST['inpudivid']) && !empty($_POST['inpudivid'])) {
                    $where[] = "divi_offce ='$pro_zonal'";
                }
                if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
                    $where[] = "date(sysdate) BETWEEN '$getfromdate' AND '$gettodate'";
                }
                $setwehe = count($where) ? implode(' AND ', $where) : '';
                $sqld = "SELECT  * FROM `me_client` WHERE $setwehe ORDER BY `province`";
                
//      ===================================1548_sa==================================
                
                } else if ($uleveldis == '1548_sa') {
                $where = [];
                $setwehe = null;
                if (isset($_POST['inpuminid'])) {
                    $where[] = "ministry ='$pro_min_id'";
                }
                if (isset($_POST['inpudeptid']) && !empty($_POST['inpudeptid'])) {
                    $where[] = "district_offce ='$pro_dept_id'";
                }
                if (isset($_POST['inpudivid']) && !empty($_POST['inpudivid'])) {
                    $where[] = "divi_offce ='$pro_zonal'";
                }
                if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
                    $where[] = "date(sysdate) BETWEEN '$getfromdate' AND '$gettodate'";
                }
                $where[] = "work_inst ='$instID'";
                $setwehe = count($where) ? implode(' AND ', $where) : '';
                $sqld = "SELECT * FROM `me_client`WHERE $setwehe  ORDER BY `ministry` ";
          //      ===================================1658_pa_sa==================================
                } else if ($uleveldis == '1658_pa') {
                $where = [];
                $setwehe = null;
                if (isset($_POST['inpudeptid'])) {
                    $where[] = "district_offce ='$pro_dept_id'";
                }
                if (isset($_POST['inpudivid']) && !empty($_POST['inpudivid'])) {
                    $where[] = "divi_offce ='$pro_zonal'";
                }
                if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
                    $where[] = "date(sysdate) BETWEEN '$getfromdate' AND '$gettodate'";
                }
                $where[] = "work_inst ='$instID'";
                $setwehe = count($where) ? implode(' AND ', $where) : '';
                $sqld = "SELECT * FROM `me_client`WHERE $setwehe ORDER BY `district_offce` ";
                
                //      ===================================2753_ps==================================
                } else if ($uleveldis == '2753_ps') {
                $where = [];
                $setwehe = null;

                if (isset($_POST['inpudivid'])) {
                    $where[] = "divi_offce ='$pro_zonal'";
                }
                if (isset($_POST['fromDate']) && !empty($_POST['fromDate'])) {
                    $where[] = "date(sysdate) BETWEEN '$getfromdate' AND '$gettodate'";
                }
                $where[] = "work_inst ='$instID'";
                $setwehe = count($where) ? implode(' AND ', $where) : '';
                $sqld = "SELECT * FROM `me_client`WHERE $setwehe ORDER BY `divi_offce` ";
            }

            if (isset($sqld)) {
                $RecData = $db->select($sqld);
//No records found
                if (!$RecData) {
//            $Result = array('status' => 'error',
//                'Msg' => 'No Data Found ',
//            );
//            echo json_encode($Result);
//            exit();
                    ?>
                    <script> alert("No Data Found ")</script>
                    <?php
                } elseif ($RecData) {
                    $refcode1 = $RecData[0]['refcode'];
                    $c_nic1 = $RecData[0]['c_nic'];
                    $c_cname1 = $RecData[0]['c_cname'];
                    $c_contact1 = $RecData[0]['c_contact'];
                    $c_whatap1 = $RecData[0]['c_whatap'];
                    $c_ldecript1 = $RecData[0]['c_ldecript'];
                    $c_meetpsn = $RecData[0]['c_meetpsn'];
                    $ministry_s = $RecData[0]['ministry'];
                    $district_offce_s = $RecData[0]['district_offce'];
                    $divi_offce_s = $RecData[0]['divi_offce'];

                    // get institution name
                    $sqlgetmpeson = "SELECT inst_meetpson FROM `head_inst` WHERE  `sno` ='$c_meetpsn'";
                    $RecData = $db->select($sqlgetmpeson);
                    if ($RecData) {
                        $headName = $RecData[0]['inst_meetpson'];
                    } else {
                        $headName = null;
                    }
//            if (!$RecData) {
//                $Result = array('status' => 'error',
//                    'Msg' => 'No name Found in Meet person List',
//                );
//                echo json_encode($Result);
//                exit();
//                
//            } elseif ($RecData) {
//                $headName = $RecData[0]['inst_meetpson'];
//            }
                    // get ministry name
                    $sencecolor = null;
                    $sqlsensecolor = "SELECT `min_name` FROM `tbl_min` WHERE `min_ID` ='$ministry_s' ";
                    $RecData = $db->select($sqlsensecolor);
                    if ($RecData) {
                        $minname = $RecData[0]['min_name'];
                    } else {
                        $minname = null;
                    }
                    // get department name name
                    $sencecolor = null;
                    $sqlsensecolor = "SELECT `dept_name` FROM `tbl_department` WHERE `dept_id` ='$district_offce_s' ";
                    $RecData = $db->select($sqlsensecolor);
                    if ($RecData) {
                        $dept_name = $RecData[0]['dept_name'];
                    } else {
                        $dept_name = null;
                    }
                    // get Zone officet name name
                    $sencecolor = null;
                    $sqlsensecolor = "SELECT`zonal_name` FROM `tbl_zonal_offce` WHERE `znal_id` ='$divi_offce_s' ";
                    $RecData = $db->select($sqlsensecolor);
                    if ($RecData) {
                        $zonal_name = $RecData[0]['zonal_name'];
                    } else {
                        $zonal_name = null;
                    }
                }
            }
        }
    }
