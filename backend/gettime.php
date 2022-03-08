<?php
include '../backend/dbconnection.php';
if(isset($_POST["fetch"]))
{
    $sql="select *from confirm where Tableno='1'";
    $exe=mysqli_query($connection,$sql);
    @$fetch=mysqli_fetch_array($exe);
    echo $fetch['Tim'];
}
?>