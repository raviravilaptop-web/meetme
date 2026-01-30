<?php
ob_start();


if (isset($_SESSION['me_user_name'])) {
            $insert_arrays = array(
                'user_id' => $UserID,
                'inst_id' => $instID,

            );
            $q = $db->insert('log_registry', $insert_arrays);
}
?>
