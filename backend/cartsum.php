<?php
include '../backend/dbconnection.php';
@$table_numbers = $_GET["tablenumber"];
$sql="select *from cart where Tableno='$table_numbers'";
$exec=mysqli_query($connection,$sql);
$sum=0;
while($fetchs=mysqli_fetch_array($exec))
{
    $five=$fetchs[5];
    $sum=$sum+$five;
}
?>