<?php 
ob_start();
session_start();

 $_SESSION['user_email']  = '';;
 $_SESSION['user_email']  = '';;
session_destroy();
header("Location: ./index.php");
?>






