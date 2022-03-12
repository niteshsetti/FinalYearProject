<?php
include '../backend/dbconnection.php';
if (isset($_POST["tableno"]) || isset($_POST["candid"])) {
    $tableno = $_POST["tableno"];
    $candid = $_POST["candid"];
    date_default_timezone_set('Asia/Kolkata'); 
    $time=date("h:i");
    $update = "update confirm set Deliverystat='Delivered',Est='$time' where Tableno='$tableno' and Candid='$candid'";
    $execute_query = mysqli_query($connection, $update);
    if ($execute_query) {
        echo "Success";
    } else {
        echo "Failed";
    }
}
