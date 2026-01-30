<?php
ob_start();
//session_start();

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
$instID = null;
$msgcount = null;
$blickdot = null;
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
    $instID = $_SESSION["insid"];
}

$sqlalertmsgc = null;
$sqlalertmsgc = "SELECT COUNT(`sno`) AS scount FROM `msg_alert` WHERE  m_ins_id =  '$instID' AND m_read =  '0'  ORDER BY sysdate";
$RecData = $db->select($sqlalertmsgc);
if ($RecData) {
    $msgcount = $RecData[0]['scount'];
} else {
    $msgcount = '0';
}
if ($msgcount == 0) {
    $blickdot = null;
} else {
    $blickdot = "<span class='indicator'></span>";
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!--   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Roboto+Slab:wght@100..900&family=Tilt+Warp&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    -->

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">

    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <!--<script type="text/javascript" src="./login_system/js/addclient.js"></script>-->

</head>
<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">

    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="index.php">MeetMe   </a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        

        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>
                <li class="nav-item ali" style="text-align: center;">
                    <div id="custom-search" class="top-search-bar">
                        <p class="mb-0 text-primary me-2">VIEWS:</p>
                        <span class="text-body">  <?php require('./counter/counter_A.php'); ?></span>
                    </div>
                </li>
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"><?php echo $msgcount; ?></i> <?php echo $blickdot; ?></a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Notification</div>
                            <div class="notification-list">
                                <div class="list-group">
<?php
$sqlalertmsg = null;
$sqlalertmsg = "SELECT * FROM `msg_alert` WHERE  m_ins_id =  '$instID' AND m_read =  '0'  ORDER BY sysdate";

if ($db->getresultset($sqlalertmsg)) {
    $resultmt = $db->getresultset($sqlalertmsg);
    while ($erowmt = $resultmt->fetch_assoc()) {
        $m_refNo = $erowmt["m_refNo"];
        $m_name = $erowmt["m_name"];
        $m_contact = $erowmt["m_contact"];
        $m_subject = $erowmt["m_subject"];
        $m_message = $erowmt["m_message"];
        $sysdate = $erowmt["sysdate"];
        ?>

                                            <div class="notification-info list-group-item list-group-item-action active">
                                                <div class="notification-list-user-img"><img src="./images/icons/user.png" alt="" class="user-avatar-md rounded-circle"></div>
                                                <div class="notification-list-user-block"><span class="notification-list-user-name"><?php echo $m_name ?></span>is saying about <?php echo $m_subject ?>
                                                    <div class="notification-date">Message: <?php echo $m_message ?></div>
                                                    <div class="notification-date">Contact: <?php echo $m_contact ?></div>
                                                    <div class="notification-date">Reference No: <?php echo $m_refNo ?></div>
                                                    <div class="notification-date">Date : <?php echo $sysdate ?> </div>
                                                    <div style="display:none" class="alert alert-danger Signup_Alert">
                                                        <p>Error:</p>
                                                    </div>
                                                    <form  class="form-horizontal msg_form"  role="form"  >   
                                                        <input  hidden type="text" class="form-control msg_form msgrefno" name="msgrefno" id="msgrefno" value = "<?php echo $m_refNo; ?>"  >
                                                        <button type="button"  class="badge bg-success read"  name="read" id="read" value="Read">Read.. </button>       
                                                    </form>
                                                </div>
                                            </div>


        <?php
    }
}
?>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-footer"> <a href="#">View all notifications</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                        <li class="connection-list">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" > <span>User Setting</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" > <span>Slack</span></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="conntection-footer"><a href="#">More</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./images/icons/user.png" alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name"><?php echo $user_email ?> </h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="./user-setting.php"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>logout</a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>user name = <?php echo $userName ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>Province = <?php echo $province ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>Ministry = <?php echo $ministry ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>Department = <?php echo $district_offce ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>Zonal office = <?php echo $divi_offce ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>divi office = <?php echo $divi_offce2 ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>Office Type = <?php echo $officetype ?></a>
                        <a class="dropdown-item ScreenMenu"menuid="Login"  href="./logout.php"><i class="fas fa-power-off mr-2"></i>work Institute ID = <?php echo $instID ?></a>


                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div id ="msgren"></div>



<script>
//    function Udelete() {
//        let
//        text = "Do you wont to Delete This Recotds?.";
//        if (confirm(text) == true) {
//<?php include './getform/public_acces/msgreadupdate.php'; ?>
//
//        } else {
////            location.href = './dashboard.php';
//
//        }
//    }
</script>
