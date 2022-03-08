<?php
include '../backend/dbconnection.php';
    if(isset($_POST["fetch"]) || isset($_POST["cand"]))
    {
     $can=$_POST["cand"];
    $sql="select *from confirm where Candid='$can'";
    $execute=mysqli_query($connection,$sql);
    @$fetch=mysqli_fetch_array($execute);
    $dts=$fetch[14];
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('H : i');
    $stt=strtotime($timestamp);
    $dtt=strtotime($dts);
    if($dts <= $timestamp)
    {
        echo "TIME UP!";
    }
    else{
        echo $timestamp;
    }
    }
    
?>