<?php
include '../backend/dbconnection.php';
include '../backend/tablenumber.php';
$sql="select *from cart where Tableno='$table_number'";
$exec=mysqli_query($connection,$sql);
$count_items=mysqli_num_rows($exec);
?>