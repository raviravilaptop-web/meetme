<?php

 
include_once ('_inc/config.php');

session_start(); 
ob_start(); 


//--->First User Access Check - Start


if (!isset($_SESSION['user_id'])){    
  header("location: ".SiteRootDir);
    // kill the page display error
  die('You cannot directly access this page!'); 
  exit();
}
//--->First User Access Check - End



//--->Second User Access Check - Start
//Get session variables
$UserEmail = $_SESSION['user_email']; 
$UserID = $_SESSION['user_id']; 
$UserName = $_SESSION['user_name'];
 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Download Page</title>
  
 

</head>
<body>
 
<p>Welcome <?php echo $UserName?>,</p>
<p>&nbsp;</p>
<p>Here is a link to <a href="ebook.zip">download </a>your file</p>
 <p>&nbsp;</p>
<p>Thank you for your purchase!</p>


</body>
</html>