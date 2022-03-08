<?php
include 'dbconnection.php';
$a = "";
$sql = "select *from confirm";
$execute = mysqli_query($connection, $sql);
while ($fetch = mysqli_fetch_array($execute)) {
    $name = $fetch['Name'];
    $phno = $fetch['Phno'];
    $tableno = $fetch['Tableno'];
    $item = $fetch['Iname'];
    $quantity = $fetch['Quantity'];
    $itemcost = $fetch['Icost'];
    $payment = $fetch['Paymenttype'];
    $status = $fetch['Status'];
    $orderdate = $fetch['Orderdate'];
    $ordertime = $fetch['OrderTime'];
}
