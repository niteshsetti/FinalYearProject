<?php
include '../backend/dbconnection.php';
$table_number=$_SESSION["tableno"];
$arrs=$_GET["details"];
$arr = explode(",", $arrs);
$payment = "Online-Payment";
$date = date("d/D/M/Y");
date_default_timezone_set('Asia/Kolkata');
$time = date("h:i");
$endTime = strtotime("+2 minutes", strtotime($time));
$ed = date('h:i', $endTime);
for ($i = 0; $i < count($arr); $i++) {
     $candid = $arr[$i];
     $sql = "update confirm set Paymenttype='$payment',Status='Yes',Orderdate='$date',OrderTime='$time',Dtime='$ed' where Candid='$candid'";
     $execute = mysqli_query($connection, $sql);
     if ($execute)
     {
       header("Location:http://localhost/FinalYearProject/frontend/payment.php?%20tableno=".$table_number);
     }
     else
     {
        echo "Failed";
     }
 }
?>