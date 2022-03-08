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
    $timestamp = date('h : i');
    $stt=strtotime($timestamp);
    $dtt=strtotime($dts);
    if($dts <= $timestamp)
    {
        echo "----Time Up";
        $sqd="update confirm set Ts='Decline' where Candid='$can'";
        $executed=mysqli_query($connection,$sqd);

    }
    else{
        echo "----".$timestamp;
    }
    }
