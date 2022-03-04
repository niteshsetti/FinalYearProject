<?php
include '../backend/dbconnection.php';
include '../backend/tablenumber.php';
if(isset($_POST["fetch"]) || isset($_POST["tabno"]))
{
$tabno=$_POST["tabno"];
$sql="select *from cart where Tableno='$tabno'";
$exec=mysqli_query($connection,$sql);
$count_items=mysqli_num_rows($exec);
echo $count_items;
}
?>