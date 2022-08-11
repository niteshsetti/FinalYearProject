<?php
session_start();
include '../backend/dbconnection.php';
@$table_number=$_GET["tableno"];
$_SESSION["tableno"]=$table_number;
 $sql="select *from tablereservation where Tableno='$table_number'";
 $query_ex=mysqli_query($connection,$sql);
 while($get_details=mysqli_fetch_array($query_ex))
 {
     $name=$get_details[0];
     $_SESSION["name"]=$name;
     $phone=$get_details[1];
     $_SESSION["phno"]=$phone;
     $tab=$get_details[3];
     $_SESSION["tablenumber"]=$tab;
 }
