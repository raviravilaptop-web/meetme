<?php
ob_start();

//$cookie_name = "meetmeCounter";
//if (!isset($_COOKIE[$cookie_name])) {
//    require("db_connect.php");
//    $sql_Query = "UPDATE hit_counter SET count=count+1";
//    if ($conn->query($sql_Query) === FALSE)
//        echo "Error updating record: " . $conn->error;
//    else {
//        setcookie($cookie_name, "is counted", time() + (10 * 365 * 24 * 60 * 60), "/"); // expires in 10 years
//    }
//    mysqli_close($conn);
//}

$cookie_name = "meetmeCounter";
if (!isset($_COOKIE[$cookie_name])) {
            $UpdateStatus = $db->qry("UPDATE hit_counter SET count=count+1");
              setcookie($cookie_name, "is counted", time() + (10 * 365 * 24 * 60 * 60), "/"); // expires in 10 years
}
?>
