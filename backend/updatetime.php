<?php
include '../backend/dbconnection.php';
if (isset($_POST["fetch"]) || isset($_POST["cand"])) {
    $can = $_POST["cand"];
    $sql = "select *from confirm where Candid='$can'";
    $execute = mysqli_query($connection, $sql);
    @$fetch = mysqli_fetch_array($execute);
    $dts = $fetch[14];
    $delistat = $fetch[16];
    $est = $fetch[17];
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date('h:i');
    $stt = strtotime($timestamp);
    $dtt = strtotime($dts);
    if ($dts <= $timestamp && $delistat != "Delivered") {
        echo " ----Time Up Play Quiz";
        $sqd = "update confirm set Ts='Decline' where Candid='$can'";
        $executed = mysqli_query($connection, $sqd);
    } else if ($delistat == "Delivered") {
        echo " Delivered on ".$est;
    } else {
        echo " ----" . $timestamp;
    }
}
