<?php
include_once('db_class.php'); 
define('FromName','H.N.Weerasena');
define('FromEmail','nimal.weerasena@gmail.com');

define('DownloadPageURL','../dashboard.php');
define('DownloadPageURL_meet','index.php');

define('tbluser', 'user_log'); 
//define('tbluser', 'order_customer'); 

$SiteURLLocal =  "http://" .$_SERVER["HTTP_HOST"]. dirname($_SERVER['PHP_SELF']); 
//Will replace any backward slashes with forward ones
$RootSiteURLPath = str_replace('\\', '/', $SiteURLLocal); 
define('SiteRootDir', $RootSiteURLPath); 

$db_conn = array(
	'host' => '91.204.209.19', 
	'user' => 'cmnwgovl_nimal',
	'pass' => 'Cmnwgov@!204',
	'database' => 'cmnwgovl_cliet_meet', 
	); 

$db = new SimpleDBClass($db_conn);

?>



