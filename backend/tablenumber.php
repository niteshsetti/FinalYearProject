<?php
include '../backend/dbconnection.php';
 $table_number=$_GET["tableno"];
 $sql="select *from tablereservation where Tableno='$table_number'";
 $query_ex=mysqli_query($connection,$sql);
 while($get_details=mysqli_fetch_array($query_ex))
 {
     $name=$get_details[0];
     $phone=$get_details[1];
 }
?>