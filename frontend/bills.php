<?php
ob_start();
session_start();
include '../backend/dbconnection.php';
include '../backend/cartsum.php';
$table_number = $_SESSION["tablenumber"];
$arrs=$_GET["details"];
echo $arrs;
$arr = explode(",", $arrs);
print_r($arr);
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
      header("Location:https://knvsrestuarant.000webhostapp.com/FinalYearProject/frontend/payment.php?%20tableno=".$table_number);
     }
     else
     {
        echo "Failed";
     }
 }
?>