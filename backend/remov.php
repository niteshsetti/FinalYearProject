<?php
include '../backend/dbconnection.php';
if(isset($_POST["itemid"]) || isset($_POST["skey"]))
{
    $itemid=$_POST["itemid"];
    $skey=$_POST["skey"];
    $delete="delete from cart where Item='$itemid' and Candid='$skey'";
    $execute=mysqli_query($connection,$delete);
    if($execute)
    {
        echo "Success";
    }
    else
    {
        echo "Failed";
    }
}
if(isset($_POST["itemids"]) || isset($_POST["skeys"]))
{
    $itemid=$_POST["itemids"];
    $skey=$_POST["skeys"];
    $delete="delete from confirm where Item='$itemid' and Candid='$skey'";
    $execute=mysqli_query($connection,$delete);
    if($execute)
    {
        echo "Success";
    }
    else
    {
        echo "Failed";
    }
}
?>