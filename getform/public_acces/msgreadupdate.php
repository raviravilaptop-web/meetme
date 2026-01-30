<?php
ob_start();
session_start();
include_once('../../login_system/_inc/config.php');


        
        if (isset($_POST['read'])) {
    if (0 == strcmp($_POST['read'], 'Read')) {
        $msgrefno = $_POST['msgrefno'];

  $UpdateStatus = $db->qry("UPDATE `msg_alert` SET `m_read`='1' WHERE m_refNo='$msgrefno'");


             

            }
        } 
       
            ?>

